<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <!-- Toggled button for mobile navigation -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item ml-auto">
                    <span class="navbar-text">
                        {{ Auth::user()->name }} ({{ Auth::user()->roles->first()->role }})
                    </span>
                </li>
                @if(Auth::user()->roles->contains('role', 'admin'))
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('artist.index') }}">Artistes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('role.index') }}">Role</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('show_index') }}">Spectacles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('theatres') }}">API Spectacles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('location.index') }}">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('locality.index') }}">Localité</a>
                    </li>
                </ul>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
