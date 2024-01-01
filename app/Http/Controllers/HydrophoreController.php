<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Hydrophore;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Project;

class HydrophoreController extends Controller
{
    public function index($id="",Request $request)
    {
        try{

            $projedetay["HydrophoreBrand"] = Project::getBrand("HydrophoreBrand",$request);
            $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.hydrophore',compact('projedetay'));
            }else{
               $projedetay = Hydrophore::ProjeDetay($id,$request);
               $projedetay["data"]["hydrophore_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.hydrophore',compact('projedetay'));

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
                $projedetay = Hydrophore::ProjeDetay($id,$request);
                //dd($projedetay);
                $projedetay["data"]["hydrophore_id"] = $id;
                return view('ProjeDetay.hydrophore',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }


    public function hydrophorehesap($edit="",$id="",  Request $request)
    {
        if ($request->session()->has('hydrophorehesap')) {
            $request->session()->forget('hydrophorehesap');
        }
        $messages = [
            'BuildType.required' => 'BuildType alanı boş geçilemez',
            'StoredTime.required' => 'StoredTime alanı boş geçilemez',
            'NumberOfPeople.required' => 'NumberOfPeople alanı boş geçilemez',
            'PipePressureLoss.required' => 'PipePressureLoss alanı boş geçilemez',
            'OtherLosses.required' => 'OtherLosses alanı boş geçilemez',
            'brand.required' => 'OtherLosses alanı boş geçilemez'

        ];
        $validator = Validator::make($request->all(), [
            'BuildType' => 'required',
            'StoredTime' => 'required',
            'NumberOfPeople'=>'required',
            'PipePressureLoss' => 'required',
            'OtherLosses' => 'required',
            'brand' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'hydrophore');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'hydrophore');
        $response = Hydrophore::hydrophoreHesap($request);
        //dd($response);
        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("hydrophore");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('hydrophorehesap')[0]["data"]["id"]);
              $request->session()->forget(session('hydrophorehesap')[0]["data"]["edit"]);
          }
          $request->session()->push('hydrophorehesap',$response);
          toast('Hydrophore hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("hydrophore");

        }
    }
    public function hydrophorehesapkaydet($update="",$id="",Request $request)
    {
        $response = Hydrophore::hydrophoreHesapKaydet($update,$id,$request);


        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('hydrophorehesap')) {
                    $request->session()->forget('hydrophorehesap');
                }
                $request->session()->flash('status', 'hydrophore');
                toast('Hydrophore Projeniz kaydedilmiştir','success');
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
    public function hydrophoredetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'hydrophore');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $hydrophoredetail = Hydrophore::hydrophoreProjectDetay($request);





        $request->session()->flash('status', 'hydrophore');

        return view('hydrophoredetailmodal',compact('hydrophoredetail'));
    }
    public function hydrophoreprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Hydrophore::hydrophoreProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'hydrophore');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'hydrophore');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
