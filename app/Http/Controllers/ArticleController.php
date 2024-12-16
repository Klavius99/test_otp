<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Auth\Access\AuthorizationException;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::where('user_id', Auth::id())->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable'
        ]);

        $article = new Article($validatedData);
        $article->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
            $article->image = $imagePath;
        }

        $article->save();

        return redirect()->route('dashboard')->with('success', 'Article créé avec succès !');
    }

    public function show(Article $article)
    {
        try {
            $this->authorize('view', $article);
        } catch (AuthorizationException $e) {
            // Gérer l'exception d'autorisation
        }
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        try {
            $this->authorize('update', $article);
        } catch (AuthorizationException $e) {
            // Gérer l'exception d'autorisation
        }
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        try {
            $this->authorize('update', $article);
        } catch (AuthorizationException $e) {
            // Gérer l'exception d'autorisation
        }

        $validatedData = $request->validate([
            'titre' => 'required|max:255',
            'contenu' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable'
        ]);

        $article->fill($validatedData);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            $imagePath = $request->file('image')->store('articles', 'public');
            $article->image = $imagePath;
        }

        $article->save();

        return redirect()->route('dashboard')->with('success', 'Article mis à jour avec succès !');
    }

    public function destroy(Article $article)
    {
        try {
            $this->authorize('delete', $article);
        } catch (AuthorizationException $e) {
            // Gérer l'exception d'autorisation
        }

        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('dashboard')->with('success', 'Article supprimé avec succès !');
    }
}
