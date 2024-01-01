<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
class Dashboard extends Model
{
    public static function istatistikget($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'istatistik');

        return $response->json();

    }
    
    
   
    
   

}
