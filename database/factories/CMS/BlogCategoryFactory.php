<?php

namespace Database\Factories\CMS;

use App\Models\CMS\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BlogCategoryFactory extends Factory
{
    protected $model = BlogCategory::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->userName(),
            'short_description' => $this->faker->paragraph(),
            'status' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
