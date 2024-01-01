<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Coldstorage extends Model
{
    public static function coldstorageProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'coldstorageprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'coldstorageprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    //coldstorage
    public static function coldstorageHesap($data=[]){
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'/cold-storage',
                [

                    "ProductType"=>$req_data["ProductType"],
                    "EnclosureType"=>$req_data["EnclosureType"],
                    "ProductQuantity"=>$req_data["ProductQuantity"],
                    "EntryTemp"=>$req_data["EntryTemp"],
                    "HeatGain"=>$req_data["HeatGain"],
                    "LightingLoad"=>$req_data["LightingLoad"],
                    "EngineLoad"=>$req_data["EngineLoad"],
                    "OtherLoads"=>$req_data["OtherLoads"],
                    "NumberOfPeople"=>$req_data["NumberOfPeople"],
                    "StorageVolume"=>$req_data["StorageVolume"],
                    "SystemSafetyHike"=>$req_data["SystemSafetyHike"],
                    "BreathingHeat"=>$req_data["BreathingHeat"],
                    "BreathingHeatExample"=>$req_data["BreathingHeatExample"],
                    'OutdoorEnthalpy'=>$req_data["OutdoorEnthalpy"],
                    'IndoorEnthalpy'=>$req_data["IndoorEnthalpy"],
                    'AirDensity'=>$req_data["AirDensity"],
                    'ShiftLength'=>$req_data["ShiftLength"],
                    'SystemUptime'=>$req_data["SystemUptime"],
                ]
        );
        return $response->json();
    }
    public static function coldstorageHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('coldstoragehesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');

       
        if($update==1 && isset($id))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'coldstorageUpdate',
            [       
                 'id'=>$id,
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "ProductType"=>$req_data[0]["data"]["ProductType"],
                "EnclosureType"=>$req_data[0]["data"]["EnclosureType"],
                "ProductQuantity"=>$req_data[0]["data"]["ProductQuantity"],
                "EntryTemp"=>$req_data[0]["data"]["EntryTemp"],
                "HeatGain"=>$req_data[0]["data"]["HeatGain"],
                "LightingLoad"=>$req_data[0]["data"]["LightingLoad"],
                "EngineLoad"=>$req_data[0]["data"]["EngineLoad"],
                "OtherLoads"=>$req_data[0]["data"]["OtherLoads"],
                "NumberOfPeople"=>$req_data[0]["data"]["NumberOfPeople"],
                "StorageVolume"=>$req_data[0]["data"]["StorageVolume"],
                "SystemSafetyHike"=>$req_data[0]["data"]["SystemSafetyHike"],
                "BreathingHeat"=>$req_data[0]["data"]["BreathingHeat"],
                "BreathingHeatExample"=>$req_data[0]["data"]["BreathingHeatExample"],
                "OutdoorEnthalpy"=>$req_data[0]["data"]["OutdoorEnthalpy"],
                "IndoorEnthalpy"=>$req_data[0]["data"]["IndoorEnthalpy"],
                "AirDensity"=>$req_data[0]["data"]["AirDensity"],
                "ShiftLength"=>$req_data[0]["data"]["ShiftLength"],
                "SystemUptime"=>$req_data[0]["data"]["SystemUptime"],
                "StorageTemperature"=>$req_data[0]["data"]["StorageTemperature"],
                "FreezingPoint"=>$req_data[0]["data"]["FreezingPoint"],
                "StorageTime"=>$req_data[0]["data"]["StorageTime"],
                "ProcessingTime"=>$req_data[0]["data"]["ProcessingTime"],
                "AirExchangeNumber"=>$req_data[0]["data"]["AirExchangeNumber"],
                "UnitHumanLoad"=>$req_data[0]["data"]["UnitHumanLoad"],
                "PeopleLoad"=>$req_data[0]["data"]["PeopleLoad"],
                "TotalLightingLoad"=>$req_data[0]["data"]["TotalLightingLoad"],
                "ElectricalLoad"=>$req_data[0]["data"]["ElectricalLoad"],
                "TotalOtherLoads"=>$req_data[0]["data"]["TotalOtherLoads"],
                "VentilationLoad"=>$req_data[0]["data"]["VentilationLoad"],
                "TotalHeatGain"=>$req_data[0]["data"]["TotalHeatGain"],
                "BeforeFreezingLoad"=>$req_data[0]["data"]["BeforeFreezingLoad"],
                "FreezingLoad"=>$req_data[0]["data"]["FreezingLoad"],
                "AfterFreezingLoad"=>$req_data[0]["data"]["AfterFreezingLoad"],
                "BreathingHeatLoad"=>$req_data[0]["data"]["BreathingHeatLoad"],
                "ProductTemperature"=>$req_data[0]["data"]["ProductTemperature"],
                "SystemSafetyOverhead"=>$req_data[0]["data"]["SystemSafetyOverhead"],
                "SystemLoad"=>$req_data[0]["data"]["SystemLoad"],
                "SystemLoadDaily"=>$req_data[0]["data"]["SystemLoadDaily"],
            ]
        );
        return $response->json();
            
        }else{

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'coldstorageSave',
            [
                    'kullanici_id'=>$kullanici_id,
                    "adi"=>$req_data[0]["data"]["adi"],
                    "aciklama"=>$req_data[0]["data"]["aciklama"],
                    "ProductType"=>$req_data[0]["data"]["ProductType"],
                    "EnclosureType"=>$req_data[0]["data"]["EnclosureType"],
                    "ProductQuantity"=>$req_data[0]["data"]["ProductQuantity"],
                    "EntryTemp"=>$req_data[0]["data"]["EntryTemp"],
                    "HeatGain"=>$req_data[0]["data"]["HeatGain"],
                    "LightingLoad"=>$req_data[0]["data"]["LightingLoad"],
                    "EngineLoad"=>$req_data[0]["data"]["EngineLoad"],
                    "OtherLoads"=>$req_data[0]["data"]["OtherLoads"],
                    "NumberOfPeople"=>$req_data[0]["data"]["NumberOfPeople"],
                    "StorageVolume"=>$req_data[0]["data"]["StorageVolume"],
                    "SystemSafetyHike"=>$req_data[0]["data"]["SystemSafetyHike"],
                    "BreathingHeat"=>$req_data[0]["data"]["BreathingHeat"],
                    "BreathingHeatExample"=>$req_data[0]["data"]["BreathingHeatExample"],
                    "OutdoorEnthalpy"=>$req_data[0]["data"]["OutdoorEnthalpy"],
                    "IndoorEnthalpy"=>$req_data[0]["data"]["IndoorEnthalpy"],
                    "AirDensity"=>$req_data[0]["data"]["AirDensity"],
                    "ShiftLength"=>$req_data[0]["data"]["ShiftLength"],
                    "SystemUptime"=>$req_data[0]["data"]["SystemUptime"],
                    "StorageTemperature"=>$req_data[0]["data"]["StorageTemperature"],
                    "FreezingPoint"=>$req_data[0]["data"]["FreezingPoint"],
                    "StorageTime"=>$req_data[0]["data"]["StorageTime"],
                    "ProcessingTime"=>$req_data[0]["data"]["ProcessingTime"],
                    "AirExchangeNumber"=>$req_data[0]["data"]["AirExchangeNumber"],
                    "UnitHumanLoad"=>$req_data[0]["data"]["UnitHumanLoad"],
                    "PeopleLoad"=>$req_data[0]["data"]["PeopleLoad"],
                    "TotalLightingLoad"=>$req_data[0]["data"]["TotalLightingLoad"],
                    "ElectricalLoad"=>$req_data[0]["data"]["ElectricalLoad"],
                    "TotalOtherLoads"=>$req_data[0]["data"]["TotalOtherLoads"],
                    "VentilationLoad"=>$req_data[0]["data"]["VentilationLoad"],
                    "TotalHeatGain"=>$req_data[0]["data"]["TotalHeatGain"],
                    "BeforeFreezingLoad"=>$req_data[0]["data"]["BeforeFreezingLoad"],
                    "FreezingLoad"=>$req_data[0]["data"]["FreezingLoad"],
                    "AfterFreezingLoad"=>$req_data[0]["data"]["AfterFreezingLoad"],
                    "BreathingHeatLoad"=>$req_data[0]["data"]["BreathingHeatLoad"],
                    "ProductTemperature"=>$req_data[0]["data"]["ProductTemperature"],
                    "SystemSafetyOverhead"=>$req_data[0]["data"]["SystemSafetyOverhead"],
                    "SystemLoad"=>$req_data[0]["data"]["SystemLoad"],
                    "SystemLoadDaily"=>$req_data[0]["data"]["SystemLoadDaily"],
            ]
        );
        return $response->json();
    }
    }
    public static function coldstorageProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'coldstorageprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function coldstorageProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'coldstorageprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
}
