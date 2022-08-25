@extends('layouts.adminlayouts')
@section('css')
    <!-- Internal Nice-select css  -->
    <link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Services</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ All</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div id="project_data">
        <div class="row row-sm">
            <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
                <div class="card">
                    <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">Category</div>
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <label class="form-label">Category</label>
                            <select name="service_cat" id="category" class="form-control  nice-select  custom-select">
                                @php
                                    $categories=App\Models\Categories::select()->get()
                                @endphp
                                <option selected disabled>Choose the category</option>
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->categories_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">Sub Category</label>
                            <select name="service_subcat" id="subCategory"
                                    class="form-control  nice-select  custom-select">
                                <option disabled>Choose the sub category</option>
                            </select>
                        </div>
                        <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">Filter</button>
                    </div>
                </div>

            </div>
            <div class="col-xl-9 col-lg-9 col-md-12">
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
                    @foreach($projects as $project)
                        <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="pro-img-box">
                                        <div class="d-flex product-sale">
                                            @php
                                                $photo=App\Models\Profile::select('profile_photo')->where('user_id',$project->user_id)->first()->profile_photo;
                                            $user_id=App\Models\User::select('id')->where('id',$project->user_id)->first();
                                            @endphp
                                            <a href="{{route('profile',$user_id)}}">
                                                <img class="pr-file"
                                                     src="{{asset('images/Profile/'.$photo)}}"></a>
                                        </div>
                                        <img class="w-100" src="{{asset('images/projects/'.$project->project_photo)}}"
                                             alt="product-image">
                                        <a href="{{route('project.view',$project->id)}}" class="adtocart"> <i
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
                    <div class=" mr-auto float-left">
                        {{$projects->links()}}
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <!--Script for category and subcategory selectBox-->
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
    <!--Script for filter-->
    <script>
        $(document).ready(function () {
            $('#category').on('change', function () {
                var selectedCategory = $("#category option:selected").val();

                $.ajax({
                    url: 'http://127.0.0.1:8000/services/get_more_projects/' + selectedCategory,
                    type: 'get',
                    dataType: 'json',
                    success: function (response) {
                        var len = 0;
                        if (response.data != null) {
                            len = response.data.length;
                        }

                        if (len > 0) {
                            for (var i = 0; i < len; i++) {
                                console.log(data[i]);
                            }
                        }
                    }
                })
            });

        });

    </script>

@endsection

