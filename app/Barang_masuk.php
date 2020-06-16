<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barang_masuk extends Model
{
    use Notifiable;
    use Uuid;

    protected $table = 'barangmasuks';

    public function supplier()
    {
        return $this->belongsTo(supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function masukdetail()
    {
        return $this->hasMany('App\Masukdetail', 'barangmasuk_id');
    }
}
