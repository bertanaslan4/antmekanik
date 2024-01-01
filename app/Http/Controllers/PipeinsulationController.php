<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pipeinsulation;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PipeinsulationController extends Controller
{
    public function index($id="",Request $request)
    {
        try{

$projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.pipeinsulation',compact('projedetay'));
            }else{
               $projedetay = Pipeinsulation::ProjeDetay($id,$request);
               $projedetay["data"]["pipeinsulation_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.pipeinsulation',compact('projedetay'));

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
                $projedetay = Pipeinsulation::ProjeDetay($id,$request);
                $projedetay["data"]["pipeinsulation_id"] = $id;
                return view('ProjeDetay.pipeinsulation',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    //pipeinsulation
    public function pipeinsulationhesap($edit="",$id="", Request $request)
    {
        if ($request->session()->has('pipeinsulationhesap')) {
            $request->session()->forget('pipeinsulationhesap');
        }
        $messages = [
            'ServicePipeType.required' => 'ServicePipeType alanı boş geçilemez',
            'PipeDiameter.required' => 'PipeDiameter alanı boş geçilemez',
            'SheathPipeType.required' => 'SheathPipeType alanı boş geçilemez',
            'SoilType.required' => 'SoilType alanı boş geçilemez',
            'SoilTemperature.required' => 'SoilTemperature alanı boş geçilemez',
            'FluidAvgTemperature.required' => 'FluidAvgTemperature alanı boş geçilemez',
            'SoilFillingHeight.required' => 'SoilFillingHeight alanı boş geçilemez',
            'LineLength.required' => 'LineLength alanı boş geçilemez',
            'WaterFlow.required' => 'WaterFlow alanı boş geçilemez',
            'WaterMass'=> 'WaterMass alanı boş geçilemez',
            'SpecificHeatOfWater'=> 'SpecificHeatOfWater alanı boş geçilemez',
            'MaterialLamda'=> 'MaterialLamda alanı boş geçilemez',
        ];
        $validator = Validator::make($request->all(), [
            'ServicePipeType' => 'required',
            'PipeDiameter' => 'required',
            'SheathPipeType'=>'required',
            'SoilType' => 'required',
            'SoilTemperature' => 'required',
            'FluidAvgTemperature' => 'required',
            'SoilFillingHeight' => 'required',
            'LineLength' => 'required',
            'WaterFlow' => 'required',
            'WaterMass'=> 'required',
            'SpecificHeatOfWater'=> 'required',
            'MaterialLamda'=> 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'pipeinsulation');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'pipeinsulation');
        $response = Pipeinsulation::pipeinsulationHesap($request);
        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("pipeinsulation");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('pipeinsulationhesap')[0]["data"]["id"]);
              $request->session()->forget(session('pipeinsulationhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('pipeinsulationhesap',$response);
          toast('Pipe İnsulation hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("pipeinsulation");

        }


    }
    public function pipeinsulationhesapkaydet( $update="",$id="",Request $request)
    {
        $response = Pipeinsulation::pipeinsulationHesapKaydet( $update,$id,$request);

          //dd($response);
        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('pipeinsulationhesap')) {
                    $request->session()->forget('pipeinsulationhesap');
                }
                $request->session()->flash('status', 'pipeinsulation');
                toast('Pipe İnsulation Projeniz kaydedilmiştir','success');
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
    public function pipeinsulationdetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'pipeinsulation');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $pipeinsulationdetail = Pipeinsulation::pipeinsulationProjectDetay($request);
        $request->session()->flash('status', 'pipeinsulation');
        return view('pipeinsulationdetailmodal',compact('pipeinsulationdetail'));
    }
    public function pipeinsulationprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Pipeinsulation::pipeinsulationProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'pipeinsulation');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'pipeinsulation');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
