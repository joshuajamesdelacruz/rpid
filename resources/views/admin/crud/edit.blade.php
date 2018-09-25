@extends('admin.crud.master')
@section('content')


<div class="container">
  <form method="POST" action="{{ Action( 'CrudController@update', $id ) }}" enctype="multipart/form-data">
    <div class="form-group row">
      
      {{ csrf_field() }}
      
      <input name="_method" type="hidden" value="PUT">

      <label for="lgFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Division</label>
      <div class="col-sm-3">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" name="division" value="{{$crud->division}}">
      </div>

    </div>

    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Name of Document</label>
      <div class="col-sm-3">
       <input type="text" class="form-control form-control-lg" name="document" value="{{$crud->document}}">
      </div>
    </div>

   <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Year Released</label>
      <div class="col-sm-3">
       <input type="date" class="form-control form-control-lg" name="year_release" value="{{$crud->year_release}}">
      </div>
    </div>

    
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-3 col-form-label col-form-label-lg">Unique Item Code</label>
      <div class="col-sm-3">
       <select class="form-control form-control-lg" name="item_code" value={{old('item_code')}} >
              
        @foreach ($itemcode->all() as $category)
                 <option>{{ $category->category }}</option>
        @endforeach
      
      </select>
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
      <input type="submit" class="btn btn-danger" value="cancel">
    </div>

  </form>
</div>

@endsection