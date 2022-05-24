<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand" href="{{ route('dashboard') }}">BeCoff</a>
  @if (auth()->user() != null)
  <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
  @endif
  <!-- Navbar-->
  <ul class="navbar-nav ml-auto mr-0">
    @if (auth()->user() != null)
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}<i class="ml-2 fas fa-user fa-fw"></i></a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
               <a class="dropdown-item" href="{{ route('lupa-password.index') }}">Lupa Password</a> 
              <form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button class="dropdown-item" type="submit">Logout</button>
              </form>
          </div>
      </li>
    @else
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">Login</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">Register</a>
    </li>
    @endif
  </ul>
</nav>