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

                        <form action="{{ route('AddProduct') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <input type="text" name="name" id="name" placeholder="Product Nmae"
                                    class="center-block inputSi form-control fadeIn second bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div style="color: red">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <textarea placeholder="description"
                                    class="center-block inputSi form-control fadeIn second bg-gray-100 border-2 w-full p-4 rounded-lg @error('description') border-red-500 @enderror"
                                    name="description" id="description" rows="4" cols="50">
                                            </textarea>
                            </div>

                            <div style=" display: flex;  justify-content: center;">
                                <div class="form-group mb-4" style="align=center">
                                    <select style="width: 200px; align=center;" data-placeholder="Select Category" multiple
                                        class="center-block chosen-select" name="category[]">
                                        @foreach ($category as $val)
                                            <option value=""></option>
                                            <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>

                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div style="color: red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <input type="text" name="quantity" id="quantity" placeholder="quantity"
                                    class="center-block inputSi form-control fadeIn second bg-gray-100 border-2 w-full p-4 rounded-lg @error('quantity') border-red-500 @enderror"
                                    value="{{ old('quantity') }}">
                            </div>
                            <div class="form-group mb-4">
                                <input type="text" name="price" id="price" placeholder="price"
                                    class="center-block inputSi form-control fadeIn second bg-gray-100 border-2 w-full p-4 rounded-lg @error('price') border-red-500 @enderror"
                                    value="{{ old('price') }}">
                            </div>
                            <div style=" display: flex;  justify-content: center;">
                                <div class="custom-file inputSi ">
                                    <input type="file" name="file" class="custom-file-input" id="chooseFile">
                                    <label class="custom-file-label" for="chooseFile">Choose file</label>
                                </div>
                            </div>
                            <div style=" display: flex; justify-content: center;">
                                <button type="submit" class="btn btn-success"
                                    style="margin-bottom: 20px; margin-top: 20px; ">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })

    </script>
    @include('bottom')
@endsection
