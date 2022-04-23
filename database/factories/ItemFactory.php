<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition(): array
    {
    	return [
    	    'name' => $this->faker->word(),
            'price' => $this->faker->randomDigit(),
            'acquired' => $this->faker->boolean,
            'archived' => $this->faker->boolean
    	];
    }
}
