{{-- <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <h6 class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">WW World - Admin Panel</h6>

  <h6 class="" style="color: white">Welcome {{ auth()->user()->name }}</h6>

  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger p-1" type="submit">
          <i class="bi bi-box-arrow-right"></i>
          Logout
        </button>
      </form>
    </li>
  </ul>
</nav> --}}
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
  <div class="container-fluid">
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav mr-2">
        <li class="nav-item">
          <p>Hello, {{ auth()->user()->name }}</p>
          </form>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="nav-link btn btn-danger btn-sm" type="submit">
              <i class="bi bi-box-arrow-right"></i>
              Logout
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->