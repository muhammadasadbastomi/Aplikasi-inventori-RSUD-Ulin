<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class pemesanan extends Model
{
    use Notifiable;
    use Uuid;

    public function unit()
    {
        return $this->belongsTo(unit::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pemesanandetail()
    {
        return $this->hasMany(Pemesanandetail::class);
    }
}
