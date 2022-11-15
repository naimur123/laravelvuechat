<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index($to){
        
       $users = User::where('id','!=',Auth::user()->id)->get();
       $rcv = User::where('id',$to)->first(['name'])->name;
       $message =  Message::where(function($q) use ($to) {
                    $q->where('from', auth()->id());
                    $q->where('to', $to);
            })->orWhere(function($q) use ($to) {
                    $q->where('from', $to);
                    $q->where('to', auth()->id());
            })->get();

            $params = [
                'title' => "messages",
                'messages' => $message,
                'users' => $users,
                'rcv'=> $rcv
            ];
            
        return view('home',$params);
    }
}
