<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use App\Models\user;

use App\Models\products;

use App\Models\Cart;

use App\Models\order;




class Homecontroller extends Controller
{
    public function redirect()
    {
      $data=products::paginate(3);
      $usertype=Auth::user()->usertype;
       if($usertype==1)
       {

           return view('Admin.Home');
       }

       else

       {

        $user = Auth()->user();

        $count = cart::where('phone', $user->phone)->count();


         return view('user.home', compact('data','count'));

       }
    }

    public function index()
    {
      


      if(Auth::id())
      {
      

        return redirect('redirect');
      }
      else
      {

        $data=products::paginate(3);
        

        return view('User.home',compact ('data'));
      }
    
    }

    public function search(Request $request)
    {
      $search=$request->search;

      if($search=='')
      {
        $data=products::paginate();

        return view('User.home',compact ('data'));
      }

      $data=products::where('title','like','%'.$search.'%')->get();

      return view('User.home', compact('data'));
    }


    public function Addcart(Request $request, $id)
    {
      if(Auth::id())
      {

        $user=Auth()->user();

        $product=products::find($id);

        $cart= new cart;

        $cart->name = $user-> name;

        $cart->phone = $user-> phone;

        $cart->address = $user-> address;

        $cart->product_title=$product-> title;

        $cart->price = $product-> price;

        $cart->quantity = $request-> quantity;

        $cart->save();


        return redirect()->back()->with('message','product added successfull');
      }
      else
      {
        return redirect('login');
      }
      
    }


      public function showcart()
      {

        $user = Auth()->user();

        $cart = cart::where('phone', $user-> phone)-> get();

        $count = cart::where('phone', $user->phone)->count();

        return view('user.showcart',compact('count', 'cart'));
      }


      public function deletecart($id)
      {
        $data = cart::find($id);

        $data -> delete();

        return redirect() -> back() -> with('message','product removed successfull');
      }


      public function confirmorder(Request $request)
      {
        $user=Auth()->user();

        $name= $user-> name;

        $phone  = $user-> phone;

        $address = $user -> address; 


        foreach($request->productname as $key=>$productname)
        {
          $order=new order;

          $order ->product_name =$request-> productname[$key];

          $order ->price =$request-> price[$key];

          $order ->quantity =$request-> quantity[$key];

          $order->name = $name;

          $order->phone = $phone;

          $order->address = $address;

          $order->status ='not delivered';

          $order -> save();
        }

        DB::table('carts')->where('phone', $phone)->delete();

        return redirect()-> back()  -> with('message','product ordered successfull');;

      }


}
