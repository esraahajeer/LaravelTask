@extends('layouts.app')

@section('content')

    @if (Session::has('saved'))
        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('saved') }}</p>
    @endif

    @if (Session::has('fail'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
    @endif

    <style>
        body {
            font-size: 15px;
        }

        .inputSi {
            width: 200px;
        }

    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="margin-bottom: 50px">
                    <div class="card-body">

                        <form action="{{ route('AddCategory') }}" method="post">
                            @csrf

                            <div class="form-group mb-4">
                                <input type="text" name="category" id="category" placeholder="Category Name"
                                    class="center-block inputSi form-control fadeIn second bg-gray-100 border-2 w-full p-4 rounded-lg @error('idNumber') border-red-500 @enderror"
                                    value="{{ old('category') }}">
                                @error('category')
                                    <div style="color: red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div style=" display: flex;  justify-content: center;">
                                <button type="submit" class="btn btn-success" style="margin-bottom: 20px;">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('bottom')
@endsection
