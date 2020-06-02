<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barang extends Model
{
    use Notifiable;
    use Uuid;

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }
    public function pemesanandetail()
    {
        return $this->hasMany(Pemesanandetail::class);
    }
    public function masukdetail()
    {
        return $this->hasMany(Masukdetail::class);
    }
    public function keluardetail()
    {
        return $this->hasMany(Keluardetail::class);
    }
}
