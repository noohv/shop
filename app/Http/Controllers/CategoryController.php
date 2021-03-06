<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\Category;

use Illuminate\Support\Facades\DB;
use Auth;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('roles:3');
        $this->middleware('auth');
    }

    public function index() {
        $categories=Category::paginate(5);
        return view('categories',compact('categories'));
    }

    /**
     * Show the form for creating a new book.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_category');
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

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->route('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
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
