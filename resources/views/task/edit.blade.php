@extends('layouts.template')

@section('content')

<form method="post" action="{{ route('task.update',$task->id)}}">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input id="title" class="form-control" type="text" name="title" value="{{$task->title}}" >
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input id="description" class="form-control" type="text" name="description" value="{{$task->description}}"
    </div>


    <div class="form-group">
        <label for="status">Status</label>
        <select id="status" class="form-control" name="status" value="{{$task->status}}"
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
    </div>

    <div class="form-group">
        <label for="progress">Progress</label>
        <input id="progress" class="form-control" type="number" name="progress" value="{{$task->progress}}">
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>


</form>

@endsection
