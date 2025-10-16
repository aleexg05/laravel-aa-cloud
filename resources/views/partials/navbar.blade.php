@auth


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/esdeveniments/index" style="color:#777">
            <span style="font-size:15pt">&#9820;</span> App de reserves d'esdeveniments
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if(Auth::check())
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    
                    <li class="nav-item {{ Request::is('esdeveniments') && !Request::is('esdeveniments/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/esdeveniments/index') }}">
                            <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                            Esdeveniments
                        </a>
                    </li>

                 
                   
                        @if(auth()->check() && auth()->user()->rol === 'admin')
                            <li class="nav-item {{ Request::is('esdeveniments/create') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/esdeveniments/create') }}">
                                    <span>&#10010</span> Nou esdeveniment
                                </a>
                            </li>
                           
                        @endif
                    @endauth
                </ul>

             
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('esdeveniments.index') }}">Profile</a>

                        <form action="{{ url('/logout') }}" method="POST" class="dropdown-item">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-link" style="background: none; border: none; padding: 0;">
                                Log Out
                            </button>
                        </form>
                    </div>
                    </div>
                   

                        </form>

                </div>
            </div>
        @endif
    </div>
</nav>
