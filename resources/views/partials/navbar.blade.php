  <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
    <a class="navbar-brand p-0">
        <h1 class="m-0 h3"><span><img src="/img/disnaker.png" alt="" width="11%"></span> TEMAN </h2>
    </a>
    <button class="navbar-toggler m-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
          @if (Route::has('login'))
          @auth
            <a href="/dashboard" class="nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="/logbook" class="nav-item nav-link {{ Request::is('logbook') ? 'active' : '' }}">Logbook</a>
            <a href="/pendaftaran" class="nav-item nav-link {{ Request::is('pendaftaran*') ? 'active' : '' }}">Pendaftaran</a>
            <a href="/konsultasi" class="nav-item nav-link {{ Request::is('konsultasi*') ? 'active' : '' }}">Konsultasi</a>
            <a href="/klinikwirausaha" class="nav-item nav-link {{ Request::is('klinikwirausaha*') ? 'active' : '' }}">Klinik Wirausaha</a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li> 
                    <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
                  </form>
                  </li>
                </ul>
              </li>
              @else
              <a href="{{ route('login') }}" class="nav-item nav-link ">Log in</a>
              @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="ml-4 nav-item nav-link">Register</a>
              @endif
            @endauth
          @endif
        </div>
    </div>
</nav>