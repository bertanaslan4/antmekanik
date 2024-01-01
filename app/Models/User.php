<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Config;
use Hash;
class User extends Authenticatable
{


    public static function GirisYap($data=[])
    {

        $api_url = env('APP_API_URL');

        $response = Http::post($api_url.'login', [
            'email' =>$data['email'],
            'password' =>$data['password'],
        ]);
        return $response->json();
    }



    public static function MusteriOlustur($data=[])
    {
        $api_url = env('APP_API_URL');
        $response = Http::post($api_url.'userregister',[
            'kilit_id' =>$data['kilit_id'],

        ]);
        return $response->json();

    }
    public static function userregister($data=[]){
        $api_url = env('APP_API_URL');
        $response = Http::post($api_url.'userregisterupdate',[
            'email'=>$data['email'],
            'password'=>$data['password'],
            'kilit_id' =>$data['kilit_id'],

        ]);
        return $response->json();
    }

    public static function createCustomer($data=[]){
        $kullanici_id = $data->session()->get("id");
        $sql=DB::table('kullanicilar')->where('id',$kullanici_id)->update([
            'name'=>$data["name"],
            'email'=>$data["email"],
            'telefon'=>$data["telefon"],
            'adres'=>$data["adres"],
            'tc'=>$data["tc"],
            'firma'=>$data["firma"],


        ]);
        if($sql){
            return $sql;
        }else
        {
            return $sql;
        }

    }
    public static function bakiye($data){
        $kullanici_id = $data->session()->get("id");
        $sql = DB::table('kullanicilar')->where('id',$kullanici_id);

        $response= $sql->get()->toArray();
        return $response;
    }
    public static function bakiyedus($data){
        $kullanici_id = $data->session()->get("id");
        $sql = DB::table('kullanicilar')->where('id',$kullanici_id);

        $response= $sql->get()->toArray();
        if($response[0]->bakiye==0){
            return 0;
        }else
        {
            $bakiye=($response[0]->bakiye)-1;
            $bak= DB::table('kullanicilar')->where('id',$kullanici_id)->update(array("bakiye"=>$bakiye));
            return $bak;
        }
    }

    public static function sifremiunuttum($data=[]){

        $api_url = env('APP_API_URL');
        $response =Http::withToken($data->session()->get('token'))->post($api_url.'forgotpasword',
        [
           "email"=>$data["email"]
        ]);
        return $response->json();


       }

    public static function musterilistele($data=[])
    {
        $api_url = env('APP_API_URL');
        $response =Http::withToken($data->session()->get('token'))->post($api_url.'Musterilistele');
        return $response->json();

    }


    public static function musteriedit($id="",$data=[])
    {

        $api_url = env('APP_API_URL');
        $response =Http::withToken($data->session()->get('token'))->post($api_url.'MusteriEdit',
        [
           "id"=>$id
        ]);
        return $response->json();

    }


    public static function musteriUpdate($id="",$data=[])
    {

        $api_url = env('APP_API_URL');
        $response =Http::withToken($data->session()->get('token'))->post($api_url.'Musteriupdate',
        [
           "id"=>$id,
           "kilit_id"=>$data['kilit_id'],
           "name"=>$data['name'],
           "email"=>$data['email'],
           "telefon"=>$data['telefon'],
           "adres"=>$data['adres'],
           "lisanssuresi"=>$data['lisanssuresi'],
           "tc"=>$data['tc'],
           "vd"=>$data['vd'],
           "firma"=>$data['firma'],
           "active"=>$data['active'],
           "role"=>$data['role'],

        ]);
        return $response->json();

    }



    public static function musterisil($id="",$data=[])
    {

        $api_url = env('APP_API_URL');
        $response =Http::withToken($data->session()->get('token'))->post($api_url.'MusteriDelete',
        [
           "id"=>$id,

        ]);
        return $response->json();

    }


    public static function mailgonder($data=[])
    {
        $api_url = env('APP_API_URL');
        $response =Http::withToken($data->session()->get('token'))->post($api_url.'Mailsend',
        [
           "id"=>$data->session()->get('id'),

        ]);
        return $response->json();
    }




    public static function CikisYap($data=[])
    {

        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'logout');

        return $response->json();
    }
    public static function sonProje($id){
        $sql = DB::table('Projeler')->where('id',$id)->orderBy('proje_tarih', 'DESC');

        $response= $sql->get()->toArray();


        return $response;

    }
}
