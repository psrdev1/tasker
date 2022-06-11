@extends('layouts.template')

@section('content')
<form method="post" action="">
    <div class="form-group">
        <label for="title">Title</label>
        <input id="title" class="form-control" type="text" name="title">
    </div>
     <div class="form-group">
        <label for="description">Title</label>
        <input id="description" class="form-control" type="text" name="description">
    </div>


</form>

@endsection
