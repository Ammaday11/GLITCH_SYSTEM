<?php

namespace Database\Factories;
use App\Models\Holiday;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Holiday>
 */
class HolidayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique->sentence(2),
            'holiday_date' => $this->faker->dateTime(),
            'holiday_type' =>$this->faker->randomElement(['Public Holiday', 'Government Holiday']),
        ];
    }
}
