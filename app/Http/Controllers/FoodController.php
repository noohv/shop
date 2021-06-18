<?php

namespace App\Http\Controllers;
use App\Models\Restaurant;
use App\Models\OrderItem;
use App\Models\Category;
use App\Models\Food;
use Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->only(['edit','destroy','store','create','update']);
    }

    public function index(Request $request) {
        $foods=Food::where([
            ['name','!=',null],
            [function($query) use ($request) {
                if(($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id')
            ->paginate(30);

        return view ('home', compact('foods'));

    }



    public function create() {
        $categories = Category::all()->map(function ($category) {
            $category->value = $category->id;
            return $category;
	   });
        return view('create_food',compact('categories'));
    }


    public function store(Request $request) {
        $rules = array(
            'name' => 'required|string|min:2|max:191',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required|min:0|max:500',
        );
        $this->validate($request, $rules);

        $user_id=Auth::id();
        $restaurant = Restaurant::where("user_id", "=", $user_id)->first();

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $food = new Food();
        $food->name = $request->name;
        $food->description = $request->description;
        $food->image = $imageName;
        $food->price = $request->price;
        $food->restaurant_id = $restaurant->id;
        $food->category()->associate(Category::findOrFail($request->category));

        $food->save();

        return redirect()->route('business');

    }

    public function edit($id)
    {
        $categories = Category::all()->map(function ($category) {
            $category->value = $category->id;
            return $category;
	   });

        $food=Food::find($id);
        $restaurant=Restaurant::find($food->restaurant_id);
        if($restaurant->user_id==Auth::id()){
            return view('edit_food',compact('food','categories'));
        }
        return redirect()->route('food.index');
    }


    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required|string|min:2|max:191',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'price' => 'required|min:0|max:500',
        );
        $this->validate($request, $rules);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        $food=Food::find($id);
        $food->id=$id;
        $food->name=$request->name;
        $food->description=$request->description;
        $food->image=$imageName;
        $food->price=$request->price;
        $food->category()->associate(Category::findOrFail($request->category));

        $food->save();

        return redirect()->route('food.index');
    }

    public function destroy(Request $request) {
        $food=Food::find($request->id);
        $restaurant=Restaurant::find($food->restaurant_id);
        if($restaurant->user_id==Auth::id()){
            OrderItem::where('foods_id',$request->id)->delete();
            File::delete(public_path('images').'/'.$food->image);
            $food->delete();
            return redirect()->route('business');
        }
        return redirect()->route('business');
    }

}
