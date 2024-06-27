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
        <div class="row">
            {{-- @for($i=0;$i<$emploiByUser->count();$i++)
            <div class="row mb-2">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                      <h5 class="font-weight-normal text-info text-gradient"><a href="{{ route('emplois.show',$emploiByUser[$i]->id) }}">{{ $emploiByUser[$i]->titre }}</a></h5>
                      <p class="text-muted">{{$user->name}}</p>
                      <p class="text-muted">{{$emploiByUser[$i]->lieu}}</p>
                      <blockquote class="blockquote text-white mb-0">
                        <p class="text-dark ms-3">{{ $emploiByUser[$i]->description }}</p>
                        <footer class="blockquote-footer text-gradient text-info text-sm ms-3">
                            Someone famous in <cite title="Source Title">Source Title</cite>
                        </footer>
                      </blockquote>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{route('emplois.edit',$emploiByUser[$i]->id)}}" type="button" class="btn bg-gradient-primary">Editer</a>
                        </div>
                        <div class="col-md-2">
                            <form action="{{route('emplois.destroy',$emploiByUser[$i]->id)}}" method="post">
                                @csrf  
                                @method('DELETE')      
                                <button class="btn bg-gradient-secondary">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endfor --}}
        </div>
        <div class="d-flex align-items-end">
            {{-- {{ $emplois->links() }} --}}
        </div>
    </div>

@endsection
