<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Circulationpump extends Model
{
    public static function circulationpumpProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'circulationpumpprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'circulationpumpprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function CirculationPumpHesap($data=[])
    {
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $result = array_merge($req_data["brand"]);
        $limtidegeri = 5;
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'circulation-pump',
                [
                    "TemperatureDiff"=>$req_data["TemperatureDiff"],
                    "PressureDrop"=>$req_data["PressureDrop"],
                    "BoilerCapacity"=>$req_data["BoilerCapacityKazan"],
                    "Piece"=>$req_data["piece"],
                    'PumpEfficiency'=>$req_data["PumpEfficiency"],
                    'EngineEfficiency'=>$req_data["EngineEfficiency"],
                    'SpecificHeat'=>$req_data["SpecificHeat"],
                    'Density'=>$req_data["Density"],
                    "markalar"=>$result,
                    "limit"=>$limtidegeri,
                ]
        );
        return $response->json();

    }
    public static function CirculationPumpHesapKaydet($update,$id,$data=[])
    {
        $req_data = $data->session()->get('circulationpumphesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
        $proje_id=$data->session()->get("proje_id");

        if($update==1 && isset($id))
        {

            $response = Http::withToken($data->session()->get('token'))->post($api_url.'circulationpumpupdate',
            [

                'id'=>$id,
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "BoilerCapacity"=>$req_data[0]["data"]["BoilerCapacity"],
                "TemperatureDiff"=>$req_data[0]["data"]["TemperatureDiff"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "PressureDrop"=>$req_data[0]["data"]["PressureDrop"],
                "PumpEfficiency"=>$req_data[0]["data"]["PumpEfficiency"],
                "EngineEfficiency"=>$req_data[0]["data"]["EngineEfficiency"],
                "SpecificHeat"=>$req_data[0]["data"]["SpecificHeat"],
                "Density"=>$req_data[0]["data"]["Density"],
                "PumpFlow"=>$req_data[0]["data"]["PumpFlow"],
                "MotorPower"=>$req_data[0]["data"]["MotorPower"],
            ]
        );
        return $response->json();

        }else{

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'circulationpumpSave',
            [
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "BoilerCapacity"=>$req_data[0]["data"]["BoilerCapacity"],
                "TemperatureDiff"=>$req_data[0]["data"]["TemperatureDiff"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "PressureDrop"=>$req_data[0]["data"]["PressureDrop"],
                "PumpEfficiency"=>$req_data[0]["data"]["PumpEfficiency"],
                "EngineEfficiency"=>$req_data[0]["data"]["EngineEfficiency"],
                "SpecificHeat"=>$req_data[0]["data"]["SpecificHeat"],
                "Density"=>$req_data[0]["data"]["Density"],
                "PumpFlow"=>$req_data[0]["data"]["PumpFlow"],
                "MotorPower"=>$req_data[0]["data"]["MotorPower"],
                "circulation_id"=>$data["circulationpump"],
                "proje_id"=>$proje_id,
            ]
        );
        return $response->json();
    }
    }
    public static function CirculationPumpProjectDetay($data=[])
    {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'circulationpumpprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function CirculationPumpProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'circulationpumpprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
}
