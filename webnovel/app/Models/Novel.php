<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Chapter;
use App\Models\Genre;
use App\Models\Comment;
use App\Models\Review;


/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property string $publish_status
 * @property int $views
 * @property \App\Models\User|null $user
 */

class Novel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'cover',
        'status',
        'publish_status',
        'views',
    ];

    // Relasi ke user (penulis)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Novel punya banyak chapter
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    // Many to many genre
    public function genres()
        {
            return $this->belongsToMany(Genre::class, 'novel_genre');
        }

    // Komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}