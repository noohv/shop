<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Food;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $orders = Order::where("user_id", "=", Auth::id())->paginate(10);
        // $orderitems = OrderItem::get();
        return view('user_orders',compact('orders'));
    }

    public function create() {
        return view('checkout');
    }

    public function store(Request $request)
    {
        if(!Cart::isEmpty()){
            $order = new Order();
            $order->user_id = Auth::id();
            $order->city = $request->city;
            $order->street = $request->street;
            $order->number = $request->number;
            $order->total = Cart::getTotal();
            $order->status = 0;
            $order->save();

            foreach(Cart::getContent() as $item) {
                $orderitem = new OrderItem();
                $orderitem->order_id = $order->id;
                $orderitem->foods_id = $item->id;
                $orderitem->quantity = $item->quantity;
                $orderitem->price = $item->price;

                $orderitem->save();
            }
        }
        Cart::clear();
        return redirect()->route('food.index');
    }
}
