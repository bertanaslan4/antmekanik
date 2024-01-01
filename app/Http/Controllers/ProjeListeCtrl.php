<?php

namespace App\Http\Controllers;


use App\Models\Projeler;
use App\Models\ProjelerListe;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class ProjeListeCtrl extends Controller
{
    
    public function index()
    {
       
        //echo __('staticmessage.welcome'); die();
        //return view('projeliste');
        
    }
    public function projelistesi($id="",Request $request)
    {
        try {
            if(empty($id))
            {
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
                return redirect()->back();

            }else{
                $projeler["data"] = ProjelerListe::projelerliste($id);
                $projeler["boiler"] = ProjelerListe::boilerlist($id);
                //$proje = Boiler::ProjeDetay($id,$request);
                //dd("Sistem Kontrolü Yapılmaktadır");
                 //dd($projeler);
                //$projedetay["data"]["boiler_id"] = $id;
                //return redirect()->route('admin.dashboard');
                
                
              
                
                return view('projeliste',compact('projeler'));
            }
            
            
        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        
    }
    public function projegec($id){
        $data=ProjelerListe::projelerliste($id);
        session(
                    [
                        
                        'proje_id'=>$id,
                        'proje_adi'=>$data[0]->proje_adi,
                    ]
                );
                $mesaj_name=$data[0]->proje_adi;
                $mesaj = $mesaj_name.' adlı projeye geçtiniz!';
              toast($mesaj,'success');
              return redirect()->route('admin.dashboard');
    }
   

    


}
