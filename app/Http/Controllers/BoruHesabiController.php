<?php

namespace App\Http\Controllers;
use App\Models\BoruHesabi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Log;
class BoruHesabiController extends Controller
{
    public function index()
    {
        $projedetay = BoruHesabi::parcalar();
        return view('Proje.boruhesabi',compact('projedetay'));
    }
    public function hesap(Request $request){
        dd($request);
    }

}
