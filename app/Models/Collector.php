<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Collector extends Model
{
    public static function collectorProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'collectorprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'collectorprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    //collector

    public static function collectorHesap($data=[]){
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'collector',
                [
                    "WaterRegime"=>$req_data["WaterRegime"],
                    "CollectorCapacity"=>$req_data["CollectorCapacity"],
                    "TempratureAvg"=>$req_data["TempratureAvg"],
                    "TransferorWater"=>$req_data["TransferorWater"],
                    "SpecificHeat"=>$req_data["SpecificHeat"],
                    "Density"=>$req_data["Density"],
                ]
        );
        return $response->json();
    }
    public static function collectorHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('collectorhesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
           //dd($req_data);
        $proje_id=$data->session()->get("proje_id");
        if($update==1 && isset($id))
        {

            $response = Http::withToken($data->session()->get('token'))->post($api_url.'collectorupdate',
            [   'id'=>$id,
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "WaterRegime"=>$req_data[0]["data"]["WaterRegime"],
                "CollectorCapacity"=>$req_data[0]["data"]["CollectorCapacity"],
                "TempratureAvg"=>$req_data[0]["data"]["TempratureAvg"],
                "TransferorWater"=>$req_data[0]["data"]["TransferorWater"],
                "SpecificHeat"=>$req_data[0]["data"]["SpecificHeat"],
                "Density"=>$req_data[0]["data"]["Density"],
                "UsingConcurrentFactor"=>$req_data[0]["data"]["UsingConcurrentFactor"],
                "HydrophoreFactor"=>$req_data[0]["data"]["HydrophoreFactor"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "WaterSpeed"=>$req_data[0]["data"]["WaterSpeed"],
                "CollectorFlow"=>$req_data[0]["data"]["CollectorFlow"],
                "CollectorDiameter"=>$req_data[0]["data"]["CollectorDiameter"],
                "CollectorInch"=>$req_data[0]["data"]["CollectorInch"],
                "proje_id"=>$proje_id,
            ]
        );
        return $response->json();


        }else{
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'collectorSave',
            [
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "WaterRegime"=>$req_data[0]["data"]["WaterRegime"],
                "CollectorCapacity"=>$req_data[0]["data"]["CollectorCapacity"],
                "TempratureAvg"=>$req_data[0]["data"]["TempratureAvg"],
                "TransferorWater"=>$req_data[0]["data"]["TransferorWater"],
                "SpecificHeat"=>$req_data[0]["data"]["SpecificHeat"],
                "Density"=>$req_data[0]["data"]["Density"],
                "UsingConcurrentFactor"=>$req_data[0]["data"]["UsingConcurrentFactor"],
                "HydrophoreFactor"=>$req_data[0]["data"]["HydrophoreFactor"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "WaterSpeed"=>$req_data[0]["data"]["WaterSpeed"],
                "CollectorFlow"=>$req_data[0]["data"]["CollectorFlow"],
                "CollectorDiameter"=>$req_data[0]["data"]["CollectorDiameter"],
                "CollectorInch"=>$req_data[0]["data"]["CollectorInch"],
                "proje_id"=>$proje_id,
            ]
        );
        return $response->json();
    }
    }
    public static function collectorProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'collectorprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function collectorProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'collectorprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
}
