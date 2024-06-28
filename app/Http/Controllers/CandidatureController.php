<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CandidatureFormRequest;

class CandidatureController extends Controller
{
    public function listCandidat()
    {
        $emplois = Emploi::where('employeur',Auth::id())->get();
        $employeur = $emplois->pluck('employeur');
        $candidatures = [];
        for($i=0;$i<$employeur->count();$i++)
        {
            $candidatures[] = Candidature::find($emplois->pluck('employeur')[$i]);

        }
        
        return view('employeur.listCandidat',[
            'candidatures' => $candidatures
        ]);
    }

    public function candidature(CandidatureFormRequest $request, Emploi $emploi)
    {
        #dd($request->validated());
        $data = $request->validated();
        $data['cv'] = $request->cv->store('uploads');
        Candidature::create($data);
        return back()
        ->with('success','Votre candidateur a été bien envoyé')
        ;

    }
}
