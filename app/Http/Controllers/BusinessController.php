<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Restaurant;
use App\Models\User;
use App\Models\Review;
use App\Models\Food;
use App\Models\OrderItem;
use Auth;


class BusinessController extends Controller
{
    public function showBusiness() {
        $userID = Auth::id();
        $user = User::with('restaurant')->find($userID);

        if ($user->restaurant === null) {
            return redirect()->action([RestaurantController::class, 'create']);
        }
        else {
            $restaurant = Restaurant::where('user_id',"=",$userID)->first();
            $foodList = Food::where('restaurant_id',"=",$restaurant->id)->paginate(5);
            $foods = Food::where('restaurant_id',"=",$restaurant->id)->get();
            $orderItems = OrderItem::get();
            return view('business', compact('restaurant','foodList','foods','orderItems'));
        }
    }
}
