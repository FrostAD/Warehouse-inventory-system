@extends('layouts.app')
@section('content')
    <x-alert/>
    <form action="/item/create" method="POST">
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Item name">
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
                <label for="inputMinimumQuantity">Minimum quantity</label>
                <input type="number" step="1" min="0" name="minimum_quantity" class="form-control" id="inputMinimumQuantity">
            </div>
            <div class="form-group col-md-3">
                <label for="inputAutoFill">Auto fill</label>
                <select id="inputAutoFill" name="auto_fill" class="form-control">
                    <option value="0">False</option>
                    <option value="1">True</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputManufacturer">Manufacturer</label>
                <select id="inputManufacturer" name="manufacturer_id" class="form-control">
                    @foreach($manufacturers as $manufacturer)
                        <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCategory">Category</label>
                <select id="inputCategory" name="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

