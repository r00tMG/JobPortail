@extends('dashboard')
@section('title','Détails d\'un offre d\'emploi')
@section('content')
    <div class="card container arounded p-5 me-auto w-75">
        <div class="card-title bg-light container arounded bordered shodow">
            <h3 class="">{{$emploi->users->email}}</h3>
            <p class="card-text">{{ $emploi->lieu }}</p>
            <p class="card-text">Publié le {{ $emploi->created_at }}</p>
        </div>
        <div class="card-body">
            <h4 class="font-weight-normal mt-3">{{ $emploi->titre }}</h4>
            <p class="card-text mb-4">{{ $emploi->description }}<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis non dolore est fuga nobis ipsum illum eligendi nemo iure repellat, soluta, optio minus ut reiciendis voluptates enim impedit veritatis officiis.</p>
            <div class="row">
                @can('postuler-offre')
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}} 
                        </div>
                    @else
                    
                    <div class="col-md-4">
                    <button type="button" class="btn btn-block bg-gradient-primary mb-3" data-bs-toggle="modal" data-bs-target="#modal-default">Postuler</button>
                    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h6 class="modal-title font-weight-normal" id="modal-title-default">Type your modal title</h6>
                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('emplois.candidature',$emploi) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row" hidden>
                                        @include('shared.input',['label'=>'Candidat','name' => 'candidat','value'=>Auth::user()->id])
                                    </div>
                                    <div class="row" hidden>
                                        @include('shared.input',['label'=>'Emploi','name' => 'emploi','value'=>$emploi->id])
                                    </div>
                                    <div class="row">
                                        @include('shared.input',['label'=>'CV','name' => 'cv','type'=>'file'])
                                    </div>
                                    <div class="row">
                                        <button class="btn bg-gradient-primary">Enregistrer</button>
                                        {{-- <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Close</button> --}}
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                @endif
                @endcan
        </div>
    </div>
    {{-- <div class="card mt-4">
        <!-- Card image -->
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <img class="border-radius-lg w-100" src="https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80" alt="Image placeholder">
          <!-- List group -->
          <ul class="list-group list-group-flush mt-2">
             <li class="list-group-item">Cras justo odio</li>
             <li class="list-group-item">Dapibus ac facilisis in</li>
             <li class="list-group-item">Vestibulum at eros</li>
          </ul>
         </div>
        <!-- Card body -->
        <div class="card-body">
         <h4 class="font-weight-normal mt-3">Card title</h4>
         <p class="card-text mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis non dolore est fuga nobis ipsum illum eligendi nemo iure repellat, soluta, optio minus ut reiciendis voluptates enim impedit veritatis officiis.</p>
         <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div> --}}
@endsection
