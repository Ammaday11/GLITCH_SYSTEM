<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GlitchType>
 */
class GlitchTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' =>$this->faker->randomElement(['Cleaning', 'AC', 'Medical', 'Room Amenities on RQ', 'Buggy Request', 'TV']),
        ];
    }
}
