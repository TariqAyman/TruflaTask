<?php
// Copyright
declare(strict_types=1);


namespace App\Repository;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

final class MovieRepository extends BaseRepository implements MovieRepositoryInterface
{
    /**
     * MovieRepository constructor.
     *
     * @param Movie $model
     */
    public function __construct(Movie $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    public function paginate($count = 10)
    {
        return $this->model->paginate($count);
    }

    public function fetchApi($data)
    {
        $this->model->updateOrCreate([
            'themoviedb_id' => $data->id
        ], [
            'adult' => $data->adult,
            'backdrop_path' => $data->backdrop_path,
            'belongs_to_collection' => $data->belongs_to_collection,
            'budget' => $data->budget,
            'genres' => $data->genres,
            'homepage' => $data->homepage,
            'imdb_id' => $data->imdb_id,
            'original_language' => $data->original_language,
            'original_title' => $data->original_title,
            'overview' => $data->overview,
            'popularity' => $data->popularity,
            'poster_path' => $data->poster_path,
            'production_companies' => $data->production_companies,
            'production_countries' => $data->production_countries,
            'release_date' => $data->release_date,
            'revenue' => $data->revenue,
            'runtime' => $data->runtime,
            'spoken_languages' => $data->spoken_languages,
            'status' => $data->status,
            'tagline' => $data->tagline,
            'title' => $data->title,
            'video' => $data->video,
            'vote_average' => $data->vote_average,
            'vote_count' => $data->vote_count,
        ]);

        $this->model->find($data->id)->categories()->sync(Arr::pluck($data->genres, 'id'));
    }

    public function filter(Request $request, $pages = 10)
    {
        $filter = $this->model->query();

        // Filter By Category
        if ($request->has('category_id')) {
            $filter->whereHas('categories', function ($sql) use ($request) {
                $sql->where('category_id', $request->get('category_id'));
            });
        }

        /// Filter By Popularity
        if ($request->has('popular')) {
            $filter->orderBy('popularity', $request->get('popular'));
        }

        /// Filter By Popularity
        if ($request->has('rated')) {
            $filter->orderBy('vote_average', $request->get('rated'));
        }

        return $filter->paginate($pages);
    }
}
