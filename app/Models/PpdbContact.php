<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PpdbContact extends Model
{
    protected $fillable = [
        'ppdb_info_id', 
        'nama_admin', 
        'nomor_whatsapp'
    ];

    public function ppdbInfo(): BelongsTo
    {
        return $this->belongsTo(PpdbInfo::class, 'ppdb_info_id');
    }
}