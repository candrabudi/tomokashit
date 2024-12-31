<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FHomeController extends Controller
{
    public function index()
    {
        $slots = Provider::whereIn('provider_code', ['PRAGMATIC', 'PGSOFT','PLAYSON', 'EVOPLAY'])
            ->with('gamesActive')
            ->get();

        $images = [
            'https://s.spotbets.cc/pub/ad/zc5scx054kpd6kpmi3ycvkl7c695xdoo.png',
            'https://s.spotbets.cc/pub/ad/zc5scx01thjd6ai9d1x6hq58p44mqte3.png',
            'https://s.spotbets.cc/pub/ad/zc5scx0o39gd5sjmvdq6twu3sgro87vd.png',
            'https://s.spotbets.cc/pub/ad/zc5scx0o39gd5sjn199upww3vkjcmhxc.png',
            'https://s.spotbets.cc/pub/ad/zc5scx0o39gd5sjmhvycalq3jdqazirw.png',
            'https://s.spotbets.cc/pub/ad/zc5scx0o39gd5sjnfxjwq9g42p100c9s.png',
            'https://s.spotbets.cc/pub/ad/zc5scx0o39gd5u967di740yhu6iulgbo.png',
        ];
    
        $pragmatics = Game::join('providers as p', 'p.id', '=', 'games.provider_id')
            ->where('provider_code', 'PRAGMATIC')
            ->orderBy('game_alias', 'DESC')
            ->get()
            ->take(15);
        
        $pgosfts = Game::join('providers as p', 'p.id', '=', 'games.provider_id')
            ->where('provider_code', 'PGSOFT')
            ->orderBy('game_alias', 'DESC')
            ->get()
            ->take(15);

        return view('frontend.home.index', compact('slots', 'images', 'pragmatics', 'pgosfts'));
    }
}
