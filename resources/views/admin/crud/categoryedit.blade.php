@extends('admin.crud.master')
@section('content')

<h3>Edit Category</h3>
 <form method="POST" action="{{ action( 'ItemCodeController@update', $id ) }}" enctype="multipart/form-data">
          
            {{ csrf_field() }}
           <input name="_method" type="hidden" value="PUT">

    <div class="col-sm-3">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="category" value="{{ $ItemCode->category }}">
    </div>
    <input type="submit" class="btn btn-primary">
    <input type="submit" class="btn btn-danger" value="cancel">
</form>
   
@endsection