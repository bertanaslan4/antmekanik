<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Paddlebox extends Model
{
    public static function paddleboxProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'paddleboxprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'paddleboxprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    //paddlebox

    public static function paddleboxHesap($data=[]){
        $req_data = $data->all();

        
       
        $api_url = env('APP_API_URL');
        $equiments=[];
        $devices=[];


        foreach ($req_data["Devicespiece"] as $key => $value) {
            array_push($devices, array($value));

        }

        

        
        for ($i=0; $i <count($req_data["DevicesName"]);$i++) { 
            
            array_push($equiments, array("Name"=>$req_data["DevicesName"][$i],"Piece"=>$devices[$i][0]));
        }

       
       


        /*foreach ($req_data["DevicesName"] as $key => $value) {
            array_push($equiments, array("Name"=>$value,"Piece"=>$req_data["Devicespiece"]));
        }*/

        


        

        //dd($equiments);
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'/paddlebox',
                [
                    "KitchenType"=>$req_data["KitchenType"],
                    "KitchenDensity"=>$req_data["KitchenDensity"],
                    "KitchenArea"=>$req_data["KitchenArea"],
                    "KitchenHeight"=>$req_data["KitchenHeight"],
                    "PaddleboxWidth"=>$req_data["PaddleboxWidth"],
                    "PaddleboxHeight"=>$req_data["PaddleboxHeight"],
                    "HeatSourceDistance"=>$req_data["HeatSourceDistance"],
                    "OverflowAirFactor"=>$req_data["OverflowAirFactor"],
                    "ReductionFactorPos"=>$req_data["ReductionFactorPos"],
                    "Piece"=>$req_data["Piece"],
                    "Devices"=>$equiments,
                ]
        );
        return $response->json();
    }
    public static function paddleboxHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('paddleboxhesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
        
        
        if($update==1 && isset($id))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'paddleboxupdate',
            [
                "id"=>$id,
                "kullanici_id"=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "KitchenType"=>$req_data[0]["data"]["KitchenType"],
                "KitchenDensity"=>$req_data[0]["data"]["KitchenDensity"],
                "KitchenArea"=>$req_data[0]["data"]["KitchenArea"],
                "KitchenHeight"=>$req_data[0]["data"]["KitchenHeight"],
                "PaddleboxWidth"=>$req_data[0]["data"]["PaddleboxWidth"],
                "PaddleboxHeight"=>$req_data[0]["data"]["PaddleboxHeight"],
                "HeatSourceDistance"=>$req_data[0]["data"]["HeatSourceDistance"],
                "OverflowAirFactor"=>$req_data[0]["data"]["OverflowAirFactor"],
                "ReductionFactorPos"=>$req_data[0]["data"]["ReductionFactorPos"],
                "ReductionFactor"=>$req_data[0]["data"]["ReductionFactor"],
                "ConcurrencyFactor"=>$req_data[0]["data"]["ConcurrencyFactor"],
                "TotalVapor"=>$req_data[0]["data"]["TotalVapor"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "SensibleHeatConvective"=>$req_data[0]["data"]["SensibleHeatConvective"],
                "ThermalAirFlow"=>$req_data[0]["data"]["ThermalAirFlow"],
                "AirFlow"=>$req_data[0]["data"]["AirFlow"],
                "Devices"=>$req_data[0]["data"]["Devices"]
                
            ]
        );
        return $response->json();
         
              
        }else{

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'paddleboxSave',
            [
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "KitchenType"=>$req_data[0]["data"]["KitchenType"],
                "KitchenDensity"=>$req_data[0]["data"]["KitchenDensity"],
                "KitchenArea"=>$req_data[0]["data"]["KitchenArea"],
                "KitchenHeight"=>$req_data[0]["data"]["KitchenHeight"],
                "PaddleboxWidth"=>$req_data[0]["data"]["PaddleboxWidth"],
                "PaddleboxHeight"=>$req_data[0]["data"]["PaddleboxHeight"],
                "HeatSourceDistance"=>$req_data[0]["data"]["HeatSourceDistance"],
                "OverflowAirFactor"=>$req_data[0]["data"]["OverflowAirFactor"],
                "ReductionFactorPos"=>$req_data[0]["data"]["ReductionFactorPos"],
                "ReductionFactor"=>$req_data[0]["data"]["ReductionFactor"],
                "ConcurrencyFactor"=>$req_data[0]["data"]["ConcurrencyFactor"],
                "TotalVapor"=>$req_data[0]["data"]["TotalVapor"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "SensibleHeatConvective"=>$req_data[0]["data"]["SensibleHeatConvective"],
                "ThermalAirFlow"=>$req_data[0]["data"]["ThermalAirFlow"],
                "AirFlow"=>$req_data[0]["data"]["AirFlow"],
                "Devices"=>$req_data[0]["data"]["Devices"]
            ]
        );
        return $response->json();
    }
    }

    public static function paddleboxProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'paddleboxprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function paddleboxProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'paddleboxprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
}
