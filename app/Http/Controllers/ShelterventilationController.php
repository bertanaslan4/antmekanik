<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Shelterventilation;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ShelterventilationController extends Controller
{
    public function index($id="",Request $request)
    {
        try{
           $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");

            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.shelterventilation',compact('projedetay'));
            }else{
               $projedetay = Shelterventilation::ProjeDetay($id,$request);

               $projedetay["data"]["shelterventilation_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.shelterventilation',compact('projedetay'));

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
                $projedetay = Shelterventilation::ProjeDetay($id,$request);
                $projedetay["data"]["shelterventilation_id"] = $id;
                return view('ProjeDetay.shelterventilation',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    //shelterventilation
    public function shelterventilationhesap($edit="",$id="",  Request $request)
    {
        if ($request->session()->has('shelterventilationhesap')) {
            $request->session()->forget('shelterventilationhesap');
        }
        $messages = [
            'CalculationType.required' => 'CalculationType alanı boş geçilemez',
            'NeedFreshAir.required' => 'NeedFreshAir alanı boş geçilemez',
            'ShelterArea.required' => 'ShelterArea alanı boş geçilemez',
            'ShelterHeight.required' => 'ShelterHeight alanı boş geçilemez',
           ];
        $validator = Validator::make($request->all(), [
            'CalculationType' => 'required',
            'NeedFreshAir' => 'required',
            'ShelterArea'=>'required',
            'ShelterHeight' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'shelterventilation');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'shelterventilation');
        $response = Shelterventilation::shelterventilationHesap($request);
        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("shelterventilation");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('shelterventilationhesap')[0]["data"]["id"]);
              $request->session()->forget(session('shelterventilationhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('shelterventilationhesap',$response);
          toast('Shelter Ventilation hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("shelterventilation");

        }


    }
    public function shelterventilationhesapkaydet($update="",$id="",Request $request)
    {
        $response = Shelterventilation::shelterventilationHesapKaydet($update,$id,$request);


        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('shelterventilationhesap')) {
                    $request->session()->forget('shelterventilationhesap');
                }
                $request->session()->flash('status', 'shelterventilation');
                toast('Shelter Ventilation Projeniz kaydedilmiştir','success');
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
    public function shelterventilationdetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'shelterventilation');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $shelterventilationdetail = Shelterventilation::shelterventilationProjectDetay($request);
        $request->session()->flash('status', 'shelterventilation');
        return view('shelterventilationdetailmodal',compact('shelterventilationdetail'));
    }
    public function shelterventilationprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Shelterventilation::shelterventilationProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'shelterventilation');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect()->back();
            }else{
                $request->session()->flash('status', 'shelterventilation');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
