<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    protected $table = 'wallets';
    protected $primaryKey = 'id';
    protected $KyeType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
