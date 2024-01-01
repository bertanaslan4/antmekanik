<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
class Projeler extends Model
{
   
    public static function ProjeKaydet($data=[])
    {  
           
                $response=DB::table('Projeler')->insert([
                        'kullanici_id'=>$data->session()->get("id"),
                        "proje_no"=>$data["pno"],
                        "proje_revizyon"=>$data["prev"],
                        "proje_adi"=>$data["adi"],
                        "proje_konu"=>$data["konu"],
                        "proje_hesap"=>$data["hesap"],
                        "proje_kontrol"=>$data["kontrol"],
                        
                        
                    ],
        ); 
                return $response;
    
            

    }
    public static function projelerliste($data=[]){
        $kullanici_id=$data->session()->get("id");
        $sql = DB::table('Projeler')->where('kullanici_id',$kullanici_id);
        
        $response= $sql->get()->toArray();
       
      
        return $response;
    }
    public static function ProjeUpdate($data=[]){

        $result =DB::table('Projeler')
            ->where('id',$data['id'])
           
            ->update(array(
                "proje_no"=>$data["pno"],
                        "proje_revizyon"=>$data["prev"],
                        "proje_adi"=>$data["adi"],
                        "proje_konu"=>$data["konu"],
                        "proje_hesap"=>$data["hesap"],
                        "proje_kontrol"=>$data["kontrol"],
            ));
        return $result;
    }
}
