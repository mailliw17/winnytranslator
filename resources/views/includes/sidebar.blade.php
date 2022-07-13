<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
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
          {{-- <span class="sr-only">(current)</span> --}}
        </a>
      </li>
      {{-- using payment controller --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('payments.index')}}">
          <span data-feather="file"></span>
          <i class="bi bi-person-bounding-box"></i>
          Payroll Account
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index')}}">
          <span data-feather="file"></span>
          <i class="bi bi-person-badge"></i>
          Users Account
        </a>
      </li>
      {{-- using withdraw controller --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('withdraw.index')}}">
          <span data-feather="file"></span>
          <i class="bi bi-currency-exchange"></i>
          Payroll
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
        <a class="nav-link" href="{{ route('task-translator.index')}}">
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
</nav>