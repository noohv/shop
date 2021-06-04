<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        $items =\Cart::getContent();
        $foods = Cart::getContent();
        return view('cart',compact('foods','items'));
    }

    public function getTotalPrice() {
        return Cart::getTotal();
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|min:1|max:5'
        ]);

        $food = Food::findOrFail($request->id);

        Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'associatedModel' => $food
        ));
        return redirect()->route('home')->with('message','Item added!');
    }

    public function update() {

    }

    public function destroy($id) {
        Cart::remove($id);
        return redirect()->back();
    }

    public function destroyAll() {
        Cart::clear();
    }


}
