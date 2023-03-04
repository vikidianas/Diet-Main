<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_insert_data_into_categories_table()
    {
        $fake = [
            'name' => fake()->name(),
            'description' => fake()->text(),
        ];

        $response = $this->post(route('categories.store'), $fake + [
            'photo' => fake()->image(),
        ]);

        $response->assertStatus(302);

        // $this->assertDatabaseHas(Category::class, $fake);
    }
}
