<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'user_id', 'images', 'size_x', 'size_y', 'weight', 'material', 'philosophy', 'price', 'stock', 'category_id', 'status', 'messages'
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with Subkategori
    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class, 'category_id', 'id');
    }
}
