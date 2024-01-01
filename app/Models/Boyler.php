<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Boyler extends Model
{
    public static function boylerProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'boylerprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'boylerprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function BoylerHesap($data=[])
    {

        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $equiments=[];
        $limtidegeri = 5;
        $result = array_merge($req_data["brand"]);

        $devices=[];


        foreach ($req_data["Equipment_piece"] as $key => $value) {
            array_push($devices, array($value));

        }

        

        
        for ($i=0; $i <count($req_data["Equipment"]);$i++) { 
            
            array_push($equiments, array("Name"=>$req_data["Equipment"][$i],"Piece"=>$devices[$i][0]));
        }

       
       

        

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'boyler',
                [
                    "BuildType"=>$req_data["BuildType"],
                    "Equipments"=>$equiments,
                    "PrepareTime"=>$req_data["PrepareTime"],
                    "SpecificHeat"=>$req_data["SpecificHeat"],
                    "Density"=>$req_data["Density"],
                    "BoylerTempIn"=>$req_data["BoylerTempIn"],
                    "BoylerTempOut"=>$req_data["BoylerTempOut"],
                    "Piece"=>$req_data["piece"],
                    "markalar"=>$result,
                    "limit"=>$limtidegeri,
                ]
        );
        
        return $response->json();
    }

    public static function BoylerHesapKaydet($update,$id,$data=[])
    {
        $req_data = $data->session()->get('boylerhesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
        $proje_id = $data->session()->get("proje_id");

      
        if($update==1 && isset($id))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'boylerupdate',
            [    'id'=>$id,
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "BuildType"=>$req_data[0]["data"]["BuildType"],
                "PrepareTime"=>$req_data[0]["data"]["PrepareTime"],
                "SpecificHeat"=>$req_data[0]["data"]["SpecificHeat"],
                "Density"=>$req_data[0]["data"]["Density"],
                "SelectedVolume"=>$req_data[0]["data"]["SelectedVolume"],
                "TemperatureDiff"=>$req_data[0]["data"]["TemperatureDiff"],
                "HeatingLoad"=>$req_data[0]["data"]["HeatingLoad"],
                "BoylerTempIn"=>$req_data[0]["data"]["BoylerTempIn"],
                "BoylerTempOut"=>$req_data[0]["data"]["BoylerTempOut"],
                "TempIn"=>$req_data[0]["data"]["TempIn"],
                "TempOut"=>$req_data[0]["data"]["TempOut"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "StorageFactor"=>$req_data[0]["data"]["StorageFactor"],
                "UserFactor"=>$req_data[0]["data"]["UserFactor"],
                "WaterConsumption"=>$req_data[0]["data"]["WaterConsumption"],
                "AvgWaterConsumption"=>$req_data[0]["data"]["AvgWaterConsumption"],
                "BoylerCapacity"=>$req_data[0]["data"]["BoylerCapacity"],
                'proje_id'=>$proje_id,
            ]
        );
        return $response->json();
            
        }else{


            $equ_data = $req_data[0]["data"]["Equipments"];
            
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'boylerSave',
            [
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "BuildType"=>$req_data[0]["data"]["BuildType"],
                "Equipment"=>$equ_data,
                "PrepareTime"=>$req_data[0]["data"]["PrepareTime"],
                "SpecificHeat"=>$req_data[0]["data"]["SpecificHeat"],
                "Density"=>$req_data[0]["data"]["Density"],
                "SelectedVolume"=>$req_data[0]["data"]["SelectedVolume"],
                "TemperatureDiff"=>$req_data[0]["data"]["TemperatureDiff"],
                "HeatingLoad"=>$req_data[0]["data"]["HeatingLoad"],
                "BoylerTempIn"=>$req_data[0]["data"]["BoylerTempIn"],
                "BoylerTempOut"=>$req_data[0]["data"]["BoylerTempOut"],
                "TempIn"=>$req_data[0]["data"]["TempIn"],
                "TempOut"=>$req_data[0]["data"]["TempOut"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "StorageFactor"=>$req_data[0]["data"]["StorageFactor"],
                "UserFactor"=>$req_data[0]["data"]["UserFactor"],
                "WaterConsumption"=>$req_data[0]["data"]["WaterConsumption"],
                "AvgWaterConsumption"=>$req_data[0]["data"]["AvgWaterConsumption"],
                "BoylerCapacity"=>$req_data[0]["data"]["BoylerCapacity"],
                "boyler_id"=>$data["Boyler"],
                'proje_id'=>$proje_id,
            ]
        );
        return $response->json();
    }
    }



    public static function BoylerProjectDetay($data=[])
    {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'boylerprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);
          
        return $api_response_Data->json();
    }
    public static function BoylerProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'boylerprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
}
