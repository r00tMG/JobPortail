<style>
    @layer reset {
        button {
            all: unset;
        }
    }
</style>
<ul class="nav nav-tabs">
    @auth
        @if(Auth::user()->role === "user")
    <li class="nav-item">
        <a class="nav-link @if(request()->route()->getName() == 'etudiant.cours.accueil') active @endif " href="{{route('etudiant.cours.accueil')}}">EduPlateForm</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link @if(request()->route()->getName() == 'etudiant.cours.index') active @endif " aria-current="page" href="{{ route('etudiant.cours.index') }}">Cours</a>
    </li>
    <li class="nav-item me-auto">
        <a class="nav-link @if(request()->route()->getName() == 'etudiant.cours.mescours') active @endif " aria-current="page" href="{{ route('etudiant.cours.mescours') }}">Mes Cours</a>
    </li>
        @endif
    @endauth

    @auth
        @if(Auth::user()->role === "enseignant")
            <li class="nav-item">
                <a class="nav-link @if(request()->route()->getName() == 'enseignant.cours.index') active @endif " href="{{route('enseignant.cours.index')}}">EduPlateForm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->route()->getName() == 'enseignant.categories.index') active @endif " aria-current="page" href="{{ route('enseignant.categories.index') }}">Categories</a>
            </li>
                <li class="nav-item me-auto">
                    <a class="nav-link @if(request()->route()->getName() == 'enseignant.modules.index') active @endif " aria-current="page" href="{{ route('enseignant.modules.index') }}">Modules</a>
                </li>
        @endif
    @endauth

    @auth
    <li class="nav-item">
       <a class="nav-link ">{{ Auth::user()->email }}</a>
    </li>
    @endauth
    <li class="nav-item">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="nav-link">Se déconnecter</button>
            </form>
        @endauth
    </li>

</ul>
