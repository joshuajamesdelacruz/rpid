@extends('admin.crud.master')
@section('content')

<h3>Creata</h3>
<form method="POST" action="{{ url('category') }}" >
         {{ csrf_field() }}
    <input type="text" name="category">
    <input type="submit" class="btn btn-primary">
    <input type="submit" class="btn btn-danger" value="cancel">
</form>

@endsection