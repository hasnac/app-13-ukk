
{{-- <div id="header" class="sticky-top">
      <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container text-white d-inline-flex">
            <a class="navbar-brand d-inline-flex" href="#">
                <img src="{{ asset('assetsus/img/logo.png') }}" alt="Logo" width="170">
                
            </a>
            
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
               
                <li class="nav-item ">
                    <a class="nav-link " href="{{ url('listbook') }}">Books</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link " href="{{ url('koleksi') }}">Colections</a>
                </li>
                
                    
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown link
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
                
                
              </ul>
          </div>
        </div>
      </nav>
      
  
</div> --}}
<nav class="navbar navbar-expand-lg navbar-dark header sticky-top py-2">
  <div class="container text-white d-inline-flex">
    <a class="navbar-brand text-white d-inline-flex" href="#">
      <img src="{{ asset('assetsus/img/logo.png') }}" alt="Logo" width="100">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('listbook') ? 'active' : '' }}" href="{{ url('listbook') }}">Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('koleksi') ? 'active' : '' }}" href="{{ url('koleksi') }}">Collection</a>
        </li>
        @if (auth()->user())
            
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
            <li><a class="dropdown-item" href="{{ route('change.password') }}"><i class="icon-mid bi bi-gear me-2"></i> 
              Change Password</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
{{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> --}}
