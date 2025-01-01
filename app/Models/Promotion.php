<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'is_active', 'turnover', 'total_turnover', 'minimum_deposit', 'maximum_deposit',
        'minimum_withdraw', 'maximum_withdraw', 'claim_type', 'status', 'start_date', 'end_date', 'promotion_type', 'banner'
    ];

    // Relasi dengan PromotionDetail
    public function details()
    {
        return $this->hasMany(PromotionDetail::class);
    }
}
