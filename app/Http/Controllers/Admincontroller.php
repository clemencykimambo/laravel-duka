<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\products;

use App\models\order;



class Admincontroller extends Controller
{
    public function products()
    {
        return view('Admin.products');
    }


    public function showproduct()
    {
        $data=products::all();
        return view('Admin.showproduct', compact('data'));
    }



    public function deleteproduct($id){

        $data=products::find($id);

        $data ->delete();

        return redirect() -> back(); 
    }



    public function uploadproducts(Request $request)
    {
        $data= new products;   //table name...then add product name at top
         
        $image= $request ->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request-> image->move('productsimage', $imagename);

        $data-> image =$imagename;

        $data->title=$request->title;

        $data->price=$request->price;

        $data->description=$request->description;

        $data->quantity=$request->quantity;

        $data->save();

        return redirect()->back();
    }


    public function showorder()
    {
        $data = orders::all();
       
        return view('Admin.showorders',compact('data'));
    }

 


}




