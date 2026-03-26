<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreManagedUserRequest;
use App\Http\Requests\Admin\UpdateManagedUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserManagementController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->orderByDesc('created_at')
            ->get();

        $totals = [
            'total' => $users->count(),
            'clientes' => $users->where('role', User::ROLE_CLIENTE)->count(),
            'empleados' => $users->where('role', User::ROLE_EMPLEADO)->count(),
            'gerentes' => $users->where('role', User::ROLE_GERENTE)->count(),
        ];

        return view('admin.users.index', compact('users', 'totals'));
    }

    public function create(): View
    {
        return view('admin.users.create', [
            'roles' => User::availableRoles(),
        ]);
    }

    public function store(StoreManagedUserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('management.users.show', $user)
            ->with('status', 'Usuario creado correctamente dentro del modulo administrativo.');
    }

    public function show(User $user): View
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => User::availableRoles(),
        ]);
    }

    public function update(UpdateManagedUserRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->user()->id === $user->id && ($validated['role'] ?? $user->role) !== User::ROLE_GERENTE) {
            return back()
                ->withErrors([
                    'role' => 'No puedes quitarte a ti mismo el rol de gerente desde este panel.',
                ])
                ->withInput();
        }

        $payload = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'role' => $validated['role'],
        ];

        if (!empty($validated['password'])) {
            $payload['password'] = Hash::make($validated['password']);
        }

        $user->update($payload);

        return redirect()
            ->route('management.users.show', $user)
            ->with('status', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if (request()->user()->id === $user->id) {
            return back()->with('error', 'No puedes eliminar tu propia cuenta de gerente desde este modulo.');
        }

        $userName = $user->name;
        $user->delete();

        return redirect()
            ->route('management.users.index')
            ->with('status', "El usuario {$userName} fue eliminado correctamente.");
    }
}
