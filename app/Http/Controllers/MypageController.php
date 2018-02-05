<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class MypageController extends Controller {

    public function index() {
        $rooms = DB::table('rooms')->select('name', 'room_id', 'description', 'creator')->where('creator', Auth::user()->user_id)->get();

        return view('mypage', [
            'screen_name' => Auth::user()->screen_name,
            'user_id' => Auth::user()->user_id,
            'rooms' => $rooms,
        ]);
    }

    public function __construct() {
        $this->middleware('auth');
    }
}