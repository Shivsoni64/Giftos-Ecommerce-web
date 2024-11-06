<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;


class HomeController extends Controller
{
    public function index(){

        $user = User::where('usertype','user')->get()->count();
        
        $product = Product::all()->count();
        $order = Order::all()->count();
        
        $deliver = Order::where('status','Delivered')->get() ->count();
        return view('admin.index',compact('user','product','order','deliver'));
    }  
    
    public function home(){
        $product = Product::all();

        if(Auth::id()){

        $user = Auth::user();
        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count= '';
        }
        return view('home.index', compact('product','count'));
    }

    public function login_home(){
        $product = Product::all();

        $count = 0;
        if(Auth::check()){
        $user = Auth::user();
        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();
        }
        return view('home.index', compact('product','count'));
    }

    public function product_details($id){
        $data = Product::find($id);
        if(Auth::id()){
        $user = Auth::user();
        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();
        }else{
            $count = '';
        }
        return view('home.product_details', compact('data','count'));
    }

    public function add_cart($id){
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();

        session()->flash('success', 'Product Added to the Cart Successfully.');

        return redirect()->back();
    }

    public function mycart(){
        if(Auth::id()){
            $user = Auth:: user();
            $userid = $user->id;
            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id', $userid)->get();
        }
        return view('home.mycart',compact('count','cart'));
    }

    public function delete_cart($id){

        $cartItem = Cart::find($id);

        if ($cartItem) {
        $cartItem->delete();
        return redirect()->back()->with('success', 'Product removed from cart successfully.');
        } 
    }

    public function confirm_order(Request $request){

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
    
        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();
    
        foreach ($cart as $carts) {
            $order = new Order;
            $order->name = $name;
            $order->address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
    
            $order->save();
        }
    
        $cart_remove = Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
        }
        return redirect()->back()->with('success', 'Product Ordered successfully.');
    }

    public function myorders(){

        $user = Auth::user()->id;
        $count = Cart::where('user_id',$user)->get()->count();
        
        $order = Order:: where('user_id',$user) ->get();
        return view('home.order', compact('count','order'));
    }

    public function shop(){
        $product = Product::all();

        if(Auth::id()){

        $user = Auth::user();
        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count= '';
        }
        return view('home.shop', compact('product','count'));
    }

    public function why(){

        if(Auth::id()){

        $user = Auth::user();
        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count= '';
        }
        return view('home.why', compact('count'));
    }

    public function contect(){

        if(Auth::id()){

        $user = Auth::user();
        $userid = $user->id;

        $count = Cart::where('user_id',$userid)->count();
        }
        else{
            $count= '';
        }
        return view('home.contect', compact('count'));
    }
}
