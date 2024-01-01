@extends('layout.default')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-home bg-c-blue"></i>
                <div class="d-inline">
                    <h5><?=__('staticmessage.Ayarlar')?></h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><?=__('staticmessage.Ayarlar')?></a> </li>
                </ul>
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
                            <div class="tab-pane" id="defaultayarlar" role="tabpanel">

                              <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
                                  <li class="nav-item">
                                  <a class="nav-link active" data-toggle="tab" href="#Boiler" role="tab"><?=__('staticmessage.Boiler')?></a>
                                  <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#Isıdegistirici" role="tab"><?=__('staticmessage.Isıdegistirici')?></a>
                                  <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#Brülör" role="tab"><?=__('staticmessage.Brülör')?></a>
                                  <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#KazanHesabiFuelAmount" role="tab"><?=__('staticmessage.KazanHesabiFuelAmount')?></a>
                                  <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#KazanHesabıFuelAmountYearly" role="tab"><?=__('staticmessage.KazanHesabıFuelAmountYearly')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#Acikgenlesme" role="tab"><?=__('staticmessage.Acikgenlesme')?></a>
                                  <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Kapaligenlesme" role="tab"><?=__('staticmessage.Kapaligenlesme')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Dolasimpompasi" role="tab"><?=__('staticmessage.Dolasimpompasi')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Boyler" role="tab"><?=__('staticmessage.Boyler')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Yagmursuyu" role="tab"><?=__('staticmessage.Yagmursuyu')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Hidrofor" role="tab"><?=__('staticmessage.Hidrofor')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Kollektor" role="tab"><?=__('staticmessage.Kollektor')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Gunes" role="tab"><?=__('staticmessage.Gunes')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Davlumbaz" role="tab"><?=__('staticmessage.Davlumbaz')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Havuz" role="tab"><?=__('staticmessage.Havuz')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Sogukdepo" role="tab"><?=__('staticmessage.Sogukdepo')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Boruyalitim" role="tab"><?=__('staticmessage.Boruyalitim')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Otopark" role="tab"><?=__('staticmessage.Otopark')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Siginak" role="tab"><?=__('staticmessage.Siginak')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#Borubasinc" role="tab"><?=__('staticmessage.Borubasinc')?></a>
                                      <div class="slide"></div>
                                  </li>
                                  
                              </ul>
                              <div class="tab-content tabs-left-content card-block">
                                  <div class="tab-pane active" id="Boiler" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelType')?> :</label>
                                                  <div class="col-sm-8">
                                                      
                                                      <select class="form-control" size="1" id="fueltype" onchange="Update(this.value,'boiler_FuelType')"  name="fueltype">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($res_data["data"][0]["Data"] as $row)

                                                                @if ($defaultdd["data"][0]["boiler_FuelType"] !=null && $defaultdd["data"][0]["boiler_FuelType"] ==$row["Code"])

                                                                    <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                                @else
                                                                    <option value="{{$row["Code"]}}">{{$row["Description"]}}</option>
                                                                    
                                                                @endif 

                                                         
                                                                

                                                          
                                                            
                                                               
                                                          @endforeach
                                                      </select>
                                                      
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_DistributionPipe')?>:</label>
                                                  <div class="col-sm-8">
                                                      <select class="form-control" size="1" id="distributionpipe" onchange="Update(this.value,'boiler_DistributionPipe')" name="distributionpipe">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($res_data["data"][1]["Data"] as $row)
                                                          @if ($defaultdd["data"][0]["boiler_DistributionPipe"] !=null && $defaultdd["data"][0]["boiler_DistributionPipe"] ==$row["Code"])

                                                                    <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Code"]}}">{{$row["Description"]}}</option>
                                                                    
                                                            @endif
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Yedek')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control form-control-round" onchange="Update(this.value,'boiler_yedek')"  type="number" id="boiler_yedek" name="boiler_yedek" value="<?php echo ($defaultdd["data"][0]["boiler_yedek"]!=null) ? $defaultdd["data"][0]["boiler_yedek"] : 0 ?>">
                                                 </div>
                                            </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                                  <div class="col-sm-8">
                                                      <input class="form-control form-control-round" onchange="Update(this.value,'boiler_Piece')"  type="number" id="piece" name="piece" value="<?php echo ($defaultdd["data"][0]["boiler_Piece"]==null) ? null : $defaultdd["data"][0]["boiler_Piece"] ?>">
                                                   </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="tab-pane" id="Isıdegistirici" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.HeatNeed')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input class="form-control form-control-round" type="number" id="HeatNeed" name="HeatNeed" onchange="Update(this.value,'heatexchanger_HeatNeed')" value="<?php echo ($defaultdd["data"][0]["heatexchanger_HeatNeed"]==null) ? null : $defaultdd["data"][0]["heatexchanger_HeatNeed"] ?>">
                                                  </div>        
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_totalpass')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="TotalPass" onchange="Update(this.value,'heatexchanger_TotalPass')"  value="<?php echo ($defaultdd["data"][0]["heatexchanger_TotalPass"]==null) ? null : $defaultdd["data"][0]["heatexchanger_TotalPass"] ?>" id="TotalPass" class="form-control form-control-round" placeholder="Lütfen paremetre yazınız">
                                                  </div>        
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_heaterfluidavg')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" onchange="Update(this.value,'heatexchanger_HeaterFluidAvg')"  value="<?php echo ($defaultdd["data"][0]["heatexchanger_HeaterFluidAvg"]==null) ? null : $defaultdd["data"][0]["heatexchanger_HeaterFluidAvg"] ?>" name="HeaterFluidAvg" class="form-control form-control-round"
                                                                 placeholder="Lütfen paremetre yazınız">
                                                  </div>        
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_pollutionfactor')?>:</label>
                                                  <div class="col-md-8">
                                                      <input type="number" name="PollutionFactor" onchange="Update(this.value,'heatexchanger_PollutionFactor')"  value="<?php echo ($defaultdd["data"][0]["heatexchanger_PollutionFactor"]==null) ? null : $defaultdd["data"][0]["heatexchanger_PollutionFactor"] ?>" id="HeatNeed" class="form-control form-control-round" placeholder="Lütfen paremetre yazınız">
              
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="Piece" onchange="Update(this.value,'heatexchanger_Piece')" value="<?php echo ($defaultdd["data"][0]["heatexchanger_Piece"]==null) ? null : $defaultdd["data"][0]["heatexchanger_Piece"] ?>" class="form-control form-control-round"
                                                                 placeholder="Lütfen paremetre yazınız">
                                                  </div>        
                                              </div>
                                              <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Yedek')?> :</label>
                                                <div class="col-sm-8">
                                                    <input class="form-control form-control-round" onchange="Update(this.value,'heatexchanger_yedek')"  type="number" id="heatexchanger_yedek" name="heatexchanger_yedek" value="<?php echo ($defaultdd["data"][0]["heatexchanger_yedek"]!=null) ? $defaultdd["data"][0]["heatexchanger_yedek"] : 0 ?>">
                                                 </div>
                                            </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_heatedfluidavg')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" onchange="Update(this.value,'heatexchanger_HeatedFluidAvg')" value="<?php echo ($defaultdd["data"][0]["heatexchanger_HeatedFluidAvg"]==null) ? null : $defaultdd["data"][0]["heatexchanger_HeatedFluidAvg"] ?>"name="HeatedFluidAvg" class="form-control form-control-round"
                                                                 placeholder="Lütfen paremetre yazınız">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="tab-pane" id="Brülör" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                             
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.LiquitFuelType')?>:</label>
                                                  <div class="col-sm-8">
                                                      <select name="LiquitFuelType" id="LiquitFuelType" onchange="Update(this.value,'burner_LiquitFuelType')" class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($res_data["data"][3]["Data"] as $row)
                                                             @if ($defaultdd["data"][0]["burner_LiquitFuelType"] !=null && $defaultdd["data"][0]["burner_LiquitFuelType"] ==$row["Name"])

                                                                <option value="{{$row["Name"]}}" selected>{{$row["Name"]}}</option>
                                                            @else
                                                                <option value="{{$row["Name"]}}">{{$row["Name"]}}</option>
                                                                    
                                                            @endif
                                                           @endforeach   
                                                              
                                                      </select>
                  
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.burner_efficiency')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="BurnerEfficiency" onchange="Update(this.value,'burner_BurnerEfficiency')"  class="form-control form-control-round"
                                                      placeholder="Zorunlu alan değildir" value="<?php echo ($defaultdd["data"][0]["burner_BurnerEfficiency"]==null) ? null : $defaultdd["data"][0]["burner_BurnerEfficiency"] ?>">
                                                      
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="tab-pane" id="KazanHesabiFuelAmount" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_BoilerEffiency')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="BoilerEfficiencyKazan"  class="form-control form-control-round"
                                                      placeholder="Boiler Efficiency" onchange="Update(this.value,'fuelamount_BoilerEfficiency')" value="<?php echo ($defaultdd["data"][0]["fuelamount_BoilerEfficiency"]==null) ? null : $defaultdd["data"][0]["fuelamount_BoilerEfficiency"] ?>">                            </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelType')?> :</label>
                                                  <div class="col-sm-8">
                                                      <select name="FuelTypeKazan" id="FuelTypeKazan" onchange="Update(this.value,'fuelamount_FuelType')" class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($res_data["data"][0]["Data"] as $row)

                                                          @if ($defaultdd["data"][0]["fuelamount_FuelType"] !=null && $defaultdd["data"][0]["fuelamount_FuelType"] ==$row["Code"])

                                                                    <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                            @else
                                                                <option value="{{$row["Code"]}}">{{$row["Description"]}}</option>
                                                                    
                                                            @endif
                                                            
                                                          
                                                          
                                                              
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.LiquitFuelType')?>:</label>
                                                  <div class="col-sm-8">
                                                      <select name="LiquitFuelTypeKazan" id="LiquitFuelTypeKazan" onchange="Update(this.value,'fuelamount_LiquitFuelType')"  class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($res_data["data"][3]["Data"] as $row)

                                                          @if ($defaultdd["data"][0]["fuelamount_LiquitFuelType"] !=null && $defaultdd["data"][0]["fuelamount_LiquitFuelType"] ==$row["Name"])

                                                                    <option value="{{$row["Name"]}}" selected>{{$row["Name"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Name"]}}">{{$row["Name"]}}</option>
                                                                    
                                                            @endif                                                              
                                                          @endforeach
                                                      </select>
                                                    </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_AvgFuelTemperature')?> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" onchange="Update(this.value,'fuelAmount_AvgFuelTemperature')"  name="fuelAmount_AvgFuelTemperature" class="form-control form-control-round"
                                                    placeholder="Lütfen paremetre yazınız" value="<?php echo ($defaultdd["data"][0]["fuelAmount_AvgFuelTemperature"]==null) ? null : $defaultdd["data"][0]["fuelAmount_AvgFuelTemperature"] ?>">
                                                </div>
                                            </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_FuelTemperature')?> :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" onchange="Update(this.value,'fuelamount_FuelTemperature')"  name="fuelamount_FuelTemperature" class="form-control form-control-round"
                                                      placeholder="Lütfen paremetre yazınız" value="<?php echo ($defaultdd["data"][0]["fuelamount_FuelTemperature"]==null) ? null : $defaultdd["data"][0]["fuelamount_FuelTemperature"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_DailyWorkingTime')?> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" onchange="Update(this.value,'fuelamount_DailyWorkingTime')"  name="piecekazan" class="form-control form-control-round"
                                                    placeholder="Lütfen paremetre yazınız" value="<?php echo ($defaultdd["data"][0]["fuelamount_DailyWorkingTime"]==null) ? null : $defaultdd["data"][0]["fuelamount_DailyWorkingTime"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_YearlyWorkingTime')?> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" onchange="Update(this.value,'fuelamount_YearlyWorkingTime')"  name="fuelamount_YearlyWorkingTime" class="form-control form-control-round"
                                                    placeholder="Lütfen paremetre yazınız" value="<?php echo ($defaultdd["data"][0]["fuelamount_YearlyWorkingTime"]==null) ? null : $defaultdd["data"][0]["fuelamount_YearlyWorkingTime"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_StoredDays')?> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" onchange="Update(this.value,'fuelamount_StoredDays')"  name="fuelamount_StoredDays" class="form-control form-control-round"
                                                    placeholder="Lütfen paremetre yazınız" value="<?php echo ($defaultdd["data"][0]["fuelamount_StoredDays"]==null) ? null : $defaultdd["data"][0]["fuelamount_StoredDays"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_LiquidOccupancyRate')?> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" onchange="Update(this.value,'fuelamount_LiquidOccupancyRate')"  name="fuelamount_LiquidOccupancyRate" class="form-control form-control-round"
                                                    placeholder="Lütfen paremetre yazınız" value="<?php echo ($defaultdd["data"][0]["fuelamount_LiquidOccupancyRate"]==null) ? null : $defaultdd["data"][0]["fuelamount_LiquidOccupancyRate"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_SolidStackLoad')?> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" onchange="Update(this.value,'fuelamount_SolidStackLoad')"  name="fuelamount_SolidStackLoad" class="form-control form-control-round"
                                                    placeholder="Lütfen paremetre yazınız" value="<?php echo ($defaultdd["data"][0]["fuelamount_SolidStackLoad"]==null) ? null : $defaultdd["data"][0]["fuelamount_SolidStackLoad"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" onchange="Update(this.value,'fuelamount_Piece')"  name="piecekazan" class="form-control form-control-round"
                                                    placeholder="Lütfen Adet yazınız" value="<?php echo ($defaultdd["data"][0]["fuelamount_Piece"]==null) ? null : $defaultdd["data"][0]["fuelamount_Piece"] ?>">
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="tab-pane" id="KazanHesabıFuelAmountYearly" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelType')?>:</label>
                                                  <div class="col-sm-8">
                                                      <select name="FuelTypeKazan" id="FuelTypeKazan" onchange="Update(this.value,'fuelamountyearly_FuelType')" class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($res_data["data"][0]["Data"] as $row)

                                                          @if ($defaultdd["data"][0]["fuelamountyearly_FuelType"] !=null && $defaultdd["data"][0]["fuelamountyearly_FuelType"] ==$row["Code"])

                                                                    <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Code"]}}">{{$row["Description"]}}</option>
                                                                    
                                                            @endif
                      
                                                         

                                                          
                                                              
                                                              
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.LiquitFuelType')?>:</label>
                                                  <div class="col-sm-8">
                                                      <select name="LiquitFuelTypeKazan" id="LiquitFuelTypeKazan" onchange="Update(this.value,'fuelamountyearly_LiquitFuelType')" class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($res_data["data"][3]["Data"] as $row)
                                                          @if ($defaultdd["data"][0]["fuelamountyearly_LiquitFuelType"] !=null && $defaultdd["data"][0]["fuelamountyearly_LiquitFuelType"] ==$row["Name"])

                                                                    <option value="{{$row["Name"]}}" selected>{{$row["Name"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Name"]}}">{{$row["Name"]}}</option>
                                                                    
                                                            @endif
                                                              
                                                              
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="piecekazan" class="form-control form-control-round"
                                                      placeholder="Lütfen Adet yazınız" onchange="Update(this.value,'fuelamountyearly_Piece')" value="<?php echo ($defaultdd["data"][0]["fuelamountyearly_Piece"]==null) ? null : $defaultdd["data"][0]["fuelamountyearly_Piece"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.burner_efficiency')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" onchange="Update(this.value,'fuelamountyearly_BurnerEfficiency')"  value="<?php echo ($defaultdd["data"][0]["fuelamountyearly_BurnerEfficiency"]==null) ? null : $defaultdd["data"][0]["fuelamountyearly_BurnerEfficiency"] ?>" name="BurnerEfficiencyKazan"  class="form-control form-control-round"
                                                                                                     placeholder="Burner Efficiency">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" onchange="Update(this.value,'fuelamountyearly_BoilerCapacity')" value="<?php echo ($defaultdd["data"][0]["fuelamountyearly_BoilerCapacity"]==null) ? null : $defaultdd["data"][0]["fuelamountyearly_BoilerCapacity"] ?>" name="BoilerCapacityKazan" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen Adet yazınız">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmountYearly_YearlyHeatingEnergy')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" onchange="Update(this.value,'fuelamountyearly_YearlyHeatingEnergy')" value="<?php echo ($defaultdd["data"][0]["fuelamountyearly_YearlyHeatingEnergy"]==null) ? null : $defaultdd["data"][0]["fuelamountyearly_YearlyHeatingEnergy"] ?>" name="YearlyHeatingEnergy"  class="form-control form-control-round"
                                                                                                     placeholder="Yearly Heating Energy">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_BoilerEffiency')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" onchange="Update(this.value,'fuelamountyearly_BoilerEfficiency')"  value="<?php echo ($defaultdd["data"][0]["fuelamountyearly_BoilerEfficiency"]==null) ? null : $defaultdd["data"][0]["fuelamountyearly_BoilerEfficiency"] ?>" name="BoilerEfficiency"  class="form-control form-control-round"
                                                                                                     placeholder="Boiler Efficiency">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmountYearly_BuildingArea')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" onchange="Update(this.value,'fuelamountyearly_BuildingArea')"  value="<?php echo ($defaultdd["data"][0]["fuelamountyearly_BuildingArea"]==null) ? null : $defaultdd["data"][0]["fuelamountyearly_BuildingArea"] ?>"  name="BuildingArea"  class="form-control form-control-round"
                                                                                                     placeholder="Building Area">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Acikgenlesme" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                             
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.OpenExpansionTank_HeaterType')?> :</label>
                                                  <div class="col-sm-8">
                                                      <select name="HeaterType" onchange="Update(this.value,'openexpansion_HeaterType')"   id="HeaterType" class="form-control form-control-primary">
                                                          <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($headertype["data"] as $row)
                                                          @if ($defaultdd["data"][0]["openexpansion_HeaterType"] !=null && $defaultdd["data"][0]["openexpansion_HeaterType"] ==$row["name"])

                                                          <option value="{{$row["name"]}}" selected>{{$row["name"]}}</option>
                                                          @else
                                                          <option value="{{$row["name"]}}">{{$row["name"]}}</option>
                                                            
                                                        @endif
                                                           
                                                            @endforeach
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.OpenExpansionTank_WaterHeat')?>  :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="waterheat" onchange="Update(this.value,'openexpansion_WaterHeat')" value="<?php echo ($defaultdd["data"][0]["openexpansion_WaterHeat"]==null) ? null : $defaultdd["data"][0]["openexpansion_WaterHeat"] ?>" class="form-control form-control-round"
                                                                                                   placeholder="Lütfen değer yazınız">
                                                </div>
                                            </div>
                                              
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Kapaligenlesme" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?>  :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="BoilerCapacityKazan" onchange="Update(this.value,'closeexpansion_BoilerCapacity')" class="form-control form-control-round"
                                                      placeholder="Lütfen Adet yazınız" value="<?php echo ($defaultdd["data"][0]["closeexpansion_BoilerCapacity"]==null) ? null : $defaultdd["data"][0]["closeexpansion_BoilerCapacity"] ?>">                            </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_HeaterType')?> :</label>
                                                  <div class="col-sm-8">
                                                      <select name="HeaterType" onchange="Update(this.value,'closeexpansion_HeaterType')" id="HeaterType" class="form-control form-control-primary">
                                                          <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($headertype["data"] as $row)
                                                          @if ($defaultdd["data"][0]["closeexpansion_HeaterType"] !=null && $defaultdd["data"][0]["closeexpansion_HeaterType"] ==$row["name"])

                                                          <option value="{{$row["name"]}}" selected>{{$row["name"]}}</option>
                                                          @else
                                                          <option value="{{$row["name"]}}">{{$row["name"]}}</option>
                                                            
                                                        @endif
                                                           
                                                            @endforeach
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_WaterExpansion')?> :</label>
                                                  <div class="col-sm-8">
                                                    <input type="number" value="<?php echo ($defaultdd["data"][0]["closeexpansion_WaterHeat"]==null) ? null : $defaultdd["data"][0]["closeexpansion_WaterHeat"] ?>" onchange="Update(this.value,'closeexpansion_WaterHeat')" class="form-control form-control-round" name="waterexpansion" id="waterexpansion">
                                                                              </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_StaticHeight')?> :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" onchange="Update(this.value,'closeexpansion_StaticHeight')" value="<?php echo ($defaultdd["data"][0]["closeexpansion_StaticHeight"]==null) ? null : $defaultdd["data"][0]["closeexpansion_StaticHeight"] ?>" name="StaticHeight" class="form-control form-control-round"
                                                      placeholder="Lütfen değer yazınız">
                                                  </div>
                                              </div>
                                              
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_OpeningPressure')?> :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" onchange="Update(this.value,'closeexpansion_OpeningPressure')" value="<?php echo ($defaultdd["data"][0]["closeexpansion_OpeningPressure"]==null) ? null : $defaultdd["data"][0]["closeexpansion_OpeningPressure"] ?>" name="OpeningPressure" class="form-control form-control-round"
                                                      placeholder="Lütfen değer yazınız">
                                                 </div>
                                              </div>
                                              
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_ValveType')?> :</label>
                                                  <div class="col-sm-8">
                                                      <select name="ValveType" id="ValveType" onchange="Update(this.value,'closeexpansion_ValveType')" class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                        @foreach($valvetype["data"] as $row)
                                                        @if ($defaultdd["data"][0]["closeexpansion_ValveType"] !=null && $defaultdd["data"][0]["closeexpansion_ValveType"] ==$row["inch"])

                                                        <option value="{{$row["inch"]}}" selected>{{$row["inch"]}}</option>
                                                        @else
                                                        <option value="{{$row["inch"]}}">{{$row["inch"]}}</option>
                                                        @endif
                                                           
                                                                
                                                        @endforeach
                                                          
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="piece" onchange="Update(this.value,'closeexpansion_Piece')" value="<?php echo ($defaultdd["data"][0]["closeexpansion_Piece"]==null) ? null : $defaultdd["data"][0]["closeexpansion_Piece"] ?>" class="form-control form-control-round"
                                                      placeholder="Lütfen Adet yazınız">
                                                  </div>
                                              </div>
                                              
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Dolasimpompasi" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Circulationpump_TemperatureDiff')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="TemperatureDiff" onchange="Update(this.value,'circulationpump_TemperatureDiff')" value="<?php echo ($defaultdd["data"][0]["circulationpump_TemperatureDiff"]==null) ? null : $defaultdd["data"][0]["circulationpump_TemperatureDiff"] ?>" class="form-control form-control-round"
                                                                                                         placeholder="Lütfen değer yazınız">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Circulationpump_PressureDrop')?> :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="PressureDrop" onchange="Update(this.value,'circulationpump_PressureDrop')" value="<?php echo ($defaultdd["data"][0]["circulationpump_PressureDrop"]==null) ? null : $defaultdd["data"][0]["circulationpump_PressureDrop"] ?>" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="BoilerCapacityKazan" onchange="Update(this.value,'circulationpump_BoilerCapacity')" value="<?php echo ($defaultdd["data"][0]["circulationpump_BoilerCapacity"]==null) ? null : $defaultdd["data"][0]["circulationpump_BoilerCapacity"] ?>" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen Adet yazınız">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="piece" onchange="Update(this.value,'circulationpump_Piece')" value="<?php echo ($defaultdd["data"][0]["circulationpump_Piece"]==null) ? null : $defaultdd["data"][0]["circulationpump_Piece"] ?>" class="form-control form-control-round"
                                                      placeholder="Lütfen Adet yazınız">
                                                  </div>
                                              </div>
                                             
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Boyler" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_BuildType')?> :</label>
                                                  <div class="col-sm-8">
                                                      <select name="BuildType" onchange="Update(this.value,'boyler_BuildType')"  id="BuildType" class="form-control form-control-primary">
                                                         <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($res_data["data"][6]["Data"] as $row)
                                                            @if ($defaultdd["data"][0]["boyler_BuildType"] !=null && $defaultdd["data"][0]["boyler_BuildType"] ==$row["BuildType"])

                                                                    <option value="{{$row["BuildType"]}}" selected>{{$row["BuildType"]}}</option>
                                                            @else
                                                                    <option value="{{$row["BuildType"]}}">{{$row["BuildType"]}}</option>
                                                                    
                                                            @endif
                                                              
                                                              
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_Equipment')?>  :</label>
                                                  <div class="col-sm-8">
                                                      <select name="Equipment" onchange="Update(this.value,'boyler_Equipment_name')" id="Equipment" class="form-control form-control-primary">
                                                         <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($res_data["data"][5]["Data"] as $row)
                                                          @if ($defaultdd["data"][0]["boyler_Equipment_name"] !=null && $defaultdd["data"][0]["boyler_Equipment_name"] ==$row["Equipment"])
                                                          <option value="{{$row["Equipment"]}}" selected>{{$row["Equipment"]}}</option>
                                                          @else
                                                          <option value="{{$row["Equipment"]}}">{{$row["Equipment"]}}</option>
                                                           @endif
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_BoylerTempIn')?>  :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="BoylerTempIn" onchange="Update(this.value,'boyler_BoylerTempIn')" value="<?php echo ($defaultdd["data"][0]["boyler_BoylerTempIn"]==null) ? null : $defaultdd["data"][0]["boyler_BoylerTempIn"] ?>" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_BoylerTempOut')?>  :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="BoylerTempOut" onchange="Update(this.value,'boyler_BoylerTempOut')" value="<?php echo ($defaultdd["data"][0]["boyler_BoylerTempOut"]==null) ? null : $defaultdd["data"][0]["boyler_BoylerTempOut"] ?>" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_SpecificHeat')?> :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="SpecificHeat" onchange="Update(this.value,'boyler_SpecificHeat')" value="<?php echo ($defaultdd["data"][0]["boyler_SpecificHeat"]==null) ? null : $defaultdd["data"][0]["boyler_SpecificHeat"] ?>" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?>  :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="piece" onchange="Update(this.value,'boyler_piece')" value="<?php echo ($defaultdd["data"][0]["boyler_piece"]==null) ? null : $defaultdd["data"][0]["boyler_piece"] ?>" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen Adet yazınız">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_Density')?> :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="Density" onchange="Update(this.value,'boyler_Density')" value="<?php echo ($defaultdd["data"][0]["boyler_Density"]==null) ? null : $defaultdd["data"][0]["boyler_Density"] ?>" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız">
                                                  </div>
                                              </div>                        
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_PrepareTime')?> :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="PrepareTime" onchange="Update(this.value,'boyler_PrepareTime')" value="<?php echo ($defaultdd["data"][0]["boyler_PrepareTime"]==null) ? null : $defaultdd["data"][0]["boyler_PrepareTime"] ?>" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız">
                                                  </div>
                                              </div>
                                              
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Yagmursuyu" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Rainwater_Location')?> :</label>
                                                  <div class="col-sm-8">
                                                      <select name="Location" id="Location" onchange="Update(this.value,'rainwater_Location')"  class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($res_data["data"][7]["Data"] as $row)
                                                          @if ($defaultdd["data"][0]["rainwater_Location"] !=null && $defaultdd["data"][0]["rainwater_Location"] ==$row["Location"])

                                                                    <option value="{{$row["Location"]}}" selected>{{$row["Location"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Location"]}}">{{$row["Location"]}}</option>
                                                                    
                                                            @endif
                                                              
                                                              
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Rainwater_RoofType')?> :</label>
                                                  <div class="col-sm-8">
                                                      <select name="RoofType" id="RoofType" onchange="Update(this.value,'rainwater_RoofType')" class="form-control form-control-primary">
                                                         <option value="null" selected>Sabit verisi yok</option>
                                                          @foreach($res_data["data"][8]["Data"] as $row)
                                                          @if ($defaultdd["data"][0]["rainwater_RoofType"] !=null && $defaultdd["data"][0]["rainwater_RoofType"] ==$row["RoofType"])

                                                                    <option value="{{$row["RoofType"]}}" selected>{{$row["RoofType"]}}</option>
                                                            @else
                                                                    <option value="{{$row["RoofType"]}}">{{$row["RoofType"]}}</option>
                                                                    
                                                            @endif
                                                          
                                                              
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Rainwater_RainArea')?>:</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="RainArea" onchange="Update(this.value,'rainwater_RainArea')" value="<?php echo ($defaultdd["data"][0]["rainwater_RainArea"]==null) ? null : $defaultdd["data"][0]["rainwater_RainArea"] ?>" class="form-control form-control-round"
                                                                                                         placeholder="Lütfen değer yazınız">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Rainwater_RainPipe')?> :</label>
                                                  <div class="col-sm-8">
                                                      <input type="number" name="RainPipe" onchange="Update(this.value,'rainwater_RainPipe')" value="<?php echo ($defaultdd["data"][0]["rainwater_RainPipe"]==null) ? null : $defaultdd["data"][0]["rainwater_RainPipe"] ?>" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız">
                                                  </div>
                                              </div>
                                              
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Hidrofor" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_BuildType')?> :</label>
                                                  <div class="col-sm-8">
                                                      <select name="BuildType" onchange="Update(this.value,'hydrophore_BuildType')" id="BuildType" class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                        @foreach ($res_data["data"][28]["Data"] as $row)
                                                        @if ($defaultdd["data"][0]["hydrophore_BuildType"] !=null && $defaultdd["data"][0]["hydrophore_BuildType"] ==$row["BuildType"])

                                                                    <option value="{{$row["BuildType"]}}" selected>{{$row["BuildType"]}}</option>
                                                            @else
                                                                    <option value="{{$row["BuildType"]}}">{{$row["BuildType"]}}</option>
                                                                    
                                                            @endif
                                                        @endforeach;
                                                      </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_NumberOfPeople')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="NumberOfPeople" class="form-control form-control-round" onchange="Update(this.value,'hydrophore_NumberOfPeople')" 
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["hydrophore_NumberOfPeople"]==null) ? null : $defaultdd["data"][0]["hydrophore_NumberOfPeople"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_HydrophoreFactor')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="HydrophoreFactor" class="form-control form-control-round" onchange="Update(this.value,'hydrophore_HydrophoreFactor')" 
                                                                                              placeholder="Zorunlu alan değildir" value="<?php echo ($defaultdd["data"][0]["hydrophore_HydrophoreFactor"]==null) ? null : $defaultdd["data"][0]["hydrophore_HydrophoreFactor"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_StoredTime')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="StoredTime" class="form-control form-control-round" onchange="Update(this.value,'hydrophore_StoredTime')" 
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["hydrophore_StoredTime"]==null) ? null : $defaultdd["data"][0]["hydrophore_StoredTime"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="Piece"  class="form-control form-control-round" onchange="Update(this.value,'hydrophore_Piece')" 
                                                                                              placeholder="Zorunlu alan değildir" value="<?php echo ($defaultdd["data"][0]["hydrophore_Piece"]==null) ? null : $defaultdd["data"][0]["hydrophore_Piece"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_PipePressureLoss')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="PipePressureLoss" class="form-control form-control-round" onchange="Update(this.value,'hydrophore_PipePressureLoss')" 
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["hydrophore_PipePressureLoss"]==null) ? null : $defaultdd["data"][0]["hydrophore_PipePressureLoss"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_OtherLosses')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="OtherLosses" class="form-control form-control-round" onchange="Update(this.value,'hydrophore_OtherLosses')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["hydrophore_OtherLosses"]==null) ? null : $defaultdd["data"][0]["hydrophore_OtherLosses"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_UsingConcurrentFactor')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="UsingConcurrentFactor" class="form-control form-control-round" onchange="Update(this.value,'hydrophore_UsingConcurrentFactor')"
                                                                                              placeholder="Zorunlu alan değildir" value="<?php echo ($defaultdd["data"][0]["hydrophore_UsingConcurrentFactor"]==null) ? null : $defaultdd["data"][0]["hydrophore_UsingConcurrentFactor"] ?>">
                                                  </div>
                                              </div>
                                             
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Kollektor" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_CollectorCapacity')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="CollectorCapacity" class="form-control form-control-round" onchange="Update(this.value,'collector_CollectorCapacity')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["collector_CollectorCapacity"]==null) ? null : $defaultdd["data"][0]["collector_CollectorCapacity"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_TempratureAvg')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="TempratureAvg" class="form-control form-control-round" onchange="Update(this.value,'collector_TempratureAvg')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["collector_TempratureAvg"]==null) ? null : $defaultdd["data"][0]["collector_TempratureAvg"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_WaterRegime')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="WaterRegime" id="WaterRegime" onchange="Update(this.value,'collector_WaterRegime')" class="form-control form-control-primary">
                                                            <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][9]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["collector_WaterRegime"] !=null && $defaultdd["data"][0]["collector_WaterRegime"] ==$row["Regime"])

                                                                    <option value="{{$row["Regime"]}}" selected>{{$row["RegimeTitle"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Regime"]}}">{{$row["RegimeTitle"]}}</option>
                                                                    
                                                            @endif
               
                                                            
               
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_TransferorWater')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="TransferorWater" class="form-control form-control-round" onchange="Update(this.value,'collector_TransferorWater')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["collector_TransferorWater"]==null) ? null : $defaultdd["data"][0]["collector_TransferorWater"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_SpecificHeat')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="SpecificHeat"  class="form-control form-control-round" onchange="Update(this.value,'collector_SpecificHeat')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["collector_SpecificHeat"]==null) ? null : $defaultdd["data"][0]["collector_SpecificHeat"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_Density')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="Density" class="form-control form-control-round" onchange="Update(this.value,'collector_Density')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["collector_Density"]==null) ? null : $defaultdd["data"][0]["collector_Density"] ?>">
                                                  </div>
               
                                              </div>
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Gunes" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_Location')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="Location" id="Location" onchange="Update(this.value,'solarenergy_Location')"  class="form-control form-control-primary">
                                                            <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][7]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["solarenergy_Location"] !=null && $defaultdd["data"][0]["solarenergy_Location"] ==$row["Location"])

                                                                    <option value="{{$row["Location"]}}" selected>{{$row["Location"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Location"]}}">{{$row["Location"]}}</option>
                                                                    
                                                            @endif
               
                                                            
               
               
                                                            @endforeach
                                                        </select>
                                                     
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_CollectorBrand')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="CollectorBrand[]" id="CollectorBrand" onchange="Update(this.value,'solarenergy_CollectorBrand')" class="form-control form-control-primary">
                                                            <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][10]["Data"] as $row)
                                                            <?php $val =$row["Brand"].",".$row["Type"];  ?>
                                                            @if ($defaultdd["data"][0]["solarenergy_CollectorBrand"] !=null &&  $defaultdd["data"][0]["solarenergy_CollectorBrand"] ==$val)

                                                                    <option value="{{$row["Brand"]}},{{$row["Type"]}}" selected>{{$row["Brand"]}} {{$row["Type"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Brand"]}},{{$row["Type"]}}">{{$row["Brand"]}} {{$row["Type"]}}</option>
                                                                    
                                                            @endif
               
                                                            
               
               
                                                            @endforeach
                                                        </select>
                                                     
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_BuildType')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="BuildType" id="BuildType" onchange="Update(this.value,'solarenergy_BuildType')" class="form-control form-control-primary">
                                                            <option value="null" selected>Sabit verisi yok</option>
                                                            <option value="Duşlu veya küvetli konut">Duşlu veya küvetli konut</option>
                                                            <option value="Çift banyolu konut">Çift banyolu konut</option>
                                                            <option value="Duşsuz, banyosuz konut">Duşsuz, banyosuz konut</option>
                                                            <option value="Duşlu konut">Duşlu konut</option>
                                                            <option value="Banyolu konut">Banyolu konut</option>
                                                            <option value="Duşlu otel, misafirhane">Duşlu otel, misafirhane</option>
                                                            <option value="Banyolu otel, misafirhane">Banyolu otel, misafirhane</option>
                                                            <option value="Lokantalar">Lokantalar</option>
                                                            <option value="Hastaneler">Hastaneler</option>
                                                            <option value="Okullar (gündüz)">Okullar (gündüz)</option>
                                                            <option value="Okullar (yatılı)">Okullar (yatılı)</option>
                                                            <option value="Kreşler">Kreşler</option>
                                                            <option value="Kışlalar, polis enstitüleri">Kışlalar, polis enstitüleri</option>
                                                            <option value="Yüzme havuzları">Yüzme havuzları</option>
                                                            <option value="Spor salonları">Spor salonları</option>
                                                            <option value="Kapalı garajla">Kapalı garajla</option>
                                                        </select>
                                                     
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_NumberOfPeople')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="NumberOfPeople" class="form-control form-control-round" onchange="Update(this.value,'solarenergy_NumberOfPeople')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["solarenergy_NumberOfPeople"]==null) ? null : $defaultdd["data"][0]["solarenergy_NumberOfPeople"] ?>">
                                                     
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_SafetyFactor')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="SafetyFactor"  class="form-control form-control-round" onchange="Update(this.value,'solarenergy_SafetyFactor')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["solarenergy_SafetyFactor"]==null) ? null : $defaultdd["data"][0]["solarenergy_SafetyFactor"] ?>">
                                                     
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_CapacityCoverageRate')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="CapacityCoverageRate" class="form-control form-control-round" onchange="Update(this.value,'solarenergy_CapacityCoverageRate')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["solarenergy_CapacityCoverageRate"]==null) ? null : $defaultdd["data"][0]["solarenergy_CapacityCoverageRate"] ?>">
                                                     
                                                  </div>
                                              </div>
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Davlumbaz" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_KitchenType')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="KitchenType" id="KitchenType" onchange="Update(this.value,'paddlebox_KitchenType')"  class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][11]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["paddlebox_KitchenType"] !=null && $defaultdd["data"][0]["paddlebox_KitchenType"] ==$row["KitchenType"])

                                                                    <option value="{{$row["KitchenType"]}}" selected>{{$row["KitchenType"]}} {{$row["RoConcurrency"]}}</option>
                                                            @else
                                                                    <option value="{{$row["KitchenType"]}}">{{$row["KitchenType"]}} {{$row["RoConcurrency"]}}</option>
                                                                    
                                                            @endif
                    
                                                                
                    
                    
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_KitchenDensity')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="KitchenDensity" id="KitchenDensity" class="form-control form-control-primary" onchange="Update(this.value,'paddlebox_KitchenDensity')">
                                                            <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][11]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["paddlebox_KitchenDensity"] !=null && $defaultdd["data"][0]["paddlebox_KitchenDensity"] ==$row["KitchenDensity"])

                                                                    <option value="{{$row["KitchenDensity"]}}" selected>{{$row["KitchenDensity"]}} {{$row["RoConcurrency"]}}</option>
                                                            @else
                                                                    <option value="{{$row["KitchenDensity"]}}">{{$row["KitchenDensity"]}} {{$row["RoConcurrency"]}}</option>
                                                                    
                                                            @endif
                    
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="Piece" class="form-control form-control-round" onchange="Update(this.value,'paddlebox_Piece')"
                                                                                                   placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["paddlebox_Piece"]==null) ? null : $defaultdd["data"][0]["paddlebox_Piece"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_ReductionFactorPos')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="ReductionFactorPos" id="ReductionFactorPos" onchange="Update(this.value,'paddlebox_ReductionFactorPos')"  class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][12]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["paddlebox_ReductionFactorPos"] !=null && $defaultdd["data"][0]["paddlebox_ReductionFactorPos"] ==$row["Position"])

                                                                    <option value="{{$row["Position"]}}" selected>{{$row["Position"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Position"]}}">{{$row["Position"]}}</option>
                                                                    
                                                            @endif
                    
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_KitchenArea')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="KitchenArea" class="form-control form-control-round" onchange="Update(this.value,'paddlebox_KitchenArea')"
                                                                                                   placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["paddlebox_KitchenArea"]==null) ? null : $defaultdd["data"][0]["paddlebox_KitchenArea"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_Devices')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="DevicesName" id="DevicesName" onchange="Update(this.value,'paddlebox_Devices_Name')" class="form-control form-control-primary">
                                                        @foreach($res_data["data"][29]["Data"] as $row)
                                                        @if ($defaultdd["data"][0]["paddlebox_Devices_Name"] !=null && $defaultdd["data"][0]["paddlebox_Devices_Name"] ==$row["title"])

                                                                  <option value="{{$row["title"]}}" selected>{{$row["title"]}}</option>
                                                          @else
                                                                  <option value="{{$row["title"]}}">{{$row["title"]}}</option>
                                                                  
                                                          @endif
                                                        @endforeach
                    
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_KitchenHeight')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="KitchenHeight"  class="form-control form-control-round" onchange="Update(this.value,'paddlebox_KitchenHeight')"
                                                                                                   placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["paddlebox_KitchenHeight"]==null) ? null : $defaultdd["data"][0]["paddlebox_KitchenHeight"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_HeatSourceDistance')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="HeatSourceDistance" class="form-control form-control-round" onchange="Update(this.value,'paddlebox_HeatSourceDistance')"
                                                                                                   placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["paddlebox_HeatSourceDistance"]==null) ? null : $defaultdd["data"][0]["paddlebox_HeatSourceDistance"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_PaddleboxHeight')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="PaddleboxHeight" class="form-control form-control-round" onchange="Update(this.value,'paddlebox_PaddleboxHeight')"
                                                                                                   placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["paddlebox_PaddleboxHeight"]==null) ? null : $defaultdd["data"][0]["paddlebox_PaddleboxHeight"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_PaddleboxWidth')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="PaddleboxWidth" class="form-control form-control-round" onchange="Update(this.value,'paddlebox_PaddleboxWidth')"
                                                                                                   placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["paddlebox_PaddleboxWidth"]==null) ? null : $defaultdd["data"][0]["paddlebox_PaddleboxWidth"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_OverflowAirFactor')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="OverflowAirFactor" class="form-control form-control-round" onchange="Update(this.value,'paddlebox_OverflowAirFactor')"
                                                                                                   placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["paddlebox_OverflowAirFactor"]==null) ? null : $defaultdd["data"][0]["paddlebox_OverflowAirFactor"] ?>">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Havuz" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_PoolVolume')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="PoolVolume" class="form-control form-control-round" onchange="Update(this.value,'pool_PoolVolume')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pool_PoolVolume"]==null) ? null : $defaultdd["data"][0]["pool_PoolVolume"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_PoolArea')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="PoolArea" class="form-control form-control-round" onchange="Update(this.value,'pool_PoolArea')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pool_PoolArea"]==null) ? null : $defaultdd["data"][0]["pool_PoolArea"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_NumberOfUser')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="NumberOfUser" class="form-control form-control-round"  onchange="Update(this.value,'pool_NumberOfUser')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pool_NumberOfUser"]==null) ? null : $defaultdd["data"][0]["pool_NumberOfUser"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_CirculationPeriod')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="CirculationPeriod" class="form-control form-control-round" onchange="Update(this.value,'pool_CirculationPeriod')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pool_CirculationPeriod"]==null) ? null : $defaultdd["data"][0]["pool_CirculationPeriod"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_SuctionStrainerArea')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="SuctionStrainerArea"  class="form-control form-control-round" onchange="Update(this.value,'pool_SuctionStrainerArea')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pool_SuctionStrainerArea"]==null) ? null : $defaultdd["data"][0]["pool_SuctionStrainerArea"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_LightingIntensity')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="LightingIntensity" class="form-control form-control-round" onchange="Update(this.value,'pool_LightingIntensity')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pool_LightingIntensity"]==null) ? null : $defaultdd["data"][0]["pool_LightingIntensity"] ?>">
                                                  </div>
                                              </div>

                                              <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_FeedWaterSpeed')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="FeedWaterSpeed" onchange="Update(this.value,'pool_FeedWaterSpeed')" class="form-control form-control-round"
                                                     placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pool_FeedWaterSpeed"]==null) ? null : $defaultdd["data"][0]["pool_FeedWaterSpeed"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_SuctionWaterSpeed')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="SuctionWaterSpeed" onchange="Update(this.value,'pool_SuctionWaterSpeed')" class="form-control form-control-round"
                                                     placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pool_SuctionWaterSpeed"]==null) ? null : $defaultdd["data"][0]["pool_SuctionWaterSpeed"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_SuctionCollectorSpeed')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="SuctionCollectorSpeed" onchange="Update(this.value,'pool_SuctionCollectorSpeed')" class="form-control form-control-round"
                                                     placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pool_SuctionCollectorSpeed"]==null) ? null : $defaultdd["data"][0]["pool_SuctionCollectorSpeed"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_ReinforcementPerPerson')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="ReinforcementPerPerson" onchange="Update(this.value,'pool_ReinforcementPerPerson')"   class="form-control form-control-round"
                                                     placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pool_ReinforcementPerPerson"]==null) ? null : $defaultdd["data"][0]["pool_ReinforcementPerPerson"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_LightingLampIntensity')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="LightingLampIntensity" onchange="Update(this.value,'pool_LightingLampIntensity')" class="form-control form-control-round"
                                                     placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pool_LightingLampIntensity"]==null) ? null : $defaultdd["data"][0]["pool_LightingLampIntensity"] ?>">
                                                </div>
                                            </div>

                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Sogukdepo" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_ProductType')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="ProductType" id="ProductType" class="form-control form-control-primary" onchange="Update(this.value,'coldstorage_ProductType')">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][13]["Data"] as $row)
                                                            @if ($defaultdd["data"][0]["coldstorage_ProductType"] !=null && $defaultdd["data"][0]["coldstorage_ProductType"] ==$row["ProductType"])

                                                                    <option value="{{$row["ProductType"]}}" selected>{{$row["ProductType"]}}</option>
                                                            @else
                                                                    <option value="{{$row["ProductType"]}}">{{$row["ProductType"]}}</option>
                                                                    
                                                            @endif
               
                                                            
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_OtherLoads')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="OtherLoads"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_OtherLoads')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_OtherLoads"]==null) ? null : $defaultdd["data"][0]["coldstorage_OtherLoads"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_NumberOfPeople')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="NumberOfPeople"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_NumberOfPeople')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_NumberOfPeople"]==null) ? null : $defaultdd["data"][0]["coldstorage_NumberOfPeople"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_BreathingHeatExample')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="BreathingHeatExample"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_BreathingHeatExample')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_BreathingHeatExample"]==null) ? null : $defaultdd["data"][0]["coldstorage_BreathingHeatExample"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_EnclosureType')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="EnclosureType" id="EnclosureType" class="form-control form-control-primary" onchange="Update(this.value,'coldstorage_EnclosureType')">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][14]["Data"] as $row)
                                                            @if ($defaultdd["data"][0]["coldstorage_EnclosureType"] !=null && $defaultdd["data"][0]["coldstorage_EnclosureType"] ==$row["Type"])

                                                                    <option value="{{$row["Type"]}}" selected>{{$row["Type"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Type"]}}">{{$row["Type"]}}</option>
                                                                    
                                                            @endif
               
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_EngineLoad')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="EngineLoad"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_EngineLoad')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_EngineLoad"]==null) ? null : $defaultdd["data"][0]["coldstorage_EngineLoad"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_StorageVolume')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="StorageVolume"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_StorageVolume')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_StorageVolume"]==null) ? null : $defaultdd["data"][0]["coldstorage_StorageVolume"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_ProductQuantity')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="ProductQuantity"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_ProductQuantity')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_ProductQuantity"]==null) ? null : $defaultdd["data"][0]["coldstorage_ProductQuantity"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_EntryTemp')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="EntryTemp"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_EntryTemp')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_EntryTemp"]==null) ? null : $defaultdd["data"][0]["coldstorage_EntryTemp"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_SystemSafetyHike')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="SystemSafetyHike"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_SystemSafetyHike')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_SystemSafetyHike"]==null) ? null : $defaultdd["data"][0]["coldstorage_SystemSafetyHike"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_HeatGain')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="HeatGain" class="form-control form-control-round" onchange="Update(this.value,'coldstorage_HeatGain')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_HeatGain"]==null) ? null : $defaultdd["data"][0]["coldstorage_HeatGain"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_LightingLoad')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="LightingLoad" class="form-control form-control-round" onchange="Update(this.value,'coldstorage_LightingLoad')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_LightingLoad"]==null) ? null : $defaultdd["data"][0]["coldstorage_LightingLoad"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_BreathingHeat')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="BreathingHeat"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_BreathingHeat')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_BreathingHeat"]==null) ? null : $defaultdd["data"][0]["coldstorage_BreathingHeat"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_OutdoorEnthalpy')?> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="OutdoorEnthalpy"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_OutdoorEnthalpy')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_OutdoorEnthalpy"]==null) ? null : $defaultdd["data"][0]["coldstorage_OutdoorEnthalpy"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_IndoorEnthalpy')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="IndoorEnthalpy"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_IndoorEnthalpy')"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_IndoorEnthalpy"]==null) ? null : $defaultdd["data"][0]["coldstorage_IndoorEnthalpy"] ?>">
                                                    </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_AirDensity')?> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="AirDensity"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_AirDensity')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_AirDensity"]==null) ? null : $defaultdd["data"][0]["coldstorage_AirDensity"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_ShiftLength')?> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="ShiftLength"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_ShiftLength')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_ShiftLength"]==null) ? null : $defaultdd["data"][0]["coldstorage_ShiftLength"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_SystemUptime')?> :</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="SystemUptime"  class="form-control form-control-round" onchange="Update(this.value,'coldstorage_SystemUptime')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["coldstorage_SystemUptime"]==null) ? null : $defaultdd["data"][0]["coldstorage_SystemUptime"] ?>">
                                                </div>
                                            </div>
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Boruyalitim" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_ServicePipeType')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="ServicePipeType" id="ServicePipeType" class="form-control form-control-primary" onchange="Update(this.value,'pipeinsulation_ServicePipeType')">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][15]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["pipeinsulation_ServicePipeType"] !=null && $defaultdd["data"][0]["pipeinsulation_ServicePipeType"] ==$row["PipeType"])

                                                                    <option value="{{$row["PipeType"]}}" selected>{{$row["PipeType"]}}</option>
                                                            @else
                                                                    <option value="{{$row["PipeType"]}}">{{$row["PipeType"]}}</option>
                                                                    
                                                            @endif
               
                                                            
               
                                                            @endforeach
                                                        </select>
                                                       
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_PipeDiameter')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="PipeDiameter" id="PipeDiameter" class="form-control form-control-primary" onchange="Update(this.value,'pipeinsulation_PipeDiameter')">
                                                            <option selected>Lütfen seçim yapınız</option>
                                                            @foreach ($res_data["data"][18]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["pipeinsulation_PipeDiameter"] !=null && $defaultdd["data"][0]["pipeinsulation_PipeDiameter"] ==$row["OuterD"])

                                                                    <option value="{{$row["OuterD"]}}" selected>{{$row["OuterD"]}}</option>
                                                            @else
                                                                    <option value="{{$row["OuterD"]}}">{{$row["OuterD"]}}</option>
                                                                    
                                                            @endif
               
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_WaterFlow')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="WaterFlow"  class="form-control form-control-round" onchange="Update(this.value,'pipeinsulation_WaterFlow')" 
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipeinsulation_WaterFlow"]==null) ? null : $defaultdd["data"][0]["pipeinsulation_WaterFlow"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SheathPipeType')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="SheathPipeType" id="SheathPipeType" onchange="Update(this.value,'pipeinsulation_SheathPipeType')" class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][16]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["pipeinsulation_SheathPipeType"] !=null && $defaultdd["data"][0]["pipeinsulation_SheathPipeType"] ==$row["Standart"])

                                                                    <option value="{{$row["Standart"]}}" selected>{{$row["Standart"]}}--{{$row["Description"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Standart"]}}">{{$row["Standart"]}}--{{$row["Description"]}}</option>
                                                                    
                                                            @endif
               
                                                           
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SoilType')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="SoilType" id="SoilType" onchange="Update(this.value,'pipeinsulation_SoilType')" class="form-control form-control-primary">
                                                            <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][17]["Data"] as $row)
                                                            @if ($defaultdd["data"][0]["pipeinsulation_SoilType"] !=null && $defaultdd["data"][0]["pipeinsulation_SoilType"] ==$row["Type"])

                                                                    <option value="{{$row["Type"]}}" selected>{{$row["Type"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Type"]}}">{{$row["Type"]}}</option>
                                                                    
                                                            @endif
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SoilTemperature')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="SoilTemperature"  class="form-control form-control-round" onchange="Update(this.value,'pipeinsulation_SoilTemperature')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipeinsulation_SoilTemperature"]==null) ? null : $defaultdd["data"][0]["pipeinsulation_SoilTemperature"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_LineLength')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="LineLength"  class="form-control form-control-round" onchange="Update(this.value,'pipeinsulation_LineLength')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipeinsulation_LineLength"]==null) ? null : $defaultdd["data"][0]["pipeinsulation_LineLength"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_FluidAvgTemperature')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="FluidAvgTemperature" class="form-control form-control-round" onchange="Update(this.value,'pipeinsulation_FluidAvgTemperature')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipeinsulation_FluidAvgTemperature"]==null) ? null : $defaultdd["data"][0]["pipeinsulation_FluidAvgTemperature"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SoilFillingHeight')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="SoilFillingHeight" class="form-control form-control-round" onchange="Update(this.value,'pipeinsulation_SoilFillingHeight')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipeinsulation_SoilFillingHeight"]==null) ? null : $defaultdd["data"][0]["pipeinsulation_SoilFillingHeight"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_WaterMass')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="WaterMass" class="form-control form-control-round" onchange="Update(this.value,'pipeinsulation_WaterMass')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipeinsulation_WaterMass"]==null) ? null : $defaultdd["data"][0]["pipeinsulation_WaterMass"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SpecificHeatOfWater')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="SpecificHeatOfWater" class="form-control form-control-round" onchange="Update(this.value,'pipeinsulation_SpecificHeatOfWater')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipeinsulation_SpecificHeatOfWater"]==null) ? null : $defaultdd["data"][0]["pipeinsulation_SpecificHeatOfWater"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_MaterialLamda')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="MaterialLamda" class="form-control form-control-round" onchange="Update(this.value,'pipeinsulation_MaterialLamda')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipeinsulation_MaterialLamda"]==null) ? null : $defaultdd["data"][0]["pipeinsulation_MaterialLamda"] ?>">
                                                </div>
                                            </div>
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Otopark" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_CalculationType')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="CalculationType" id="CalculationType" onchange="Update(this.value,'parkingventilation_CalculationType')" class="form-control form-control-primary">
                                                            <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][19]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["parkingventilation_CalculationType"] !=null && $defaultdd["data"][0]["parkingventilation_CalculationType"] ==$row["Code"])

                                                                    <option value="{{$row["Code"]}}" selected>{{$row["Type"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Code"]}}">{{$row["Type"]}}</option>
                                                                    
                                                            @endif
               
                                                            
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingHeight')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="ParkingHeight" class="form-control form-control-round" onchange="Update(this.value,'parkingventilation_ParkingHeight')" 
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["parkingventilation_ParkingHeight"]==null) ? null : $defaultdd["data"][0]["parkingventilation_ParkingHeight"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingType')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="ParkingType" id="ParkingType" class="form-control form-control-primary" onchange="Update(this.value,'parkingventilation_ParkingType')">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][20]["Data"] as $row)
                                                            @if ($defaultdd["data"][0]["parkingventilation_ParkingType"] !=null && $defaultdd["data"][0]["parkingventilation_ParkingType"] ==$row["Type"])

                                                                    <option value="{{$row["Type"]}}" selected>{{$row["Type"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Type"]}}">{{$row["Type"]}}</option>
                                                                    
                                                            @endif
               
                                                            
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_NumberOfVehicles')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="NumberOfVehicles" class="form-control form-control-round" onchange="Update(this.value,'parkingventilation_NumberOfVehicles')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["parkingventilation_NumberOfVehicles"]==null) ? null : $defaultdd["data"][0]["parkingventilation_NumberOfVehicles"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_FlowCalcMethod')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="FlowCalcMethod" id="FlowCalcMethod" class="form-control form-control-primary" onchange="Update(this.value,'parkingventilation_FlowCalcMethod')">
                                                            <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][21]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["parkingventilation_FlowCalcMethod"] !=null && $defaultdd["data"][0]["parkingventilation_FlowCalcMethod"] ==$row["Code"])

                                                                    <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Code"]}}">{{$row["Description"]}}</option>
                                                                    
                                                            @endif
               
                                                            
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_DrivingRoadLength')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="DrivingRoadLength" class="form-control form-control-round" onchange="Update(this.value,'parkingventilation_DrivingRoadLength')"
                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["parkingventilation_DrivingRoadLength"]==null) ? null : $defaultdd["data"][0]["parkingventilation_DrivingRoadLength"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingArea')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="ParkingArea" class="form-control form-control-round" onchange="Update(this.value,'parkingventilation_ParkingArea')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["parkingventilation_ParkingArea"]==null) ? null : $defaultdd["data"][0]["parkingventilation_ParkingArea"] ?>">
                                                  </div>
                                              </div>

                                              <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_WasteGasCO')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="WasteGasCO" class="form-control form-control-round" onchange="Update(this.value,'parkingventilation_WasteGasCO')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["parkingventilation_WasteGasCO"]==null) ? null : $defaultdd["data"][0]["parkingventilation_WasteGasCO"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_OutdoorCO')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="OutdoorCO" class="form-control form-control-round" onchange="Update(this.value,'parkingventilation_OutdoorCO')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["parkingventilation_OutdoorCO"]==null) ? null : $defaultdd["data"][0]["parkingventilation_OutdoorCO"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_VehicleExitFrequency')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="VehicleExitFrequency" class="form-control form-control-round" onchange="Update(this.value,'parkingventilation_VehicleExitFrequency')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["parkingventilation_VehicleExitFrequency"]==null) ? null : $defaultdd["data"][0]["parkingventilation_VehicleExitFrequency"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingSpeed')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="ParkingSpeed" class="form-control form-control-round" onchange="Update(this.value,'parkingventilation_ParkingSpeed')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["parkingventilation_ParkingSpeed"]==null) ? null : $defaultdd["data"][0]["parkingventilation_ParkingSpeed"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_DetectorDensity')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="DetectorDensity" class="form-control form-control-round" onchange="Update(this.value,'parkingventilation_DetectorDensity')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["parkingventilation_DetectorDensity"]==null) ? null : $defaultdd["data"][0]["parkingventilation_DetectorDensity"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingCulvertBelow100')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="ParkingCulvertBelow" class="form-control form-control-round" onchange="Update(this.value,'parkingventilation_ParkingCulvertBelow')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["parkingventilation_ParkingCulvertBelow"]==null) ? null : $defaultdd["data"][0]["parkingventilation_ParkingCulvertBelow"] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">    
                                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingCulvertAbove100')?> :</label>
                                                <div class="col-sm-8">
                                                     <input type="number" name="ParkingCulvertAbove" class="form-control form-control-round" onchange="Update(this.value,'parkingventilation_ParkingCulvertAbove')"
                                                                                            placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["parkingventilation_ParkingCulvertAbove"]==null) ? null : $defaultdd["data"][0]["parkingventilation_ParkingCulvertAbove"] ?>">
                                                </div>
                                            </div>
                                              
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Siginak" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Shelterventilation_CalculationType')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="CalculationType" id="CalculationType" onchange="Update(this.value,'shelter_CalculationType')"  class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][19]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["shelter_CalculationType"] !=null && $defaultdd["data"][0]["shelter_CalculationType"] ==$row["Code"])

                                                                    <option value="{{$row["Code"]}}" selected>{{$row["Type"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Code"]}}">{{$row["Type"]}}</option>
                                                                    
                                                            @endif
               
                                                            
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Shelterventilation_NeedFreshAir')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="NeedFreshAir" id="NeedFreshAir" onchange="Update(this.value,'shelter_NeedFreshAir')" class="form-control form-control-primary">
                                                            <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][23]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["shelter_NeedFreshAir"] !=null && $defaultdd["data"][0]["shelter_NeedFreshAir"] ==$row["Flow"])

                                                                    <option value="{{$row["Flow"]}}" selected>{{$row["DangerFilter0"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Flow"]}}">{{$row["DangerFilter0"]}}</option>
                                                                    
                                                            @endif
               
                                                           
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Shelterventilation_ShelterArea')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="ShelterArea" class="form-control form-control-round" onchange="Update(this.value,'shelter_ShelterArea')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["shelter_ShelterArea"]==null) ? null : $defaultdd["data"][0]["shelter_ShelterArea"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Shelterventilation_ShelterHeight')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="ShelterHeight" class="form-control form-control-round" onchange="Update(this.value,'shelter_ShelterHeight')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["shelter_ShelterHeight"]==null) ? null : $defaultdd["data"][0]["shelter_ShelterHeight"] ?>">
                                                  </div>
                                              </div>



                                             
                                              
                                          </div>
                                      </div>       
                                  </div>
                                  <div class="tab-pane" id="Borubasinc" role="tabpanel">
                                      <div class="row">
                                          <div class="col-md-12 m-30">
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_FluidType')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="FluidType" id="FluidType" onchange="Update(this.value,'pipe_FluidType')" class="form-control form-control-primary">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][26]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["pipe_FluidType"] !=null && $defaultdd["data"][0]["pipe_FluidType"] ==$row["Type"])

                                                                    <option value="{{$row["Type"]}}" selected>{{$row["Type"]}} / {{$row["Density"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Type"]}}">{{$row["Type"]}} / {{$row["Density"]}}</option>
                                                                    
                                                            @endif
               
                                                            
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MinLoad')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="MinLoad" class="form-control form-control-round" onchange="Update(this.value,'pipe_MinLoad')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipe_MinLoad"]==null) ? null : $defaultdd["data"][0]["pipe_MinLoad"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_Pipe')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="Pipe" id="Pipe" class="form-control form-control-primary" onchange="Update(this.value,'pipe_pipe')">
                                                            <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][16]["Data"] as $row)

                                                            @if ($defaultdd["data"][0]["pipe_pipe"] !=null && $defaultdd["data"][0]["pipe_pipe"] ==$row["Standart"])

                                                                    <option value="{{$row["Standart"]}}" selected>{{$row["Standart"]}} / {{$row["OuterD"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Standart"]}}">{{$row["Standart"]}} / {{$row["OuterD"]}}</option>
                                                                    
                                                            @endif
               
                                                          
               
                                                            @endforeach
                                                        </select>
                                                       
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_DiameterAdvice')?> :</label>
                                                  <div class="col-sm-8">
                                                       <select name="DiameterAdvice" id="DiameterAdvice" class="form-control form-control-primary" onchange="Update(this.value,'pipe_DiameterAdvice')">
                                                        <option value="null" selected>Sabit verisi yok</option>
                                                            @foreach ($res_data["data"][27]["Data"] as $row)
                                                            @if ($defaultdd["data"][0]["pipe_DiameterAdvice"] !=null && $defaultdd["data"][0]["pipe_DiameterAdvice"] ==$row["Type"])

                                                                    <option value="{{$row["Type"]}}" selected>{{$row["Type"]}} / {{$row["LineLoad"]}}</option>
                                                            @else
                                                                    <option value="{{$row["Type"]}}">{{$row["Type"]}} / {{$row["LineLoad"]}}</option>
                                                                    
                                                            @endif
               
                                                            
               
                                                            @endforeach
                                                        </select>
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MaxLoad')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="MaxLoad" class="form-control form-control-round" onchange="Update(this.value,'pipe_MaxLoad')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipe_MaxLoad"]==null) ? null : $defaultdd["data"][0]["pipe_MaxLoad"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_Lines')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="LinesName" class="form-control form-control-round" onchange="Update(this.value,'pipe_Lines_Name')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipe_Lines_Name"]==null) ? null : $defaultdd["data"][0]["pipe_Lines_Name"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MinSpeed')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="MinSpeed" class="form-control form-control-round" onchange="Update(this.value,'pipe_MinSpeed')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipe_MinSpeed"]==null) ? null : $defaultdd["data"][0]["pipe_MinSpeed"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_GoingTemp')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="GoingTemp" class="form-control form-control-round" onchange="Update(this.value,'pipe_GoingTemp')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipe_GoingTemp"]==null) ? null : $defaultdd["data"][0]["pipe_GoingTemp"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesConnection')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="LinesConnection" class="form-control form-control-round" onchange="Update(this.value,'pipe_Lines_Connection')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipe_Lines_Connection"]==null) ? null : $defaultdd["data"][0]["pipe_Lines_Connection"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesLenght')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="LinesLenght" class="form-control form-control-round" onchange="Update(this.value,'pipe_Lines_Length')"
                                                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipe_Lines_Length"]==null) ? null : $defaultdd["data"][0]["pipe_Lines_Length"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MaxSpeed')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="MaxSpeed" class="form-control form-control-round" onchange="Update(this.value,'pipe_MaxSpeed')"
                                                                                              placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipe_MaxSpeed"]==null) ? null : $defaultdd["data"][0]["pipe_MaxSpeed"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_ReturnTemp')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="ReturnTemp" class="form-control form-control-round" onchange="Update(this.value,'pipe_ReturnTemp')"
                                                                                                     placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipe_ReturnTemp"]==null) ? null : $defaultdd["data"][0]["pipe_ReturnTemp"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesPartLoad')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="LinesPartLoad" class="form-control form-control-round" onchange="Update(this.value,'pipe_Lines_PartLoad')"
                                                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipe_Lines_PartLoad"]==null) ? null : $defaultdd["data"][0]["pipe_Lines_PartLoad"] ?>">
                                                  </div>
                                              </div>
                                              <div class="form-group row">    
                                                  <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesLineLoad')?> :</label>
                                                  <div class="col-sm-8">
                                                       <input type="number" name="LinesLineLoad" class="form-control form-control-round" onchange="Update(this.value,'pipe_Lines_LineLoad')"
                                                                                       placeholder="Lütfen değer yazınız" value="<?php echo ($defaultdd["data"][0]["pipe_Lines_LineLoad"]==null) ? null : $defaultdd["data"][0]["pipe_Lines_LineLoad"] ?>">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>       
                                  </div>
                              </div>
                               
                            </div>
                       </div>
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
    function Update(val,update_col)
    {
        let deger;
        if(val=="null" || val.length==0)
        {
            deger = null;
        }else{
            deger =val;
        }
        $.ajax({
                url : '{{ route("admin.updateconst") }}',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {updatedata:deger,updatecol:update_col},
                success: function (gelenveri) {
                    if(gelenveri.success==true)
                    {
                        
                       

                    }else{

                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Hata Oluştu.Lütfen tekrar deneyiniz..',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        

                    }
                },
                error: function (hata) {

                    
 
                }
        });



    }
    </script>
@endsection