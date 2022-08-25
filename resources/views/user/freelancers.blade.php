@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Freelancers </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ All</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!--Row-->
    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">List Of Freelancers</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="wd-lg-8p"><span>Name</span></th>
                                <th class="wd-lg-20p"><span></span></th>
                                <th class="wd-lg-8p"><span>Jobs Name</span></th>
                                <th class="wd-lg-20p"><span>Created</span></th>
                                <th class="wd-lg-20p"><span>Email</span></th>
                                <th class="wd-lg-20p">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($freelancers as $freelancer)
                                <tr>

                                    <td>
                                        <img alt="avatar" class="rounded-circle avatar-md mr-2"
                                             src="{{asset('images/Profile/'.$freelancer->profiles->profile_photo)}}">
                                    </td>
                                    <td>{{$freelancer->name}}</td>
                                    <td>{{$freelancer->profiles->job_name}}</td>
                                    <td>
                                        {{$freelancer->created_at->format('Y-m-d')}}
                                    </td>
                                    <td>
                                        <a href="#">{{$freelancer->email}}</a>
                                    </td>
                                    <td>
                                        <a style="color: #fff" class="btn btn-primary">Hire me <i
                                                class="fa-solid fa-paper-plane"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center" style="margin-top: 20px">
                        {{$freelancers->links()}}
                    </div>

                </div>
            </div>
        </div><!-- COL END -->
    </div>
    <!-- row closed  -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
@endsection
