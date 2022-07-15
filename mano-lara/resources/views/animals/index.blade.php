@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">Animal List</div>
                <div class="header-box">
                @if(Auth::user()->role > 9)
                    <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('animals-create')}}">To create</a>
                @endif
                    <a class="btn btn-outline-primary btn-sm link-btn" href="{{route('colors-index')}}">To colors</a>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach($animals as $animal)
                        <div class="div-box">
                        <li class="list-group-item li" style="background: {{$animal->colorSite->color}}">{{$animal->name}}</li>
                        <div class="div-btn-box">
                        @if(Auth::user()->role > 9)
                        <a class="btn btn-outline-success m-2 link-btn"  href="{{route('animals-edit', $animal)}}">To edit</a>
                        <form action="{{route('animals-delete', $animal)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger m-2 " type="submit">Kill BIll</button>
                        </form>
                        @endif
                        </div>
                        </div>
                        @endforeach  
                    </ul>
                    <div class="nav nav-pills" >
                    <a class="nav-link" href="{{route('animals-index', ['sort' => 'asc'])}}">A-Z</a>
                    <a class="nav-link" href="{{route('animals-index', ['sort' => 'desc'])}}">Z-A</a>
                    <a class="nav-link" href="{{route('animals-index')}}">Reset</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
