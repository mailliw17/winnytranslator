{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="sidebar-sticky pt-3">
    @if (auth()->user()->role == 1)
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Admin</span>
      <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('documents.index')}}">
          <span data-feather="home"></span>
          <i class="bi bi-file-earmark-text-fill"></i>
          Document Management
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index')}}">
          <span data-feather="file"></span>
          <i class="bi bi-person-badge"></i>
          Users Account
        </a>
      </li>
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Payment</span>
        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('withdraw.index')}}">
          <span data-feather="file"></span>
          <i class="bi bi-currency-exchange"></i>
          Payroll Translator History
        </a>
      </li>
    </ul>
    @endif

    @if (auth()->user()->role == 2)
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Translator</span>
      <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>

    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('documents-translator.index')}}">
          <span data-feather="file-text"></span>
          <i class="bi bi-list-task"></i>
          My Task
        </a>
      </li>
    </ul>

    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('account-translator.index')}}">
          <span data-feather="file-text"></span>
          <i class="bi bi-person-badge"></i>
          Account Info
        </a>
      </li>
    </ul>

    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('payment-translator.index')}}">
          <span data-feather="file-text"></span>
          <i class="bi bi-cash-coin"></i>
          Payment
        </a>
      </li>
    </ul>

    @endif

  </div>
</nav> --}}

<div class="sidebar" data-color="white" data-active-color="danger">
  <div class="logo">
    <a href="https://www.creative-tim.com" class="simple-text logo-mini">
      <div class="logo-image-small">
        <img src="{{asset('/img/logo-small.png')}}">
      </div>
      <!-- <p>CT</p> -->
    </a>
    <a class="simple-text logo-normal">
      WW World
      <!-- <div class="logo-image-big">
        <img src="../assets/img/logo-big.png">
      </div> -->
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="active ">
        <a href="{{ route('documents.index')}}">
          <i class="nc-book-bookmark"></i>
          <p>Document Management</p>
        </a>
      </li>
      <li>
        <a href="./icons.html">
          <i class="nc-icon nc-diamond"></i>
          <p>Icons</p>
        </a>
      </li>
      <li>
        <a href="./map.html">
          <i class="nc-icon nc-pin-3"></i>
          <p>Maps</p>
        </a>
      </li>
      <li>
        <a href="./notifications.html">
          <i class="nc-icon nc-bell-55"></i>
          <p>Notifications</p>
        </a>
      </li>
      <li>
        <a href="./user.html">
          <i class="nc-icon nc-single-02"></i>
          <p>User Profile</p>
        </a>
      </li>
      <li>
        <a href="./tables.html">
          <i class="nc-icon nc-tile-56"></i>
          <p>Table List</p>
        </a>
      </li>
      <li>
        <a href="./typography.html">
          <i class="nc-icon nc-caps-small"></i>
          <p>Typography</p>
        </a>
      </li>
      <li class="active-pro">
        <a href="./upgrade.html">
          <i class="nc-icon nc-spaceship"></i>
          <p>Upgrade to PRO</p>
        </a>
      </li>
    </ul>
  </div>
</div>