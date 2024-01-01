<?php

namespace App\Http\Controllers;
use App\Models\Boiler;
use App\Models\Project;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Log;
class BoilerController extends Controller
{
    public function index($id="",Request $request)
    {
        try{

         $projedetay["BoilerBrand"] = Project::getBrand("BoilerBrand",$request);
         //dd($projedetay);
         if(empty($id))
         {
            $projedetay["data"]["edit"] =0;
            $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");

            return view('Proje.boiler',compact('projedetay'));
         }else{
            $projedetay["data"] = Boiler::ProjeDetay($id,$request);
             $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
             $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            $projedetay["data"]["boiler_id"] = $id;
            $projedetay["data"]["edit"] =1;
            //dd($projedetay);
            return view('Proje.boiler',compact('projedetay'));

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
                $projedetay = Boiler::ProjeDetay($id,$request);
                //dd("Sistem Kontrolü Yapılmaktadır");
                 // dd($projedetay);
                $projedetay["data"]["boiler_id"] = $id;
                return view('ProjeDetay.boiler',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    public function boilerHesapla($edit="",$id="",Request $request)
    {

        if ($request->session()->has('boilerhesap')) {

            $request->session()->forget('boilerhesap');
        }

        $messages = [
            'adi.required'=>'Adı alan boş geçilemez',
            'fueltype.required' => 'Fuel Type alanı boş geçilemez',
            'distributionpipe.required' => 'DistributionPipe alanı boş geçilemez',
            'heatneed.required' => 'Heat Need alanı boş geçilemez',
            'piece.required' => 'Piece alanı boş geçilemez',
            'brand.required' => 'Marka alanı boş geçilemez',
        ];
        $validator = Validator::make($request->all(), [
            'adi'=>'required',
            'fueltype' => 'required',
            'distributionpipe' => 'required',
            'heatneed' => 'required',
            'brand' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'boiler');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect("boiler");
        }
        $request->session()->flash('status', 'boiler');
        $response = Boiler::BoilerHesapla($request);

        //dd($response);



        toast($request->input("adi"),'warning');
        if(empty($response["data"]))
        {
          toast("HATA",'warning');

          return redirect("boiler");


        }else{
            toast('TEST','warning');
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");

          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('boilerhesap')[0]["data"]["id"]);
              $request->session()->forget(session('boilerhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('boilerhesap',$response);
          //dd($response);
          toast('Boiler hesabı gerçekleşmiştir. Son İşlem"e tıklayıp bakabilirsiniz','success');
          return redirect("boiler");

        }

    }
    public function boilerHesapkaydet($update="",$id="",Request $request)
    {
        try {
            $messages = [
                'boiler.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
            ];
            $validator = Validator::make($request->all(), [
                'boiler' => 'required',
            ], $messages);
            /*if ($validator->fails()) {
                $request->session()->flash('status', 'boiler');
                toast('Lütfen Kazan seçimi yapınız','warning');
                return redirect()->back();
            } */


            $response = Boiler::BoilerHesapKaydet($update="",$id="",$request);

            if($response["data"]=="1")
            {
                $res=User::bakiyedus($request);
                if($res==1){
                    if ($request->session()->has('boilerhesap')) {
                        $request->session()->forget('boilerhesap');
                    }
                    $request->session()->flash('status', 'boiler');
                    toast('Boiler Projeniz kaydedilmiştir','success');
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
        } catch (\Throwable $th) {
            dd($th);
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }

    }
    public function boilerdetail(Request $request)
    {

        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'boiler');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $boiler_detail = Boiler::BoilerProjectDetay($request);
        $request->session()->flash('status', 'boiler');

        return view('boilerdetailmodal',compact('boiler_detail'));

    }
    public function destroy($data="",Request $request)
    {
       if(empty($data) || $data==0)
       {
           toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
           return redirect()->back();
       }else{
           $response = Boiler::BoilerProjectSil($data,$request);
           if($response["data"]=="1")
           {
               toast('Kayıtlı Proje silinmiştir !','success');
               return redirect("dashboard");
           }else{
               toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
               return redirect()->back();
           }
       }
    }
}
