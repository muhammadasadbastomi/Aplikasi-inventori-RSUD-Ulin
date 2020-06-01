<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pemesanandetail extends Model
{
    use Notifiable;
    use Uuid;

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
