<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;
use App\Models\Designation;
use App\Models\Employee_Profile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employeeID' => $this->faker->unique()->numerify('ST#####'),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'email' =>$this->faker->unique()->safeEmail(),
            'phone' =>$this->faker->unique()->e164PhoneNumber(),
            'department_id' => $this->faker->numberBetween(1, 4),
            'designation_id' => Designation::factory(),
            'joined_date' => $this->faker->dateTime(),
            'NID' => $this->faker->unique()->numerify('A######'),
            'dob' => $this->faker->dateTime(),
            'parmanant_address' => $this->faker->secondaryAddress(),
            'nationality' => $this->faker->country(),
            'religion' => 'Muslim',
            'marital_status' =>$this->faker->randomElement(['Single', 'Married', 'Divorced']),
            'no_kids' => $this->faker->numberBetween(1, 7),
            'emg_name1' => $this->faker->firstName(),
            'emg_relation1' => $this->faker->randomElement(['Brother', 'Father', 'Mother']),
            'emg_phone1' =>$this->faker->e164PhoneNumber(),
            'emg_name2' => $this->faker->firstName(),
            'emg_relation2' => $this->faker->randomElement(['Brother', 'Father', 'Mother']),
            'emg_phone2' =>$this->faker->e164PhoneNumber(),
            'bank_name' =>'BML',
            'bank_acc_name' => $this->faker->lastName(),
            'bank_acc' =>$this->faker->numberBetween(10000000, 99999999),
            'image' =>$this->faker->numerify(' https://mighty.tools/mockmind-api/content/human/##.jpg'),
            // 'image' =>$this->faker->numerify('https://i.pravatar.cc/600?u=####'),
        ];
    }
}
