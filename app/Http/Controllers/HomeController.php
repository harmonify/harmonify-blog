<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'title' => 'Home',
            'active' => 'home',
        ]);
    }

    public function about()
    {
        return view('home.about', [
            'title' => 'About',
            'active' => 'about',
            'name' => 'Wendy Surya Wijaya',
            'age' => 21,
            'gender' => 'Male',
            'image' => 'me.jpg'
        ]);
    }
}
