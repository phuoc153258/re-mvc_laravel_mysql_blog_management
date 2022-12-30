<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'comment_id',
        'report_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    public function reports()
    {
        return $this->belongsTo(Report::class, 'report_id', 'id');
    }
}
