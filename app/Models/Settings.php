<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
class Settings extends Model
{

    public static function defaultvariable($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'default-variable',
            [
               "kid"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function defaultUpdate($data=[])
    {
        $api_url = env('APP_API_URL');
        $req_data = $data->all();
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'default-variable-update',
            [
               "kid"=>$data->session()->get("id"),
               "colum"=>$req_data["updatecol"],
               "valcolm"=>$req_data["updatedata"],

            ]
        );

        return $response->json();

    }

}