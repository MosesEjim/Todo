@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">

        @foreach($todos as $todo)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$todo->title}}</h5>
                    <p class="card-text">{{$todo->snippet()}}</p>
                    <div class="card-icons">
                        <small>{{date('d F, Y', strtotime($todo->date))}}</small>
                        <small>{{date('h:ia', strtotime($todo->time))}}</small>
                    </div>
                    <div class="card-icons">
                        <a href="{{route('todos.show', $todo->id)}}" class="card-link">Details</a>
                        <a href="{{route('todos.edit', $todo->id)}}" class="card-link">Edit</a>
                        <form action="{{route('todos.destroy', $todo->id)}}" name="deleteTodo" method="POST">
                            @method('delete')
                            @csrf
                            <a href="" onclick="deleteTodo.submit()" class="card-link">Delete</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="pagination">
            {{$todos->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
</div>

@endsection
