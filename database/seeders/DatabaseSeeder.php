<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Campus::factory(1)->create([
            'campus_name'=>'Juja',
            'abbreviation_name'=>'Juja-01',
            'slug'=>'Juja'
        ]);

        \App\Models\Campus::factory(1)->create([
            'campus_name'=>'Mombasa',
            'abbreviation_name'=>'mbsa-01',
            'slug'=>'mombasa'
        ]);
        
        // 'Nairobi', 'Mombasa', 'Kisumu', 'Nakuru', 'Eldoret', 
        //     'Thika', 'Kitale', 'Malindi', 'Garissa', 'Kakamega','Nanyuki','Juja'
        \App\Models\Campus::factory(1)->create([
            'campus_name'=>'Nairobi',
            'abbreviation_name'=>'NBO-01',
            'slug'=>'Nairobi'
        ]);
        
        \App\Models\Campus::factory(1)->create([
            'campus_name'=>'Kisumu',
            'abbreviation_name'=>'KSM-01',
            'slug'=>'kisumu'
        ]);
        
        \App\Models\Campus::factory(1)->create([
            'campus_name'=>'Nakuru',
            'abbreviation_name'=>'NKRU-01',
            'slug'=>'nakuru'
        ]);
        
        \App\Models\Campus::factory(1)->create([
            'campus_name'=>'Eldoret',
            'abbreviation_name'=>'ELD',
            'slug'=>'eldoret'
        ]);

        $faker = Faker::create();

        // \App\Models\User::factory(3000)->create();

        \App\Models\User::factory(1)->create([
            'full_name' => 'Lewys Miugo',
            'national_id' => $faker->unique()->numerify('##########'),
            'employee_no' => $faker->unique()->numerify('EMP#####'),
            'age' => $faker->numberBetween(18, 65),
            'gender' => 'male',
            'campus' => null, // $faker->word(),
            'phone_number' => $faker->unique()->phoneNumber(),
            'campus_id' => null, // Assuming you'll later associate it with a Campus model
            'department' => null, // $faker->word(),
            'department_id' => null, // Assuming you'll later associate it with a Department model
            'start_date' => $faker->date(),
            'suspended' => $faker->boolean(0), // 0% chance of being true
            'job_grade' => 'A',
            'salary' => '2000000',
            'fired' => $faker->boolean(0), // 0% chance of being true
            'email' => 'lewisadmin@epsjkuat.com',
            'utype' => 'SADM',
            'password' => bcrypt('lewisadmin@eps'), // default "password"
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(1)->create([
            'full_name' => 'Paul Omondi',
            'national_id' => $faker->unique()->numerify('##########'),
            'employee_no' => $faker->unique()->numerify('EMP#####'),
            'age' => $faker->numberBetween(18, 65),
            'gender' => 'male',
            'campus' => null, // $faker->word(),
            'phone_number' => $faker->unique()->phoneNumber(),
            'campus_id' => null, // Assuming you'll later associate it with a Campus model
            'department' => null, // $faker->word(),
            'department_id' => null, // Assuming you'll later associate it with a Department model
            'start_date' => $faker->date(),
            'suspended' => $faker->boolean(0), // 0% chance of being true
            'job_grade' => 'A',
            'salary' => '1500000',
            'fired' => $faker->boolean(0), // 0% chance of being true
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
