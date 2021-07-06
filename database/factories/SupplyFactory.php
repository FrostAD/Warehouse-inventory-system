<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Company;
use App\Item;
use App\Models\Supply;
use App\Models\User;

class SupplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'item_id' => Item::factory(),
            'ordered_at' => $this->faker->dateTime(),
            'quantity' => $this->faker->numberBetween(-10000, 10000),
            'price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'arrives_at' => $this->faker->dateTime(),
            'arrived' => $this->faker->boolean,
            'user_id' => User::factory(),
        ];
    }
}
