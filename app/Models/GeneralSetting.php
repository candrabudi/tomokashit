<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_code',
        'agent_token',
        'agent_signature',
        'site_maintenance',
        'site_title',
        'site_description',
        'site_logo',
        'site_favicon',
        'contact_email',
        'contact_phone',
        'address',
        'social_facebook',
        'social_twitter',
        'social_instagram',
        'social_linkedin',
        'social_telegram',
        'meta_keywords',
        'meta_author',
        'live_chat_link',
        'live_chat_script',
    ];
}
