@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Services</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Request</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card mg-b-20" id="list3">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="list-group">
                                @foreach($services as $service)

                                    <div class="list-group-item pd-y-20">
                                        <div class="media">
                                            <div class="d-flex mg-l-10 wd-50">
                                                @php
                                                    $photo=App\Models\Profile::select('profile_photo')->where('user_id',$service->user_id)->first()->profile_photo;
                                                $user_id=App\Models\User::select('id')->where('id',$service->user_id)->first();
                                                @endphp
                                                <a href="{{route('myprofileID',$user_id)}}">
                                                    <img class="ml-4 rounded-circle avatar-md"
                                                         src="{{asset('images/Profile/'.$photo)}}" alt="avatar"></a>
                                            </div>
                                            <div class="media-body">
                                                <div class="media-body d-flex">
                                                    <h6 class="tx-15 mb-2"><a
                                                            href="{{route('services.request.get',$service->id)}}">{{$service->service_name}}</a>
                                                    </h6>
                                                    <span
                                                        class="tx-12 float-left mr-auto text-muted">{{$service->created_at->diffForHumans()}}</span>
                                                </div>
                                                <p style="overflow: hidden;height: 43px"
                                                   class="tx-13 mg-b-10 text-muted mb-0">{{$service->service_description}}
                                                    ....</p>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
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
