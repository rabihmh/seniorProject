<section class="home-section">
    <nav>
        <div class="sidebar-button">
            <i class='bx bx-menu sidebarBtn'></i>
            <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search...">
            <i class='bx bx-search'></i>
        </div>
        <div class="profile-details">
            <img src="{{asset('images/Profile/'.''.\Illuminate\Support\Facades\Auth::user()->profiles->profile_photo)}}" alt="">
            <span class="admin_name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
            <i class='bx bx-chevron-down'></i>
        </div>
    </nav>
</section>
