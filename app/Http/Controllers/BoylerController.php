<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Boyler;
use App\Models\Project;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class BoylerController extends Controller
{
    public function index($id="",Request $request)
    {
        try{

            $projedetay["BoylerBrand"] = Project::getBrand("BoylerBrand",$request);
            $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.boyler',compact('projedetay'));
            }else{
               $projedetay = Boyler::ProjeDetay($id,$request);
               $projedetay["data"]["boyler_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.boyler',compact('projedetay'));

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
                $projedetay = Boyler::ProjeDetay($id,$request);

                //dd($projedetay);


                $projedetay["data"]["boyler_id"] = $id;
                return view('ProjeDetay.boyler',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    public function boylerhesap($edit="",$id="",Request $request)
    {
        if ($request->session()->has('boylerhesap')) {
            $request->session()->forget('boylerhesap');
        }
        $messages = [
            'Equipment.required' => 'TemperatureDiff Type alanı boş geçilemez',
            'SpecificHeat.required' => 'PressureDrop alanı boş geçilemez',
            'BuildType.required' => 'Boiler Capacity alanı boş geçilemez',
            'Density.required' => 'StaticHeight alanı boş geçilemez',
            'piece.required' =>'Piece alanı boş geçilemez',
            'BoylerTempIn.required' =>'BoylerTempIn alanı boş geçilemez',
            'BoylerTempOut.required' =>'BoylerTempOut alanı boş geçilemez',
            'PrepareTime.required' => 'PrepareTime alanı boş geçilemez',
            'brand.required' => 'Marka alanı boş geçilemez',

        ];
        $validator = Validator::make($request->all(), [
            'Equipment' => 'required',
            'SpecificHeat' => 'required',
            'BuildType' => 'required',
            'Density' => 'required',
            'piece' => 'required',
            'BoylerTempIn' => 'required',
            'BoylerTempOut' => 'required',
            'PrepareTime' => 'required',
            'brand' => 'required',

        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'boyler');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'boyler');
        $response = Boyler::BoylerHesap($request);
        //dd($response);
        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("boyler");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('boylerhesap')[0]["data"]["id"]);
              $request->session()->forget(session('boylerhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('boylerhesap',$response);
          toast('Boyler hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("boyler");

        }
    }
    public function boylerhesapkaydet($update="",$id="",Request $request)
    {

        $response = Boyler::BoylerHesapKaydet($update,$id,$request);
         //dd($response);
        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('boylerhesap')) {
                    $request->session()->forget('boylerhesap');
                }
                $request->session()->flash('status', 'boyler');
                toast('Boyler Projeniz kaydedilmiştir','success');
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
    public function boylerdetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'boyler');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $boylerdetail = Boyler::BoylerProjectDetay($request);

        $request->session()->flash('status', 'boyler');

        return view('boylerdetailmodal',compact('boylerdetail'));
    }
    public function boylerprojesil($data="",Request $request)
    {

        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Boyler::BoylerProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'boyler');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'boyler');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
