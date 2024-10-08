<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
     data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @guest()
                <li class="nav-item">
                    <a class="nav-link @if(Route::is('login')) active @endif"  aria-current="page" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(Route::is('register')) active @endif" href="/register">Register</a>
                </li>
                @endguest
                @auth()
                    @can('admin')
                        <li class="nav-item">
                            <a class="nav-link @if(Route::is('admin.dashboard')) active @endif" href="{{route('admin.dashboard')}}">Admin page</a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link @if(Route::is('users.show')) active @endif" href="{{route('users.show', Auth::user()->id)}}">{{Auth::user()->name}}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button class="btn btn-danger btn-small">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>