<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	{{-- selected dropdown --}}
	<div class="form-group">
		<label>Books</label>
		<select class="form-control" name="type" id="type">
			<option value="0" disabled="true" selected="true">==Select Book==</option>
			@foreach($cats as $cat)
			<option value="{{$cat->id}}">
				{{$cat->name}}
			</option>
			@endforeach()
		</select>
		<label>Books</label>
		<select class="form-control" name="filter" id="filter">
			<option value="0" disabled="true" selected="true">==Filter Book==</option>
			@foreach($books as $book)
			<option value="{{$book->id}}">
				{{$book->name}}
			</option>
			@endforeach

		</select>

	@foreach($cats as $cat)
		<div class="checkbox">
	  		<input type="checkbox" value="{{$cat->id}}" id="checkbox{{$cat->id}}" class="checkbox">
	  		<label for="checkbox{{$cat->id}}">{{$cat->name}}</label>

		</div>
	@endforeach
	<input type="button" id="save_value" name="save_value" value="Save" />
	</div>
</div>

<script>
	$(document).ready(function(e){
		$('.checkbox').click(function(){
		var brand = [];
		$(".checkbox").each(function(){
			
			
			if($(this).is(":checked")){
				brand.push($(this).val());
			}

		})

		console.log(brand.toString());
		});
	})
	$(document).ready(function(){
		$("#type").on('change', function(e){
			e.preventDefault;
			console.log(this.value);
			var filter_id = e.target.value;

			$.ajax({
				type : 'get',
				url : '{{url('/testfilterbook')}}',
				data : {filter_id:filter_id},

				success:function(data){
					console.log(data);
					$("#filter").empty();
					$("#filter").append('<option value="0" disabled="true" selected="true">==Select Book==</option>');
					var htmlData = '';
					for(i in data){
						htmlData += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
					}

					$('#filter').html(htmlData);
				}
			})
		})
	});
	
</script>
</body>
</html>