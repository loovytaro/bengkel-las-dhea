<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    //
    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'id_admin',
        'nama_galeri',
        'kategori_galeri',
        'foto',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}
