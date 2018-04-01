@extends('admin.crud.master')
@section('content')
	

	<div class="container">
 

{{-- 
<form action="{{ Action( 'CrudController@scopeSearch' ) }}" method="GET" role="search">

  <div class="input-group">
    <input type="text" class="form-control" name="q" placeholder="Search Document"> <span class="input-group-btn">
    
    <button type="submit" class="btn btn-default">
      Search
    </button>

    </span>
  </div>

</form> --}}
@if ( session('success') )
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container"><h2>My Dashboard</h2></div>
      
<div id="exTab2" class="container">	
	
	<a href=" {{url('crud/create')}} " class="btn btn-success">Create</a>
	<ul class="nav nav-tabs">
		<li class="active"><a  href="#1" data-toggle="tab">Private Files</a></li>
		<li><a href="#2" data-toggle="tab">Public Files</a></li>
		<li><a href="#3" data-toggle="tab">Shared Files</a></li>
	</ul>

	<div class="tab-content ">
		<div class="tab-pane active" id="1">
			<h3>Your Private Files</h3>


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

     


      @if(count($cruds_private) > 0 )

       {{ $cruds_private->render() }}
      
      @foreach($cruds_private as $key)
  
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
            
         <td><a href="{{ asset('public/storage/'.$key['file']) }}" target="_blank" class="btn btn-info">view</a></td>

          <td><a href="{{ Action( 'CrudController@share',$key['id'] ) }}" class="btn btn-primary">Share</a> </td>
        
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

		<div class="tab-pane" id="2">
			<h3>Public Files</h3>
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

     


      @if(count($cruds_public) > 0 )

       {{ $cruds_public->render() }}
      
      @foreach($cruds_public as $key)
  
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

		<div class="tab-pane" id="3">
			<h3>Shared Files</h3>

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

     


      @if(count($cruds_shared) > 0 )

       {{ $cruds_shared->render() }}
      
      @foreach($cruds_shared as $key)
  
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
		
	</div>
</div>

<hr></hr> 

</div>


@endsection