@extends('dashboard')
@section('title',$emploi->exists ? 'Editer un emploi' : 'Ajouter un emploi')
@section('content')
    <div class="container bg-light w-75 m-auto p-5">
        <h3 class="text-center ">@yield('title')</h3>
        <form
            class="vstack gap-2 "
            action = "{{ route($emploi -> exists ? 'emplois.update' : 'emplois.store',$emploi) }}"
            method="POST"
        >
            @csrf
            @method($emploi->exists ? 'PUT' : 'POST')
            <div class="row">
                @include('shared.input',['name' => 'titre', 'value' => $emploi->titre])
            </div>
            <div class="row" hidden>
                @include('shared.input',['name' => 'employeur', 'value' => Auth::user()->id])
            </div>
            <div class="row">
                @include('shared.input',['name' => 'lieu', 'value' => $emploi->lieu])
            </div>
            <div class="row">
                @include('shared.input',['name' => 'description', 'value' => $emploi->description])
            </div>

            <div class="container text-center">
                <button class="btn btn-outline-primary" type="submit">
                    {{ $emploi->exists ? 'Modifier' : 'Créer' }}
                </button>
            </div>
        </form>
    </div>
@endsection
