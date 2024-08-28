<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Stripe;




class HomeController extends Controller
{
    public function index(){
        $users = User::where('user_type', 'user')->get()->count();
        $products = Product::all()->count();
        $orders = Order::all()->count();
        $delivered = Order::where('status', 'Delivered')->get()->count();
        return view('admin.index', compact('users', 'products', 'orders', 'delivered'));
    }

    public function home(){
        $products = Product::paginate(8);

        if(Auth::id()){
            
                    $user = Auth::user();
                    $user_id = $user->id;
                    $count = Cart::where('user_id', $user_id)->count();
        }else{
            $count = '';
        }


        return view('home.index', compact('products', 'count'));
    }

    public function login_home(){
        $products = Product::paginate(8);
        if(Auth::id()){
            
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
}else{
    $count = '';
}
        return view('home.index', compact('products', 'count'));
    }

    public function product_details($id){
        $data = Product::find($id);
        if(Auth::id()){
            
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
}else{
    $count = '';
}
        return view('home.product_details', compact('data', 'count'));
    }

    public function add_cart($id){
        $product_id = $id;
        
        $user = Auth::user();
        $user_id = $user->id;

        $data = new Cart;
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added to the Cart Successfully');

        return redirect()->back();
    }

    public function my_cart(){
        if(Auth::id()){
            $user = Auth::user();
            $products = Product::all();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
            $carts = Cart::where('user_id', $user_id)->get();
        }


        return view('home.my_cart', compact('count', 'carts', 'products'));
    }

    public function delete_cart($id){
        $data = Cart::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Deleted from the Cart Successfully');

        return redirect()->back();
    }

    public function confirm_order(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id', $user_id)->get();
        
            
        
        foreach($carts as $cart){
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $cart->product_id;

            $order->save();
            
            $product = Product::find($cart->product_id);
            if ($product) {
                $product->quantity -= 1;
                $product->save();
            }

        }

        $cart_remove = Cart::where('user_id', $user_id)->get();

        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
            
        }
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Ordered Successfully');

        return redirect()->back();
    }

    public function my_orders(){
        $user = Auth::user()->id;
        $count = Cart::where('user_id', $user)->get()->count();
        $orders = Order::where('user_id', $user)->paginate(6); 
        return view('home.orders', compact('count', 'orders'));
    }

    public function stripe($value)
    {
        return view('home.stripe', compact('value'));
    }

    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $value * 100,
                "currency" => "egp",
                "source" => $request->stripeToken,
                "description" => "Test payment from complete." 
        ]);

        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
        $user_id = Auth::user()->id;
        $carts = Cart::where('user_id', $user_id)->get();

        foreach($carts as $cart){
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->payment_status = 'paid';
            $order->product_id = $cart->product_id;
            
            $order->save();

        }

        $cart_remove = Cart::where('user_id', $user_id)->get();

        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
        }
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Ordered Successfully');

        return redirect('my_cart');
    }

    public function shop(){
        $products = Product::paginate(8);
        if(Auth::id()){
            
                    $user = Auth::user();
                    $user_id = $user->id;
                    $count = Cart::where('user_id', $user_id)->count();
        }else{
            $count = '';
        }


        return view('home.shop', compact('products', 'count'));
    }

    public function why(){
        if(Auth::id()){
            
                    $user = Auth::user();
                    $user_id = $user->id;
                    $count = Cart::where('user_id', $user_id)->count();
        }else{
            $count = '';
        }


        return view('home.why', compact('count'));
    }
    public function testimonial(){
        if(Auth::id()){
            
                    $user = Auth::user();
                    $user_id = $user->id;
                    $count = Cart::where('user_id', $user_id)->count();
        }else{
            $count = '';
        }


        return view('home.testimonial', compact('count'));
    }

    public function contact(){
        if(Auth::id()){
            
                    $user = Auth::user();
                    $user_id = $user->id;
                    $count = Cart::where('user_id', $user_id)->count();
        }else{
            $user = '';
            $count = '';
        }


        return view('home.contact', compact('count', 'user'));
    }

    public function search_product(Request $request){
        $search = $request->search;
        $products = Product::where('title', 'LIKE', '%'.$search.'%')
        ->orWhere('category', 'LIKE', '%'.$search.'%')->paginate();
        if(Auth::id()){
            
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        }else{
            $user = '';
            $count = '';
        }
        return view('home.shop', compact('products', 'user', 'count'));
    }

    public function send_message(Request $request){
        $user_id = Auth::user()->id;
        $contact = Contact::where('user_id', $user_id)->paginate();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);
    
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->user_id = $user_id;
        $contact->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Message Sent Successfully');
    
        return redirect()->back();
    }
}
