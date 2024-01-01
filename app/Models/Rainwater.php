<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Rainwater extends Model
{
    public static function rainwaterProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'rainwaterprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'rainwaterprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function RainwaterHesap($data=[]){
        $req_data = $data->all();
        $api_url =env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'rain-water',
                [
                    "Location"=>$req_data["Location"],
                    "RainArea"=>$req_data["RainArea"],
                    "RoofType"=>$req_data["RoofType"],
                    "RainPipe"=>$req_data["RainPipe"],
                ]
        );
        return $response->json();
    }
    public static function RainWaterHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('rainwaterhesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
        $proje_id=$data->session()->get("proje_id");
        if($update==1 && isset($id))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'rainwaterupdate',
            [    'id'=>$id,
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "Location"=>$req_data[0]["data"]["Location"],
                "RainArea"=>$req_data[0]["data"]["RainArea"],
                "RoofType"=>$req_data[0]["data"]["RoofType"],
                "RainPipe"=>$req_data[0]["data"]["RainPipe"],
                "RainAvg"=>$req_data[0]["data"]["RainAvg"],
                "UnloadFactor"=>$req_data[0]["data"]["UnloadFactor"],
                "SuddenNeed"=>$req_data[0]["data"]["SuddenNeed"],
                "FlowSection"=>$req_data[0]["data"]["FlowSection"],
                "ColumnDiameter"=>$req_data[0]["data"]["ColumnDiameter"],
                "proje_id"=>$proje_id,
            ]
        );
        return $response->json();

        }else{
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'rainwaterSave',
            [
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "Location"=>$req_data[0]["data"]["Location"],
                "RainArea"=>$req_data[0]["data"]["RainArea"],
                "RoofType"=>$req_data[0]["data"]["RoofType"],
                "RainPipe"=>$req_data[0]["data"]["RainPipe"],
                "RainAvg"=>$req_data[0]["data"]["RainAvg"],
                "UnloadFactor"=>$req_data[0]["data"]["UnloadFactor"],
                "SuddenNeed"=>$req_data[0]["data"]["SuddenNeed"],
                "FlowSection"=>$req_data[0]["data"]["FlowSection"],
                "ColumnDiameter"=>$req_data[0]["data"]["ColumnDiameter"],
                "proje_id"=>$proje_id,
            ]
        );
        return $response->json();
    }
    }
    public static function RainwaterProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'rainwaterprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function RainWaterProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'rainwaterprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
}
