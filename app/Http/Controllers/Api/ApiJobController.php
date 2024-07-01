<?php

namespace App\Http\Controllers\Api;

use App\Models\Emploi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmploiFormRequest;
use App\Http\Requests\SearchFormRequest;
use App\Http\Resources\EmploisResource;
use App\Models\User;

class ApiJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchFormRequest $request)
    {
        $emploi = Emploi::all();
        
        return EmploisResource::collection(
            $emploi
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmploiFormRequest $request)
    {
        #dd(User::all()->toJson());
        $emploi = Emploi::create($request->validated());
        return response()->json($emploi,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Emploi $emploi)
    {
        return response()->json($emploi,200); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Emploi $emploi)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmploiFormRequest $request, Emploi $emploi)
    {
        $emploi->update($request->validated());
        return response()->json($emploi,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emploi $emploi)
    {
        $emploi->delete();
        response()->json();
    }
}
