<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */ protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $first_user_id = User::first()->id;
        $last_user_id = User::all()->last()->id;
        $first_product_id = Product::first()->id;
        $last_product_id = Product::all()->last()->id;
        return [
            'user_id' => rand($first_user_id, $last_user_id),
            'product_id' => rand($first_product_id, $last_product_id),'quantity' => rand(1,20),
            'uuid' => $this->faker->uuid
        ];
    }
}
