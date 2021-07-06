@extends('layouts.app')
@section('content')
    <x-alert/>
    <form action="/supply/create" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputManufacturer">Supplier</label>
                <select id="inputManufacturer" name="company_id" class="form-control">
                    @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCategory">Item</label>
                <select id="inputCategory" name="item_id" class="form-control">
                    @foreach($items as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputPrice">Price</label>
                <input type="number" step="0.01" min="0" class="form-control" id="inputPrice" name="price">
            </div>
            <div class="form-group col-md-3">
                <label for="inputQuantity">Quantity</label>
                <input type="number" step="1" min="0" name="quantity" class="form-control" id="inputQuantity">
            </div>
            <div class="form-group col-md-3">
                <label for="inputMinimumQuantity">Arrives at</label>
                <input type="date" name="arrives_at" class="form-control" id="inputMinimumQuantity">
            </div>
            <div class="form-group col-md-3">
                <label for="inputAutoFill">Arrived</label>
                <select id="inputAutoFill" name="arrived" class="form-control">
                    <option value="0">False</option>
                    <option value="1">True</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

