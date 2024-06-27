<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function emplois()
    {
        return $this->belongsTo(Emploi::class,'emploi');
    }
    public function candidats()
    {
        return $this->belongsTo(User::class,'candidat');
    }
}
