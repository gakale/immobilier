<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant; // Assurez-vous d'avoir un modèle Tenant
use Illuminate\Support\Facades\Validator; // Utilisez cette classe à la place
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TenantController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $tenant = $this->create($request->all());
        Auth::login($tenant);
        return redirect()->route('index');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tenants'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $tenant = Tenant::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return $tenant;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('tenant')->attempt($credentials)) {
            return redirect()->route('profile');
        }

        return back()->withErrors(['email' => 'Les informations de connexion ne sont pas valides.']);
    }

    public function logout()
    {
        Auth::guard('tenant')->logout();
        return redirect()->route('index');
    }

    public function showDashboard()
    {
        $tenant = Auth::guard('tenant')->user();
        return view('profile.dashboard', compact('tenant'));
    }

    public function showProfile()
    {
        $tenant = Auth::guard('tenant')->user()->name;
        return view('layouts.details-user', compact('tenant'));
    }


    public function showEditForm()
    {
        $tenant = Auth::guard('tenant')->user();
        return view('profile.settings', compact('tenant'));
    }

    public function edit(Request $request)
    {
        $tenant = Auth::guard('tenant')->user();
        $tenant->update($request->all());
        return redirect()->route('profile');
    }
}
