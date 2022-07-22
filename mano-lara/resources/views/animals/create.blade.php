@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Create Animal</div>
                <div class="card-body edit">
                    <form class="form club" action="{{route('animals-store')}}" method="post">
                        <div class="form-group m">
                        <input class="form-control mr-1" type="text" name="name">
                        <select class="form-control mt-3" name="color_id">
                        <option value="">-- Pick the color --</option>
                            @foreach($colors as $color)
                            <option value={{$color->id}}>{{$color->title}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-outline-success mt-5" type="submit">Take!</button>
                        @csrf
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
