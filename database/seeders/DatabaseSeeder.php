<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Campus::factory(10)->create();


        \App\Models\User::factory(3000)->create();

        \App\Models\User::factory(1)->create([
            'full_name' => 'Lewys Miugo',
            'national_id' => $this->faker->unique()->numerify('##########'),
            'employee_no' => $this->faker->unique()->numerify('EMP#####'),
            'age' => $this->faker->numberBetween(18, 65),
            'gender' => 'male',
            'campus' => null, // $this->faker->word(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'campus_id' => null, // Assuming you'll later associate it with a Campus model
            'department' => null, // $this->faker->word(),
            'department_id' => null, // Assuming you'll later associate it with a Department model
            'start_date' => $this->faker->date(),
            'suspended' => $this->faker->boolean(0), // 0% chance of being true
            'job_grade' => 'A',
            'salary' => '2000000',
            'fired' => $this->faker->boolean(0), // 0% chance of being true
            'email' => 'lewisadmin@epsjkuat.com',
            'utype' => 'SADM',
            'password' => bcrypt('lewisadmin@eps'), // default "password"
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(1)->create([
            'full_name' => 'Paul Omondi',
            'national_id' => $this->faker->unique()->numerify('##########'),
            'employee_no' => $this->faker->unique()->numerify('EMP#####'),
            'age' => $this->faker->numberBetween(18, 65),
            'gender' => 'male',
            'campus' => null, // $this->faker->word(),
            'phone_number' => $this->faker->unique()->phoneNumber(),
            'campus_id' => null, // Assuming you'll later associate it with a Campus model
            'department' => null, // $this->faker->word(),
            'department_id' => null, // Assuming you'll later associate it with a Department model
            'start_date' => $this->faker->date(),
            'suspended' => $this->faker->boolean(0), // 0% chance of being true
            'job_grade' => 'A',
            'salary' => '1500000',
            'fired' => $this->faker->boolean(0), // 0% chance of being true
            'email' => 'paulcadmin@epsjkuat.com',
            'utype' => 'CADM',
            'password' => bcrypt('paulcadmin@eps'), // default "password"
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
