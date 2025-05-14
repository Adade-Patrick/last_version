<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_evaluation',
        'chapitre_id',
    ];

    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class);
    }
}
