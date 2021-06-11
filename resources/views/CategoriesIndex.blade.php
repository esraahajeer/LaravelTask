@extends('layouts.app')

@section('content')


@if (Session::has('saved'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('saved') }}</p>
@endif

@if (Session::has('fail'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('fail') }}</p>
@endif
<style>
    body{
        font-size: 
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
    table{
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
                        <button type="button" class="btn btn-success" style="margin-bottom: 20px;"><a href="{{ route('createCategory') }}" style="color: honeydew ; 
                            "> Create Category </a></button>
                        <table>
                            <tr >
                                <th style="padding-top: 20px;"> <span>Name </span> </th>
                                <th style="padding-top: 20px;"> <span>Total Products </span> </th>
                                <th style="padding-top: 20px;"><span>Action </span> </th>
                            </tr>
                            @foreach ($Categories as $category)
                            <tr>  
                                <td>{{$category['name']}}</td>
                                <td> {{ $category->products->count() }} </td>
                                <td> 
                                    <a href="{{ route('getCategoryById',$category['id']) }} "> <span class="glyphicon glyphicon-pencil"></span> </a>
                                    <a onclick="return confirm('Are you  sure whant delete {{$category['name']}} Category  ?')" href="{{ route('deleteCategory',$category['id']) }}"> <span class="glyphicon glyphicon-trash"></span> </a>
                                </td>
                            </tr> 
                            @endforeach
                            
                        </table>

                        <div class="d-flex justify-content-center">
                            {!! $Categories->links() !!}
                        </div>
                        
                        @include('bottom')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
