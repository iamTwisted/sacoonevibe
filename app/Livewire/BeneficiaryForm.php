<?php

namespace App\Livewire;

use App\Models\Beneficiary;
use App\Models\Member;
use App\Models\MemberHistory;
use Livewire\Component;

class BeneficiaryForm extends Component
{
    public $member_id;
    public $beneficiary_id;
    public $name;
    public $id_type;
    public $id_number;
    public $phone;
    public $address;
    public $share_percent;
    public $type;
    public $is_verified;

    public function mount($member_id, $beneficiary_id = null)
    {
        $this->member_id = $member_id;
        if ($beneficiary_id) {
            $beneficiary = Beneficiary::findOrFail($beneficiary_id);
            $this->beneficiary_id = $beneficiary->id;
            $this->name = $beneficiary->name;
            $this->id_type = $beneficiary->id_type;
            $this->id_number = $beneficiary->id_number;
            $this->phone = $beneficiary->phone;
            $this->address = $beneficiary->address;
            $this->share_percent = $beneficiary->share_percent;
            $this->type = $beneficiary->type;
            $this->is_verified = $beneficiary->is_verified;
        }
    }

    public function render()
    {
        return view('livewire.beneficiary-form');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'id_type' => 'required',
            'id_number' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'share_percent' => 'required|numeric|min:0',
            'type' => 'required|in:primary,secondary,contingent',
        ]);

        $member = Member::findOrFail($this->member_id);
        $total_share = $member->beneficiaries()->where('id', '!=', $this->beneficiary_id)->sum('share_percent');
        $new_total_share = $total_share + $this->share_percent;

        if ($new_total_share > 100) {
            $this->addError('share_percent', 'Total share percentage cannot exceed 100%.');
            return;
        }

        $beneficiary = Beneficiary::updateOrCreate(
            ['id' => $this->beneficiary_id],
            [
                'member_id' => $this->member_id,
                'name' => $this->name,
                'id_type' => $this->id_type,
                'id_number' => $this->id_number,
                'phone' => $this->phone,
                'address' => $this->address,
                'share_percent' => $this->share_percent,
                'type' => $this->type,
                'is_verified' => $this->is_verified ?? false,
            ]
        );

        MemberHistory::create([
            'member_id' => $this->member_id,
            'event' => $this->beneficiary_id ? 'Updated Beneficiary' : 'Added Beneficiary',
            'details' => json_encode($beneficiary->toArray()),
        ]);

        session()->flash('message', 'Beneficiary saved successfully.');

        $this->reset();
    }
}
