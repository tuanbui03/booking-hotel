<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagRecommendFactory extends Factory
{
    protected $model = \App\Models\TagRecommend::class;

    public function definition()
    {
        $tags = ['Luxury', 'Family', 'Budget', 'Romantic', 'Business', 'Resort', 'Spa'];

        return [
            'tag_name' => $this->faker->randomElement($tags),
        ];
    }
}
