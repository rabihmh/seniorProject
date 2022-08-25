<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href=""><img src="{{URL::asset('assets/img/brand/favicon.png')}}"
                                                               class="main-logo" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    @php
                        $user=auth()->user()->id;
                        $photo=\App\Models\Profile::select('profile_photo')->where('user_id',$user)->first();
                    @endphp
                    <img alt="user-img" class="avatar avatar-xl brround"
                         src="{{asset('images/Profile/'.''.$photo->profile_photo)}}"><span
                        class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">

                    <h4 class="font-weight-semibold mt-3 mb-0">{{auth()->user()->name}}</h4>
                    <span class="mb-0 text-muted">{{auth()->user()->email}}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="side-item side-item-category">Main</li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.home') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M5 5h4v6H5zm10 8h4v6h-4zM5 17h4v2H5zM15 5h4v2h-4z" opacity=".3"/>
                        <path
                            d="M3 13h8V3H3v10zm2-8h4v6H5V5zm8 16h8V11h-8v10zm2-8h4v6h-4v-6zM13 3v6h8V3h-8zm6 4h-4V5h4v2zM3 21h8v-6H3v6zm2-4h4v2H5v-2z"/>
                    </svg>
                    <span class="side-menu__label">Dashboard</span><span class="badge badge-success side-badge">1</span></a>
            </li>
            <li class="side-item side-item-category">General</li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M19 5H5v14h14V5zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z" opacity=".3"/>
                        <path
                            d="M3 5v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2zm2 0h14v14H5V5zm2 5h2v7H7zm4-3h2v10h-2zm4 6h2v4h-2z"/>
                    </svg>
                    <span class="side-menu__label">User</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route('admin.users')}}">User List</a></li>
                    <li><a class="slide-item" href="{{route('admin.freelancers')}}">Freelancer List</a>
                    </li>


                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path
                            d="M3.31 11l2.2 8.01L18.5 19l2.2-8H3.31zM12 17c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"
                            opacity=".3"/>
                        <path
                            d="M22 9h-4.79l-4.38-6.56c-.19-.28-.51-.42-.83-.42s-.64.14-.83.43L6.79 9H2c-.55 0-1 .45-1 1 0 .09.01.18.04.27l2.54 9.27c.23.84 1 1.46 1.92 1.46h13c.92 0 1.69-.62 1.93-1.46l2.54-9.27L23 10c0-.55-.45-1-1-1zM12 4.8L14.8 9H9.2L12 4.8zM18.5 19l-12.99.01L3.31 11H20.7l-2.2 8zM12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/>
                    </svg>
                    <span class="side-menu__label">Services</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route('admin.projectsApprove')}}">Approve Services</a></li>
                    <li><a class="slide-item" href="{{route('admin.projects')}}">Browse Services</a></li>
                </ul>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24">
                        <path d="M0 0h24v24H0V0z" fill="none"/>
                        <path d="M6.26 9L12 13.47 17.74 9 12 4.53z" opacity=".3"/>
                        <path
                            d="M19.37 12.8l-7.38 5.74-7.37-5.73L3 14.07l9 7 9-7zM12 2L3 9l1.63 1.27L12 16l7.36-5.73L21 9l-9-7zm0 11.47L6.26 9 12 4.53 17.74 9 12 13.47z"/>
                    </svg>
                    <span class="side-menu__label">Categories</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route('admin.categories')}}">Browse Categories</a></li>
                    <li><a class="slide-item" href="">Add Categories</a></li>
                </ul>
            </li>

        </ul>
    </div>
</aside>
<!-- main-sidebar -->
