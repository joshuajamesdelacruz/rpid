@extends('admin.crud.master')
@section('content')

<div class="container">

<h3>Myaccount</h3>

<<<<<<< HEAD
change password<br>
=======
            

<form action="{{ Action( 'CrudUserController@update', Auth::user()->id ) }}" method="POST">
    {{ csrf_field() }}
<<<<<<< HEAD
>>>>>>> parent of b4cd7f5... update
=======
>>>>>>> parent of b4cd7f5... update

<form action="{{ Action( 'CrudController@update', $id ) }}" method="POST">
    {{ csrf_field() }}
    <div class="col-sm-3">
<<<<<<< HEAD
        <label>Old password </label>
        <input type="password" class="form-control">
   
        <label>new password </label>
        <input type="password" class="form-control">
=======
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
<<<<<<< HEAD
>>>>>>> parent of b4cd7f5... update
=======
>>>>>>> parent of b4cd7f5... update
    
        <label>re-type new password </label>
        <input type="password" class="form-control">
        <br>
<<<<<<< HEAD
<<<<<<< HEAD
     <input type="submit" value="submit" class="btn btn-danger">
=======
        <input type="submit" value="submit" class="btn btn-danger" name="retype">

>>>>>>> parent of b4cd7f5... update
    </div>
</form>

=======
        <input type="submit" value="submit" class="btn btn-danger" name="retype">

<<<<<<< HEAD
    </div>
</form>


>>>>>>> parent of b4cd7f5... update
=======
>>>>>>> parent of b4cd7f5... update
</div>

@endsection