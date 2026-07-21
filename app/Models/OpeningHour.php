<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpeningHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_setting_id',
        'day_of_week',
        'open_time',
        'close_time',
        'is_closed',
        'display_order',
    ];

    protected function casts(): array
    {
        return [
            'day_of_week' => 'integer',
            'is_closed' => 'boolean',
            'display_order' => 'integer',
        ];
    }

    public function restaurantSetting(): BelongsTo
    {
        return $this->belongsTo(RestaurantSetting::class);
    }
}