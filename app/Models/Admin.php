<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';

    

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function profilPerusahaan()
    {
        return $this->hasOne(ProfilPerusahaan::class, 'id_admin', 'id_admin');
    }

    public function layanan()
    {
        return $this->hasMany(Layanan::class, 'id_admin', 'id_admin');
    }

    public function galeri()
    {
        return $this->hasMany(Galeri::class, 'id_admin', 'id_admin');
    }
}
