<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // add

class UserFollowController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        
        return view('users.index', [
            'users' => $users,
        ]);
    }


 public function show($id)
    {
        $user = User::find($id);

        return view('users.show', [
            'user' => $user,
        ]);
    }
    
      public function store(Request $request, $id)
    {
        \Auth::user()->follow($id);
        return redirect()->back();
    }

    public function destroy($id)
    {
        \Auth::user()->unfollow($id);
        return redirect()->back();
    }
}
    