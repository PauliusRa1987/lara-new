@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Colors Page</div>
                <div class="header-box">
                @if(Auth::user()->role > 9)
                    <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('colors-create')}}">To create</a>
                @endif
                    <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('animals-index')}}">To animals</a>
                </div>
                    
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($colors as $color)
                        <li class="list-group-item m-2" style="background: {{$color->color}}">{{$color->title}}</li>
                        <form action="{{route('colors-delete', $color)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger m-2 " type="submit">Delete</button>
                        </form>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

