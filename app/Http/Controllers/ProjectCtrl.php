<?php

namespace App\Http\Controllers;


use App\Models\Projeler;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



class ProjectCtrl extends Controller
{
    
    public function index()
    {
       
        //echo __('staticmessage.welcome'); die();
        return view('proje');
    }

    public function kaydet(Request $request)
    
    {

        try {
            $messages = [
                'pno.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
            ];
            $validator = Validator::make($request->all(), [
                'pno' => 'required',
            ], $messages);
            if ($validator->fails()) {
                $request->session()->flash('status', 'proje');
                toast('Lütfen Proje No seçimi yapınız','warning');
                return redirect()->back();
            } 
            
            $response = Projeler::ProjeKaydet($request);
        //$request->session()->push('proje',$rp);
            
            
           // if($response["data"])
            //{
               /* if ($request->session()->has('boilerhesap')) {
                    $request->session()->forget('boilerhesap');
                }*/
                $request->session()->flash('status', 'proje');
                toast('Projeniz kaydedilmiştir','success');
                return redirect()->back();
           /* }else{
                toast('Hata oluştuuu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            } */
        } catch (\Throwable $th) {
            dd($th);
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }
        
    }
    public function update(Request $request){
        try {
            $messages = [
                'pno.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
            ];
            $validator = Validator::make($request->all(), [
                'pno' => 'required',
            ], $messages);
            if ($validator->fails()) {
                $request->session()->flash('status', 'proje');
                toast('Lütfen Proje No seçimi yapınız','warning');
                return redirect()->back();
            } 
            
            $response = Projeler::ProjeUpdate($request);
        //$request->session()->push('proje',$rp);
            
            
           if($response==1)
            {
               /* if ($request->session()->has('boilerhesap')) {
                    $request->session()->forget('boilerhesap');
                }*/
             
                toast('Projeniz Güncellenmiştir','success');
                return redirect()->route('admin.dashboard');
           }else{
                toast('Hata oluştuuu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            } 
        } catch (\Throwable $th) {
            dd($th);
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }
    }


}
