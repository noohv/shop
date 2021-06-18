<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use App\Models\Review;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\Order;
use App\Http\Middleware\Roles;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Auth;


class RestaurantController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->only(['edit','store','create','update']);
        $this->middleware('roles:2,3')->only(['edit','store','create','update']);
    }


    public function index(Request $request) {
        $reviews = Review::get();
        $restaurants=Restaurant::where([
            ['name','!=',null],
            [function($query) use ($request) {
                if(($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id')
            ->paginate(30);

        return view ('restaurants', compact('restaurants','reviews'));

    }

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

    public function show($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $foods = Food::where('restaurant_id',$id)->paginate(15);
        $orders = Order::where('user_id',Auth::id())->get();
        $orderItems = OrderItem::get();
        $hasOrder=false;
        if($orders==null or $orderItems==null){
            $hasOrder=false;
        }
        else {
            foreach($foods as $food){
                foreach($orderItems as $orderItem){
                    foreach($orders as $order) {
                        if($food->id==$orderItem->foods_id and $food->restaurant_id=$id and $order->id==$orderItem->order_id){
                            $hasOrder=true;
                            break;
                        }
                    }
                }
            }
        }
        $hasReview = Review::where('restaurant_id',$id)->where('user_id', Auth::id())->exists();
        return view('restaurant', compact('restaurant','foods','hasReview','hasOrder'));
    }


    public function edit($id)
    {
        $restaurant=Restaurant::find($id);
        if($restaurant->user_id==Auth::id() || Auth::user()->role == 3){
            return view('edit_restaurant',compact('restaurant'));
        }
        return redirect()->route('food.index');
    }

    public function update(Request $request, $id)
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


        $restaurant = Restaurant::find($id);
        $restaurant->id=$id;
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->location = $request->city;
        $restaurant->image = $imageName;
        $restaurant->user_id = Auth::id();

        $restaurant->save();

        return redirect()->route('restaurants');

    }
}
