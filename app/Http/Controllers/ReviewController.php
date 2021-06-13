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
    public function store (Request $request,$id)
    {
        $rules = array(
            'rating' => 'required|min:1|max:5',
            'description' => 'required|string',
        );
        $this->validate($request, $rules);

        $review = new Review();
        $review->rating = $request->rating;
        $review->review = $request->description;
        $review->user_id = Auth::id();
        $review->restaurant_id = $id;

        $review->save();

        $restaurant = Restaurant::find($id);
        $ratings = Review::where('restaurant_id',"=",$id);
        $avgRating = $ratings->avg('rating');
        $restaurant->rating = $avgRating;
        $restaurant->save();


        return redirect()->route('home');

    }
}
