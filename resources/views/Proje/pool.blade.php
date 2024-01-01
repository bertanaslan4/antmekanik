@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>  / <?=__('staticmessage.Havuz')?>   </h5>
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
                         <form action="{{route('admin.poolhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["pool_id"])) ? null : $projedetay["data"]["pool_id"] ])}}" method="post">
                            
                              @csrf
                              <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                                   <div class="col-sm-4">
                                       <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]["adi"]) ? $projedetay["data"][0]["adi"] :""?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                                   <div class="col-sm-4">
                                       <textarea rows="5" cols="5" class="form-control" placeholder="Lütfen bir açıklama yazınız" id="aciklama" name="aciklama"><?php echo isset($projedetay["data"][0]["aciklama"] ) ? $projedetay["data"][0]["aciklama"] :"";?></textarea>
                                      
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_PoolVolume')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="PoolVolume" class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["PoolVolume"]) ? $projedetay["data"][0]["PoolVolume"] : $defaultdd["data"][0]["pool_PoolVolume"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_PoolArea')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="PoolArea" class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["PoolArea"]) ? $projedetay["data"][0]["PoolArea"] : $defaultdd["data"][0]["pool_PoolArea"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_NumberOfUser')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="NumberOfUser" class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["NumberOfUser"]) ? $projedetay["data"][0]["NumberOfUser"] : $defaultdd["data"][0]["pool_NumberOfUser"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_CirculationPeriod')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="CirculationPeriod" class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["CirculationPeriod"]) ? $projedetay["data"][0]["CirculationPeriod"] : $defaultdd["data"][0]["pool_CirculationPeriod"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_SuctionStrainerArea')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="SuctionStrainerArea"  class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["SuctionStrainerArea"]) ? $projedetay["data"][0]["SuctionStrainerArea"] : $defaultdd["data"][0]["pool_SuctionStrainerArea"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_LightingIntensity')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="LightingIntensity" class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["LightingIntensity"]) ? $projedetay["data"][0]["LightingIntensity"] : $defaultdd["data"][0]["pool_LightingIntensity"] ?>">
                                   </div>
                               </div>

                               <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_FeedWaterSpeed')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="FeedWaterSpeed" class="form-control form-control-round"
                                     placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["FeedWaterSpeed"]) ? $projedetay["data"][0]["FeedWaterSpeed"] : $defaultdd["data"][0]["pool_FeedWaterSpeed"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_SuctionWaterSpeed')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="SuctionWaterSpeed" class="form-control form-control-round"
                                     placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["SuctionWaterSpeed"]) ? $projedetay["data"][0]["SuctionWaterSpeed"] : $defaultdd["data"][0]["pool_SuctionWaterSpeed"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_SuctionCollectorSpeed')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="SuctionCollectorSpeed" class="form-control form-control-round"
                                     placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["SuctionCollectorSpeed"]) ? $projedetay["data"][0]["SuctionCollectorSpeed"] : $defaultdd["data"][0]["pool_SuctionCollectorSpeed"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_ReinforcementPerPerson')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="ReinforcementPerPerson" class="form-control form-control-round"
                                     placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["ReinforcementPerPerson"]) ? $projedetay["data"][0]["ReinforcementPerPerson"] : $defaultdd["data"][0]["pool_ReinforcementPerPerson"] ?>">
                                </div>
                            </div>
                            <div class="form-group row">    
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Pool_LightingLampIntensity')?> :</label>
                                <div class="col-sm-4">
                                     <input type="number" name="LightingLampIntensity" class="form-control form-control-round"
                                     placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["LightingLampIntensity"]) ? $projedetay["data"][0]["LightingLampIntensity"] : $defaultdd["data"][0]["pool_LightingLampIntensity"] ?>">
                                </div>
                            </div>
                           <div class="form-group row">    
                                        <label class="col-sm-4 col-form-label"><?=__('staticmessage.Marka')?> :</label>
                                        <div class="col-sm-4">
                                                <select class="js-example-tags col-sm-12" id="marka" onchange="MarkaChange(this.value)" multiple="multiple" name="brand[]">
                                                    <option value="hepsi">Hepsi</option>
                                                    @if (!empty($projedetay["BoilerBrand"]["data"]))                                                
                                                    @foreach($projedetay["BoilerBrand"]["data"] as $row)

                                                    <option value="{{$row["brand"]}}">{{$row["brand"]}}</option>
                                                        
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
                        @if (session()->has('poolhesap'))
                              <div class="col-md-12">
                                   @if (isset(session('poolhesap')[0]["data"]["id"]))
                                        <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('poolhesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('poolhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                        <br>
                                        <br>
                                        <form action="{{route('admin.poolhesapkaydet',["update"=>1,"id"=>isset(session('poolhesap')[0]["data"]["id"]) ? session('poolhesap')[0]["data"]["id"] : null ] )}}" method="post">
                                        @else
                                        <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                        <br>
                                        <br>
                                        <form action="{{route('admin.poolhesapkaydet')}}" method="post">
                                        
                                        @endif
                                    @csrf
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                             <div class="form-group row">
                                                  <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                                  <div class="col-sm-6 col-form-label">
                                                      <p>{!! session('poolhesap')[0]["data"]["adi"] !!}</p>
                                                  </div>
                                              </div>
                                              <div class="form-group row">
                                                  <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                                  <div class="col-sm-6 col-form-label">
                                                      <p>{!! session('poolhesap')[0]["data"]["aciklama"] !!}</p>
                                                  </div>
                                              </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Pool_PoolVolume')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('poolhesap')[0]["data"]["PoolVolume"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Pool_PoolArea')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('poolhesap')[0]["data"]["PoolArea"] !!}</p>
                                                       </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_NumberOfUser')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["NumberOfUser"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_CirculationPeriod')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["CirculationPeriod"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_LightingIntensity')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["LightingIntensity"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_SuctionStrainerArea')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["SuctionStrainerArea"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_FeedWaterSpeed')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["FeedWaterSpeed"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_SuctionWaterSpeed')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["SuctionWaterSpeed"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_SuctionCollectorSpeed')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["SuctionCollectorSpeed"] !!}</p>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_SuctionPipeDiameter')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["SuctionPipeDiameter"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_SuctionCollectorDiameter')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["SuctionCollectorDiameter"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_TankDailyReinforcement')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["TankDailyReinforcement"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_NumberOfLightingLamp')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["NumberOfLightingLamp"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <ul class="basic-list list-icons">
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pool_ReinforcementPerPerson')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('poolhesap')[0]["data"]["ReinforcementPerPerson"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pool_LightingLampIntensity')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('poolhesap')[0]["data"]["LightingLampIntensity"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pool_BalanceTankArea')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('poolhesap')[0]["data"]["BalanceTankArea"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pool_FilterCapacity')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('poolhesap')[0]["data"]["FilterCapacity"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pool_PumpFlow')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('poolhesap')[0]["data"]["PumpFlow"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Pool_FeedingNozzle')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('poolhesap')[0]["data"]["FeedingNozzle"] !!}</p>
                                                        </div>
                                                    </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_FeedingNozzleFlow')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('poolhesap')[0]["data"]["FeedingNozzleFlow"],1,2)  !!}</p> <br>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_SuctionStrainerAreaNet')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!!  session('poolhesap')[0]["data"]["SuctionStrainerAreaNet"]  !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_FilterSuctionSpeed')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('poolhesap')[0]["data"]["FilterSuctionSpeed"],1,2)   !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_FeedPipe')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('poolhesap')[0]["data"]["FeedPipe"],1,2)  !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_SuctionPipe')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('poolhesap')[0]["data"]["SuctionPipe"],1,2)  !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_SuctionCollector')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv( session('poolhesap')[0]["data"]["SuctionCollector"],1,3) !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Pool_FeedPipeDiameter')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('poolhesap')[0]["data"]["FeedPipeDiameter"] !!}</p> <br>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b>Cihaz Seçimi :</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>Cihaz Seçimi :</p>
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                  <label class="col-sm-6">
                                                  </label>
                                                  <div class="col-sm-6">
                                                      @if (isset(session('poolhesap')[0]["data"]["edit"]) && session('poolhesap')[0]["data"]["edit"]==1)
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
                              </div>
                     @endif
                     @endif
                 </div>
             </div>
         </div>
     </div>
</div>                     
 <script type="text/javascript">
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