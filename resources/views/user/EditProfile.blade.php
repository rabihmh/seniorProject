@extends('layouts.master')
@section('css')
    {{-- Internal Select2 css--}}
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit-Profile</span>
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
        <!-- Col -->
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <div class="main-img-user profile-user">
                                <img id="imgFileUpload" alt=""
                                     src="{{asset('images/Profile/'.''.$profile->profiles->profile_photo)}}"><a
                                    class="fas fa-camera profile-edit " href=""></a>
                                <span id="spnFilePath"></span>
                            </div>
                            <div class="d-flex justify-content-between mg-b-20">
                                <div>
                                    <h5 class="main-profile-name">{{$profile->name}}</h5>
                                    <p class="main-profile-name-text">{{$profile->profiles->job_name}}</p>
                                </div>
                            </div>
                            <!-- main-profile-bio -->
                            <div class="row">
                                <div class="col-md-4 col mb20">
                                    <h5>{{$profile->created_at->format('Y-m-d')}}</h5>
                                    <h6 class="text-small text-muted mb-0">Join on</h6>
                                </div>
                                <div class="col-md-4 col mb20">
                                    <h5>{{$profile->projects->count()}}</h5>
                                    <h6 class="text-small text-muted mb-0">Services</h6>
                                </div>
                            </div>
                            <hr class="mg-y-30">
                            <label class="main-content-label tx-13 mg-b-20">Social</label>
                            <div class="main-profile-social-list">
                                <div class="media">

                                </div>
                                <div class="media">
                                    <div class="media-icon bg-primary-transparent text-primary">
                                        <i class="icon ion-logo-facebook"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Facebook</span> <a
                                            href="{{$profile->profiles->my_facebook}}">{{$profile->profiles->my_facebook}}</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon ion-logo-linkedin"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Linkedin</span> <a
                                            href="{{$profile->profiles->my_linkedin}}">{{$profile->profiles->my_linkedin}}</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-danger-transparent text-danger">
                                        <i class="icon ion-md-link"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>My Portfolio</span> <a
                                            href="{{$profile->profiles->my_portfolio}}">{{$profile->profiles->my_portfolio}}</a>
                                    </div>
                                </div>
                            </div>
                            <hr class="mg-y-30">

                            <!--skill bar-->
                        </div><!-- main-profile-overview -->
                    </div>
                </div>
            </div>
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label tx-13 mg-b-25">
                        Conatct
                    </div>
                    <div class="main-profile-contact-list">
                        <div class="media">
                            <div class="media-icon bg-primary-transparent text-primary">
                                <i class="icon ion-md-phone-portrait"></i>
                            </div>
                            <div class="media-body">
                                <span>Mobile</span>
                                <div>
                                    {{$profile->phone}}
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-success-transparent text-primary">
                                <i class="icon ion-logo-slack"></i>
                            </div>
                            <div class="media-body">
                                <span>E-mail</span>
                                <div> @php
                                        if ($profile->email_verified_at==null)
                                         echo'
                                    <a data-placement="top" data-toggle="tooltip-primary" title="Email not verified" type="button"><i style="color:#777" class="icon-close icons"></i></a>';
                                            else
                                                echo'<a data-placement="top" data-toggle="tooltip-primary" title="Email verified" type="button"><i style="color:#777" class="icon-check icons"></i></a>'
;
                                    @endphp  {{$profile->email}}</div>

                            </div>
                        </div>
                    </div><!-- main-profile-contact-list -->
                </div>
            </div>
        </div>

        <!-- Col -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 main-content-label">Personal Information</div>
                    <form class="form-horizontal" action="{{route('EditProfileStore')}}" method="POST"
                          enctype="multipart/form-data">
                        <div class="form-group ">
                            @csrf
                            <input type="file" id="FileUpload1" name="profile_photo" style="opacity: 0"/>
                        </div>
                        <div class="mb-4 main-content-label">Name</div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">User Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" placeholder="User Name"
                                           value="{{$profile->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Job title</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="job_name" placeholder="Job title"
                                           value="{{$profile->profiles->job_name}}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 main-content-label">Contact Info</div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Email<i>(required)</i></label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                           value="{{$profile->email}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Website</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="my_portfolio" class="form-control" placeholder="Website"
                                           value="{{$profile->profiles->my_portfolio}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Phone</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="phone" class="form-control" placeholder="phone number"
                                           value="{{$profile->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 main-content-label">Social Info</div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Facebook</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="my_facebook" class="form-control" placeholder="facebook"
                                           value="{{$profile->profiles->my_facebook}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Linked in</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text"  class="form-control" placeholder="linkedin"
                                           value="{{$profile->profiles->my_linkedin}}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 main-content-label">About Yourself</div>
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Biographical Info</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea class="form-control" name="profile_resume" rows="4"
                                              placeholder="">{{$profile->profiles->profile_resume}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 main-content-label">Email Preferences</div>
                        <div class="form-group mb-0">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Verified User</label>
                                </div>
                                @php
                                    $check="";
                                        $user_id=auth()->user()->id;
                                         $bool=\App\Models\Profile::select('freelancer')->where('user_id',$user_id)->first();
                                        if($bool->freelancer===1){
                                             $check='checked';
                                        }else{
                                             $check="";
                                        }
                                @endphp
                                <div class="col-md-9">
                                    <div class="custom-controls-stacked">
                                        <label class="ckbox mg-b-10"><input value="1" name="freelancer" type="checkbox" {{$check}} ><span>Freelancer</span></label>
                                        <label class="ckbox"><input checked="" disabled type="checkbox"><span>Buyer</span></label>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-left" style="margin-top: 40px;">
                            <input type="submit" class="btn btn-primary waves-effect waves-light"
                                   value="Update Profile">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Col -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script>
        window.onload = function () {
            var fileupload = document.getElementById("FileUpload1");
            var filePath = document.getElementById("spnFilePath");
            var image = document.getElementById("imgFileUpload");
            image.onclick = function () {
                fileupload.click();
            };
            fileupload.onchange = function () {
                var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];
                filePath.innerHTML = "<b>Selected File: </b>" + fileName;
            };
        };
    </script>
    <script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection
