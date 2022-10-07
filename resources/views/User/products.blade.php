
<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>

            <form action="{{url('search')}}" method="get" class="form-inline" style="float: right; padding: 10px">
              @csrf
              <input class="form-control" type="search" name="search" placeholder="search">

              <input type="submit" value="search" class="btn btn-primary">
            </form>
          </div>
        </div>



        @foreach($data as $product)


        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img height="300" width="150" src="/productsimage/{{$product -> image}}" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>{{$product -> title}}</h4></a>
              <h6>${{$product -> price}}</h6>
              <p>{{$product -> description}}</p>

              <form action="{{url('Addcart',$product->id)}}" method="post" >
                @csrf

                <input type="number" value="1" min="1" class="form-control" width="50px" name="quantity" >

                <br>

                <input style="background-color: blue; padding:5px; color:white;" type="submit" name="btn" value="Add cart">
              </form>
             
            </div>
          </div>
        </div>
            
        @endforeach
        
        @if(method_exists($data,'link'))
         <div class="d-flex justify-content-center">

          {!! $data->links() !!} 

         </div>
         @endif


      </div>
    </div>
  </div>
