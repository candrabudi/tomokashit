<?php

use Illuminate\Database\Seeder;
use App\Models\GameCategory; // Pastikan model GameCategory sudah dibuat dan sesuai

class GameCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'category_code' => 'igsgp-buy-feature',
                'translation_key' => 'Buy Spins',
                'status' => 1, // ACTIVE
                'game_count' => 684
            ],
            [
                'category_code' => 'igsgp-jackpot',
                'translation_key' => 'Jackpot',
                'status' => 1, // ACTIVE
                'game_count' => 22
            ],
            [
                'category_code' => 'igsgp-megaways',
                'translation_key' => 'Megaways',
                'status' => 1, // ACTIVE
                'game_count' => 70
            ],
            [
                'category_code' => 'igsgp-new',
                'translation_key' => 'New',
                'status' => 1, // ACTIVE
                'game_count' => 2400
            ],
            [
                'category_code' => 'igsgp-recommended',
                'translation_key' => 'Recommended',
                'status' => 1, // ACTIVE
                'game_count' => 206
            ],
            [
                'category_code' => 'igsgp-slots',
                'translation_key' => 'All Slots',
                'status' => 1, // ACTIVE
                'game_count' => 4734
            ],
            [
                'category_code' => 'igsgp-tablegames',
                'translation_key' => 'Table Games',
                'status' => 1, // ACTIVE
                'game_count' => 63
            ],
            [
                'category_code' => 'igsgp-top',
                'translation_key' => 'Top',
                'status' => 1, // ACTIVE
                'game_count' => 200
            ],
            [
                'category_code' => 'igsgp-hot-slots',
                'translation_key' => 'Hot',
                'status' => 1, // ACTIVE
                'game_count' => 23
            ],
            [
                'category_code' => 'igsgp-xmas-tournament',
                'translation_key' => 'Tournament Boosters',
                'status' => 1, // ACTIVE
                'game_count' => 13
            ]
        ];

        foreach ($categories as $category) {
            GameCategory::create($category);
        }
    }
}
