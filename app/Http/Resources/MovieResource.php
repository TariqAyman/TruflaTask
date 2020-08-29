<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'themoviedb_id' => $this->themoviedb_id,
            'adult' => $this->adult,
            'backdrop_path' => $this->backdrop_path,
            'budget' => $this->budget,
            'homepage' => $this->homepage,
            'imdb_id' => $this->imdb_id,
            'original_language' => $this->original_language,
            'original_title' => $this->original_title,
            'overview' => $this->overview,
            'popularity' => $this->popularity,
            'poster_path' => $this->poster_path,
            'release_date' => $this->release_date,
            'revenue' => $this->revenue,
            'runtime' => $this->runtime,
            'status' => $this->status,
            'tagline' => $this->tagline,
            'title' => $this->title,
            'video' => $this->video,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count,
            'belongs_to_collection' => $this->belongs_to_collection,
            'genres' => $this->genres,
            'production_companies' => $this->production_companies,
            'production_countries' => $this->production_countries,
            'spoken_languages' => $this->spoken_languages
        ];
    }
}
