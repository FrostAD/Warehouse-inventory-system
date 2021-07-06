@extends('layouts.app')
@section('content')
    <x-alert/>
    <form action="/supply/accept" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$supply->id}}">
        @role('admin')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputManufacturer">Supplier</label>
                <select id="inputManufacturer" name="company_id" class="form-control">
                    @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}"
                                @if($supplier->id == $supply->company_id)
                                selected="selected"
                            @endif
                        >{{$supplier->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="inputCategory">Item</label>
                <select id="inputCategory" name="item_id" class="form-control">
                    @foreach($items as $item)
                        <option value="{{$item->id}}"
                                @if($item->id == $supply->item_id)
                                selected="selected"
                            @endif
                        >{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputPrice">Price</label>
                <input type="number" step="0.01" min="0" class="form-control" id="inputPrice" name="price" value="{{$supply->price}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputQuantity">Quantity</label>
                <input type="number" step="1" min="0" name="quantity" class="form-control" id="inputQuantity" value="{{$supply->quantity}}">
            </div>
            <div class="form-group col-md-4">
                <label for="inputMinimumQuantity">Arrives at</label>
                <input type="date" name="arrives_at" class="form-control" id="inputMinimumQuantity" value="{{$supply->arrives_at}}">
            </div>
        </div>
        @else
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputManufacturer">Supplier</label>
                    <select id="inputManufacturer" name="company_id" class="form-control" disabled>
                        @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}"
                                    @if($supplier->id == $supply->company_id)
                                    selected="selected"
                                @endif
                            >{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="company_id" value="{{$supply->company_id}}">

                <div class="form-group col-md-6">
                    <label for="inputCategory">Item</label>
                    <select id="inputCategory" name="item_id" class="form-control" disabled>
                        @foreach($items as $item)
                            <option value="{{$item->id}}"
                                    @if($item->id == $supply->item_id)
                                    selected="selected"
                                @endif
                            >{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="item_id" value="{{$supply->item_id}}">

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputPrice">Price</label>
                    <input type="number" step="0.01" min="0" class="form-control" id="inputPrice" name="price" value="{{$supply->price}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputQuantity">Quantity</label>
                    <input type="number" step="1" min="0" name="quantity" class="form-control" id="inputQuantity" value="{{$supply->quantity}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputMinimumQuantity">Arrives at</label>
                    <input type="date" name="arrives_at" class="form-control" id="inputMinimumQuantity" value="{{$supply->arrives_at}}">
                </div>
            </div>

            @endrole

            <button type="submit" class="btn btn-primary">Accept</button>
    </form>
@endsection

