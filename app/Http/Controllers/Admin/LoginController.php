<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{
    /**
     * Display the admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (View::exists('admin.auth.login')) {
            return view('admin.auth.login');
        } else {
            return response('Admin login view not found.', 500);
        }
    }

    /**
     * Handle an administrative login attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->route('admin.precommandes.index');
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect. Veuillez vérifier vos identifiants.',
            'password' => 'Email ou mot de passe incorrect. Veuillez vérifier vos identifiants.'
        ])->withInput($request->except('password'));
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
