<?php
// Copyright
declare(strict_types=1);


namespace App\Repository;

use Illuminate\Support\Collection;


interface CategoryRepositoryInterface
{
    public function all(): Collection;

    public function fetchApi($data);
}
