<?php
// Copyright
declare(strict_types=1);

namespace App\Clients;

interface ThemoviedbClientInterface
{
    public function getMovie($id);

    public function getTopMovies($page_num = null);

    public function getLatestMovie();

    public function getLanguages();

    public function getCategories();
}
