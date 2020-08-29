<?php

namespace Tests\Feature;

use App\Models\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function add_category()
    {
        $this->withExceptionHandling();

        $this->create();

        $this->assertCount(1, Category::all());
    }

    /**
     * @test
     */
    public function list_category_api()
    {
        $this->withExceptionHandling();

        $this->create();

        $response = $this->get('/api/v1/category');

        $category = Category::all()->first();

        $response->assertOk()
            ->assertExactJson([[
                'id' => $category->id,
                'name' => $category->name
            ]]);
    }

    private function create()
    {
        Category::create([
            'id' => 1,
            'name' => 'Test Category'
        ]);
    }
}
