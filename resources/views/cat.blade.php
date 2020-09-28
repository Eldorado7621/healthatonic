<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
	<select name="category" id="category">
		<option>Category</option>
		@foreach($categories as $category)
		<option value={{$category->id}}>{{$category->name}}</option>
		@endforeach
	</select></br>
	<select name="subcategory" id="subcategory">
		<option value=""></option>
	</select>
 </body>
</html>

<script>
	$('#category').on('change',function(e){
		console.log(e);
		var cat_id=e.target.value;
		$.get('/elm/public/ajax-subcat?cat_id='+cat_id, function(data){
			console.log(data);
			$('#subcategory').empty();
			$.each(data,function(index,subcatObj){
			$('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
		});
		});
		});
	
</script>