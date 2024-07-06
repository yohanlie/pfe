<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use App\Models\AccessoryCategory;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Models\GreetingCard;
use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->get()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        $order_delivered = Order::where('package_status', 'delivered')->get()->count();

        $current_user = Auth::user();

        return view('admin.index', compact('user', 'product', 'order', 'order_delivered', 'current_user'));
    }

    public function index_commercial()
    {
        $current_user = Auth::user();

        return view('commercial.index', compact('current_user'));
    }

    public function index_delivery()
    {
        $current_user = Auth::user();

        return view('delivery.index', compact('current_user'));
    }

    public function index_super()
    {
        $user = User::where('usertype', 'user')->get()->count();

        $product = Product::all()->count();

        $order = Order::all()->count();

        $order_delivered = Order::where('package_status', 'delivered')->get()->count();

        $current_user = Auth::user();

        return view('super.index', compact('user', 'product', 'order', 'order_delivered', 'current_user'));
    }

    public function home()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }

        else {$count = null;}

        $categories = Category::all();

        return view('home.index',compact('product','count', 'categories'));
    }

    public function login_home()
    {
        $product = Product::all();

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }

        else {$count = null;}

        $categories = Category::all();

        return view('home.index',compact('product','count', 'categories'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }

        else {$count = null;}

        $accessory = Accessories::all();

        $gcard = GreetingCard::all();

        $accessory_count = Accessories::count();

        $categories = Category::all();

        return view('home.product_details',compact('data','count', 'accessory', 'gcard', 'accessory_count', 'categories'));
    }

    public function add_cart(Request $request, $id)
    {
        $product_id = $id;

        $user = Auth::user();

        $user_id = $user->id;

        $cart = new Cart;

        $cart->user_id = $user_id;

        $cart->product_id = $product_id;

        $cart->accessory_id = $request->accessory;

        $cart->gcard_id = $request->gcard;

        $cart->save();

        toastr()->closeButton()->success('Product Added to Cart Successfully');

        return redirect()->back();
    }

    public function mycart()
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();

            $cart = Cart::where('user_id',$userid)->get();
        }

        $categories = Category::all();

        return view('home.mycart',compact('count','cart', 'categories'));
    }

    public function remove_cart($id)
    {
        $data = Cart::find($id);

        $data->delete();

        toastr()->closeButton()->success('Item Removed from Cart Successfully');

        return redirect()->back();
    }

    public function remove_accessory($id)
    {
        $data = Cart::find($id);

        $data->accessory_id = null;

        $data->save();

        toastr()->closeButton()->success('Item Removed from Cart Successfully');

        return redirect()->back();
    }

    public function add_accessory($id)
    {
        // Validate the accessory ID
        $accessory = Accessories::find($id);
        if (!$accessory) {
            toastr()->closeButton()->error('Accessory not found.');
            return redirect()->back();
        }

        // Get the currently authenticated user
        $user = Auth::user();
        if (!$user) {
            toastr()->closeButton()->error('User not authenticated.');
            return redirect()->back();
        }

        $user_id = $user->id;

        // Find the existing cart item for the user
        $cartItem = Cart::where('user_id', $user_id)->first();
        if (!$cartItem) {
            toastr()->closeButton()->error('Cart item not found.');
            return redirect()->back();
        }

        // Add or update the accessory_id in the cart item
        $cartItem->accessory_id = $accessory->id; // Ensure the correct field is updated
        $cartItem->save();

        toastr()->closeButton()->success('Accessory added to cart successfully.');

        return redirect()->back();
    }

    public function add_gcard_cart(Request $request)
    {
        $category = $request->category;

        $gcard = GreetingCard::where('category', $category)->first();

        if (!$gcard) {
            toastr()->closeButton()->error('Greeting Card not found.');
            return redirect()->back();
        }

        // Get the currently authenticated user
        $user = Auth::user();
        if (!$user) {
            toastr()->closeButton()->error('User not authenticated.');
            return redirect()->back();
        }

        $user_id = $user->id;

        // Find the existing cart item for the user
        $cartItem = Cart::where('user_id', $user_id)->first();
        if (!$cartItem) {
            toastr()->closeButton()->error('Cart item not found.');
            return redirect()->back();
        }

        // Add or update the accessory_id in the cart item
        $cartItem->gcard_id = $gcard->id; // Ensure the correct field is updated
        $cartItem->save();

        toastr()->closeButton()->success('Greeting Card added to cart successfully.');

        return redirect()->back();
    }

    public function remove_gcard($id)
    {
        $data = Cart::find($id);

        $data->gcard_id = null;

        $data->save();

        toastr()->closeButton()->success('Item Removed from Cart Successfully');

        return redirect()->back();
    }

    public function stripe($value)
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;

            $cart = Cart::where('user_id',$userid)->get();
        }

        return view('home.stripe', compact('value', 'cart'));
    }

    public function myorders()
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();

            $order = Order::where('user_id', $userid)->get();

            $order_count = Order::where('user_id', $userid)->get()->count();
        }

        $categories = Category::all();

        return view('home.order', compact('count', 'order', 'user', 'order_count', 'categories'));
    }

    public function allproducts()
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }
        else{$count = null;}

        $categories = Category::all();

        $products = Product::all();

        return view('home.allproducts', compact('count', 'categories', 'products'));
    }

    public function allaccessories()
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }
        else{$count = null;}

        $categories = AccessoryCategory::all();

        $products = Accessories::all();

        return view('home.allaccessories', compact('count', 'categories', 'products'));
    }

    public function allgcards()
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }
        else{$count = null;}

        $categories = Category::all();

        $products = GreetingCard::all();

        return view('home.allgcards', compact('count', 'categories', 'products'));
    }

    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $value * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from complete"
        ]);
        
        $current_user = Auth::user();

        $cart = Cart::where('user_id', $current_user->id)->get();

        foreach($cart as $carts)
        {
            $order = new Order;

            $order->rec_address = $request->deliveryAddress;

            $order->rec_name = $request->recipientName;

            $order->send_name = $request->billingName;

            $order->phone = $request->recipientPhone;

            $order->package_status = 'Ready';

            $order->payment_status = 'Paid';

            $order->user_id = $current_user->id;

            $order->product_id = $carts->product_id;

            $order->accessory_id = $carts->accessory_id;

            $order->gcard_id = $carts->gcard_id;

            $order->delivery_date = $request->deliveryDate;

            $order->save();

            $product = Product::find($carts->product_id);
            if ($product) {
                $product->quantity -= 1;
                $product->save();
            }

            $accessory = Accessories::find($carts->accessory_id);
            if ($accessory) {
                $accessory->quantity -= 1;
                $accessory->save();
            }

            $gcard = GreetingCard::find($carts->gcard_id);
            if ($gcard) {
                $gcard->quantity -= 1;
                $gcard->save();
            }

            $carts->delete();
        }

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();

            $order = Order::where('user_id', $userid)->get();

            $order_count = Order::where('user_id', $userid)->get()->count();
        }

        $categories = Category::all();

        toastr()->closeButton()->success('Order Payed Successfully');

        return view('home.order', compact('count', 'order', 'user', 'order_count', 'categories'));
    }

    public function support()
    {
        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }

        else{$count = null; $user = null;}

        $categories = Category::all();

        return view('home.support', compact('count', 'user', 'categories'));
    }

    public function ticket(Request $request)
    {
        $ticket = new Ticket;

        $ticket->sender = $request->sender;

        $ticket->email = $request->email;

        $ticket->phone = $request->phone;

        $ticket->description = $request->description;

        $ticket->save();

        toastr()->closeButton()->success('Thanks for contacting us. We\'ll reply to you as soon as possible');

        return redirect()->back();
    }

    public function bycategory($category_name)
    {
        $count = null;

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }

        $categories = Category::all();

        $products = Product::where('category', $category_name)->get();

        return view('home.allproducts', compact('count', 'categories', 'products'));
    }

    public function byaccessory($category_name)
    {
        $count = null;

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }

        $categories = AccessoryCategory::all();

        $products = Accessories::where('category', $category_name)->get();

        return view('home.allaccessories', compact('count', 'categories', 'products'));
    }

    public function bygcard($category_name)
    {
        $count = null;

        if(Auth::id())
        {
            $user = Auth::user();

            $userid = $user->id;
    
            $count = Cart::where('user_id',$userid)->count();
        }

        $categories = Category::all();

        $products = GreetingCard::where('category', $category_name)->get();

        return view('home.allgcards', compact('count', 'categories', 'products'));
    }
}
