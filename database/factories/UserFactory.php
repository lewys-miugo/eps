<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $jobGradesWithSalaries = [
            'A' => [1000000, 5000000],  // assuming an upper limit of 1,500,000 for grade A
            'B' => [500000, 999999],
            'C' => [200000, 499999],
            'D' => [80000, 199999],
            'E' => [25000, 79999],
            'F' => [10000, 24999],      // assuming a lower limit of 10,000 for grade F
        ];
        
        $job_grade = array_rand($jobGradesWithSalaries);
        $salary = $this->faker->numberBetween($jobGradesWithSalaries[$job_grade][0], $jobGradesWithSalaries[$job_grade][1]);

        $isFired = $this->faker->boolean(10);  // 10% chance of being true
        return [
            'full_name' => $this->faker->name(),
            'national_id' => $this->faker->unique()->numerify('##########'),
            'employee_no' => $this->faker->unique()->numerify('EMP#####'),
            'age' => $this->faker->numberBetween(18, 65),
            'gender' => $this->faker->randomElement(['male', 'female', 'other']),
            'campus' => null, // $this->faker->word(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'campus_id' => $this->faker->numberBetween(1,10), // Assuming you'll later associate it with a Campus model
            'department' => null, // $this->faker->word(),
            'department_id' => null, // Assuming you'll later associate it with a Department model
            'start_date' => $this->faker->date(),
            'suspended' => $this->faker->boolean(20), // 20% chance of being true
            'job_grade' => $job_grade,
            'salary' => $salary,
            'fired' => $isFired, // 10% chance of being true
            'email' => $this->faker->unique()->safeEmail(),
            'utype' => $isfired ? 'FEMP':'EMP',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // default "password"
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
