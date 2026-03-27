<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user && method_exists($user, 'dashboardRouteName')) {
            return redirect()->route($user->dashboardRouteName());
        }

        return view('dashboard');
    }

    public function cliente(): View
    {
        return view('dashboards.cliente');
    }

    public function empleado(): View
    {
        return view('dashboards.empleado');
    }

    public function gerente(): View
    {
        return view('dashboards.gerente');
    }

    public function profile(): View
    {
        return view('user.profile');
    }

    public function orders(): View
    {
        return view('user.orders');
    }
}
