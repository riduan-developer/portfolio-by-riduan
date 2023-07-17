<?php

namespace App\Http\Controllers\Admin\FrontMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\FrontMaster\Portfolio;

class PortfolioController extends Controller
{   

    public function index(){

        $portfolios = Portfolio::all();
        return view('backEnd.frontEnd-master.portfolio.portfolio',compact('portfolios'));
    }

    
    public function add_potfolio(Request $request)
    {

        $request->validate([
            'portfolio_photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'category' => 'required|string|max:55',
        ]);

        $ext = $request->file('portfolio_photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('portfolio_photo')->move(public_path('uploads/frontEnd/portfolio/'),$final_name);

            
        $hero_obj  = new Portfolio();
        $hero_obj->p_photo  = $final_name;
        $hero_obj->category = $request->category;

        $hero_obj->save();
        return redirect()->route('portfolio')->with('success', 'A New Portfolio is Added!');
    }


    public function portfolio_status($id){

        $portfolio_status= Portfolio::where('id', $id)->first();
       
        if($portfolio_status->status == 0)
        {
            $portfolio_status->status = 1;
            $portfolio_status->update();
            
            return redirect()->route('portfolio')->with('success', 'Portfolio is Activated!');
        }

        elseif($portfolio_status->status == 1)
        {
            $portfolio_status->status = 0;
            $portfolio_status->update();
            
            return redirect()->route('portfolio')->with('success', 'Portfolio is Deactivated!');
        }

    }


    

    public function portfolio_update($id)
    {
        $portfolio = Portfolio::where('id',$id)->first();
        return view('backEnd.frontEnd-master.portfolio.portfolio_update',compact('portfolio'));
    } 


    public function portfolio_update_post(Request $request, $id)
    {
        $portfolio = Portfolio::where('id',$id)->first();


        if($request->has('portfolio_photo') != NULL)
        {
            
            $request->validate([
                'portfolio_photo' => 'image|mimes:jpg,jpeg,png,gif',
                'category' => 'required|string|max:55',
            ]);
            $existing_photo_location = public_path('uploads/frontEnd/portfolio/'.$portfolio->p_photo);
            unlink($existing_photo_location);


            $ext = $request->file('portfolio_photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('portfolio_photo')->move(public_path('uploads/frontEnd/portfolio/'),$final_name);
            
            $portfolio->p_photo = $final_name;

        }

        $portfolio->category = $request->category;
        $portfolio->update();
        return redirect()->route('portfolio')->with('success', 'A Portfolio is Updated!');

    } 


    
    public function del_portfolio($id)
    {
        
        $portfolio = Portfolio::where('id',$id)->first();

        
        $existing_photo_location = public_path('uploads/frontEnd/portfolio/'.$portfolio->p_photo);
        unlink($existing_photo_location);


        $portfolio->delete();

        return redirect()->route('portfolio')->with('success', 'A Portfolio is Deleted!');
    }




    public function link_url($project_link){
        echo $project_link;
    }
    

}
