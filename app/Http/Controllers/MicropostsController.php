<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class MicropostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
            $data += $this->counts($user);
            return view('users.show', $data);
                        // users.show -> users/show.blade.php
                       // "resources/views/" + users/shoe.blade.pho
        }else {
            return view('welcome');
                      // welocome -> welcom.blade.php
                      // "resources/views/" + weicome.blade.php
        }
    }


 public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);

        $request->user()->microposts()->create([
            'content' => $request->content,
        ]);

         return redirect()->back();
    }
    
    public function destroy($id)
    {
        $micropost = \App\Micropost::find($id);

        if (\Auth::user()->id === $micropost->user_id) {
            $micropost->delete();
        }

        return redirect()->back();
    }
    
    public function favorings($id) {
        $user = \App\User::find($id);
        
        $data = [
            'user' => $user];
    }
}