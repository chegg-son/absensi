<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Pegawai::create([
                'nip' => $faker->ean8,
                'nama' => $faker->firstName,
                'bidang' => $faker->jobTitle,
            ]);
        }
    }
}
