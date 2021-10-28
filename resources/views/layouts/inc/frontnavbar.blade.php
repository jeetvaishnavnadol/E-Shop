<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">E-Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('category') }}">Category</a>
        </li>

        @guest
        @if(Route::has('login'))
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link">{{ __('Login') }}</a>
        </li>
        @endif
        @if (Route::has('register'))
        <li class="nav-item">
          <a href="{{ route('register') }} " class="nav-link">{{ __('Register') }}</a>
        </li>

        @endif
        @else
        <li class="nav-item dropdown">
          <a href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle">
            {{ Auth::user()->name }}

          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a href="#" class="dropdown-item">
                My Profile
              </a>
            </li>
            <li>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">{{ __('Logout') }}</a>
            <form id="logout-form" method="POST" class="d-none" action="{{ route('logout') }}">
            @csrf
            </form>
            </li>
          </ul>
        </li>
        @endguest
      </ul>

    </div>
  </div>
</nav>