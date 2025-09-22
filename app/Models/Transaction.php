<?php

namespace App\Models;

use App\Events\TransactionCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'account_id',
        'type',
        'amount',
        'meta',
    ];

    protected $casts = [
        'meta' => 'json'
    ];

    protected $dispatchesEvents = [
        'created' => TransactionCreated::class,
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
