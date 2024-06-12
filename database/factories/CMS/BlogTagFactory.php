<?php

namespace Database\Factories\CMS;

use App\Models\CMS\BlogCategory;
use App\Models\CMS\BlogTag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BlogTagFactory extends Factory
{
    protected $model = BlogTag::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'status' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
