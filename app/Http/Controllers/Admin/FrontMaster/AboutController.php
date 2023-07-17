<?php

namespace App\Http\Controllers\Admin\FrontMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontEnd\About;




class AboutController extends Controller
{
    public function index()
    {
        $abt_datas = About::orderBy('id','DESC')->get();
        return view('backEnd.frontEnd-master.about.about',compact('abt_datas'));
    }


    public function add_about(Request $request)
    {
        
        $request->validate([
            'photo' => 'image|mimes:jpg,jpeg,png,gif',
            'about_field' => 'required|string|max:255',
            'about_value' => 'nullable|string',
        ]);
        
        $abt_data = new About;
        if($request->file('photo'))
        {
            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/frontEnd/about/'),$final_name);

            $abt_data->about_value = $final_name;
        }
        elseif($request->has('about_value'))
        {
            $abt_data->about_value = $request->about_value;
        }

        $abt_data->about_field = strtoupper($request->about_field);
        $abt_data->save();
        return redirect()->route('about')->with('success', 'A New About is Added!');

    }



    public function about_update($id)
    {
        $abt_data = About::where('id',$id)->first();
        return view('backEnd.frontEnd-master.about.about_update',compact('abt_data'));
    } 



    public function about_update_post(Request $request, $id)
    {
        
        $request->validate([
            'photo' => 'image|mimes:jpg,jpeg,png,gif',
            'about_field' => 'required|string|max:255',
            'about_value' => 'nullable|string',
        ]);

        $abt_data = About::where('id',$id)->first();

        if($request->file('photo'))
        {
            $existing_photo_location = public_path('uploads/frontEnd/about/'.$abt_data->about_value);
            unlink($existing_photo_location);


            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/frontEnd/about/'),$final_name);
            
            $abt_data->about_value = $final_name;

        }
        else{
            $abt_data->about_value = $request->about_value;
        }


        $abt_data->about_field = $request->about_field;
        $abt_data->update();
        return redirect()->route('about')->with('success', 'A About Field is Updated!');


    } 



    public function about_status($id)
    {
        $abt_status= About::where('id', $id)->first();
       
        if($abt_status->status == 0)
        {
            $abt_status->status = 1;
            $abt_status->update();
            
            return redirect()->route('about')->with('success', 'Hero is Activated!');
        }

        elseif($abt_status->status == 1)
        {
            $abt_status->status = 0;
            $abt_status->update();
            
            return redirect()->route('about')->with('success', 'Hero is Already Active!');
        }
    }




    public function about_delete($id)
    {
        
        $abt_data = About::where('id',$id)->first();

        
        if(strtoupper($abt_data->about_field) == "PHOTO")
        {
            $existing_photo_location = public_path('uploads/frontEnd/about/'.$abt_data->about_value);
            unlink($existing_photo_location);
        }


        $abt_data->delete();

        return redirect()->route('about')->with('success', 'About Field is Deleted!');
    }








}
