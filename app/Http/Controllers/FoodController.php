<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\Food;
use Auth;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index() {
        $foods=Food::get();
        return view('home',compact('foods'));
    }

    public function create() {
        return view('create_food');
    }


    public function store(Request $request) {
        $rules = array(
            'name' => 'required|string|min:2|max:191',
            'description' => 'required|string',
            'image' => 'required',
            'price' => 'required|min:0|max:500',
        );        
        $this->validate($request, $rules); 
        
        $user_id=Auth::id();
        $restaurant = Restaurant::where("user_id", "=", $user_id)->first();
        

        $food = new Food();
        $food->name = $request->name;
        $food->description = $request->description;
        $food->image = $request->image;
        $food->price = $request->price;
        $food->restaurant_id = $restaurant->id;
        $food->category_id = $request->category_id;
        
        $food->save();

        return redirect()->route('home');        

    }
}
