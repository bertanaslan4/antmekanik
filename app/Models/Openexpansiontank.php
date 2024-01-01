<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Openexpansiontank extends Model
{
    public static function openexpansionProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'openexpansionprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'openexpansionprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
    public static function OpenExpansionHesap($data=[])
    {
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'open-expansion-tank',
                [
                    "HeaterType"=>$req_data["HeaterType"],
                    "WaterHeat"=>$req_data["waterexpansion"],
                    "BoilerCapacity"=>$req_data["BoilerCapacityKazan"],
                ]
        );
        return $response->json();

    }
    public static function OpenExpansionHesapKaydet($update,$id,$data=[])
    {
        $req_data = $data->session()->get('openexpansiontankhesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
        $proje_id=$data->session()->get("proje_id");
        //dd($req_data);
        if($update==1 && isset($id))
        {


            $response = Http::withToken($data->session()->get('token'))->post($api_url.'openexpansionupdate',
            [    'id'=>$id,
                "kullanici_id"=>$kullanici_id,
                "adi" =>$req_data[0]["data"]["adi"],
                "aciklama" =>$req_data[0]["data"]["aciklama"],
                "HeaterType" =>$req_data[0]["data"]["HeaterType"],
                "WaterHeat" =>$req_data[0]["data"]["WaterHeat"],
                "BoilerCapacity" =>$req_data[0]["data"]["BoilerCapacity"],
                "Expansion" =>$req_data[0]["data"]["Expansion"],
                "WaterExpansion" =>$req_data[0]["data"]['WaterExpansion'],
                "WaterVolume" =>$req_data[0]["data"]["WaterVolume"],
                "TankVolume" =>$req_data[0]["data"]["TankVolume"],
                "DiameterG" =>$req_data[0]["data"]["DiameterG"],
                "DiameterD" =>$req_data[0]["data"]["DiameterD"],
                "DiameterH" =>$req_data[0]["data"]["DiameterH"],
                "DiameterInchG" =>$req_data[0]["data"]["DiameterInchG"],
                "DiameterInchD" =>$req_data[0]["data"]["DiameterInchD"],
                "DiameterInchH"=>$req_data[0]["data"]["DiameterInchH"],
                "proje_id"=>$proje_id,
            ]
        );
        return $response->json();


            //ekleme
        }else{

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'openexpansionSave',
            [
                'kullanici_id'=>$kullanici_id,
                'adi' =>$req_data[0]["data"]['adi'],
                'aciklama' =>$req_data[0]["data"]['aciklama'],
                'HeaterType' =>$req_data[0]["data"]['HeaterType'],
                'WaterHeat' =>$req_data[0]["data"]['WaterHeat'],
                'BoilerCapacity' =>$req_data[0]["data"]['BoilerCapacity'],
                'Expansion' =>$req_data[0]["data"]['Expansion'],
                'WaterExpansion' =>$req_data[0]["data"]['WaterExpansion'],
                'WaterVolume' =>$req_data[0]["data"]['WaterVolume'],
                'TankVolume' =>$req_data[0]["data"]['TankVolume'],
                'DiameterG' =>$req_data[0]["data"]['DiameterG'],
                'DiameterD' =>$req_data[0]["data"]['DiameterD'],
                'DiameterH' =>$req_data[0]["data"]['DiameterH'],
                'DiameterInchG' =>$req_data[0]["data"]['DiameterInchG'],
                'DiameterInchD' =>$req_data[0]["data"]['DiameterInchD'],
                'DiameterInchH'=>$req_data[0]["data"]['DiameterInchH'],
                "proje_id"=>$proje_id,
            ]
        );
        return $response->json();
    }
    }


    public static function OpenExpansionProjectDetay($data=[])
    {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'openexpansionprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }

    public static function OpenExpansionProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'openexpansionprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();

    }
}
