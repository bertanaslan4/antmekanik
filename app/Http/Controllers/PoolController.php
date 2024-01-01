<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pool;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PoolController extends Controller
{
    public function index($id="",Request $request)
    {
        try{

$projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.pool',compact('projedetay'));
            }else{
               $projedetay = Pool::ProjeDetay($id,$request);
               $projedetay["data"]["pool_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.pool',compact('projedetay'));

            }

           } catch (\Exception $e) {

             return redirect('/dashboard');

           }
    }
    public function ProjeDetay($id="",Request $request)
    {
        try {
            if(empty($id))
            {
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
                return redirect()->back();

            }else{
                $projedetay = Pool::ProjeDetay($id,$request);



                $projedetay["data"]["pool_id"] = $id;
                return view('ProjeDetay.pool',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    //pool
    public function poolhesap($edit="",$id="",  Request $request)
    {
        if ($request->session()->has('poolhesap')) {
            $request->session()->forget('poolhesap');
        }
        $messages = [
            'PoolVolume.required' => 'PoolVolume alanı boş geçilemez',
            'PoolArea.required' => 'PoolArea alanı boş geçilemez',
            'NumberOfUser.required' => 'NumberOfUser alanı boş geçilemez',
            'CirculationPeriod.required' => 'CirculationPeriod alanı boş geçilemez',
            'SuctionStrainerArea.required' => 'SuctionStrainerArea alanı boş geçilemez',
            'LightingIntensity.required' => 'LightingIntensity alanı boş geçilemez',
            'FeedWaterSpeed'=> 'FeedWaterSpeed alanı boş geçilemez',
            'SuctionWaterSpeed'=> 'SuctionWaterSpeed alanı boş geçilemez',
            'SuctionCollectorSpeed'=> 'SuctionCollectorSpeed alanı boş geçilemez',
            'ReinforcementPerPerson'=> 'ReinforcementPerPerson alanı boş geçilemez',
            'LightingLampIntensity'=> 'LightingLampIntensity alanı boş geçilemez',
        ];
        $validator = Validator::make($request->all(), [
            'PoolVolume' => 'required',
            'PoolArea' => 'required',
            'NumberOfUser'=>'required',
            'CirculationPeriod' => 'required',
            'SuctionStrainerArea' => 'required',
            'LightingIntensity' => 'required',
            'FeedWaterSpeed'=> 'required',
            'SuctionWaterSpeed'=> 'required',
            'SuctionCollectorSpeed'=> 'required',
            'ReinforcementPerPerson'=> 'required',
            'LightingLampIntensity'=> 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'pool');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'pool');
        $response = Pool::poolHesap($request);



        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("pool");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('poolhesap')[0]["data"]["id"]);
              $request->session()->forget(session('poolhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('poolhesap',$response);
          toast('Pool hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("pool");

        }


    }
    public function poolhesapkaydet($update="",$id="",Request $request)
    {
        $response = Pool::poolHesapKaydet($update,$id,$request);
        //dd($response);
        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('poolhesap')) {
                    $request->session()->forget('poolhesap');
                }
                $request->session()->flash('status', 'pool');
                toast('Pool Projeniz kaydedilmiştir','success');
                return redirect()->back();
            }
            else
            {
                toast('Bakiyeniz Eksik','error');
                return redirect()->back();
            }

        }else{
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }
    }
    public function pooldetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'pool');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $pooldetail = Pool::poolProjectDetay($request);
        $request->session()->flash('status', 'pool');
        return view('pooldetailmodal',compact('pooldetail'));
    }
    public function poolprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Pool::poolProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'pool');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect()->back();
            }else{
                $request->session()->flash('status', 'pool');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
