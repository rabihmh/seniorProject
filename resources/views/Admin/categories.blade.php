@extends('layouts.adminlayouts')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Category</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ All</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        @foreach($categories as $cat)
            <div class=" col-xl-3 col-md-3 col-lg-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="pro-img-box">
                            <div class="d-flex product-sale">

                            </div>
                            <img class="w-100" src="{{asset('images/categories/'.$cat->categories_photo)}}""
                                 alt="product-image">

                        </div>
                        <div class="text-center pt-3">
                            <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$cat->categories_name}}</h3>

                            <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">
                              Number of project:{{App\Models\Project::where('project_category',$cat->id)->count()}}</h4>
                        </div>
                    </div>
                </div>

            </div>

        @endforeach
            <a   style="margin: 10px" class="btn btn-primary float-left"href="{{route('cat.insert')}}">Add a new Categories</a>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
