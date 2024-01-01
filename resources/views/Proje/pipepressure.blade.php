@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Borubasinc')?>  </h5>
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
                         <form action="{{route('admin.pipepressurehesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["pipepressureloss_id"])) ? null : $projedetay["data"]["pipepressureloss_id"] ])}}" method="post">
                            
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
                                       <textarea rows="5" cols="5" class="form-control" placeholder="Lütfen bir açıklama yazınız" id="aciklama" name="aciklama"><?php echo isset($projedetay["data"][0]["aciklama"]) ? $projedetay["data"][0]["aciklama"] : "" ?></textarea>
                                      
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_FluidType')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="FluidType" id="FluidType" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][26]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["FluidType"]) && $projedetay["data"][0]["FluidType"]==$row["Type"])
                                                <option value="{{$row["Type"]}}" selected>{{$row["Type"]}} / {{$row["Density"]}}</option>
                                            @else
                                            @if ($defaultdd["data"][0]["pipe_FluidType"]==$row["Type"])
                                                <option value="{{$row["Type"]}}" selected>{{$row["Type"]}} / {{$row["Density"]}}</option>
                                            @else
                                                <option value="{{$row["Type"]}}">{{$row["Type"]}} / {{$row["Density"]}}</option>  
                                            @endif
                                        
                                            @endif

                                             @endforeach
                                         </select>
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MinLoad')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="MinLoad" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["MinLoad"]) ? $projedetay["data"][0]["MinLoad"] : $defaultdd["data"][0]["pipe_MinLoad"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_Pipe')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="Pipe" id="Pipe" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][16]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["Pipe"]) && $projedetay["data"][0]["Pipe"]==$row["Standart"])
                                                    <option value="{{$row["Standart"]}}" selected>{{$row["Standart"]}} / {{$row["OuterD"]}}</option>
                                                    @else
                                                @if ($defaultdd["data"][0]["pipe_pipe"]==$row["Standart"])
                                                    <option value="{{$row["Standart"]}}" selected>{{$row["Standart"]}} / {{$row["OuterD"]}}</option>
                                                @else
                                                    <option value="{{$row["Standart"]}}">{{$row["Standart"]}} / {{$row["OuterD"]}}</option>  
                                                @endif
                                            
                                                @endif

                                             @endforeach
                                         </select>
                                        
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_DiameterAdvice')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="DiameterAdvice" id="DiameterAdvice" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][27]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["DiameterAdvice"]) && $projedetay["data"][0]["DiameterAdvice"]==$row["Type"])
                                             <option value="{{$row["Type"]}}" selected>{{$row["Type"]}} / {{$row["LineLoad"]}}</option>
                                            @else
                                            @if ($defaultdd["data"][0]["pipe_DiameterAdvice"]==$row["Type"])
                                                <option value="{{$row["Type"]}}" selected>{{$row["Type"]}} / {{$row["LineLoad"]}}</option>
                                            @else
                                                <option value="{{$row["Type"]}}">{{$row["Type"]}} / {{$row["LineLoad"]}}</option>  
                                            @endif
                                        
                                            @endif

                                             @endforeach
                                         </select>
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MaxLoad')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="MaxLoad" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["MaxLoad"]) ? $projedetay["data"][0]["MaxLoad"] : $defaultdd["data"][0]["pipe_MaxLoad"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_Lines')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="LinesName" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["Lines_Name"]) ? $projedetay["data"][0]["Lines_Name"] : $defaultdd["data"][0]["pipe_Lines_Name"]?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MinSpeed')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="MinSpeed" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["MinSpeed"]) ? $projedetay["data"][0]["MinSpeed"] : $defaultdd["data"][0]["pipe_MinSpeed"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_GoingTemp')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="GoingTemp" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["GoingTemp"]) ? $projedetay["data"][0]["GoingTemp"] : $defaultdd["data"][0]["pipe_GoingTemp"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesConnection')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="LinesConnection" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["Lines_Connection"]) ? $projedetay["data"][0]["Lines_Connection"] : $defaultdd["data"][0]["pipe_Lines_Connection"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesLenght')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="LinesLenght" class="form-control form-control-round"
                                                                        placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["Lines_Length"]) ? $projedetay["data"][0]["Lines_Length"] : $defaultdd["data"][0]["pipe_Lines_Length"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_MaxSpeed')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="MaxSpeed" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["MaxSpeed"]) ? $projedetay["data"][0]["MaxSpeed"] : $defaultdd["data"][0]["pipe_MaxSpeed"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_ReturnTemp')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="ReturnTemp" class="form-control form-control-round"
                                                                                      placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["ReturnTemp"]) ? $projedetay["data"][0]["ReturnTemp"] : $defaultdd["data"][0]["pipe_ReturnTemp"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesPartLoad')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="LinesPartLoad" class="form-control form-control-round"
                                                                        placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["Lines_PartLoad"]) ? $projedetay["data"][0]["Lines_PartLoad"] : $defaultdd["data"][0]["pipe_Lines_PartLoad"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pipepressureloss_LinesLineLoad')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="LinesLineLoad" class="form-control form-control-round"
                                                                        placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["Lines_LineLoad"]) ? $projedetay["data"][0]["Lines_LineLoad"] : $defaultdd["data"][0]["pipe_Lines_LineLoad"] ?>">
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

                     @if (session()->has('pipepressurehesap'))
                         <div class="col-md-12">
                              @if (isset(session('pipepressurehesap')[0]["data"]["id"]))
                              <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('pipepressurehesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('pipepressurehesap')[0]["data"]["adi"] !!} </b>  </h4>
                              <br>
                              <br>
                              <form action="{{route('admin.pipepressurehesapkaydet',["update"=>1,"id"=>isset(session('pipepressurehesap')[0]["data"]["id"]) ? session('pipepressurehesap')[0]["data"]["id"] : null ] )}}" method="post">
                              @else
                              <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                              <br>
                              <br>
                              <form action="{{route('admin.pipepressurehesapkaydet')}}" method="post">
                             
                              @endif
                            
                              
                                  @csrf
                                  <div class="card-block">
                                   <div class="row">
                                       <div class="col-md-6">
                                        <div class="form-group row">
                                             <label class="col-sm-6"><b><?=__('staticmessage.Name')?> :</b></label>
                                             <div class="col-sm-6 col-form-label">
                                                 <p>{!! session('pipepressurehesap')[0]["data"]["adi"] !!}</p>
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label class="col-sm-6"><b><?=__('staticmessage.Description')?> :</b></label>
                                             <div class="col-sm-6 col-form-label">
                                                 <p>{!! session('pipepressurehesap')[0]["data"]["aciklama"] !!}</p>
                                                </div>
                                         </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6"><b><?=__('staticmessage.Pipepressureloss_MinSpeed')?> :</b></label>
                                               <div class="col-sm-6 col-form-label">
                                                   <p>{!! session('pipepressurehesap')[0]["data"]["MinSpeed"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6"><b><?=__('staticmessage.Pipepressureloss_MaxSpeed')?> :</b></label>
                                               <div class="col-sm-6 col-form-label">
                                                   <p>{!! session('pipepressurehesap')[0]["data"]["MaxSpeed"] !!}</p>
                                                  </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Pipepressureloss_MinLoad')?> :</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('pipepressurehesap')[0]["data"]["MinLoad"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Pipepressureloss_MaxLoad')?> :</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('pipepressurehesap')[0]["data"]["MaxLoad"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Pipepressureloss_GoingTemp')?> :</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('pipepressurehesap')[0]["data"]["GoingTemp"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Pipepressureloss_ReturnTemp')?> :</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('pipepressurehesap')[0]["data"]["ReturnTemp"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Pipepressureloss_FluidType')?> :</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('pipepressurehesap')[0]["data"]["FluidType"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Pipepressureloss_DiameterAdvice')?> :</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('pipepressurehesap')[0]["data"]["DiameterAdvice"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Pipepressureloss_TempDiff')?> :</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('pipepressurehesap')[0]["data"]["TempDiff"] !!}</p>
                                               </div>
                                           </div>

                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Pipepressureloss_TempAvg')?> :</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('pipepressurehesap')[0]["data"]["TempAvg"] !!}</p> <br>
                                               </div>
                                           </div>
                                           <ul class="basic-list list-icons">

                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Pipepressureloss_WaterDensity')?> :</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('pipepressurehesap')[0]["data"]["WaterDensity"] !!}</p> <br>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Pipepressureloss_SpecificHeatOfWater')?> :</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('pipepressurehesap')[0]["data"]["SpecificHeatOfWater"] !!}</p> <br>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Pipepressureloss_WaterViscosity')?> :</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('pipepressurehesap')[0]["data"]["WaterViscosity"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Pipepressureloss_DynamicViscosity')?> :</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('pipepressurehesap')[0]["data"]["DynamicViscosity"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Pipepressureloss_LinesLineLoad')?> :</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('pipepressurehesap')[0]["data"]["LineLoad"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Pipepressureloss_Flow')?> :</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('pipepressurehesap')[0]["data"]["Flow"] !!}</p>
                                                </div>
                                            </div>
                                            <button onclick="detaygosterpipepressure();return false;" id="pipepressuredetay" class="btn btn-out-dashed waves-effect waves-light btn-danger btn-square btn-sm"><?=__('staticmessage.DetayGoster')?></button>

                                            <div id="pipepressure" style="display: none;">
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_Name')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["Name"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_Connection')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["Connection"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_PartLoad')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["PartLoad"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_LinesLineLoad')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["LineLoad"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_Length')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["Length"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_PipeType')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["PipeType"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_Flow')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["Flow"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_StartSpeed')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["StartSpeed"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_EquivalentDiameter')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["EquivalentDiameter"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_PipeInch')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["PipeInch"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_PipeInnerD')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["PipeInnerD"]  !!}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_Emstivity')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["Emstivity"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_FrictionCoefficient')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["FrictionCoefficient"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_NetSpeed')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["NetSpeed"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_Resistance')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["Resistance"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_KinematicViscosity')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["KinematicViscosity"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_Reynold')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["Reynold"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_CoRoughness')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["CoRoughness"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_RelativeSmoothness')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["RelativeSmoothness"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_PressureDrop')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["PressureDrop"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pipepressureloss_TotalPressureDrop')?> :</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('pipepressurehesap')[0]["data"]["Lines"][0]["TotalPressureDrop"]  !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                    </label>
                                                    <div class="col-sm-6">
                                                        @if (isset(session('pipepressurehesap')[0]["data"]["edit"]) && session('pipepressurehesap')[0]["data"]["edit"]==1)
                                                        <input type="submit"  value="<?=__('staticmessage.Güncelle')?>" class="btn btn-warning btn-round waves-effect waves-light"></input>
                                                        @else
                                                        <input type="submit"  value="<?=__('staticmessage.Kaydet')?>" class="btn btn-info btn-round waves-effect waves-light"></input>
                                                        @endif
                                                        
                                                    </div>
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
     function detaygosterpipepressure()
        {
            document.getElementById("pipepressure").style.display="block";
            document.getElementById("pipepressuredetay").style.display="none";
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
    </script>
@endsection