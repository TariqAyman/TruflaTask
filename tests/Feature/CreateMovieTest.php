<?php

namespace Tests\Feature;

use App\Models\Movie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateMovieTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function add_movie()
    {
        $this->withExceptionHandling();

        $this->create();

        $this->assertCount(1, Movie::all());
    }

    /**
     * @test
     */
    public function list_category_api()
    {
        $this->withExceptionHandling();

        $this->create();

        $response = $this->get('/api/v1/movies');

        $response->assertOk();
    }

    protected function create()
    {
        Movie::create([
            "adult" => false,
            "backdrop_path" => "/jtAI6OJIWLWiRItNSZoWjrsUtmi.jpg",
            "belongs_to_collection" => [
                "id" => 729322,
                "name" => "Gabriel's Inferno Collection",
                "poster_path" => null,
                "backdrop_path" => null
            ],
            "budget" => 0,
            "genres" => [["id" => 10749, "name" => "Romance",],],
            "homepage" => "https://watch.passionflix.com/watch/f299fa17-5a2b-4fee-b53a-a4651747431b",
            "themoviedb_id" => 724089,
            "imdb_id" => "tt11641654",
            "original_language" => "en",
            "original_title" => "Gabriel's Inferno Part II",
            "overview" => "Professor Gabriel Emerson finally learns the truth about Julia Mitchell's identity, but his realization comes a moment too late. Julia is done waiting for the well-respected Dante specialist to remember her and wants nothing more to do with him. Can Gabriel win back her heart before she finds love in another's arms?",
            "popularity" => 16.869,
            "poster_path" => "/pci1ArYW7oJ2eyTo2NMYEKHHiCP.jpg",
            "production_companies" => [
                [
                    "id" => 92153,
                    "logo_path" => "/psjvYkjjgAPtS8utnFYDM8t8yi7.png",
                    "name" => "PassionFlix",
                    "origin_country" => "US"
                ]
            ],
            "production_countries" => [],
            "release_date" => "2020-07-31",
            "revenue" => 0,
            "runtime" => 0,
            "spoken_languages" => [
                [
                    "iso_639_1" => "en",
                    "name" => "English"
                ]
            ],
            "status" => "Released",
            "tagline" => "",
            "title" => "Gabriel's Inferno Part II",
            "video" => false,
            "vote_average" => 9.1,
            "vote_count" => 709
        ]);
    }
}
