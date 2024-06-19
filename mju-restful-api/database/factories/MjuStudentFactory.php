<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MjuStudent>
 */
class MjuStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ // สร้างข้อมูลปลอมขึ้น
            'student_code' => fake()->unique()->regexify('[0-9]{13}'),
            'first_name' => fake('th-TH')->name,
            'nick_name' => fake('th-TH')->name,
            'last_name' => fake('th-TH')->lastName,
            'first_name_en' => fake()->name(),
            'last_name_en' => fake()->lastName(),
            'major_id' => fake()->randomElement(['1','2','3','4','5']),
            'idcard' => fake()->unique()->regexify('[0-9]{13}'), //{ 13 } จำนวนว่าจะเอากี่หลัก
            'birthdate' => fake()->datetimeBetween(),
            'gender' => fake()->randomElement(['M','F','L','G','B','T','Q']),
            'address' => fake()->address(),
            'phone' => fake()->numerify('##########'),
            'email' => fake()->unique()->email()
        ];
    }
}
