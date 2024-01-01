@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>  / <?=__('staticmessage.Sogukdepo')?>  </h5>
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
                         <form action="{{route('admin.coldstoragehesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["coldstorage_id"])) ? null : $projedetay["data"]["coldstorage_id"] ])}}" method="post">
                            
                              @csrf
                              <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                                   <div class="col-sm-4">
                                       <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["adi"] :"";?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                                   <div class="col-sm-4">
                                       <textarea rows="5" cols="5" class="form-control" placeholder="Lütfen bir açıklama yazınız" id="aciklama" name="aciklama"><?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["aciklama"] :"";?></textarea>
                                      
                                   </div>
                               </div>

                               

                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_ProductType')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="ProductType" id="ProductType" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][13]["Data"] as $row)

                                            

                                             @if (isset($projedetay["data"][0]["ProductType"]) && $projedetay["data"][0]["ProductType"]==trim($row["ProductType"]))
                                                    <option value="{{$row["ProductType"]}}" selected>{{$row["ProductType"]}}</option>
                                                @else
                                                    @if ($defaultdd["data"][0]["coldstorage_ProductType"]==trim($row["ProductType"]))
                                                        <option value="{{$row["ProductType"]}}" selected>{{$row["ProductType"]}}</option>
                                                    @else
                                                        <option value="{{$row["ProductType"]}}">{{$row["ProductType"]}}</option>  
                                                    @endif
                                        
                                            @endif

                                             @endforeach
                                         </select>
                                   </div>
                               </div>
                               <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_EnclosureType')?> :</label>
                                <div class="col-sm-4">
                                     <select name="EnclosureType" id="EnclosureType" class="form-control form-control-primary">
                                          <option selected>Lütfen seçim yapınız</option>
                                          @foreach ($res_data["data"][14]["Data"] as $row)

                                          @if (isset($projedetay["data"][0]["EnclosureType"]) && $projedetay["data"][0]["EnclosureType"]==$row['Type'])
                                             <option value="{{$row['Type']}}" selected>{{$row['Type']}}</option>
                                         @else
                                             @if ($defaultdd["data"][0]["coldstorage_EnclosureType"]==$row["Type"])
                                                 <option value="{{$row['Type']}}" selected>{{$row['Type']}}</option>
                                             @else
                                                 <option value="{{$row['Type']}}">{{$row['Type']}}</option>  
                                             @endif
                                     
                                         @endif

                                          @endforeach
                                      </select>
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_ProductQuantity')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="ProductQuantity"  class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["ProductQuantity"]) ? $projedetay["data"][0]["ProductQuantity"] : $defaultdd["data"][0]["coldstorage_ProductQuantity"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_EntryTemp')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="EntryTemp"  class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["EntryTemp"]) ? $projedetay["data"][0]["EntryTemp"] : $defaultdd["data"][0]["coldstorage_EntryTemp"] ?>">
                                </div>
                            </div>
                            
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_HeatGain')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="HeatGain" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["HeatGain"]) ? $projedetay["data"][0]["HeatGain"] : $defaultdd["data"][0]["coldstorage_HeatGain"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_LightingLoad')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="LightingLoad" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["LightingLoad"]) ? $projedetay["data"][0]["LightingLoad"] : $defaultdd["data"][0]["coldstorage_LightingLoad"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_EngineLoad')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="EngineLoad"  class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["EngineLoad"]) ? $projedetay["data"][0]["EngineLoad"] : $defaultdd["data"][0]["coldstorage_EngineLoad"] ?>">
                                </div>
                            </div>
                            
                            
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_OtherLoads')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="OtherLoads"  class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["OtherLoads"]) ? $projedetay["data"][0]["OtherLoads"] : $defaultdd["data"][0]["coldstorage_OtherLoads"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_NumberOfPeople')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="NumberOfPeople"  class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["NumberOfPeople"]) ? $projedetay["data"][0]["NumberOfPeople"] : $defaultdd["data"][0]["coldstorage_NumberOfPeople"] ?>">
                                   </div>
                               </div>
                               
                               <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_StorageVolume')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="StorageVolume"  class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["StorageVolume"]) ? $projedetay["data"][0]["StorageVolume"] : $defaultdd["data"][0]["coldstorage_StorageVolume"] ?>">
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_SystemSafetyHike')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="SystemSafetyHike"  class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["SystemSafetyHike"]) ? $projedetay["data"][0]["SystemSafetyHike"] : $defaultdd["data"][0]["coldstorage_SystemSafetyHike"] ?>">
                                </div>
                            </div>
                               
                               
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_BreathingHeat')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="BreathingHeat"  class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["BreathingHeat"]) ? $projedetay["data"][0]["BreathingHeat"] : $defaultdd["data"][0]["coldstorage_BreathingHeat"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_BreathingHeatExample')?> :</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="BreathingHeatExample"  class="form-control form-control-round"
                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["BreathingHeatExample"]) ? $projedetay["data"][0]["BreathingHeatExample"] : $defaultdd["data"][0]["coldstorage_BreathingHeatExample"] ?>">
                                    </div>
                               </div>

                               <div class="form-group row">    
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_OutdoorEnthalpy')?> :</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="OutdoorEnthalpy"  class="form-control form-control-round"
                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["OutdoorEnthalpy"]) ? $projedetay["data"][0]["OutdoorEnthalpy"] : $defaultdd["data"][0]["coldstorage_OutdoorEnthalpy"] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">    
                                        <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_IndoorEnthalpy')?> :</label>
                                        <div class="col-sm-4">
                                            <input type="number" name="IndoorEnthalpy"  class="form-control form-control-round"
                                                                                    placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["IndoorEnthalpy"]) ? $projedetay["data"][0]["IndoorEnthalpy"] : $defaultdd["data"][0]["coldstorage_IndoorEnthalpy"] ?>">
                                        </div>
                                </div>
                                <div class="form-group row">    
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_AirDensity')?> :</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="AirDensity"  class="form-control form-control-round"
                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["AirDensity"]) ? $projedetay["data"][0]["AirDensity"] : $defaultdd["data"][0]["coldstorage_AirDensity"] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">    
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_ShiftLength')?> :</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="ShiftLength"  class="form-control form-control-round"
                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["ShiftLength"]) ? $projedetay["data"][0]["ShiftLength"] : $defaultdd["data"][0]["coldstorage_ShiftLength"] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">    
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_SystemUptime')?> :</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="SystemUptime"  class="form-control form-control-round"
                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["SystemUptime"]) ? $projedetay["data"][0]["SystemUptime"] : $defaultdd["data"][0]["coldstorage_SystemUptime"] ?>">
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

                        @if (session()->has('coldstoragehesap'))
                              <div class="col-md-12">
                                   @if (isset(session('coldstoragehesap')[0]["data"]["id"]))
                                   <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('coldstoragehesap')[0]["data"]["id"] !!} </b> <br> <b> Project: {!! session('coldstoragehesap')[0]["data"]["adi"] !!} </b>  </h4>
                                   <br>
                                   <br>
                                   <form action="{{route('admin.coldstoragehesapkaydet',["update"=>1,"id"=>isset(session('coldstoragehesap')[0]["data"]["id"]) ? session('coldstoragehesap')[0]["data"]["id"] : null ] )}}" method="post">
                                   @else
                                   <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                   <br>
                                   <br>
                                   <form action="{{route('admin.coldstoragehesapkaydet')}}" method="post">
                                  
                                   @endif
                                 
                                   
                                       @csrf
                                       <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["adi"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["aciklama"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.ColdStorage_ProductType')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["ProductType"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.ColdStorage_EnclosureType')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["EnclosureType"] !!}</p>
                                                       </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_ProductQuantity')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["ProductQuantity"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_EntryTemp')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["EntryTemp"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_HeatGain')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["HeatGain"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_LightingLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["LightingLoad"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_EngineLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["EngineLoad"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_OtherLoads')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["OtherLoads"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_NumberOfPeople')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["NumberOfPeople"] !!}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_StorageVolume')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["StorageVolume"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_SystemSafetyHike')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["SystemSafetyHike"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_BreathingHeat')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["BreathingHeat"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_BreathingHeatExample')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["BreathingHeatExample"] !!}</p> <br>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_ProductTemperature')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["ProductTemperature"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_SystemSafetyOverhead')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["SystemSafetyOverhead"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_SystemLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["SystemLoad"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_SystemLoadDaily')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["SystemLoadDaily"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_OutdoorEnthalpy')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["OutdoorEnthalpy"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_IndoorEnthalpy')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["IndoorEnthalpy"] !!}</p>
                                                    </div>
                                                </div>
                                                <ul class="basic-list list-icons">

                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.ColdStorage_AirDensity')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('coldstoragehesap')[0]["data"]["AirDensity"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.ColdStorage_ShiftLength')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('coldstoragehesap')[0]["data"]["ShiftLength"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.ColdStorage_SystemUptime')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('coldstoragehesap')[0]["data"]["SystemUptime"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.ColdStorage_StorageTemperature')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('coldstoragehesap')[0]["data"]["StorageTemperature"] !!}</p>
                                                        </div>
                                                    </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_FreezingPoint')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["FreezingPoint"] !!}</p> <br>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_StorageTime')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["StorageTime"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_ProcessingTime')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["ProcessingTime"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_AirExchangeNumber')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["AirExchangeNumber"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_UnitHumanLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["UnitHumanLoad"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_PeopleLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["PeopleLoad"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_TotalLightingLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["TotalLightingLoad"] !!}</p> <br>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_ElectricalLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["ElectricalLoad"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_TotalOtherLoads')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["TotalOtherLoads"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_VentilationLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["VentilationLoad"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_TotalHeatGain')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["TotalHeatGain"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_BeforeFreezingLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["BeforeFreezingLoad"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_FreezingLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["FreezingLoad"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_AfterFreezingLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["AfterFreezingLoad"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.ColdStorage_BreathingHeatLoad')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('coldstoragehesap')[0]["data"]["BreathingHeatLoad"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-6">
                                                  </label>
                                                  <div class="col-sm-6">
                                                      @if (isset(session('coldstoragehesap')[0]["data"]["edit"]) && session('coldstoragehesap')[0]["data"]["edit"]==1)
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
    </script>
@endsection     