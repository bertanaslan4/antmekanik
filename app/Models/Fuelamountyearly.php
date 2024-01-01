<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Fuelamountyearly extends Model
{
    //fuel amount yearly
    public static function FuelAmountyearlyListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'fuelamountyearlyprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();
    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'fuelamountyearlyprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function fuelamountyearlyhesap($data=[])
    {
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'fuel-amount-yearly',
                [
                    "FuelType"=>$req_data["FuelTypeKazan"],
                    "Piece"=>$req_data["piecekazan"],
                    "BoilerEfficiency"=>$req_data["BoilerEfficiencyKazan"],
                    "BoilerCapacity"=>$req_data["BoilerCapacityKazan"],
                    "LiquitFuelType"=>$req_data["LiquitFuelTypeKazan"],
                    "BurnerEfficiency"=>$req_data["BurnerEfficiencyKazan"],
                    "YearlyHeatingEnergy"=>$req_data["YearlyHeatingEnergy"],
                    "BuildingArea"=>$req_data["BuildingArea"],
                ]
        );
        return $response->json();
    }
    public static function FuelAmountyearlyHesapKaydet($update,$id,$data=[]){
        $req_data = $data->session()->get('fuelamountyearlyhesap');
        $kullanici_id = $data->session()->get("id");
        $proje_id = $data->session()->get("proje_id");
        /**
         *  [FuelType] => 0
         * [Piece] => 1
         * [BoilerEfficiency] => 90
         * [BoilerCapacity] => 250000
         * [LiquitFuelType] => Lpg
         * [BurnerEfficiency] => 90
         * [YearlyHeatingEnergy] => 150
         * [BuildingArea] => 158.4
         * [AvgFuelTemperature] => 60
         * [FuelTemperature] => 2.1
         * [YearlyWorkingTime] => 150
         * [LiquidOccupancyRate] => 0.9
         * [SolidStackLoad] => 1.5
         * [LowerHeatValue] => 7445
         * [FuelAmount] => 12765.61450638
         * [FuelDensity] => 780
         * [LiquidTank] => 18.184636048975
         * [SolidFuelSurface] => 10.910781629385
         * [PreheaterLoad] => 60926.796507723 )
         *
         */

        $api_url = env('APP_API_URL');
         
        if($update==1 && isset($id))
        {
           
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'fuelamountyearlyupdate',
            [   "id"=>$id,
                "kullanici_id"=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "FuelType" =>$req_data[0]["data"]["FuelType"],
                "Piece"=>$req_data[0]["data"]['Piece'],
                "BoilerEfficiency"=>$req_data[0]["data"]["BoilerEfficiency"],
                "BoilerCapacity"=>$req_data[0]["data"]["BoilerCapacity"],
                "BurnerEfficiency"=>$req_data[0]["data"]["BurnerEfficiency"],
                "LiquitFuelType"=>$req_data[0]["data"]["LiquitFuelType"],
                "AvgFuelTemperature"=>$req_data[0]["data"]["AvgFuelTemperature"],
                "FuelTemperature" =>$req_data[0]["data"]["FuelTemperature"],
                "YearlyHeatingEnergy"=>$req_data[0]["data"]["YearlyHeatingEnergy"],
                "YearlyWorkingTime"=>$req_data[0]["data"]["YearlyWorkingTime"],
                "BuildingArea"=>$req_data[0]["data"]["BuildingArea"],
                "LiquidOccupancyRate"=>$req_data[0]["data"]["LiquidOccupancyRate"],
                "SolidStackLoad"=>$req_data[0]["data"]["SolidStackLoad"],
                "LowerHeatValue" =>$req_data[0]["data"]["LowerHeatValue"],
                "FuelAmount"=>$req_data[0]["data"]["FuelAmount"],
                "FuelDensity"=>$req_data[0]["data"]["FuelDensity"],
                "LiquidTank"=>$req_data[0]["data"]["LiquidTank"],
                "SolidFuelSurface"=>$req_data[0]["data"]["SolidFuelSurface"],
                "PreheaterLoad"=>$req_data[0]["data"]["PreheaterLoad"],
                "proje_id"=>$proje_id,
            ]
        );
        return $response->json();

            //ekleme
        }else{

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'fuelamountyearlySave',
            [
                'kullanici_id'=>$kullanici_id,
                'adi'=>$req_data[0]["data"]['adi'],
                'aciklama'=>$req_data[0]["data"]['aciklama'],
                'FuelType' =>$req_data[0]["data"]['FuelType'],
                'Piece'=>$req_data[0]["data"]['Piece'],
                'BoilerEfficiency'=>$req_data[0]["data"]['BoilerEfficiency'],
                'BoilerCapacity'=>$req_data[0]["data"]['BoilerCapacity'],
                'BurnerEfficiency'=>$req_data[0]["data"]['BurnerEfficiency'],
                'LiquitFuelType'=>$req_data[0]["data"]['LiquitFuelType'],
                'AvgFuelTemperature'=>$req_data[0]["data"]['AvgFuelTemperature'],
                'FuelTemperature' =>$req_data[0]["data"]['FuelTemperature'],
                'YearlyHeatingEnergy'=>$req_data[0]["data"]['YearlyHeatingEnergy'],
                'YearlyWorkingTime'=>$req_data[0]["data"]['YearlyWorkingTime'],
                'BuildingArea'=>$req_data[0]["data"]['BuildingArea'],
                'LiquidOccupancyRate'=>$req_data[0]["data"]['LiquidOccupancyRate'],
                'SolidStackLoad'=>$req_data[0]["data"]['SolidStackLoad'],
                'LowerHeatValue' =>$req_data[0]["data"]['LowerHeatValue'],
                'FuelAmount'=>$req_data[0]["data"]['FuelAmount'],
                'FuelDensity'=>$req_data[0]["data"]['FuelDensity'],
                'LiquidTank'=>$req_data[0]["data"]['LiquidTank'],
                'SolidFuelSurface'=>$req_data[0]["data"]['SolidFuelSurface'],
                'PreheaterLoad'=>$req_data[0]["data"]['PreheaterLoad'],
                'proje_id'=>$proje_id,
            ]
        );
        return $response->json();
    }
    }
    public static function FuelamountyearlyProjectDetay($data=[])
    {
        $fuelamount_proje_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'fuelamountyearlyprojelistele',
        [
            'id'=>$fuelamount_proje_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function FuelAmountyearlyProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'fuelamountyearlyprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
}
