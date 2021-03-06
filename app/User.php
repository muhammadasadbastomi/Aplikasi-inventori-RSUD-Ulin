<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use Uuid;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
    public function barang_masuk()
    {
        return $this->hasMany(Barang_masuk::class);
    }
    public function barang_keluar()
    {
        return $this->hasMany(Barang_keluar::class);
    }
    public function photos()
    {
        if (!$this->photos) {
            return asset('img/default.png');
        }
        return asset('images/user/' . $this->photos);
    }
}
