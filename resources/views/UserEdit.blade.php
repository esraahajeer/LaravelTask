@extends('layouts.app')

@section('content')

    <style>
         body{
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
                        <form action="{{ route('editUser', $user['id']) }}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <input type="text" name="name" id="name"
                                    class="center-block inputSi form-control fadeIn second bg-gray-100 border-2 w-full p-4 rounded-lg @error('idNumber') border-red-500 @enderror"
                                    value="{{ $user['name'] }}">
                                @error('name')
                                    <div style="color: red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" name="email" id="email"
                                    class="center-block inputSi form-control fadeIn second bg-gray-100 border-2 w-full p-4 rounded-lg @error('phone') border-red-500 @enderror"
                                    value="{{ $user['email'] }}">
                                @error('email')
                                    <div style="color: red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="password" id="password" placeholder="password"
                                    class="center-block inputSi form-control fadeIn second bg-gray-100 border-2 w-full p-4 rounded-lg @error('phone') border-red-500 @enderror"
                                    value="{{ old('password') }}">
                                @error('password')
                                    <div style="color: red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div style=" display: flex;  justify-content: center;">
                                <button type="submit" class="btn btn-success"
                                    style="margin-top: 20px; margin-bottom: 20px;">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('bottom')
@endsection
