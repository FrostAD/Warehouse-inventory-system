<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Category;
use App\Models\Item;
use App\Models\Manufacturer;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'quantity' => $this->faker->numberBetween(-10000, 10000),
            'minimum_quantity' => $this->faker->numberBetween(-10000, 10000),
            'auto_fill' => $this->faker->boolean,
            'manufacturer_id' => Manufacturer::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
