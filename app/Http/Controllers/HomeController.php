<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatureFormRequest;
use App\Models\User;
use App\Models\Emploi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $emplois = Emploi::orderBy('created_at','DESC')->paginate(5);
        #dd($emplois);
        return view('public.index',[
            'emplois' => $emplois,
        ]);
    }
    public function show(Emploi $emploi)
    {
        #dd($emplois);
        return view('public.show',[
            'emploi' => $emploi,
        ]);
    }
    
}
