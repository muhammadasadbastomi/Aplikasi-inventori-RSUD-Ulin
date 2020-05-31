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
        $merk = Merk::all()->pluck('id')->toArray();
        $satuan = Satuan::all()->pluck('id')->toArray();

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 12; $i++) {

            // insert data ke table pegawai
            DB::table('barangs')->insert([
                'uuid' => Str::random(36),
                'nama_barang' => $faker->name,
                'merk_id' => $faker->randomElement($merk),
                'satuan_id' => $faker->randomElement($satuan),
                'stok' => $faker->numberBetween(10, 20)
            ]);
        }
    }
}
