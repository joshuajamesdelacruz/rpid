@extends('admin.users.master')
@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
  <form method="POST" action="{{url('users')}}" enctype="multipart/form-data">
    
    <div class="form-group row">
      
      {{ csrf_field() }}

      <label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Name</label>
      <div class="col-sm-3">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="name">
      </div>

    </div>

    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">email</label>
      <div class="col-sm-3">
       <input type="text" class="form-control form-control-lg" name="email" >
      </div>
    </div>

   <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Password</label>
      <div class="col-sm-3">
       <input type="password" class="form-control form-control-lg" name="password" >
      </div>
    </div>

    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Division</label>
        <div class="col-sm-3">
          {{-- <input type="text" class="form-control form-control-lg" name="division" > --}}
           
           <select class="form-control form-control-lg" name="division" >
             <option></option>
             <option>APACC</option>
             <option>ODG</option>
             <option>Faculty</option>
             <option>TDD</option>
             <option>RPID</option>
             <option>PCD</option>
             <option>ICT</option>
             <option>GSD</option>
           </select>

        </div>
    </div>

    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Role</label>
        <div class="col-sm-3">

         
          <select class="form-control form-control-lg" name="role" >
              <option></option>
             @foreach($roles as $items)
              <option>{{ $items->name }}</option>
             @endforeach
          </select>
         

        </div>
    </div>


    <br>
    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-primary">
    </div>

  </form>
</div>

@endsection

