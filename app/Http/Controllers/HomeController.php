<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Cache;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id','!=',Auth::user()->id)->get();
        
        
        // $users = User::except($currentuser)->get();
        // $users = User::all();
        // foreach ($users as $user) {
        //     if (Cache::has('is_online' . $user->id))
        //         echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        //     else
        //         echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        // }
        return view('home',compact('users'));
    }
}
