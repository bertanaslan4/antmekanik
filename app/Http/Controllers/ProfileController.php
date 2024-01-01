<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $res=User::bakiye($request);
        return view('profile',compact('res'));
    }
    public function create(Request $request){
        $messages = [
            'name.required' => 'Lütfen isim soyisimi doldurunuz',
            'email.required' => 'Email alanı boş geçilemez',
            'telefon.required'=>'Telefon alanı boş geçilemez',
            'adres.required'=>'Telefon alanı boş geçilemez',
            'tc.required'=>'Tc alanı boş geçilemez',
            'firma.required'=>'Firma alanı boş geçilemez',
        ];
        $validator = Validator::make($request->all(), [


        ], $messages);
        if ($validator->fails()) {
            toast('Lütfen tüm alanları doldurunuz','warning');
            return redirect()->back();
        }
        $response = User::createCustomer($request);
        if($response=='1'){
            toast('Kullanıcı Düzenlenmiştir','success');
            return redirect()->back();
        }
        else
        {
            toast('Hata','error');
            return redirect()->back();
        }
    }
}
