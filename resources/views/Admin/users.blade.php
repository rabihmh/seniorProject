@extends('layouts.adminlayouts')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Admin</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ User list</span>
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
        <div class="col-xl-9 col-lg-9 col-md-12">
            <form>
                <div class="card">
                    <div class="card-body p-2">
                        <div class="input-group text-center">
                            <input type="text" class="form-control" id="search" placeholder="Search ...">
                        </div>
                    </div>
                </div>
            </form>
            <h3 class="card-title mg-b-0">Total Data : <span id="total_records"></span></h3><br>

        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">

                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive border-top userlist-table">
                        <table id="users" class="table card-table table-striped table-vcenter text-nowrap mb-0">
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
                            <tbody id="content">
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        <img alt="avatar" class="rounded-circle avatar-md mr-2"
                                             src="{{asset('images/Profile/'.$user->profiles->profile_photo)}}">
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->profiles->job_name}}</td>
                                    <td>{{$user->created_at->format('Y-m-d')}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="{{route('profile',$user->id)}}" class="btn btn-sm btn-primary">
                                            <i class="las la-search"></i>
                                        </a>
                                        @if($user->approve_Id==0)
                                            <a href="{{route('user.approve',$user->id)}}" class="btn btn-sm btn-info">
                                                <i class="las la-check"></i>
                                            </a>
                                        @endif
                                        <a href="{{route('user.delete',$user->id)}}" class="btn btn-sm btn-danger">
                                            <i class="las la-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center" id="paginate">
                {{$users->links()}}
            </div>
        </div><!-- COL END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        $('#search').on('keyup', function () {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{route('admin.users.search')}}',
                data: {'search': $value},
                success: function (data) {
                    $('#paginate').hide();
                    $('#content').html(data);
                }
            });

        })
    </script>
@endsection
