<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUsersRequest;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\InfoPerso;
use App\Models\AnneeScolaire;
use App\Models\Eleve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Events\UserRegisterEvent;

class UserApiController extends Controller
{
    //

    function login(LoginRequest $request){

        try{
            if(auth()->attempt($request->only('name', 'password'))){
                $user = auth()->user();
                $token = $user->createToken(config('app.key'))->plainTextToken;

                return response()->json([
                    'message'=>"user connected successfully",
                    'accessToken'=>$token,
                    'refreshToken'=>$token,
                ]);
            }else{
                return response()->json([
                    'message'=>'invalide creadentials',
                ],400);
            }
        }catch(Exception $e){
            return response()->json(['message' => 'Erreur lors de la connexion'], 500);
        }
    }

    function logout(Request $request){
        // Vérifier si l'utilisateur est authentifié
        try{
            if(auth()->check()){
                auth()->user()->tokens()->delete();
                return response()->json([
                   'message'=>"user disconnected successfully",
                ]);
            }else{
                return response()->json([
                   'message'=>"user not connected",
                ],400);
            }
        }catch(Exception $e){
            return response()->json(['message' => 'Erreur lors de la déconnexion'], 500);
        }

    }

    function refresh(Request $request) {
        // Vérifier si l'utilisateur est authentifié
        try{
            $user = auth()->user();

            if (!$user) {
                return response()->json(['message' => 'Token invalide ou expiré'], 401);
            }

            // Récupérer le jeton d'accès et de rafraichissement
            $token = $request->bearerToken();

            // Récupérer le jeton d'accès et de rafraichissement
            $refreshToken = auth()->user()->refresh($token);

            return response()->json([
                'message' => 'Token refreshed',
                'accessToken' => $token,
                'refreshToken' => $refreshToken,
                'data'=>$user,
            ]);
        }catch(Exception $e){
            return response()->json(['message' => 'Erreur lors de la récupération du jeton'], 500);
        }
    }

    // function register(RegisterUsersRequest $request) {
    //     // Création du nouvel utilisateur

    //     try{
    //         $user = User::create([
    //             'name' => $request->name,
    //             'email' => $request->email??null,
    //             'password' => $request->password,
    //         ]);

    //         $info = new InfoPerso();
    //         $info->nom = $request->nom;
    //         $info->prenom = $request->prenom;
    //         $info->date_N = $request->date_N;
    //         $info->lieu_N = $request->lieu_N;
    //         $info->sexe = $request->sexe;
    //         $info->nationalite = $request->nationalite;
    //         $info->ville_residence = $request->ville_residence;
    //         $info->telephone = $request->telephone;
    //         $info->save();

    //         $eleve = new Eleve();
    //         $eleve->user_id = $user->id;
    //         $eleve->info_perso_id = $info->id;
    //         $eleve->classe_id = $request->classe_id;
    //         $eleve->cycle_id = $request->cycle_id;
    //         $eleve->annee_scolaire_id = $request->annee_scolaire_id;
    //         $eleve->createMatricule($request->nom);
    //         response()->json([
    //             'message'=>"user created successfully",
    //             'data'=>$user,
    //         ]);
    //         $eleve->save();


    //         event(new UserRegisterEvent([
    //             'email'=>$user->email,
    //         ]));

    //         if(auth()->attempt($request->only($user->name, $user->password))){
    //             $user = auth()->user();
    //             $token = $user->createToken(config('app.key'))->plainTextToken;

    //             return response()->json([
    //                 'message'=>"user connected successfully",
    //                 'accessToken'=>$token,
    //                 'refreshToken'=>$token,
    //             ]);
    //         }else{
    //             return response()->json([
    //                 'message'=>'invalide creadentials',
    //             ],400);
    //         }

            

    //     }catch(Exception $e){
    //         return response()->json(["message"=>$e], 500);
    //     }
    // }


public function register(RegisterUsersRequest $request)
{
    try {
        // Création du compte utilisateur
        $user =new User();
        $anneeScolaire =  AnneeScolaire::all()->last();

        $user->name = $request->name;
        $user->email = $request->email ?? null;
        $user->password = Hash::make($request->password);


        // Informations personnelles
        $info = new InfoPerso();
        $info->nom = $request->nom;
        $info->prenom = $request->prenom;
        $info->date_N = $request->date_N;
        $info->lieu_N = $request->lieu_N;
        $info->sexe = $request->sexe;
        $info->nationalite = $request->nationalite;
        $info->ville_residence = $request->ville_residence;
        $info->telephone = $request->telephone;
        
        $user->save();
        $info->save();

        // Création de l'élève
        $eleve = new Eleve();
        $eleve->users_id = $user->id;
        $eleve->info_perso_id = $info->id;
        $eleve->classes_id = $request->classe_id;
        $eleve->cycle_id = $request->cycle_id;
        $eleve->annee_scolaires_id = $anneeScolaire->id;
        $eleve->createMatricule($request->nom);

        
        $eleve->save();

        // event(new UserRegisterEvent([
        //     'email' => $user->email,
        // ]));

        // Authentifie l'utilisateur
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();
            $token = $user->createToken(config('app.key'))->plainTextToken;

            return response()->json([
                'message' => "user connected successfully",
                'accessToken' => $token,
                'refreshToken' => $token,
                'user' => $user,
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 400);
        }

    } catch (Exception $e) {
        return response()->json([
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine()
        ], 500);
    }
}



    function me(Request $request) {
        // Vérifier si l'utilisateur est authentifié
        try{
            $user = auth()->user();

            if (!$user) {
                return response()->json(['message' => 'Token invalide ou expiré'], 401);
            }

            return response()->json([
               'message'=>"user connected successfully",
                'data'=>$user,
            ],200);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 500);
        }

    }

public function getProfile(){
    try{
            $user = auth()->user();
            if(!$user){
                return response()->json(["message"=>"user invalided"], 400);
            }
            $eleve = $user->eleve;

            if(!$eleve){
                return response()->json(["message"=>"profil cannot loaded"], 400);
            }
            return response()->json(["message"=>"profil loaded","data"=>$eleve->to_json()], 200);


        }catch(Exception $e){
            return response()->json(["message"=>$e->getMessage()], 500);
        }

}

}