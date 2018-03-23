@extends('admin.crud.master')
@section('content')


  <div class="container">
 
  {{--   <a href=" {{url('crud/create')}} " class="btn btn-success offset-md-1">Create</a> --}}
   

<form action="{{ Action( 'CrudController@scopeSearch' ) }}" method="GET" role="search">

  <div class="input-group">
    <input type="text" class="form-control" name="q" placeholder="Search Document"> <span class="input-group-btn">
    
    <button type="submit" class="btn btn-default">
      Search
    </button>

    </span>
  </div>

</form>

    <table class="table table-striped table-bordered">
    <thead>
      <tr>
        
        <th class="text-center">Division</th>
        <th class="text-center">Document</th>
        <th class="text-center">Year Release</th>
        <th class="text-center">Item Code</th>
 
        <th colspan="4" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>

     


      @if(count($cruds) > 0 )

       {{ $cruds->render() }}
      
      @foreach($cruds as $key)
  
      <tr>
        
        <td>{{ $key['division'] }}</td>
        <td>{{ $key['document'] }}</td>
        <td>{{ $key['year_release'] }}</td>
        <td>{{ $key['item_code'] }}</td>
        <td><a href="{{ Action( 'CrudController@edit',$key['id'] ) }}" class="btn btn-warning">Edit</a> </td>
        <td>
          <form action="{{ Action( 'CrudController@destroy',$key['id'] ) }}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to commit delete and go back?')" type="submit">Delete</button>
          </form>
        </td>
            
        
         <td>
          <a href="{{ asset('public/storage/'.$key['file']) }}" target="_blank" class="btn btn-info">view</a> </td>
           
        </td>
        </td>
      </tr>

      @endforeach
      
      

      @else

       <div class="alert alert-warning">
            <strong>Sorry!</strong> No File Found.
          </div>     

     
      
      @endif
     

    </tbody>
  </table>

    
 

  </div>

@endsection