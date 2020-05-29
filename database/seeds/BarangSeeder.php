<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BarangSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {

            // insert data ke table pegawai
            DB::table('barangs')->insert([
                'uuid' => Str::random(36),
                'nama' => $faker->name,
                'id_merk' => $faker->numberBetween(25, 40),
                'id_satuan' => $faker->numberBetween(25, 40),
                'stok' => $faker->numberBetween(25, 40)
            ]);
        }
    }
}
