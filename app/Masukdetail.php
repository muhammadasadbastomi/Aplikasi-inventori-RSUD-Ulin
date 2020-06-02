<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Masukdetail extends Model
{
    use Notifiable;
    use Uuid;
    protected $table = 'barangmasukdetails';

    public function barangmasuk()
    {
        return $this->belongsTo(Barang_masuk::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
