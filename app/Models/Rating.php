<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $fillable = [
        'cours_id',
        'rating',
    ];

    /**
     * Relation avec le cours
     */
    public function cours()
    {
        return $this->belongsTo(Cours::class, 'cours_id');
    }
}
