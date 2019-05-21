<?php

namespace App\Http\Controllers;

use App\Production_record;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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

//        public function index()
//    {
//
//            $chart = Charts::database(Production_record::all(), 'line', 'highcharts')
//            ->title("Monthly new Register Users")
//            ->elementLabel('total')
//            ->dimensions(1000, 500)
//            ->responsive(false)
//            ->values('trays_count')
//            ->groupByMonth(date('Y'));
//        return view('home',compact('chart'));
//    }
            public function index()
            {

                return view('home');

            }

}
