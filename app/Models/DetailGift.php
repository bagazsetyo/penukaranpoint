<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailGift extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'gift_id',
        'point',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id','id');
    }
    public function gift()
    {
        return $this->belongsTo(Gift::class, 'gift_id','id')->select('id','name','image');
    }
}
