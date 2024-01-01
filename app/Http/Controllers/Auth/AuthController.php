<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\GirisRequest;
use Validator;
use App\Models\ProjelerListe;
class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');

    }


    public function forgotpass()
    {
        return view('auth.forgotpassword');

    }
    public function register(){
        return view('register');
    }
    public function userregister(Request $request){

        try {
            $messages = [
                'password.required' => 'Şifre alanı boş geçilemez',
                'email.required' => 'E-mail alanı boş geçilemez'
            ];
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required|min:4',
            ], $messages);
            if ($validator->fails()) {
                notify()->error('Lütfen tüm alanları doldurunuz', 'Uyarı !');
                return redirect()->route('register');
            }
            $res = User::userregister($request->all());
            //dd($res);
            if($res["status"]==true){
                toast('Kullanıcı oluşturuldu','success');
                return redirect()->route('login');
            }
            else
            {
                toast('Kullanıcı Oluşturulurken Hata','error');
                return redirect()->route('login');
            }


        }catch (\Throwable $th) {
            dd($th);
            notify()->error("Hata oluştu.Lütfen daha sonra tekrar deneyiniz", "Uyarı !");
            return redirect()->route('register');
        }
    }


    public function login(Request $request)
    {
        try {
            $messages = [
                'password.required' => 'Şifre alanı boş geçilemez',
                'email.required' => 'E-mail alanı boş geçilemez'
            ];
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required|min:4',
            ], $messages);
            if ($validator->fails()) {
                notify()->error('Lütfen tüm alanları doldurunuz', 'Uyarı !');
                return redirect()->route('login');
            }
            $AuthControl = User::GirisYap($request->all());
            $sonproje=ProjelerListe::sonProje($AuthControl["data"]["User"]["id"]);
            //dd($sonproje);
            if ($AuthControl["code"] == "200") {

                session(
                    [
                        'token' => $AuthControl["data"]["_token"],
                        'id' => $AuthControl["data"]["User"]["id"],
                        'name' => $AuthControl["data"]["User"]["name"],
                        'role' => $AuthControl["data"]["User"]["role"],
                        'proje_id'=>$sonproje[0]->id,
                        'proje_adi'=>$sonproje[0]->proje_adi
                    ]
                );

                return redirect()->route('admin.dashboard');


            } else {
                notify()->error($AuthControl["err"]["message"], "Uyarı !");
                return redirect()->route('login');
            }
        } catch (\Throwable $th) {
            //dd($th);
            notify()->error("Hata oluştu.Lütfen daha sonra tekrar deneyiniz", "Uyarı !");
            return redirect()->route('login');
        }




    }


    public function  Sifremiunuttum(Request $request){

        try {
            $messages = [

                'email.required' => 'E-mail alanı boş geçilemez'
            ];
            $validator = Validator::make($request->all(), [
                'email' => 'required',

            ], $messages);
            if ($validator->fails()) {
                notify()->error('Lütfen tüm alanları doldurunuz', 'Uyarı !');
                return redirect()->route('Sifremiunuttum');
            }
            $veri=User::sifremiunuttum($request);
            if($veri["success"]==true)
            {

                notify()->success('Yeni Şifreniz Maile  Gönderildi', 'Basarılı !');
                return redirect()->route('login');
            }else {
                //dd($veri);
                notify()->error('Hata Oluştu  Mailinizi  Kontrol  edip  Tekrar Deneyin', 'Uyarı !');
                return redirect()->route('login');
            }




        } catch (\Throwable $th) {
            //throw $th;
            notify()->error($th, 'Uyarı !');
        }

    }

    public function logout(Request $request)
    {
        try {
            $Cikis = User::CikisYap($request);
        if ($Cikis["code"] == "200") {
            notify()->success($Cikis["data"]["message"], "Uyarı !");
            $request->session()->flush();
            return redirect()->route('/');
        } else {
            notify()->error("Hata oluştu.Lütfen daha sonra tekrar deneyiniz", "Uyarı !");
            return back();
        }
        } catch (\Throwable $th) {
            return redirect('/');
        }


    }
}
