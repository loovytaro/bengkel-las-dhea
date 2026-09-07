<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilPerusahaan extends Model
{
    //
    protected $table = 'profil_perusahaan';
    protected $primaryKey = 'id_profil';

    protected $fillable = [
        'id_admin',
        'nama_perusahaan',
        'tentang_perusahaan',
        'alamat',
        'telepon',
        'jam_operasional',
        'maps_embed',
        'logo',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}
