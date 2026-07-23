<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Active categories tika saha ewat adala active/available menu items tika ganna
        // 'with' kiyana eken eager loading karanava (N+1 query problem eka nathi karanna)
        $categories = Category::query()->where('is_active', true)
            ->with(['menuItems' => function ($query) {
                $query->where('is_active', true)
                      ->orderBy('display_order');
            }])
            ->orderBy('display_order')
            ->get();

        // Data tika 'public.menu' view ekata yawanna
        return view('public.menu', [
            'categories' => $categories,
        ]);
    }
}