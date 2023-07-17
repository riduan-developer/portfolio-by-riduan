<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontEnd\Hero;
use App\Models\frontEnd\About;
use App\Models\frontEnd\Service;
use App\Models\Admin\FrontMaster\Portfolio;
use App\Models\Skill;
use App\Models\frontEnd\Resume;



class FrontEndController extends Controller
{
    public function index()
    {
        $hero_data = Hero::where('status',1)->first();
        $abt_data  = About::where('status',1)->get();
        $services  = Service::where('status',1)->get();
        $skills    = Skill::where('status',1)->get();
        $portfolios = Portfolio::where('status',1)->get();
        $resumes    = Resume::where('status',1)->get();
        return view('frontEnd.index',compact('hero_data','abt_data','services','skills','portfolios','resumes'));
    }





}
