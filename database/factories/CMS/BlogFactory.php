<?php

namespace Database\Factories\CMS;

use App\Models\CMS\Blog;
use App\Models\CMS\BlogCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'short_description' => $this->faker->paragraph(10),
            'content' => $this->faker->paragraph(150),
            'status' => true,
            'instagram_reel_link' => 'https://www.instagram.com/reel/C8BfBRPN2gh/embed/',
            'banner' => asset('placeholder-wide.jpg'),
            'category_id' => BlogCategory::all()->random()->id,
            'author_id' => User::first()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
