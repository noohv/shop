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
        $orderitems = OrderItem::get();
        return view('user_orders',compact('orders','orderitems'));
    }

    public function store(Request $request)
    {
        if(session()->has('foods')){
            $order = new Order();
            $order->user_id = Auth::id();
            $order->total = 100;
            $order->save();
            

            foreach(session()->get('foods') as $food) {
                $price = Food::find($food)->price;

                $orderitem = new OrderItem();
                $orderitem->order_id = $order->id;
                $orderitem->foods_id = $food;
                $orderitem->quantity = 1;
                $orderitem->price = $price;

                $orderitem->save();
            }
        }

        session()->forget('foods'); // Removes books from reserved
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
