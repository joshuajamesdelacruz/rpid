@extends('admin.crud.master')
@section('content')

<div class="container"><h2>Category</h2></div>
      
<div id="exTab2" class="container">	
	
	<a href=" {{url('category/create')}} " class="btn btn-success">Create</a>
     
    @if(count($ItemCode) > 0 )

    <table class="table table-striped table-bordered">
      <tr>
                
        <th class="text-center">Category</th>
 
        <th colspan="2" class="text-center">Actions</th>
      </tr>

       @foreach($ItemCode as $key)
  
      <tr>
        <td>{{ $key['category']  }}</td>
        <td><a href="{{ Action( 'ItemCodeController@edit',$key['id'] ) }}" class="btn btn-warning">Edit</a> </td>
        <td>
          <form action="{{ Action( 'ItemCodeController@destroy',$key['id'] ) }}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to commit delete and go back?')" type="submit">Delete</button>
          </form>
        </td>
      </tr>

      @endforeach

    <table>

  @else

       <div class="alert alert-warning">
            <strong>Sorry!</strong> No File Found.
          </div>     

     
      
      @endif

@endsection