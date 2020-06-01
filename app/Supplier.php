<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Supplier extends Model
{
    use Notifiable;
    use Uuid;

    public function barang_masuk()
    {
        return $this->hasMany(Barang_masuk::class);
    }
}
