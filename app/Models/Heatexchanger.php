<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Heatexchanger extends Model
{
    public static function heatexchangerProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'heatexchangerprojelistele',
            [
                "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }

    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'heatexchangerprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);
        $result = json_decode($api_response_Data, TRUE);
        $result[] = ['adi' =>$api_response_Data["data"][0]["adi"], 'aciklama' =>$api_response_Data["data"][0]["aciklama"],"id"=>$api_response_Data["data"][0]["id"]];
        

        return $result;
    }
    //heatexchanger
    public static function heatexchangerHesap($data=[]){
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'heat-exchanger',
                [

                    "HeatNeed"=>$req_data["HeatNeed"],
                    "TotalPass"=>$req_data["TotalPass"],
                    "Piece"=>$req_data["Piece"],
                    "yedek"=>$req_data["yedek"],
                    "HeaterFluidAvg"=>$req_data["HeaterFluidAvg"],
                    "HeatedFluidAvg"=>$req_data["HeatedFluidAvg"],
                    "PollutionFactor"=>$req_data["PollutionFactor"],
                    "Brand"=>$req_data["Brand"],
                ]
        );
        return $response->json();
    }

    public static function heatexchangerProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'heatexchangerprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
    public static function heatexchangerHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('heatexchangerhesap');
        $kullanici_id = $data->session()->get("id");
        $heatexchangers_id = $data["heatexchangers"];
        $api_url = env('APP_API_URL');


        if($update==1 && isset($id))
        {

         

            $response = Http::withToken($data->session()->get('token'))->post($api_url.'heatexchangerupdate',
            [            'id'=>$id,
                        'kullanici_id'=>$kullanici_id,
                        "heatexchanger_id"=>$heatexchangers_id,
                        "adi"=>$req_data[0]["data"]["adi"],
                        "aciklama"=>$req_data[0]["data"]["aciklama"],
                        "HeatNeed"=>$req_data[0]["data"]["HeatNeed"],
                        "TotalPass"=>$req_data[0]["data"]["TotalPass"],
                        "Piece"=>$req_data[0]["data"]["Piece"],
                        "HeaterFluidAvg"=>$req_data[0]["data"]["HeaterFluidAvg"],
                        "HeatedFluidAvg"=>$req_data[0]["data"]["HeatedFluidAvg"],
                        "PollutionFactor"=>$req_data[0]["data"]["PollutionFactor"],
                        "LogHeatDiff"=>$req_data[0]["data"]["LogHeatDiff"],
                        "HeatSurface"=>$req_data[0]["data"]["HeatSurface"],
                        "HeatExchangerCapacity"=>$req_data[0]["data"]["HeatExchangerCapacity"],

            ]
        );
         
        return $response->json();
        
          
        }else{

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'heatexchangerSave',
            [
                        'kullanici_id'=>$kullanici_id,
                        "heatexchanger_id"=>$heatexchangers_id,
                        "adi"=>$req_data[0]["data"]["adi"],
                        "aciklama"=>$req_data[0]["data"]["aciklama"],
                        "HeatNeed"=>$req_data[0]["data"]["HeatNeed"],
                        "TotalPass"=>$req_data[0]["data"]["TotalPass"],
                        "Piece"=>$req_data[0]["data"]["Piece"],
                        "HeaterFluidAvg"=>$req_data[0]["data"]["HeaterFluidAvg"],
                        "HeatedFluidAvg"=>$req_data[0]["data"]["HeatedFluidAvg"],
                        "PollutionFactor"=>$req_data[0]["data"]["PollutionFactor"],
                        "LogHeatDiff"=>$req_data[0]["data"]["LogHeatDiff"],
                        "HeatSurface"=>$req_data[0]["data"]["HeatSurface"],
                        "HeatExchangerCapacity"=>$req_data[0]["data"]["HeatExchangerCapacity"],

            ]
        );
        return $response->json();
    }
    }
    public static function heatexchangerProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'heatexchangerprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
}
