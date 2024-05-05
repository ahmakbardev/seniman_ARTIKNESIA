<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'jenis_karya_id'];

    public function jenisKarya()
    {
        return $this->belongsTo(JenisKarya::class);
    }
}
