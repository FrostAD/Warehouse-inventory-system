@extends('layouts.app')
@section('content')
    <x-alert />
    <form action="/type/edit" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$type->id}}">
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Type name" value="{{$type->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

