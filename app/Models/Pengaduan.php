<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $fillable = [
        'user_id',
        'kode',
        'nama_pelapor',
        'jabatan_pelapor',
        'departemen',
        'nama_mesin',
        'tanggal_laporan',
        'tanggal_perbaikan',
        'hasil_perbaikan',
        'keterangan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
