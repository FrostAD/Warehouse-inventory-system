@extends('layouts.app')
@section('content')
    <x-alert/>
    <form action="/company/edit" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$company->id}}">

        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Item name" value="{{$company->name}}">
        </div>
        <div class="form-group">
            <label for="inputName">Address</label>
            <input type="text" class="form-control" id="inputName" name="address" placeholder="Address" value="{{$company->address}}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputName">Telephone</label>
                <input type="text" class="form-control" id="inputName" name="telephone" placeholder="Telephone" value="{{$company->telephone}}">
            </div>
            <div class="form-group col-md-8">
                <label for="inputCategory">Type</label>
                <select id="inputCategory" name="type_id" class="form-control">
                    @foreach($types as $type)
                        <option value="{{$type->id}}"
                                @if($type->id == $company->type_id)
                                selected="selected"
                            @endif
                        >{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

