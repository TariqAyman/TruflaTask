<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\MovieListResource;
use App\Http\Resources\MovieResource;
use App\Repository\MovieRepositoryInterface;
use App\Traits\ApiTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MovieController extends Controller
{
    use ApiTrait;

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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $this->validateAgainstReducedRules($request, [
            'popular' => 'nullable|in:desc,asc',
            'rated' => 'nullable|in:desc,asc',
        ]);
        return $this->respond(new MovieListResource($this->movieRepository->filter($request,20)));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return $this->respond(new MovieResource($this->movieRepository->find($id)));
    }
}
