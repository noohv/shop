<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use App\Models\Review;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use Auth;


class RestaurantController extends Controller
{
    public function __construct() {
        // // only Admins have access to the following methods
        // $this->middleware('auth.admin')->only(['create', 'store']);
        // // only authenticated users have access to the methods of the controller
        // $this->middleware('auth');
    }

    /**
     * Show the form for creating a new book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_restaurant');
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
        );        
        $this->validate($request, $rules); 
        
        $restaurant = new Restaurant();
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->user_id = Auth::id();
        
        $restaurant->save();

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
        
        $userID = Auth::id();
        $user = User::with('restaurant')->find($userID);
        $restaurants = Restaurant::get();

        if ($user->restaurant === null) {
            return redirect()->action([RestaurantController::class, 'create']);
        }
        else {
            return view('business', compact('restaurants', 'userID'));
        }
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