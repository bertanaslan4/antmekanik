<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Fuelamount;
use App\Models\Project;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class FuelamountController extends Controller
{
    public function index($id="",Request $request)
    {

        try{
           $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");

            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.fuelamount',compact('projedetay'));
            }else{
               $projedetay = Fuelamount::ProjeDetay($id,$request);
               $projedetay["data"]["fuelamount_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.fuelamount',compact('projedetay'));

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
                $projedetay = Fuelamount::ProjeDetay($id,$request);
                $projedetay["data"]["fuelamount_id"] = $id;
                return view('ProjeDetay.fuelamount',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }

    public  function fuelamounthesap($edit="",$id="", Request $request)
    {
        if ($request->session()->has('fuelamounthesap')) {
            $request->session()->forget('fuelamounthesap');
        }
        $messages = [
            'FuelTypeKazan.required' => 'Fuel Type alanı boş geçilemez',
            'piecekazan.required' => 'DistributionPipe alanı boş geçilemez',
            'BoilerEfficiencyKazan.required' => 'Boiler Efficiency alanı boş gecilemez',
            "BoilerCapacityKazan.required"=>'Kazan Kapasitesi alanı boş geçilemez',
            'LiquitFuelTypeKazan'=>'Liquit Fuel Type alanı boş geçilemez',

        ];
        $validator = Validator::make($request->all(), [
            'FuelTypeKazan' => 'required',
            'piecekazan' => 'required',
            'BoilerEfficiencyKazan'=>'required',
            'BoilerCapacityKazan'=>'required',
            'LiquitFuelTypeKazan'=> 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'fuelamount');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'fuelamount');
        $response = Fuelamount::fuelamounthesap($request);



        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("fuelamount");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('fuelamounthesap')[0]["data"]["id"]);
              $request->session()->forget(session('fuelamounthesap')[0]["data"]["edit"]);
          }
          $request->session()->push('fuelamounthesap',$response);
          toast('Fuel-Amount hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("fuelamount");

        }
    }
    public function fuelamounthesapkaydet($update="",$id="",Request $request)
    {
        $response = Fuelamount::FuelAmountHesapKaydet($update,$id,$request);
         // dd($response );
        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('fuelamounthesap')) {
                    $request->session()->forget('fuelamounthesap');
                }
                $request->session()->flash('status', 'fuelamount');
                toast('Fuel Amount Projeniz kaydedilmiştir','success');
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
    public function fuelamoundetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'fuelamount');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $fuelamount_detail = Fuelamount::FuelamountProjectDetay($request);

        $request->session()->flash('status', 'fuelamount');

        return view('fuelamountdetailmodal',compact('fuelamount_detail'));
    }
    public function fuelamountprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Fuelamount::FuelAmountProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'fuelamount');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'fuelamount');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
