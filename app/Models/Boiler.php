<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Boiler extends Model
{
    public static function BoilerProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'boilerprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );
        return $response->json();

    }
    public static function ProjeDetay($id="",$request)
    {
        $boiler_proje_id =htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $response = Http::withToken($request->session()->get('token'))->post($api_url.'boilerprojelistele',
            [
               "kullanici_id"=>$request->session()->get("id"),
               "id"=>$boiler_proje_id

            ]
        );

        $response = $response->json();

        

        $api_response_Data = Http::withToken($request->session()->get('token'))->post($api_url.'boilerDetail',
        [
            'id'=>$response["data"][0]["Boiler_id"],
            "FuelType"=>$response["data"][0]["FuelType"],
            "DistributionPipe"=>$response["data"][0]["DistributionPipe"],
            "HeatNeed"=>$response["data"][0]["HeatNeed"],
            "Piece"=>$response["data"][0]["Piece"]
        ]);
        
        $result = json_decode($api_response_Data, TRUE);

        
        
      
        $result[] = ['adi' =>$response["data"][0]["adi"], 'aciklama' =>$response["data"][0]["aciklama"],"id"=>$response["data"][0]["id"]];
        return $result;
    }
    public static function BoilerHesapla($data=[])
    {
        
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $limtidegeri = 5;
        $result = array_merge($req_data["brand"]);
     
        //dd( $result);
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'boiler',
            [
                "FuelType"=>$req_data["fueltype"],
                "DistributionPipe"=>$req_data["distributionpipe"],
                "HeatNeed"=>$req_data["heatneed"],
                "Piece"=>$req_data["piece"],
                "KK"=>$req_data["kk"],
                "yedek"=>$req_data["yedek"],
                "markalar"=>$result,
                "limit"=>$limtidegeri,
            ]
        );

        return $response->json();

    }
    
    public static function BoilerHesapKaydet($update,$id,$data=[])
    {
        
            $req_data = $data->session()->get('boilerhesap');
            $boiler = $data["boiler"];
            $kullanici_id = $data->session()->get("id");
            $api_url = env('APP_API_URL');
            $proje_id=$data->session()->get("proje_id");
            //update
            if($update==1 && isset($id))
            {

               
            
            

           
    
                //ekleme
            }else{

               //dd($req_data[0]["data"]["markalar"][0]);
                $response = Http::withToken($data->session()->get('token'))->post($api_url.'boilerSave',
                    [

                        'kullanici_id'=>$kullanici_id,
                        "adi"=>$req_data[0]["data"]["adi"],
                        "aciklama"=>$req_data[0]["data"]["aciklama"],
                        "FuelType"=>$req_data[0]["data"]["FuelType"],
                        "DistributionPipe"=>$req_data[0]["data"]["DistributionPipe"],
                        "HeatNeed"=>$req_data[0]["data"]["HeatNeed"],
                        "Piece"=>$req_data[0]["data"]["Piece"],
                        "BoilerUnitAvgHeat"=>$req_data[0]["data"]["BoilerUnitAvgHeat"],
                        "BoilerIncreaseFactor"=>$req_data[0]["data"]["BoilerIncreaseFactor"],
                        "BoilerCapacity"=>$req_data[0]["data"]["BoilerCapacity"],
                        "HeatingSurface"=>$req_data[0]["data"]["HeatingSurface"],
                        "Boiler_id"=>$boiler,
                        "proje_id"=>$proje_id,

                    ]
                );
                
                return $response->json();
    
            }

    }

    public static function BoilerProjectSil($id,$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'boilerprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
    public static function BoilerProjectDetay($data=[])
    {
        
        $boiler_proje_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'boilerprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),
               "id"=>$boiler_proje_id

            ]
        );
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'boilerDetail',
        [
            'id'=>$response["data"][0]["Boiler_id"],
            "FuelType"=>$response["data"][0]["FuelType"],
            "DistributionPipe"=>$response["data"][0]["DistributionPipe"],
            "HeatNeed"=>$response["data"][0]["HeatNeed"],
            "Piece"=>$response["data"][0]["Piece"]
        ]);

        $result = json_decode($api_response_Data, TRUE);
        $result[] = ['adi' =>$response["data"][0]["adi"], 'aciklama' =>$response["data"][0]["aciklama"],"id"=>$response["data"][0]["id"]];
        return $result;



    }

}
