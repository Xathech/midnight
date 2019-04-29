<!--NAVBAR-->
<nav class="navbar navbar-expand-md navbar-dark">
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Midnight') }}<!--Page name-->
    </a>
    <!--Drop-down button-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navcont" aria-controls="nabvarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div id="navcont" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">{{ __('Reviews') }}<span class="sr-only"(current)></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">{{ __('Users') }}<span class="sr-only"(current)></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">{{ __('About ') }}{{ config('app.name', 'Midnight') }}<span class="sr-only"(current)></span></a>
            </li>
        </ul>

        <!-- Right Side Of Navbar -->
        
        <!--Search-->
        <form class="form row ml-0 mr-auto" action=""><!--FILL ACTION-->
            <div class="col-5 col-md-9 ml-md-4 px-0">
                <div class="input-group">
                    <input class="form-control" type="search" aria-label="Search" placeholder="{{ __('Search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">
                            <span class="fa fa-search" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <!--Language selector-->

        <div id="langselector" class="dropdown mr-3 mt-2 mt-md-0">
            <button class="btn btn-warning dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ __('Language') }}
                <i class="fa fa-globe fa-lg"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <img height="30" width="40" src="{{ asset('storage/images/flags/'.$properties['regional'].'.svg') }}" alt=""> {{ $properties['name'] }}
                        </a>
                    </li>
                @endforeach
            </div>
        </div>

        <!-- Authentication Links -->
        @guest
            <button id="divformutog" class="btn btn-outline-warning my-2 my-sm-0" data-toggle="collapse" href="#divformu" type="button">
                <div>{{ __('Login') }}</div>
            </button>
        @else
            <button id="divformutog" class="btn btn-outline-warning my-2 my-sm-0" data-toggle="collapse" href="#divformu" type="button">
                <div>{{ Auth::user()->name }}</div>
            </button>
        <!--
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        -->
        @endguest
    </div>
</nav>

@guest

    @include('layouts.logform')

@else

    @include('layouts.userdrop')
    
@endguest