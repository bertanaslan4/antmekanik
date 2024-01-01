<?php

namespace App\Models;

use App\Helper\General;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
class Pipepressureloss extends Model
{
    public static function pipepressureProjeListele($data=[])
    {
        $api_url = env('APP_API_URL');

        $response = Http::withToken($data->session()->get('token'))->post($api_url.'pipeprojelistele',
            [
               "kullanici_id"=>$data->session()->get("id"),

            ]
        );

        return $response->json();

    }

    public static function ProjeDetay($id="",$data) {
        $openexpansion_id = htmlspecialchars(trim(addslashes($id)));
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'pipeprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }

    //pipepressure
    public static function pipepressureHesap($data=[])
    {
        $req_data = $data->all();
        $api_url = env('APP_API_URL');
//        $response = Http::withToken($data->session()->get('token'))->post($api_url.'/pipe-pressure-loss',
//                [
//
//                    "MinSpeed"=>$req_data["MinSpeed"],
//                    "MaxSpeed"=>$req_data["MaxSpeed"],
//                    "MinLoad"=>$req_data["MinLoad"],
//                    "MaxLoad"=>$req_data["MaxLoad"],
//                    "GoingTemp"=>$req_data["GoingTemp"],
//                    "ReturnTemp"=>$req_data["ReturnTemp"],
//                    "FluidType"=>$req_data["FluidType"],
//                    "DiameterAdvice"=>$req_data["DiameterAdvice"],
//                    "Lines" => [
//                        [
//                        "Name"=>$req_data["LinesName"],
//                        "Connection"=>$req_data["LinesConnection"],
//                        "PartLoad"=>$req_data["LinesPartLoad"],
//                        "LineLoad"=>$req_data["LinesLineLoad"],
//                        "Length"=>$req_data["LinesLenght"],
//                        "PipeType"=>$req_data["Pipe"],
//                        ]
//                    ]
////                ]
//        );

        $data = $req_data;

        $data['TempDiff'] = $data['GoingTemp'] - $data['ReturnTemp'];
        $data['TempAvg'] = ($data['ReturnTemp'] + $data['GoingTemp']) / 2;

        $fluid = DB::table('api__fluid_type')->where('temp_avg', $data['TempAvg'])->first();

        if (!$fluid) {
            $fluid = DB::table('api__fluid_type')->where('temp_avg', '<', $data['TempAvg'])
                ->orderBy('temp_avg', 'desc')->first();

            if ($fluid) {
                $fluidMax = DB::table('api__fluid_type')->where('temp_avg', '>', $data['TempAvg'])
                    ->orderBy('temp_avg', 'asc')->first();

                if ($fluidMax) {
                    $fluid->specific_heat = General::interpolation($data['TempAvg'], $fluid->temp_avg, $fluidMax->temp_avg, $fluid->specific_heat, $fluidMax->specific_heat);
                    $fluid->density = General::interpolation($data['TempAvg'], $fluid->temp_avg, $fluidMax->temp_avg, $fluid->density, $fluidMax->density);
                    $fluid->viscosity = General::interpolation($data['TempAvg'], $fluid->temp_avg, $fluidMax->temp_avg, $fluid->viscosity, $fluidMax->viscosity);

                    $fluid->temp_avg = $data['TempAvg'];
                }
            } else {
                return response(['success' => false, 'error_code' => "invalid_fluid"], Response::HTTP_NOT_ACCEPTABLE);
            }
        }

        $data['WaterDensity'] = $fluid->density;
        $data['SpecificHeatOfWater'] = $fluid->specific_heat;
        $data['WaterViscosity'] = $fluid->viscosity / 1000;
        $data['DynamicViscosity'] = 0.045;

        /////////////////////////////////////////////////////
//        $data['WaterDensity'] = 997.3564;
//        $data['SpecificHeatOfWater'] = 4.198;
//        $data['WaterViscosity'] = 0.000976727;


        $data['Lines'] = [
            [
                "Name"=>$data["LinesName"],
                "Connection"=>$data["LinesConnection"],
                "PartLoad"=>$data["LinesPartLoad"],
                "LineLoad"=>$data["LinesLineLoad"],
                "Length"=>$data["LinesLenght"],
                "PipeType"=>$data["Pipe"]
            ]
        ];

        foreach ($data['Lines'] as $line) {
            if (isset($lines[$line['Name']])) {
                return response(['success' => false, 'error_code' => "invalid_linr"], Response::HTTP_NOT_ACCEPTABLE);
            } else {
                $lines[$line['Name']] = $line;
            }
        }

        $tree = [];

        $tree['Name'] = self::getMainLine($lines);
        self::getChilds($lines, $tree);

        $lines = array_values($lines);
        $data['Lines'] = $lines;
        $data['LineLoad'] = $tree['LineLoad'];
        $data['Flow'] = ($tree['LineLoad'] / 1000) / ($data['WaterDensity'] * $data['SpecificHeatOfWater'] * $data['TempDiff']) * 3600;

        foreach ($data['Lines'] as &$line) {
            // bilinenler : Name, Connection, PartLoad, LineLoad, Length, PipeType, PipeType

            $line['Flow'] = ($line['LineLoad'] / 1000) / ($data['WaterDensity'] * $data['SpecificHeatOfWater'] * $data['TempDiff']) * 3600;
            $line['StartSpeed'] = General::interpolation($line['LineLoad'], $data['MinLoad'], $data['MaxLoad'], $data['MinSpeed'], $data['MaxSpeed']);

            if ($data['DiameterAdvice'] == 'Hız Düşümü') {
                $line["EquivalentDiameter"] = sqrt(($line['Flow'] * 4) / (3.14 * $line['StartSpeed'] * 3600)) * 1000;
            } else {
                $diameter = DB::table('api__diameter_advice')
                    ->where('type', $data['DiameterAdvice'])
                    ->where('line_load', '>=', $data['LineLoad'])
                    ->orderBy('line_load', 'asc')
                    ->first();

                $line['EquivalentDiameter'] = $diameter->diameter;
            }

            if (isset($line['PipeType'])) {
                $pipe = DB::table('api__pipe')
                    ->where('standart', $line['PipeType'])
                    ->where('inner_d', '>=', $line['EquivalentDiameter'])
                    ->orderBy('inner_d', 'asc')
                    ->first();

                if (!$pipe) {
                    return response(['success' => false, 'error_code' => "invalid_pipe"], Response::HTTP_NOT_ACCEPTABLE);
                }

                $line["PipeInch"] = $pipe->inch;
                $line["PipeInnerD"] = $pipe->inner_d;
                $line["Emstivity"] = $pipe->emstivity;
                $line["FrictionCoefficient"] = 0;

                /////////////////////////
//            $line["PipeInnerD"] = 13;

                $line['NetSpeed'] = ($line['Flow'] * 4) / (3.14 * 3600 * pow($line['PipeInnerD'] / 1000, 2));

                /////////////////////
//            $line['NetSpeed'] = 0.014195;

                $line['Resistance'] = ($data['WaterDensity'] * $line['NetSpeed'] * ($line['PipeInnerD'] / 1000)) / $data['WaterViscosity'];

//            Emstivity  ???
                $line['KinematicViscosity'] = $data['WaterViscosity'] / $data['WaterDensity'];
                $line['Reynold'] = ($data['WaterDensity'] * $line['NetSpeed'] * ($line['PipeInnerD'] / 1000)) / $data['WaterViscosity'];
                $line['CoRoughness'] = ($line['Emstivity'] * pow(10, -3)) / ($line['PipeInnerD'] / 1000);

                if ($line['Reynold'] == 0) {
                    $line['Reynold'] = 1;
                }

                if ($line['Reynold'] <= 2100) {
                    $line['FrictionCoefficient'] = 64 / $line['Reynold'];
                } else if ($line['Reynold'] <= 100000) {
                    $line['FrictionCoefficient'] = 0.3164 / pow($line['Reynold'], 0.25);
                } else if ($line['Reynold'] <= 3000000) {
                    $line['FrictionCoefficient'] = 0.0032 + (0.221 / pow($line['Reynold'], 0.237));
                }

                $line['RelativeSmoothness'] = ($line['Emstivity'] * pow(10, -3)) / ($line['PipeInnerD'] / 1000);
                $line['PressureDrop'] = $line['FrictionCoefficient'] * (1 / ($line['PipeInnerD'] / 1000) * (($data['WaterDensity'] * pow($line['NetSpeed'], 2)) / 2));
                $line['TotalPressureDrop'] = $line['PressureDrop'] * $line['Length'];
            }
        }
        dd($data);
        return json_encode($data);
    }

    public static function getMainLine($lines) {
        $root = [];
        $names = [];

        foreach ($lines as $line) {
            if (!in_array($line['Name'], $names)) {
                $names[] = $line['Name'];
            }

            if (!in_array($line['Connection'], $root)) {
                $root[] = $line['Connection'];
            }
        }

        $root = array_values(array_diff($root, $names));

        if (count($root) == 1) {
            return $root[0];
        } else {
            return response(['success' => false, 'error_code' => "invalid_root"], Response::HTTP_NOT_ACCEPTABLE)->send();
        }
    }

    public static function getChilds(&$lines, &$parent) {
        if (!isset($parent['PartLoad'])) {
            $parent['PartLoad'] = 0;
        }

        $parent['LineLoad'] = 0;
        $parent['Childs'] = [];

        foreach ($lines as $line) {
            if ($line['Connection'] == $parent['Name']) {
                $c = self::getChilds($lines, $line);

                $parent['LineLoad'] += $line['LineLoad'];
                $parent['Childs'][] = $line;
            }
        }

        $parent['LineLoad'] += $parent['PartLoad'];

        if (isset($lines[$parent['Name']])) {
            $lines[$parent['Name']]["LineLoad"] = $parent['LineLoad'];
        }
    }
    public static function pipepressureHesapKaydet($update,$id,$data=[]) {
        $req_data = $data->session()->get('pipepressurehesap');
        $kullanici_id = $data->session()->get("id");
        $api_url = env('APP_API_URL');

        if($update==1 && isset($id))
        {
            $response = Http::withToken($data->session()->get('token'))->post($api_url.'pipeupdate',
            [         'id'=>$id,
                    'kullanici_id'=>$kullanici_id,
                    "adi"=>$req_data[0]["data"]["adi"],
                    "aciklama"=>$req_data[0]["data"]["aciklama"],
                    "MinSpeed"=>$req_data[0]["data"]["MinSpeed"],
                    "MaxSpeed"=>$req_data[0]["data"]["MaxSpeed"],
                    "MinLoad"=>$req_data[0]["data"]["MinLoad"],
                    "MaxLoad"=>$req_data[0]["data"]["MaxLoad"],
                    "GoingTemp"=>$req_data[0]["data"]["GoingTemp"],
                    "ReturnTemp"=>$req_data[0]["data"]["ReturnTemp"],
                    "FluidType"=>$req_data[0]["data"]["FluidType"],
                    "DiameterAdvice"=>$req_data[0]["data"]["DiameterAdvice"],
                    "Lines_Name"=>$req_data[0]["data"]["Lines"][0]["Name"],
                    "Lines_Connection"=>$req_data[0]["data"]["Lines"][0]["Connection"],
                    "Lines_PartLoad"=>$req_data[0]["data"]["Lines"][0]["PartLoad"],
                    "Lines_LineLoad"=>$req_data[0]["data"]["Lines"][0]["LineLoad"],
                    "Lines_Length"=>$req_data[0]["data"]["Lines"][0]["Length"],
                    "Lines_PipeType"=>$req_data[0]["data"]["Lines"][0]["PipeType"],
                    "Lines_Flow"=>$req_data[0]["data"]["Lines"][0]["Flow"],
                    "Lines_StartSpeed"=>$req_data[0]["data"]["Lines"][0]["StartSpeed"],
                    "Lines_EquivalentDiameter"=>$req_data[0]["data"]["Lines"][0]["EquivalentDiameter"],
                    "Lines_PipeInch"=>$req_data[0]["data"]["Lines"][0]["PipeInch"],
                    "Lines_PipeInnerD"=>$req_data[0]["data"]["Lines"][0]["PipeInnerD"],
                    "Lines_Emstivity"=>$req_data[0]["data"]["Lines"][0]["Emstivity"],
                    "Lines_FrictionCoefficient"=>$req_data[0]["data"]["Lines"][0]["FrictionCoefficient"],
                    "Lines_NetSpeed"=>$req_data[0]["data"]["Lines"][0]["NetSpeed"],
                    "Lines_Resistance"=>$req_data[0]["data"]["Lines"][0]["Resistance"],
                    "Lines_KinematicViscosity"=>$req_data[0]["data"]["Lines"][0]["KinematicViscosity"],
                    "Lines_Reynold"=>$req_data[0]["data"]["Lines"][0]["Reynold"],
                    "Lines_CoRoughness"=>$req_data[0]["data"]["Lines"][0]["CoRoughness"],
                    "Lines_RelativeSmoothness"=>$req_data[0]["data"]["Lines"][0]["RelativeSmoothness"],
                    "Lines_PressureDrop"=>$req_data[0]["data"]["Lines"][0]["PressureDrop"],
                    "Lines_TotalPressureDrop"=>$req_data[0]["data"]["Lines"][0]["TotalPressureDrop"],
                    "TempDiff"=>$req_data[0]["data"]["TempDiff"],
                    "TempAvg"=>$req_data[0]["data"]["TempAvg"],
                    "WaterDensity"=>$req_data[0]["data"]["WaterDensity"],
                    "SpecificHeatOfWater"=>$req_data[0]["data"]["SpecificHeatOfWater"],
                    "WaterViscosity"=>$req_data[0]["data"]["WaterViscosity"],
                    "DynamicViscosity"=>$req_data[0]["data"]["DynamicViscosity"],
                    "LineLoad"=>$req_data[0]["data"]["LineLoad"],
                    "Flow"=>$req_data[0]["data"]["Flow"],
            ]
        );
        return $response->json();

        }else{
        $response = Http::withToken($data->session()->get('token'))->post($api_url.'pipeSave',
            [
                    'kullanici_id'=>$kullanici_id,
                    "adi"=>$req_data[0]["data"]["adi"],
                    "aciklama"=>$req_data[0]["data"]["aciklama"],
                    "MinSpeed"=>$req_data[0]["data"]["MinSpeed"],
                    "MaxSpeed"=>$req_data[0]["data"]["MaxSpeed"],
                    "MinLoad"=>$req_data[0]["data"]["MinLoad"],
                    "MaxLoad"=>$req_data[0]["data"]["MaxLoad"],
                    "GoingTemp"=>$req_data[0]["data"]["GoingTemp"],
                    "ReturnTemp"=>$req_data[0]["data"]["ReturnTemp"],
                    "FluidType"=>$req_data[0]["data"]["FluidType"],
                    "DiameterAdvice"=>$req_data[0]["data"]["DiameterAdvice"],
                    "Lines_Name"=>$req_data[0]["data"]["Lines"][0]["Name"],
                    "Lines_Connection"=>$req_data[0]["data"]["Lines"][0]["Connection"],
                    "Lines_PartLoad"=>$req_data[0]["data"]["Lines"][0]["PartLoad"],
                    "Lines_LineLoad"=>$req_data[0]["data"]["Lines"][0]["LineLoad"],
                    "Lines_Length"=>$req_data[0]["data"]["Lines"][0]["Length"],
                    "Lines_PipeType"=>$req_data[0]["data"]["Lines"][0]["PipeType"],
                    "Lines_Flow"=>$req_data[0]["data"]["Lines"][0]["Flow"],
                    "Lines_StartSpeed"=>$req_data[0]["data"]["Lines"][0]["StartSpeed"],
                    "Lines_EquivalentDiameter"=>$req_data[0]["data"]["Lines"][0]["EquivalentDiameter"],
                    "Lines_PipeInch"=>$req_data[0]["data"]["Lines"][0]["PipeInch"],
                    "Lines_PipeInnerD"=>$req_data[0]["data"]["Lines"][0]["PipeInnerD"],
                    "Lines_Emstivity"=>$req_data[0]["data"]["Lines"][0]["Emstivity"],
                    "Lines_FrictionCoefficient"=>$req_data[0]["data"]["Lines"][0]["FrictionCoefficient"],
                    "Lines_NetSpeed"=>$req_data[0]["data"]["Lines"][0]["NetSpeed"],
                    "Lines_Resistance"=>$req_data[0]["data"]["Lines"][0]["Resistance"],
                    "Lines_KinematicViscosity"=>$req_data[0]["data"]["Lines"][0]["KinematicViscosity"],
                    "Lines_Reynold"=>$req_data[0]["data"]["Lines"][0]["Reynold"],
                    "Lines_CoRoughness"=>$req_data[0]["data"]["Lines"][0]["CoRoughness"],
                    "Lines_RelativeSmoothness"=>$req_data[0]["data"]["Lines"][0]["RelativeSmoothness"],
                    "Lines_PressureDrop"=>$req_data[0]["data"]["Lines"][0]["PressureDrop"],
                    "Lines_TotalPressureDrop"=>$req_data[0]["data"]["Lines"][0]["TotalPressureDrop"],
                    "TempDiff"=>$req_data[0]["data"]["TempDiff"],
                    "TempAvg"=>$req_data[0]["data"]["TempAvg"],
                    "WaterDensity"=>$req_data[0]["data"]["WaterDensity"],
                    "SpecificHeatOfWater"=>$req_data[0]["data"]["SpecificHeatOfWater"],
                    "WaterViscosity"=>$req_data[0]["data"]["WaterViscosity"],
                    "DynamicViscosity"=>$req_data[0]["data"]["DynamicViscosity"],
                    "LineLoad"=>$req_data[0]["data"]["LineLoad"],
                    "Flow"=>$req_data[0]["data"]["Flow"],
            ]
        );
        return $response->json();
    }
    }
    public static function pipepressureProjectSil($id="",$req)
    {
        $req_id = $id;
        $api_url = env('APP_API_URL');

        $response = Http::withToken($req->session()->get('token'))->post($api_url.'pipeprojesil',
            [
                "id"=>$req_id
            ]
        );

        return $response->json();
    }
    public static function pipepressureProjectDetay($data=[]) {
        $openexpansion_id = $data["projeid"];
        $api_url = env('APP_API_URL');
        $api_response_Data = Http::withToken($data->session()->get('token'))->post($api_url.'pipeprojelistele',
        [
            'id'=>$openexpansion_id,
            'kullanici_id'=>$data->session()->get("id"),
        ]);

        return $api_response_Data->json();
    }
}
