<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Circulationpump;
use App\Models\Project;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CirculationpumpController extends Controller
{
    public function index($id="",Request $request)
    {
        try{

            $projedetay["PumpBrand"] = Project::getBrand("PumpBrand",$request);
            $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.circulationpump',compact('projedetay'));
            }else{
               $projedetay = Circulationpump::ProjeDetay($id,$request);
               $projedetay["data"]["circulationpump_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.circulationpump',compact('projedetay'));

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
                $projedetay = Circulationpump::ProjeDetay($id,$request);
                //dd($projedetay);
                $projedetay["data"]["circulationpump_id"] = $id;
                return view('ProjeDetay.circulationpump',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    //circulationpumphesap

    public function circulationpumphesap ($edit="",$id="",Request $request) {

        if ($request->session()->has('circulationpumphesap')) {
            $request->session()->forget('circulationpumphesap');
        }
        $messages = [
            'TemperatureDiff.required' => 'TemperatureDiff Type alanı boş geçilemez',
            'PressureDrop.required' => 'PressureDrop alanı boş geçilemez',
            'BoilerCapacityKazan.required' => 'Boiler Capacity alanı boş geçilemez',
            'piece.required' => 'StaticHeight alanı boş geçilemez',
            'PumpEfficiency'=> 'PumpEfficiency alanı boş geçilemez',
            'EngineEfficiency'=> 'EngineEfficiency alanı boş geçilemez',
            'SpecificHeat'=> 'SpecificHeat alanı boş geçilemez',
            'Density'=> 'Density alanı boş geçilemez',
            'brand'=> 'Marka alanı boş geçilemez',

        ];
        $validator = Validator::make($request->all(), [
            'TemperatureDiff' => 'required',
            'PressureDrop' => 'required',
            'BoilerCapacityKazan' => 'required',
            'piece' => 'required',
            'PumpEfficiency'=>'required',
            'EngineEfficiency'=>'required',
            'SpecificHeat'=>'required',
            'Density'=>'required',
            'brand'=>'required',

        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'circulationpump');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'circulationpump');
        //dd($request);
        $response = Circulationpump::CirculationPumpHesap($request);
        //dd($response);
        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("circulationpump");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('circulationpumphesap')[0]["data"]["id"]);
              $request->session()->forget(session('circulationpumphesap')[0]["data"]["edit"]);
          }
          $request->session()->push('circulationpumphesap',$response);
          toast('Circulation Pump hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("circulationpump");

        }

    }
    public function circulationpumphesapkaydet ($update="",$id="",Request $request) {
        $response = Circulationpump::CirculationPumpHesapKaydet($update,$id,$request);

       // dd($update);

        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('circulationpumphesap')) {
                    $request->session()->forget('circulationpumphesap');
                }
                $request->session()->flash('status', 'circulationpump');
                toast('Circulation Pump Projeniz kaydedilmiştir','success');
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
    public function circulationpumpdetail(Request $request) {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'circulationpump');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $circulationpumpdetail = Circulationpump::CirculationPumpProjectDetay($request);

        $request->session()->flash('status', 'circulationpump');

        return view('circulationpumpdetailmodal',compact('circulationpumpdetail'));
    }
    public function circulationpumpprojesil($data="",Request $request) {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Circulationpump::CirculationPumpProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'circulationpump');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'circulationpump');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
