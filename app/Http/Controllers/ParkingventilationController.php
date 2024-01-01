<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Parkingventilation;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ParkingventilationController extends Controller
{
    public function index($id="",Request $request)
    {
        try{
           $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");

            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.parkingventilation',compact('projedetay'));
            }else{
               $projedetay = Parkingventilation::ProjeDetay($id,$request);
               $projedetay["data"]["parkingventilation_id"] = $id;
               $projedetay["data"]["edit"] =1;
               //dd($projedetay["data"][0]);
               return view('Proje.parkingventilation',compact('projedetay'));

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
                $projedetay = Parkingventilation::ProjeDetay($id,$request);
                $projedetay["data"]["parkingventilation_id"] = $id;
                return view('ProjeDetay.parkingventilation',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    //parkingventilation
    public function parkingventilationhesap($edit="",$id="", Request $request)
    {
        if ($request->session()->has('parkingventilationhesap')) {
            $request->session()->forget('parkingventilationhesap');
        }
        $messages = [
            'CalculationType.required' => 'CalculationType alanı boş geçilemez',
            'ParkingType.required' => 'ParkingType alanı boş geçilemez',
            'FlowCalcMethod.required' => 'FlowCalcMethod alanı boş geçilemez',
            'ParkingArea.required' => 'ParkingArea alanı boş geçilemez',
            'ParkingHeight.required' => 'ParkingHeight alanı boş geçilemez',
            'NumberOfVehicles.required' => 'NumberOfVehicles alanı boş geçilemez',
            'DrivingRoadLength.required' => 'DrivingRoadLength alanı boş geçilemez',
            'WasteGasCO'=> 'WasteGasCO alanı boş geçilemez',
            'OutdoorCO'=> 'OutdoorCO alanı boş geçilemez',
            'VehicleExitFrequency'=> 'VehicleExitFrequency alanı boş geçilemez',
            'ParkingSpeed'=> 'ParkingSpeed alanı boş geçilemez',
            'DetectorDensity'=> 'DetectorDensity alanı boş geçilemez',
            'ParkingCulvertBelow100'=> 'ParkingCulvertBelow100 alanı boş geçilemez',
            'ParkingCulvertAbove100'=> 'ParkingCulvertAbove100 alanı boş geçilemez',
            ];
        $validator = Validator::make($request->all(), [
            'CalculationType' => 'required',
            'ParkingType' => 'required',
            'FlowCalcMethod'=>'required',
            'ParkingArea' => 'required',
            'ParkingHeight' => 'required',
            'NumberOfVehicles' => 'required',
            'DrivingRoadLength' => 'required',
            'WasteGasCO'=> 'required',
            'OutdoorCO'=> 'required',
            'VehicleExitFrequency'=> 'required',
            'ParkingSpeed'=> 'required',
            'DetectorDensity'=> 'required',
            'ParkingCulvertBelow100'=> 'required',
            'ParkingCulvertAbove100'=> 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'parkingventilation');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'parkingventilation');
        $response = Parkingventilation::parkingventilationHesap($request);
        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("parkingventilation");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('parkingventilationhesap')[0]["data"]["id"]);
              $request->session()->forget(session('parkingventilationhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('parkingventilationhesap',$response);
          toast('Parking Ventilation hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("parkingventilation");

        }
    }
    public function parkingventilationhesapkaydet($update="",$id="",Request $request)
    {
        $response = Parkingventilation::parkingventilationHesapKaydet($update,$id,$request);
        //dd($response["data"]);

        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('parkingventilationhesap')) {
                    $request->session()->forget('parkingventilationhesap');
                }
                $request->session()->flash('status', 'parkingventilation');
                toast('Parking Ventilation Projeniz kaydedilmiştir','success');
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
    public function parkingventilationdetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'parkingventilation');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $parkingventilationdetail = Parkingventilation::parkingventilationProjectDetay($request);
        $request->session()->flash('status', 'parkingventilation');
        return view('parkingventilationdetailmodal',compact('parkingventilationdetail'));
    }
    public function parkingventilationprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Parkingventilation::parkingventilationProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'parkingventilation');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'parkingventilation');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
