<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Traits\Idgenerator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student_information>
 */
class student_informationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $autoId = Idgenerator::autoId('student_informations','student_id','2024','8');
        return [
            'adminssion_date' => '2023-12-26',
            'entry_date' => '2023-12-28',
            'student_id' => rand(),
            'student_name' => $this->faker->name,
            'father_name' => $this->faker->name,
            'mother_name' => $this->faker->name,
            'gender' => 'Male',
            'guardian_phone' => '+880',
            'class_id' => 2,
            'group_id' => 7,
            'session' => '2023',
            'create_by' =>'1',
        ];
    }
}
