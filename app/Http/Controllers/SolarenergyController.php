<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Solarenergy;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class SolarenergyController extends Controller
{
    public function index($id="",Request $request)
    {
        try{

$projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;

               return view('Proje.solarenergy',compact('projedetay'));
            }else{
               $projedetay = Solarenergy::ProjeDetay($id,$request);
               $projedetay["data"]["solarenergy_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.solarenergy',compact('projedetay'));

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
                $projedetay = Solarenergy::ProjeDetay($id,$request);


                $projedetay["data"]["solarenergy_id"] = $id;
                return view('ProjeDetay.solarenergy',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    //solarenergy
    public function solarenergyhesap($edit="",$id="", Request $request)
    {
        //dd($request);
        if ($request->session()->has('solarenergyhesap')) {
            $request->session()->forget('solarenergyhesap');
        }
        $messages = [
            'Location.required' => 'Location alanı boş geçilemez',
            'CollectorBrand.required' => 'CollectorBrand alanı boş geçilemez',
            'BuildType.required' => 'BuildType alanı boş geçilemez',
            'NumberOfPeople.required' => 'NumberOfPeople alanı boş geçilemez',
            'SafetyFactor.required' => 'SafetyFactor alanı boş geçilemez',
            'CapacityCoverageRate.required' => 'CapacityCoverageRate alanı boş geçilemez'
        ];
        $validator = Validator::make($request->all(), [
            'Location' => 'required',
            'CollectorBrand' => 'required',
            'BuildType'=>'required',
            'NumberOfPeople' => 'required',
            'SafetyFactor' => 'required',
            'CapacityCoverageRate' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'solarenergy');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'solarenergy');
        $response = Solarenergy::solarenergyHesap($request);

        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("solarenergy");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('solarenergyhesap')[0]["data"]["id"]);
              $request->session()->forget(session('solarenergyhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('solarenergyhesap',$response);
          toast('SolarEnergy hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("solarenergy");

        }


    }
    public function solarenergyhesapkaydet($update="",$id="",Request $request)
    {
        $response = Solarenergy::solarenergyHesapKaydet($update,$id,$request);


        if($response["data"]==true)
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('solarenergyhesap')) {
                    $request->session()->forget('solarenergyhesap');
                }
                $request->session()->flash('status', 'solarenergy');
                toast('Solar Energy Projeniz kaydedilmiştir','success');
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
    public function solarenergydetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'solarenergy');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $solarenergydetail = Solarenergy::solarenergyProjectDetay($request);
        $request->session()->flash('status', 'solarenergy');
        return view('solarenergydetailmodal',compact('solarenergydetail'));
    }
    public function solarenergyprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Solarenergy::solarenergyProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'solarenergy');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect()->back();
            }else{
                $request->session()->flash('status', 'solarenergy');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
