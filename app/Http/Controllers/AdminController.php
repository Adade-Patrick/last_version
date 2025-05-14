<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        return view('admin.form');
    }

    public function showForm()
    {
        return view('admin.info');
    }



    public function storeInfo(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email',
            'motDePasse' => 'required|string|min:6',
            'adresse' => 'required|string',
            'telephone' => 'required|string',
        ]);

        $user = User::findOrFail(session('incomplete_user_id'));

    // Crée les infos admin liées à cet utilisateur
    $user->admin()->create([
        'adresse' => $request->adresse,
        'telephone' => $request->telephone,
        'idUsers' => $user->idUsers,
        // autres champs
    ]);


    // On supprime l'ID temporaire de la session
    Auth::login($user);
    session()->forget('incomplete_user_id');

    return redirect()->route('admin.admin-dashboard')->with('success', 'Profil Admin complété !');
    }



}

