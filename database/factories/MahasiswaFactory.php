<?php

namespace Database\Factories;

use App\Model;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    protected $model = Mahasiswa::class;

    public function definition(): array
    {
    	return [
    	    'name' => $this->faker->name(),
            'jurusan' => $this->faker->randomElement(["Teknik Informatika", "Sistem Informasi", "Hukum", "Sastra", "Politik", "Psikologi"]),
            'status' => $this->faker->randomElement([0, 1]),
            'phone_number' => $this->faker->phoneNumber,
    	];
    }
}
