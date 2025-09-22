<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'loan_type_id',
        'amount',
        'status',
        'repayment_period',
        'interest_rate',
    ];

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function loanType()
    {
        return $this->belongsTo(LoanType::class);
    }
}
