<div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0 text-center" href="{{url('/')}}" >
        <span class="ms-1 font-weight-bold text-white">JobPortail</span>
    </a>
</div>
<hr class="horizontal light mt-0 mb-2">
<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    
    <div class="mx-3">
        <li class="navbar-nav">
            <a 
            href="{{route('dashboard')}}" 
            class="btn bg-gradient-primary @if(request()->route()->getName() == 'dashboard') btn bg-gradient-success @endif" >
                Home
            </a>
        </li>
    </div>
    <div class=" ">
        <div class="mx-3">
            <div class="navbar-nav">
                @can('emploi-list')
                    <a 
                        class="btn bg-gradient-primary text-white  dropdown-toggle" 
                        type="button" 
                        id="dropdownMenuButton" 
                        data-bs-toggle="dropdown" 
                        aria-expanded="false">
                        Employeur
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('emplois.create') }}">Create</a></li>
                        <li><a class="dropdown-item" href="{{ route('emplois.index') }}">List</a></li>
                        {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                    </ul>
                @endcan
            </div>
        </div>
    </div>
    @can('emploi-list')
    <div class="mx-3">
        <li class="navbar-nav">
            <a 
            href="{{route('emplois.listCandidat')}}" 
            class="btn bg-gradient-primary @if(request()->route()->getName() == 'emplois.listCandidat') btn bg-gradient-success @endif" >
                Candidature
            </a>
        </li>
    </div>
    @endcan
<div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
        @auth
        <div class="navbar-nav">
            <button class="btn bg-gradient-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->email }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    {{-- @method('delete') --}}
                    <li><button class="dropdown-item">Logout</button></li>
                </form>
                @can('user-list')
                    <li><a class="dropdown-item" href="{{ url('/users') }}">Admin</a></li>
                @endcan
                {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
            </ul>
        </div>
        @endauth
    </div>
</div>
