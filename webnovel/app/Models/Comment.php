<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Novel;
use App\Models\Chapter;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'novel_id',
        'chapter_id',
        'parent_id',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    // Reply
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}