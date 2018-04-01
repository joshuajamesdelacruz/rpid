@extends('admin.crud.master')
@section('content')



<div class="col-sm-3">
<form method='post' action="{{ action( 'CrudController@shareupdate' ,$id ) }}">

{{ csrf_field() }}

<div id="test">
      <input type="radio" name="category" value="Person" required />Person
      <input type="radio" name="category" value="Division" />Division
</div>
<div id="selectList"></div>

<input type='submit' value='submit'>
</form>
</div>


<script>

	$('#test input:radio').on ('change', function(){
        var selectedVal = $("#test input:radio:checked").val();
        if("Person" == selectedVal){
            var foodList = 
            '<select name="Person">'+
            '@foreach($users as $key)'+
            '<option value ="{{ $key->id }}">{{ $key->name }}</option>'+
            '@endforeach'+
            '</select>';
            $('select').remove();
            $('#selectList').append(foodList);
        }else if("Division" == selectedVal){
            var countryList = 
            
            '<select name="Division">'+
            '@foreach($division as $key)'+
            '<option value ="{{ $key->division }}">{{ $key->division }}</option>'+
            '@endforeach';
            '</select>';

            $('select').remove();
            $('#selectList').append(countryList);
        }        
    });

</script>

@endsection
