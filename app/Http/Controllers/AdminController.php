<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Accessories;
use App\Models\AccessoryCategory;
use App\Models\GreetingCard;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        $current_user = Auth::user();

        return view('admin.category', compact('data', 'current_user'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        toastr()->closeButton()->success('Category Added Successfully');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        toastr()->closeButton()->success('Category Deleted Successfully');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        $current_user = Auth::user();
        
        return view('admin.edit_category', compact('data', 'current_user'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);

        $data->category_name=$request->category;

        toastr()->closeButton()->success('Category Updated Successfully');

        $data->save();

        return redirect('/view_category');
    }

    public function add_product()
    {
        $category = Category::all();

        $current_user = Auth::user();

        if($current_user->usertype === 'admin')
        {
            return view('admin.add_product', compact('category', 'current_user'));
        } elseif($current_user->usertype === 'commercial')
        {
            return view('commercial.add_product', compact('category', 'current_user'));
        }
    }

    public function upload_product(Request $request)
    {
        $data = new Product;

        $data->title = $request->title;

        $data->description = $request->description;
        
        $data->price = $request->price;
        
        $data->quantity = $request->qty;
        
        $data->category = $request->category;
        
        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->closeButton()->success('Product Added Successfully');

        return redirect()->back();
    }

    public function view_product()
    {
        $product = Product::paginate(5);

        $current_user = Auth::user();

        return view('admin.view_product', compact('product', 'current_user'));
    }

    public function view_product_commercial()
    {
        $product = Product::paginate(5);

        $current_user = Auth::user();

        return view('commercial.view_product', compact('product', 'current_user'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        if($data->image)
        {
            $image_path = public_path('products/'.$data->image);
        }

        $image_path = null;

        if(file_exists($image_path))
        {
            unlink($image_path);
        }

        $data->delete();

        toastr()->closeButton()->success('Product Deleted Successfully');

        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Product::find($id);

        $category = Category::all();

        $current_user = Auth::user();
        return view('admin.update_page',compact('data','category', 'current_user'));
    }

    public function update_product_commercial($id)
    {
        $data = Product::find($id);

        $category = Category::all();

        $current_user = Auth::user();
        return view('commercial.update_page',compact('data','category', 'current_user'));
    }

    public function edit_product(Request $request,$id)
    {
        $data = Product::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->closeButton()->success('Product Updated Successfully');

        return redirect('/view_product');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title', 'LIKE', '%'.$search.'%')->orWhere('category', 'LIKE', '%'.$search.'%')->paginate(5);
        $current_user = Auth::user();
        return view('admin.view_product',compact('product', 'current_user'));
    }

    public function add_accessory()
    {
        $category = AccessoryCategory::all();

        $current_user = Auth::user();
        return view('admin.add_accessory', compact('category', 'current_user'));
    }

    public function upload_accessory(Request $request)
    {
        $data = new Accessories;

        $data->title = $request->title;

        $data->description = $request->description;
        
        $data->price = $request->price;
        
        $data->quantity = $request->qty;
        
        $data->category = $request->category;
        
        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->closeButton()->success('Accessory Added Successfully');

        return redirect()->back();
    }

    public function view_accessory()
    {
        $product = Accessories::paginate(5);

        $current_user = Auth::user();

        return view('admin.view_accessory', compact('product', 'current_user'));
    }

    public function update_accessory($id)
    {
        $data = Accessories::find($id);

        $category = AccessoryCategory::all();

        $current_user = Auth::user();
        return view('admin.update_accessory_page',compact('data','category', 'current_user'));
    }

    public function edit_accessory(Request $request,$id)
    {
        $data = Accessories::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->closeButton()->success('Accessory Updated Successfully');

        return redirect('/view_accessory');
    }

    public function delete_accessory($id)
    {
        $data = Accessories::find($id);

        $image_path = public_path('products/'.$data->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }

        $data->delete();

        toastr()->closeButton()->success('Accessory Deleted Successfully');

        return redirect()->back();
    }

    public function add_gcard()
    {
        $category = Category::all();

        $current_user = Auth::user();

        return view('admin.add_gcard', compact('category', 'current_user'));
    }

    public function upload_gcard(Request $request)
    {
        $data = new GreetingCard;

        $data->title = $request->title;

        $data->description = $request->description;
        
        $data->price = $request->price;
        
        $data->quantity = $request->qty;
        
        $data->category = $request->category;
        
        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->closeButton()->success('Greeting Card Added Successfully');

        return redirect()->back();
    }

    public function view_gcard()
    {
        $product = GreetingCard::paginate(5);

        $current_user = Auth::user();
        return view('admin.view_gcard', compact('product', 'current_user'));
    }

    public function update_gcard($id)
    {
        $data = GreetingCard::find($id);

        $category = Category::all();

        $current_user = Auth::user();

        return view('admin.update_gcard_page',compact('data','category', 'current_user'));
    }

    public function edit_gcard(Request $request,$id)
    {
        $data = GreetingCard::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }

        $data->save();

        toastr()->closeButton()->success('Greeting Card Updated Successfully');

        return redirect('/view_gcard');
    }

    public function delete_gcard($id)
    {
        $data = GreetingCard::find($id);

        $image_path = public_path('products/'.$data->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }

        $data->delete();

        toastr()->closeButton()->success('Greeting Card Deleted Successfully');

        return redirect()->back();
    }

    public function view_order()
    {
        $data = Order::all();

        $current_user = Auth::user();

        return view('admin.order', compact('data', 'current_user'));
    }

    public function view_order_commercial()
    {
        $data = Order::where('package_status', 'Ready')->Orwhere('package_status', 'On delivery')->get();

        $current_user = Auth::user();

        $delivery = User::where('usertype', 'delivery')->get();

        return view('commercial.order', compact('data', 'current_user', 'delivery'));
    }

    public function view_order_delivery()
    {
        $current_user = Auth::user();

        $data = Order::where('delivery_id', $current_user->id)->get();

        return view('delivery.order', compact('data', 'current_user'));
    }

    public function ready($id)
    {
        $data = Order::find($id);

        $data->package_status = "Ready";

        $data->save();

        return redirect('/view_orders');
    }

    public function on_delivery($id)
    {
        $data = Order::find($id);

        $data->package_status = "On delivery";

        $data->save();

        return redirect('/view_orders');
    }

    public function on_delivery_commercial($id)
    {
        $data = Order::find($id);

        $data->package_status = "On delivery";

        $data->save();

        return redirect('/view_orders_commercial');
    }

    public function delivered($id)
    {
        $data = Order::find($id);

        $data->package_status = "Delivered";

        $data->save();

        return redirect('/view_orders');
    }

    public function delivered_delivery($id)
    {
        $data = Order::find($id);

        $data->package_status = "Delivered";

        $data->save();

        return redirect('/view_orders_delivery');
    }

    public function order_details($id)
    {
        $data = Order::find($id);

        $current_user = Auth::user();

        return view('admin.order_details', compact('data', 'current_user'));
    }

    public function order_details_commercial($id)
    {
        $data = Order::find($id);

        $current_user = Auth::user();

        return view('commercial.order_details', compact('data', 'current_user'));
    }

    public function order_details_delivery($id)
    {
        $data = Order::find($id);

        $current_user = Auth::user();

        return view('delivery.order_details', compact('data', 'current_user'));
    }

    public function view_employees()
    {
        $data = User::where('usertype', 'commercial')->orWhere('usertype', 'delivery')->orWhere('usertype', 'user')->get();

        $current_user = Auth::user();
        
        return view('admin.employees', compact('data', 'current_user'));
    }

    public function delete_employee($id)
    {
        $data = User::find($id);

        $data->delete();

        toastr()->closeButton()->success('Employee Deleted Successfully');

        return redirect()->back();
    }

    public function add_delivery(Request $request,$id)
    {
        $data = Order::find($id);

        $data->delivery_id = $request->delivery;

        $data->save();

        toastr()->closeButton()->success('Delivery Man Assigned Successfully');

        return redirect('/view_orders_commercial');
    }

    public function commercial_role($id)
    {
        $data = User::find($id);

        $data->usertype = 'commercial';

        $data->save();

        toastr()->closeButton()->success('Role Changed Successfully');

        return redirect()->back();
    }

    public function delivery_role($id)
    {
        $data = User::find($id);

        $data->usertype = 'delivery';

        $data->save();

        toastr()->closeButton()->success('Role Changed Successfully');

        return redirect()->back();
    }
}
