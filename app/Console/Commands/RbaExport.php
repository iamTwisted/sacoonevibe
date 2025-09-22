<?php

namespace App\Console\Commands;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class RbaExport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rba:export {--date=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export member contributions to a CSV file for RBA reporting.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = $this->option('date') ? Carbon::parse($this->option('date')) : Carbon::now()->subMonth()->endOfMonth();

        $members = Member::with(['rbaProfile', 'retirementContributions' => function ($query) use ($date) {
            $query->whereYear('contribution_date', $date->year)
                  ->whereMonth('contribution_date', $date->month);
        }])->get();

        $fileName = 'rba_export_' . $date->format('Y_m_d') . '.csv';
        $filePath = 'exports/' . $fileName;

        $handle = fopen(Storage::path($filePath), 'w');

        fputcsv($handle, [
            'MEMBER_NUMBER',
            'EFFECTIVE_DATE',
            'EMPLOYER_CODE',
            'EMPLOYER_NAME',
            'NATIONAL_ID',
            'NSSF_NUMBER',
            'RBA_MEMBER_NUMBER',
            'SCHEME_CODE',
            'EMPLOYER_CONTRIBUTION',
            'MEMBER_CONTRIBUTION',
            'INTEREST_ACCRUED',
        ]);

        foreach ($members as $member) {
            if ($member->rbaProfile) {
                $employerDetails = $member->rbaProfile->employer_details;
                $contributions = $member->retirementContributions->first();

                fputcsv($handle, [
                    $member->member_number,
                    $date->toDateString(),
                    $employerDetails['code'] ?? '',
                    $employerDetails['name'] ?? '',
                    $member->national_id,
                    $member->rbaProfile->nssf_number,
                    $member->rbaProfile->rba_member_number,
                    $member->rbaProfile->scheme_code,
                    $contributions->employer_contribution ?? 0,
                    $contributions->contribution_amount ?? 0,
                    $contributions->interest_accrued ?? 0,
                ]);
            }
        }

        fclose($handle);

        $this->info("RBA export generated successfully: {$filePath}");

        return 0;
    }
}
