@extends('layouts.app')

@section('content')


    @if (Session::has('saved'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('saved') }}</p>
    @endif



    @if (Session::has('fail'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('fail') }}</p>
    @endif

    <style>
        body {
            font-size: 15px;
        }

        th {
            padding-top: 20px;
            font-size: 18px;
            padding-bottom: 10px;
        }

        tr {
            padding-top: 80px;
        }

        th span {
            background-color: gray;
        }

        table {
            border: 1px solid black;
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 15px;
            margin-bottom: 20px;
        }

    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="margin-bottom: 50px">
                    <div class="card-body">
                        <button type="button" class="btn btn-success" style="margin-bottom: 20px;"><a
                                href="{{ route('createProduct') }}" style="color: honeydew ; 
                                                "> Create Product </a></button>
                        <table>
                            <tr>
                                <th> <span>Name</span> </th>
                                <th><span> Description</span> </th>
                                <th><span> Category</span> </th>
                                <th><span> Quantity</span> </th>
                                <th> <span> Image</span> </th>
                                <th><span> Price</span> </th>
                                <th><span>Action </span> </th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product['name'] }}</td>
                                    <td>{{ substr($product['description'], 1, 20) . '...' }}</td>
                                    <td>
                                        @foreach ($product['product_category'] as $category)
                                            <span> {{ $category['category']['name'] }} , </span>
                                        @endforeach
                                    </td>
                                    <td>{{ $product['quantity'] }}</td>
                                    <td> <img style="height: 40px; width:40px; " 
                                        src=" {{  asset($product['image'])}}  "
                                            alt="Product Image" />
                                          
                                    </td> 
                                    <td>{{ $product['price'] }}</td>
                                    <td>
                                        <a href="{{ route('Remove', $product['id']) }}"><span
                                                class="glyphicon glyphicon-minus-sign"><span></a>
                                        <a href="{{ route('getProductById', $product['id']) }}"><span
                                                class="glyphicon glyphicon-pencil"></span> </a>
                                        <a onclick="return confirm('Are you  sure whant to delete {{ $product['name'] }} Product  ?')"
                                            href="{{ route('deleteProduct', $product['id']) }}"> <span
                                                class="glyphicon glyphicon-trash"></span> </a>
                                        <a href="{{ route('showInfo', $product['id']) }}"> show </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $products->links() !!}
                        </div>
                        @include('bottom')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
