@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-6">Créer un nouvel article</h1>

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="titre" class="block text-gray-700 font-bold mb-2">Titre</label>
            <input type="text" name="titre" id="titre" 
                   class="w-full px-3 py-2 border rounded-lg @error('titre') border-red-500 @enderror" 
                   value="{{ old('titre') }}" required>
            @error('titre')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="contenu" class="block text-gray-700 font-bold mb-2">Contenu</label>
            <textarea name="contenu" id="contenu" rows="5"
                      class="w-full px-3 py-2 border rounded-lg @error('contenu') border-red-500 @enderror"
                      required>{{ old('contenu') }}</textarea>
            @error('contenu')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold mb-2">Image (optionnel)</label>
            <input type="file" name="image" id="image" 
                   class="w-full px-3 py-2 border rounded-lg @error('image') border-red-500 @enderror">
            @error('image')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">
                Créer l'article
            </button>
            <a href="{{ route('articles.index') }}" 
               class="text-gray-600 hover:text-gray-800 transition duration-300">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection
