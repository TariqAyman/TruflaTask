<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CategoryResource;
use App\Repository\CategoryRepositoryInterface;
use App\Traits\ApiTrait;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    use ApiTrait;

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->respond(new CategoryResource($this->categoryRepository->all()));
    }
}
