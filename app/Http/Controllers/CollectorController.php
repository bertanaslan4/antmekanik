<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Collector;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CollectorController extends Controller
{
    public function index($id="",Request $request)
    {

        try{
           $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");

            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.collector',compact('projedetay'));
            }else{
               $projedetay = Collector::ProjeDetay($id,$request);
               $projedetay["data"]["collector_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.collector',compact('projedetay'));

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
                $projedetay = Collector::ProjeDetay($id,$request);
                $projedetay["data"]["collector_id"] = $id;
                return view('ProjeDetay.collector',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    //collector
    public function collectorhesap($edit="",$id="", Request $request)
    {
        if ($request->session()->has('collectorhesap')) {
            $request->session()->forget('collectorhesap');
        }
        $messages = [
            'CollectorCapacity.required' => 'CollectorCapacity alanı boş geçilemez',
            'TempratureAvg.required' => 'TempratureAvg alanı boş geçilemez',
            'WaterRegime.required' => 'WaterRegime alanı boş geçilemez',
            'TransferorWater.required' => 'TransferorWater alanı boş geçilemez',
            'SpecificHeat.required' => 'SpecificHeat alanı boş geçilemez',
            'Density.required' => 'Density alanı boş geçilemez'
        ];
        $validator = Validator::make($request->all(), [
            'CollectorCapacity' => 'required',
            'TempratureAvg' => 'required',
            'WaterRegime'=>'required',
            'SpecificHeat' => 'required',
            'SpecificHeat' => 'required',
            'Density' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'collector');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'collector');
        $response = Collector::collectorHesap($request);
        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("collector");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('collectorhesap')[0]["data"]["id"]);
              $request->session()->forget(session('collectorhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('collectorhesap',$response);
            toast('Collector hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("collector");

        }


    }
    public function collectorhesapkaydet($update="",$id="",Request $request)
    {
        $response = Collector::collectorHesapKaydet($update,$id,$request);

         //dd($response);


        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('collectorhesap')) {
                    $request->session()->forget('collectorhesap');
                }
                $request->session()->flash('status', 'collector');
                toast('Collector Projeniz kaydedilmiştir','success');
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
    public function collectordetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'collector');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $collectordetail = Collector::collectorProjectDetay($request);





        $request->session()->flash('status', 'collector');

        return view('collectordetailmodal',compact('collectordetail'));
    }
    public function collectorprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Collector::collectorProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'collector');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'collector');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
