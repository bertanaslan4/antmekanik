<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Project extends Model
{
    public static function Listele($data=[])
    {
        //piece adet demek bunu manuel alacagız
        //HeatNeed manuel input degerli veri yazılacak
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'data',
            [
                'Types' => [
                    [
                        'Name'     => 'FuelType',
                    ],
                    [
                        'Name'     => 'DistributionPipe',
                    ],
                    [
                        'Name'     =>'Boiler',
                    ],
                    [
                        'Name' => 'LiquitFuelType',
                    ],
                    [
                        'Name'=>'Burner',
                    ],
                    [
                        'Name'=>'Equipment',
                    ],
                    [
                        'Name'=>'BuildType',
                    ],
                    [
                        'Name'=>'LocationRain',
                    ],
                    [
                        'Name'=>'RoofType',
                    ],
                    [
                        'Name'=>'WaterSpeed',
                    ],
                    [
                        'Name'=>'Collector',
                    ],
                    [
                        'Name'=>'Kitchen',
                    ],
                    [
                        'Name'=>'ReductionFactor',
                    ],
                    [
                        'Name'=>'Product',
                    ],
                    [
                        'Name'=>'EnclosureType',
                    ],
                    [
                        'Name'=>'PipeType',
                    ],
                    [
                        'Name'=>'Pipe',
                    ],
                    [
                        'Name'=>'SoilType',
                    ],
                    [
                        'Name'=>'NominalDiameter',
                    ],
                    [
                        'Name'=>'ParkingCalculation',
                    ],
                    [
                        'Name'=>'ParkingType',
                    ],
                    [
                        'Name'=>'AirFlowCalcMethod',
                    ],
                    [
                        'Name'=>'ShelterCalculation',
                    ],
                    [
                        'Name'=>'ShelterFreshAir',
                    ],
                    [
                        'Name'=>'DiameterAdvice',
                    ],
                    [
                        'Name'=>'HeatExchanger',
                    ],
                    [
                        'Name'=>'FluidType',
                    ],
                    [
                        'Name'=>'DiameterAdvice',
                    ],
                    [
                        'Name'=>'BuildWaterConsumption',
                    ],
                    [
                        'Name'=>'PaddleBoxDevice',
                    ]

                ]
            ]
        );

        return $response->json();

    }

    public static function getBrand($istek="",$data=[])
    {
        $api_url = env('APP_API_URL');


        $response = Http::withToken($data->session()->get('token'))->post($api_url.'getBrand',
                    [
                        $istek=>"1"
                    ]
        );

        return $response->json();

    }

    



    public static function getUrun($getproduct="",$data=[])
    {
        $api_url = env('APP_API_URL');


        $response = Http::withToken($data->session()->get('token'))->post($api_url.'data',
            [
                'Types' => [
                    [
                        'Name'     =>$getproduct,
                    ],
                ]
            ]
        );

        return $response->json();

    }
    //Boiler
    public static function BoilerProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'boilerprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function BoilerProjectDetayPdf($data=[],$distandeger="")
    {
            if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'boilerprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );
                
                return $projedetaylari->json();
                
                $response = Http::withToken($data->session()->get('token'))->post($api_url.'boilerDetail',
                    [
                        "id"=>$projedetaylari["data"][0]["Boiler_id"],
                        "FuelType"=>$projedetaylari["data"][0]["FuelType"],
                        "DistributionPipe"=>$projedetaylari["data"][0]["DistributionPipe"],
                        "HeatNeed"=>$projedetaylari["data"][0]["HeatNeed"],
                        "Piece"=>$projedetaylari["data"][0]["Piece"]
                    ]
                );

                

                $data = array("projedetay"=>$response->json(),"adi"=>$projedetaylari["data"][0]["adi"],"aciklama"=>$projedetaylari["data"][0]["aciklama"],"tarih"=>$projedetaylari["data"][0]["tarih"],"projeid"=>$projedetaylari["data"][0]["id"]);

                return $data;

            }

    }
    //Burner
    public static function BurnerProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'burnerprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function BurnerProjectDetayPdf($data=[],$distandeger="")
    {
            if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();

                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'burnerprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );
                $response = Http::withToken($data->session()->get('token'))->post($api_url.'burnerDetail',
                    [
                        'id'=>$projedetaylari["data"][0]["Burner_id"],
                        "LiquitFuelType"=>$projedetaylari["data"][0]["LiquitFuelType"],
                        "BoilerCapacity"=>$projedetaylari["data"][0]["BoilerCapacity"],
                        "BurnerEfficiency"=>$projedetaylari["data"][0]["BurnerEfficiency"],
                    ]
                );

                $data = array("projedetay"=>$response->json(),"adi"=>$projedetaylari["data"][0]["adi"],"aciklama"=>$projedetaylari["data"][0]["aciklama"],"tarih"=>$projedetaylari["data"][0]["tarih"],"projeid"=>$projedetaylari["data"][0]["id"]);

                
                return $data;

            }

    }
    //fuel amount
    public static function FuelAmountListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'fuelamountprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();
    }
    public static function FuelamountProjectDetayPdf($data=[],$distandeger="")
    {
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'fuelamountprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    //fuel amount yearly
    public static function FuelAmountyearlyListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'fuelamountyearlyprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();
    }
    public static function FuelamountyearlyProjectDetayPdf($data=[],$distandeger="")
    {
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'fuelamountyearlyprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }

    public static function HeaderType($data=[])
    {

        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'header-type');

        return $response->json();
    }

    public static function ValveType($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'valve-type');

        return $response->json();
    }

    public static function WaterExpansion($data=[])
    {

        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'water-expansion-get');

        return $response->json();
    }
    public static function openexpansionProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'openexpansionprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function OpenexpansionProjectDetayPdf($data=[],$distandeger="")
    {
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'openexpansionprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function CloseexpansionProjectDetayPdf($data=[],$distandeger="")
    {
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'closeexpansionprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function closeexpansionProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'closeexpansionprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function circulationpumpProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'circulationpumpprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function CirculationPumpProjectDetayPdf($data=[],$distandeger="")
    {
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'circulationpumpprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function boylerProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'boylerprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function BoylerProjectDetayPdf($data=[],$distandeger="")
    {
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'boylerprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function rainwaterProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'rainwaterprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function RainwaterProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'rainwaterprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function hydrophoreProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'hydrophoreprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function hydrophoreProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'hydrophoreprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function collectorProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'collectorprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function collectorProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'collectorprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function solarenergyProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'solarenergyprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function solarenergyProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'solarenergyprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function paddleboxProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'paddleboxprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function paddleboxProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'paddleboxprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function poolProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'poolprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function poolProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'poolprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function pipeinsulationProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'pipeinsulationprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function pipeinsulationProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'pipeinsulationprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function coldstorageProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'coldstorageprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function coldstorageProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'coldstorageprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function parkingventilationProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'parkingventilationprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function parkingventilationProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'parkingventilationprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function shelterventilationProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'shelterventilationprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function shelterventilationProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'shelterventilationprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }
    public static function pipepressureProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'pipeprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

                return $data;

            }
    }
    public static function pipepressureProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'pipeprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }



    public static function heatexchangerProjectDetayPdf($data=[],$distandeger=""){
        if(empty($distandeger))
            {
                return false;

            }else{
                $req_data = $data->all();
                
                $api_url = env('APP_API_URL');
                $projedetaylari = Http::withToken($data->session()->get('token'))->post($api_url.'heatexchangerprojelistele',
                    [
                        "kullanici_id"=>$data->session()->get("id"),
                        "id"=>$distandeger

                    ]
                );

                $data = array("projedetay"=>$projedetaylari->json());

               

                return $data;

            }
    }

    public static function heatexchangerProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->get($api_url.'heatexchangerprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }

}
