<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_code',    // Kode kategori (misalnya: 'igsgp-buy-feature')
        'translation_key',  // Kunci terjemahan (misalnya: 'Buy Spins')
        'status',           // Status (0: Nonaktif, 1: Aktif)
        'game_count'        // Jumlah game yang terkait dengan kategori
    ];
}
