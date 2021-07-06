@extends('layouts.app')
@section('content')
    <h3>Name: {{$company->name}}</h3>
    <h3>Address: {{$company->address}}</h3>
    <h3>Telephone: {{$company->telephone}}</h3>
    <h3>Type: {{$company->type->name}}</h3>
    <h3>Produced items: @foreach($company->producedItems as $item)
    {{$item->name}}
    @endforeach</h3>
@endsection
