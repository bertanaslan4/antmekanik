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
                         <ul class="nav nav-tabs  tabs" role="tablist">
                              <li class="nav-item">
                              <a class="nav-link active" data-toggle="tab" href="#genelayarlar" role="tab">Genel Ayarlar</a>
                              </li>
                              <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#defaultayarlar" role="tab">Default Veriler</a>
                              </li>
                              <li class="nav-item">
                              <a class="nav-link" data-toggle="tab" href="#emailayari" role="tab">Email Ayarları</a>
                              </li>
                         </ul>
                         <div class="tab-content tabs card-block">
                              <div class="tab-pane active" id="genelayarlar" role="tabpanel">
                                   Genel ayarları
                              </div>
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
                                                        <select class="form-control" size="1" id="fueltype" onchange="fueltypechange(this.value)" name="fueltype">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            @foreach($res_data["data"][0]["Data"] as $row)
                                                                
                                                              <option value="{{$row["Code"]}}">{{$row["Description"]}}</option>
                                                                
                                                            @endforeach
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.HeatNeed')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control form-control-round" type="text"  id="heatneed" name="heatneed" value="<?php echo isset($projedetay["data"]["HeatNeed"]) ? $projedetay["data"]["HeatNeed"] : "250000" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_DistributionPipe')?>:</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" size="1" id="distributionpipe" name="distributionpipe">
                                                            @foreach($res_data["data"][1]["Data"] as $row)
                                                                <option value="{{$row["Code"]}}">{{$row["Description"]}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control form-control-round"  type="text" id="piece" name="piece" value="<?php echo isset($projedetay["data"]["Piece"]) ? $projedetay["data"]["Piece"] : "1" ?>">
                                                     </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_BoilerUnitAvgHeat')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control form-control-round"  type="text" id="kk" name="kk" value="<?php echo  isset($projedetay["data"]["BoilerUnitAvgHeat"]) ? $projedetay["data"]["BoilerUnitAvgHeat"] : "9300" ?>">
                                                    </div>
                                                </div> 
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
                                                        
                                                        
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
                                                        <input class="form-control form-control-round" type="text" id="HeatNeed" name="HeatNeed" value="<?php echo isset($projedetay["data"]["HeatNeed"]) ? $projedetay["data"]["HeatNeed"] : "250000" ?>">
                                                    </div>        
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_totalpass')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="TotalPass" value="<?php echo isset($projedetay["data"]["TotalPass"]) ? $projedetay["data"]["TotalPass"] : "1150" ?>" id="TotalPass" class="form-control form-control-round" placeholder="Lütfen paremetre yazınız">
                                                    </div>        
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_heaterfluidavg')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" value="<?php echo isset($projedetay["data"]["HeaterFluidAvg"]) ? $projedetay["data"]["HeaterFluidAvg"] : "110" ?>" name="HeaterFluidAvg" class="form-control form-control-round"
                                                                   placeholder="Lütfen paremetre yazınız">
                                                    </div>        
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_pollutionfactor')?>:</label>
                                                    <div class="col-md-8">
                                                        <input type="text" name="PollutionFactor" value="<?php echo isset($projedetay["data"]["PollutionFactor"]) ? $projedetay["data"]["PollutionFactor"] : "0.25" ?>" id="HeatNeed" class="form-control form-control-round" placeholder="Lütfen paremetre yazınız">
                
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="Piece" value="<?php echo isset($projedetay["data"]["Piece"]) ? $projedetay["data"]["Piece"] : "1" ?>" class="form-control form-control-round"
                                                                   placeholder="Lütfen paremetre yazınız">
                                                    </div>        
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_heatedfluidavg')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" value="<?php echo isset($projedetay["data"]["HeatedFluidAvg"]) ? $projedetay["data"]["HeatedFluidAvg"] : "80" ?>"name="HeatedFluidAvg" class="form-control form-control-round"
                                                                   placeholder="Lütfen paremetre yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="Brülör" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12 m-30">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="BoilerCapacity" value="250000" class="form-control form-control-round"
                                                        placeholder="Lütfen paremetre yazınız">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.LiquitFuelType')?>:</label>
                                                    <div class="col-sm-8">
                                                        <select name="LiquitFuelType" id="LiquitFuelType" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            @foreach($res_data["data"][3]["Data"] as $row)
                                                               
                                                                <option value="{{$row["Name"]}}">{{$row["Name"]}}</option>
                                                             @endforeach   
                                                                
                                                        </select>
                    
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.burner_efficiency')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="BurnerEfficiency"  class="form-control form-control-round"
                                                        placeholder="Zorunlu alan değildir" value="90">
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="KazanHesabiFuelAmount" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12 m-30">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="BoilerCapacityKazan" class="form-control form-control-round"
                                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["BoilerCapacity"]) ? $projedetay["data"][0]["BoilerCapacity"] : "250000" ?>"></div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_BoilerEffiency')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="BoilerEfficiencyKazan"  class="form-control form-control-round"
                                                        placeholder="Boiler Efficiency" value="<?php echo isset($projedetay["data"][0]["BoilerEfficiency"]) ? $projedetay["data"][0]["BoilerEfficiency"] : "90" ?>">                            </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelType')?> :</label>
                                                    <div class="col-sm-8">
                                                        <select name="FuelTypeKazan" id="FuelTypeKazan" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            @foreach($res_data["data"][0]["Data"] as $row)
                                                            @if (isset($projedetay["data"][0]["FuelType"]) && $projedetay["data"][0]["FuelType"]==$row["Code"])
                                                                <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                            @else
                                                                @if ($row["Code"]=="0")
                                                                    <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                                @else
                                                                    <option value="{{$row["Code"]}}">{{$row["Description"]}}</option>
                                                                @endif
                                                            @endif                
                                                            
                                                                
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.LiquitFuelType')?>:</label>
                                                    <div class="col-sm-8">
                                                        <select name="LiquitFuelTypeKazan" id="LiquitFuelTypeKazan" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            @foreach($res_data["data"][3]["Data"] as $row)
                                                            
                                                            @if (isset($projedetay["data"][0]["LiquitFuelType"]) && $projedetay["data"][0]["LiquitFuelType"]==$row["Name"])
                                                                <option value="{{$row["Name"]}}" selected>{{$row["Name"]}}</option>
                                                            @else
                                                                @if ($row["Name"]=="Lpg")
                                                                <option value="{{$row["Name"]}}" selected>{{$row["Name"]}}</option>
                                                                @else
                                                                <option value="{{$row["Name"]}}">{{$row["Name"]}}</option>
                                                                @endif
                        
                                                            @endif
                                                           
                                                                
                                                            @endforeach
                                                        </select>                            </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="piecekazan" class="form-control form-control-round"
                                                        placeholder="Lütfen Adet yazınız" value="<?php echo isset($projedetay["data"][0]["Piece"]) ? $projedetay["data"][0]["Piece"] : "1" ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                        <select name="FuelTypeKazan" id="FuelTypeKazan" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            @foreach($res_data["data"][0]["Data"] as $row)
                        
                                                            @if (isset($projedetay["data"][0]["FuelType"]) && $projedetay["data"][0]["FuelType"]==$row["Code"])
                                                                <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                            @else
                        
                                                                @if ($row["Code"]=="0")
                                                                    <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                                    @else
                                                                    <option value="{{$row["Code"]}}">{{$row["Description"]}}</option>
                                                                @endif
                        
                                                            @endif
                                                                
                                                                
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.LiquitFuelType')?>:</label>
                                                    <div class="col-sm-8">
                                                        <select name="LiquitFuelTypeKazan" id="LiquitFuelTypeKazan" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            @foreach($res_data["data"][3]["Data"] as $row)
                                                            @if (isset($projedetay["data"][0]["LiquitFuelType"]) && $projedetay["data"][0]["LiquitFuelType"]==$row["Name"])
                                                                <option value="{{$row["Name"]}}" selected>{{$row["Name"]}}</option>
                                                            @else
                                                            @if ($row["Name"]=="Lpg")
                                                                <option value="{{$row["Name"]}}" selected>{{$row["Name"]}}</option>
                                                                @else
                                                                <option value="{{$row["Name"]}}">{{$row["Name"]}}</option>
                                                                @endif
                                                            @endif
                                                                
                                                                
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="piecekazan" class="form-control form-control-round"
                                                        placeholder="Lütfen Adet yazınız" value="<?php echo isset($projedetay["data"][0]["Piece"]) ? $projedetay["data"][0]["Piece"] : 1 ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.burner_efficiency')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" value="<?php echo isset($projedetay["data"][0]["BurnerEfficiency"]) ? $projedetay["data"][0]["BurnerEfficiency"] : 90 ?>" name="BurnerEfficiencyKazan"  class="form-control form-control-round"
                                                                                                       placeholder="Burner Efficiency">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" value="<?php echo isset($projedetay["data"][0]["BoilerCapacity"]) ? $projedetay["data"][0]["BoilerCapacity"] : 250000 ?>" name="BoilerCapacityKazan" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen Adet yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmountYearly_YearlyHeatingEnergy')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" value="<?php echo isset($projedetay["data"][0]["YearlyHeatingEnergy"]) ? $projedetay["data"][0]["YearlyHeatingEnergy"] : "150" ?>" name="YearlyHeatingEnergy"  class="form-control form-control-round"
                                                                                                       placeholder="Yearly Heating Energy">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_BoilerEffiency')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" value="<?php echo isset($projedetay["data"][0]["BoilerEfficiency"]) ? $projedetay["data"][0]["BoilerEfficiency"] : "90" ?>" name="BoilerEfficiencyKazan"  class="form-control form-control-round"
                                                                                                       placeholder="Boiler Efficiency">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmountYearly_BuildingArea')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" value="<?php echo isset($projedetay["data"][0]["BuildingArea"]) ? $projedetay["data"][0]["BuildingArea"] : "158.4" ?>"  name="BuildingArea"  class="form-control form-control-round"
                                                                                                       placeholder="Building Area">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>       
                                    </div>
                                    <div class="tab-pane" id="Acikgenlesme" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12 m-30">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="BoilerCapacityKazan" value="250000" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen Adet yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.OpenExpansionTank_HeaterType')?> :</label>
                                                    <div class="col-sm-8">
                                                        <select name="HeaterType" id="HeaterType" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.OpenExpansionTank_WaterExpansion')?> :</label>
                                                    <div class="col-sm-8">
                                                        <select name="waterexpansion" id="waterexpansion" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                        <input type="number" name="BoilerCapacityKazan" class="form-control form-control-round"
                                                        placeholder="Lütfen Adet yazınız" value="100000">                            </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_HeaterType')?> :</label>
                                                    <div class="col-sm-8">
                                                        <select name="HeaterType" id="HeaterType" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_WaterExpansion')?> :</label>
                                                    <div class="col-sm-8">
                                                        <select name="waterexpansion" id="waterexpansion" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            
                                                        </select>                            </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_StaticHeight')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" value="10" name="StaticHeight" class="form-control form-control-round"
                                                        placeholder="Lütfen değer yazınız">                            </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_OpeningPressure')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" value="2.5" name="OpeningPressure" class="form-control form-control-round"
                                                        placeholder="Lütfen değer yazınız">                            </div>
                                                </div>
                                                
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_ValveType')?> :</label>
                                                    <div class="col-sm-8">
                                                        <select name="ValveType" id="ValveType" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="piece" value="1" class="form-control form-control-round"
                                                        placeholder="Lütfen Adet yazınız">                            </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                        <input type="number" name="TemperatureDiff" value="20" class="form-control form-control-round"
                                                                                                           placeholder="Lütfen değer yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Circulationpump_PressureDrop')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="PressureDrop" value="8800" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen değer yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="BoilerCapacityKazan" value="300000" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen Adet yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?>:</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="piece" value="1" class="form-control form-control-round"
                                                        placeholder="Lütfen Adet yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                        <select name="BuildType" id="BuildType" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            @foreach($res_data["data"][6]["Data"] as $row)
                                                                @if ($row["BuildType"]=="Bağımsız ev")
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
                                                        <select name="Equipment" id="Equipment" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            @foreach($res_data["data"][5]["Data"] as $row)
                                                                @if ($row["Equipment"]=="Banyo")
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
                                                        <input type="number" name="BoylerTempIn" value="10" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen değer yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_BoylerTempOut')?>  :</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="BoylerTempOut" value="60" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen değer yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_SpecificHeat')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="SpecificHeat" value="4.2" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen değer yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?>  :</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="piece" value="1" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen Adet yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_Density')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="Density" value="1" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen değer yazınız">
                                                    </div>
                                                </div>                        
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boyler_PrepareTime')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="PrepareTime" value="1" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen değer yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                        <select name="Location" id="Location" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            @foreach($res_data["data"][7]["Data"] as $row)
                                                                @if ($row["Location"]=="İzmir")
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
                                                        <select name="RoofType" id="RoofType" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                            @foreach($res_data["data"][8]["Data"] as $row)
                                                            @if ($row["RoofType"]=="Çatı eğimi > 3°, Beton Çatılar, Rampalar")
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
                                                        <input type="number" name="RainArea" value="900" class="form-control form-control-round"
                                                                                                           placeholder="Lütfen değer yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Rainwater_RainPipe')?> :</label>
                                                    <div class="col-sm-8">
                                                        <input type="number" name="RainPipe" value="6" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen değer yazınız">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                        <select name="BuildType" id="BuildType" class="form-control form-control-primary">
                                                            <option selected>Lütfen seçim yapın</option>
                                                              <option value="Duşlu veya küvetli konut" selected>Duşlu veya küvetli konut</option>
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
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_NumberOfPeople')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="NumberOfPeople" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["NumberOfPeople"]) ? $projedetay["data"]["NumberOfPeople"] : "64" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_HydrophoreFactor')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="HydrophoreFactor" class="form-control form-control-round"
                                                                                                placeholder="Zorunlu alan değildir" value="<?php echo isset($projedetay["data"]["HydrophoreFactor"]) ? $projedetay["data"]["HydrophoreFactor"] : "0.7" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_StoredTime')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="StoredTime" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["HydrophoreFactor"]) ? $projedetay["data"]["HydrophoreFactor"] : "10" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="Piece" value="1" class="form-control form-control-round"
                                                                                                placeholder="Zorunlu alan değildir" value="<?php echo isset($projedetay["data"]["Piece"]) ? $projedetay["data"]["Piece"] : "1" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_PipePressureLoss')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="PipePressureLoss" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["PipePressureLoss"]) ? $projedetay["data"]["PipePressureLoss"] : "1500" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_OtherLosses')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="OtherLosses" class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["OtherLosses"]) ? $projedetay["data"]["OtherLosses"] : "500" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_UsingConcurrentFactor')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="UsingConcurrentFactor" class="form-control form-control-round"
                                                                                                placeholder="Zorunlu alan değildir" value="<?php echo isset($projedetay["data"]["UsingConcurrentFactor"]) ? $projedetay["data"]["UsingConcurrentFactor"] : "0.4" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                         <input type="number" name="CollectorCapacity" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["CollectorCapacity"]) ? $projedetay["data"]["CollectorCapacity"] : "465000" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_TempratureAvg')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="TempratureAvg" class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["TempratureAvg"]) ? $projedetay["data"]["TempratureAvg"] : "20" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_WaterRegime')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="WaterRegime" id="WaterRegime" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapın</option>
                                                              @foreach ($res_data["data"][9]["Data"] as $row)
                 
                                                              <option value="{{$row["Regime"]}}">{{$row["RegimeTitle"]}}</option>
                 
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_TransferorWater')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="TransferorWater" class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["TransferorWater"]) ? $projedetay["data"]["TransferorWater"] : "30" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_SpecificHeat')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="SpecificHeat"  class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["SpecificHeat"]) ? $projedetay["data"]["SpecificHeat"] : "4180" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_Density')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="Density" class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["Density"]) ? $projedetay["data"]["Density"] : "1000" ?>">
                                                    </div>
                 
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                         <select name="Location" id="Location" class="form-control form-control-primary">
                                                              
                                                              @foreach ($res_data["data"][7]["Data"] as $row)
                 
                                                              <option value="{{$row["Location"]}}">{{$row["Location"]}}</option>
                 
                 
                                                              @endforeach
                                                          </select>
                                                       
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_CollectorBrand')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="CollectorBrand[]" id="CollectorBrand" class="form-control form-control-primary">
                                                              
                                                              @foreach ($res_data["data"][10]["Data"] as $row)
                 
                                                              <option value="{{$row["Brand"]}},{{$row["Type"]}}">{{$row["Brand"]}} {{$row["Type"]}}</option>
                 
                 
                                                              @endforeach
                                                          </select>
                                                       
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_BuildType')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="BuildType" id="BuildType" class="form-control form-control-primary">
                                                             
                                                              <option value="Duşlu veya küvetli konut">Duşlu veya küvetli konut</option>
                                                              <option value="Çift banyolu konut">Çift banyolu konut</option>
                                                              <option value="Duşsuz, banyosuz konut">Duşsuz, banyosuz konut</option>
                                                              <option value="Duşlu konut">Duşlu konut</option>
                                                              <option value="Banyolu konut" selected>Banyolu konut</option>
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
                                                         <input type="number" name="NumberOfPeople" class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["NumberOfPeople"]) ? $projedetay["data"]["NumberOfPeople"] : "200" ?>">
                                                       
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_SafetyFactor')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="SafetyFactor"  class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["SafetyFactor"]) ? $projedetay["data"]["SafetyFactor"] : "5" ?>">
                                                       
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_CapacityCoverageRate')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="CapacityCoverageRate" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["CapacityCoverageRate"]) ? $projedetay["data"]["CapacityCoverageRate"] : "20" ?>">
                                                       
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                         <select name="KitchenType" id="KitchenType" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapın</option>
                                                              @foreach ($res_data["data"][11]["Data"] as $row)
                      
                                                                  <option value="{{$row["KitchenType"]}}">{{$row["KitchenType"]}} {{$row["RoConcurrency"]}}</option>
                      
                      
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_KitchenDensity')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="KitchenDensity" id="KitchenDensity" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapın</option>
                                                              @foreach ($res_data["data"][11]["Data"] as $row)
                      
                                                              <option value="{{$row["KitchenDensity"]}}">{{$row["KitchenDensity"]}} {{$row["RoConcurrency"]}}</option>
                      
                      
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="Piece" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız" value="1">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_ReductionFactorPos')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="ReductionFactorPos" id="ReductionFactorPos" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapın</option>
                                                              @foreach ($res_data["data"][12]["Data"] as $row)
                      
                                                              <option value="{{$row["Position"]}}">{{$row["Position"]}}</option>
                      
                      
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_KitchenArea')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="KitchenArea" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız" value="72">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_Devices')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="DevicesName" id="DevicesName" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapın</option>
                      
                                                              <option value="Elektrikli Ocak" selected>Elektrikli Ocak</option>
                      
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_KitchenHeight')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="KitchenHeight"  class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız" value="3">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_HeatSourceDistance')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="HeatSourceDistance" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız" value="2.1">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_PaddleboxHeight')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="PaddleboxHeight" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız" value="1.75">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_PaddleboxWidth')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="PaddleboxWidth" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız" value="4.285">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Paddlebox_OverflowAirFactor')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="OverflowAirFactor" class="form-control form-control-round"
                                                                                                     placeholder="Lütfen değer yazınız" value="1.2">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                         <input type="number" name="PoolVolume" class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["PoolVolume"]) ? $projedetay["data"]["PoolVolume"] : "75" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_PoolArea')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="PoolArea" class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["PoolArea"]) ? $projedetay["data"]["PoolArea"] : "50" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_NumberOfUser')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="NumberOfUser" class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["NumberOfUser"]) ? $projedetay["data"]["NumberOfUser"] : "8" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_CirculationPeriod')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="CirculationPeriod" class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["CirculationPeriod"]) ? $projedetay["data"]["CirculationPeriod"] : "50" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_SuctionStrainerArea')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="SuctionStrainerArea"  class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["SuctionStrainerArea"]) ? $projedetay["data"]["SuctionStrainerArea"] : "0.04" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_LightingIntensity')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="LightingIntensity" class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["LightingIntensity"]) ? $projedetay["data"]["LightingIntensity"] : "350" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                         <select name="ProductType" id="ProductType" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][13]["Data"] as $row)
                 
                                                              <option value="{{$row["ProductType"]}}">{{$row["ProductType"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_OtherLoads')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="OtherLoads"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="0">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_NumberOfPeople')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="NumberOfPeople"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="2">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_BreathingHeatExample')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="BreathingHeatExample"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="7342">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_EnclosureType')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="EnclosureType" id="EnclosureType" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][14]["Data"] as $row)
                 
                                                              <option value="{{$row["Type"]}}">{{$row["Type"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_EngineLoad')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="EngineLoad"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="350">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_StorageVolume')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="StorageVolume"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="19.9">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_ProductQuantity')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="ProductQuantity"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="3672">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_EntryTemp')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="EntryTemp"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="30">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_SystemSafetyHike')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="SystemSafetyHike"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="10">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_HeatGain')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="HeatGain" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="492.6">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_LightingLoad')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="LightingLoad" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="100">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.ColdStorage_BreathingHeat')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="BreathingHeat"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="2">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                         <select name="ServicePipeType" id="ServicePipeType" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][15]["Data"] as $row)
                 
                                                              <option value="{{$row["PipeType"]}}">{{$row["PipeType"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                         
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_PipeDiameter')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="PipeDiameter" id="PipeDiameter" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][18]["Data"] as $row)
                 
                                                              <option value="{{$row["OuterD"]}}">{{$row["OuterD"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_WaterFlow')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="WaterFlow"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["WaterFlow"]) ? $projedetay["data"]["WaterFlow"] : "45" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SheathPipeType')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="SheathPipeType" id="SheathPipeType" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][16]["Data"] as $row)
                 
                                                              <option value="{{$row["Standart"]}}">{{$row["Standart"]}}--{{$row["Description"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SoilType')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="SoilType" id="SoilType" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][17]["Data"] as $row)
                 
                                                              <option value="{{$row["Type"]}}">{{$row["Type"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SoilTemperature')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="SoilTemperature"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["SoilTemperature"]) ? $projedetay["data"]["SoilTemperature"] : "5" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_LineLength')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="LineLength"  class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["LineLength"]) ? $projedetay["data"]["LineLength"] : "200" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_FluidAvgTemperature')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="number" name="FluidAvgTemperature" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["FluidAvgTemperature"]) ? $projedetay["data"]["FluidAvgTemperature"] : "90" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipeinsulation_SoilFillingHeight')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="SoilFillingHeight" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"]["SoilFillingHeight"]) ? $projedetay["data"]["SoilFillingHeight"] : "0.5" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                         <select name="CalculationType" id="CalculationType" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][19]["Data"] as $row)
                 
                                                              <option value="{{$row["Code"]}}">{{$row["Type"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingHeight')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="ParkingHeight" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["ParkingHeight"]) ? $projedetay["data"]["ParkingHeight"] : "3" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingType')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="ParkingType" id="ParkingType" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][20]["Data"] as $row)
                 
                                                              <option value="{{$row["Type"]}}">{{$row["Type"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_NumberOfVehicles')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="NumberOfVehicles" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["NumberOfVehicles"]) ? $projedetay["data"]["NumberOfVehicles"] : "200" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_FlowCalcMethod')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="FlowCalcMethod" id="FlowCalcMethod" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][21]["Data"] as $row)
                 
                                                              <option value="{{$row["Code"]}}">{{$row["Description"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_DrivingRoadLength')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="DrivingRoadLength" class="form-control form-control-round"
                                                         placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["DrivingRoadLength"]) ? $projedetay["data"]["DrivingRoadLength"] : "15" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Parkingventilation_ParkingArea')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="ParkingArea" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["ParkingArea"]) ? $projedetay["data"]["ParkingArea"] : "4000" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                         <select name="CalculationType" id="CalculationType" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][19]["Data"] as $row)
                 
                                                              <option value="{{$row["Code"]}}">{{$row["Type"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Shelterventilation_NeedFreshAir')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="NeedFreshAir" id="NeedFreshAir" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][23]["Data"] as $row)
                 
                                                              <option value="{{$row["Flow"]}}">{{$row["DangerFilter0"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Shelterventilation_ShelterArea')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="ShelterArea" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["ShelterArea"]) ? $projedetay["data"]["ShelterArea"] : "150" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Shelterventilation_ShelterHeight')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="ShelterHeight" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["ShelterHeight"]) ? $projedetay["data"]["ShelterHeight"] : "3" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
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
                                                         <select name="FluidType" id="FluidType" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][26]["Data"] as $row)
                 
                                                              <option value="{{$row["Type"]}}">{{$row["Type"]}} / {{$row["Density"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MinLoad')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="MinLoad" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["MinLoad"]) ? $projedetay["data"]["MinLoad"] : "5000" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_Pipe')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="Pipe" id="Pipe" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][16]["Data"] as $row)
                 
                                                              <option value="{{$row["Standart"]}}">{{$row["Standart"]}} / {{$row["OuterD"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                         
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_DiameterAdvice')?> :</label>
                                                    <div class="col-sm-8">
                                                         <select name="DiameterAdvice" id="DiameterAdvice" class="form-control form-control-primary">
                                                              <option selected>Lütfen seçim yapınız</option>
                                                              @foreach ($res_data["data"][27]["Data"] as $row)
                 
                                                              <option value="{{$row["Type"]}}">{{$row["Type"]}} / {{$row["LineLoad"]}}</option>
                 
                                                              @endforeach
                                                          </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MaxLoad')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="MaxLoad" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["MaxLoad"]) ? $projedetay["data"]["MaxLoad"] : "250000" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_Lines')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="LinesName" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["LinesName"]) ? $projedetay["data"]["LinesName"] : "1" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MinSpeed')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="MinSpeed" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["MinSpeed"]) ? $projedetay["data"]["MinSpeed"] : "0.2" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_GoingTemp')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="GoingTemp" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["GoingTemp"]) ? $projedetay["data"]["GoingTemp"] : "90" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesConnection')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="LinesConnection" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["LinesConnection"]) ? $projedetay["data"]["LinesConnection"] : "3" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesLenght')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="LinesLenght" class="form-control form-control-round"
                                                                                         placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["LinesLenght"]) ? $projedetay["data"]["LinesLenght"] : "1" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MaxSpeed')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="MaxSpeed" class="form-control form-control-round"
                                                                                                placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["MaxSpeed"]) ? $projedetay["data"]["MaxSpeed"] : "0.2" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_ReturnTemp')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="ReturnTemp" class="form-control form-control-round"
                                                                                                       placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["ReturnTemp"]) ? $projedetay["data"]["ReturnTemp"] : "70" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesPartLoad')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="LinesPartLoad" class="form-control form-control-round"
                                                                                         placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["LinesPartLoad"]) ? $projedetay["data"]["LinesPartLoad"] : "5000" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesLineLoad')?> :</label>
                                                    <div class="col-sm-8">
                                                         <input type="text" name="LinesLineLoad" class="form-control form-control-round"
                                                                                         placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"]["LinesLineLoad"]) ? $projedetay["data"]["LinesLineLoad"] : "5000" ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">    
                                                    <div class="col-sm-4"></div>
                                                    <div class="col-sm-8">
                                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="Güncelle"><?=__('staticmessage.Güncelle')?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>       
                                    </div>
                                </div>
                                 
                              </div>
                              <div class="tab-pane" id="emailayari" role="tabpanel">
                                   Email Ayarları
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
    function fueltypechange(val)
    {
      let fueltype = val
      if(fueltype==0)
      {
          $("#kk").val(7000);
      }else if(fueltype==1)
      {
          $("#kk").val(9300);
      }else if(fueltype==2)
      {
          $("#kk").val(9300);
      }else{
          $("#kk").val(0);
      }

    }
    </script>
@endsection