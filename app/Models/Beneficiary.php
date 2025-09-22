<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'member_id',
        'name',
        'id_type',
        'id_number',
        'phone',
        'address',
        'share_percent',
        'type',
        'is_verified',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
