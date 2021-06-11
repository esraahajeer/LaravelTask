<?php

namespace Database\Factories;

use App\Models\product_category;
use Illuminate\Database\Eloquent\Factories\Factory;

class product_categoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = product_category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween($min = 1 , $max = 1000),
            'category_id' => $this->faker->numberBetween($min = 1 , $max = 20),
        ];
    }
}
