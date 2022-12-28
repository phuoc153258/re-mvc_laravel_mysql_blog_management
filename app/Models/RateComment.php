<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'comment_id',
        'rate_id'
    ];

    public function rates()
    {
        return $this->belongsTo(Rate::class, 'rate_id', 'id');
    }
}
