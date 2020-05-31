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
}
