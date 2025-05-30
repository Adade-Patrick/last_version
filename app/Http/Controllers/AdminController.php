<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\adminRegisterInfoRequest;
use App\Http\Requests\profRegisterInfoRequest;
use App\Models\InfoPerso;
use App\Models\User;
use App\Models\Prof;


class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', ['admins' => $admins]);
    }

    public function storeProf(profRegisterInfoRequest $request)
    {
        try{
            $validatedData=$request->validated();

            // Enregistrement dans info_perso
        $infoPerso = InfoPerso::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'date_N' => $validatedData['date_N'],
            'lieu_N' => $validatedData['lieu_N'],
            'sexe' => $validatedData['sexe'],
            'nationalite' => $validatedData['nationalite'],
            'ville_residence' => $validatedData['ville_residence'],
            'telephone' => $validatedData['telephone'],
        ]);

        // Enregistrement dans users
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => 'admin',
        ]);

        // Enregistrement dans prof
        Prof::create([
            'users_id' => $user->id,
            'info_perso_id' => $infoPerso->id,
            'specialite' => "physique",

        ]);

        return redirect()->back()->with('success', 'Professeur enregistré avec succès.');
        }catch(\Exception $e){
            // dd($e);
        }
    }



    public function storeInfo(adminRegisterInfoRequest $request)
    {
        try{
            $validatedData=$request->validated();
            // dd($validatedData);

    // Enregistrement dans info_perso
        $infoPerso = InfoPerso::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'date_N' => $validatedData['date_N'],
            'lieu_N' => $validatedData['lieu_N'],
            'sexe' => $validatedData['sexe'],
            'nationalite' => $validatedData['nationalite'],
            'ville_residence' => $validatedData['ville_residence'],
            'telephone' => $validatedData['telephone'],
        ]);

        // Enregistrement dans users
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => 'admin',
        ]);

        // Enregistrement dans admin
        Admin::create([
            'users_id' => $user->id,
            'info_perso_id' => $infoPerso->id,

        ]);

        return redirect()->back()->with('success', 'Administrateur enregistré avec succès.');
        }catch(\Exception $e){
            // dd($e);
        }
    }

    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Admin supprimé.');
    }
}

