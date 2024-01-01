<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Parkingventilation extends Model
{
    public static function parkingventilationProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'parkingventilationprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'parkingventilationprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    //parkingventilation
    public static function parkingventilationHesap($data=[]){
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'/parking-ventilation',
                [

                    "CalculationType"=>$req_data["CalculationType"],
                    "ParkingType"=>$req_data["ParkingType"],
                    "FlowCalcMethod"=>$req_data["FlowCalcMethod"],
                    "ParkingArea"=>$req_data["ParkingArea"],
                    "ParkingHeight"=>$req_data["ParkingHeight"],
                    "NumberOfVehicles"=>$req_data["NumberOfVehicles"],
                    "DrivingRoadLength"=>$req_data["DrivingRoadLength"],
                    'WasteGasCO'=> $req_data["WasteGasCO"],
                    'OutdoorCO'=> $req_data["OutdoorCO"],
                    'VehicleExitFrequency'=> $req_data["VehicleExitFrequency"],
                    'ParkingSpeed'=> $req_data["ParkingSpeed"],
                    'DetectorDensity'=> $req_data["DetectorDensity"],
                    'ParkingCulvertBelow100'=> $req_data["ParkingCulvertBelow100"],
                    'ParkingCulvertAbove100'=> $req_data["ParkingCulvertAbove100"],
                ]
        );
        return $response->json();
    }
    public static function parkingventilationHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('parkingventilationhesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');

        if($update==1 && isset($id))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'parkingventilationupdate',
            [        'id'=>$id,
                    'kullanici_id'=>$kullanici_id,
                    "adi"=>$req_data[0]["data"]["adi"],
                    "aciklama"=>$req_data[0]["data"]["aciklama"],
                    "CalculationType"=>$req_data[0]["data"]["CalculationType"],
                    "ParkingType"=>$req_data[0]["data"]["ParkingType"],
                    "FlowCalcMethod"=>$req_data[0]["data"]["FlowCalcMethod"],
                    "ParkingArea"=>$req_data[0]["data"]["ParkingArea"],
                    "ParkingHeight"=>$req_data[0]["data"]["ParkingHeight"],
                    "NumberOfVehicles"=>$req_data[0]["data"]["NumberOfVehicles"],
                    "DrivingRoadLength"=>$req_data[0]["data"]["DrivingRoadLength"],
                    "WasteGasCO"=>$req_data[0]["data"]["WasteGasCO"],
                    "OutdoorCO"=>$req_data[0]["data"]["OutdoorCO"],
                    "VehicleExitFrequency"=>$req_data[0]["data"]["VehicleExitFrequency"],
                    "ParkingSpeed"=>$req_data[0]["data"]["ParkingSpeed"],
                    "DetectorDensity"=>$req_data[0]["data"]["DetectorDensity"],
                    "FreshAir"=>$req_data[0]["data"]["FreshAir"],
                    "NumberOfExchanges"=>$req_data[0]["data"]["NumberOfExchanges"],
                    "TotalCukvertArea"=>$req_data[0]["data"]["TotalCukvertArea"],
                    "MotionlessVo"=>$req_data[0]["data"]["MotionlessVo"],
                    "ActiveVo"=>$req_data[0]["data"]["ActiveVo"],
                    "AirFlowPerVehicle"=>$req_data[0]["data"]["AirFlowPerVehicle"],
                    "AirFlow"=>$req_data[0]["data"]["AirFlow"],
                    "MinCulvertArea"=>$req_data[0]["data"]["MinCulvertArea"],
            ]
        );
        return $response->json();

            //ekleme
        }else{
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'parkingventilationSave',
            [
                    'kullanici_id'=>$kullanici_id,
                    "adi"=>$req_data[0]["data"]["adi"],
                    "aciklama"=>$req_data[0]["data"]["aciklama"],
                    "CalculationType"=>$req_data[0]["data"]["CalculationType"],
                    "ParkingType"=>$req_data[0]["data"]["ParkingType"],
                    "FlowCalcMethod"=>$req_data[0]["data"]["FlowCalcMethod"],
                    "ParkingArea"=>$req_data[0]["data"]["ParkingArea"],
                    "ParkingHeight"=>$req_data[0]["data"]["ParkingHeight"],
                    "NumberOfVehicles"=>$req_data[0]["data"]["NumberOfVehicles"],
                    "DrivingRoadLength"=>$req_data[0]["data"]["DrivingRoadLength"],
                    "WasteGasCO"=>$req_data[0]["data"]["WasteGasCO"],
                    "OutdoorCO"=>$req_data[0]["data"]["OutdoorCO"],
                    "VehicleExitFrequency"=>$req_data[0]["data"]["VehicleExitFrequency"],
                    "ParkingSpeed"=>$req_data[0]["data"]["ParkingSpeed"],
                    "DetectorDensity"=>$req_data[0]["data"]["DetectorDensity"],
                    "FreshAir"=>$req_data[0]["data"]["FreshAir"],
                    "NumberOfExchanges"=>$req_data[0]["data"]["NumberOfExchanges"],
                    "TotalCukvertArea"=>$req_data[0]["data"]["TotalCukvertArea"],
                    "MotionlessVo"=>$req_data[0]["data"]["MotionlessVo"],
                    "ActiveVo"=>$req_data[0]["data"]["ActiveVo"],
                    "AirFlowPerVehicle"=>$req_data[0]["data"]["AirFlowPerVehicle"],
                    "AirFlow"=>$req_data[0]["data"]["AirFlow"],
                    "MinCulvertArea"=>$req_data[0]["data"]["MinCulvertArea"],
            ]
        );
        return $response->json();
    }
    }

    public static function parkingventilationProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'parkingventilationprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function parkingventilationProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'parkingventilationprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
}
