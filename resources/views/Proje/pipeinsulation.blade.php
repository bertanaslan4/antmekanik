@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Boruyalitim')?></h5>
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
                         <form action="{{route('admin.pipeinsulationhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["pipeinsulation_id"])) ? null : $projedetay["data"]["pipeinsulation_id"] ])}}" method="post">
                            
                              @csrf
                              <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                                   <div class="col-sm-4">
                                       <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]["adi"]) ? $projedetay["data"][0]["adi"] :"";?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                                   <div class="col-sm-4">
                                       <textarea rows="5" cols="5" class="form-control" placeholder="Lütfen bir açıklama yazınız" id="aciklama" name="aciklama"><?php echo isset($projedetay["data"][0]["aciklama"]) ? $projedetay["data"][0]["aciklama"] :"";?></textarea>
                                      
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_ServicePipeType')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="ServicePipeType" id="ServicePipeType" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][15]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["ServicePipeType"]) && $projedetay["data"][0]["ServicePipeType"]==$row["PipeType"])
                                                <option value="{{$row["PipeType"]}}" selected>{{$row["PipeType"]}}</option>
                                                @else
                                            @if ($defaultdd["data"][0]["pipeinsulation_ServicePipeType"]==$row["PipeType"])
                                                <option value="{{$row['PipeType']}}" selected>{{$row['PipeType']}}</option>
                                            @else
                                                <option value="{{$row['PipeType']}}">{{$row['PipeType']}}</option>  
                                            @endif
                                        
                                            @endif

                                             @endforeach
                                         </select>
                                        
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_PipeDiameter')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="PipeDiameter" id="PipeDiameter" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][18]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["PipeDiameter"]) && $projedetay["data"][0]["PipeDiameter"]==$row['OuterD'])
                                                <option value="{{$row['OuterD']}}" selected>{{$row['OuterD']}}</option>
                                                @else
                                            @if ($defaultdd["data"][0]["pipeinsulation_PipeDiameter"]==$row["OuterD"])
                                                <option value="{{$row['OuterD']}}" selected>{{$row['OuterD']}}</option>
                                            @else
                                                <option value="{{$row['OuterD']}}">{{$row['OuterD']}}</option>  
                                            @endif
                                        
                                            @endif 

                                             @endforeach
                                         </select>
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_WaterFlow')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="WaterFlow"  class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["WaterFlow"]) ? $projedetay["data"][0]["WaterFlow"] : $defaultdd["data"][0]["pipeinsulation_WaterFlow"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SheathPipeType')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="SheathPipeType" id="SheathPipeType" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][16]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["SheathPipeType"]) && $projedetay["data"][0]["SheathPipeType"]==$row["Standart"])
                                                    <option value="{{$row["Standart"]}}" selected>{{$row["Standart"]}}--{{$row["Description"]}}</option>
                                                @else
                                            @if ($defaultdd["data"][0]["pipeinsulation_SheathPipeType"]==$row["Standart"])
                                                <option value="{{$row["Standart"]}}" selected>{{$row["Standart"]}}--{{$row["Description"]}}</option>
                                            @else
                                                <option value="{{$row["Standart"]}}">{{$row["Standart"]}}--{{$row["Description"]}}</option>  
                                            @endif
                                        
                                            @endif

                                             @endforeach
                                         </select>
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SoilType')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="SoilType" id="SoilType" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][17]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["SoilType"]) && $projedetay["data"][0]["SoilType"]==$row["Type"])
                                                <option value="{{$row["Type"]}}" selected>{{$row["Type"]}}</option>
                                                @else
                                            @if ($defaultdd["data"][0]["pipeinsulation_SoilType"]==$row["Type"])
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
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SoilTemperature')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="SoilTemperature"  class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["SoilTemperature"]) ? $projedetay["data"][0]["SoilTemperature"] : $defaultdd["data"][0]["pipeinsulation_SoilTemperature"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_LineLength')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="LineLength"  class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["LineLength"]) ? $projedetay["data"][0]["LineLength"] : $defaultdd["data"][0]["pipeinsulation_LineLength"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_FluidAvgTemperature')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="FluidAvgTemperature" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["FluidAvgTemperature"]) ? $projedetay["data"][0]["FluidAvgTemperature"] : $defaultdd["data"][0]["pipeinsulation_FluidAvgTemperature"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SoilFillingHeight')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="SoilFillingHeight" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["SoilFillingHeight"]) ? $projedetay["data"][0]["SoilFillingHeight"] : $defaultdd["data"][0]["pipeinsulation_SoilFillingHeight"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_WaterMass')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="WaterMass" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["WaterMass"]) ? $projedetay["data"][0]["WaterMass"] : $defaultdd["data"][0]["pipeinsulation_WaterMass"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SpecificHeatOfWater')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="SpecificHeatOfWater" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["SpecificHeatOfWater"]) ? $projedetay["data"][0]["SpecificHeatOfWater"] : $defaultdd["data"][0]["pipeinsulation_SpecificHeatOfWater"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_MaterialLamda')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="MaterialLamda" class="form-control form-control-round"
                                                                            placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["MaterialLamda"]) ? $projedetay["data"][0]["MaterialLamda"] : $defaultdd["data"][0]["pipeinsulation_MaterialLamda"] ?>">
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

                        @if (session()->has('pipeinsulationhesap'))
                              <div class="col-md-12">
                                   @if (isset(session('pipeinsulationhesap')[0]["data"]["id"]))
                                   <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('pipeinsulationhesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('pipeinsulationhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                   <br>
                                   <br>
                                   <form action="{{route('admin.pipeinsulationhesapkaydet',["update"=>1,"id"=>isset(session('pipeinsulationhesap')[0]["data"]["id"]) ? session('pipeinsulationhesap')[0]["data"]["id"] : null ] )}}" method="post">
                                   @else
                                   <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                   <br>
                                   <br>
                                   <form action="{{route('admin.pipeinsulationhesapkaydet')}}" method="post">
                                  
                                   @endif
                                 
                                   
                                       @csrf
                                       <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                             <div class="form-group row">
                                                  <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                                  <div class="col-sm-6 col-form-label">
                                                      <p>{!! session('pipeinsulationhesap')[0]["data"]["adi"] !!}</p>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                                  <div class="col-sm-6 col-form-label">
                                                      <p>{!! session('pipeinsulationhesap')[0]["data"]["aciklama"] !!}</p>
                                                     </div>
                                              </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Pipeinsulation_ServicePipeType')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["ServicePipeType"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Pipeinsulation_PipeDiameter')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["PipeDiameter"] !!}</p>
                                                       </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_SheathPipeType')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["SheathPipeType"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_SoilType')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["SoilType"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_SoilTemperature')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["SoilTemperature"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_FluidAvgTemperature')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["FluidAvgTemperature"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_SoilFillingHeight')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["SoilFillingHeight"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_LineLength')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["LineLength"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_WaterFlow')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["WaterFlow"] !!}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_WaterMass')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["WaterMass"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_SpecificHeatOfWater')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["SpecificHeatOfWater"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_MaterialLamda')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["MaterialLamda"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_NominalOuterD')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["NominalOuterD"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <ul class="basic-list list-icons">
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pipeinsulation_NominalInnerD')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('pipeinsulationhesap')[0]["data"]["NominalInnerD"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pipeinsulation_InsulationThickness')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('pipeinsulationhesap')[0]["data"]["InsulationThickness"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pipeinsulation_InsulationInnerD')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('pipeinsulationhesap')[0]["data"]["InsulationInnerD"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pipeinsulation_ServicePipeLamda')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('pipeinsulationhesap')[0]["data"]["ServicePipeLamda"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pipeinsulation_SheathPipeLamda')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('pipeinsulationhesap')[0]["data"]["SheathPipeLamda"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pipeinsulation_SoilLamda')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('pipeinsulationhesap')[0]["data"]["SoilLamda"] !!}</p>
                                                        </div>
                                                    </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_SurfaceTensionFillerHeight')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["SurfaceTensionFillerHeight"] !!}</p> <br>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_ServicePipeResistance')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('pipeinsulationhesap')[0]["data"]["ServicePipeResistance"],1,3)   !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_InsulationMaterialResistance')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('pipeinsulationhesap')[0]["data"]["InsulationMaterialResistance"],1,2)  !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_SheathPipeResistance')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('pipeinsulationhesap')[0]["data"]["SheathPipeResistance"],1,2)  !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_SoilResistance')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('pipeinsulationhesap')[0]["data"]["SoilResistance"],1,2 ) !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_CoefficientU')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('pipeinsulationhesap')[0]["data"]["CoefficientU"],1,2)  !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_TotalHeatLoss')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('pipeinsulationhesap')[0]["data"]["TotalHeatLoss"],1,2)  !!}</p> <br>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_EndOfLineTemp')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipeinsulationhesap')[0]["data"]["EndOfLineTemp"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipeinsulation_TempDiff')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('pipeinsulationhesap')[0]["data"]["TempDiff"],1,2)  !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-6">
                                                  </label>
                                                  <div class="col-sm-6">
                                                      @if (isset(session('pipeinsulationhesap')[0]["data"]["edit"]) && session('pipeinsulationhesap')[0]["data"]["edit"]==1)
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