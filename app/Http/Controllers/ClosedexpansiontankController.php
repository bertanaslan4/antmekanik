<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Closedexpansiontank;
use App\Models\Project;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ClosedexpansiontankController extends Controller
{
    public function index($id="",Request $request)
    {
        try{

            $projedetay["CloseExpansionBrand"] = Project::getBrand("CloseExpansionBrand",$request);
            $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");
            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               $headertype = Project::HeaderType($request);
               $WaterExpansion = Project::WaterExpansion($request);
               $valvetype = Project::ValveType($request);
               return view('Proje.closeexpansion',compact('projedetay','headertype','WaterExpansion','valvetype'));
            }else{
               $headertype = Project::HeaderType($request);
               $WaterExpansion = Project::WaterExpansion($request);
               $valvetype = Project::ValveType($request);
               $projedetay = Closedexpansiontank::ProjeDetay($id,$request);
               $projedetay["data"]["closedexpansiontank_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.closeexpansion',compact('projedetay','headertype','WaterExpansion','valvetype'));

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
                $projedetay = Closedexpansiontank::ProjeDetay($id,$request);

                //dd($projedetay);
                $projedetay["data"]["closedexpansiontank_id"] = $id;
                return view('ProjeDetay.closeexpansion',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
     //close expansion
     public function closeexpansiontankhesap($edit="",$id="", Request $request)
     {
         if ($request->session()->has('closeexpansiontankhesap')) {
             $request->session()->forget('closeexpansiontankhesap');
         }
         $messages = [
             'HeaterType.required' => 'Header Type alanı boş geçilemez',
             'waterexpansion.required' => 'Water Expansion alanı boş geçilemez',
             'BoilerCapacityKazan.required' => 'Boiler Capacity alanı boş geçilemez',
             'StaticHeight.required' => 'StaticHeight alanı boş geçilemez',
             'OpeningPressure.required' => 'OpeningPressure alanı boş geçilemez',
             'ValveType.required' => 'ValveType alanı boş geçilemez',
             'piece.required' => 'piece alanı boş geçilemez',
             'brand.required' => 'Marka alanı boş geçilemez',
         ];
         $validator = Validator::make($request->all(), [
             'HeaterType' => 'required',
             'waterexpansion' => 'required',
             'BoilerCapacityKazan' => 'required',
             'StaticHeight' => 'required',
             'OpeningPressure' => 'required',
             'ValveType' => 'required',
             'brand' => 'required',
         ], $messages);
         if ($validator->fails()) {
             $request->session()->flash('status', 'closeexpansiontank');
             toast('Lütfen tüm alanları doldurunuz','warning');
             return redirect()->back();
         }
        $request->session()->flash('status', 'closeexpansiontank');

        $response = Closedexpansiontank::CloseExpansionHesap($request);

        //dd($response);

        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("closeexpansion");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('closeexpansiontankhesap')[0]["data"]["id"]);
              $request->session()->forget(session('closeexpansiontankhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('closeexpansiontankhesap',$response);
          toast('Close Expansion Tank hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("closeexpansion");

        }



     }
     public function closeexpansionhesapkaydet($update="",$id="",Request $request)
     {

         $response = Closedexpansiontank::CloseExpansionHesapKaydet($update,$id,$request);

         ///dd($response);
         if($response["data"]=="1")
         {
             $res=User::bakiyedus($request);
             if($res==1){
                 if ($request->session()->has('closeexpansiontankhesap')) {
                     $request->session()->forget('closeexpansiontankhesap');
                 }
                 $request->session()->flash('status', 'closeexpansiontank');
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
     public function closeexpansiondetail(Request $request)
     {
         $messages = [
             'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
         ];
         $validator = Validator::make($request->all(), [
             'projeid' => 'required',
         ], $messages);
         if ($validator->fails()) {
             $request->session()->flash('status', 'closeexpansiontank');
             toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
             return redirect()->back();
         }
         $closeexpansiondetail = Closedexpansiontank::CloseExpansionProjectDetay($request);

         $request->session()->flash('status', 'closeexpansiontank');

         return view('closeexpansiondetailmodal',compact('closeexpansiondetail'));
     }
     public function closeexpansionprojesil($data="",Request $request)
     {
         if(empty($data) || $data==0)
         {
             toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
             return redirect()->back();
         }else{
             $response = Closedexpansiontank::CloseExpansionProjectSil($data,$request);
             if($response["data"]=="1")
             {
                 $request->session()->flash('status', 'closeexpansiontank');
                 toast('Kayıtlı Proje silinmiştir !','success');
                 return redirect("dashboard");
             }else{
                 $request->session()->flash('status', 'closeexpansiontank');
                 toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                 return redirect()->back();
             }
         }
     }
}
