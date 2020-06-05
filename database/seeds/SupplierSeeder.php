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
        // $faker = Faker::create('id_ID');

        // for ($i = 1; $i <= 12; $i++) {

        //     // insert data ke table pegawai
        //     DB::table('suppliers')->insert([
        // 'uuid' => Str::random(36),
        // 'nama_suppliers' => $faker->name,
        // 'alamat' => $faker->address,
        // 'telepon' => $faker->numberBetween(12),
        // 'keterangan' => $faker->text
        //     ]);
        // }

        DB::table('suppliers')->insert([
            'uuid' => Str::random(36),
            'nama_suppliers' => 'PT. Anugrah Argon Medica',
            'alamat' => 'Banjarmasin',
            'telepon' => '088733212331',
            'keterangan' => 'Penyedia alat medis'
        ]);
        DB::table('suppliers')->insert([
            'uuid' => Str::random(36),
            'nama_suppliers' => 'PT. Delta Surya Alkesindo',
            'alamat' => 'Banjarmasin',
            'telepon' => '085335474359',
            'keterangan' => 'Penyedia alat medis'
        ]);
        DB::table('suppliers')->insert([
            'uuid' => Str::random(36),
            'nama_suppliers' => 'PT. Enseval Medika Prima',
            'alamat' => 'Banjarmasin',
            'telepon' => '089239434330',
            'keterangan' => 'Penyedia alat medis'
        ]);
        DB::table('suppliers')->insert([
            'uuid' => Str::random(36),
            'nama_suppliers' => 'PT. Trimegah Bersama',
            'alamat' => 'Banjarmasin',
            'telepon' => '085253434376',
            'keterangan' => 'Penyedia alat medis'
        ]);
        DB::table('suppliers')->insert([
            'uuid' => Str::random(36),
            'nama_suppliers' => 'PT. Saba Indomedika',
            'alamat' => 'Banjarmasin',
            'telepon' => '085115774311',
            'keterangan' => 'Penyedia Obat'
        ]);
    }
}
