<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>jquery</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<a href="{{url('/image_index')}}" class="btn btn-primary">Index page</a>
		<form id="form" method="POST" action="{{url('/image_jquery')}}" enctype="multipart/form-data">
			@csrf
		<div class="main-wrapper">
		<div class="row">
			<div>
				<label>Post</label><br>
				<input type="text" name="title" id="quantity" value="{{$post->title}}">
			</div><br>
			<div class="col-md-12">
				
				<input type="file" name="image[]" id="quantity">
				<a class="btn btn-danger btn1" onclick="add()">+</a>
			</div>
			
				
			@if(isset($post))
			@foreach($post->images as $image)
			<div style="margin-top: 3%" class="form-check col-sm-2">
			      <button type="button" id='{{$image->id}}' class="close">
			            <span>&times;</span>
			        </button>
			      <img src="{{ $image->url }}" width="100">

			</div>
			@endforeach
			@endif

			
			
		</div>
		<div class="append">
			
		</div>
		

		</div>

		<button type="submit" class="btn btn-danger">submit</button>
		</form>
	</div>


<script type="text/javascript">
	function add(){
		var htmlData = '';
		htmlData += '<div class="row" style="mt-5,p-5">';
		htmlData+='<div class="col-md-12">';
		
		htmlData+='<input type="file" name="image[]" id="quantity">';
		htmlData+='<a class="btn btn-primary btn2" >-</a>';
		htmlData+='</div>';
		
		
		
		htmlData+='</div>';

		$(".append").append(htmlData);
	}
	$('.main-wrapper').on("click",".btn2",function(e){
		e.preventDefault();
		$(this).parents('.row').remove();
	})
	
	
	
</script>	
</body>
</html>