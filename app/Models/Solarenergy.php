<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Solarenergy extends Model
{
    public static function solarenergyProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'solarenergyprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'solarenergyprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    //solarenergy

    public static function solarenergyHesap($data=[]){
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'solar-energy',
                [
                    "Location"=>$req_data["Location"],
                    "BuildType"=>$req_data["BuildType"],
                    "NumberOfPeople"=>$req_data["NumberOfPeople"],
                    "SafetyFactor"=>$req_data["SafetyFactor"],
                    "CapacityCoverageRate"=>$req_data["CapacityCoverageRate"],
                    "CollectorBrand"=>$req_data["CollectorBrand"][0],
                    "CollectorType"=>$req_data["CollectorType"][0],
                ]
        );
        return $response->json();
    }
    public static function solarenergyHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('solarenergyhesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
        $proje_id=$data->session()->get("proje_id");
        if($update==1 && isset($id))
        {

            $response = Http::withToken($data->session()->get('token'))->post($api_url.'solarenergyupdate',
            [   'id'=>$id,
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "Location"=>$req_data[0]["data"]["Location"],
                "BuildType"=>$req_data[0]["data"]["BuildType"],
                "NumberOfPeople"=>$req_data[0]["data"]["NumberOfPeople"],
                "SafetyFactor"=>$req_data[0]["data"]["SafetyFactor"],
                "CapacityCoverageRate"=>$req_data[0]["data"]["CapacityCoverageRate"],
                "CollectorBrand"=>$req_data[0]["data"]["CollectorBrand"],
                "CollectorType"=>$req_data[0]["data"]["CollectorType"],
                "TempIn"=>$req_data[0]["data"]["TempIn"],
                "TempOut"=>$req_data[0]["data"]["TempOut"],
                "SpecificHeat"=>$req_data[0]["data"]["SpecificHeat"],
                "Density"=>$req_data[0]["data"]["Density"],
                "CorrectionFactor"=>$req_data[0]["data"]["CorrectionFactor"],
                "CollectorEfficiency"=>$req_data[0]["data"]["CollectorEfficiency"],
                "CollectorSurface"=>$req_data[0]["data"]["CollectorSurface"],
                "DailyWaterConsumption"=>$req_data[0]["data"]["DailyWaterConsumption"],
                "TemperatureDiff"=>$req_data[0]["data"]["TemperatureDiff"],
                "DailyWaterNeed"=>$req_data[0]["data"]["DailyWaterNeed"],
                "DailyEnergyNeed"=>$req_data[0]["data"]["DailyEnergyNeed"],
                "Months"=>$req_data[0]["data"]["Months"],
                "CollectorUsefulEnergy"=>$req_data[0]["data"]["CollectorUsefulEnergy"],
                "CollectorNeeded"=>$req_data[0]["data"]["CollectorNeeded"],
                "TotalSurfaceArea"=>$req_data[0]["data"]["TotalSurfaceArea"],

            ]
        );
        return $response->json();



            //ekleme
        }else{
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'solarenergySave',
            [
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "Location"=>$req_data[0]["data"]["Location"],
                "BuildType"=>$req_data[0]["data"]["BuildType"],
                "NumberOfPeople"=>$req_data[0]["data"]["NumberOfPeople"],
                "SafetyFactor"=>$req_data[0]["data"]["SafetyFactor"],
                "CapacityCoverageRate"=>$req_data[0]["data"]["CapacityCoverageRate"],
                "CollectorBrand"=>$req_data[0]["data"]["CollectorBrand"],
                "CollectorType"=>$req_data[0]["data"]["CollectorType"],
                "TempIn"=>$req_data[0]["data"]["TempIn"],
                "TempOut"=>$req_data[0]["data"]["TempOut"],
                "SpecificHeat"=>$req_data[0]["data"]["SpecificHeat"],
                "Density"=>$req_data[0]["data"]["Density"],
                "CorrectionFactor"=>$req_data[0]["data"]["CorrectionFactor"],
                "CollectorEfficiency"=>$req_data[0]["data"]["CollectorEfficiency"],
                "CollectorSurface"=>$req_data[0]["data"]["CollectorSurface"],
                "DailyWaterConsumption"=>$req_data[0]["data"]["DailyWaterConsumption"],
                "TemperatureDiff"=>$req_data[0]["data"]["TemperatureDiff"],
                "DailyWaterNeed"=>$req_data[0]["data"]["DailyWaterNeed"],
                "DailyEnergyNeed"=>$req_data[0]["data"]["DailyEnergyNeed"],
                "Months"=>$req_data[0]["data"]["Months"],
                "CollectorUsefulEnergy"=>$req_data[0]["data"]["CollectorUsefulEnergy"],
                "CollectorNeeded"=>$req_data[0]["data"]["CollectorNeeded"],
                "TotalSurfaceArea"=>$req_data[0]["data"]["TotalSurfaceArea"],
                "proje_id"=>$proje_id,

            ]
        );
        return $response->json();
    }
    }

    public static function solarenergyProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'solarenergyprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function solarenergyProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'solarenergyprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
}
