@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Otopark')?>  </h5>
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
                         <form action="{{route('admin.parkingventilationhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["parkingventilation_id"])) ? null : $projedetay["data"]["parkingventilation_id"] ])}}" method="post">
                            
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
                                       <textarea rows="5" cols="5" class="form-control" placeholder="Lütfen bir açıklama yazınız" id="aciklama" name="aciklama"><?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["aciklama"] : "";?></textarea>
                                      
                                   </div>
                               </div>

                              <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_CalculationType')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="CalculationType" id="CalculationType" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][19]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["CalculationType"]) && $projedetay["data"][0]["CalculationType"]==$row["Code"])
                                                <option value="{{$row["Code"]}}" selected>{{$row["Type"]}}</option>
                                            @else
                                            @if ($defaultdd["data"][0]["parkingventilation_CalculationType"]==$row["Code"])
                                                <option value="{{$row['Code']}}" selected>{{$row["Type"]}}</option>
                                            @else
                                                <option value="{{$row['Code']}}">{{$row["Type"]}}</option>  
                                            @endif
                                        
                                            @endif

                                             @endforeach
                                         </select>
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingHeight')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="ParkingHeight" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["ParkingHeight"]) ? $projedetay["data"][0]["ParkingHeight"] : $defaultdd["data"][0]["parkingventilation_ParkingHeight"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingType')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="ParkingType" id="ParkingType" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][20]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["ParkingType"]) && $projedetay["data"][0]["ParkingType"]==$row["Type"])
                                                <option value="{{$row["Type"]}}" selected>{{$row["Type"]}}</option>
                                            @else
                                            @if ($defaultdd["data"][0]["parkingventilation_ParkingType"]==$row["Type"])
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
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_NumberOfVehicles')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="NumberOfVehicles" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["NumberOfVehicles"]) ? $projedetay["data"][0]["NumberOfVehicles"] : $defaultdd["data"][0]["parkingventilation_NumberOfVehicles"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_FlowCalcMethod')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="FlowCalcMethod" id="FlowCalcMethod" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][21]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["FlowCalcMethod"]) && $projedetay["data"][0]["FlowCalcMethod"]==$row['Code'])
                                                <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                @else
                                            @if ($defaultdd["data"][0]["parkingventilation_FlowCalcMethod"]==$row['Code'])
                                                <option value="{{$row['Code']}}" selected>{{$row["Description"]}}</option>
                                            @else
                                                <option value="{{$row['Code']}}">{{$row["Description"]}}</option>  
                                            @endif
                                        
                                            @endif  

                                             @endforeach
                                         </select>
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_DrivingRoadLength')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="DrivingRoadLength" class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["DrivingRoadLength"]) ? $projedetay["data"][0]["DrivingRoadLength"] : $defaultdd["data"][0]["parkingventilation_DrivingRoadLength"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingArea')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="ParkingArea" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["ParkingArea"]) ? $projedetay["data"][0]["ParkingArea"] : $defaultdd["data"][0]["parkingventilation_ParkingArea"] ?>">
                                   </div>
                               </div>




                               <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_WasteGasCO')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="WasteGasCO" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["WasteGasCO"]) ? $projedetay["data"][0]["WasteGasCO"] : $defaultdd["data"][0]["parkingventilation_WasteGasCO"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_OutdoorCO')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="OutdoorCO" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["OutdoorCO"]) ? $projedetay["data"][0]["OutdoorCO"] : $defaultdd["data"][0]["parkingventilation_OutdoorCO"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_VehicleExitFrequency')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="VehicleExitFrequency" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["VehicleExitFrequency"]) ? $projedetay["data"][0]["VehicleExitFrequency"] : $defaultdd["data"][0]["parkingventilation_VehicleExitFrequency"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingSpeed')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="ParkingSpeed" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["ParkingSpeed"]) ? $projedetay["data"][0]["ParkingSpeed"] : $defaultdd["data"][0]["parkingventilation_ParkingSpeed"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_DetectorDensity')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="DetectorDensity" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["DetectorDensity"]) ? $projedetay["data"][0]["DetectorDensity"] : $defaultdd["data"][0]["parkingventilation_DetectorDensity"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingCulvertBelow100')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="ParkingCulvertBelow100" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["ParkingCulvertBelow"]) ? $projedetay["data"][0]["ParkingCulvertBelow"] : $defaultdd["data"][0]["parkingventilation_ParkingCulvertBelow"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingCulvertAbove100')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="ParkingCulvertAbove100" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["ParkingCulvertAbove100"]) ? $projedetay["data"][0]["ParkingCulvertAbove100"] : $defaultdd["data"][0]["parkingventilation_ParkingCulvertAbove"];?>">
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

                     @if (session()->has('parkingventilationhesap'))
                         <div class="col-md-12">
                              @if (isset(session('parkingventilationhesap')[0]["data"]["id"]))
                                <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('parkingventilationhesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('parkingventilationhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                <br>
                                <br>
                                <form action="{{route('admin.parkingventilationhesapkaydet',["update"=>1,"id"=>isset(session('parkingventilationhesap')[0]["data"]["id"]) ? session('parkingventilationhesap')[0]["data"]["id"] : null ] )}}" method="post">
                                @else
                                <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                <br>
                                <br>
                                <form action="{{route('admin.parkingventilationhesapkaydet')}}" method="post">
                               
                                @endif
                              
                                
                                    @csrf
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                             <div class="form-group row">
                                                  <label class="col-sm-6"><b><?=__('staticmessage.duzenlenenprojedetaylari')?>:</b></label>
                                                  <div class="col-sm-6 col-form-label">
                                                      <p>{!! session('parkingventilationhesap')[0]["data"]["adi"] !!}</p>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-6"><b><?=__('staticmessage.duzenlenenprojedetaylari')?>:</b></label>
                                                  <div class="col-sm-6 col-form-label">
                                                      <p>{!! session('parkingventilationhesap')[0]["data"]["aciklama"] !!}</p>
                                                     </div>
                                              </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Parkingventilation_CalculationType')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["CalculationType"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Parkingventilation_ParkingType')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["ParkingType"] !!}</p>
                                                       </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Parkingventilation_FlowCalcMethod')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["FlowCalcMethod"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Parkingventilation_ParkingArea')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["ParkingArea"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Parkingventilation_ParkingHeight')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["ParkingHeight"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Parkingventilation_NumberOfVehicles')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["NumberOfVehicles"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Parkingventilation_DrivingRoadLength')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["DrivingRoadLength"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Parkingventilation_WasteGasCO')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["WasteGasCO"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Parkingventilation_OutdoorCO')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["OutdoorCO"] !!}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Parkingventilation_VehicleExitFrequency')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["VehicleExitFrequency"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <ul class="basic-list list-icons">

                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Parkingventilation_ParkingSpeed')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('parkingventilationhesap')[0]["data"]["ParkingSpeed"] !!}</p> <br>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Parkingventilation_DetectorDensity')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('parkingventilationhesap')[0]["data"]["DetectorDensity"] !!}</p> <br>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Parkingventilation_FreshAir')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('parkingventilationhesap')[0]["data"]["FreshAir"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Parkingventilation_NumberOfExchanges')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('parkingventilationhesap')[0]["data"]["NumberOfExchanges"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Parkingventilation_TotalCulvertArea')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('parkingventilationhesap')[0]["data"]["TotalCukvertArea"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Parkingventilation_MotionlessVo')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('parkingventilationhesap')[0]["data"]["MotionlessVo"] !!}</p>
                                                        </div>
                                                    </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Parkingventilation_ActiveVo')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["ActiveVo"] !!}</p> <br>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Parkingventilation_AirFlowPerVehicle')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('parkingventilationhesap')[0]["data"]["AirFlowPerVehicle"],1,2)   !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Parkingventilation_MinCulvertArea')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('parkingventilationhesap')[0]["data"]["MinCulvertArea"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-6">
                                                  </label>
                                                  <div class="col-sm-6">
                                                      @if (isset(session('parkingventilationhesap')[0]["data"]["edit"]) && session('parkingventilationhesap')[0]["data"]["edit"]==1)
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