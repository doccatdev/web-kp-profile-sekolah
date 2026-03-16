<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekolahProfile extends Model
{
    use HasFactory;

    protected $table = 'sekolah_profiles';

    protected $fillable = [
        'profil_sekolah',
        'visi',
        'misi',
        'sejarah_singkat',
        'logo_sekolah'
    ];

}
