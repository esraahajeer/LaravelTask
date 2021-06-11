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
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' =>$this->faker->text($maxNbChars = 200),
            'price' =>$this->faker->randomDigit(),
            'user_id' => $this->faker->numberBetween($min = 1 , $max = 100),
            'quantity' =>$this->faker->randomDigit(),
            'image' =>$this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
