<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // add
use App\Micropost;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $user= \Auth::user();
        
        return view('users.index', [
            'users' => $users,
            'user'=>$user,
        ]);
    }
    
     public function show($id)
    {
        $user = User::find($id);
        $micropost = \App\Micropost::find($id);
        
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'micropost' => $micropost,
            'microposts' => $microposts,
        ];

        $data += $this->counts($user, $micropost);

        return view('users.show', $data);

       
    }
    
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followings,
        ];

        $data += $this->counts($user);

        return view('users.followings', $data);
    }

    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);

        $data = [
            'user' => $user,
            'users' => $followers,
        ];

        $data += $this->counts($user);

        return view('users.followers', $data);
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(10);

        $data = [
            'user' => $user,
            'microposts' => $favorites,
        ];

        $data += $this->counts($user);

        return view('users.favorites', $data);
    }

}