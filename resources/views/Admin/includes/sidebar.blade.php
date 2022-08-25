<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <a href="{{route('admin.home')}}">
            <span class="logo_name">Mostaql</span>
        </a>
    </div>
    <ul class="nav-links">
        <li>
            <a href="#" class="active">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="{{route('admin.projects')}}">
                <i class='bx bx-box'></i>
                <span class="links_name">Project</span>
            </a>
        </li>

        <li>
            <a href="{{route('admin.categories')}}">
                <i class='bx bx-list-ul'></i>
                <span class="links_name">Categories</span>
            </a>
        </li>

        <li>
            <a href="{{route('admin.users')}}">
                <i class='bx bx-user'></i>
                <span class="links_name">Users</span>
            </a>
        </li>

        <li class="log_out">
            <a href="{{route('logout.perform')}}">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Log out</span>
            </a>
        </li>
    </ul>
</div>
