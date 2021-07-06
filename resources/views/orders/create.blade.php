@extends('layouts.app')
@section('content')
    <x-alert/>
    <form action="/order/create" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputAutoFill">Item</label>
                <select id="inputAutoFill" name="item_id" class="form-control">
                    @foreach($items as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="inputQuantity">Quantity</label>
                <input type="number" step="1" min="0" name="quantity" class="form-control" id="inputQuantity">
            </div>
            <div class="form-group col-md-3">
                <label for="inputPrice">Price</label>
                <input type="number" step="0.01" min="0" class="form-control" id="inputPrice" name="price">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

