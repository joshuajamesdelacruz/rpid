@extends('admin.crud.master')
@section('content')

<div class="container">

<h3>Myaccount</h3>

            

<form action="{{ Action( 'CrudUserController@update', Auth::user()->id ) }}" method="POST">
    {{ csrf_field() }}

    <div class="col-sm-3">
        <label>name </label>
        <input type="text" class="form-control" name="name" >

        <label>Username </label>
        <input type="text" class="form-control" name="username">
        
        <label>division </label>
        <input type="text" class="form-control" name="division">

        <label>role </label>
        <input type="text" class="form-control" name="role">

        <label>Old password </label>
        <input type="password" class="form-control" name="oldpassword">
   
        <label>new password </label>
        <input type="password" class="form-control" name="newpassword">
    
        <label>re-type new password </label>
        <input type="password" class="form-control">
        <br>
        <input type="submit" value="submit" class="btn btn-danger" name="retype">

    </div>
</form>


</div>

@endsection