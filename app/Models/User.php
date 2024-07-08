<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username', 'email', 'whatsapp', 'alamat', 'paket_id', 'deskripsi_diri', 'ss_pembayaran', 'status', 'password', 'email_verified_at', 'provinsi_id', 'id_seniman', 'jenis_karya', 'subkategori', 'kota_id', 'role_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->username = 'Seniman_' . Str::uuid()->toString();
        });
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    // Relasi dengan Subkategori
    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class, 'subkategori');
    }

    public function jenisKarya()
    {
        return $this->belongsTo(JenisKarya::class, 'jenis_karya');
    }
}
