<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active @if(request()->is('/')) bg-primary text-white rounded  @endif" aria-current="page" href="{{url('/')}}">Home</a>
          </li>
            @auth
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('posts')) bg-primary text-white rounded  @endif" href="{{route('posts.index')}}">Posts</a>
                </li>
            @can('admin_control')
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('users*')) bg-primary text-white rounded  @endif" href="{{route('users.index')}}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('tags')) bg-primary text-white rounded  @endif" href="{{route('tags.index')}}">Tags</a>
                </li>
                @endcan
            @endauth
        </ul>
        <form class="d-flex me-5" role="search" action="{{route('posts.search')}}" method="GET">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="qu">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link bg-success me-3 text-white px-3 rounded-pill" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link bg-primary text-white px-3 rounded-pill" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
        @endguest
    </div>
  </nav>
