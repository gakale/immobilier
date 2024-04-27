<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant; // Assurez-vous d'avoir un modèle Tenant
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function register(Request $request)
    {
        $tenant = new Tenant;
        $tenant->name = $request->name;
        $tenant->email = $request->email;
        $tenant->password = bcrypt($request->password);
        $tenant->save();

        return response()->json(['message' => 'Locataire enregistré avec succès'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['message' => 'Connecté avec succès'], 200);
        } else {
            return response()->json(['message' => 'Échec de la connexion'], 401);
        }
    }

    public function update(Request $request)
    {
        $tenant = Auth::user();
        $tenant->update($request->all());

        return response()->json(['message' => 'Informations mises à jour avec succès'], 200);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json(['message' => 'Déconnecté avec succès'], 200);
    }
}
