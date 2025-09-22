<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetirementContribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'contribution_date',
        'employer_contribution',
        'contribution_amount',
        'interest_accrued',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
