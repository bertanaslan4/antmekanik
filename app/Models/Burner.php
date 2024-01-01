<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Burner extends Model
{
    //Burner
    public static function BurnerProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'burnerprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }

    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'burnerprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$openexpansion_id

                    ]
                );
                $response = Http::withToken($data->session()->get('token'))->post($api_url.'burnerDetail',
                    [
                        'id'=>$projedetaylari["data"][0]["Burner_id"],
                        "LiquitFuelType"=>$projedetaylari["data"][0]["LiquitFuelType"],
                        "BoilerCapacity"=>$projedetaylari["data"][0]["BoilerCapacity"],
                        "BurnerEfficiency"=>$projedetaylari["data"][0]["BurnerEfficiency"],
                    ]
                );

                

                $data = array("projedetay"=>$response->json(),"adi"=>$projedetaylari["data"][0]["adi"],"aciklama"=>$projedetaylari["data"][0]["aciklama"],"tarih"=>$projedetaylari["data"][0]["tarih"],"projeid"=>$projedetaylari["data"][0]["id"]);
                return $data;

    }

    public static function burnerhesap($data=[]){
        $req_data = $data->all();
        
        $api_url = env('APP_API_URL');
         $result = array_merge($req_data["brand"]);
         //dd($result);

        if(empty($req_data["BurnerEfficiency"]))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'burner',
                [
                    "LiquitFuelType"=>$req_data["LiquitFuelType"],
                    "BoilerCapacity"=>$req_data["BoilerCapacity"],
                    "brand"=>$result,
                ]
            );
        }else{
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'burner',
                [
                    "LiquitFuelType"=>$req_data["LiquitFuelType"],
                    "BoilerCapacity"=>$req_data["BoilerCapacity"],
                    "BurnerEfficiency"=>$req_data["BurnerEfficiency"],
                    "brand"=>$result,
                ]
            );
        }


        return $response->json();
    }
    public static function BurnerHesapKaydet($update,$id,$data=[])
    {
        $req_data = $data->session()->get('burnerhesap');
        $req = $data->all();
        $burner = $data["burner"];
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');
        $proje_id=$data->session()->get("proje_id");
       
        if($update==1 && isset($id))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'burnerupdate',
            [    'id'=>$id,
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "LiquitFuelType"=>$req_data[0]["data"]["LiquitFuelType"],
                "BoilerCapacity"=>$req_data[0]["data"]["BoilerCapacity"],
                "BurnerEfficiency"=>$req_data[0]["data"]["BurnerEfficiency"],
                "LowerHeatValue"=>$req_data[0]["data"]["LowerHeatValue"],
                "Capacity"=>$req_data[0]["data"]["Capacity"],
                "Burner_id"=>$burner,
                'proje_id'=>$proje_id,
            ]
        );
        return $response->json();


            //ekleme 
        }else{
        

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'burnerSave',
            [
                'kullanici_id'=>$kullanici_id,
                "adi"=>$req_data[0]["data"]["adi"],
                "aciklama"=>$req_data[0]["data"]["aciklama"],
                "LiquitFuelType"=>$req_data[0]["data"]["LiquitFuelType"],
                "BoilerCapacity"=>$req_data[0]["data"]["BoilerCapacity"],
                "BurnerEfficiency"=>$req_data[0]["data"]["BurnerEfficiency"],
                "LowerHeatValue"=>$req_data[0]["data"]["LowerHeatValue"],
                "Capacity"=>$req_data[0]["data"]["Capacity"],
                "Burner_id"=>$burner,
                'proje_id'=>$proje_id,
            ]
        );
        return $response->json();
    }
    }
    public static function BurnerProjectDetay($data=[])
    {
        $burner_proje_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'burnerprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),
               "id"=>$burner_proje_id

            ]
        );
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'burnerDetail',
        [
            'id'=>$response["data"][0]["Burner_id"],
            "LiquitFuelType"=>$response["data"][0]["LiquitFuelType"],
            "BoilerCapacity"=>$response["data"][0]["BoilerCapacity"],
            "BurnerEfficiency"=>$response["data"][0]["BurnerEfficiency"],
        ]);

        return $api_response_Data->json();
    }
    public static function BurnerProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'burnerprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
}
