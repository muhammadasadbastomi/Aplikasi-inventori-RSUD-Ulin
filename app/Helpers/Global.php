<?php

use App\Barang;
use App\Barang_keluar;
use App\Barang_masuk;
use App\pemesanan;
use App\Supplier;
use App\Unit;

function totalBarang()
{
    return Barang::count();
}

function totalUnit()
{
    return Unit::count();
}

function totalSupplier()
{
    return Supplier::count();
}

function totalMasuk()
{
    return Barang_masuk::count();
}

function totalKeluar()
{
    return Barang_keluar::count();
}

function totalPemesanan()
{
    return Pemesanan::count();
}
