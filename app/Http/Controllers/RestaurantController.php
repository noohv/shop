<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use App\Models\Review;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\Order;
use App\Http\Middleware\Roles;

use Illuminate\Support\Facades\DB;
use Auth;


class RestaurantController extends Controller
{
    public function index() {
        $restaurants = Restaurant::paginate(30);
        $reviews = Review::get();
        return view('restaurants',compact('restaurants','reviews'));
    }

    /**
     * Show the form for creating a new book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::with('restaurant')->find(Auth::id());
        if ($user->restaurant === null) {
            return view('create_restaurant');
        }
        else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created book in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|string|min:2|max:191',
            'description' => 'required|string',
            'city' => 'required|string|min:4',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        );
        $this->validate($request, $rules);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->location = $request->city;
        $restaurant->image = $imageName;
        $restaurant->user_id = Auth::id();

        $restaurant->save();

        return redirect()->route('restaurants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $foods = Food::where('restaurant_id',$id)->paginate(15);
        $hasOrder = Order::where('id',$id)->where('user_id', Auth::id())->exists();
        // $hasReview = Review::where('id',$id)->where('user_id', Auth::id())->exists();
        return view('restaurant', compact('restaurant','foods','hasOrder'));
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
