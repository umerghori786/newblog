<div>
   <h2>this is first component</h2>
   {{$title}}
   <div>{{$varibale}}</div>
   <div>
       @foreach($products as $product)
       <div>
           {{$product->name}}
       </div>
       @endforeach
       {{$slot}}
   </div>
</div>