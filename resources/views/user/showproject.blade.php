@extends('layouts.master')
@section('css')
    <!--Internal  Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
    <!-- Internal Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Service</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ details</span>
            </div>
        </div>
    </div>
    @if(Session::has('failed'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('failed') }}
        </div>
    @endif
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body h-100">
                    <div class="row row-sm ">
                        <div class=" col-xl-5 col-lg-12 col-md-12">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img
                                        src="{{asset('images/projects/'.$project->project_photo)}}" alt="image"/></div>
                            </div>
                        </div>
                        <div class="details col-xl-7 col-lg-12 col-md-12 mt-4 mt-xl-0">
                            <h4 class="product-title mb-1">{{$project->project_name}}</h4>
                            <div class="rating mb-1">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star text-muted"></span>
                                    <span class="fa fa-star text-muted"></span>
                                </div>
                                <span class="review-no">Views: {{views($project)->count()}}</span>
                            </div>
                            <h6 class="price">price: <span class="h3 ml-2">${{$project->project_price}}</span></h6>
                            <p class="product-description">{{$project->project_description}}</p>

                            <div>
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $project->id }}" name="id">
                                    <input type="hidden" value="{{ $project->project_name }}" name="name">
                                    <input type="hidden" value="{{ $project->project_price }}" name="price">
                                    <input type="hidden" value="{{ $project->project_photo }}" name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection
