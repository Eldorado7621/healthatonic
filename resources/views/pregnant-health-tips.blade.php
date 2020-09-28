<html>
	<head></head>
	<body>
		<h2>health tips</h2>
		@foreach($pregHealthTips as $pregHealthTip)
			<h3>{{$pregHealthTip->subject}}</hr></h3>
			<p>{{$pregHealthTip->body}}	</p>
			<label><a href="{{route('pregTip',['id'=>$pregHealthTip->id])}}">read more</a></label>
		@endforeach
		
	</body>




</html>