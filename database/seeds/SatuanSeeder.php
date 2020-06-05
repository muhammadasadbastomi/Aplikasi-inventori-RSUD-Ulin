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
        // $faker = Faker::create('id_ID');

        // for ($i = 1; $i <= 12; $i++) {

        //     // insert data ke table pegawai
        //     DB::table('satuans')->insert([
        //         'uuid' => Str::random(36),
        //         'nama_satuan' => $faker->name
        //     ]);
        // }

        DB::table('satuans')->insert([
            'uuid' => Str::random(36),
            'nama_satuan' => 'botol'
        ]);
        DB::table('satuans')->insert([
            'uuid' => Str::random(36),
            'nama_satuan' => 'box'
        ]);
        DB::table('satuans')->insert([
            'uuid' => Str::random(36),
            'nama_satuan' => 'kit'
        ]);
        DB::table('satuans')->insert([
            'uuid' => Str::random(36),
            'nama_satuan' => 'pack'
        ]);
        DB::table('satuans')->insert([
            'uuid' => Str::random(36),
            'nama_satuan' => 'pcs'
        ]);
    }
}
