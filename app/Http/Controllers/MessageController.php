<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index(Request $request){
        // echo $request->to;
    //    $message = Message::select('message')
    //         ->where('to',$request->to)
    //         ->groupBy('from')
    //         ->get();
    //    $last_date_created = Message::latest()->first()->created_at; // also check for possible null

    //     // Get the date only - use to specify date range in the where section in the eloquent query
    //     $target_date = date('Y-m-d', strtotime( $last_date_created ) );

    //    $message = Message::where('to', $request->id)
    //                         ->where('created_at', '>=', $target_date . ' 00:00:00')
    //                         ->where('created_at', '<=',  $target_date . ' 23:59:59')
    //                         ->groupBy('from')
    //                         ->groupBy('created_at')
    //                         ->get();
            
    //    echo $message;

    }
}
