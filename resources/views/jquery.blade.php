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
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
	<div class="container">
		<br>
		<form id="form" method="POST" action="{{url('/jquery')}}">
			@csrf
		<div class="main-wrapper">
		<div class="row">
			<div class="col-2 ">
				<label>quentity</label>	
				<input type="text" class="form-control" name="quantity[]" id="quantity">
			</div>
			<div class="col-2">
				<label>price</label>
				<input type="text" class="form-control" name="price[]" id="price">
			</div>
			<div class="col-2">
				<label>total</label>
				<input type="text" class="form-control" name="total[]" id="total" class="total">
				
			</div>
			<div class="col-4">
				<label>User</label>
				<select class="js-example-basic-multiple form-control"  name="user_ids[]" multiple="multiple">
					@foreach($users as $key=> $name)
				  		<option value="{{$key}}">{{$name}}</option>
				    @endforeach
				  
				</select>
				<a class="btn btn-danger btn1" onclick="add()">+</a>
			</div>
		</div>
		<div class="append">
			
		</div>
		<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4"></div>		
		<div class="col-md-4 g-total"><label>gtotal</label><input type="text" name="g_total" id="gtotal"></div>
		</div>

		</div>

		<button type="submit" class="btn btn-danger">submit</button>
		</form>
	</div>


<script type="text/javascript">
	function add(){
		var htmlData = '';
		htmlData += '<div class="row" >';
		htmlData+='<div class="col-2">';
		htmlData+='<label>quentity</label>';	
		htmlData+='<input type="text" class="form-control" name="quantity[]" id="quantity">';
		htmlData+='</div>';
		htmlData+='<div class="col-2"><label>price</label><input type="text" class="form-control" name="price[]" id="price"></div>';
		htmlData+='<div class="col-2"><label>total</label><input type="text" class="form-control" class="total" name="total[]" id="total"></div>';
		
		htmlData+='<div class="col-4 "><label>User</label><select class="js-example-basic-multiple form-control" name="user_ids[]" multiple="multiple">@foreach($users as $key=> $name)<option value="{{$key}}">{{$name}}</option>@endforeach</select>';
		htmlData+='<a class="btn btn-primary btn2" >-</a>';
		htmlData+='</div>';
		htmlData+='</div>';

		$(".append").append(htmlData);
		// Initialize Select2 for the newly added select element
        $('.js-example-basic-multiple').select2();
	}
	$('.main-wrapper').on("click",".btn2",function(e){
		e.preventDefault();
		$(this).parents('.row').remove();
	})
	
	$('.main-wrapper').on("keyup","#price",function(){
		var gtotal =0;
		var price = $(this).val();
		var quantity = $(this).parents('.row').find('#quantity').val();
		function multi(){
			var total = price * quantity;
			return total;
		}
		 $(this).parents('.row').find('#total').val(multi());
		 
	})

	$('.main-wrapper').on("keyup","#price",function(){
			
      	get_total();
      });

	$('.main-wrapper').on("click",".btn2",function(){
			
      	get_total();
      });
	function get_total(){
		var gtotal = 0;
		$('.total').each(function() {
          gtotal += parseInt($(this).val());
        })
        $("#gtotal").val(gtotal);
	}	
	$(document).ready(function() {
	    $('.js-example-basic-multiple').select2();
	});
</script>	
</body>
</html>