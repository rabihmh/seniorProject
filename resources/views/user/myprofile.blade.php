@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Profile</span>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <div class="main-img-user profile-user">
                                <img alt="" src="{{asset('images/Profile/'.''.$profile->profiles->profile_photo)}}">
                            </div>
                            <div class="d-flex justify-content-between mg-b-20">
                                <div>
                                    <h5 class="main-profile-name">{{$profile->name}}</h5>
                                    <p class="main-profile-name-text">{{$profile->profiles->job_name}}</p>
                                </div>
                            </div>
                            <!-- main-profile-bio -->
                            <div class="row">
                                <div class="col-md-4 col mb20">
                                    <h5>{{$profile->created_at->format('Y-m-d')}}</h5>
                                    <h6 class="text-small text-muted mb-0">Join on</h6>
                                </div>
                                <div class="col-md-4 col mb20">
                                    <h5>{{$profile->projects->count()}}</h5>
                                    <h6 class="text-small text-muted mb-0">Services</h6>
                                </div>
                            </div>
                            <hr class="mg-y-30">
                            <label class="main-content-label tx-13 mg-b-20">Social</label>
                            <div class="main-profile-social-list">
                                <div class="media">

                                </div>
                                <div class="media">
                                    <div class="media-icon bg-primary-transparent text-primary">
                                        <i class="icon ion-logo-facebook"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Facebook</span> <a
                                            href="{{$profile->profiles->my_facebook}}">{{$profile->profiles->my_facebook}}</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon ion-logo-linkedin"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Linkedin</span> <a
                                            href="{{$profile->profiles->my_linkedin}}">{{$profile->profiles->my_linkedin}}</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-danger-transparent text-danger">
                                        <i class="icon ion-md-link"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>My Portfolio</span> <a
                                            href="{{$profile->profiles->my_portfolio}}">{{$profile->profiles->my_portfolio}}</a>
                                    </div>
                                </div>
                            </div>

                            <hr class="mg-y-30">

                        </div><!-- main-profile-overview -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="tabs-menu ">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs profile navtab-custom panel-tabs">
                            <li class="active">
                                <a href="#home" data-toggle="tab" aria-expanded="true"> <span class="visible-xs"><i
                                            class="las la-user-circle tx-16 mr-1"></i></span> <span class="hidden-xs">ABOUT ME</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                            class="las la-images tx-15 mr-1"></i></span> <span class="hidden-xs"> My SERVICES</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i
                                            class="las la-cog tx-16 mr-1"></i></span> <span
                                        class="hidden-xs">SETTINGS</span> </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content border-left border-bottom border-right border-top-0 p-4">
                        <div class="tab-pane active" id="home">
                            <h4 class="tx-15 text-uppercase mb-3">BIOdata</h4>
                            <p class="m-b-5">{{$profile->profiles->profile_resume}}</p>

                        </div>
                        <div class="tab-pane" id="profile">
                            <div class="row">
                                @foreach($profile->projects as $project)
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="pro-img-box">

                                                    <img class="w-100"
                                                         src="{{asset('images/projects/'.$project->project_photo)}}"
                                                         alt="product-image">

                                                </div>
                                                <div class="text-center pt-3">
                                                    <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$project->project_name}}</h3>
                                                    <span class="tx-15 ml-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
                                                    <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">
                                                        ${{$project->project_price}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            <form method="POST" action="{{route('profilePersonal')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="FullName">Full Name</label>
                                    <input type="text" value="{{$profile->name}}" name="name" id="FullName"
                                           class="form-control">
                                    @error('name')
                                    <small class="form-text text-danger">{{$message}}<br></small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="email" value="{{$profile->email}}" name="email" id="Email"
                                           class="form-control">
                                    @error('email')
                                    <small class="form-text text-danger">{{$message}}<br></small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="password" placeholder="8 - 16 Characters" name="password" id="Password"
                                           class="form-control" autocomplete="off">
                                    @error('password')
                                    <small class="form-text text-danger">{{$message}}<br></small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="RePassword">Re-Password</label>
                                    <input type="password" placeholder="8 - 16 Characters" name="repassword"
                                           id="RePassword" class="form-control" value="" autocomplete="off">
                                    @error('repassword')
                                    <small class="form-text text-danger">{{$message}}<br></small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="AboutMe">About Me</label>
                                    <textarea style="min-height: 95px;" id="AboutMe" name="profile_resume"
                                              class="form-control">{{$profile->profiles->profile_resume}}</textarea>
                                    @error('profile_resume')
                                    <small class="form-text text-danger">{{$message}}<br></small>
                                    @enderror
                                </div>
                                <input class="btn btn-primary waves-effect waves-light w-md" value="save" type="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
