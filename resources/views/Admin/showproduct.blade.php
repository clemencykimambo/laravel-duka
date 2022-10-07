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

              <h1 class="title" >show products</h1>

              <div>
                <table style="background-color: black">
                  <tr  bgcolor="gray">
                    <th style="padding: 30px">title</th>
                    <th style="padding: 30px">price</th>
                    <th style="padding: 30px">description</th>
                    <th style="padding: 30px">image</th>
                    <th style="padding: 30px">quantity</th>
                    <th style="padding: 30px">Action</th>
                    <th style="padding: 30px">Action 2</th>
                  </tr>
              
                  @foreach ($data as $data)
              
                  <tr style="text-align: center">
                    <td>{{$data->title}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->description}}</td>
                    <td><img height="100" width="100" src="/productsimage/{{$data->image}}"> </td>
                    <td>{{$data->quantity}}</td>
                    <td> <a href="{{url('/deleteproduct', $data -> id)}}">delete</a> </td>
                    <td> <a href="{{url('/updateview', $data -> id)}}">updateview</a> </td>
                  </tr>
              
                  @endforeach
              
                </table>
               </div>
         </div>

        </div>


          
       

         @include('Admin.script')
  </body>
</html>