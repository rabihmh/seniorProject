@extends('layouts.adminlayouts')
@section('content');

<div class="container">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('failed'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('failed') }}
        </div>
    @endif
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Project_name</th>
            <th scope="col">Project_category</th>
            <th scope="col">Project_subcategory</th>
            <th scope="col">User</th>
            <th scope="col">Control</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $proj)
            <tr>
                <th>{{$proj->id}}</th>
                <th>{{$proj->project_name}}</th>
                <th>{{$proj->categories->categories_name}}</th>
                <th>{{$proj->subcategories->subCat_name}}</th>
                <th>{{$proj->users->name}}</th>
                <th>
                    @if($proj->approve_Id==0)
                        <a href="{{route('project.approve',$proj->id)}}" class=" btn btn-primary">Approve</a>
                    @endif
                    <a href="{{route('admin.project.delete',$proj->id)}}" class=" btn btn-danger">Delete</a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
