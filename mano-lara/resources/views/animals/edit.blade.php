@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 ">
            <div class="card">
                <div class="card-header">Edit Animal</div>
                <div class="card-body edit">
                    <form class="form club" action="{{route('animals-update', $animal)}}" method="post">
                        <div class="form-group m">
                        <input class="form-control mr-1" type="text" name="name" value="{{old('name', $animal->name)}}">
                        <select class="form-control mt-3" name="color_id">
                            @foreach($colors as $color)
                            <option value="{{$color->id}}" @if($color->id == old('color_id', $color->id))
                                selected
                                @endif>{{$color->title}}</option>
                            @endforeach
                        </select>
                        @method('put')
                        <button class="btn btn-outline-danger mt-5 " type="submit">Edit!</button>
                        @csrf
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
