@extends('admin.crud.master')
@section('content')
	
<div class="col-sm-3">
<form>

<div id="test">
      <input type="radio" name="category" value="1" />Person
      <input type="radio" name="category" value="2" />Division
</div>
<div id="selectList"></div>

</form>
</div>


<script>

	$('#test input:radio').on ('change', function(){
        var selectedVal = $("#test input:radio:checked").val();
        if(1 == selectedVal){
            var foodList = 
            '<select name="user">'+
            '@foreach($users as $key)'+
            '<option>{{ $key->name }}</option>'+
            '@endforeach'+
            '</select>';
            $('select').remove();
            $('#selectList').append(foodList);
        }else if(2 == selectedVal){
            var countryList = 
            
            '<select name="country">'+
            '@foreach($division as $key)'+
            '<option>{{ $key->division }}</option>'+
            '@endforeach';
            '</select>';

            $('select').remove();
            $('#selectList').append(countryList);
        }        
    });

</script>

@endsection
