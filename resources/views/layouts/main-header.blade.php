<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}"
                                                              class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}"
                                                              class="dark-logo-1" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}"
                                                              class="logo-2" alt="logo"></a>
                <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}"
                                                              class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <input class="form-control" placeholder="Search for anything..." type="search">
                <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
            </div>
        </div>
        <div class="main-header-right">
            <ul class="nav">
                <li class="">
                    <div class="nav-itemd-none d-md-flex">
                        <a href="{{route('cart.list')}}" class="d-flex  nav-item nav-link pl-0 country-flag1"
                           aria-expanded="false">
                            <i style="color: #555;font-size: 17px;" class="fa-solid fa-cart-shopping fa-1x"></i>

                        </a>
                    </div>
                </li>
            </ul>
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
											<button type="reset" class="btn btn-default">
												<i class="fas fa-times"></i>
											</button>
											<button type="submit" class="btn btn-default nav-link resp-btn">
												<svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-search"><circle cx="11" cy="11"
                                                                                            r="8"></circle><line x1="21"
                                                                                                                 y1="21"
                                                                                                                 x2="16.65"
                                                                                                                 y2="16.65"></line></svg>
											</button>
										</span>
                        </div>
                    </form>
                </div>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"></path>
                        </svg>
                    </a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt=""
                                                                src="{{URL::asset('assets/img/faces/6.jpg')}}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                @php
                                    $id=auth()->user()->id;
                                    $photo=\App\Models\Profile::select('profile_photo')->where('user_id',$id)->first();
                                @endphp
                                <div class="main-img-user"><img alt=""
                                                                src="{{asset('images/Profile/'.''.$photo->profile_photo)}}"
                                                                class=""></div>
                                <div class="mr-3 my-auto">
                                    <h6>{{auth()->user()->name}}</h6><span>{{auth()->user()->email}}</span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{route('myprofile',auth()->user()->name)}}"><i
                                class="bx bx-user-circle"></i>Profile</a>
                        <a class="dropdown-item" href="{{route('myprofileEdit',auth()->user()->name)}}"><i
                                class="bx bx-cog"></i> Edit Profile</a>
                        <a class="dropdown-item" href="{{route('logout')}}"><i class="bx bx-log-out"></i> Sign Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
