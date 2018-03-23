
<form action="{{ Action( 'CrudController@scopeSearch' ) }}" method="GET" role="search">

	<div class="input-group">
		<input type="text" class="form-control" name="q" placeholder="Search users"> <span class="input-group-btn">
		
		<button type="submit" class="btn btn-default">
			Search<span class="glyphicon glyphicon-search"></span>
		</button>

		</span>
	</div>
</form>

<table>
	

@foreach($crud as $key)
	<tr>
	   <td>{{ $key['document'] }}</td>
	</tr>
@endforeach

</table>