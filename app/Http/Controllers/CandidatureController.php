<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Http\Requests\CandidatureFormRequest;

class CandidatureController extends Controller
{
    public function listCandidat()
    {
        $candidatures = Candidature::all();
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
