<?php

namespace App\Http\Controllers;

use App\Repository\MovieRepositoryInterface;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    /**
     * @var MovieRepositoryInterface
     */
    private $movieRepository;

    /**
     * MovieController constructor.
     * @param MovieRepositoryInterface $movieRepository
     */
    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $movies = $this->movieRepository->all();

        return view('movies.index', compact('movies'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $movie = $this->movieRepository->find($id);

        return view('movies.show', compact('movie'));
    }
}
