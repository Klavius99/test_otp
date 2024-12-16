@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Tableau de Bord</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($articles as $article)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition hover:shadow-xl">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" 
                         alt="{{ $article->titre }}" 
                         class="w-full h-48 object-cover">
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $article->titre }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($article->contenu, 100) }}</p>
                    <div class="flex justify-between items-center">
                        <a href="{{ route('articles.edit', $article->id) }}" 
                           class="text-blue-500 hover:underline">Modifier</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" 
                              onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-500 hover:underline">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-600">Vous n'avez pas encore d'articles.</p>
                <a href="{{ route('articles.create') }}" 
                   class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Créer votre premier article
                </a>
            </div>
        @endforelse
    </div>

    @if($articles->count() > 0)
        <div class="mt-6">
            {{ $articles->links() }}
        </div>
    @endif
</div>
@endsection
