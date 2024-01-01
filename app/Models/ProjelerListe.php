<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
class ProjelerListe extends Model
{
   
    
    public static function projelerliste($id){
       
        $sql = DB::table('Projeler')->where('id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function boilerlist($id)
    {
        $sql = DB::table('api__boilerproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_boiler($data=[]){
        $id=$data->session()->get("proje_id");
        $sql = DB::table('api__boilerproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_heatexchanger($data=[]){
        $id=$data->session()->get("proje_id");
        $sql = DB::table('api__heatexchangerproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_fuelamount($data=[]){
        $id=$data->session()->get("proje_id");
        $sql = DB::table('api__fuelamountproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_fuelamountyearly($data=[]){
        $id=$data->session()->get("proje_id");
        $sql = DB::table('api__fuelamountyearlyproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_openexpansion($data=[]){
        $id=$data->session()->get("proje_id");
        $sql = DB::table('api__openexpansionproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_closeexpansion($data=[]){
        $id=$data->session()->get("proje_id");
        $sql = DB::table('api__closeexpansionproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_circulationpump($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__circulationpumpproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_boyler($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__boylerproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_rainwater($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__rainwaterproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_hydrophore($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__hydrophoreproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_collector($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__collectorproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_solarenergy($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__solarenergyproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_paddle($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__paddleboxproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_pool($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__poolproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_coldstorage($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__coldstorageproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_pipeinsulation($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__pipeinsulationproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_parking($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__parkingventilationproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_shelter($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__shelterventilationproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function project_pipepressure($data=[]){
         $id=$data->session()->get("proje_id");
        $sql = DB::table('api__pipeproject')->where('proje_id',$id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function sonProje($id){
        
        $sql = DB::table('Projeler')->where('kullanici_id',$id)->orderBy('proje_tarih', 'DESC');
        
        $response= $sql->get()->toArray();
       
     
        return $response;

    }

}
