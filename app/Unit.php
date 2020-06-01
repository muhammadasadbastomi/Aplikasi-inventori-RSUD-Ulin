<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Unit extends Model
{
    use Notifiable;
    use Uuid;

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function barangkeluar()
    {
        return $this->hasMany(Barang_keluar::class);
    }
}
