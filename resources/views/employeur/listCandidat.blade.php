@extends('dashboard')
@section('title','Liste des candidatures')
@section('content')
    <div class="container p-5 me-auto w-75">
        {{-- <div class="w-25 mt-5 m-auto">
        <form method="GET">
            <input name="titre" type="text" class="form-control" value="{{ $input['titre'] ?? '' }}" placeholder="Rechercher">
        </form>
        </div> --}}
        @if(session('success'))
            <div class="w-50 text-center m-auto alert alert-success">
                {{session('success')}}
            </div>
        @endif
        <h3 class="text-center my-3">@yield('title')</h3>
        <div class="row">
                <div class="row mb-2">
                    <table class="table table-dark table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">Candidat</th>
                                <th class="text-center">Employeur</th>
                                <th class="text-center">Emploi</th>
                                <th class="text-center">Curriculum Vitae</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($candidatures as $candidature)
                        {{-- @dump() --}}
                            <tr>
                                <td class="text-center">{{$candidature->candidats->name}}</td>
                                <td class="text-center"><a class="text-light" href="{{route('emplois.show',$candidature->emplois)}}">{{$candidature->emplois->users->name}}</a></td>
                                <td class="text-center"><a class="text-light" href="{{route('emplois.show',$candidature->emplois)}}">{{$candidature->emplois->titre}}</a></td>
                                <td class="text-center"><a href="http://" target="_blank" rel="noopener noreferrer"><embed width="40px" height="40px" src="{{asset('storage/'.$candidature->cv)}}"></a></td>
                                <td class="text-center">
                                    <form action="{{ route('contact.candidature',$candidature) }}" method="post">
                                        @csrf
                                        <button class="btn btn-outline-success btn-sm">Contact</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger">
                                <p class="text-center text-light">Aucune candidature n'a été envoyé</p>
                            </div>
                        @endforelse
                        </tbody>
                    </table>
                </div>
        </div>
        <div class="d-flex align-items-end">
            {{-- {{ $emplois->links() }} --}}
        </div>
    </div>

@endsection
