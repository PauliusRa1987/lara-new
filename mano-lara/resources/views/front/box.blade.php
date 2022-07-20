<div class="col-4 controls div-box ">
    <select class="custom-select col-form-label" name="sort" id="sort">
        <option value="" @if($req->color_id == '') selected @endif>--- Sort By ---</option>
        <option value="color-asc" @if($req->sort == 'color-asc') selected @endif>Color A-Z</option>
        <option value="color-desc" @if($req->sort == 'color-desc') selected @endif>Color Z-A</option>
        <option value="animal-asc" @if($req->sort == 'animal-asc') selected @endif>Animal A-Z</option>
        <option value="animal-desc" @if($req->sort == 'animal-desc') selected @endif>Animal Z-A</option>
    </select>
</div>
<div class="col-4 controls div-box">
    <div class="form-group">
        <select class="form-control" name="color_id">
            <option value="">What color?</option>
            @foreach($colors as $color)
            <option value="{{$color->id}}" @if($req->color_id == $color->id) selected @endif>{{$color->title}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-4 controls ">
    <button class="btn btn-success  " type="submit">Filter!</button>
    <a class="btn btn-warning  ml-2" href="{{route('front-index')}}">Reset</a>
</div>
