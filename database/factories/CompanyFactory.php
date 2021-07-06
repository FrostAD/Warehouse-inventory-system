<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Type;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'address' => $this->faker->regexify('[A-Za-z0-9]{200}'),
            'telephone' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'type_id' => Type::factory(),
        ];
    }
}
