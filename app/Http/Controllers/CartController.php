<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use Cart;
use Validator;

class CartController extends Controller
{
    public function index()
    {
        $items =\Cart::getContent();
        return view('cart')->with(compact('items'));
    }


    public function store(Request $request)
    {
        if($request->ajax()) {
            $food = Food::findOrFail($request->item_id);

            Cart::add(array(
                'id' => $food->id,
                'name' => $food->name,
                'description' => $food->description,
                'quantity' => $request->item_qty,
                'price' => $food->price,
                'associatedModel' => $food
            ));
            return redirect()->route('food.index');
        }
    }

    public function update() {

    }

    public function destroy(Request $request) {
        Cart::remove($request->id);
        return redirect()->back();
    }

    public function destroyAll() {
        Cart::clear();
    }


}
