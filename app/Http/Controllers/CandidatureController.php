<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Emploi;
use App\Models\Candidature;
use Illuminate\Http\Request;
use App\Mail\EmploiCandidatureEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CandidatureFormRequest;

class CandidatureController extends Controller
{
    public function contact(Candidature $candidature)
    {
        #dd();
        #$email = User::find($candidature->emplois->employeur);
        #dd($email->email);
       # Mail::to($request->user())->send(new OrderShipped($order));
       Mail::to($candidature->emplois->users->email)->send(new EmploiCandidatureEmail(
            $candidature
        ));
        #dd($m);
        return back()->with('success','L\'email a bien été envoyé');
    }
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
