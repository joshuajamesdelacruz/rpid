@extends('admin.crud.master')
@section('content')

<div class="container">

<h3>Myaccount</h3>

change password<br>

<form action="{{ Action( 'CrudController@update', $id ) }}" method="POST">
    {{ csrf_field() }}
    <div class="col-sm-3">
        <label>Old password </label>
        <input type="password" class="form-control">
   
        <label>new password </label>
        <input type="password" class="form-control">
    
        <label>re-type new password </label>
        <input type="password" class="form-control">
        <br>
     <input type="submit" value="submit" class="btn btn-danger">
    </div>
</form>

</div>

@endsection