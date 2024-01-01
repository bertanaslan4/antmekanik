<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Hydrophore extends Model
{
    public static function hydrophoreProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'hydrophoreprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'hydrophoreprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function hydrophoreHesap($data=[]){
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $limtidegeri = 5;
        $result = array_merge($req_data["brand"]);
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'/hydrophore',
                [
                    "BuildType"=>$req_data["BuildType"],
                    "NumberOfPeople"=>$req_data["NumberOfPeople"],
                    "StoredTime"=>$req_data["StoredTime"],
                    "Piece"=>!empty($req_data["Piece"]) ? $req_data["Piece"] : null,
                    "PipePressureLoss"=>$req_data["PipePressureLoss"],
                    "OtherLosses"=>$req_data["OtherLosses"],
                    "UsingConcurrentFactor"=>!empty($req_data["UsingConcurrentFactor"]) ? $req_data["UsingConcurrentFactor"] : null,
                    "HydrophoreFactor"=>!empty($req_data["HydrophoreFactor"]) ? $req_data["HydrophoreFactor"] : null,
                    "markalar"=>$result,
                    "limit"=>$limtidegeri,
                ]
        );
        return $response->json();
    }
    public static function hydrophoreHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('hydrophorehesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
        if($update==1 && isset($id))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'hydrophoreupdate',
            [
                'id'=>$id,
                'kullanici_id'=>$kullanici_id,
                "BuildType"=>$req_data[0]["data"]["BuildType"],
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "NumberOfPeople"=>$req_data[0]["data"]["NumberOfPeople"],
                "StoredTime"=>$req_data[0]["data"]["StoredTime"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "PipePressureLoss"=>$req_data[0]["data"]["PipePressureLoss"],
                "OtherLosses"=>$req_data[0]["data"]["OtherLosses"],
                "UsingConcurrentFactor"=>$req_data[0]["data"]["UsingConcurrentFactor"],
                "HydrophoreFactor"=>$req_data[0]["data"]["HydrophoreFactor"],
                "DailyWaterConsumption"=>$req_data[0]["data"]["DailyWaterConsumption"],
                "SuddenNeed"=>$req_data[0]["data"]["SuddenNeed"],
                "TankVolume"=>$req_data[0]["data"]["TankVolume"],
                "HydrophoreFlow"=>$req_data[0]["data"]["HydrophoreFlow"],
                "TotalLoss"=>$req_data[0]["data"]["TotalLoss"],
            ]
        );
        
        return $response->json();
            


        }else{
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'hydrophoreSave',
            [
                'kullanici_id'=>$kullanici_id,
                "BuildType"=>$req_data[0]["data"]["BuildType"],
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "NumberOfPeople"=>$req_data[0]["data"]["NumberOfPeople"],
                "StoredTime"=>$req_data[0]["data"]["StoredTime"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "PipePressureLoss"=>$req_data[0]["data"]["PipePressureLoss"],
                "OtherLosses"=>$req_data[0]["data"]["OtherLosses"],
                "UsingConcurrentFactor"=>$req_data[0]["data"]["UsingConcurrentFactor"],
                "HydrophoreFactor"=>$req_data[0]["data"]["HydrophoreFactor"],
                "DailyWaterConsumption"=>$req_data[0]["data"]["DailyWaterConsumption"],
                "SuddenNeed"=>$req_data[0]["data"]["SuddenNeed"],
                "TankVolume"=>$req_data[0]["data"]["TankVolume"],
                "HydrophoreFlow"=>$req_data[0]["data"]["HydrophoreFlow"],
                "TotalLoss"=>$req_data[0]["data"]["TotalLoss"],
                "hydrophorep_id"=>$data["hydrophore"],
            ]
        );
        
        return $response->json();
    }
    }
    public static function hydrophoreProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'hydrophoreprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
    public static function hydrophoreProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'hydrophoreprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
}
