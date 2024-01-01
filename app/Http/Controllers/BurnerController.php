<?php

namespace App\Http\Controllers;

use App\Models\Burner;
use App\Models\Project;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Validator;

class BurnerController extends Controller
{
    public function index($id="",Request $request)
    {

        try{

            $projedetay["BurnerBrand"] = Project::getBrand("BurnerBrand",$request);
            $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.burner',compact('projedetay'));
            }else{
               $projedetay = Burner::ProjeDetay($id,$request);
               $projedetay["data"]["burner_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.burner',compact('projedetay'));

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
                $projedetay = Burner::ProjeDetay($id,$request);
                $projedetay["data"]["burner_id"] = $id;
                //dd($projedetay);
                return view('ProjeDetay.burner',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    public function burnerhesap($edit="",$id="",Request $request)
    {
        if ($request->session()->has('burnerhesap')) {
            $request->session()->forget('burnerhesap');
        }
        $messages = [
            'LiquitFuelType.required' => 'Fuel Type alanı boş geçilemez',
            'BoilerCapacity.required' => 'DistributionPipe alanı boş geçilemez',
        ];
        $validator = Validator::make($request->all(), [
            'LiquitFuelType' => 'required',
            'BoilerCapacity' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'burner');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'burner');
        //dd($request);
        $response = Burner::burnerhesap($request);

        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("burner");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('burnerhesap')[0]["data"]["id"]);
              $request->session()->forget(session('burnerhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('burnerhesap',$response);
          //dd($response);
          toast('Boyler hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("burner");

        }
    }
    public function burnerhesapkaydet ($update="",$id="",Request $request)
    {
        $messages = [
            'burner.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'burner' => 'required',
        ], $messages);
        if ($validator->fails()) {
            toast('Lütfen Burner seçimi yapınız','warning');
            return redirect()->back();
        }


        $response = Burner::BurnerHesapKaydet($update,$id,$request);
       // dd($response);
        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('burnerhesap')) {
                    $request->session()->forget('burnerhesap');
                }
                $request->session()->flash('status', 'burner');
                toast('Burner Projeniz kaydedilmiştir','success');
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
    public function burnerdetail(Request $request)
    {

        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'burner');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

        $burner_detail = Burner::BurnerProjectDetay($request);



        $request->session()->flash('status', 'burner');

        return view('burnerdetailmodal',compact('burner_detail'));

    }
    public function burnerprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Burner::BurnerProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'burner');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'burner');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
