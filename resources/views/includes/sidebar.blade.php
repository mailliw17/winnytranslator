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
    <a class="simple-text logo-mini">
      <div class="logo-image-small">
        <img src="{{asset('/img/logo-small.png')}}">
      </div>
    </a>
    <a class="simple-text logo-normal">
      WW World
    </a>

  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @if (auth()->user()->role == 1)
      <li class="{{ Request::is('documents') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('documents.index')}}">
          <span data-feather="home"></span>
          <i class="bi bi-file-earmark-text-fill"></i>
          Document
        </a>
      </li>
      <li class="{{ Request::is('users') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('users.index')}}">
          <span data-feather="file"></span>
          <i class="bi bi-person-badge"></i>
          Users
        </a>
      </li>
      <li class="{{ Request::is('withdraw') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('withdraw.index')}}">
          <span data-feather="file"></span>
          <i class="bi bi-currency-exchange"></i>
          Payroll
        </a>
      </li>
      @endif

      @if (auth()->user()->role == 2)
      <li class="{{ Request::is('documents-translator') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('documents-translator.index')}}">
          <span data-feather="file-text"></span>
          <i class="bi bi-list-task"></i>
          My Task
        </a>
      </li>
      <li class="{{ Request::is('account-translator') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('account-translator.index')}}">
          <span data-feather="file-text"></span>
          <i class="bi bi-person-badge"></i>
          Account Info
        </a>
      </li>
      <li class="{{ Request::is('payment-translator') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('payment-translator.index')}}">
          <span data-feather="file-text"></span>
          <i class="bi bi-cash-coin"></i>
          Payment
        </a>
      </li>
      @endif

      {{-- <li class="active-pro">
        <a href="./upgrade.html">
          <i class="nc-icon nc-spaceship"></i>
          <p>Upgrade to PRO</p>
        </a>
      </li> --}}

    </ul>
  </div>
</div>
{{--
</body> --}}