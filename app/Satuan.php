<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Satuan extends Model
{
    use Notifiable;
    use Uuid;

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
