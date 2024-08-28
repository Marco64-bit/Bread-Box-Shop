<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class AdminController extends Controller
{


    public function view_category(){
        $datas = Category::paginate(10);
        return view('admin.category', compact('datas'));
    }

    public function add_category(Request $request){
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Added Successfully');
        
        return redirect()->back();
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Deleted Successfully');
        return redirect()->back();
    }

    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id){
        $data = Category::find($id);
        $data-> category_name = $request->category;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Category Updated Successfully');

        return redirect('/view_category');
    }

    public function add_product(){
        $categories = Category::all();
        return view('admin.add_product', compact('categories'));
    }

    public function upload_product(Request $request){
        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        
        $image = $request->image;

        if($image){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $image_name);
            $data->image = $image_name;
        }

        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Added Successfully');
        return redirect()->back();
    }

    public function view_product(){
        $products = Product::paginate(5);
        return view('admin.view_product', compact('products'));
    }

    public function delete_product($id){
        $data = Product::find($id);
        $image_path = public_path('products/'.$data->image);

        if(file_exists($image_path)){
            unlink($image_path);
        }

        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Deleted Successfully');

        return redirect()->back();
    }

    public function update_product($slug){
        $data = Product::where('slug', $slug)->get()->first();
        $categories = Category::all();
        return view('admin.update_page', compact('data', 'categories'));
    }

    public function edit_product(Request $request, $id){
        $data = Product::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;
        if($image){
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$image_name);
            $data->image = $image_name;
        }
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Product Updated Successfully');

        return redirect('/view_product');
    }

    public function product_search(Request $request){
        $search = $request->search;
        $products = Product::where('title', 'LIKE', '%'.$search.'%')
        ->orWhere('category', 'LIKE', '%'.$search.'%')->paginate();
        
        return view('admin.view_product', compact('products'));
    }

    public function order_search(Request $request){
        $search = $request->search;
        $datas = Order::where('name', 'LIKE', '%'.$search.'%')
        ->orWhere('rec_address', 'LIKE', '%'.$search.'%')
        ->orWhere('phone', 'LIKE', '%'.$search.'%')
        ->orWhere('status', 'LIKE', '%'.$search.'%')
        ->orWhere('payment_status', 'LIKE', '%'.$search.'%')->paginate();
        
        return view('admin.orders', compact('datas'));
    }

    public function message_search(Request $request){
        $search = $request->search;
        $contacts = Contact::where('name', 'LIKE', '%'.$search.'%')
        ->orWhere('email', 'LIKE', '%'.$search.'%')
        ->orWhere('phone', 'LIKE', '%'.$search.'%')
        ->orWhere('message', 'LIKE', '%'.$search.'%')->paginate();
        
        return view('admin.view_messages', compact('contacts'));
    }

    public function view_orders(){
        $datas = Order::paginate(8);

        return view('admin.orders', compact('datas'));
    }

    public function view_messages(){
        $contacts = Contact::paginate(5);
        $users = Contact::where('user_id')->get();
        return view('admin.view_messages', compact('contacts', 'users'));
    }
    
    public function view_message($id){
        $contact = Contact::find($id);
        $users = Contact::where('user_id')->get();
        return view('admin.view_message', compact('contact', 'users'));
    }

    public function delete_message($id){
        $contact = Contact::find($id)->get();

        $contact->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess('Message Deleted Successfully');
        return redirect()->back();
    }

    public function on_the_way($id){
        $data = Order::find($id);
        $data->status = 'On the way';
        $data->save();

        return redirect('/view_orders');
    }
    
    public function delivered($id){
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();

        return redirect('/view_orders');
    }

    public function print_pdf($id){
        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
