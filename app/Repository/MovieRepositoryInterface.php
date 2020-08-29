<?php
// Copyright
declare(strict_types=1);


namespace App\Repository;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

interface MovieRepositoryInterface
{
    public function all(): Collection;

    public function fetchApi($data);

    public function paginate($count = 10);

    public function filter(Request $request, $pages);
}
