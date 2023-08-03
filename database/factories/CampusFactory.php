<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campus>
 */
class CampusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Campus::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Sample list of Kenyan towns
        // $kenyanTowns = Arr::shuffle([
        //     'Nairobi', 'Mombasa', 'Kisumu', 'Nakuru', 'Eldoret', 
        //     'Thika', 'Kitale', 'Malindi', 'Garissa', 'Kakamega','Nanyuki','Juja'
        // ]);
        
        // $campus_name = $this->faker->unique()->randomElement($kenyanTowns);
        // $campus_name = array_pop($kenyanTowns);

        return [
            // 'campus_name' => $campus_name,
            // 'abbreviation_name' => strtoupper($this->faker->unique()->bothify('???')),  // generates a unique abbreviation like "ABC"
            // 'slug' => Str::slug($campus_name,'-'),  // creates a slug from the campus_name
        ];
    }
}
