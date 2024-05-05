<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = [
        'username', 'email', 'whatsapp', 'alamat', 'paket_id', 'deskripsi_diri', 'ss_pembayaran'
    ];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
