<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
class FSlotController extends Controller
{
    public function index()
    {
        set_time_limit(3600000);

        $topProviders = Provider::whereIn('provider_code', ['PRAGMATIC', 'PGSOFT', 'PLAYSON', 'EVOPLAY'])
            ->get();

        $gameProviders = Provider::with('games')
            ->get();

        $providerSlots = Provider::where('provider_type', 'slot')
            ->get()
            ->take(15);

        // Paginate games with 20 per page
        $games = Game::join('providers as pv', 'pv.id', '=', 'games.provider_id')
            ->whereIn('pv.provider_code', ['PRAGMATIC', 'PGSOFT', 'PLAYSON', 'EVOPLAY'])
            ->orderBy('game_alias', 'DESC')
            ->paginate(40);
        
        $allGames = Game::join('providers as pv', 'pv.id', '=', 'games.provider_id')
            ->whereIn('pv.provider_code', ['PRAGMATIC', 'PGSOFT', 'PLAYSON', 'EVOPLAY'])
            ->orderBy('game_alias', 'DESC')
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

        $providers = Provider::all(); 
        return view('frontend.slots.primary.index', compact('topProviders', 'gameProviders', 'providerSlots', 'games', 'images', 'providers', 'allGames'));
    }
    public function loadMoreGames(Request $request)
    {
        $page = $request->input('page', 1);
        $gamesPerPage = 24;

        $games = Game::join('providers as pv', 'pv.id', '=', 'games.provider_id')
            ->whereIn('pv.provider_code', ['PRAGMATIC', 'PGSOFT', 'PLAYSON', 'EVOPLAY'])
            ->skip(($page - 1) * $gamesPerPage)
            ->orderBy('game_alias', 'DESC')
            ->take($gamesPerPage)
            ->get();

        $totalPages = ceil(Game::count() / $gamesPerPage);

        return response()->json([
            'games' => $games,
            'total_pages' => $totalPages,
        ]);
    }

    public function providers()
    {
        $providers = Provider::all();
        return view('frontend.slots.provider.index', compact('providers'));
    }

    public function games($a)
    {
        $games = Provider::where('provider_alias', $a)
            ->with('games')
            ->first();

        return view('frontend.slots.games.index', compact('games'));
    }

