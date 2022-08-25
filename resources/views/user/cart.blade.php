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
                <h4 class="content-title mb-0 my-auto">Cart</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ details</span>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
            <p class="text-green-800">{{ $message }}</p>
        </div>
    @endif
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <!-- Shopping Cart-->
                    <div class="product-details table-responsive text-nowrap">
                        <table class="table table-bordered table-hover mb-0 text-nowrap">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>TOTAL</th>
                                <th>Quantity</th>
                                <th>
                                    <form action="{{ route('cart.clear') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger">Remove All Cart</button>
                                    </form>
                                </th>
                                {{--                                {{route('cart.all.clear',auth()->user()->id)}}--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cartItems as $cart);
                            @php
                                $project=\App\Models\Project::where('id',$cart->id)->first();
                                $profile=\App\Models\Profile::where('user_id',$project->user_id)->first();
                                $user=\App\Models\User::where('id',$profile->user_id)->first();
                            @endphp
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="card-aside-img">
                                            <a href="">
                                                <img src="{{asset('images/projects/'.$cart->attributes->image)}}"
                                                     alt="img"
                                                     class="h-60 w-60">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="card-item-desc mt-0">
                                                <h6 class="font-weight-semibold mt-0 text-uppercase">{{$cart->name}}</h6>
                                                <dl class="card-item-desc-1">
                                                </dl>
                                                <dl class="card-item-desc-1">
                                                    <dt>Owner:<a href="{{route('myprofileID',$user->id)}}">
                                                            {{$user->name}}</a></dt>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center text-lg text-medium">{{$cart->price}} $</td>
                                <td class="tect-center">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $cart->id}}">
                                        <input type="number" name="quantity" value="{{ $cart->quantity }}"
                                               class="w-6 text-center "/>
                                        <button type="submit" class="btn btn-success">update
                                        </button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $cart->id }}" name="id">
                                        <button style="border:none;background-color:transparent;"
                                                class="remove-from-cart" href="#" data-toggle="tooltip" title=""
                                                data-original-title="Remove item"><i class="fa fa-trash"></i></button>
                                </td>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="shopping-cart-footer  border-top-0">
                        <div class="column text-lg">Subtotal: <span
                                class="tx-20 font-weight-bold mr-2"> ${{ Cart::getTotal() }}</span>
                        </div>
                    </div>
                    <div class="shopping-cart-footer">
                        <div class="column"><a class="btn btn-secondary" href="{{route('services.all')}}">Back to
                                Shopping</a></div>
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
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/select2.js')}}"></script>
    <!-- Internal Nice-select js-->
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection
