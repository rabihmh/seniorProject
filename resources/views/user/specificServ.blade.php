@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Services</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$cat_name}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12 col-lg-9 col-md-12">
            <div class="row row-sm">
                @if(($services!==null))
                    @foreach($services as $service)
                        <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="pro-img-box">
                                        <div class="d-flex product-sale">
                                            @php
                                                $photo=App\Models\Profile::select('profile_photo')->where('user_id',$service->user_id)->first()->profile_photo;
                                            $user_id=App\Models\User::select('id')->where('id',$service->user_id)->first();
                                            @endphp
                                            <a href="{{route('myprofileID',$user_id)}}">
                                                <img class="pr-file"
                                                     src="{{asset('images/Profile/'.$photo)}}"></a>
                                        </div>
                                        <img class="w-100" src="{{asset('images/projects/'.$service->project_photo)}}"
                                             alt="product-image">
                                        <a href="{{route('services.get',$service->id)}}" class="adtocart"> <i
                                                class="las la-shopping-cart "></i>
                                        </a>
                                    </div>
                                    <div class="text-center pt-3">
                                        <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{$service->project_name}}</h3>
                                        <span class="tx-15 ml-auto">
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star text-warning"></i>
												<i class="ion ion-md-star-half text-warning"></i>
												<i class="ion ion-md-star-outline text-warning"></i>
											</span>
                                        <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">
                                            ${{$service->project_price}}</h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @else
                    no data
                @endif

                <div>
                    {{$services->links()}}
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
    <script>
        $(document).ready(function () {
            $('#category').change(function () {
                var id = $(this).val();

                $('#subCategory').find('option').not(':first').remove();

                $.ajax({
                    url: 'http://127.0.0.1:8000/getSub/' + id,
                    type: 'get',
                    dataType: 'json',
                    success: function (response) {
                        var len = 0;
                        if (response.data != null) {
                            len = response.data.length;
                        }

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                var id = response.data[i].id;
                                var name = response.data[i].subCat_name;

                                var option = "<option value='" + id + "'>" + name + "</option>";

                                $("#subCategory").append(option);
                            }
                        }
                    }
                })
            });
        });
    </script>
@endsection
