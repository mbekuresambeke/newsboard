<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $advertisements = Advertisement::all();

        $staffs = User::all()->pluck('name', 'id')->toArray();

        return view('home', compact('advertisements', 'staffs'));
    }

    public function welcome(){
        $today = Carbon::today()->toDateString();

        $advertisements = DB::table('advertisements')
            ->where('publish_date', '<=', $today)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $staffs = User::all()->pluck('name', 'id')->toArray();

        return view('welcome', compact('advertisements', 'staffs'));
    }
}
