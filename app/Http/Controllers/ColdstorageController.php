<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Coldstorage;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ColdstorageController extends Controller
{
    public function index($id="",Request $request)
    {
        try{

$projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.coldstorage',compact('projedetay'));
            }else{
               $projedetay = Coldstorage::ProjeDetay($id,$request);
               $projedetay["data"]["coldstorage_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.coldstorage',compact('projedetay'));

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
                $projedetay = Coldstorage::ProjeDetay($id,$request);
                $projedetay["data"]["coldstorage_id"] = $id;
                return view('ProjeDetay.coldstorage',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }


    //coldstorage
    public function coldstoragehesap($edit="",$id="",Request $request)
    {
        if ($request->session()->has('coldstoragehesap')) {
            $request->session()->forget('coldstoragehesap');
        }
        $messages = [
            'ProductType.required' => 'ProductType alanı boş geçilemez',
            'EnclosureType.required' => 'EnclosureType alanı boş geçilemez',
            'ProductQuantity.required' => 'ProductQuantity alanı boş geçilemez',
            'EntryTemp.required' => 'EntryTemp alanı boş geçilemez',
            'HeatGain.required' => 'HeatGain alanı boş geçilemez',
            'LightingLoad.required' => 'LightingLoad alanı boş geçilemez',
            'EngineLoad.required' => 'EngineLoad alanı boş geçilemez',
            'OtherLoads.required' => 'OtherLoads alanı boş geçilemez',
            'NumberOfPeople.required' => 'NumberOfPeople alanı boş geçilemez',
            'StorageVolume.required' => 'StorageVolume alanı boş geçilemez',
            'SystemSafetyHike.required' => 'SystemSafetyHike alanı boş geçilemez',
            'BreathingHeat.required' => 'BreathingHeat alanı boş geçilemez',
            'BreathingHeatExample.required' => 'BreathingHeatExample alanı boş geçilemez',
        ];
        $validator = Validator::make($request->all(), [
            'ProductType' => 'required',
            'EnclosureType' => 'required',
            'ProductQuantity'=>'required',
            'EntryTemp' => 'required',
            'HeatGain' => 'required',
            'LightingLoad' => 'required',
            'EngineLoad' => 'required',
            'OtherLoads' => 'required',
            'NumberOfPeople' => 'required',
            'StorageVolume' => 'required',
            'SystemSafetyHike' => 'required',
            'BreathingHeat' => 'required',
            'BreathingHeatExample' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'coldstorage');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'coldstorage');
        $response = Coldstorage::coldstorageHesap($request);




        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("coldstorage");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('coldstoragehesap')[0]["data"]["id"]);
              $request->session()->forget(session('coldstoragehesap')[0]["data"]["edit"]);
          }
          $request->session()->push('coldstoragehesap',$response);

          toast('Cold Storage hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("coldstorage");

        }
    }
    public function coldstoragehesapkaydet($update="",$id="",Request $request)
    {
        $response = Coldstorage::coldstorageHesapKaydet($update ,$id,$request);


        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('coldstoragehesap')) {
                    $request->session()->forget('coldstoragehesap');
                }
                $request->session()->flash('status', 'coldstorage');
                toast('Cold Storage Projeniz kaydedilmiştir','success');
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
    public function coldstoragedetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'coldstorage');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $coldstoragedetail = Coldstorage::coldstorageProjectDetay($request);
        $request->session()->flash('status', 'coldstorage');
        return view('coldstoragedetailmodal',compact('coldstoragedetail'));
    }
    public function coldstorageprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Coldstorage::coldstorageProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'coldstorage');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'coldstorage');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
