@extends('dashboard')
@section('title','Liste des emplois')
@section('content')
    <div class="container bg-light p-5 me-auto w-75">
        <div class="w-25 card mt-5 m-auto">
            <form class="input-group input-group-outline" method="GET">
                <label class="form-label">Rechercher</label>
                <input name="titre" type="text" class="form-control" value="{{ $input['titre'] ?? '' }}">
            </form>
        </div> 
        @if(session('success'))
            <div class="w-25 m-auto alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <h3 class="text-center my-3">@yield('title')</h3>
        <div class="row">
            @forelse($emplois as $emploi)
                <div class="row mb-2">
                    <div class="card bg-gradient-default">
                        <div class="card-body">
                            <h5 class="font-weight-normal text-info text-gradient"><a href="{{ route('emplois.show',['emploi' => $emploi]) }}">{{ $emploi->titre }}</a></h5>
                            <p class="text-muted">{{$emploi->users->email}}</p>
                            <p class="text-muted">{{$emploi->lieu}}</p>
                            <blockquote class="blockquote text-white mb-0">
                                <p class="text-dark ms-3">{{ $emploi->description }}</p>
                                <footer class="blockquote-footer text-gradient text-info text-sm ms-3">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="alert alert-danger">
                        <p class="text-center text-light">Aucun élément ne corresponde à cette recherche</p>
                    </div>
            @endforelse
        </div>
        <div class="d-flex align-items-end">
            {{ $emplois->links() }}
        </div>
    </div>

@endsection
