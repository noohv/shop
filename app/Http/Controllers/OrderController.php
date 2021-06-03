<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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

    public function store(Request $request)
    {
        if(session()->get('foods')){
            $order = new Order();
            $order->user_id = Auth::id();
            $order->city = $request->city;
            $order->street = $request->street;
            $order->number = $request->number;
            $order->status = 0;
            $order->save();

            foreach(session()->get('foods') as $food) {
                $price = Food::find($food)->price;

                $orderitem = new OrderItem();
                $orderitem->order_id = $order->id;
                $orderitem->foods_id = $food;
                $orderitem->quantity = $request->quantity;
                $orderitem->price = $price;

                $orderitem->save();
            }
        }
        session()->forget('foods');
        return redirect()->route('home');        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
