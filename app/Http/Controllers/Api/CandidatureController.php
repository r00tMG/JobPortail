<?php

namespace App\Http\Controllers\Api;

use App\Models\Emploi;
use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CandidatureResource;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    public function index()
    {
        $emplois = Emploi::where('employeur',Auth::id())->get();
        $employeur = $emplois->pluck('employeur');
        
        $var = $emplois->pluck('employeur');
        $candidatures = [];
        #dd($var);
        for($i=0;$i<$employeur->count();$i++)
        {
            $var = $emplois->pluck('employeur');
            $candidatures[] = Candidature::find($var[$i]);
        }
        #dd($candidatures);
        return CandidatureResource::collection(
            $candidatures
        );
    }
}
