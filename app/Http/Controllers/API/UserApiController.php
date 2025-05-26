<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUsersRequest;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Events\UserRegisterEvent;

class UserApiController extends Controller
{
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
    //             'email' => $request->email,
    //             'password' => $request->password,
    //         ]);

    //         event(new UserRegisterEvent($user));

    //         return response()->json([
    //            'message'=>"user created successfully",
    //            'data'=>$user,
    //         ]);

    //     }catch(Exception $e){
    //         return response()->json(["message"=>$e], 500);
    //     }
    // }


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
}
