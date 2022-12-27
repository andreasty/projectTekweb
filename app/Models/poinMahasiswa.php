<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class poinMahasiswa extends Model
{
    use HasFactory;
    public $table = "poin_mahasiswas";
    // protected $guarded = ['id'];
    protected $fillable = [
        'namaKegiatan',
        'kategori',
        'instansi',
        'tglKegiatan',
        'semester',
        'bukti',
        'status',
    ];
}
