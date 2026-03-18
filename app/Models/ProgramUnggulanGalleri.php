<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramUnggulanGalleri extends Model
{
    use HasFactory;

    protected $table = 'school_programs_galery';

    protected $fillable = ['school_programs_id', 'image', 'caption'];

    public function program()
    {
        return $this->belongsTo(ProgramUnggulan::class, 'program_unggulan_id');
    }
}
