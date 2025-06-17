<?php

use App\Models\Activity;

if (!function_exists('logActivity')) {
    function logActivity($type, $model, $description, $userId = null, $profId = null)
    {
        Activity::create([
            'type'        => $type,              // Exemple : création, modification
            'model_type'  => get_class($model),  // Exemple : App\Models\Cours
            'model_id'    => $model->id,         // ID de l'élément modifié
            'description' => $description,       // Description de l'action
            'user_id'     => $userId ?? auth()->id(),  // Optionnel
            'prof_id'     => $profId             // Optionnel si activité prof
        ]);
    }
}
