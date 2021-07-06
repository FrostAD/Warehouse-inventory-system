@extends('layouts.app')
@section('content')
    <x-alert/>
    <form action="/order/send" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$order->id}}">

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputAutoFill">Item</label>
                <select id="inputAutoFill" name="item_id" class="form-control" disabled>
                    @foreach($items as $item)
                        <option value="{{$item->id}}"
                                @if($item->id == $order->item_id)
                                selected="selected"
                            @endif
                        >{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputQuantity">Quantity</label>
                <input type="number" step="1" min="0" name="quantity" class="form-control" id="inputQuantity" value="{{$order->quantity}}" readonly>
            </div>
            <div class="form-group col-md-3">
                <label for="inputPrice">Price</label>
                <input type="number" step="0.01" min="0" class="form-control" id="inputPrice" name="price" value="{{$order->price}}" readonly>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
    </form>

@endsection
