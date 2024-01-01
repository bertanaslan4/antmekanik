<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Closedexpansiontank extends Model
{
    public static function closeexpansionProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'closeexpansionprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'closeexpansionprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    //close expansion

    public static function CloseExpansionHesap($data=[])
    {
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $result = array_merge($req_data["brand"]);
        $limtidegeri = 5;

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'closed-expansion-tank',
                [
                    "HeaterType"=>$req_data["HeaterType"],
                    "WaterHeat"=>$req_data["waterexpansion"],
                    "BoilerCapacity"=>$req_data["BoilerCapacityKazan"],
                    "StaticHeight"=>$req_data["StaticHeight"],
                    "OpeningPressure"=>$req_data["OpeningPressure"],
                    "ValveType"=>$req_data["ValveType"],
                    "Piece"=>$req_data["piece"],
                    "markalar"=>$result,
                    "limit"=>$limtidegeri,
                ]
        );
        return $response->json();

    }
    public static function CloseExpansionHesapKaydet($update,$id,$data=[])
    {
        $req_data = $data->session()->get('closeexpansiontankhesap');   
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
   
        if($update==1 && isset($id))
        {
           
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'closeexpansionupdate',
            [
                 
                'id'=>$id,
                "kullanici_id"=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "BoilerCapacity"=>$req_data[0]["data"]["BoilerCapacity"],
                "HeaterType"=>$req_data[0]["data"]["HeaterType"],
                "WaterHeat"=>$req_data[0]["data"]["WaterHeat"],
                "StaticHeight"=>$req_data[0]["data"]["StaticHeight"],
                "OpeningPressure"=>$req_data[0]["data"]["OpeningPressure"],
                "ValveType"=>$req_data[0]["data"]["ValveType"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "Expansion"=>$req_data[0]["data"]["Expansion"],
                "WaterExpansion"=>$req_data[0]["data"]["WaterExpansion"],
                "UpperPressure"=>$req_data[0]["data"]["UpperPressure"],
                "TankPrePressure"=>$req_data[0]["data"]["TankPrePressure"],
                "WaterVolume"=>$req_data[0]["data"]["WaterVolume"],
                "ExpandingWater"=>$req_data[0]["data"]["ExpandingWater"],
                "StartPreWaterVolume"=>$req_data[0]["data"]["StartPreWaterVolume"],
                "TankVolume"=>$req_data[0]["data"]["TankVolume"],
                "ValveDiameter"=>$req_data[0]["data"]["ValveDiameter"],
                "ValveInch"=>$req_data[0]["data"]["ValveInch"],
            ]
        );

        return $response->json();

            //ekleme
        }else{

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'closeexpansionSave',
            [
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "BoilerCapacity"=>$req_data[0]["data"]["BoilerCapacity"],
                "HeaterType"=>$req_data[0]["data"]["HeaterType"],
                "WaterHeat"=>$req_data[0]["data"]["WaterHeat"],
                "StaticHeight"=>$req_data[0]["data"]["StaticHeight"],
                "OpeningPressure"=>$req_data[0]["data"]["OpeningPressure"],
                "ValveType"=>$req_data[0]["data"]["ValveType"],
                "Piece"=>$req_data[0]["data"]["Piece"],
                "Expansion"=>$req_data[0]["data"]["Expansion"],
                "WaterExpansion"=>$req_data[0]["data"]["WaterExpansion"],
                "UpperPressure"=>$req_data[0]["data"]["UpperPressure"],
                "TankPrePressure"=>$req_data[0]["data"]["TankPrePressure"],
                "WaterVolume"=>$req_data[0]["data"]["WaterVolume"],
                "ExpandingWater"=>$req_data[0]["data"]["ExpandingWater"],
                "StartPreWaterVolume"=>$req_data[0]["data"]["StartPreWaterVolume"],
                "TankVolume"=>$req_data[0]["data"]["TankVolume"],
                "ValveDiameter"=>$req_data[0]["data"]["ValveDiameter"],
                "ValveInch"=>$req_data[0]["data"]["ValveInch"],
                "closeexpansion_id"=>$data["closeexpansion"],
            ]
        );
        return $response->json();
    }
}


    public static function CloseExpansionProjectDetay($data=[])
    {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'closeexpansionprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }

    public static function CloseExpansionProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'closeexpansionprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();

    }
}
