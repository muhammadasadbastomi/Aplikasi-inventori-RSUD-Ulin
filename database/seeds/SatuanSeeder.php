<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SatuanSeeder extends Seeder
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
            DB::table('satuans')->insert([
                'uuid' => Str::random(36),
                'nama_satuan' => $faker->name
            ]);
        }
    }
}
