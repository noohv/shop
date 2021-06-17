<?php

namespace App\Http\Controllers;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('roles:3');
        $this->middleware('auth');
    }

    public function allUsers() {
        $users=User::paginate(15);
        return view('allusers',compact('users'));
    }

    public function banUser($id) {
        $user = User::find($id);
        $user->status=1;
        $user->save();
        return redirect()->back();
    }
    
    public function unbanUser($id) {
        $user = User::find($id);
        $user->status=0;
        $user->save();
        return redirect()->back();
    }

}
