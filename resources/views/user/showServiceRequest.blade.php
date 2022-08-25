@extends('layouts.master')
@section('css')
    <style>
        .detailss {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 3px;
        }

        .custom-icon {
            color: #11b711;
            font-size: 17px;
            position: relative;
            top: 3px;
            right: 3px;
        }
    </style>


@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Services</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Show</span>

            </div>
        </div>
    </div>

    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <h1 style="margin: 10px auto">{{$project->service_name}}</h1>
        <div class="col-xl-8 col-lg-9 col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0 pb-0">Service details</h5>
                </div>
                <div class="card-body">
                    {{$project->service_description}}
                </div>
            </div>
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0 pb-0">Category</h5>
                </div>
                <div class="card-body">
                    @php
                        $category=\App\Models\Categories::select('categories_name')->where('id',$project->service_category)->first();
                    $sub=\App\Models\Subcategory::select('subCat_name')->where('id',$project->service_subcategory)->first();
                    @endphp
                    {{$category->categories_name}}/{{$sub->subCat_name}}
                </div>
            </div>

        </div>
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0 pb-0">Service Card
                    </h5>
                </div>
                <div class="card-body ">
                    <div class="detailss">
                        <span>Project state</span>
                        <span>
                            @if($project->stage==0)
                                <span class="btn btn-success">Open</span>
                            @elseif($project->stage==1)
                                <span class="btn btn-danger">closed</span>
                            @elseif($project->stage==2)
                                <span class="btn btn-danger">closed</span>
                            @endif
                        </span>

                    </div>
                    <div class="detailss">
                        <span>Date</span>
                        <span>{{$project->created_at->diffForHumans()}}</span>
                    </div>
                    <div class="detailss">
                        <span>Budget</span>
                        <span>$ {{$project->service_price}}</span>
                    </div>
                    <div class="detailss">
                        <span>Duration</span>
                        <span>{{$project->service_duration}}</span>
                    </div>
                    <div class="detailss">
                        <span>Number of offers</span>
                        <span>4</span>
                    </div>


                </div>
            </div>
            <div class="card">
                <div class="card-header pb-0">
                </div>
                <div class="card-body ">
                    <div>
                        <p>@if($project->stage==0)<i class="icon-check icons custom-icon"></i>@endif Stage of receiving
                            offers</p>
                        <p>@if($project->stage==1)<i class="icon-check icons custom-icon"></i>@endif Execution stage</p>
                        <p>@if($project->stage==2)<i class="icon-check icons custom-icon"></i>@endif Delivery stage</p>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-header pb-0">
                    <h5 class="card-title mb-0 pb-0">Service Owner
                    </h5>
                </div>
                <div class="card-body ">
                    @php
                        $photo=App\Models\Profile::select('profile_photo')->where('user_id',$project->user_id)->first()->profile_photo;
                    $user_id=App\Models\User::select('id')->where('id',$project->user_id)->first();
                    @endphp
                    <div>
                        <span>{{$project->users->name}}</span>
                        <span><a href="{{route('myprofileID',$user_id)}}"><img
                                    style="width: 60px;height: 60px;border-radius: 50%"
                                    src="{{asset('images/Profile/'.$photo)}}"></a></span>
                    </div>
                </div>
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
