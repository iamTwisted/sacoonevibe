<?php

namespace App\Models;

use App\Events\MemberApproved;
use App\Events\MemberCreated;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'branch_id',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'gender',
        'id_type',
        'id_number',
        'kra_pin',
        'nin',
        'email',
        'phone',
        'physical_address',
        'postal_address',
        'status',
        'created_by',
        'approved_by',
        'approved_at',
        'meta',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'meta' => 'array',
        'dob' => 'date',
        'approved_at' => 'datetime',
    ];

    /**
     * The event map for the model.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => MemberCreated::class,
    ];

    /**
     * The \"booted\" method of the model.
     */
    protected static function booted(): void
    {
        static::creating(function (Member $member) {
            if (empty($member->member_no)) {
                $member->member_no = self::generateMemberNumber($member->branch_id);
            }
        });

        static::updating(function (Member $member) {
            if ($member->isDirty('status') && $member->status === 'active') {
                event(new MemberApproved($member));
            }
        });
    }

    /**
     * Generate a unique member number for a given branch.
     */
    public static function generateMemberNumber(string $branchId): string
    {
        $branch = Branch::findOrFail($branchId);

        DB::beginTransaction();

        try {
            $counter = DB::table('member_counters')->where('branch_id', $branch->id)->lockForUpdate()->first();

            if (!$counter) {
                $counter = new \stdClass();
                $counter->last_number = 0;
                DB::table('member_counters')->insert(['branch_id' => $branch->id, 'last_number' => 1]);
            } else {
                DB::table('member_counters')->where('branch_id', $branch->id)->increment('last_number');
            }

            DB::commit();

            $newNumber = $counter->last_number + 1;

            return sprintf('%s-%s-%06d', $branch->code, date('Y'), $newNumber);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Get the branch that the member belongs to.
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    /**
     * Get the documents for the member.
     */
    public function documents(): HasMany
    {
        return $this->hasMany(MemberDocument::class);
    }

    /**
     * Get the shares for the member.
     */
    public function shares(): HasMany
    {
        return $this->hasMany(MemberShare::class);
    }

    /**
     * Get the beneficiaries for the member.
     */
    public function beneficiaries(): HasMany
    {
        return $this->hasMany(Beneficiary::class);
    }

    /**
     * Get the RBA profile for the member.
     */
    public function rbaProfile(): HasOne
    {
        return $this->hasOne(MemberRbaProfile::class);
    }

    /**
     * Get the retirement contributions for the member.
     */
    public function retirementContributions(): HasMany
    {
        return $this->hasMany(RetirementContribution::class);
    }

    /**
     * Get the histories for the member.
     */
    public function histories(): HasMany
    {
        return $this->hasMany(MemberHistory::class);
    }

    /**
     * Check if the member can submit their beneficiaries.
     *
     * @return bool
     */
    public function canSubmitBeneficiaries(): bool
    {
        if ($this->scheme_type !== 'retirement') {
            return true;
        }

        return $this->beneficiaries()->sum('share_percent') == 100;
    }
}
