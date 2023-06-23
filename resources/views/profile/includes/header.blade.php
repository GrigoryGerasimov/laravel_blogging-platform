<nav class="main-header navbar navbar-expand navbar-white navbar-light d-flex justify-content-between">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <form action="{{ route('logout') }}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
        <button type="submit" class="btn border-0 bg-transparent">
            <i class="nav-icon fas fa-sign-out-alt"></i>
        </button>
    </form>
</nav>
