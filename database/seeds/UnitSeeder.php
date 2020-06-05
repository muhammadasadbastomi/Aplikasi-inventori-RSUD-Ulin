<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create('id_ID');

        // for ($i = 1; $i <= 12; $i++) {

        //     // insert data ke table pegawai
        //     DB::table('units')->insert([
        //         'uuid' => Str::random(36),
        //         'nama_unit' => $faker->name
        //     ]);
        // }

        DB::table('units')->insert([
            'uuid' => Str::random(36),
            'nama_unit' => 'Ruang Server'
        ]);
        DB::table('units')->insert([
            'uuid' => Str::random(36),
            'nama_unit' => 'Lab Rontgen'
        ]);
        DB::table('units')->insert([
            'uuid' => Str::random(36),
            'nama_unit' => 'Apotek'
        ]);
    }
}
