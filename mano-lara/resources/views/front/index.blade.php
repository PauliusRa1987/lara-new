@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">Animal List</div>

                <div class="card-body">

                    <div class="list-group-item">
                        <form class=" list-bin" action="" method="get">
                            @include('front.box')
                        </form>
                        <form class=" list-bin mt-4" action="" method="get">
                            @include('front.search')
                        </form>
                    </div>
                    @include('front.nav')
                    <ul>
                        @foreach($animals as $animal)
                        <div class="div-box">
                            <li class="list-group-item li mt-2" style="background: {{$animal->color}}">
                                <div class="li-ins">{{$animal->name}}<i class="i">{{$animal->title}}<i></div>
                            </li>
                            <div class="div-btn-box">
                                <form action="" method="get">
                                    <button class="btn btn-outline-warning m-2 " type="submit">Kill BIll</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </ul>
                </div>
                @include('front.nav')
            </div>
        </div>
    </div>
</div>
@endsection
