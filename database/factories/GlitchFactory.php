<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Glitch;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Glitch>
 */
class GlitchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'room_no' => $this->faker->numberBetween(100, 399),
            'guest_name' => $this->faker->firstName(),
            'category' => $this->faker->randomElement(['General Request', 'Complaint', 'Issue']),
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(),
            'status' =>$this->faker->randomElement(['Pending', 'Ongoing', 'Resolved']),
            'updated_by' => $this->faker->numberBetween(1, 2),


        ];
    }
}
