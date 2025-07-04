<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\superAdminRegisterInfoRequest;
use App\Http\Requests\profRegisterInfoRequest;
use App\Models\InfoPerso;
use App\Models\User;
use App\Models\Prof;
use App\Models\Classe;
use App\Models\Eleve;
use Carbon\Carbon;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function dashboard()
    {
        $totalProfs = Prof::count(); // nombre total de profs

        // Nombre de profs créés cette semaine
        $currentWeekCount = Prof::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        // Nombre de profs créés la semaine dernière
        $lastWeekCount = Prof::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();

        // Pourcentage de variation
        $profVariation = $lastWeekCount == 0
            ? ($currentWeekCount > 0 ? 100 : 0)
            : round((($currentWeekCount - $lastWeekCount) / $lastWeekCount) * 100, 1);

            // Total classes
        $totalClasses = Classe::count();

        // Classes créées cette semaine
        $currentWeekClasses = Classe::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        // Classes créées la semaine dernière
        $lastWeekClasses = Classe::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();

        // Variation hebdo classes
        $classeVariation = $lastWeekClasses == 0
            ? ($currentWeekClasses > 0 ? 100 : 0)
            : round((($currentWeekClasses - $lastWeekClasses) / $lastWeekClasses) * 100, 1);

            // Total élèves
        $totalEleves = Eleve::count();

        // Élèves créés cette semaine
        $currentWeekEleves = Eleve::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        // Élèves créés la semaine dernière
        $lastWeekEleves = Eleve::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();

        // Variation hebdomadaire (%)
        $eleveVariation = $lastWeekEleves == 0
            ? ($currentWeekEleves > 0 ? 100 : 0)
            : round((($currentWeekEleves - $lastWeekEleves) / $lastWeekEleves) * 100, 1);

            // Total Admin
        $totalAdmin = Admin::count();

        // Classes créées cette semaine
        $currentWeekAdmin = Admin::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        // Admins créés la semaine dernière
        $lastWeekAdmin = Admin::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();

        // Variation hebdo classes
        $AdminVariation = $lastWeekAdmin == 0
            ? ($currentWeekAdmin > 0 ? 100 : 0)
            : round((($currentWeekAdmin - $lastWeekAdmin) / $lastWeekAdmin) * 100, 1);

            // Total Admin
        $totalAdmin = Admin::count();

        // Admin créés cette semaine
        $currentWeekAdmin = Admin::whereBetween('created_at', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        // Admin créés la semaine dernière
        $lastWeekAdmin = Admin::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfWeek(),
            Carbon::now()->subWeek()->endOfWeek()
        ])->count();

        // Variation hebdomadaire (%)
        $adminVariation = $lastWeekAdmin == 0
            ? ($currentWeekAdmin > 0 ? 100 : 0)
            : round((($currentWeekAdmin - $lastWeekAdmin) / $lastWeekAdmin) * 100, 1);

        // Dernières activités (ex: inscriptions récentes)
        $recentActivities = Eleve::latest()->take(5)->get(); // 5 derniers inscrits


        return view('super_admin.dashboard', [
            'totalProfs' => $totalProfs,
            'profVariation' => $profVariation,
            'totalClasses' => $totalClasses,
            'classeVariation' => $classeVariation,
            'totalEleves' => $totalEleves,
            'eleveVariation' => $eleveVariation,
            'adminVariation' => $adminVariation,
            'totalAdmin' => $totalAdmin,
            'adminVariation' => $adminVariation,
            'recentActivities' => $recentActivities
        ]);
    }



    public function index()
    {
        $admins = Admin::all();
        return view('super_admin.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function storeInfo(superAdminRegisterInfoRequest $request)
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

    public function store(profRegisterInfoRequest $request)
    {

        // dd($request->all());
        $validatedData = $request->validated();
        try{
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

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role' => 'prof',
        ]);

        Prof::create([
            'users_id' => $user->id,
            'info_perso_id' => $infoPerso->id,
            'specialite' => $validatedData['specialite'],
        ]);

        return redirect()->route('traitements.prof.index')->with('success', 'Prof ajouté avec succès.');
        }catch(\Exception $e){
            // dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('super_admin.index')->with('success', 'Admin supprimé.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }



}
