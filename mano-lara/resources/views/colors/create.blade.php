@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Create Color</div>
                <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('colors-index')}}">To Colors</a>
                <div class="card-body">
                    <form action="{{route('colors-store')}}" method="POST">
                    <div class="form-group m">
                        <div class="form-group mix">
                            <label for="color">Pick a Color</label>
                            <input class="form-control" type="color" class="form-control" name="color">
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">Color name</label>
                            <input type="text" class="form-control" name="title" >
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                        @csrf
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
