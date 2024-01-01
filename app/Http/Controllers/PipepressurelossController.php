<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Pipepressureloss;
use Validator;
use App\Models\Project;
use RealRashid\SweetAlert\Facades\Alert;

class PipepressurelossController extends Controller
{
    public function index($id="",Request $request)
    {
        try{

$projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;

               //dd($projedetay);
               return view('Proje.pipepressure',compact('projedetay'));
            }else{
               $projedetay = Pipepressureloss::ProjeDetay($id,$request);
               $projedetay["data"]["pipepressureloss_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.pipepressure',compact('projedetay'));

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
                $projedetay = Pipepressureloss::ProjeDetay($id,$request);
                $projedetay["data"]["pipepressureloss_id"] = $id;
                return view('ProjeDetay.pipepressure',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    //pipepressure
    public function pipepressurehesap($edit="",$id="", Request $request)
    {
        if ($request->session()->has('pipepressurehesap')) {
            $request->session()->forget('pipepressurehesap');
        }
        $messages = [
            'FluidType.required' => 'FluidType alanı boş geçilemez',
            'MinLoad.required' => 'MinLoad alanı boş geçilemez',
            'Pipe.required' => 'Pipe alanı boş geçilemez',
            'DiameterAdvice.required' => 'DiameterAdvice alanı boş geçilemez',
            'MaxLoad.required' => 'FluidType alanı boş geçilemez',
            'LinesName.required' => 'MinLoad alanı boş geçilemez',
            'MinSpeed.required' => 'Pipe alanı boş geçilemez',
            'GoingTemp.required' => 'GoingTemp alanı boş geçilemez',
            'LinesConnection.required' => 'LinesConnection alanı boş geçilemez',
            'LinesLenght.required' => 'LinesLenght alanı boş geçilemez',
            'MaxSpeed.required' => 'MaxSpeed alanı boş geçilemez',
            'ReturnTemp.required' => 'ReturnTemp alanı boş geçilemez',
            'LinesPartLoad.required' => 'LinesPartLoad alanı boş geçilemez',
            'LinesLineLoad.required' => 'LinesLineLoad alanı boş geçilemez',
           ];
        $validator = Validator::make($request->all(), [
            'FluidType' => 'required',
            'MinLoad' => 'required',
            'Pipe'=>'required',
            'DiameterAdvice' => 'required',
            'MaxLoad' => 'required',
            'LinesName' => 'required',
            'MinSpeed'=>'required',
            'GoingTemp' => 'required',
            'LinesConnection' => 'required',
            'LinesLenght' => 'required',
            'MaxSpeed'=>'required',
            'ReturnTemp' => 'required',
            'LinesPartLoad'=>'required',
            'LinesLineLoad' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'pipepressure');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'pipepressure');
        $response = Pipepressureloss::pipepressureHesap($request);
        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("pipepressure");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('pipepressurehesap')[0]["data"]["id"]);
              $request->session()->forget(session('pipepressurehesap')[0]["data"]["edit"]);
          }
          $request->session()->push('pipepressurehesap',$response);
          toast('Boru basınç Kaybı hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("pipepressure");

        }


    }
    public function pipepressurehesapkaydet($update="",$id="",Request $request)
    {
        $response = Pipepressureloss::pipepressureHesapKaydet($update,$id,$request);
       // dd( $response);

        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('pipepressurehesap')) {
                    $request->session()->forget('pipepressurehesap');
                }
                $request->session()->flash('status', 'pipepressure');
                toast('Boru basınç kaybı Projeniz kaydedilmiştir','success');
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
    public function pipepressuredetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'pipepressure');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $pipepressuredetail = Pipepressureloss::pipepressureProjectDetay($request);
        $request->session()->flash('status', 'pipepressure');
        return view('pipepressuredetailmodal',compact('pipepressuredetail'));
    }
    public function pipepressureprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Pipepressureloss::pipepressureProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'pipepressure');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'pipepressure');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
