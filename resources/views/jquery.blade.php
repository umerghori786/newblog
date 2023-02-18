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
		<form id="form" method="POST" action="{{url('/jquery')}}">
			@csrf
		<div class="main-wrapper">
		<div class="row">
			<div class="col-md-4">
				<label>quentity</label>	
				<input type="text" name="quantity[]" id="quantity">
			</div>
			<div class="col-md-4">
				<label>price</label>
				<input type="text" name="price[]" id="price">
			</div>
			<div class="col-md-4">
				<label>total</label>
				<input type="text" name="total[]" id="total" class="total">
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
		htmlData += '<div class="row" style="mt-5,p-5">';
		htmlData+='<div class="col-md-4">';
		htmlData+='<label>quentity</label>';	
		htmlData+='<input type="text" name="quantity[]" id="quantity">';
		htmlData+='</div>';
		htmlData+='<div class="col-md-4"><label>price</label><input type="text" name="price[]" id="price"></div>';
		htmlData+='<div class="col-md-4"><label>total</label><input type="text" class="total" name="total[]" id="total">';
		htmlData+='<a class="btn btn-primary btn2" >-</a>';
		htmlData+='</div>';
		htmlData+='</div>';

		$(".append").append(htmlData);
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
</script>	
</body>
</html>