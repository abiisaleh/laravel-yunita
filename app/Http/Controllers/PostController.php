<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        return view('post');
    }
    public function show(string $slug): View
    {
        return view('user.profile', [
            // 'user' => User::findOrFail($id)
        ]);
    }
}
