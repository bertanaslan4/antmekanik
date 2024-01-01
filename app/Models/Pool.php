<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Pool extends Model
{
    public static function poolProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'poolprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'poolprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    //pool

    public static function poolHesap($data=[]){
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'/pool',
                [
                    "PoolVolume"=>$req_data["PoolVolume"],
                    "PoolArea"=>$req_data["PoolArea"],
                    "NumberOfUser"=>$req_data["NumberOfUser"],
                    "CirculationPeriod"=>$req_data["CirculationPeriod"],
                    "LightingIntensity"=>$req_data["LightingIntensity"],
                    "SuctionStrainerArea"=>$req_data["SuctionStrainerArea"],
                    'FeedWaterSpeed'=> $req_data["FeedWaterSpeed"],
                    'SuctionWaterSpeed'=> $req_data["SuctionWaterSpeed"],
                    'SuctionCollectorSpeed'=> $req_data["SuctionCollectorSpeed"],
                    'ReinforcementPerPerson'=> $req_data["ReinforcementPerPerson"],
                    'LightingLampIntensity'=> $req_data["LightingLampIntensity"],
                ]
        );
        return $response->json();
    }
    public static function poolHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('poolhesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
         
        if($update==1 && isset($id))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'poolupdate',
            [
                'id'=>$id,
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "PoolVolume"=>$req_data[0]["data"]["PoolVolume"],
                "PoolArea"=>$req_data[0]["data"]["PoolArea"],
                "NumberOfUser"=>$req_data[0]["data"]["NumberOfUser"],
                "CirculationPeriod"=>$req_data[0]["data"]["CirculationPeriod"],
                "LightingIntensity"=>$req_data[0]["data"]["LightingIntensity"],
                "SuctionStrainerArea"=>$req_data[0]["data"]["SuctionStrainerArea"],
                "FeedWaterSpeed"=>$req_data[0]["data"]["FeedWaterSpeed"],
                "SuctionWaterSpeed"=>$req_data[0]["data"]["SuctionWaterSpeed"],
                "SuctionCollectorSpeed"=>$req_data[0]["data"]["SuctionCollectorSpeed"],
                "ReinforcementPerPerson"=>$req_data[0]["data"]["ReinforcementPerPerson"],
                "LightingLampIntensity"=>$req_data[0]["data"]["LightingLampIntensity"],
                "BalanceTankArea"=>$req_data[0]["data"]["BalanceTankArea"],
                "FilterCapacity"=>$req_data[0]["data"]["FilterCapacity"],
                "PumpFlow"=>$req_data[0]["data"]["PumpFlow"],
                "FeedingNozzle"=>$req_data[0]["data"]["FeedingNozzle"],
                "FeedingNozzleFlow"=>$req_data[0]["data"]["FeedingNozzleFlow"],
                "SuctionStrainerAreaNet"=>$req_data[0]["data"]["SuctionStrainerAreaNet"],
                "FilterSuctionSpeed"=>$req_data[0]["data"]["FilterSuctionSpeed"],
                "FeedPipe"=>$req_data[0]["data"]["FeedPipe"],
                "SuctionPipe"=>$req_data[0]["data"]["SuctionPipe"],
                "SuctionCollector"=>$req_data[0]["data"]["SuctionCollector"],
                "FeedPipeDiameter"=>$req_data[0]["data"]["FeedPipeDiameter"],
                "SuctionPipeDiameter"=>$req_data[0]["data"]["SuctionPipeDiameter"],
                "SuctionCollectorDiameter"=>$req_data[0]["data"]["SuctionCollectorDiameter"],
                "TankDailyReinforcement"=>$req_data[0]["data"]["TankDailyReinforcement"],
                "NumberOfLightingLamp"=>$req_data[0]["data"]["NumberOfLightingLamp"],
            ]
        );
        return $response->json();
            //ekleme
        }else{
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'poolSave',
            [
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "PoolVolume"=>$req_data[0]["data"]["PoolVolume"],
                "PoolArea"=>$req_data[0]["data"]["PoolArea"],
                "NumberOfUser"=>$req_data[0]["data"]["NumberOfUser"],
                "CirculationPeriod"=>$req_data[0]["data"]["CirculationPeriod"],
                "LightingIntensity"=>$req_data[0]["data"]["LightingIntensity"],
                "SuctionStrainerArea"=>$req_data[0]["data"]["SuctionStrainerArea"],
                "FeedWaterSpeed"=>$req_data[0]["data"]["FeedWaterSpeed"],
                "SuctionWaterSpeed"=>$req_data[0]["data"]["SuctionWaterSpeed"],
                "SuctionCollectorSpeed"=>$req_data[0]["data"]["SuctionCollectorSpeed"],
                "ReinforcementPerPerson"=>$req_data[0]["data"]["ReinforcementPerPerson"],
                "LightingLampIntensity"=>$req_data[0]["data"]["LightingLampIntensity"],
                "BalanceTankArea"=>$req_data[0]["data"]["BalanceTankArea"],
                "FilterCapacity"=>$req_data[0]["data"]["FilterCapacity"],
                "PumpFlow"=>$req_data[0]["data"]["PumpFlow"],
                "FeedingNozzle"=>$req_data[0]["data"]["FeedingNozzle"],
                "FeedingNozzleFlow"=>$req_data[0]["data"]["FeedingNozzleFlow"],
                "SuctionStrainerAreaNet"=>$req_data[0]["data"]["SuctionStrainerAreaNet"],
                "FilterSuctionSpeed"=>$req_data[0]["data"]["FilterSuctionSpeed"],
                "FeedPipe"=>$req_data[0]["data"]["FeedPipe"],
                "SuctionPipe"=>$req_data[0]["data"]["SuctionPipe"],
                "SuctionCollector"=>$req_data[0]["data"]["SuctionCollector"],
                "FeedPipeDiameter"=>$req_data[0]["data"]["FeedPipeDiameter"],
                "SuctionPipeDiameter"=>$req_data[0]["data"]["SuctionPipeDiameter"],
                "SuctionCollectorDiameter"=>$req_data[0]["data"]["SuctionCollectorDiameter"],
                "TankDailyReinforcement"=>$req_data[0]["data"]["TankDailyReinforcement"],
                "NumberOfLightingLamp"=>$req_data[0]["data"]["NumberOfLightingLamp"],
            ]
        );
        return $response->json();
    }
    }
    public static function poolProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'poolprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }

    public static function poolProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'poolprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
}
