<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;

class UserArticleSeeder extends Seeder
{
    public function run(): void
    {
        // Vérifier si l'utilisateur existe déjà
        $user = User::where('email', 'test@example.com')->first();

        if (!$user) {
            // Créer un utilisateur de test
            $user = User::create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);

            // Créer quelques articles pour cet utilisateur
            Article::create([
                'user_id' => $user->id,
                'titre' => 'Mon Premier Article',
                'contenu' => 'Ceci est le contenu de mon premier article. Il est très intéressant et instructif.',
                'image' => null
            ]);

            Article::create([
                'user_id' => $user->id,
                'titre' => 'Deuxième Article',
                'contenu' => 'Voici un autre article passionnant que j\'ai écrit pour partager mes réflexions.',
                'image' => null
            ]);

            Article::create([
                'user_id' => $user->id,
                'titre' => 'Article avec Image',
                'contenu' => 'Cet article est accompagné d\'une belle image pour illustrer mon propos.',
                'image' => null
            ]);
        }
    }
}
