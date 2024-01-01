<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Paddlebox;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PaddleboxController extends Controller
{
    public function index($id="",Request $request)
    {

        try{
           $projedetay["data"]["proje_adi"]=$request->session()->get("proje_adi");
            $projedetay["data"]["proje_id"]=$request->session()->get("proje_id");

            if(empty($id))
            {
               $projedetay["data"]["edit"] =0;
               return view('Proje.paddlebox',compact('projedetay'));
            }else{
               $projedetay = Paddlebox::ProjeDetay($id,$request);
               $projedetay["data"]["paddlebox_id"] = $id;
               $projedetay["data"]["edit"] =1;
               return view('Proje.paddlebox',compact('projedetay'));

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
                $projedetay = Paddlebox::ProjeDetay($id,$request);
                $projedetay["data"]["paddlebox_id"] = $id;
                return view('ProjeDetay.paddlebox',compact('projedetay'));
            }


        } catch (\Throwable $th) {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }

    }
    //paddlebox

    public function paddleboxhesap($edit="",$id="", Request $request)
    {
        if ($request->session()->has('paddleboxhesap')) {
            $request->session()->forget('paddleboxhesap');
        }
        $messages = [
            'KitchenType.required' => 'KitchenType alanı boş geçilemez',
            'KitchenDensity.required' => 'KitchenDensity alanı boş geçilemez',
            'Piece.required' => 'Piece alanı boş geçilemez',
            'ReductionFactorPos.required' => 'ReductionFactorPos alanı boş geçilemez',
            'KitchenArea.required' => 'KitchenArea alanı boş geçilemez',
            'DevicesName.required' => 'DevicesName alanı boş geçilemez',
            'KitchenHeight.required' => 'KitchenHeight alanı boş geçilemez',
            'HeatSourceDistance.required' => 'HeatSourceDistance alanı boş geçilemez',
            'PaddleboxHeight.required' => 'PaddleboxHeight alanı boş geçilemez',
            'PaddleboxWidth.required' => 'PaddleboxWidth alanı boş geçilemez',
            'OverflowAirFactor.required' => 'OverflowAirFactor alanı boş geçilemez',
        ];
        $validator = Validator::make($request->all(), [
            'KitchenType' => 'required',
            'KitchenDensity' => 'required',
            'Piece'=>'required',
            'ReductionFactorPos' => 'required',
            'KitchenArea' => 'required',
            'DevicesName' => 'required',
            'KitchenHeight' => 'required',
            'HeatSourceDistance' => 'required',
            'PaddleboxHeight'=>'required',
            'PaddleboxWidth' => 'required',
            'OverflowAirFactor' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'paddlebox');
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $request->session()->flash('status', 'paddlebox');
        $response = Paddlebox::paddleboxHesap($request);
        if(empty($response["data"]))
        {
          toast('Hata oluştu.Lütfen parametrelerinizi kontrol ediniz','warning');
          return redirect("paddlebox");

        }else{
          $response["data"]["adi"] = $request->input("adi");
          $response["data"]["aciklama"] = $request->input("aciklama");
          if($edit==1)
          {
            $response["data"]["edit"] =1;
            $response["data"]["id"] = $id;
          }else{
              $request->session()->forget(session('paddleboxhesap')[0]["data"]["id"]);
              $request->session()->forget(session('paddleboxhesap')[0]["data"]["edit"]);
          }
          $request->session()->push('paddleboxhesap',$response);
          toast('Paddlebox hesabı gerçekleşmiştir,sonucu listelenmiştir','success');
          return redirect("paddlebox");

        }
    }
    public function paddleboxhesapkaydet($update="",$id="",Request $request)
    {
        $response = Paddlebox::paddleboxHesapKaydet($update,$id,$request);

         // dd($response);
        if($response["data"]=="1")
        {
            $res=User::bakiyedus($request);
            if($res==1){
                if ($request->session()->has('paddleboxhesap')) {
                    $request->session()->forget('paddleboxhesap');
                }
                $request->session()->flash('status', 'paddlebox');
                toast('Paddlebox Projeniz kaydedilmiştir','success');
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
    public function paddleboxdetail(Request $request)
    {
        $messages = [
            'projeid.required' => 'Hata oluştu.Lütfen tekrar deneyiniz',
        ];
        $validator = Validator::make($request->all(), [
            'projeid' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $request->session()->flash('status', 'paddlebox');
            toast('Hata Oluştu.Lütfen daha sonra tekrar deneyiniz','warning');
            return redirect()->back();
        }
        $paddleboxdetail = Paddlebox::paddleboxProjectDetay($request);



        $request->session()->flash('status', 'paddlebox');
        return view('paddleboxdetailmodal',compact('paddleboxdetail'));
    }
    public function paddleboxprojesil($data="",Request $request)
    {
        if(empty($data) || $data==0)
        {
            toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
            return redirect()->back();
        }else{
            $response = Paddlebox::paddleboxProjectSil($data,$request);
            if($response["data"]=="1")
            {
                $request->session()->flash('status', 'paddlebox');
                toast('Kayıtlı Proje silinmiştir !','success');
                return redirect("dashboard");
            }else{
                $request->session()->flash('status', 'paddlebox');
                toast('Hata oluştu.Lütfen daha sonra tekrar deneyiniz','error');
                return redirect()->back();
            }
        }
    }
}
