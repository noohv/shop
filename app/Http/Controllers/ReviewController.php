<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Review;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\Category;

use Illuminate\Http\Request;
use Auth;

class ReviewController extends Controller
{
    public function index ($id) {
        $reviews = Review::where('restaurant_id',"=",$id)->paginate(9);
        $users = User::get();
        return view('reviews',compact('reviews','users'));
    }

    public function store (Request $request,$id) {
        $rules = array(
            'description' => 'required|string',
        );
        $this->validate($request, $rules);

        $radio = $request->get('rate', 1);

        $review = new Review();
        $review->rating = $radio;
        $review->review = $request->description;
        $review->user_id = Auth::id();
        $review->restaurant_id = $id;

        $review->save();

        $restaurant = Restaurant::find($id);
        $ratings = Review::where('restaurant_id',"=",$id);
        $avgRating = $ratings->avg('rating');
        $restaurant->rating = $avgRating;
        $restaurant->save();


        return redirect()->route('food.index');
    }

    public function update(Request $request, $id)
    {
        $radio = $request->get('rate', 1);

        $review=Review::where('restaurant_id',$id)->where('user_id',Auth::id())->first();
        $review->rating = $radio;
        $review->review = $request->description;
        $review->restaurant_id = $id;

        $review->save();

        $restaurant = Restaurant::find($id);
        $ratings = Review::where('restaurant_id',"=",$id);
        $avgRating = $ratings->avg('rating');
        $restaurant->rating = $avgRating;
        $restaurant->save();


        return redirect()->route('food.index');
    }

}
