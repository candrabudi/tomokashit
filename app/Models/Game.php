<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id', 
        'game_alias', 
        'game_name', 
        'game_code', 
        'game_image', 
        'game_status'
    ];

    public function provider() {
        return $this->hasOne(Provider::class, 'id', 'provider_id');
    }
}
