<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $remember = (bool) ($credentials['remember'] ?? false);
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {
            return back()
                ->withErrors([
                    'email' => 'Las credenciales no coinciden con nuestros registros.',
                ])
                ->withInput($request->only('email', 'remember'));
        }

        $request->session()->regenerate();

        return redirect()->intended(route($this->dashboardRouteFor(Auth::user())));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('status', 'Tu sesión se cerró correctamente.');
    }

    protected function dashboardRouteFor(User $user): string
    {
        return $user->dashboardRouteName();
    }
}
