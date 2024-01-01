<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Fuelamount extends Model
{
    //fuel amount
    public static function FuelAmountListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'fuelamountprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();
    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'fuelamountprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        

        return $api_response_Data->json();
    }
    public static function fuelamounthesap($data=[])
    {
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'fuel-amount',
                [
                    
                    "FuelType"=>$req_data["FuelTypeKazan"],
                    "Piece"=>$req_data["piecekazan"],
                    "BoilerEfficiency"=>$req_data["BoilerEfficiencyKazan"],
                    "BoilerCapacity"=>$req_data["BoilerCapacityKazan"],
                    "LiquitFuelType"=>$req_data["LiquitFuelTypeKazan"],
                    "FuelTemperature"=>$req_data["fuelamount_FuelTemperature"],
                    "DailyWorkingTime"=>$req_data["FuelAmount_DailyWorkingTime"],
                    "YearlyWorkingTime"=>$req_data["fuelamount_YearlyWorkingTime"],
                    "StoredDays"=>$req_data["fuelamount_StoredDays"],
                    "LiquidOccupancyRate"=>$req_data["fuelamount_LiquidOccupancyRate"],
                    "SolidStackLoad"=>$req_data["fuelamount_SolidStackLoad"],
                    "AvgFuelTemperature"=>$req_data["fuelAmount_AvgFuelTemperature"],

                ]
        );
        return $response->json();
    }
    public static function FuelAmountHesapKaydet($update,$id,$data=[]){
        $req_data = $data->session()->get('fuelamounthesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
        $proje_id=$data->session()->get("proje_id");
        if($update==1 && isset($id))
        {
             
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'fuelamountupdate',
            [    
                'id'=>$id,
                'kullanici_id'=>$kullanici_id,
                'adi'=>$req_data[0]["data"]['adi'],
                'aciklama'=>$req_data[0]["data"]['aciklama'],
                'FuelType' =>$req_data[0]["data"]['FuelType'],
                'Piece'=>$req_data[0]["data"]['Piece'],
                'BoilerEfficiency'=>$req_data[0]["data"]['BoilerEfficiency'],
                'BoilerCapacity'=>$req_data[0]["data"]['BoilerCapacity'],
                'LiquitFuelType'=>$req_data[0]["data"]['LiquitFuelType'],
                'AvgFuelTemperature'=>$req_data[0]["data"]['AvgFuelTemperature'],
                'FuelTemperature' =>$req_data[0]["data"]['FuelTemperature'],
                'DailyWorkingTime'=>$req_data[0]["data"]['DailyWorkingTime'],
                'YearlyWorkingTime'=>$req_data[0]["data"]['YearlyWorkingTime'],
                'StoredDays'=>$req_data[0]["data"]['StoredDays'],
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

            //ekleme
        }else{

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'fuel-amount-Save',
            [
                'kullanici_id'=>$kullanici_id,
                'adi'=>$req_data[0]["data"]['adi'],
                'aciklama'=>$req_data[0]["data"]['aciklama'],
                'FuelType' =>$req_data[0]["data"]['FuelType'],
                'Piece'=>$req_data[0]["data"]['Piece'],
                'BoilerEfficiency'=>$req_data[0]["data"]['BoilerEfficiency'],
                'BoilerCapacity'=>$req_data[0]["data"]['BoilerCapacity'],
                'LiquitFuelType'=>$req_data[0]["data"]['LiquitFuelType'],
                'AvgFuelTemperature'=>$req_data[0]["data"]['AvgFuelTemperature'],
                'FuelTemperature' =>$req_data[0]["data"]['FuelTemperature'],
                'DailyWorkingTime'=>$req_data[0]["data"]['DailyWorkingTime'],
                'YearlyWorkingTime'=>$req_data[0]["data"]['YearlyWorkingTime'],
                'StoredDays'=>$req_data[0]["data"]['StoredDays'],
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
    public static function FuelamountProjectDetay($data=[])
    {
        $fuelamount_proje_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'fuelamountprojelistele',
        [
            'id'=>$fuelamount_proje_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function FuelAmountProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'fuelamountprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
}
