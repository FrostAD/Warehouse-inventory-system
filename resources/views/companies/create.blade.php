@extends('layouts.app')
@section('content')
    <x-alert/>
    <form action="/company/create" method="POST">
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Item name">
        </div>
        <div class="form-group">
            <label for="inputName">Address</label>
            <input type="text" class="form-control" id="inputName" name="address" placeholder="Address">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputName">Telephone</label>
                <input type="text" class="form-control" id="inputName" name="telephone" placeholder="Telephone">
            </div>
            <div class="form-group col-md-8">
                <label for="inputCategory">Type</label>
                <select id="inputCategory" name="type_id" class="form-control">
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

