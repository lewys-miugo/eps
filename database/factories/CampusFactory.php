<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $kenyanTowns = [
            'Nairobi', 'Mombasa', 'Kisumu', 'Nakuru', 'Eldoret', 
            'Thika', 'Kitale', 'Malindi', 'Garissa', 'Kakamega'
        ];
        
        $campus_name = $this->faker->unique()->randomElement($kenyanTowns);

        return [
            'campus_name' => $campus_name,
            'abbreviation_name' => strtoupper($this->faker->unique()->bothify('???')),  // generates a unique abbreviation like "ABC"
            'slug' => Str::slug($campus_name,'-'),  // creates a slug from the campus_name
        ];
    }
}
