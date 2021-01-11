<?php

namespace Database\Factories;

use App\Models\BloodGroup;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'blood_group_id' => BloodGroup::all()->random()->id,
            'name' => $this->faker->name,
            'roll_number' => $this->faker->randomNumber(6),
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->address,

        ];
    }
}
