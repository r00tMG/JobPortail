@extends('dashboard')
@section('title','Liste des candidatures')
@section('content')
<style>
    #home{
        height: 500px !important;
        background-size: cover
    }
</style>
<div class="container " id="home">
    <div class="card text-center">
      <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/window-desk.jpg');background-size: cover">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="card-body position-relative z-index-1 d-flex flex-column mt-5">
          <p class="text-white font-weight-bolder">Bienvenue à notre plateforme d'offre d'emploi</p>
          <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-4" href="{{route('dashboard')}}">
            Découvrez
            <i class="material-icons text-sm ms-1 position-relative" aria-hidden="true">arrow_forward</i>
          </a>
        </div>
      </div>
    </div>
  </div>

@endsection
