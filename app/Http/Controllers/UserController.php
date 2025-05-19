<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    //

    public function  login(LoginRequest $request){
        try{
            // dd($request->all());
        if(Auth::attempt($request->only("name","password"))){
            $request->session()->regenerate();

            // dd(auth()->user()->role);
    
            if(auth()->user()->role === "admin" ||auth()->user()->role === "super_admin" ){
                return redirect()->route('admin.dashboard');
            }

            else if(auth()->user()->role === "prof"){
                return redirect()->route('int_prof.dashboard');
            }else{
                redirect()->back()->withErrors([
                    "Vous n'etes pas autorisé a acceder a cette application"
                ]);
            }
        }else{
            return redirect()->back()->withErrors([
                "Le nom d'utilisateur ou mot de passe incorrect"
            ]);

        }

        }catch(Exception $e){
            dd($e);
            return redirect()->back()->withErrors([
                "Erreur impossible de se connecter "
            ]);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/');
    }

    public function store(Request $request){

        dd($request);
    }

    public function create(){
        return view('auth.register');
    }


    public function destroy(Request $request){

    }

    public function update(Request $request){

    }


}
