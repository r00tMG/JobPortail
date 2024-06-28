@component('mail::message')
# Introduction
Bonjour {{$candidature->candidats->name}} 
<p>Nous avons bien reçu votre demande à notre offre de : <a href="{{ route('emplois.show',$candidature->id) }}">{{$candidature->emplois->titre}}</a> </p>
    {{-- <p>-Prenom: {{ $data['firstname'] }}</p>
    <p>-Nom: {{ $data['lastname'] }}</p>
    <p>-Tel: {{ $data['tel'] }}</p>
    <p>-Email: {{ $data['email'] }}</p>

    ** Message :**
    <p>{{ $data['describ'] }}</p>  --}}
@endcomponent
