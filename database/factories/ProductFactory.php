<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */ protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'image_link' => 'http://localhost:8000/api/v1/img/beigesandal',
            'desc_ttl' => $this->faker->sentence(),
            'desc_body' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(100,10000),
        ];
    }
}
