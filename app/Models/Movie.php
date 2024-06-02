<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Image;
use App\Models\Rating;
use App\Models\Director;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function actors(){
        return $this->belongsToMany(Actor::class);
    }

    public function directors(){
        return $this->belongsToMany(Director::class, 'movie_directors', 'movie_id', 'director_id');
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function rating(){
        return $this->belongsTo(Rating::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
