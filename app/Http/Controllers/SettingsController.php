<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\Project;
use App;
use Lang;
class SettingsController extends Controller
{
    private $lang = '';
    private $file;
    private $key;
    private $value;
    private $path;
    private $arrayLang = array();

    public function sabitdegiskenler($dil="",Request $request)
    {
        $headertype = Project::HeaderType($request);
        $WaterExpansion = Project::WaterExpansion($request);
        $valvetype = Project::ValveType($request);
        return view('sabitveriler',compact('headertype','WaterExpansion','valvetype'));
    }
    public function updateconst(Request $request)
    {
        
        $response =Settings::defaultUpdate($request);
        return response()->json($response);

    }
}
