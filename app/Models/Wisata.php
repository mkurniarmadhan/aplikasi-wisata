<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Wisata extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaWisata',
        'lokasiWisata',
        'deskripsiWisata',
        'tarifMasuk',
        'foto'
    ];


    protected function foto(): Attribute
    {
        return Attribute::make(
            get: function ($foto) {
                if (!$foto) {
                    return 'https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg';
                }
                return asset('images/wisata/') . '/' . $foto;
            },
        );
    }
}
