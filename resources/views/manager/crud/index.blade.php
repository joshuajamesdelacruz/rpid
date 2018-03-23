@extends('manager.crud.master')
@section('content')


  <div class="container">

<a href=" {{url('manager/crud/create')}} " class="btn btn-success offset-md-1">Create</a>

    <table class="table table-striped table-bordered">
    <thead>
      <tr>
        
        <th class="text-center">Division</th>
        <th class="text-center">Document</th>
        <th class="text-center">Year Release</th>
        <th class="text-center">Item Code</th>
 
        <th colspan="3" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>

      @foreach($cruds as $key)
      
      <tr>
        
        <td>{{ $key['division'] }}</td>
        <td>{{ $key['document'] }}</td>
        <td>{{ $key['year_release'] }}</td>
        <td>{{ $key['item_code'] }}</td>
        <td><a href="{{ Action( 'CrudController@edit',$key['id'] ) }}" class="btn btn-warning">Edit</a> </td>
        <td>
         
        </td>
         <td>
          <a href="{{ asset('public/storage/'.$key['file']) }}" target="_blank" class="btn btn-info">view</a> </td>
      
        
     </tr>

      
      @endforeach
    </tbody>
  </table>
  </div>

@endsection