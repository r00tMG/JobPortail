<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidatureFormRequest;
use App\Http\Requests\SearchFormRequest;
use App\Models\User;
use App\Models\Emploi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(SearchFormRequest $request)
    {
        $query = Emploi::query();
        if ($request->has('titre'))
        {
            $query = $query->where('titre', 'like', "%{$request->input('titre')}%");
        }
        #dd($input);
        return view('public.index',[
            'emplois' => $query->orderBy('created_at','DESC')->paginate(5),
            'input'=>$request->validated()

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
