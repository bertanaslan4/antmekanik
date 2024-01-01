<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
class BoruHesabi extends Model
{
    public static function parcalar(){
        $sql = DB::table('api__flanged_pipe');
        $sql2 = DB::table('api__screwed_pipe');
        $response["flanged"]= $sql->get()->toArray();
        $response["screwed"]= $sql2->get()->toArray();


        return $response;
    }
}
