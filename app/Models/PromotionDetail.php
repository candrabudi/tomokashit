<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromotionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'promotion_id', 'detail_name', 'detail_value'
    ];

    // Relasi dengan Promotion
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
