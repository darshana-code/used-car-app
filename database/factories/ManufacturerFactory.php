<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Manufacturer;

class ManufacturerFactory extends Factory
{
    protected $model = Manufacturer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'description' => $this->faker->sentence,
            'origin_country' => $this->faker->country,
        ];
    }
}
