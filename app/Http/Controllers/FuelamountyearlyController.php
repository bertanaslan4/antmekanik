<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\Fuelamountyearly;
use App\Models\Project;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FuelamountyearlyController extends Controller
{
    public function index($id="",Request $request)
    {
        try{

$projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.fuelamountyearly',compact('projedetay'));
            }else{
               $projedetay = Fuelamountyearly::ProjeDetay($id,$request);
               $projedetay["data"]["fuelamountyearly_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.fuelamountyearly',compact('projedetay'));

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
                $projedetay = Fuelamountyearly::ProjeDetay($id,$request);
                $projedetay["data"]["fuelamountyearly_id"] = $id;
                return view('ProjeDetay.fuelamountyearly',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    public  function fuelamountyearlyhesap($edit="",$id="",Request $request)
    {
        if ($request->session()->has('fuelamountyearlyhesap')) {
            $request->session()->forget('fuelamountyearlyhesap');
        }
        $messages = [
            'FuelTypeKazan.required' => 'Fuel Type alanı boş geçilemez',
            'piecekazan.required' => 'DistributionPipe alanı boş geçilemez',
            'BoilerEfficiencyKazan.required' => 'Boiler Efficiency alanı boş gecilemez',
            "BoilerCapacityKazan.required"=>'Kazan Kapasitesi alanı boş geçilemez',
            'LiquitFuelTypeKazan'=>'Liquit Fuel Type alanı boş geçilemez',
            // App
            'BurnerEfficiencyKazan.required' => 'Boiler Efficiency alanı boş gecilemez',
            "YearlyHeatingEnergy.required"=>'Kazan Kapasitesi alanı boş geçilemez',
            'BuildingArea'=>'Liquit Fuel Type alanı boş geçilemez',

        ];
        $validator = Validator::make($request->all(), [
            'FuelTypeKazan' => 'required',
            'piecekazan' => 'required',
            'BoilerEfficiencyKazan'=>'required',
            'BoilerCapacityKazan'=>'required',
            'LiquitFuelTypeKazan'=> 'required',
            'BurnerEfficiencyKazan'=>'required',
            'YearlyHeatingEnergy'=>'required',
            'BuildingArea'=> 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'fuelamountyearly');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'fuelamountyearly');
        $response = Fuelamountyearly::fuelamountyearlyhesap($request);

        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("fuelamountyearly");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('fuelamountyearlyhesap')[0]["data"]["id"]);
              $request->session()->forget(session('fuelamountyearlyhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('fuelamountyearlyhesap',$response);
          toast('Fuel-Amount-Yearly hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("fuelamountyearly");

        }
    }
    public function fuelamountyearlyhesapkaydet($update="",$id="",Request $request)
    {
        $response = Fuelamountyearly::FuelAmountyearlyHesapKaydet($update,$id,$request);

        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('fuelamountyearlyhesap')) {
                    $request->session()->forget('fuelamountyearlyhesap');
                }
                $request->session()->flash('status', 'fuelamountyearly');
                toast('Fuel Amount Yearly Projeniz kaydedilmiştir','success');
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

    public function fuelamounyearlydetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'fuelamountyearly');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $fuelamountyearly_detail = Fuelamountyearly::FuelamountyearlyProjectDetay($request);

        $request->session()->flash('status', 'fuelamountyearly');

        return view('fuelamountyearlydetailmodal',compact('fuelamountyearly_detail'));
    }
    public function fuelamountyearlyprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Fuelamountyearly::FuelAmountyearlyProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'fuelamountyearly');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'fuelamountyearly');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
