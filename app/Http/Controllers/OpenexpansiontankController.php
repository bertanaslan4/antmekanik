<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\Openexpansiontank;
use App\Models\Project;
use Illuminate\Http\Request;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class OpenexpansiontankController extends Controller
{
    public function index($id="",Request $request)
    {
        try{
            $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");

            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               $headertype = Project::HeaderType($request);
               $WaterExpansion = Project::WaterExpansion($request);

               return view('Proje.openexpansion',compact('projedetay','headertype','WaterExpansion'));
            }else{
               $projedetay = Openexpansiontank::ProjeDetay($id,$request);
               $headertype = Project::HeaderType($request);
               $WaterExpansion = Project::WaterExpansion($request);
               $projedetay["data"]["openexpansiontank_id"] = $id;
               $projedetay["data"]["edit"] =1;

               return view('Proje.openexpansion',compact('projedetay','headertype','WaterExpansion'));

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
                $projedetay = Openexpansiontank::ProjeDetay($id,$request);
                $projedetay["data"]["openexpansiontank_id"] = $id;
                return view('ProjeDetay.openexpansion',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    public function openexpansiontankhesap($edit="",$id="", Request $request)
    {
        if ($request->session()->has('openexpansiontankhesap')) {
            $request->session()->forget('openexpansiontankhesap');
        }
        $messages = [
            'HeaterType.required' => 'Header Type alanı boş geçilemez',
            'waterexpansion.required' => 'Water Expansion alanı boş geçilemez',
            'BoilerCapacityKazan.required' => 'Boiler Capacity alanı boş geçilemez',
        ];
        $validator = Validator::make($request->all(), [
            'HeaterType' => 'required',
            'waterexpansion' => 'required',
            'BoilerCapacityKazan' => 'required'
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'openexpansiontank');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'openexpansiontank');
        $response = Openexpansiontank::OpenExpansionHesap($request);

        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("openexpansion");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('openexpansiontankhesap')[0]["data"]["id"]);
              $request->session()->forget(session('openexpansiontankhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('openexpansiontankhesap',$response);
          toast('Open Expansion Tank hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("openexpansion");

        }
    }
    public function openexpansionhesapkaydet($update="",$id="",Request $request)
    {
        $response = Openexpansiontank::OpenExpansionHesapKaydet($update,$id,$request);
     //  dd($response);
        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('openexpansiontankhesap')) {
                    $request->session()->forget('openexpansiontankhesap');
                }
                $request->session()->flash('status', 'openexpansiontank');
                toast('Open Expansion Tank Projeniz kaydedilmiştir','success');
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
    public function openexpansiondetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'openexpansiontank');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $openexpansiondetail = Openexpansiontank::OpenExpansionProjectDetay($request);

        $request->session()->flash('status', 'openexpansiontank');

        return view('openexpansiondetailmodal',compact('openexpansiondetail'));
    }
    public function openexpansionprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Openexpansiontank::OpenExpansionProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'openexpansiontank');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'openexpansiontank');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
