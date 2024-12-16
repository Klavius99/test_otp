<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\OtpVerification;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Générer un code OTP
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // Créer une vérification OTP
        OtpVerification::create([
            'email' => $request->email,
            'otp_code' => $otp,
            'expires_at' => Carbon::now()->addMinutes(5),
        ]);

        // Stocker les données de l'utilisateur en session
        session([
            'registration_data' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        ]);

        // Envoyer l'email avec le code OTP
        Mail::to($request->email)->send(new OtpMail($otp));

        return redirect()->route('verify.otp.form', ['email' => $request->email])
            ->with('success', 'Un code de vérification a été envoyé à votre email.');
    }

    public function showVerifyOtpForm(Request $request)
    {
        return view('auth.verify-otp', ['email' => $request->email]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp_code' => 'required|string|size:6',
        ]);

        $verification = OtpVerification::where('email', $request->email)
            ->where('otp_code', $request->otp_code)
            ->where('verified', false)
            ->where('expires_at', '>', Carbon::now())
            ->first();

        if (!$verification) {
            return back()->withErrors(['otp_code' => 'Code OTP invalide ou expiré.']);
        }

        $verification->update(['verified' => true]);

        // Récupérer les données d'inscription et créer l'utilisateur
        $userData = session('registration_data');
        
        if (!$userData) {
            return redirect()->route('register')
                ->withErrors(['email' => 'Session expirée. Veuillez recommencer l\'inscription.']);
        }

        try {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
            ]);

            Auth::login($user);
            
            // Nettoyer la session
            session()->forget('registration_data');

            return redirect('/dashboard')->with('success', 'Inscription réussie !');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Erreur lors de la création du compte. Veuillez réessayer.']);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
