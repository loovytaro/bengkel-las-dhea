<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    //
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';

    protected $fillable = [
        'id_admin',
        'nama_layanan',
        'deskripsi_layanan',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
}
