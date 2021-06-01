<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use App\Models\Review;
use App\Models\Food;
use App\Models\Restaurant;
use App\Http\Middleware\Roles;

use Illuminate\Support\Facades\DB;
use Auth;


class RestaurantController extends Controller
{
    public function __construct() {
        $this->middleware('roles:1,2');
        $this->middleware('auth');  
    }

    public function index() {
        $restaurants = Restaurant::paginate(30);
        return view('restaurants',compact('restaurants'));
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

        // if ($user->restaurant === null) {
        //     return redirect()->action([RestaurantController::class, 'create']);
        // }
        // else {
            return view('restaurant', compact('restaurant'));
        // }
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
