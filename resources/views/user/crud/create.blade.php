
@extends('admin.crud.master')
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
  <form method="POST" action="{{url('crud')}}" enctype="multipart/form-data">
    
    <div class="form-group row">
      
      {{ csrf_field() }}

      <label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Division</label>
      <div class="col-sm-3">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="division">
      </div>

    </div>

    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Type of Document</label>
      <div class="col-sm-3">
       <input type="text" class="form-control form-control-lg" name="document" >
      </div>
    </div>

   <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Year Released</label>
      <div class="col-sm-3">
       <input type="text" class="form-control form-control-lg" name="year_release" >
      </div>
    </div>

    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Unique Item Code</label>
      <div class="col-sm-3">
       <input type="text" class="form-control form-control-lg" name="item_code" >
      </div>
    </div>

    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Upload</label>
      <div class="col-sm-3">
       <input type="file"  name="file" >
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

