<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberRbaProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'nssf_number',
        'rba_member_number',
        'scheme_code',
        'employer_details',
    ];

    protected $casts = [
        'employer_details' => 'json'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
