@extends('layouts.adminlayouts')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Admin</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ dashboard</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-primary-gradient text-white ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-users tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <a href="{{route('admin.users')}}">
                                    <span class="text-white">Members</span>
                                    <h2 class="text-white mb-0">{{auth()->user()->count()}}</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-danger-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-shopping-cart tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <a href="{{route('admin.projectsApprove')}}">
                                    <span class="text-white">Project</span>
                                    <h2 class="text-white mb-0">{{\App\Models\Project::count()}}</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-success-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-bar-chart-2 tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">Pending Users</span>
                                <h2 class="text-white mb-0">{{\App\Models\User::where('approve_id',0)->where('is_admin',0)->count()}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 col-md-6 col-12">
            <div class="card bg-warning-gradient text-white">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="icon1 mt-2 text-center">
                                <i class="fe fe-pie-chart tx-40"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mt-0 text-center">
                                <span class="text-white">Pending Projects</span>
                                <h2 class="text-white mb-0">{{\App\Models\Project::where('approve_Id',0)->count()}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    <!--row-->
    <div class="row row-sm">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="card order-list">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10">Latest 5 Registered Users</h4>

                        <i class="mdi mdi-dots-vertical"></i>
                    </div>
                    <br>
                    <ul class="list list-noborders pb-0 mb-0">
                        @php
                            $users=\App\Models\User::with('profiles')->where('is_admin',0)->orderBy('id','desc')->take(5)->get();
                        @endphp
                        @foreach ($users as $user)
                            <li class="list-item">
                                <img
                                    class="img-sm rounded-circle bg-warning d-flex align-items-center justify-content-center text-white"
                                    src="{{asset('images/Profile/'.''.$user->profiles->profile_photo)}}"
                                    alt="Profile Image">
                                <div class=" mr-3">
                                    <h6 class="mb-1 font-weight-medium">{{$user->name}}</h6>
                                    <p class="mb-0 text-muted tx-13">{{$user->profiles->job_name}}</p>
                                </div>
                                <div class="mr-auto d-flex">
                                    @if($user->approve_Id==0)
                                        <a href="{{route('user.approve',$user->id)}}" style="color:#fff;"
                                           class="btn btn-primary ml-1">Approve</a>
                                    @endif
                                    <a href="{{route('user.delete',$user->id)}}" style="color:#fff;"
                                       class="btn btn-danger">Delete</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
            <div class="card order-list">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10">Latest 5 Project</h4>
                        <i class="mdi mdi-dots-vertical"></i>
                    </div>
                    <br>
                    <ul class="list list-noborders pb-0 mb-0">
                        @php
                            $projects=\App\Models\Project::orderBy('id','desc')->take(5)->get();
                        @endphp
                        @foreach ($projects as $project)
                            <li class="list-item">
                                <img
                                    class="img-sm rounded-circle bg-warning d-flex align-items-center justify-content-center text-white"
                                    src="{{URL::asset('assets/img/faces/3.jpg')}}" alt="Profile Image">
                                <div class=" mr-3">
                                    <h6 class="mb-1 font-weight-medium">{{$project->project_name}}</h6>
                                    @php
                                        $Users=App\Models\User::with('profiles')->where('id',$project->user_id)->first();

                                    @endphp
                                    <a href="{{route('profile',$Users->id)}}">
                                        <p class="mb-0 text-muted tx-13">{{$Users->name}}</p></a>
                                </div>
                                <div class="mr-auto d-flex">
                                    @if($project->approve_Id==0)
                                        <a href="{{route('project.approve',$project->id)}}" style="color:#fff;"
                                           class="btn btn-primary ml-1">Approve</a>
                                    @endif
                                    <a href="{{route('admin.project.delete',$project->id)}}" style="color:#fff;"
                                       class="btn btn-danger">Delete</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--row closed-->
    <!--row-->
    <div class="row row-sm">
        <div class="col-md-6">
            <div class="card mg-b-20 mg-md-b-0">
                <div class="card-body">
                    <div class="main-content-label mg-b-5">
                        Pie Chart
                    </div>
                    <div style="width:75%;">
                        {{ $chartjs->render() }}
                    </div>
                </div>
            </div>
        </div><!-- col-6 -->
    </div>
    <br>
    <!-- End row-->

    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
