<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OTP extends Model
{
    use HasFactory;

    protected $fillable = [
        'otp',
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
