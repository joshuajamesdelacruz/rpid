@extends('admin.crud.master')
@section('content')

<div class="container">

<h3>Myaccount</h3>

            
@foreach($users as $key)
   

<form action="{{ Action( 'CrudUserController@update', '$id' ) }}" method="POST">
  

    <div class="col-sm-3">
        <label>name </label>
        <input type="text" class="form-control" name="name" value="{{ $key->uname }}" >

        <label>email </label>
        <input type="text" class="form-control" name="username" value="{{ $key->username }}" readonly="readonly">
        
        <label>division </label>
        <input type="text" class="form-control" name="division" value="{{ $key->division }}" readonly="readonly">

        <label>role </label>
        <input type="text" class="form-control" name="role" value="{{ $key->rname }}" readonly="readonly">

        <br>
        <input type="submit" value="update" class="btn btn-default" name="retype" disabled>

    </div>
</form>



@endforeach


</div>

@endsection