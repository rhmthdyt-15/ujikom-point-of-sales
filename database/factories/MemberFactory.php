<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Member::class;

    public function definition()
    {

        return [
            'kode_member' => $this->faker->unique()->word(),
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->optional()->address(),
            'telepon' => $this->faker->phoneNumber(),
        ];
    }
}
