<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'transaction_id',
    ];

    public function cart()
    {
        return $this->hasMany(Cart::class, 'detail_transaction_id');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
