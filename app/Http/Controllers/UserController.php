<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('authors/index', [
            'title' => 'Authors',
            'active' => 'blog',
            'heading' => 'All Authors',
            'authors' => User::all(),
        ]);
    }
}
