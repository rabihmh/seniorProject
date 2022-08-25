@extends('layouts.adminlayouts')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Categories</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Add</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->


        <h1 class="text-center">Add A Categories</h1>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif
        <form action="{{route('cat.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="photo" class="form-label">Categories Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            @error('photo')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <div class="mb-3">
                <label for="cat_name" class="form-label">Categories Name</label>
                <input type="text" class="form-control" id="cat_name" name="cat_name">
            </div>
            @error('cat_name')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror

            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
