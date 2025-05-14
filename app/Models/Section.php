<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table = 'sections';

    protected $fillable = [
        'titre',
        'description',
        'videoUrl',
        'pdfUrl',
        'chapitres_id',
    ];

    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class, 'chapitres_id');
    }
}
