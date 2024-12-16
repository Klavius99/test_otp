@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
    @if($article->image)
        <img src="{{ asset('storage/' . $article->image) }}" 
             alt="{{ $article->titre }}" 
             class="w-full h-96 object-cover">
    @endif

    <div class="p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $article->titre }}</h1>
        
        <div class="prose max-w-none mb-6">
            {!! nl2br(e($article->contenu)) !!}
        </div>

        <div class="flex justify-between items-center border-t pt-4">
            <p class="text-gray-600">
                Créé le {{ $article->created_at->format('d/m/Y à H:i') }}
            </p>

            <div class="flex space-x-4">
                <a href="{{ route('articles.edit', $article) }}" 
                   class="text-blue-500 hover:text-blue-700 transition">
                    Modifier
                </a>
                <form action="{{ route('articles.destroy', $article) }}" method="POST" 
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cet article ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="text-red-500 hover:text-red-700 transition">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
