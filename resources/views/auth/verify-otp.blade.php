<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification OTP - DakarApps</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #040d16;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }
        .card {
            background: rgba(1, 63, 129, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 0 34px 0 rgba(5, 119, 240, 0.2);
            width: 100%;
        }
        .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
        }
        .card-header h2 {
            color: white;
            font-size: 1.8rem;
            margin: 0;
            text-align: center;
        }
        .card-text {
            color: rgba(255, 255, 255, 0.8);
            text-align: center;
            margin-bottom: 2rem;
        }
        .form-label {
            color: #ffffff;
            font-weight: 500;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 8px;
            padding: 0.8rem;
            text-align: center;
            letter-spacing: 0.5em;
            font-size: 1.5rem;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #007bff;
            color: white;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .btn-primary {
            background-color: #013f81;
            border: none;
            padding: 0.8rem;
            border-radius: 8px;
            font-weight: 500;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #025ec0;
            box-shadow: 0 0 34px 0 rgba(5, 119, 240, 0.3);
            transform: translateY(-2px);
        }
        .alert {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.2);
            color: #ff6b6b;
            margin-bottom: 1.5rem;
        }
        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            border-color: rgba(40, 167, 69, 0.2);
            color: #2ecc71;
        }
        .otp-info {
            color: rgba(255, 255, 255, 0.6);
            text-align: center;
            font-size: 0.875rem;
            margin-top: 1rem;
        }
        .back-home {
            position: fixed;
            top: 20px;
            left: 20px;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }
        .back-home:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <a href="/" class="back-home">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        Retour
    </a>

    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Vérification OTP</h2>
                    </div>

                    <div class="card-body">
                        <p class="card-text">
                            Un code de vérification a été envoyé à votre adresse e-mail.
                            Veuillez l'entrer ci-dessous pour continuer.
                        </p>

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('verify.otp') }}">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="mb-4">
                                <label for="otp_code" class="form-label">Code OTP</label>
                                <input id="otp_code" type="text" class="form-control" name="otp_code" required autofocus maxlength="6" autocomplete="off">
                            </div>

                            <button type="submit" class="btn btn-primary">
                                Vérifier
                            </button>
                        </form>

                        <div class="otp-info">
                            Le code expire dans 5 minutes
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
