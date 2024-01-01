<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Rainwater;
use App\Models\Project;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RainwaterController extends Controller
{
    public function index($id="",Request $request)
    {
        try{
           $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");

            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.rainwater',compact('projedetay'));
            }else{
               $projedetay = Rainwater::ProjeDetay($id,$request);
               $projedetay["data"]["rainwater_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.rainwater',compact('projedetay'));

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
                $projedetay = Rainwater::ProjeDetay($id,$request);
                $projedetay["data"]["rainwater_id"] = $id;
                return view('ProjeDetay.rainwater',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    //rain water

    public function rainwaterhesap($edit="",$id="",  Request $request)
    {
        if ($request->session()->has('rainwaterhesap')) {
            $request->session()->forget('rainwaterhesap');
        }
        $messages = [
            'Location.required' => 'Location  alanı boş geçilemez',
            'RoofType.required' => 'RoofType alanı boş geçilemez',
            'RainArea.required' => 'RainArea alanı boş geçilemez',
            'RainPipe.required' => 'RainPipe alanı boş geçilemez',
        ];
        $validator = Validator::make($request->all(), [
            'Location' => 'required',
            'RoofType' => 'required',
            'RainArea' => 'required',
            'RainPipe' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'rainwater');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        //dd($request);
        $request->session()->flash('status', 'rainwater');
        $response = Rainwater::RainwaterHesap($request);
        //dd($response);
        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("rainwater");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('rainwaterhesap')[0]["data"]["id"]);
              $request->session()->forget(session('rainwaterhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('rainwaterhesap',$response);
          toast('Rain Water hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("rainwater");

        }
    }
    public function rainwaterhesapkaydet($update="",$id="",Request $request)
    {
        $response = Rainwater::RainWaterHesapKaydet($update,$id,$request);

        // dd($response);
        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('rainwaterhesap')) {
                    $request->session()->forget('rainwaterhesap');
                }
                $request->session()->flash('status', 'rainwater');
                toast('Rain Water Projeniz kaydedilmiştir','success');
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
    public function rainwaterdetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'rainwater');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $rainwaterdetail = Rainwater::RainwaterProjectDetay($request);

        $request->session()->flash('status', 'rainwater');

        return view('rainwaterdetailmodal',compact('rainwaterdetail'));
    }
    public function rainwaterprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Rainwater::RainWaterProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'rainwater');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect()->back();
            }else{
                $request->session()->flash('status', 'rainwater');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
