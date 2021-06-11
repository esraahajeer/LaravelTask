@extends('layouts.app')

@section('content')


    @if (Session::has('saved'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('saved') }}</p>
    @endif

    @if (Session::has('fail'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('fail') }}</p>
    @endif
    <style>
        span{
            color: darkcyan;
            font-size: 13px;
        }
        label{
            font-size: 15px;
        }
        img{
            width: 200px;
            height: 200px;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="margin-bottom: 50px">
                    <div class="card-body">
                        @foreach ($info as $value)
                        <img src="{{ $value['image'] }} " alt="Product Image">
                        <h3> Presonal Informayion</h3>
                        <div><label> Name <label> <span>{{ $value['user']['name'] }} </span></div>
                        <div><label>Email </label> <span>{{ $value['user']['email'] }}</span> </div>
                        <div><h3> Product Informayion</h3> </div>
                        <div><label>Product Name </label> <span>{{ $value['name'] }}</span>  </div>
                        <div><label>Product Description </label> <span>{{ $value['description'] }}</span> </div>

                        <div><label>Product Categoey </label> 
                            <span>
                                <ul>
                                    @foreach ( $value['product_category'] as $category)
                                    <li>
                                     {{$category ['category']['name']  }}
                                    </li>
                                    @endforeach
                                </ul>
                            </span> 
                        </div>
                        <div><label> Product Price</label> <span>{{ $value['price'] }}</span> </div>
                        <div><label>Product Quantity </label> <span>{{ $value['quantity'] }}</span> </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('bottom')
@endsection
