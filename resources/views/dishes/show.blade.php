@extends('layouts.master')
@section('title')
Dish Details
@endsection
@section('content')
<div>
    {{$dish->name}}
    {{$dish->price}}
    {{$dish->description}}
</div>

@endsection