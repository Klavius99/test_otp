@extends('layouts.app')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-6">Mes Articles</h1>

    <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block">
        Créer un nouvel article
    </a>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($articles->isEmpty())
        <p class="text-gray-600">Aucun article n'a été créé pour le moment.</p>
    @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($articles as $article)
                <div class="bg-gray-100 p-4 rounded-lg shadow-sm">
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" 
                             alt="{{ $article->title }}" 
                             class="w-full h-48 object-cover">
                    @endif
                    <h2 class="text-xl font-semibold mb-2">{{ $article->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($article->message, 100) }}</p>
                    <div class="flex justify-between">
                        <a href="{{ route('articles.show', $article) }}" class="text-blue-500 hover:underline">Voir</a>
                        <a href="{{ route('articles.edit', $article) }}" class="text-green-500 hover:underline">Modifier</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