    public function playGame($gameAlias)
    {
        $game = Game::where('game_alias', $gameAlias)
            ->first();
        if (!$game) {
            return redirect()->back();
        }
        $postArray = [
            'method' => 'game_launch',
            'agent_code' => 'ducduc',
            'agent_token' => 'c4648a633d8887d7d4f7bafc3dcfe656',
            'game_code' => $game->game_code,
            'provider_code' => $game->provider->provider_code,
            'user_code' => Auth::user()->member->ext_username,
            'lang' => 'en'
        ];

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])
            ->post('https://api.nexusggr.com', $postArray);

        $games = Game::where('provider_id', $game->provider_id)
            ->orderBy('game_status', 'DESC')
            ->get()
            ->take(15);
        $launchUrl = $response->json()['launch_url'];

        return redirect($launchUrl);
        // return view('frontend.casino.slots.gameplay.index', compact('launchUrl', 'game', 'games'));
    }

    public function createOrUpdateProvider()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://api.nexusggr.com', [
                    'method' => 'provider_list',
                    'agent_code' => 'ducduc',
                    'agent_token' => 'c4648a633d8887d7d4f7bafc3dcfe656',
                ]);

        $resJson = $response->json();

        if ($response->failed()) {
            return response()->json(['error' => 'Request failed'], 500);
        }

        foreach ($resJson['providers'] as $pv) {
            $c = Provider::where('provider_name', 'LIKE', '%' . $pv['name'] . '%')
                ->first();

            if ($c) {
                $c->provider_status = $pv['status'];
                $c->provider_code = $pv['code'];
                $c->save();
            } else {
                $s = new Provider();
                $s->provider_code = $pv['code'];
                $s->provider_name = $pv['name'];
                $s->provider_alias = Str::slug($pv['name']);
                $s->provider_status = $pv['status'];
                $s->provider_type = $pv['type'];
                $s->provider_code = $pv['code'];
                $s->provider_code = $pv['code'];
                $s->save();
            }
        }
    }

    public function createOrUpdateGame()
    {
        $providers = Provider::whereNotNull('provider_code')
            ->get();

        foreach ($providers as $pv) {

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post('https://api.nexusggr.com', [
                        'method' => 'game_list',
                        'agent_code' => 'ducduc',
                        'agent_token' => 'c4648a633d8887d7d4f7bafc3dcfe656',
                        'provider_code' => $pv['provider_code']
                    ]);

            $resJson = $response->json();

            if ($response->failed()) {
                return response()->json(['error' => 'Request failed'], 500);
            }
            if (isset($resJson['games'])) {
                foreach ($resJson['games'] as $gm) {
                    $bannerUrl = $gm['banner'];
                    $randomString = Str::random(10);
                    $base64Alias = base64_encode($gm['game_code'] . $randomString);

                    $game = Game::where('game_name', 'LIKE', '%' . $gm['game_name'] . '%')->first();

                    if ($game) {
                        $game->update([
                            'game_code' => $gm['game_code'],
                            'game_alias' => $base64Alias
                        ]);
                    } else {
                        Game::create([
                            'provider_id' => $pv->id,
                            'game_alias' => $base64Alias,
                            'game_name' => $gm['game_name'],
                            'game_code' => $gm['game_code'],
                            'game_image' => $bannerUrl,
                            'game_status' => $gm['status']
                        ]);
                    }
                }
            }

        }
    }

    // Fetch games with optional filters (provider and search)
    public function getGames(Request $request)
    {
        $query = Game::query();

        if ($request->has('provider') && $request->provider) {
            $query->where('provider_id', $request->provider);
        }

        if ($request->has('search') && $request->search) {
            $query->where('game_name', 'like', '%' . $request->search . '%');
        }

        $games = $query->with('provider')
            ->orderBy('game_status', 'DESC')
            ->join('providers as p', 'p.id', '=', 'games.provider_id')
            ->where('provider_type', 'slot')
            ->select('games.*')
            ->paginate(42);

        return response()->json([
            'games' => $games->items(),
            'nextPage' => $games->currentPage() + 1,
        ]);
    }

    public function getProviders()
    {
        $providers = Provider::all();
        return response()->json($providers);
    }




    // $response = Http::withHeaders([
    //     'X-Channel' => 'DESKTOP_AIR_PM',
    // ])->get('https://playdash77.com/api/gw/api/eva/slots/lobby/providers', [
    //     '_limit' => 800,  // This will limit the number of records
    //     '_start' => 0,    // Start from the 0th record
    //     'provider' => 'pragmatic-eva-asia',
    //     'status' => 'ACTIVE',
    // ]);

    // foreach ($response->json()['items'] as $provider) {
    //     $c = Provider::where('provider_name', $provider['translationKey'])->first();

    //     if (!$c) {
    //         $imageUrl = "https://images.evaplatform.tech/Casino/eva/providers/mini/".$provider['id'].'.svg';

    //         $imageContents = file_get_contents($imageUrl);

    //         $filename = Str::slug($provider['id']).'.svg';

    //         $filePath = public_path('provider_icon/'.$filename);
    //         File::put($filePath, $imageContents);

    //         $s = new Provider();
    //         $s->provider_name = $provider['translationKey'];
    //         $s->provider_alias = $provider['id'];
    //         $s->provider_image_desktop = 'provider_icon/' . $filename;
    //         $s->provider_image_mobile = 'provider_icon/' . $filename; 
    //         $s->provider_type = 'slot';
    //         $s->save();
    //     }
    // }

    // return $response->json();
    // $providers = Provider::whereIn('id', [53, 54, 55, 56, 57, 58, 59])
    //     ->get();

    // foreach ($providers as $pv) {
    //     $providerIconFolder = public_path('provider_icon');

    //     if (!File::exists($providerIconFolder)) {
    //         File::makeDirectory($providerIconFolder, 0755, true);
    //     }

    //     $response = Http::withHeaders([
    //         'X-Channel' => 'DESKTOP_AIR_PM',
    //     ])->timeout(3600)
    //         ->get('https://playdash77.com/api/gw/api/eva/slots/lobby/games', [
    //             '_limit' => 800,
    //             '_start' => 20,
    //             'provider' => $pv->provider_alias,
    //             'status' => 'ACTIVE',
    //         ]);

    //     $datas = $response->json()['items'];

    //     foreach ($datas as $dt) {
    //         $gm = Game::where('game_name', $dt['translationKey'])->first();

    //         if (!$gm) {
    //             $imageUrl = 'https://images.evaplatform.tech/cdn-cgi/image/width=360,height=360,fit=scale-down,format=auto/Casino/eva/games/' . $dt['id'] . '.png';

    //             // Memeriksa apakah URL gambar ada
    //             $headers = @get_headers($imageUrl);

    //             if ($headers && strpos($headers[0], '200')) {
    //                 // Jika gambar ditemukan (HTTP 200), lanjutkan unduhan
    //                 $context = stream_context_create([
    //                     'http' => [
    //                         'timeout' => 3600
    //                     ]
    //                 ]);

    //                 $imageContents = file_get_contents($imageUrl, false, $context);

    //                 if ($imageContents !== false) {
    //                     $filename = Str::slug($dt['id']) . '.png';
    //                     $filePath = public_path('game_image/' . $pv->provider_alias . '/' . $filename);

    //                     if (!File::exists(dirname($filePath))) {
    //                         File::makeDirectory(dirname($filePath), 0755, true);
    //                     }

    //                     File::put($filePath, $imageContents);

    //                     $gameImage = 'game_image/' . $pv->provider_alias . '/' . $filename;
    //                 } else {
    //                     $gameImage = null;  // Jika gagal mengunduh gambar
    //                 }
    //             } else {
    //                 // Jika URL gambar tidak ditemukan atau bukan 200 OK
    //                 $gameImage = null;
    //             }

    //             $s = new Game();
    //             $s->provider_id = $pv->id;
    //             $s->game_name = $dt['translationKey'];
    //             $s->game_image = $gameImage;  // Set gambar atau null
    //             $s->game_status = 0;
    //             $s->save();
    //         } else {
    //             $gm->game_image = 'game_image/' . $pv->provider_alias . '/' . $dt['id'] . '.png';
    //             $gm->save();
    //         }
    //     }
    // }

    // return $providers;
}
