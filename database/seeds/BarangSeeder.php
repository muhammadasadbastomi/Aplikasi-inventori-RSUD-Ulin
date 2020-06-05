<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Merk;
use App\Satuan;

class BarangSeeder extends Seeder
{
    public function run()
    {
        // $merk = Merk::all()->pluck('id')->toArray();
        // $satuan = Satuan::all()->pluck('id')->toArray();

        // $faker = Faker::create('id_ID');

        // for ($i = 1; $i <= 12; $i++) {

        //     // insert data ke table barang
        //     DB::table('barangs')->insert([
        //         'uuid' => Str::random(36),
        //         'nama_barang' => $faker->name,
        //         'merk_id' => $faker->randomElement($merk),
        //         'satuan_id' => $faker->randomElement($satuan),
        //         'stok' => $faker->numberBetween(10, 20)
        //     ]);
        // }

        DB::table('barangs')->insert([
            'uuid' => Str::random(36),
            'nama_barang' => 'Solution Pack Na/K/Cl 800 ml',
            'merk_id' => 1,
            'satuan_id' => 3,
            'stok' => '24'
        ]);
        DB::table('barangs')->insert([
            'uuid' => Str::random(36),
            'nama_barang' => 'Cuvette 1000 pcs (SUC-400A)',
            'merk_id' => 2,
            'satuan_id' => 4,
            'stok' => '5'
        ]);
        DB::table('barangs')->insert([
            'uuid' => Str::random(36),
            'nama_barang' => 'S. Paratyphi BH',
            'merk_id' => 3,
            'satuan_id' => 3,
            'stok' => '16'
        ]);
        DB::table('barangs')->insert([
            'uuid' => Str::random(36),
            'nama_barang' => 'Calcium Chloride 10 x 15 mL',
            'merk_id' => 2,
            'satuan_id' => 1,
            'stok' => '9'
        ]);
        DB::table('barangs')->insert([
            'uuid' => Str::random(36),
            'nama_barang' => 'S. Paratyphi AH',
            'merk_id' => 3,
            'satuan_id' => 3,
            'stok' => '28'
        ]);
    }
}
