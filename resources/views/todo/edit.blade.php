@extends('layout.app')

@section('content')
<form method="POST" action="{{route('todos.update', $todo->id)}}">
    @csrf
    @method('put')
    <div class="wrapper wrapper-container">
        <div class="card col-lg-4 col-md-4 col-sm-12">
            <div class="card-body">
                <h5 class="card-title">Create Todo</h5>
                <div class="mb-3">
                    <label class="form-label">Todo Title</label>
                    <input type="text" name="title" value="{{$todo->title}}" class="form-control" placeholder="title">
                </div>

                <div class="mb-3">
                    <label  class="form-label">Description</label>
                    <textarea class="form-control" name="description"  rows="3">{{$todo->description}}</textarea>
                </div>

                 <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" value="{{$todo->date}}" class="form-control" placeholder="date">
                </div>

                 <div class="mb-3">
                    <label class="form-label">Time</label>
                    <input type="time" name="time" value="{{$todo->time}}" class="form-control" >
                </div>
                <div class="mb-3">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
