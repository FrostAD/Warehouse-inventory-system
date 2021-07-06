@extends('layouts.app')
@section('content')
    <x-alert />
    <form action="/category/create" method="POST">
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Type name">
        </div>
        <div class="form-group">
            <label for="inputName">Details</label>
            <textarea name="details" id="" cols="60" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

