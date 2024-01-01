<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Pipeinsulation extends Model
{
    public static function pipeinsulationProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'pipeinsulationprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'pipeinsulationprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    //pipeinsulation

    public static function pipeinsulationHesap($data=[]){
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'/pipe-insulation',
                [

                    "ServicePipeType"=>$req_data["ServicePipeType"],
                    "PipeDiameter"=>$req_data["PipeDiameter"],
                    "SheathPipeType"=>$req_data["SheathPipeType"],
                    "SoilType"=>$req_data["SoilType"],
                    "SoilTemperature"=>$req_data["SoilTemperature"],
                    "FluidAvgTemperature"=>$req_data["FluidAvgTemperature"],
                    "SoilFillingHeight"=>$req_data["SoilFillingHeight"],
                    "LineLength"=>$req_data["LineLength"],
                    "WaterFlow"=>$req_data["WaterFlow"],
                    'WaterMass'=>$req_data["WaterMass"],
                    'SpecificHeatOfWater'=>$req_data["SpecificHeatOfWater"],
                    'MaterialLamda'=>$req_data["MaterialLamda"],
                ]
        );
        return $response->json();
    }
    public static function pipeinsulationHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('pipeinsulationhesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');

        if($update==1 && isset($id))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'pipeinsulationupdate',
            [        
            'id'=>$id,
            'kullanici_id'=>$kullanici_id,
            "adi"=>$req_data[0]["data"]["adi"],
            "aciklama"=>$req_data[0]["data"]["aciklama"],
            "ServicePipeType"=>$req_data[0]["data"]["ServicePipeType"],
            "PipeDiameter"=>$req_data[0]["data"]["PipeDiameter"],
            "SheathPipeType"=>$req_data[0]["data"]["SheathPipeType"],
            "SoilType"=>$req_data[0]["data"]["SoilType"],
            "SoilTemperature"=>$req_data[0]["data"]["SoilTemperature"],
            "FluidAvgTemperature"=>$req_data[0]["data"]["FluidAvgTemperature"],
            "SoilFillingHeight"=>$req_data[0]["data"]["SoilFillingHeight"],
            "LineLength"=>$req_data[0]["data"]["LineLength"],
            "WaterFlow"=>$req_data[0]["data"]["WaterFlow"],
            "WaterMass"=>$req_data[0]["data"]["WaterMass"],
            "SpecificHeatOfWater"=>$req_data[0]["data"]["SpecificHeatOfWater"],
            "MaterialLamda"=>$req_data[0]["data"]["MaterialLamda"],
            "NominalOuterD"=>$req_data[0]["data"]["NominalOuterD"],
            "NominalInnerD"=>$req_data[0]["data"]["NominalInnerD"],
            "InsulationThickness"=>$req_data[0]["data"]["InsulationThickness"],
            "InsulationInnerD"=>$req_data[0]["data"]["InsulationInnerD"],
            "ServicePipeLamda"=>$req_data[0]["data"]["ServicePipeLamda"],
            "SheathPipeLamda"=>$req_data[0]["data"]["SheathPipeLamda"],
            "SoilLamda"=>$req_data[0]["data"]["SoilLamda"],
            "SurfaceTensionFillerHeight"=>$req_data[0]["data"]["SurfaceTensionFillerHeight"],
            "ServicePipeResistance"=>$req_data[0]["data"]["ServicePipeResistance"],
            "InsulationMaterialResistance"=>$req_data[0]["data"]["InsulationMaterialResistance"],
            "SheathPipeResistance"=>$req_data[0]["data"]["SheathPipeResistance"],
            "SoilResistance"=>$req_data[0]["data"]["SoilResistance"],
            "CoefficientU"=>$req_data[0]["data"]["CoefficientU"],
            "TotalHeatLoss"=>$req_data[0]["data"]["TotalHeatLoss"],
            "EndOfLineTemp"=>$req_data[0]["data"]["EndOfLineTemp"],
            "TempDiff"=>$req_data[0]["data"]["TempDiff"],
            ]
        );
        return $response->json();
             
        }else{

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'pipeinsulationSave',
            [
                    'kullanici_id'=>$kullanici_id,
                    "adi"=>$req_data[0]["data"]["adi"],
                    "aciklama"=>$req_data[0]["data"]["aciklama"],
                    "ServicePipeType"=>$req_data[0]["data"]["ServicePipeType"],
                    "PipeDiameter"=>$req_data[0]["data"]["PipeDiameter"],
                    "SheathPipeType"=>$req_data[0]["data"]["SheathPipeType"],
                    "SoilType"=>$req_data[0]["data"]["SoilType"],
                    "SoilTemperature"=>$req_data[0]["data"]["SoilTemperature"],
                    "FluidAvgTemperature"=>$req_data[0]["data"]["FluidAvgTemperature"],
                    "SoilFillingHeight"=>$req_data[0]["data"]["SoilFillingHeight"],
                    "LineLength"=>$req_data[0]["data"]["LineLength"],
                    "WaterFlow"=>$req_data[0]["data"]["WaterFlow"],
                    "WaterMass"=>$req_data[0]["data"]["WaterMass"],
                    "SpecificHeatOfWater"=>$req_data[0]["data"]["SpecificHeatOfWater"],
                    "MaterialLamda"=>$req_data[0]["data"]["MaterialLamda"],
                    "NominalOuterD"=>$req_data[0]["data"]["NominalOuterD"],
                    "NominalInnerD"=>$req_data[0]["data"]["NominalInnerD"],
                    "InsulationThickness"=>$req_data[0]["data"]["InsulationThickness"],
                    "InsulationInnerD"=>$req_data[0]["data"]["InsulationInnerD"],
                    "ServicePipeLamda"=>$req_data[0]["data"]["ServicePipeLamda"],
                    "SheathPipeLamda"=>$req_data[0]["data"]["SheathPipeLamda"],
                    "SoilLamda"=>$req_data[0]["data"]["SoilLamda"],
                    "SurfaceTensionFillerHeight"=>$req_data[0]["data"]["SurfaceTensionFillerHeight"],
                    "ServicePipeResistance"=>$req_data[0]["data"]["ServicePipeResistance"],
                    "InsulationMaterialResistance"=>$req_data[0]["data"]["InsulationMaterialResistance"],
                    "SheathPipeResistance"=>$req_data[0]["data"]["SheathPipeResistance"],
                    "SoilResistance"=>$req_data[0]["data"]["SoilResistance"],
                    "CoefficientU"=>$req_data[0]["data"]["CoefficientU"],
                    "TotalHeatLoss"=>$req_data[0]["data"]["TotalHeatLoss"],
                    "EndOfLineTemp"=>$req_data[0]["data"]["EndOfLineTemp"],
                    "TempDiff"=>$req_data[0]["data"]["TempDiff"],
            ]
        );
        return $response->json();
    }
    }
    public static function pipeinsulationProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'pipeinsulationprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
    public static function pipeinsulationProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'pipeinsulationprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
}
