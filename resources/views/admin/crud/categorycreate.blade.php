@extends('admin.crud.master')
@section('content')


<form method="POST" action="{{ url('category') }}" >
         {{ csrf_field() }}
    <input type="text" name="category">
    <input type="submit" value="Submit">
    <button type="reset" value="reset">Cancel</button>
</form>

@endsection