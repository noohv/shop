<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class CartController extends Controller
{
    public function addOrRemoveFromCart(Request $request) 
    {
        if (session()->has('foods') && in_array($request->id, session()->get('foods'))) {
            $foods = session()->pull('foods');
            unset($foods[array_search($request->id, $foods)]);
            session()->put('foods', $foods);
        }        
        else // add a book to cart
            session()->push('foods', $request->id);

        return response()->json(session()->get('foods'), 200);
    }   
    
    public function showCart() 
    {
        if (session()->has('foods')) {
            $foods = Food::whereIn('id', session()->get('foods'))->get();
            return view('cart', compact('foods'));
        }
        else
            return view('cart');            
    }    
}
