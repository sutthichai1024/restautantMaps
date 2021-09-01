@extends('layouts.master')
@section('page-style')
<style>

    body {
        background-color: #eee
    }
    
    .card {
        border: none;
        border-radius: 10px
    }
    
    .c-details span {
        font-weight: 300;
        font-size: 13px
    }
    
    
    .badge span {
        width: 60px;
        height: 25px;
        padding-bottom: 3px;
        border-radius: 5px;
        display: flex;
        color: #fff;
        justify-content: center;
        align-items: center
    }

    .badge span.green{
        background-color: green
    }

    .badge span.red{
        background-color: red
    }
    
    .progress {
        height: 10px;
        border-radius: 10px
    }
    
    .progress div {
        background-color: red
    }
    
    .text1 {
        font-size: 14px;
        font-weight: 600
    }
    
    .text2 {
        color: #a5aec0
    }
    .checked {
        color: orange;
    }
</style>
@endsection
@section('content')
<div class="container">
    <h1>Restaurant list</h1>
    <form action="{{ url('/test') }}"  method="post">
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="inputSearch" class="form-label">Find location</label>
        <input name="inputSearch" class="form-control" id="exampleInputEmail1" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="row mt-5">
        @foreach ($restautant as $item)
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">{{$item['name']}}</h6> <span> Rating : {{$item['rating'] }}</span>
                        </div>
                    </div>
                    @if(isset($item['opening_hours']) ) <div class="badge"> <span class="green">Open</span> </div> @else <div class="badge"> <span class="red">Close</span> </div> @endif
                </div>
                <div class="mt-5">
                @if (isset($item['photos']))
                    <img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference={{ $item['photos']['0']['photo_reference'] }}&key={{env('KEY_GMAP')}}" class="img-thumbnail" >
                @else
                    <img src="https://image.freepik.com/free-vector/tiny-people-examining-operating-system-error-warning-web-page-isolated-flat-illustration_74855-11104.jpg" class="img-thumbnail" >
                @endif
                    <div class="mt-5">
                        <div class="mt-3"> {{$item['formatted_address']}} </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
  </div>

</div>
@endsection

