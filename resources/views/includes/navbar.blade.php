<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">WW World - Admin Panel</a>

  <h5 class="" style="color: white">Welcome {{ auth()->user()->name }}</h5>

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
</nav>