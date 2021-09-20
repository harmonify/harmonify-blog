<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        return view('blog.authors', [
            'title' => 'Authors',
            'active' => 'blog',
            'heading' => 'All Authors',
            'authors' => User::paginate(10),
        ]);
    }
}
