<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class MypageController extends Controller {

    public function index() {
        return view('mypage');
    }

    public function get() {
        $rooms = DB::table('rooms')->select('name', 'room_id', 'description', 'creator')->where('creator', Auth::user()->user_id)->get();

        return json_encode($rooms);
    }

    public function __construct() {
        $this->middleware('auth');
    }
}
