<style>
.button-hover:hover,
.button-hover.active {
    background-color: #0081A7 !important;
    color: white !important;
    border-radius: 50px;
}
</style>
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">

            <div class="sb-sidenav-menu-heading">Main</div>
            <a class="nav-link button-hover" {{ request()->routeIs('admin.*') ? 'active' : '' }}
                href="{{ route('admin.dash') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                Dashboard
            </a>
            <a class="nav-link button-hover {{ request()->routeIs('document.*') ? 'active' : '' }}"
                href="{{ route('document.dash') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-diagram-project"></i></div>
                Documents
            </a>
            <a class="nav-link button-hover {{ request()->routeIs('revise.*') ? 'active' : '' }}"
                href="{{ route('revise.docs') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge"></i></div>
                Documents Revisions
            </a>
            <a class="nav-link button-hover">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-gauge"></i></div>
                Manage Users
            </a>
            <a class="nav-link button-hover">
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