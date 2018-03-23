@extends('user.crud.master')
@section('content')


  <div class="container">


    <table class="table table-striped table-bordered">
    <thead>
      <tr>
        
        <th class="text-center">Division</th>
        <th class="text-center">Document</th>
        <th class="text-center">Year Release</th>
        <th class="text-center">Item Code</th>
 
        <th class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>

      @foreach($cruds as $key)
      
      <tr>
        
        <td>{{ $key['division'] }}</td>
        <td>{{ $key['document'] }}</td>
        <td>{{ $key['year_release'] }}</td>
        <td>{{ $key['item_code'] }}</td>
        
         <td>
          <a href="{{ asset('public/storage/'.$key['file']) }}" target="_blank" class="btn btn-info">view</a> </td>
           
        </td>
        </td>
      </tr>

      
      @endforeach
    </tbody>
  </table>
  </div>

@endsection