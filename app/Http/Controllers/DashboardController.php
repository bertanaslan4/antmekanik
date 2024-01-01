<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dashboard;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $veri = Dashboard::istatistikget($request);
       
       $veri["proje"]["id"]=$request->session()->get("proje_id");
       $veri["proje"]["adi"]=$request->session()->get("proje_adi");
      
        $result = $veri;
        //echo __('staticmessage.welcome'); die();
        return view('dashboard',compact('result'));
    }

}
