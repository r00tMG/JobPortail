<?php

namespace App\Http\Controllers\employeur;

use App\Models\Emploi;
use App\Models\Candidature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmploiFormRequest;
use App\Http\Requests\CandidatureFormRequest;

class EmploiController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emplois = Emploi::where('employeur',Auth::id())->orderBy('created_at','DESC')->get();

        return view('employeur.index',[
            'emplois' => $emplois,
        ])->with('success','Votre emploi à été bien publié');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emploi = new Emploi();
        $emploi->fill([
            #'titre' => 'titre de l\'emploi',
            #'description' => 'description de l\'emploi'
        ]);
        return view('employeur.form',[
            'emploi' => $emploi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmploiFormRequest $request)
    {
        Emploi::create($request->validated());
        return redirect()->route('emplois.index');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function edit(Emploi $emploi)
    {
        return view('employeur.form',[
            'emploi' => $emploi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function update(EmploiFormRequest $request, Emploi $emploi)
    {
        $emploi->update($request->validated());
        return redirect()->route('emplois.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Emploi  $emploi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emploi $emploi)
    {
        $emploi->delete();
        return redirect()->route('emplois.index');
    }
}
