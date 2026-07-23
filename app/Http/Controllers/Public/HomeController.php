<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\OpeningHour;
use App\Models\RestaurantSetting;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $restaurant = RestaurantSetting::query()->first();

        $featuredItems = MenuItem::query()
                                 ->where('is_active', true)
                                 ->where('is_featured', true)
                                 ->orderBy('display_order')
                                 ->get();

        $openingHours = OpeningHour::query()->orderBy('display_order')->get();

        $socialLinks = SocialLink::query()
                                 ->where('is_active', true)
                                 ->orderBy('display_order')
                                 ->get();

        return view('public.home', [
            'restaurant' => $restaurant,
            'featuredItems' => $featuredItems,
            'openingHours' => $openingHours,
            'socialLinks' => $socialLinks,
        ]);
    }
}