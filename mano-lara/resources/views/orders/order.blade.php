<div class="div-btn-box for-index">
    <form class="for-index" action="{{route('orders-add')}}" method="post">
        <input class="col-3" type="number" name="animals_count">
        <button class="btn btn-outline-warning" type="submit">Order</button>
        <input type="hidden" value="{{$animal->id}}" name="animal_id">
        @csrf
    </form>
</div>
