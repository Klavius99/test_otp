<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soutenance PFF DFE</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
            min-height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        nav {
            display: flex;
            align-content: center;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            width: 100%;
            z-index: 1000;
            padding: 4px 100px;
        }
        .navbar {
            justify-content: center;
            list-style: none;
            display: flex;
            gap: 10px;
        }
        .nav-item a{
            display: flex;
        }
        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            color: #fff;
        }
        .btn-login {
            border: 1px solid #007bff;
            color: #007bff;
        }
        .btn-register {
            background-color: #013f81;
        }
        .btn-login:hover {
            background-color: transparent;
            color: #013f81;
            box-shadow: 0 0 34px 0 #025ec0;
        }
        .btn-register:hover {
            background-color: #013f81;
            color: white;
            box-shadow: 0 0 34px 0 #0577f0;
        }

        .slider-container {
            height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 60px;
        }

        .slider {
            display: flex;
            animation: slide 120s linear infinite;
            gap: 20px;
        }

        .slide {
            flex: 0 0 auto;
            width: 400px;
            height: 300px;
            position: relative;
            overflow: hidden;
            border-radius: 15px;
            transform: scale(0.98);
            transition: transform 0.3s ease;
        }

        .slide:hover {
            transform: scale(1);
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .slide:hover img {
            transform: scale(1.1);
        }

        @keyframes slide {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        /* Style pour le contrôle audio */
        .audio-control {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
            background: rgba(1, 63, 129, 0.3);
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .audio-control:hover {
            background: rgba(1, 63, 129, 0.6);
        }
        .audio-icon {
            width: 24px;
            height: 24px;
            fill: white;
        }
    </style>
</head>
<body>
    <nav>
        <h2 style="color: #030f1b; font-size: 24px; font-family:serif;">
            <span style="font-weight: bolder; font-size: 28px; color: rgb(5, 5, 114);">G</span>ALERIE DFE
        </h2>
        <ul class="navbar align-items-center">
            <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-login">Connexion</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}" class="btn btn-register">Inscription</a>
            </li>
        </ul>
    </nav>

    <!-- Audio caché -->
    <audio id="bgMusic" loop>
        <source src="{{ asset('music/music_test.mp3') }}" type="audio/mp3">
    </audio>

    <!-- Bouton de contrôle audio -->
    <div class="audio-control" onclick="toggleMusic()">
        <svg class="audio-icon" id="audioIcon" viewBox="0 0 24 24">
            <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>
        </svg>
    </div>

    <div class="slider-container">
        <div class="slider">
            <!-- Premier groupe d'images -->
            <div class="slide">
                <img src="{{ asset('images/Boss.jpg') }}" alt="Boss">
            </div>
            <div class="slide">
                <img src="{{ asset('images/EmilieWeuz.jpg') }}" alt="EmilieWeuz">
            </div>
            <div class="slide">
                <img src="{{ asset('images/Kevin_1.jpg') }}" alt="Kevin">
            </div>
            <div class="slide">
                <img src="{{ asset('images/LLO.jpg') }}" alt="LLO">
            </div>
            <div class="slide">
                <img src="{{ asset('images/OmarLamine.jpg') }}" alt="Omar Lamine">
            </div>
            <div class="slide">
                <img src="{{ asset('images/Team_Mercredi.jpg') }}" alt="Team Mercredi">
            </div>
            <div class="slide">
                <img src="{{ asset('images/dfe_g1.jpg') }}" alt="DFE Groupe 1">
            </div>
            <div class="slide">
                <img src="{{ asset('images/dfe_g1_2.jpg') }}" alt="DFE Groupe 1-2">
            </div>
            <div class="slide">
                <img src="{{ asset('images/dfe_g1_3.jpg') }}" alt="DFE Groupe 1-3">
            </div>
            <div class="slide">
                <img src="{{ asset('images/diarra.jpg') }}" alt="Diarra">
            </div>
            <div class="slide">
                <img src="{{ asset('images/leila.jpg') }}" alt="Leila">
            </div>
            <div class="slide">
                <img src="{{ asset('images/men_in_black.jpg') }}" alt="Men in Black">
            </div>
            <div class="slide">
                <img src="{{ asset('images/men_in_black_2.jpg') }}" alt="Men in Black 2">
            </div>
            <div class="slide">
                <img src="{{ asset('images/omar_1.jpg') }}" alt="Omar 1">
            </div>
            <div class="slide">
                <img src="{{ asset('images/omar_2.jpg') }}" alt="Omar 2">
            </div>
            <div class="slide">
                <img src="{{ asset('images/omar_3.jpg') }}" alt="Omar 3">
            </div>
            <div class="slide">
                <img src="{{ asset('images/salimata.jpg') }}" alt="Salimata">
            </div>

            <!-- Répétition des images pour un défilement infini -->
            <div class="slide">
                <img src="{{ asset('images/Boss.jpg') }}" alt="Boss">
            </div>
            <div class="slide">
                <img src="{{ asset('images/EmilieWeuz.jpg') }}" alt="EmilieWeuz">
            </div>
            <div class="slide">
                <img src="{{ asset('images/Kevin_1.jpg') }}" alt="Kevin">
            </div>
            <div class="slide">
                <img src="{{ asset('images/LLO.jpg') }}" alt="LLO">
            </div>
            <div class="slide">
                <img src="{{ asset('images/OmarLamine.jpg') }}" alt="Omar Lamine">
            </div>
            <div class="slide">
                <img src="{{ asset('images/Team_Mercredi.jpg') }}" alt="Team Mercredi">
            </div>
            <div class="slide">
                <img src="{{ asset('images/dfe_g1.jpg') }}" alt="DFE Groupe 1">
            </div>
            <div class="slide">
                <img src="{{ asset('images/dfe_g1_2.jpg') }}" alt="DFE Groupe 1-2">
            </div>
            <div class="slide">
                <img src="{{ asset('images/dfe_g1_3.jpg') }}" alt="DFE Groupe 1-3">
            </div>
            <div class="slide">
                <img src="{{ asset('images/diarra.jpg') }}" alt="Diarra">
            </div>
            <div class="slide">
                <img src="{{ asset('images/leila.jpg') }}" alt="Leila">
            </div>
            <div class="slide">
                <img src="{{ asset('images/men_in_black.jpg') }}" alt="Men in Black">
            </div>
            <div class="slide">
                <img src="{{ asset('images/men_in_black_2.jpg') }}" alt="Men in Black 2">
            </div>
            <div class="slide">
                <img src="{{ asset('images/omar_1.jpg') }}" alt="Omar 1">
            </div>
            <div class="slide">
                <img src="{{ asset('images/omar_2.jpg') }}" alt="Omar 2">
            </div>
            <div class="slide">
                <img src="{{ asset('images/omar_3.jpg') }}" alt="Omar 3">
            </div>
            <div class="slide">
                <img src="{{ asset('images/salimata.jpg') }}" alt="Salimata">
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Lecture automatique de la musique
        document.addEventListener('DOMContentLoaded', function() {
            const music = document.getElementById('bgMusic');
            const audioIcon = document.getElementById('audioIcon');
            music.volume = 0.5; // Volume à 50%
            music.play().catch(function(error) {
                console.log("La lecture automatique a été bloquée");
            });
        });

        // Fonction pour activer/désactiver la musique
        function toggleMusic() {
            const music = document.getElementById('bgMusic');
            const audioIcon = document.getElementById('audioIcon');
            
            if (music.paused) {
                music.play();
                audioIcon.innerHTML = '<path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02zM14 3.23v2.06c2.89.86 5 3.54 5 6.71s-2.11 5.85-5 6.71v2.06c4.01-.91 7-4.49 7-8.77s-2.99-7.86-7-8.77z"/>';
            } else {
                music.pause();
                audioIcon.innerHTML = '<path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>';
            }
        }
    </script>
</body>
</html>
