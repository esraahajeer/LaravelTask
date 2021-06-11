
@extends('layouts.app')

@section('content')
<style>
    body{
        font-size: 15px;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div> <label >Total Users :  </label> <span>{{$total['totalUsers']}} </span> </div>
                    <div> <label >Total Products :</label> <span> {{$total['totalProducts']}}</span> </div>
                    <div> <label >Total Category : </label> <span> {{$total['totalCategory']}}</span> </div>
                </div>
                <div style="height: 400px ; width :800px;">
                    {{ $chart->container() }}
                    {{ $chart->script() }}
                
                </div>

                
                @include('bottom')
            </div>
        </div>
    </div>
</div>




@endsection






