@extends('layouts.app')
@section('content')
    <x-alert />
    <form action="/type/create" method="POST">
        @csrf
        <div class="form-group">
            <label for="inputName">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Type name">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection

