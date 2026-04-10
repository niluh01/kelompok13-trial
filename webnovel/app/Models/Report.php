<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Novel;
use App\Models\Comment;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'novel_id',
        'comment_id',
        'reason',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}