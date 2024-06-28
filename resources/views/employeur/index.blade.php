@extends('dashboard')
@section('title','Liste des emplois')
@section('content')
    <div class="container bg-light p-5 me-auto w-75">
        {{-- <div class="w-25 mt-5 m-auto">
        <form method="GET">
            <input name="titre" type="text" class="form-control" value="{{ $input['titre'] ?? '' }}" placeholder="Rechercher">
        </form>
        </div> --}}
        @if(session('success'))
            <div class="w-25 m-auto alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <h3 class="text-center my-3">@yield('title')</h3>
        <div class="row">
            @forelse($emplois as $emploi)
                <div class="row mb-2">
                    @include('shared.card')
                </div>
                @empty
                    <div class="alert alert-danger">
                        <p class="text-center">Aucun élément ne corresponde à cette recherche</p>
                    </div>
            @endforelse
        </div>
        <div class="d-flex align-items-end">
            {{-- {{ $emplois->links() }} --}}
        </div>
    </div>

@endsection
