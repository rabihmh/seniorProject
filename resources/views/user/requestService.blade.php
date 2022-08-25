@extends('layouts.mymain')
@section('css')
    <link href="{{URL::asset('assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('my-content')

    <div class="container">
        <h1>Request a services</h1>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <form method="POST" action="{{route('storeServicesRequest')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3"><label class="form-label" for="text-input">Service title</label><input
                    id="text-input" class="form-control" type="text" name="service_title"/>
                @error('service_title')
                <small class="form-text text-danger">{{$message}}<br></small>
                @enderror
                <small style="color:rgba(166,161,161,0.99)">
                    Enter a clear title in Arabic describing the service you want to provide. Do not enter symbols or
                    words such as “exclusively”, “for the first time”, “for a limited time”, etc.
                </small>
            </div>
            <label class="form-label">Category</label>
            <div class="row ">
                <div class="col-md-6">
                    <select class="form-select" name="service_cat" aria-label="Default select example"
                            id="category">
                        @php
                            $categories=App\Models\Categories::select()->get()
                        @endphp
                        <option selected disabled>Choose the category</option>
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->categories_name}}</option>
                        @endforeach

                    </select>
                    @error('service_cat')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <select class="form-select" name="service_subcat" aria-label="Default select example"
                            id="subCategory">
                        <option disabled>Choose the sub category</option>
                    </select>
                    @error('service_subcat')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class=" mt-3 mb-3">
                <label for="description" class="form-label">Service description</label>
                <textarea style="resize: none;height: 315px" class="form-control" id="description" rows="5"
                          name="service_desc"></textarea>
                @error('service_desc')
                <small class="form-text text-danger">{{$message}}<br></small>
                @enderror
                <small style="color:rgba(166,161,161,0.99)">Enter an accurate service description that includes all
                    information and conditions. It is
                    forbidden to put an email, phone number or any other contact information.</small>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="duration">Service duration</label>
                    <select id="duration" class="form-select" name="service_duration"
                            aria-label="Default select example">
                        <option value="Two days">Two days</option>
                        <option value="Three days">Three days</option>
                        <option value="Four days">Four days</option>
                        <option value="Five days">Five days</option>
                        <option value="Six days">Six days</option>
                        <option value="One Week">One week</option>
                        <option value="Two weeks">Two weeks</option>
                        <option value="Three weeks">Three weeks</option>
                        <option value="Month">Month</option>
                    </select>
                    @error('service_duration')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="price">Service price</label>
                    <select id="price" class="form-select" name="service_price"
                            aria-label="Default select example">
                        <option value="25-50">25-50 $</option>
                        <option value="50-100">50-100 $</option>
                        <option value="100-250">100-250 $</option>
                        <option value="250-500">250-500 $</option>
                        <option value="500-1000">500-1000 $</option>
                        <option value="1000-2500">1000-2500$</option>
                    </select>
                    @error('service_price')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-3">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{URL::asset('assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{URL::asset('assets/js/advanced-form-elements.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
    <!-- Internal TelephoneInput js-->
    <script src="{{URL::asset('assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
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
