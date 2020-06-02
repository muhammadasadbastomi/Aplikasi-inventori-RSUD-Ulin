<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Keluardetail extends Model
{
    use Notifiable;
    use Uuid;
    protected $table = 'barangkeluardetails';

    public function barangkeluar()
    {
        return $this->belongsTo(Barang_keluar::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
