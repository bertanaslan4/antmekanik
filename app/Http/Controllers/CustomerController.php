<?php

namespace App\Http\Controllers;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    public function index(Request $request)
    {

         try {
            $Musteriliste = User::musterilistele($request);
            //dd($Musteriliste);


            return view('customer',compact('Musteriliste'));
         } catch (\Throwable $th) {
            return view('customer');

         }

    }
    public function create(Request $request)
    {

        $response = User::MusteriOlustur($request);

        if($response["status"]==true){
            toast('Müşteri Oluşturuldu','success');
            return redirect("customer");
        }
        else
        {
            toast('Müşteri Oluşturulurken Hata','error');
            return redirect("customer");
        }

    }


    public function edit($id,Request $request)
    {
           try {

            $musterigoster=User::musteriedit($id,$request);
           //dd($musterigoster);
            return view('EditCustomer',compact('musterigoster'));
           } catch (\Throwable $th) {

           }


    }


    public function update($id,Request $request)
    {
           try {

            $musteriguncelle=User::musteriUpdate($id,$request);
            if($musteriguncelle["data"]==1){
                toast('Kullanıcı düzenlemiştir','success');
                return redirect("customer");
            }




           } catch (\Throwable $th) {

           }


    }



    public function delete($id,Request $request)
    {
           try {

            $musterisil=User::musterisil($id,$request);

            dd($id);


           } catch (\Throwable $th) {

           }


    }







}
