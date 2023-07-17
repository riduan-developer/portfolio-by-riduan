<?php

namespace App\Http\Controllers\Admin\FrontMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontEnd\Hero;

class HeroController extends Controller
{



    
    public function index()
    {
        $hero_datas = Hero::orderBy('id','DESC')->get();
        return view('backEnd.frontEnd-master.hero.hero',compact('hero_datas'));
    }



    public function add_hero(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'title' => 'required|string|max:255',
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/frontEnd/hero/'),$final_name);

            
        $hero_obj = new Hero();
        $hero_obj->photo = $final_name;
        $hero_obj->title = $request->title;

        $hero_obj->save();
        return redirect()->route('hero')->with('success', 'A New Hero is Added!');
    }


    public function hero_update($id)
    {
        $hero_data = Hero::where('id',$id)->first();
        return view('backEnd.frontEnd-master.hero.hero_update',compact('hero_data'));
    } 




    public function hero_update_post(Request $request, $id)
    {
        $request->validate([
            'photo' => 'image|mimes:jpg,jpeg,png,gif',
            'title' => 'required|string|max:255',
        ]);

        $hero_data = Hero::where('id',$id)->first();

        if($request->has('photo'))
        {
            $existing_photo_location = public_path('uploads/frontEnd/hero/'.$hero_data->photo);
            unlink($existing_photo_location);


            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/frontEnd/hero/'),$final_name);
            
            $hero_data->photo = $final_name;

        }


        $hero_data->title = $request->title;
        $hero_data->update();
        return redirect()->route('hero')->with('success', 'A Hero is Updated!');


    } 




    public function hero_delete($id)
    {
        
        $hero_data = Hero::where('id',$id)->first();

        
        $existing_photo_location = public_path('uploads/frontEnd/hero/'.$hero_data->photo);
        unlink($existing_photo_location);


        $hero_data->delete();

        return redirect()->route('hero')->with('success', 'A Hero is Deleted!');
    }



    public function hero_status($id)
    {
        $active_hero_status= Hero::where('status', 1)->first();
        $active_hero_status->id;

        $active_hero = Hero::where('id', $active_hero_status->id)->first();
        $hero_data = Hero::where('id',$id)->first();
       
        if($hero_data->status == 0)
        {
            $hero_data->status = 1;
            $hero_data->update();
            
            $active_hero->status = 0;
            $active_hero->update();
            return redirect()->route('hero')->with('success', 'Hero is Activated!');
        }

        elseif($hero_data->status == 1)
        {
            return redirect()->route('hero')->with('success', 'Hero is Already Active!');
        }
    }





}
