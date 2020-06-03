<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barang_keluar extends Model
{
    use Notifiable;
    use Uuid;

    protected $table = 'barangkeluars';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function keluardetail()
    {
        return $this->hasMany('App\Keluardetail', 'barangkeluar_id');
    }
}
