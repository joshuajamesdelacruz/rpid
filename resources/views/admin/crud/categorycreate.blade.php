@extends('admin.crud.master')
@section('content')

<div class="container"> 

<h3>Create</h3>
<form method="POST" action="{{ url('category') }}" >
         {{ csrf_field() }}
    <input type="text" name="category">
    <input type="submit" class="btn btn-primary">
    <input type="cancel" class="btn btn-danger" value="cancel">
</form>
</div> 

@endsection