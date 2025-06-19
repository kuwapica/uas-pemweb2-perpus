<?php

namespace App\Models;

use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';

    protected $fillable = [
        'buku_id',
        'anggota_id',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function Buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function Anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
