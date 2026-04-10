<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Novel;
use App\Models\Comment;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'novel_id',
        'title',
        'content',
        'chapter_number',
        'views',
        'publish_status',
    ];

    public function novel()
    {
        return $this->belongsTo(Novel::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}