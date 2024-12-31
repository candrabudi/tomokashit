<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    public function games()
    {
        return $this->hasMany(Game::class, 'provider_id', 'id')
            ->orderBy('game_status', 'DESC');
    }

    public function gamesActive()
    {
        return $this->hasMany(Game::class, 'provider_id', 'id')
            ->where('game_status', 1);
    }
}
