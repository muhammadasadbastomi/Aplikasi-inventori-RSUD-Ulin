<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MerkSeeder extends Seeder
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
        //     DB::table('merks')->insert([
        //         'uuid' => Str::random(36),
        //         'nama_merk' => $faker->name
        //     ]);
        DB::table('merks')->insert([
            'uuid' => Str::random(36),
            'nama_merk' => 'Easy Lite Plus'
        ]);
        DB::table('merks')->insert([
            'uuid' => Str::random(36),
            'nama_merk' => 'Sysmex'
        ]);
        DB::table('merks')->insert([
            'uuid' => Str::random(36),
            'nama_merk' => 'Delta Diagnostik'
        ]);
        DB::table('merks')->insert([
            'uuid' => Str::random(36),
            'nama_merk' => 'Bio-Rad'
        ]);
        DB::table('merks')->insert([
            'uuid' => Str::random(36),
            'nama_merk' => 'Vitex 2'
        ]);
    }
}
