<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'genre_id', 'image', 'description', 'rating_star'];
    public function casts() {
        return $this->belongsToMany(Cast::class)->withPivot('role');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
