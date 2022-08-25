@extends('layouts.master')
@section('css')
    <!-- Internal Gallery css -->
    <link href="{{URL::asset('assets/plugins/gallery/gallery.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Main</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Home</span>
            </div>
        </div>
    </div>
    @if(Session::has('notFreelancer'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('notFreelancer') }}
        </div>
    @endif
    <!-- breadcrumb -->
@endsection
@section('content')
    @php
        $categories=App\Models\Categories::select()->get()
    @endphp
    <h2 class="text-center mg-b-40 f" style="font-size: 24px">All creative and professional services to develop and grow
        your business</h2>

    <!-- Categories -->
    <div class="demo-gallery">
        <ul id="lightgallery" class="list-unstyled row row-sm pr-0">
            @foreach($categories as $cat)
                <li class=" col-xl-3 col-sm-6 col-lg-4">
                    <a href="{{route('services',$cat->categories_name)}}">
                        <img class="img-responsive" src="{{asset('images/categories/'.$cat->categories_photo)}}"
                             alt="Thumb-1">
                        <span
                            style="text-align: center;position: relative;bottom: 50%;z-index: 9999;left: -39%;color: #fff;font-weight: bold;font-size: 17px;">{{$cat->categories_name}}</span>

                    </a>
                </li>
            @endforeach
        </ul>
        <!-- /Categories -->
    </div>
    <!-- row closed -->
    </div>
    {{-- Start Programming and development services--}}
    <!--Start Head Category-->
    <div class="container-fluid">
        <div class="category-head">
            <a href="{{route('services','Programming')}}" class="btn btn-outline-success btn-block">Show all</a>
            <h1><a>Programming and development services</a></h1>
        </div>
    </div>
    <!--End Head Category-->
    <div class="container-fluid">
        <div class="row ">
            @php
                $cat_id = App\Models\Categories::select('id')->where('categories_name','Programming')->get()->first();
                $programming_projects=App\Models\Project::with('users', 'categories', 'subcategories',)->where('approve_Id', 1)->where('project_category', $cat_id->id)->orderBy('id','desc')->take(4)->get();
            @endphp
            @foreach($programming_projects as $project)
                <div class=" col-xl-3 col-md-3 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pro-img-box">
                                <div class="d-flex product-sale">
                                    @php
                                        $photo=App\Models\Profile::select('profile_photo')->where('user_id',$project->user_id)->first()->profile_photo
                                    @endphp
                                    <a href="{{route('myprofileID',$project->user_id)}}">

                                        <img class="pr-file"
                                             src="{{asset('images/Profile/'.$photo)}}"></a>
                                </div>
                                <img class="w-100" src="{{asset('images/projects/'.$project->project_photo)}}"
                                     alt="product-image">
                                <a href="{{route('services.get',$project->id)}}" class="adtocart"> <i
                                        class="las la-shopping-cart "></i>
                                </a>
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
    {{-- End Programming and development services--}}

    {{-- Start Business Services--}}
    <!--Start Head Category-->
    <div class="container-fluid">
        <div class="category-head">
            <a  href="{{route('services','Bussiness')}}" class="btn btn-outline-success btn-block">Show all</a>
            <h1><a>Business Services</a></h1>
        </div>
    </div>
    <!--End Head Category-->
    <div class="container-fluid">
        <div class="row ">
            @php
                $cat_id = App\Models\Categories::select('id')->where('categories_name','Bussiness')->get()->first();
                $programming_projects=App\Models\Project::with('users', 'categories', 'subcategories',)->where('approve_Id', 1)->where('project_category', $cat_id->id)->orderBy('id','desc')->take(4)->get();
            @endphp
            @foreach($programming_projects as $project)
                <div class=" col-xl-3 col-md-3 col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="pro-img-box">
                                <div class="d-flex product-sale">
                                    @php
                                        $photo=App\Models\Profile::select('profile_photo')->where('user_id',$project->user_id)->first()->profile_photo
                                    @endphp
                                    <a href="{{route('myprofileID',$project->user_id)}}">
                                        <img class="pr-file"
                                             src="{{asset('images/Profile/'.$photo)}}">
                                    </a>
                                </div>
                                <img class="w-100" src="{{asset('images/projects/'.$project->project_photo)}}"
                                     alt="product-image">
                                <a href="{{route('services.get',$project->id)}}" class="adtocart"> <i
                                        class="las la-shopping-cart "></i>
                                </a>
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
    {{-- End Business Services--}}

    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')

@endsection
