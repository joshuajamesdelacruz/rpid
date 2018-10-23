@extends('admin.users.master')
@section('content')

<div class="container">

    <a href=" {{url('users/create')}} " class="btn btn-success offset-md-1">Create</a>
    <table class="table table-striped table-bordered">
    <thead>
      <tr>
        
        <th class="text-center">Name</th>
        <th class="text-center">email</th>
        <th class="text-center">Division</th>
        <th class="text-center">Role</th>
 
        <th colspan="2" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>

     
      @foreach($user as $key)
       
      <tr>
        
        <td>{{ $key->uname }}</td>
        <td>{{ $key->email }}</td>
        <td>{{ $key->division }}</td>
        <td>{{ $key->rname }} </td>
     
       

        <td><a href="{{ Action( 'CrudUserController@edit',$key->id ) }}" class="btn btn-warning">Edit</a> </td>
        <td>

          <form action="{{ Action( 'CrudUserController@destroy',$key->id ) }}" method="post">
            {{csrf_field()}}

            @if( $key->rname == 'admin' && $key->rname  <= 1 )
                
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" disabled="disabled" onclick="return confirm('Are you sure you want to commit delete and go back?')" type="submit">Delete</button>

            @else
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" onclick="return confirm('Are you sure you want to commit delete and go back?')" type="submit">Delete</button>

            @endif

              
          </form>
        </td> 
            
        
         
        </td>
      </tr>

      
      @endforeach 
   

    </tbody>
  </table>
  </div>

@endsection