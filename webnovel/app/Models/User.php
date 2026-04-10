<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// Import model relasi
use App\Models\Novel;
use App\Models\Comment;
use App\Models\Review;
use App\Models\Bookmark;
use App\Models\Report;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi (mass assignment)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar',
        'status',
    ];

    /**
     * Kolom yang disembunyikan
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting tipe data
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Default value (opsional tapi bagus)
     */
    protected $attributes = [
        'role' => 'user',
        'status' => 'active',
    ];

    // ================= RELASI =================

    // User punya banyak novel
    public function novels()
    {
        return $this->hasMany(Novel::class);
    }

    // User punya banyak komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // User punya banyak review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // User punya banyak bookmark
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    // User punya banyak report
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    // ================= HELPER =================

    // Cek apakah admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}