<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasGaleri extends Model
{
    use HasFactory;

    protected $table = 'facilities_photos';
    protected $fillable = ['facilities_id', 'image', 'caption'];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'facilities_id');
    }
}
