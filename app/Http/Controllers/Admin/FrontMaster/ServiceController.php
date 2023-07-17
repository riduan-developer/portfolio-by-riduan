<?php

namespace App\Http\Controllers\Admin\FrontMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontEnd\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $service_data = Service::where('status',1)->get();
        return view('backEnd.frontEnd-master.service.service',compact('service_data'));
    }


    
    public function add_service(Request $request)
    {
       
        $request->validate([
            'service_title' => 'required|string|max:255',
            'service_icon' => 'required|string',
            'service_text' => 'nullable|string',
        ]);
        
        $service_data = new Service;
        
        
        $service_data->service_title = $request->service_title;
        $service_data->service_icon = $request->service_icon;
        $service_data->service_text = $request->service_text;
    

        $service_data->save();
        return redirect()->route('service')->with('success', 'A New Service is Added!');

    }

    
    public function service_status($id)
    {
        $service_status= Service::where('id', $id)->first();
       
        if($service_status->status == 0)
        {
            $service_status->status = 1;
            $service_status->update();
            
            return redirect()->route('service')->with('success', 'service is Activated!');
        }

        elseif($service_status->status == 1)
        {
            $service_status->status = 0;
            $service_status->update();
            
            return redirect()->route('service')->with('success', 'service is Already Active!');
        }
    }


    public function service_delete($id)
    {
        
        $service = Service::where('id',$id)->first();
        $service->delete();
        return redirect()->route('service')->with('success', 'Service is Deleted!');
    }



    public function service_update($id)
    {
        $service = Service::where('id',$id)->first();
        return view('backEnd.frontEnd-master.service.service_update',compact('service'));
    } 

    
    public function service_update_post(Request $request, $id)
    {
        
        $request->validate([
            'service_title' => 'required|string|max:255',
            'service_icon' => 'required|string',
            'service_text' => 'nullable|string',
        ]);

        $service = Service::where('id',$id)->first();
        $service->service_title = $request->service_title;
        $service->service_icon = $request->service_icon;
        $service->service_text = $request->service_text;

        $service->update();
        return redirect()->route('service')->with('success', 'A Service is Updated!');


    } 










    
}
