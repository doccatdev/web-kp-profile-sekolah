<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramUnggulan extends Model
{
    use HasFactory;

    protected $table = 'school_programs';

    protected $fillable = [
        'nama_program',
        'slug',
        'thumbnail',
        'icon_class',
        'badge_text',
        'deskripsi_singkat',
        'deskripsi_program'
    ];


    public function galleries()
    {
        return $this->hasMany(ProgramUnggulanGalleri::class, 'school_programs_id');
    }
}
