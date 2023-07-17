<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\frontEnd\Hero;



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
        $hero_data = Hero::where('status',1)->first();
        return view('backEnd.index',compact('hero_data'));
    }


    public function form_layout()
    {
        return view('backEnd.frontEnd-master.form-master.form_layouts');
    }



    public function table_layout()
    {
        return view('backEnd.frontEnd-master.table-master.table_layouts');
    }

}
