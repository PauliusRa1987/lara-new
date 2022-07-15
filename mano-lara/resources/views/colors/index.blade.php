@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Colors Page</div>
                    <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('animals-index')}}">To animals</a>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($colors as $color)
                        <li class="list-group-item m-2" style="background: {{$color->color}}">{{$color->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

