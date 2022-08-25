@extends('layouts.master')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Services</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ My</span>
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
        <div class="col-xl-12 col-lg-9 col-md-12">
            <div class="card">
                <div class="card-body p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search ...">
                        <span class="input-group-append">
										<button class="btn btn-primary" type="button">Search</button>
									</span>
                    </div>
                </div>
            </div>
            <div class="row row-sm">
                @foreach($my_Project as $project)
                    <div class="col-md-6 col-lg-6 col-xl-3  col-sm-6">
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
                                    <a class="float-right btn btn-danger"
                                       href="{{route('myservice.delete',$project->id)}}"><i
                                            class="fa-solid fa-trash-can"></i> delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <ul class="pagination product-pagination mr-auto ">
                <li class="page-item page-prev disabled">
                    <a class="page-link" href="#" tabindex="-1">Prev</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item page-next">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection
