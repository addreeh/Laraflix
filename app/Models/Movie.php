<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'release_year',
        'director',
        'genre',
        'poster',
    ];

    public function views()
    {
        return $this->hasMany(MovieUserView::class);
    }

    public function reviews()
    {
        return $this->hasMany(MovieReview::class);
    }
}
