<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Item;
use App\Models\Order;
use App\Models\Staff;
use App\Models\User;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'item_id' => Item::factory(),
            'date' => $this->faker->dateTime(),
            'quantity' => $this->faker->numberBetween(-10000, 10000),
            'price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'staff_id' => Staff::factory(),
        ];
    }
}
