<?php

namespace App\Http\Controllers\Admin\FrontMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontEnd\Resume;
use Carbon\Carbon;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::all();
        return view('backEnd.frontEnd-master.resume.resume',compact('resumes'));
    }

        
    public function add_resume(Request $request)
    {
       

        $request->validate([
            'header' => 'required|string|max:150',
            'title' => 'required|string|max:150',
            'institution' => 'nullable|string|max:150',
            'date_from' => 'required|date',
            'description' => 'nullable|string',
        ]);
        
        $resume = new Resume;
        
        
        $resume->header = $request->header;
        $resume->title = $request->title;
        $resume->institution = $request->institution;    
        $resume->date_from = $request->date_from;
        $resume->description = $request->description;

        if($request->has('date_to_current')){
            $resume->date_to_current = 1;
        }elseif($request->has('date_to')){
            $resume->date_to = $request->date_to;
        }


        $resume->save();
        return redirect()->route('resume')->with('success', 'A New Resume is Added!');

    }



    public function resume_status($id)
    {
        $resume = Resume::where('id', $id)->first();
       
        if($resume->status == 0)
        {
            $resume->status = 1;
            $resume->update();
            
            return redirect()->route('resume')->with('success', 'resume is Activated!');
        }

        elseif($resume->status == 1)
        {
            $resume->status = 0;
            $resume->update();
            
            return redirect()->route('resume')->with('success', 'resume is Deactivateds!');
        }
    }


    
    public function resume_update($id)
    {
        $resume = Resume::where('id',$id)->first();
        return view('backEnd.frontEnd-master.resume.resume_update',compact('resume'));
    } 


        
    public function resume_update_post(Request $request, $id)
    {
        
        
        $request->validate([
            'header' => 'required|string|max:150',
            'title' => 'required|string|max:150',
            'institution' => 'nullable|string|max:150',
            'date_from' => 'required|date',
            'description' => 'nullable|string',
        ]);
        

        $resume = Resume::where('id',$id)->first();
               
        $resume->header = $request->header;
        $resume->title = $request->title;
        $resume->institution = $request->institution;    
        $resume->date_from = $request->date_from;
        $resume->description = $request->description;

        if($request->has('date_to_current')){
            $resume->date_to_current = 1;
        }elseif($request->has('date_to')){
            $resume->date_to = $request->date_to;
        }


        $resume->update();
        return redirect()->route('resume')->with('success', 'A resume is Updated!');


    } 


    public function resume_delete($id)
    {
        
        $resume = Resume::where('id',$id)->first();
        $resume->delete();
        return redirect()->route('resume')->with('success', 'Resume is Deleted!');
    }










}
