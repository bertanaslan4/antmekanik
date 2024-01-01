@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Davlumbaz')?> </h5>
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
                         <form action="{{route('admin.paddleboxhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["paddlebox_id"])) ? null : $projedetay["data"]["paddlebox_id"] ])}}" method="post">
                            @csrf
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                              <div class="col-sm-4">
                                  <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0][0]) ? $projedetay["data"][0][0]["adi"] :'';?>">
                              </div>
                          </div>
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                              <div class="col-sm-4">
                                  <textarea rows="5" cols="5" class="form-control" placeholder="Lütfen bir açıklama yazınız" id="aciklama" name="aciklama"><?php echo isset($projedetay["data"][0][0]) ? $projedetay["data"][0][0]["aciklama"] :'';?></textarea>
                                 
                              </div>
                          </div>
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_KitchenType')?> :</label>
                              <div class="col-sm-4">
                                   <select name="KitchenType" id="KitchenType" class="form-control form-control-primary">
                                        <option selected>Lütfen seçim yapın</option>
                                        @foreach ($res_data["data"][11]["Data"] as $row)

                                        @if (isset($projedetay["data"][0][0]["KitchenType"]) && $projedetay["data"][0][0]["KitchenType"]==$row["KitchenType"])
                                            <option value="{{$row["KitchenType"]}}" selected>{{$row["KitchenType"]}} {{$row["RoConcurrency"]}}</option>
                                        @else
                                        @if ($defaultdd["data"][0]["paddlebox_KitchenType"]==$row["KitchenType"])
                                            <option value="{{$row["KitchenType"]}}" selected>{{$row["KitchenType"]}} {{$row["RoConcurrency"]}}</option>
                                        @else
                                            
                                            <option value="{{$row["KitchenType"]}}">{{$row["KitchenType"]}} {{$row["RoConcurrency"]}}</option>  
                                        @endif
                                    
                                        @endif


                                        @endforeach
                                    </select>
                              </div>
                          </div>
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_KitchenDensity')?> :</label>
                              <div class="col-sm-4">
                                   <select name="KitchenDensity" id="KitchenDensity" class="form-control form-control-primary">
                                        <option selected>Lütfen seçim yapın</option>
                                        @foreach ($res_data["data"][11]["Data"] as $row)

                                        @if (isset($projedetay["data"][0][0]["KitchenDensity"]) && $projedetay["data"][0][0]["KitchenDensity"]==$row["KitchenDensity"])
                                            <option value="{{$row["KitchenDensity"]}}" selected>{{$row["KitchenDensity"]}} {{$row["RoConcurrency"]}}</option>
                                        @else
                                        @if ($defaultdd["data"][0]["paddlebox_KitchenDensity"]==$row["KitchenDensity"])
                                            <option value="{{$row["KitchenDensity"]}}" selected>{{$row["KitchenDensity"]}} {{$row["RoConcurrency"]}}</option>
                                        @else
                                            <option value="{{$row["KitchenDensity"]}}">{{$row["KitchenDensity"]}} {{$row["RoConcurrency"]}}</option>  
                                        @endif
                                    
                                        @endif 

                                        @endforeach
                                    </select>
                              </div>
                          </div>
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                              <div class="col-sm-4">
                                   <input type="number" name="Piece" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0][0]["Piece"]) ? $projedetay["data"][0][0]["Piece"] : $defaultdd["data"][0]["paddlebox_Piece"] ?>">
                              </div>
                          </div>
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_ReductionFactorPos')?> :</label>
                              <div class="col-sm-4">
                                   <select name="ReductionFactorPos" id="ReductionFactorPos" class="form-control form-control-primary">
                                        <option selected>Lütfen seçim yapın</option>
                                        @foreach ($res_data["data"][12]["Data"] as $row)

                                        @if (isset($projedetay["data"][0][0]["ReductionFactorPos"]) && $projedetay["data"][0][0]["ReductionFactorPos"]==$row["Position"])
                                            <option value="{{$row["Position"]}}" selected>{{$row["Position"]}}</option>
                                        @else
                                        @if ($defaultdd["data"][0]["paddlebox_ReductionFactorPos"]==$row["Position"])
                                            <option value="{{$row["Position"]}}" selected>{{$row["Position"]}}</option>
                                        @else
                                            <option value="{{$row["Position"]}}">{{$row["Position"]}}</option>  
                                        @endif
                                    
                                        @endif


                                        @endforeach
                                    </select>
                              </div>
                          </div>
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_KitchenArea')?> :</label>
                              <div class="col-sm-4">
                                   <input type="number" name="KitchenArea" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0][0]["KitchenArea"]) ? $projedetay["data"][0][0]["KitchenArea"] : $defaultdd["data"][0]["paddlebox_KitchenArea"] ?>">
                              </div>
                          </div>
                          
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_Devices')?> :</label>
                              <div class="col-sm-8">
                                @foreach($res_data["data"][29]["Data"] as $key =>$row)

                                
    
                                    <div class="row">
                                        <div class="col-sm-3">
                                            @if (isset($projedetay["data"]["Devices"][$key]))
                                                    @if(isset($projedetay["data"]["Devices"][$key])==$row["title"])
                                                        <div class="checkbox-fade fade-in-primary">
                                                            <label>
                                                                <input type="checkbox" class="DevicesName" id="secim_{{$row["title"]}}" onchange="EquitmentClick('{{$row['title']}}')"  name="DevicesName[]" checked value="{{$row["title"]}}">
                                                                <span class="cr">
                                                                    <i
                                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                                </span>
                                                                <span>{{$row["title"]}}</span>
                                                            </label>
                                                        </div>
                                                    @endif                                           
                                                <br>
                                            @else @if ($defaultdd["data"][0]["paddlebox_Devices_Name"]==$row['title'])
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" class="DevicesName" id="secim_{{$row["title"]}}" onchange="EquitmentClick('{{$row['title']}}')"  name="DevicesName[]" checked value="{{$row["title"]}}">
                                                        <span class="cr">
                                                            <i
                                                                class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span>{{$row["title"]}}</span>
                                                    </label>
                                                </div>
                                                <br>
                                            @else
                                            
                                                <div class="checkbox-fade fade-in-primary">
                                                    <label>
                                                        <input type="checkbox" class="DevicesName" id="secim_{{$row["title"]}}" onchange="EquitmentClick('{{$row['title']}}')" name="DevicesName[]"  value="{{$row["title"]}}">
                                                        <span class="cr">
                                                            <i
                                                                class="cr-icon icofont icofont-ui-check txt-primary"></i>
                                                        </span>
                                                        <span>{{$row["title"]}}</span> 
                                                    </label>
                                                    
                                                </div>
                                            <br>
                                         @endif
                                
                                    @endif
    
                                        </div>
                                        <div class="col-sm-2">

                                            
    
                                            @if (isset($projedetay["data"]["Devices"][$key]))
                                                    @if(isset($projedetay["data"]["Devices"][$key])==$row["title"])
                                                        <input class="form-control form-control-sm form-control-round Equipment_piece" id="{{$row["title"]}}" type="text"  name="Devicespiece[{{$key}}]" placeholder="Lütfen deger yazınız" value="{{$projedetay["data"]["Devices"][$key]["Devices_piece"]}}">
                                                        <br>
                                                    @endif
                                            @else        
    
                                            <input class="form-control form-control-sm form-control-round Equipment_piece" id="{{$row["title"]}}" disabled type="text"  name="Devicespiece[{{$key}}]" placeholder="Lütfen deger yazınız" value="">
                                            <br>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
    
                            </div>
                          </div>
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_KitchenHeight')?> :</label>
                              <div class="col-sm-4">
                                   <input type="number" name="KitchenHeight"  class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0][0]["KitchenHeight"]) ? $projedetay["data"][0][0]["KitchenHeight"] : $defaultdd["data"][0]["paddlebox_KitchenHeight"] ?>">
                              </div>
                          </div>
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_HeatSourceDistance')?> :</label>
                              <div class="col-sm-4">
                                   <input type="text" name="HeatSourceDistance" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0][0]["HeatSourceDistance"]) ? $projedetay["data"][0][0]["HeatSourceDistance"] : $defaultdd["data"][0]["paddlebox_HeatSourceDistance"] ?>">
                              </div>
                          </div>
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_PaddleboxHeight')?> :</label>
                              <div class="col-sm-4">
                                   <input type="text" name="PaddleboxHeight" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0][0]["PaddleboxHeight"]) ? $projedetay["data"][0][0]["PaddleboxHeight"] : $defaultdd["data"][0]["paddlebox_PaddleboxHeight"] ?>">
                              </div>
                          </div>
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_PaddleboxWidth')?> :</label>
                              <div class="col-sm-4">
                                   <input type="text" name="PaddleboxWidth" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["PaddleboxWidth"]) ? $projedetay["data"][0]["PaddleboxWidth"] : $defaultdd["data"][0]["paddlebox_PaddleboxWidth"] ?>">
                              </div>
                          </div>
                          <div class="form-group row">    
                              <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_OverflowAirFactor')?> :</label>
                              <div class="col-sm-4">
                                   <input type="text" name="OverflowAirFactor" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0][0]["OverflowAirFactor"]) ? $projedetay["data"][0][0]["OverflowAirFactor"] : $defaultdd["data"][0]["paddlebox_OverflowAirFactor"] ?>">
                              </div>
                          </div>
                          <div class="form-group row">    
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Marka')?> :</label>
                            <div class="col-sm-4">
                                    <select class="js-example-tags col-sm-12" id="marka" onchange="MarkaChange(this.value)" multiple="multiple" name="brand[]">
                                        <option value="hepsi">Hepsi</option>
                                        @if (!empty($projedetay["PumpBrand"]["data"]))                                                
                                        @foreach($projedetay["PumpBrand"]["data"] as $row)

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

                        @if (session()->has('paddleboxhesap'))
                     <div class="col-md-12">
                         @if (isset(session('paddleboxhesap')[0]["data"]["id"]))
                                <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('paddleboxhesap')[0]["data"]["id"] !!} </b> <br> <b> Project: {!! session('paddleboxhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                <br>
                                <br>
                                <form action="{{route('admin.paddleboxhesapkaydet',["update"=>1,"id"=>isset(session('paddleboxhesap')[0]["data"]["id"]) ? session('paddleboxhesap')[0]["data"]["id"] : null ] )}}" method="post">
                                @else
                                <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                <br>
                                <br>
                                <form action="{{route('admin.paddleboxhesapkaydet')}}" method="post">
                               
                                @endif
                         @csrf
                         <div class="card-block">
                              <div class="row">
                                  <div class="col-md-8">
                                   <div class="form-group row">
                                        <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                        <div class="col-sm-6 col-form-label">
                                            <p>{!! session('paddleboxhesap')[0]["data"]["adi"] !!}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                        <div class="col-sm-6 col-form-label">
                                            <p>{!! session('paddleboxhesap')[0]["data"]["aciklama"] !!}</p>
                                        </div>
                                    </div>
                                      <div class="form-group row">
                                          <label class="col-sm-6"><b><?=__('staticmessage.Paddlebox_KitchenType')?>:</b></label>
                                          <div class="col-sm-6 col-form-label">
                                              <p>{!! session('paddleboxhesap')[0]["data"]["KitchenType"] !!}</p>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-sm-6"><b><?=__('staticmessage.Paddlebox_KitchenDensity')?>:</b></label>
                                          <div class="col-sm-6 col-form-label">
                                              <p>{!! session('paddleboxhesap')[0]["data"]["KitchenDensity"] !!}</p>
                                             </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-sm-6">
                                              <b><?=__('staticmessage.Paddlebox_KitchenArea')?>:</b>
                                          </label>
                                          <div class="col-sm-6">
                                              <p>{!! session('paddleboxhesap')[0]["data"]["KitchenArea"] !!}</p>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-sm-6">
                                              <b><?=__('staticmessage.Paddlebox_KitchenHeight')?>:</b>
                                          </label>
                                          <div class="col-sm-6">
                                              <p>{!! session('paddleboxhesap')[0]["data"]["KitchenHeight"] !!}</p>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-sm-6">
                                              <b><?=__('staticmessage.Paddlebox_PaddleboxWidth')?>:</b>
                                          </label>
                                          <div class="col-sm-6">
                                              <p>{!! session('paddleboxhesap')[0]["data"]["PaddleboxWidth"] !!}</p>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-sm-6">
                                              <b><?=__('staticmessage.Paddlebox_PaddleboxHeight')?>:</b>
                                          </label>
                                          <div class="col-sm-6">
                                              <p>{!! session('paddleboxhesap')[0]["data"]["PaddleboxHeight"] !!}</p>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-sm-6">
                                              <b><?=__('staticmessage.Paddlebox_HeatSourceDistance')?>:</b>
                                          </label>
                                          <div class="col-sm-6">
                                              <p>{!! session('paddleboxhesap')[0]["data"]["HeatSourceDistance"] !!}</p>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-sm-6">
                                              <b><?=__('staticmessage.Paddlebox_OverflowAirFactor')?>:</b>
                                          </label>
                                          <div class="col-sm-6">
                                              <p>{!! session('paddleboxhesap')[0]["data"]["OverflowAirFactor"] !!}</p>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label class="col-sm-6">
                                              <b><?=__('staticmessage.Paddlebox_ReductionFactorPos')?>:</b>
                                          </label>
                                          <div class="col-sm-6">
                                              <p>{!! session('paddleboxhesap')[0]["data"]["ReductionFactorPos"] !!}</p>
                                          </div>
                                      </div>
                                      <ul class="basic-list list-icons">
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Paddlebox_ReductionFactor')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('paddleboxhesap')[0]["data"]["ReductionFactor"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Paddlebox_ConcurrencyFactor')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('paddleboxhesap')[0]["data"]["ConcurrencyFactor"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Paddlebox_TotalVapor')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('paddleboxhesap')[0]["data"]["TotalVapor"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Paddlebox_SensibleHeatConvective')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('paddleboxhesap')[0]["data"]["SensibleHeatConvective"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Paddlebox_ThermalAirFlow')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('paddleboxhesap')[0]["data"]["ThermalAirFlow"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Paddlebox_AirFlow')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('paddleboxhesap')[0]["data"]["AirFlow"] !!}</p>
                                            </div>
                                        </div>

                                    <div class="form-group row">
                                        <label class="col-sm-6">
                                            <b><?=__('staticmessage.Paddlebox_Devices')?>:</b>
                                        </label>
                                        <div class="col-sm-12">
                                            <br>

                                            <table style="width:100%" responsive="true">
                                                <tr>
                                                  <th class="space"><?=__('staticmessage.Paddlebox_Devices_Name')?></th>
                                                  <th class="space"><?=__('staticmessage.Paddlebox_Devices_Piece')?></th>
                                                  <th class="space"><?=__('staticmessage.Paddlebox_Devices_RatedPower')?></th>
                                                  <th class="space"><?=__('staticmessage.Paddlebox_Devices_TotalPower')?></th>
                                                  <th class="space"><?=__('staticmessage.Paddlebox_Devices_Vapor')?></th>
                                                  <th class="space"><?=__('staticmessage.Paddlebox_Devices_TotalVapor')?></th>
                                                  <th class="space"><?=__('staticmessage.Paddlebox_Devices_SensibleHeat')?></th>
                                                  <th class="space"><?=__('staticmessage.Paddlebox_Devices_SensibleHeatConvective')?></th>
                                                </tr>
                                                @foreach (session('paddleboxhesap')[0]["data"]["Devices"] as $item)

                                                <tr>
                                                    <td class="space">{{$item["Name"]}}</td>
                                                    <td class="space">{{$item["Piece"]}}</td>
                                                    <td class="space">{{$item["RatedPower"]}}</td>
                                                    <td class="space">{{$item["TotalPower"]}}</td>
                                                    <td class="space">{{$item["Vapor"]}}</td>
                                                    <td class="space">{{$item["TotalVapor"]}}</td>
                                                    <td class="space">{{$item["SensibleHeat"]}}</td>
                                                    <td class="space">{{$item["SensibleHeatConvective"]}}</td>
                                                  </tr>
                                                
                                                @endforeach
                                              </table>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-6">
                                      </label>
                                      <div class="col-sm-6">
                                          @if (isset(session('paddleboxhesap')[0]["data"]["edit"]) && session('paddleboxhesap')[0]["data"]["edit"]==1)
                                          <input type="submit"  value="<?=__('staticmessage.Güncelle')?>" class="btn btn-warning btn-round waves-effect waves-light"></input>
                                          @else
                                          <input type="submit"  value="<?=__('staticmessage.Kaydet')?>" class="btn btn-info btn-round waves-effect waves-light"></input>
                                          @endif
                                          
                                      </div>
                                  </div>


                                    </ul>
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
@endsection
  
@section("footerExtra")
    <script type="text/javascript">
        function detaygoster(key)
    {
        document.getElementById("boyler"+key).style.display="block";
        document.getElementById("satisdetay"+key).style.display="none";
    }
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
    function showmodal(projeid)
    {
        //.usermodaldetail modal divin classı
        var id = projeid;
        $.ajax({
            url : '{{ route("admin.circulationpumpdetail") }}',
            type: 'POST',
            dataType:'html',
            data:{"projeid":id},
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success:function(data){
                $('#showmodalcontent').html(data);
            },
        });
    }

    $('.example').DataTable({
            "pagingType": "full_numbers",
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Turkish.json',
            },
            responsive: true,

    });
    $('.example2').DataTable({
            "pagingType": "full_numbers",
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Turkish.json'
            },
            responsive: true
    });
    $(document).ready(function(){
        let secili="";
        $(".DevicesName:checked").each(function(){
            secili = $(this).val();
        });
        var eleman = document.getElementById(secili);
        eleman.removeAttribute("disabled");         
    });
    
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
<style>
    .space{
        padding-left:15px;
    }
</style>