@extends('layouts.app')
@section('content')
    <x-alert />
    <form action="/category/edit" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$category->id}}">
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Type name" value="{{$category->name}}">
        </div>
        <div class="form-group">
            <label for="inputName">Details</label>
            <textarea name="details" id="" cols="60" rows="10">{{$category->details}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection

