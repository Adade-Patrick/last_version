<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileImageController extends Controller
{
    public function updateImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        // Supprimer l'ancienne image si elle existe
        if ($user->profile_photo_path && Storage::exists('public/' . $user->profile_photo_path)) {
            Storage::delete('public/' . $user->profile_photo_path);
        }

        // Enregistrer la nouvelle image
        $path = $request->file('profile_image')->store('profile-photos', 'public');
        $user->profile_photo_path = $path;
        $user->save();

        return back()->with('success', 'Image de profil mise à jour avec succès.');
    }

}
