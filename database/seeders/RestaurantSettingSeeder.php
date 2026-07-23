<?php

namespace Database\Seeders;

use App\Models\OpeningHour;
use App\Models\RestaurantSetting;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class RestaurantSettingSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create main restaurant setting
        $setting = RestaurantSetting::create([
            'restaurant_name' => 'The Grand Taste',
            'tagline' => 'Experience the best local food',
            'short_description' => 'We serve authentic local and international cuisine.',
            'email' => 'hello@grandtaste.com',
            'currency_code' => 'LKR',
            'currency_symbol' => 'Rs.',
            'estimate_disclaimer' => 'This list is for price estimation only. It does not place an order.',
        ]);

        // 2. Create 7 days of opening hours (Monday to Sunday)
        for ($i = 1; $i <= 7; $i++) {
            OpeningHour::create([
                'restaurant_setting_id' => $setting->id,
                'day_of_week' => $i,
                'open_time' => '10:00:00',
                'close_time' => '22:00:00',
                'is_closed' => ($i == 1), // Monday closed as an example
                'display_order' => $i,
            ]);
        }

        // 3. Create social links
        $socials = [
            ['platform' => 'facebook', 'display_name' => 'Facebook', 'url' => 'https://facebook.com'],
            ['platform' => 'instagram', 'display_name' => 'Instagram', 'url' => 'https://instagram.com'],
            ['platform' => 'whatsapp', 'display_name' => 'WhatsApp', 'url' => 'https://wa.me/1234567890'],
        ];

        foreach ($socials as $index => $social) {
            SocialLink::create([
                'restaurant_setting_id' => $setting->id,
                'platform' => $social['platform'],
                'display_name' => $social['display_name'],
                'url' => $social['url'],
                'display_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}