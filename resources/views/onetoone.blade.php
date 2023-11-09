<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
</head>
<body>


	@foreach($posts as $key => $post)
    <h1>{{$post->title}}</h1>
    
    @if(count($post->images) > 0)	
    <h4>Images:</h4>
    

    <ul>
    	@foreach($post->images as $image)
        <li>{{$image->url}}</li>
        @endforeach
    </ul>
    @endif
    @endforeach
    
</body>
</html>
