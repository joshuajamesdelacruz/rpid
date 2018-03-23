@extends('admin.crud.master')
@section('content')
	
<div class="col-sm-3">
<form>

<div id="test">
      <input type="radio" name="category" value="1" />Foods 
      <input type="radio" name="category" value="2" />Country
      <input type="radio" name="category" value="3" />Colors
</div>
<div id="selectList"></div>

</form>
</div>


<script>
	$('#test input:radio').on ('change', function(){
        var selectedVal = $("#test input:radio:checked").val();
        if(1 == selectedVal){
            var foodList = 
            '<select name="food">'+
            '@foreach($users as $key)'+
            '<option>{{ $key->name }}</option>'+
            '@endforeach'+
            '</select>';
            $('select').remove();
            $('#selectList').append(foodList);
        }else if(2 == selectedVal){
            var countryList = '<select name="country"><option>USA</option><option>Norway</option></select>';
            $('select').remove();
            $('#selectList').append(countryList);
        }else if(3 == selectedVal){
            var colorList = '<select name="country"><option>blue</option><option>orange</option></select>';
            $('select').remove();
            $('#selectList').append(colorList);
        }
        
    });
</script>

@endsection
