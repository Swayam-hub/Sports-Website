<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\player;
use App\Models\extra_data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PlayerController extends Controller
{
    public function index(){
        $players = player::all();
        return view('frontend.player')->with(compact('players'));
    }

    public function allData($id){
        $d = player::find($id);
        $f = DB::table('player')
        ->join('extra_data','player.email','=','extra_data.email')
        ->where('player.email',$d->email)
        ->get();
        return view('frontend.player_data')->with(compact('f'));
    }
}
