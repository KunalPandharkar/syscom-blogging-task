<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class HomeController extends Controller
{

    public function home()
    {
        $data['featured_post'] =  Post::where('is_published', true)->latest()->first();
        $data['recent_posts'] = Post::where('is_published', true)
                            ->latest()
                            ->get();

        $data['tags'] = Post::where('is_published', true)
                            ->latest()
                            ->take(10)
                            ->get()
                            ->pluck('tags')
                            ->flatten()
                            ->flatMap(function ($item) {
                                return array_map('trim', explode(',', $item));
                            })
                            ->unique();

        $data['popular_posts'] = Post::where('is_published', true)
                            ->inRandomOrder()
                            ->take(6)
                            ->get();

        return view('welcome', $data);
    }

}
