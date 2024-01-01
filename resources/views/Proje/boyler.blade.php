@extends('layout.default')
@section('content')
<div class="page-header card" >
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-box bg-c-blue"></i>
                <div class="d-inline">
                    <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Boyler')?> </h5>
                    <h6>{{$projedetay["data"]["proje_id"]}}-{{$projedetay["data"]["proje_adi"]}}</h6>
                </div>
            </div>
        </div>
         
    </div>
</div>
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('admin.boylerhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["boyler_id"])) ? null : $projedetay["data"]["boyler_id"] ])}}" method="post">
                            @csrf
                        <!--Form alani-->
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                            <div class="col-sm-4">
                                <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo !empty($projedetay["data"][0]) ? $projedetay["data"][0][0]["adi"] :"";?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                            <div class="col-sm-4">
                                <input class="form-control form-control-round"  type="text" id="aciklama" name="aciklama" placeholder="Lütfen açıklama yazınız" value="<?php echo !empty($projedetay["data"][0]) ? $projedetay["data"][0][0]["aciklama"] :"";?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_BuildType')?> :</label>
                            <div class="col-sm-4">
                                <select name="BuildType" id="BuildType" class="form-control form-control-primary">
                                    <option selected>Lütfen seçim yapın</option>
                                    @foreach($res_data["data"][6]["Data"] as $row)
                                    @if (isset($projedetay["data"][0][0]["BuildType"]) && $projedetay["data"][0][0]["BuildType"]==$row['BuildType'])
                                    <option value="{{$row["BuildType"]}}" selected>{{$row["BuildType"]}}</option>
                                    @else
                                            @if ($defaultdd["data"][0]["boyler_BuildType"]==$row['BuildType'])
                                                <option value="{{$row['BuildType']}}" selected>{{$row["BuildType"]}}</option>
                                            @else
                                                <option value="{{$row['BuildType']}}">{{$row["BuildType"]}}</option>  
                                            @endif
                            
                                    @endif
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <?php //dd($projedetay["data"]["Equipment"]); ?>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_Equipment')?>  :</label>
                            <div class="col-sm-8">
                            @foreach($res_data["data"][5]["Data"] as $key =>$row)

                                <div class="row">
                                    <div class="col-sm-3">
                                        @if (isset($projedetay["data"]["Equipment"][$key]))
                                                @if(isset($projedetay["data"]["Equipment"][$key])==$row["Equipment"])
                                                    <div class="checkbox-fade fade-in-primary">
                                                        <label>
                                                            <input type="checkbox" class="Equipment" id="secim_{{$row["Equipment"]}}" onchange="EquitmentClick('{{$row['Equipment']}}')"  name="Equipment[]" checked value="{{$row["Equipment"]}}">
                                                            <span class="cr">
                                                                <i
                                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                            </span>
                                                            <span>{{$row["Equipment"]}}</span>
                                                        </label>
                                                    </div>
                                                @endif                                           
                                            <br>
                                        @else @if ($defaultdd["data"][0]["boyler_Equipment_name"]==$row['Equipment'])                                
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" class="Equipment" id="secim_{{$row["Equipment"]}}" onchange="EquitmentClick('{{$row['Equipment']}}')"  name="Equipment[]" checked value="{{$row["Equipment"]}}">
                                                    <span class="cr">
                                                        <i
                                                            class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span>{{$row["Equipment"]}}</span>
                                                </label>
                                            </div>
                                            <br>
                                        @else
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" class="Equipment" id="secim_{{$row["Equipment"]}}" onchange="EquitmentClick('{{$row['Equipment']}}')" name="Equipment[]"  value="{{$row["Equipment"]}}">
                                                    <span class="cr">
                                                        <i
                                                            class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                    </span>
                                                    <span>{{$row["Equipment"]}}</span> 
                                                </label>
                                                
                                            </div>
                                        <br>
                                     @endif
                            
                                @endif

                                    </div>
                                    <div class="col-sm-2">

                                        @if (isset($projedetay["data"]["Equipment"][$key]))
                                                @if(isset($projedetay["data"]["Equipment"][$key])==$row["Equipment"])
                                                    <input class="form-control form-control-sm form-control-round Equipment_piece" id="{{$row["Equipment"]}}" type="text"  name="Equipment_piece[{{$key}}]" placeholder="Lütfen deger yazınız" value="{{$projedetay["data"]["Equipment"][$key]["Equipment_piece"]}}">
                                                    <br>
                                                @endif
                                        @else        

                                        <input class="form-control form-control-sm form-control-round Equipment_piece" id="{{$row["Equipment"]}}" disabled type="text"  name="Equipment_piece[{{$key}}]" placeholder="Lütfen deger yazınız" value="">
                                        <br>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_BoylerTempIn')?>  :</label>
                            <div class="col-sm-4">
                                <input type="number" name="BoylerTempIn" value="<?php echo isset($projedetay["data"][0][0]["BoylerTempIn"]) ? $projedetay["data"][0][0]["BoylerTempIn"] : $defaultdd["data"][0]["boyler_BoylerTempIn"] ?>" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_BoylerTempOut')?>  :</label>
                            <div class="col-sm-4">
                                <input type="number" name="BoylerTempOut" value="<?php echo isset($projedetay["data"][0][0]["BoylerTempOut"]) ? $projedetay["data"][0][0]["BoylerTempOut"] : $defaultdd["data"][0]["boyler_BoylerTempOut"] ?>" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_SpecificHeat')?> :</label>
                            <div class="col-sm-4">
                                <input type="number" name="SpecificHeat" value="<?php echo isset($projedetay["data"][0][0]["SpecificHeat"]) ? $projedetay["data"][0][0]["SpecificHeat"] : $defaultdd["data"][0]["boyler_SpecificHeat"] ?>" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?>  :</label>
                            <div class="col-sm-4">
                                <input type="number" name="piece" value="<?php echo isset($projedetay["data"][0][0]["Piece"]) ? $projedetay["data"][0][0]["Piece"] : $defaultdd["data"][0]["boyler_piece"] ?>" class="form-control form-control-round"
                                                                               placeholder="Lütfen Adet yazınız">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_Density')?> :</label>
                            <div class="col-sm-4">
                                <input type="number" name="Density" value="<?php echo isset($projedetay["data"][0][0]["Density"]) ? $projedetay["data"][0][0]["Density"] : $defaultdd["data"][0]["boyler_Density"] ?>" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_PrepareTime')?> :</label>
                            <div class="col-sm-4">
                                <input type="number" name="PrepareTime" value="<?php echo isset($projedetay["data"][0][0]["PrepareTime"]) ? $projedetay["data"][0][0]["PrepareTime"] : $defaultdd["data"][0]["boyler_PrepareTime"] ?>" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız">
                            </div>
                        </div>

                        <div class="form-group row">    
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Marka')?> :</label>
                            <div class="col-sm-4">
                                    <select class="js-example-tags col-sm-12" id="marka" onchange="MarkaChange(this.value)" multiple="multiple" name="brand[]">
                                        <option value="hepsi">Hepsi</option>
                                        @if (!empty($projedetay["BoylerBrand"]["data"]))                                                
                                        @foreach($projedetay["BoylerBrand"]["data"] as $row)

                                        <option value="{{$row["markasi"]}}">{{$row["markasi"]}}</option>
                                            
                                        @endforeach
                                        @endif
                                    </select>
                                
                            </div>
                        </div>
                       

                        <div class="form-group row">    
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                @if ($projedetay["data"]["edit"]==1)
                                <button  class="btn btn-warning btn-round waves-effect waves-light" id="hesapla"><?=__('staticmessage.Yenidenhesapla')?></button>
                                    @else
                                    <button  class="btn btn-info btn-round waves-effect waves-light" id="hesapla"><?=__('staticmessage.Hesapla')?></button>
                                @endif
                                
                            </div>
                        </div> 
                        </form>    
                    </div>
                    @if ($projedetay["data"]["edit"]==0)
                        @if (session()->has('boylerhesap'))
                        
                            <div class="col-md-12 col-lg-12">
                                @if (isset(session('boylerhesap')[0]["data"]["id"]))
                                <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('boylerhesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('boylerhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                <br>
                                <br>
                                
                                <form action="{{route('admin.boylerhesapkaydet',["update"=>1,"id"=>isset(session('boylerhesap')[0]["data"]["id"]) ? session('boylerhesap')[0]["data"]["id"] : null ] )}}" method="post">
                               
                                @else
                                <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                <br>
                                <br>
                                <form action="{{route('admin.boylerhesapkaydet')}}" method="post">
                               
                                @endif
                              
                                
                                    @csrf
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('boylerhesap')[0]["data"]["adi"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('boylerhesap')[0]["data"]["aciklama"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Boyler_BuildType')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('boylerhesap')[0]["data"]["BuildType"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Boyler_Equipment')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <table style="width:100%">
                                                        <tr>
                                                          <th><?=__('staticmessage.Boyler_name')?></th>
                                                          <th><?=__('staticmessage.Piece')?></th>
                                                          <th><?=__('staticmessage.Boyler_WaterConsumption')?></th>
                                                        </tr>
                                                        @foreach (session('boylerhesap')[0]["data"]["Equipments"] as $item)

                                                        <tr>
                                                            <td>{{$item["Name"]}}</td>
                                                            <td>{{$item["Piece"]}}</td>
                                                            <td>{{$item["WaterConsumption"]}}</td>
                                                          </tr>
                                                        
                                                        @endforeach
                                                      </table>
                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Boyler_PrepareTime')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('boylerhesap')[0]["data"]["PrepareTime"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Boyler_SpecificHeat')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('boylerhesap')[0]["data"]["SpecificHeat"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Boyler_Density')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('boylerhesap')[0]["data"]["Density"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Boyler_SelectedVolume')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('boylerhesap')[0]["data"]["SelectedVolume"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Boyler_TemperatureDiff')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('boylerhesap')[0]["data"]["TemperatureDiff"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Boyler_HeatingLoad')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! bcdiv(session('boylerhesap')[0]["data"]["HeatingLoad"],1,2)  !!}</p>
                                                </div>
                                            </div><ul class="basic-list list-icons">
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Boyler_BoylerTempIn')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('boylerhesap')[0]["data"]["BoylerTempIn"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Boyler_BoylerTempOut')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('boylerhesap')[0]["data"]["BoylerTempOut"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Boyler_TempIn')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('boylerhesap')[0]["data"]["TempIn"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Boyler_TempOut')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('boylerhesap')[0]["data"]["TempOut"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Boyler_StorageFactor')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('boylerhesap')[0]["data"]["StorageFactor"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Boyler_UserFactor')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('boylerhesap')[0]["data"]["UserFactor"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Boyler_WaterConsumption')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('boylerhesap')[0]["data"]["WaterConsumption"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Piece')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('boylerhesap')[0]["data"]["Piece"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Boyler_AvgWaterConsumption')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('boylerhesap')[0]["data"]["AvgWaterConsumption"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Boiler_Capacity')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('boylerhesap')[0]["data"]["BoylerCapacity"] !!}</p>
                                                    </div>
                                                </div>
                                                <ul class="basic-list list-icons">
                                                    @if(!empty(session('boylerhesap')[0]["data"]["Product"]))
      
                                                      @foreach(session('boylerhesap')[0]["data"]["Product"] as  $key => $row )
      
                                                          <li style="margin-bottom: 40px;">
                                                              <div class="row">
                                                                  <div class="col-md-2">
                                                                      <div class="radio radio-inline">
                                                                          <ul>
                                                                              <li style="display: inline;"><input style="width: 20px;height: 20px;" type="radio" name="Boyler" value="{{$row["id"]}}"></li>
                                                                              <li style="display: inline;"> <label>
                                                                                <img src="{{asset('banner1.png')}}" height="50" width="50" alt="">
                                                                            </label></li>
                                                                          </ul>
                                                                         
                                                                      </div>
                                                                      
                                                                  </div>
                                                                  <div class="col-md-6">
                                                                      <h6 style="font-weight: bold;">{{$row["adi"]}}</h6>
                                                                      <p>{{$row["tipi"]}}  </p>
                                                                       
                                                                  <ul>
                                                                    <li style=" display: inline;"><img src="{{asset('user1.png')}}" onclick="detaygoster({{$key}});return false;" width="50" height="50" alt="" id="satisdetay{{$key}}">
                                                                        
                                                                    </li>
                                                                    
                                                                    <li style=" display: inline;"><img src= "{{asset('user1.png')}}" onclick="detaygoster1({{$key}});return false;" width="50" height="50" alt="" id="satisdetay1{{$key}}"> 
                                                                         
                                                                    </li>
                                                                    <li style=" display: inline;"><a target="blank" href="{{asset($row["katalog"])}}">
                                                                        <img src="{{asset('pdf.png')}}" width="40" height="40" alt="">
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <ul>
                                                                    <li style="display:inline "><?=__('staticmessage.Boyler_S_Uretici')?></li>
                                                                    <li style="display:inline ">&nbsp; <?=__('staticmessage.Boyler_S_Satici')?></li>
                                                                    <li style="display:inline ">&nbsp;&nbsp;&nbsp;<?=__('staticmessage.Boyler_Katalog')?></li>
                                                                </ul>
                                                                  @if(!empty($row["Producer"]))
                                                                      <div id="boyler{{$key}}" style="display: none;margin-left:-20px;margin-top: 5px;">
                                                                        <div class="col-lg-12 col-xl-12">
                                                                            <div class="card-sub">
                                                                            <div class="card-block" style=" padding: 30px;">
                                                                                <h6 style="font-weight: bold"><?=__('staticmessage.Producer')?></h6>
                                                                                @if(!empty($row["Producer"]["UrunTipi"]))
                                                                                    <p><?=__('staticmessage.Boyler_Urun_tipi')?>  : {{$row["Producer"]["UrunTipi"]}}</p>
                                                                                @endif
                                                                                @if(!empty($row["Producer"]["UUretici"]))
                                                                                    <p><?=__('staticmessage.Boyler_U_Uretici')?>  : {{$row["Producer"]["UUretici"]}}</p>
                                                                                @endif
                                                                                @if(!empty($row["Producer"]["UAdres1"]))
                                                                                    <p><?=__('staticmessage.Boyler_U_adres1')?>  : {{$row["Producer"]["UAdres1"]}}</p>
                                                                                @endif
                                                                                @if(!empty($row["Producer"]["UAdres2"]))
                                                                                    <p><?=__('staticmessage.Boyler_U_adres2')?>  : {{$row["Producer"]["UAdres2"]}}</p>
                                                                                @endif
                                                                                @if(!empty($row["Producer"]["USemt"]))
                                                                                <p><?=__('staticmessage.Boyler_U_semt')?>  : {{$row["Producer"]["USemt"]}}</p>
                                                                               @endif
                                                                               @if(!empty($row["Producer"]["USehir"]))
                                                                               <p><?=__('staticmessage.Boyler_U_sehir')?>  : {{$row["Producer"]["USehir"]}}</p>
                                                                               @endif
                                                                               @if(!empty($row["Producer"]["UUlke"]))
                                                                                    <p><?=__('staticmessage.Boyler_U_ulke')?>  : {{$row["Producer"]["UUlke"]}}</p>
                                                                                @endif
                                                                                @if(!empty($row["Producer"]["UPostaKodu"]))
                                                                                    <p><?=__('staticmessage.Boyler_U_posta_kodu')?>  : {{$row["Producer"]["UPostaKodu"]}}</p>
                                                                                @endif
                                                                                @if(!empty($row["Producer"]["UTelefon"]))
                                                                                <p><?=__('staticmessage.Boyler_U_telefon')?>  : {{$row["Producer"]["UTelefon"]}}</p>
                                                                                @endif
                                                                                @if(!empty($row["Producer"]["UFaks"]))
                                                                                    <p><?=__('staticmessage.Boyler_U_faks')?>  : {{$row["Producer"]["UFaks"]}}</p>
                                                                                @endif
                                                                                @if(!empty($row["Producer"]["UKodu"]))
                                                                                    <p><?=__('staticmessage.Boyler_U_Kodu')?>  : {{$row["Producer"]["UKodu"]}}</p>
                                                                                @endif
                                                                             </div>
                                                                            </div>
                                                                            </div>
                                                                      </div>
                                                                  @endif
                                                                  <div id="boyler1{{$key}}" style="display: none;margin-left:-20px;margin-top: 5px;">
                                                                    @if(!empty($row["Seller"]))
                                                                    <div class="col-lg-12 col-xl-12">
                                                                      <div class="card-sub">
                                                                      
                                                                      <div class="card-block" style=" padding: 30px;">
                                                                          <h6 style="font-weight: bold">Satıcı</h6>
                                                                        
                                                                           
                                                                          @if(!empty($row["Seller"]["SUretici"]))
                                                                              <p><?=__('staticmessage.Boyler_S_Uretici')?>  : {{$row["Seller"]["SUretici"]}}</p>
                                                                          @endif
                                                                          @if(!empty($row["Seller"]["SSatici"]))
                                                                              <p><?=__('staticmessage.Boyler_S_Satici')?> : {{$row["Seller"]["SSatici"]}}</p>
                                                                          @endif
                                                                          @if(!empty($row["Seller"]["SAdres1"]))
                                                                          <p><?=__('staticmessage.Boyler_S_adres1')?> : {{$row["Seller"]["SAdres1"]}}</p>
                                                                         @endif
                                                                         @if(!empty($row["Seller"]["SAdres2"]))
                                                                         <p><?=__('staticmessage.Boyler_S_adres2')?> : {{$row["Seller"]["SAdres2"]}}</p>
                                                                         @endif
                                                                         @if(!empty($row["Seller"]["SSemt"]))
                                                                         <p><?=__('staticmessage.Boyler_S_semt')?> : {{$row["Seller"]["SSemt"]}}</p>
                                                                        @endif
                                                                        @if(!empty($row["Seller"]["SSehir"]))
                                                                        <p><?=__('staticmessage.Boyler_S_sehir')?> : {{$row["Seller"]["SSehir"]}}</p>
                                                                        @endif
                                                                        @if(!empty($row["Seller"]["SUlke"]))
                                                                        <p><?=__('staticmessage.Boyler_S_ulke')?> : {{$row["Seller"]["SUlke"]}}</p>
                                                                        @endif
                                                                        @if(!empty($row["Seller"]["SPostaKodu"]))
                                                                        <p><?=__('staticmessage.Boyler_S_posta_kodu')?> : {{$row["Seller"]["SPostaKodu"]}}</p>
                                                                        @endif
                                                                        @if(!empty($row["Seller"]["STelefon"]))
                                                                        <p><?=__('staticmessage.Boyler_S_telefon')?> : {{$row["Seller"]["STelefon"]}}</p>
                                                                        @endif
                                                                        @if(!empty($row["Seller"]["SFaks"]))
                                                                        <p><?=__('staticmessage.Boyler_S_faks')?> : {{$row["Seller"]["SFaks"]}}</p>
                                                                        @endif
                                                                        @if(!empty($row["Seller"]["UKodu"]))
                                                                        <p><?=__('staticmessage.Boyler_U_kodu')?> : {{$row["Seller"]["UKodu"]}}</p>
                                                                        @endif
                                                                      @endif
                                                                       </div>
                                                                      </div>
                                                                      </div>
                                                                  </div>
                                                                  </div>
                                                              </div>
      
      
      
                                                          </li>
                                                      @endforeach
                                                    @endif
      
                                                  </ul>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                    </label>
                                                    <div class="col-sm-6">
                                                        @if (isset(session('boylerhesap')[0]["data"]["edit"]) && session('boylerhesap')[0]["data"]["edit"]==1)
                                                        <input type="submit"  value="<?=__('staticmessage.Güncelle')?>" class="btn btn-warning btn-round waves-effect waves-light"></input>
                                                        @else
                                                        <input type="submit"  value="<?=__('staticmessage.Kaydet')?>" class="btn btn-info btn-round waves-effect waves-light"></input>
                                                        @endif
                                                        
                                                    </div>
                                                </div>


                                            </ul>

                                        </div>
                                        <div class="col-md-6">
                                            
                                        </div>
                                    </div>

                                </div>
                                </form>
                            </div>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section("footerExtra")
    <script type="text/javascript">
     function detaygoster(key)
    {
        document.getElementById("boyler"+key).style.display="block";
        document.getElementById("boyler1"+key).style.display="none";

        
    }
    function detaygoster1(key)
    {
        document.getElementById("boyler1"+key).style.display="block";
        document.getElementById("boyler"+key).style.display="none";

         
    }
    $(document).ready(function(){
        let secili="";
        $(".Equipment:checked").each(function(){
            secili = $(this).val();
        });
        var eleman = document.getElementById(secili);
        eleman.removeAttribute("disabled");         
    });
    function MarkaChange(val)
    {
       
        options = document.getElementById("marka");
        if(val=="hepsi")
        {
            for ( i=0; i<options.length; i++)
            {
                if(options[i].value=="hepsi")
                {
                    options[i] =null;
                    var opt = document.createElement('option');
                    opt.value ="hepsi";
                    opt.innerHTML ="Hepsi";
                    options.appendChild(opt);

                }else{
                    options[i].selected = "true"; 
                }
                              
            }

        }
    	
    }
    function EquitmentClick(val) {

        var checkBox = document.getElementById('secim_'+val);

        if (checkBox.checked == true){
            var eleman = document.getElementById(val);
            eleman.removeAttribute("disabled");  
        } else {
            document.getElementById(val).disabled = true;
        }

       
        
    }
    </script>
@endsection               