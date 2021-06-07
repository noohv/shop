<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Cart;
use View;

class CartController extends Controller
{
    public function index()
    {
        $items =\Cart::getContent();
        return view('cart')->with(compact('items'));
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

    public function destroy(Request $request) {
        if($request->ajax()) {
            $data = $request->all();
            Cart::remove($data);
            $items =\Cart::getContent();
            return response()->json([
                'items'=>$items
            ]);
        }
    }

    public function destroyAll() {
        Cart::clear();
    }


}
