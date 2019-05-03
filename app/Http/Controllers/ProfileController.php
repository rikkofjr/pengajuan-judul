<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'clearance']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function username($username)
    {
        $profile = User::where('username', $username)->first();
        return view('users.myprofile', compact('profile')); 
    }

}
