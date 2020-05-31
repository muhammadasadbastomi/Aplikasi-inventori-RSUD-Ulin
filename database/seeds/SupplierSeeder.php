<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {

            // insert data ke table pegawai
            DB::table('suppliers')->insert([
                'uuid' => Str::random(36),
                'nama_suppliers' => $faker->name,
                'alamat' => $faker->address,
                'telepon' => $faker->numberBetween(12),
                'keterangan' => $faker->text
            ]);
        }
    }
}
