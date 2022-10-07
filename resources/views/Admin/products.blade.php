<!DOCTYPE html>
<html lang="en">
  <head>


     @include('Admin.css')

     <style>
           .title
           {
            color: white;
            padding-top: 25px;
            font-size: 25px;
           }

           label
           {
            display: inline-block;
            width: 200px;
           }
           








     </style>
       
  </head>
  <body>


        @include('Admin.sidebar')

      <!-- partial -->
          
           @include('Admin.navbar')


        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
         <div class="container" align="center" >

              <h1 class="title" >add products</h1>
             
              

             @if(session()->has('message'))

             <div class="alert alert-success">

             <button type="button" class="close" data-dismiss="alert"> x </button>

             {{session()->get('message')}}

             </div>

             @endif






            <form action="{{url('uploadproducts')}}" method="post" enctype="multipart/form-data">
             @csrf
              <div style="padding: 15px">

                <label for="">product title</label>
                <input style="color:black" type="text" name="title" placeholder="give a product title" required>
              </div>

              <div style="padding: 15px">

                <label for="">price</label>
                <input style="color:black" type="number" name="price" placeholder="give a product price" required>
              </div>

              <div style="padding: 15px">

                <label for="">description</label>
                <input style="color:black" type="text" name="description" placeholder="give a product description" required>
              </div>

              <div style="padding: 15px">

                <label for="">quantity</label>
                <input style="color:black" type="text" name="quantity" placeholder="give a product quantity" required>
              </div>

              <div style="padding: 15px">
                <input type="file" name="image">
              </div>

              <div style="padding: 15px" >
                <input class="btn btn-success" type="submit" value="save">
              </div>

          </form>

         </div>

        </div>


          
       

         @include('Admin.script')
  </body>
</html>