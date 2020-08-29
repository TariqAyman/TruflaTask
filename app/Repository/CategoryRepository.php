<?php
// Copyright
declare(strict_types=1);


namespace App\Repository;

use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * CategoryRepository constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $model)
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

    public function fetchApi($data)
    {
        foreach ($data as $category){
            $this->model->updateOrCreate([
                'id' => $category->id
            ],[
                'name' => $category->name
            ]);
        }
    }
}
