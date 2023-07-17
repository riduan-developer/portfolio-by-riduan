<?php

namespace App\Http\Controllers\Admin\FrontMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;


class SkillController extends Controller
{

    public function index()
    {
        $skills = Skill::all();
        return view('backEnd.frontEnd-Master.skill.skill',compact('skills'));
    }


    public function add_skill(Request $request)
    {

        $request->validate([
            'skill_title'   => 'required|string|max:255',
            'skill_percentage' => 'required|integer',
        ]);
        
        $skill = new Skill;
        $skill->title = $request->skill_title;
        $skill->percent = $request->skill_percentage;
    
        $skill->save();
        return redirect()->route('skill')->with('success', 'A New Skill is Added!');

    }



    
    public function skill_status($id)
    {
        $skill= Skill::where('id', $id)->first();
       
        if($skill->status == 0)
        {
            $skill->status = 1;
            $skill->update();
            
            return redirect()->route('skill')->with('success', 'Skill is Activated!');
        }

        elseif($skill->status == 1)
        {
            $skill->status = 0;
            $skill->update();
            
            return redirect()->route('skill')->with('success', 'Skill is Deactivated!');
        }
    }

    
    public function skill_update($id)
    {
        $skill = Skill::where('id',$id)->first();
        return view('backEnd.frontEnd-master.skill.skill_update',compact('skill'));
    } 


        
    public function skill_update_post(Request $request, $id)
    {
        
        $request->validate([
            'skill_title' => 'required|string|max:255',
            'skill_percent' => 'required|integer',
        ]);

        $skill = Skill::where('id',$id)->first();
        $skill->title = $request->skill_title;
        $skill->percent = $request->skill_percent;
        $skill->update();
        return redirect()->route('skill')->with('success', 'A Skill is Updated!');


    } 


    public function delete_update($id)
    {
        
        $skill = Skill::where('id',$id)->first();
        $skill->delete();
        return redirect()->route('skill')->with('success', 'Skill is Deleted!');
    }



}
