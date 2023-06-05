<nav class="navbar bg-body-tertiary">
    <div class="container">
        <a href="/" class="navbar-brand">
            <img src="/logo_.svg" height="30" alt="Codersher Logo">
        </a>
        <div class="btn-group">
            <button type="button" class="btn btn-sm btn-secondary dropdown-toggle user-btn" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->username}}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li class="">
                    <a class="dropdown-item" href="#">
                        <span><i class="bi bi-person-circle me-2"></i> Profile</span>
                    </a>
                </li>
                <li class="">
                    <form action="/logout" method="POST" class="dropdown-item">
                        @csrf
                        <button class="logout w-100"><i class="bi bi-box-arrow-left me-2"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>