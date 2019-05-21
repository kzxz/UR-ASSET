<?php

namespace App\Http\Controllers;

use App\Watchman;

use Illuminate\Http\Request;

class watchersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Watchman $watchman)
    {
        $watchman = Watchman::get();
        return view('watchers')->withWatchman($watchman);
    }

}
