<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Heatexchanger;
use App\Models\Project;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HeatexchangerController extends Controller
{
    public function index($id="",Request $request)
    {
      try {

        $projedetay["HeatchangerBrand"] = Project::getBrand("HeatchangerBrand",$request);
         $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");

        if(empty($id))
         {
            $projedetay["data"]["edit"] =0;

            return view('Proje.heatexchanger',compact('projedetay'));

         }else{
            $projedetay = Heatexchanger::ProjeDetay($id,$request);



            $projedetay["data"]["heatexchanger_id"] = $id;
            $projedetay["data"]["edit"] =1;
            return view('Proje.heatexchanger',compact('projedetay'));

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


                $projedetay = Heatexchanger::ProjeDetay($id,$request);
                //dd($projedetay);
                $projedetay["data"]["heatexchanger_id"] = $id;

                return view('ProjeDetay.heatexchanger',compact('projedetay'));
            }


        } catch (\Throwable $th) {

            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }

    //heatexchanger
    public function heatexchangerhesap($edit="",$id="", Request $request)
    {
        if ($request->session()->has('heatexchangerhesap')) {
            $request->session()->forget('heatexchangerhesap');
        }
        $messages = [
            'HeatNeed.required' => 'HeatNeed alanı boş geçilemez',
            'TotalPass.required' => 'TotalPass alanı boş geçilemez',
            'Piece.required' => 'Piece alanı boş geçilemez',
            'HeaterFluidAvg.required' => 'HeaterFluidAvg alanı boş geçilemez',
            'HeatedFluidAvg.required' => 'HeatedFluidAvg alanı boş geçilemez',
            'PollutionFactor.required' => 'PollutionFactor alanı boş geçilemez',
           ];
        $validator = Validator::make($request->all(), [
            'HeatNeed' => 'required',
            'TotalPass' => 'required',
            'Piece'=>'required',
            'HeaterFluidAvg' => 'required',
            'HeatedFluidAvg' => 'required',
            'PollutionFactor' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'heatexchanger');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'heatexchanger');
        $response = Heatexchanger::heatexchangerHesap($request);



        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("heatexchanger");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('heatexchangerhesap')[0]["data"]["id"]);
              $request->session()->forget(session('heatexchangerhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('heatexchangerhesap',$response);
          toast('Isı Degiştirici hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("heatexchanger");

        }


    }
    public function heatexchangerhesapkaydet($update="",$id="",Request $request)
    {
        $messages = [
            'heatexchangers.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'heatexchangers' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'heatexchanger');
            toast('Lütfen Heat Exchangers seçimi yapınız','warning');
            return redirect()->back();
        }
        $response = Heatexchanger::heatexchangerHesapKaydet($update,$id,$request);


         //dd($response);

        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('heatexchangerhesap')) {
                    $request->session()->forget('heatexchangerhesap');
                }
                $request->session()->flash('status', 'heatexchanger');
                toast('Heat Exchangers Projeniz kaydedilmiştir','success');
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


    public function heatexchangerdetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'heatexchanger');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $heatexchangerdetail = Heatexchanger::heatexchangerProjectDetay($request);
        $request->session()->flash('status', 'heatexchanger');
        return view('heatexchangerdetailmodal',compact('heatexchangerdetail'));
    }
    public function heatexchangerprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Heatexchanger::heatexchangerProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'heatexchanger');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'heatexchanger');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
