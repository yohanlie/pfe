<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        $current_user = Auth::user();

        return view('super.category', compact('data', 'current_user'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();

        toastr()->closeButton()->success('Category Added Successfully');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        $current_user = Auth::user();
        
        return view('super.edit_category', compact('data', 'current_user'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);

        $data->category_name=$request->category;

        toastr()->closeButton()->success('Category Updated Successfully');

        $data->save();

        return redirect('/view_category');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        toastr()->closeButton()->success('Category Deleted Successfully');

        return redirect()->back();
    }

    public function view_order()
    {
        $data = Order::all();

        foreach($data as $datas)
        {
            if($datas->payment_status === 'Paid')
            {
                $datas->package_status = 'Ready';
            }
            $datas->save();
        }

        $current_user = Auth::user();

        return view('super.order', compact('data', 'current_user'));
    }

    public function on_delivery($id)
    {
        $data = Order::find($id);

        $data->package_status = "On delivery";

        $data->save();

        return redirect('/view_orders');
    }

    public function delivered($id)
    {
        $data = Order::find($id);

        $data->package_status = "Delivered";

        $data->save();

        return redirect('/view_orders');
    }

    public function order_details($id)
    {
        $data = Order::find($id);

        $current_user = Auth::user();

        return view('super.order_details', compact('data', 'current_user'));
    }

    public function view_employees()
    {
        $data = User::all();

        $current_user = Auth::user();
        
        return view('super.employees', compact('data', 'current_user'));
    }

    public function delete_employee($id)
    {
        $data = User::find($id);

        $data->delete();

        toastr()->closeButton()->success('Employee Deleted Successfully');

        return redirect()->back();
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
        } elseif($current_user->usertype === 'super')
        {
            return view('super.add_product', compact('category', 'current_user'));
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

        return view('super.view_product', compact('product', 'current_user'));
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Product::where('title', 'LIKE', '%'.$search.'%')->orWhere('category', 'LIKE', '%'.$search.'%')->paginate(5);

        return view('super.view_product',compact('product'));
    }

    public function update_product($id)
    {
        $data = Product::find($id);

        $category = Category::all();

        $current_user = Auth::user();
        return view('super.update_page',compact('data','category', 'current_user'));
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

    public function admin_role($id)
    {
        $data = User::find($id);

        $data->usertype = 'admin';

        $data->save();

        toastr()->closeButton()->success('Role Changed Successfully');

        return redirect()->back();
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
