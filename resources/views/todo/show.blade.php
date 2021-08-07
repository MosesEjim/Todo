@extends('layout.app')

@section('content')
<div class="container">
    <h2>{{$todo->title}}</h2>
    <p>{{$todo->description}}</p>
    <div></div>
</div>

@endsection
