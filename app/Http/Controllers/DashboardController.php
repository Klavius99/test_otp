<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::where('user_id', Auth::id())
            ->latest()
            ->paginate(6);

        return view('dashboard', compact('articles'));
    }
}
