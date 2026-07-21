<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RestaurantSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_name',
        'tagline',
        'short_description',
        'about_description',
        'logo_path',
        'hero_image_path',
        'address_line_1',
        'address_line_2',
        'city',
        'postal_code',
        'country',
        'phone_number',
        'secondary_phone_number',
        'email',
        'map_url',
        'map_embed_url',
        'currency_code',
        'currency_symbol',
        'estimate_disclaimer',
    ];

    public function openingHours(): HasMany
    {
        return $this->hasMany(OpeningHour::class);
    }

    public function socialLinks(): HasMany
    {
        return $this->hasMany(SocialLink::class);
    }
}