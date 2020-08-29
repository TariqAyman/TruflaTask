<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $table = 'movies';

    protected $primaryKey = 'themoviedb_id';

    protected $fillable = [
        'themoviedb_id',
        'adult',
        'backdrop_path',
        'budget',
        'homepage',
        'imdb_id',
        'original_language',
        'original_title',
        'overview',
        'popularity',
        'poster_path',
        'release_date',
        'revenue',
        'runtime',
        'status',
        'tagline',
        'title',
        'video',
        'vote_average',
        'vote_count',
        'belongs_to_collection',
        'genres',
        'production_companies',
        'production_countries',
        'spoken_languages'
    ];

    protected $casts = [
        'genres' => 'json',
        'belongs_to_collection' => 'array',
        'production_companies' => 'json',
        'production_countries' => 'json',
        'spoken_languages' => 'json',
        'budget' => 'integer',
        'popularity' => 'integer',
        'revenue' => 'integer',
        'runtime' => 'integer',
        'vote_average' => 'integer',
        'vote_count' => 'integer',
    ];

    public function getPosterPathAttribute()
    {
        return 'https://image.tmdb.org/t/p/w500/' . $this->attributes['poster_path'];
    }

    public function getBackdropPathAttribute()
    {
        return 'https://image.tmdb.org/t/p/w500/' . $this->attributes['backdrop_path'];
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
}
