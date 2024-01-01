<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Shelterventilation extends Model
{
    public static function shelterventilationProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'shelterventilationprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'shelterventilationprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
      //shelterventilation
      public static function shelterventilationHesap($data=[]){
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'/shelter-ventilation',
                [

                    "CalculationType"=>$req_data["CalculationType"],
                    "NeedFreshAir"=>$req_data["NeedFreshAir"],
                    "ShelterArea"=>$req_data["ShelterArea"],
                    "ShelterHeight"=>$req_data["ShelterHeight"],
                ]
        );
        return $response->json();
    }
    public static function shelterventilationHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('shelterventilationhesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');

        if($update==1 && isset($id))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'shelterventilationupdate',
            [        'id'=>$id,
                    'kullanici_id'=>$kullanici_id,
                    "adi"=>$req_data[0]["data"]["adi"],
                    "aciklama"=>$req_data[0]["data"]["aciklama"],
                    "CalculationType"=>$req_data[0]["data"]["CalculationType"],
                    "NeedFreshAir"=>$req_data[0]["data"]["NeedFreshAir"],
                    "ShelterArea"=>$req_data[0]["data"]["ShelterArea"],
                    "ShelterHeight"=>$req_data[0]["data"]["ShelterHeight"],
                    "SandFilterAirFlow"=>$req_data[0]["data"]["SandFilterAirFlow"],
                    "SandFilterHeight"=>$req_data[0]["data"]["SandFilterHeight"],
                    "SandFilterAirSpeed"=>$req_data[0]["data"]["SandFilterAirSpeed"],
                    "SandFilterPermeabilityRate"=>$req_data[0]["data"]["SandFilterPermeabilityRate"],
                    "Filtration"=>$req_data[0]["data"]["Filtration"],
                    "NumberOfPeople"=>$req_data[0]["data"]["NumberOfPeople"],
                    "TotalFlow"=>$req_data[0]["data"]["TotalFlow"],
                    "SandFilterPool"=>$req_data[0]["data"]["SandFilterPool"],
                    "SandPoolDiffuserCalc"=>$req_data[0]["data"]["SandPoolDiffuserCalc"],
                    "SmokeEvacuation"=>$req_data[0]["data"]["SmokeEvacuation"],
            ]
        );
        return $response->json();

            //ekleme
        }else{

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'shelterventilationSave',
            [
                    'kullanici_id'=>$kullanici_id,
                    "adi"=>$req_data[0]["data"]["adi"],
                    "aciklama"=>$req_data[0]["data"]["aciklama"],
                    "CalculationType"=>$req_data[0]["data"]["CalculationType"],
                    "NeedFreshAir"=>$req_data[0]["data"]["NeedFreshAir"],
                    "ShelterArea"=>$req_data[0]["data"]["ShelterArea"],
                    "ShelterHeight"=>$req_data[0]["data"]["ShelterHeight"],
                    "SandFilterAirFlow"=>$req_data[0]["data"]["SandFilterAirFlow"],
                    "SandFilterHeight"=>$req_data[0]["data"]["SandFilterHeight"],
                    "SandFilterAirSpeed"=>$req_data[0]["data"]["SandFilterAirSpeed"],
                    "SandFilterPermeabilityRate"=>$req_data[0]["data"]["SandFilterPermeabilityRate"],
                    "Filtration"=>$req_data[0]["data"]["Filtration"],
                    "NumberOfPeople"=>$req_data[0]["data"]["NumberOfPeople"],
                    "TotalFlow"=>$req_data[0]["data"]["TotalFlow"],
                    "SandFilterPool"=>$req_data[0]["data"]["SandFilterPool"],
                    "SandPoolDiffuserCalc"=>$req_data[0]["data"]["SandPoolDiffuserCalc"],
                    "SmokeEvacuation"=>$req_data[0]["data"]["SmokeEvacuation"],
            ]
        );
        return $response->json();
    }
    }
    public static function shelterventilationProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'shelterventilationprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }

    public static function shelterventilationProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'shelterventilationprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
}
