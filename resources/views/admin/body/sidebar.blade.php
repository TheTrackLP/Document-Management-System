<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">

            <div class="sb-sidenav-menu-heading">Main</div>
            <a class="nav-link">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                Dashboard
            </a>
            <a class="nav-link" href="{{ route('document.dash') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-diagram-project"></i></div>
                Documents
            </a>
            <a class="nav-link" href="{{ route('revise.docs') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge"></i></div>
                Documents Revisions
            </a>
            <a class="nav-link">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge"></i></div>
                Manage Users
            </a>
            <a class="nav-link">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge"></i></div>
                Settings
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>