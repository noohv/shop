<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\Food;

class OrderController extends Controller
{
    public function __construct() {
        $this->middleware('auth');  
    }

    public function index() {
        //
    }

    public function store(Request $request)
    {
        if(session()->has('foods')){
            foreach(session()->get('foods') as $food) {
                $price = Food::find($food)->price;

                $order = new Order();
                $order->user_id = Auth::id();
                $order->foods_id = $food;
                $order->quantity = 1;
                $order->price = $price;

                $order->save();
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
