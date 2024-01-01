@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>  / <?=__('staticmessage.Hidrofor')?> </h5>
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
                         <form action="{{route('admin.hydrophorehesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["hydrophore_id"])) ? null : $projedetay["data"]["hydrophore_id"] ])}}" method="post">
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
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_BuildType')?> :</label>
                                   <div class="col-sm-4">
                                       <select name="BuildType" id="BuildType" class="form-control form-control-primary">
                                           <option selected>Lütfen seçim yapın</option>
                                           @foreach ($res_data["data"][28]["Data"] as $row)
                                           @if (isset($projedetay["data"][0]["BuildType"]) && $projedetay["data"][0]["BuildType"]==$row["BuildType"])
                                                <option value="{{$row["BuildType"]}}" selected>{{$row["BuildType"]}}</option>
                                            @else
                                                @if ($defaultdd["data"][0]["hydrophore_BuildType"]==$row["BuildType"])
                                                    <option value="{{$row["BuildType"]}}" selected>{{$row["BuildType"]}}</option>
                                                @else
                                                    <option value="{{$row["BuildType"]}}">{{$row["BuildType"]}}</option>  
                                                @endif
                                        
                                            @endif
                                           @endforeach;
                                       </select>
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_NumberOfPeople')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="NumberOfPeople" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay['data'][0]['NumberOfPeople']) ? $projedetay["data"][0]['NumberOfPeople'] : $defaultdd["data"][0]['hydrophore_NumberOfPeople'] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_HydrophoreFactor')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="text" name="HydrophoreFactor" class="form-control form-control-round"
                                                                               placeholder="Zorunlu alan değildir" value="<?php echo isset($projedetay["data"][0]["HydrophoreFactor"]) ? $projedetay["data"][0]["HydrophoreFactor"] : $defaultdd["data"][0]["hydrophore_HydrophoreFactor"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_StoredTime')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="StoredTime" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["StoredTime"]) ? $projedetay["data"][0]["StoredTime"] : $defaultdd["data"][0]["hydrophore_StoredTime"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="Piece" value="1" class="form-control form-control-round"
                                                                               placeholder="Zorunlu alan değildir" value="<?php echo isset($projedetay["data"][0]["Piece"]) ? $projedetay["data"][0]["Piece"] : $defaultdd["data"][0]["hydrophore_Piece"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_PipePressureLoss')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="PipePressureLoss" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["PipePressureLoss"]) ? $projedetay["data"][0]["PipePressureLoss"] : $defaultdd["data"][0]["hydrophore_PipePressureLoss"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_OtherLosses')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="OtherLosses" class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["OtherLosses"]) ? $projedetay["data"][0]["OtherLosses"] : $defaultdd["data"][0]["hydrophore_OtherLosses"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Hydrophore_UsingConcurrentFactor')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="text" name="UsingConcurrentFactor" class="form-control form-control-round"
                                                                               placeholder="Zorunlu alan değildir" value="<?php echo isset($projedetay["data"][0]["UsingConcurrentFactor"]) ? $projedetay["data"][0]["UsingConcurrentFactor"] :  $defaultdd["data"][0]["hydrophore_UsingConcurrentFactor"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Marka')?> :</label>
                                   <div class="col-sm-4">
                                           <select class="js-example-tags col-sm-12" id="marka" onchange="MarkaChange(this.value)" multiple="multiple" name="brand[]">
                                               <option value="hepsi">Hepsi</option>
                                               @if (!empty($projedetay["HydrophoreBrand"]["data"]))                                                
                                               @foreach($projedetay["HydrophoreBrand"]["data"] as $row)
       
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
                    @if (session()->has('hydrophorehesap'))
                          <div class="col-md-12">
                                         @if (isset(session('hydrophorehesap')[0]["data"]["id"]))
                                         <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('hydrophorehesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('hydrophorehesap')[0]["data"]["adi"] !!} </b>  </h4>
                                         <br>
                                         <br>
                                         
                                         <form action="{{route('admin.hydrophorehesapkaydet',["update"=>1,"id"=>isset(session('hydrophorehesap')[0]["data"]["id"]) ? session('hydrophorehesap')[0]["data"]["id"] : null ] )}}" method="post">
                                    
                                         @else
                                         <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                         <br>
                                         <br>
                                         <form action="{{route('admin.hydrophorehesapkaydet')}}" method="post">
                                    
                                         @endif                         
                               @csrf                         
                                    <div class="card-block">
                                         <div class="row">
                                         <div class="col-md-6">
                                             <div class="form-group row">
                                                  <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                                  <div class="col-sm-6 col-form-label">
                                                       <p>{!! session('hydrophorehesap')[0]["data"]["adi"] !!}</p>
                                                  </div>
                                             </div>
                                             <div class="form-group row">
                                                  <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                                  <div class="col-sm-6 col-form-label">
                                                       <p>{!! session('hydrophorehesap')[0]["data"]["aciklama"] !!}</p>
                                                  </div>
                                             </div>
                                                   <div class="form-group row">
                                                        <label class="col-sm-6"><b><?=__('staticmessage.Hydrophore_BuildType')?>:</b></label>
                                                        <div class="col-sm-6 col-form-label">
                                                             <p>{!! session('hydrophorehesap')[0]["data"]["BuildType"] !!}</p>
                                                        </div>
                                                   </div>
                                                   <div class="form-group row">
                                                        <label class="col-sm-6"><b><?=__('staticmessage.Hydrophore_NumberOfPeople')?>:</b></label>
                                                        <div class="col-sm-6 col-form-label">
                                                             <p>{!! session('hydrophorehesap')[0]["data"]["NumberOfPeople"] !!}</p>
                                                             </div>
                                                   </div>
                                                   <div class="form-group row">
                                                        <label class="col-sm-6">
                                                             <b><?=__('staticmessage.Hydrophore_StoredTime')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                             <p>{!! session('hydrophorehesap')[0]["data"]["StoredTime"] !!}</p>
                                                        </div>
                                                   </div>
                                                   <div class="form-group row">
                                                        <label class="col-sm-6">
                                                             <b><?=__('staticmessage.Piece')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                             <p>{!! session('hydrophorehesap')[0]["data"]["Piece"] !!}</p>
                                                        </div>
                                                   </div>
                                                   <div class="form-group row">
                                                        <label class="col-sm-6">
                                                             <b><?=__('staticmessage.Hydrophore_PipePressureLoss')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                             <p>{!! session('hydrophorehesap')[0]["data"]["PipePressureLoss"] !!}</p>
                                                        </div>
                                                   </div>


                                                   <ul class="basic-list list-icons">
                                                       <div class="form-group row">
                                                            <label class="col-sm-6">
                                                                 <b><?=__('staticmessage.Hydrophore_OtherLosses')?>:</b>
                                                            </label>
                                                            <div class="col-sm-6">
                                                                 <p>{!! session('hydrophorehesap')[0]["data"]["OtherLosses"] !!}</p>
                                                            </div>
                                                       </div>
                                                       <div class="form-group row">
                                                            <label class="col-sm-6">
                                                                 <b><?=__('staticmessage.Hydrophore_UsingConcurrentFactor')?>:</b>
                                                            </label>
                                                            <div class="col-sm-6">
                                                                 <p>{!! session('hydrophorehesap')[0]["data"]["UsingConcurrentFactor"] !!}</p>
                                                            </div>
                                                       </div>
                                                       <div class="form-group row">
                                                            <label class="col-sm-6">
                                                                 <b><?=__('staticmessage.Hydrophore_HydrophoreFactor')?>:</b>
                                                            </label>
                                                            <div class="col-sm-6">
                                                                 <p>{!! session('hydrophorehesap')[0]["data"]["HydrophoreFactor"] !!}</p>
                                                            </div>
                                                       </div>
                                                       <div class="form-group row">
                                                            <label class="col-sm-6">
                                                                 <b><?=__('staticmessage.Hydrophore_DailyWaterConsumption')?>:</b>
                                                            </label>
                                                            <div class="col-sm-6">
                                                                 <p>{!! session('hydrophorehesap')[0]["data"]["DailyWaterConsumption"] !!}</p>
                                                            </div>
                                                       </div>
                                                       <div class="form-group row">
                                                            <label class="col-sm-6">
                                                                 <b><?=__('staticmessage.Hydrophore_SuddenNeed')?>:</b>
                                                            </label>
                                                            <div class="col-sm-6">
                                                                 <p>{!! session('hydrophorehesap')[0]["data"]["SuddenNeed"] !!}</p>
                                                            </div>
                                                       </div>
                                                       <div class="form-group row">
                                                            <label class="col-sm-6">
                                                                 <b><?=__('staticmessage.Hydrophore_TankVolume')?>:</b>
                                                            </label>
                                                            <div class="col-sm-6">
                                                                 <p>{!! session('hydrophorehesap')[0]["data"]["TankVolume"] !!}</p>
                                                            </div>
                                                       </div>
                                                       <div class="form-group row">
                                                            <label class="col-sm-6">
                                                                 <b><?=__('staticmessage.Hydrophore_HydrophoreFlow')?>:</b>
                                                            </label>
                                                            <div class="col-sm-6">
                                                                 <p>{!! session('hydrophorehesap')[0]["data"]["HydrophoreFlow"] !!}</p>
                                                            </div>
                                                       </div>
                                                       <div class="form-group row">
                                                            <label class="col-sm-6">
                                                                 <b><?=__('staticmessage.Hydrophore_TotalLoss')?>:</b>
                                                            </label>
                                                            <div class="col-sm-6">
                                                                 <p>{!! session('hydrophorehesap')[0]["data"]["TotalLoss"] !!}</p>
                                                            </div>
                                                       </div>

                                                       <ul class="basic-list list-icons">
                                                            @if(!empty(session('hydrophorehesap')[0]["data"]["Product"]))
              
                                                              @foreach(session('hydrophorehesap')[0]["data"]["Product"] as  $key => $row )
              
                                                                  <li>
                                                                      <div class="row">
                                                                          <div class="col-md-2">
                                                                              <div class="radio radio-inline">
                                                                                  <label>
                                                                                      <input type="radio" name="hydrophore" value="{{$row[0]["id"]}}">
                                                                                      <img src="{{asset('banner1.png')}}" height="50" width="50" alt="">
                                                                                  </label>
                                                                              </div>
                                                                              
                                                                          </div>
                                                                          <div class="col-md-6">
                                                                              <h6 style="font-weight: bold;">{{$row[0]["markasi"]}}</h6>
                                                                              <p>{{$row[0]["tipi"]}}  </p>
                                                                              <p>
                                                                          </p>
                                                                           <ul>
                                                                        <li style="display: inline"><a target="blank" href="{{asset($row[0]["katalog"])}}">
                                                                            <img src="{{asset('pdf0.png')}}" width="30" height="30" alt="">
                                                                            </a></li>
                                                                        <li style="display: inline"><img src="{{asset('uretici2.png')}}" onclick="detaygoster({{$key}});return false;" width="50" height="50" alt="" id="satisdetay{{$key}}">
                                                                        </li>
                                                                        <li style="display: inline"><img src="{{asset('satici.jpg')}}" onclick="detaygoster1({{$key}});return false;" width="50" height="50" alt="" id="satisdetay1{{$key}}">
                                                                        </li>
                                                                        </ul>
              
                                                                          @if(!empty($row[0]))
                                                                               
                                                                             
                                                                              <div id="boyler{{$key}}" style="display: none;margin-left:-20px;">
                                                                                <div class="col-lg-12 col-xl-12">
                                                                                    <div class="card-sub">
                                                                                    
                                                                                    <div class="card-block" style=" padding:25px;">
                                                                                        <h6 style="font-weight: bold"><?=__('staticmessage.Producer')?></h6>
                                                                                  
                                                                                        @if(!empty($row[0]["Urun_tipi"]))
                                                                                            <p><?=__('staticmessage.Hydrophore_Urun_tipi')?>  : {{$row[0]["Urun_tipi"]}}</p>
                                                                                        @endif
                                                                                        @if(!empty($row[0]["U_Uretici"]))
                                                                                            <p><?=__('staticmessage.Hydrophore_U_Uretici')?>  : {{$row[0]["U_Uretici"]}}</p>
                                                                                        @endif
                                                                                        @if(!empty($row[0]["U_adres1"]))
                                                                                        <p><?=__('staticmessage.Hydrophore_U_adres1')?>  : {{$row[0]["U_adres1"]}}</p>
                                                                                        @endif
                                                                                        @if(!empty($row[0]["U_adres2"]))
                                                                                        <p><?=__('staticmessage.Hydrophore_U_adres2')?>  : {{$row[0]["U_adres2"]}}</p>
                                                                                        @endif
                                                                                        @if(!empty($row[0]["U_adres2"]))
                                                                                        <p><?=__('staticmessage.Hydrophore_U_semt')?>  : {{$row[0]["U_semt"]}}</p>
                                                                                        @endif
                                                                                        @if(!empty($row[0]["U_sehir"]))
                                                                                        <p><?=__('staticmessage.Hydrophore_U_sehir')?>  : {{$row[0]["U_sehir"]}}</p>
                                                                                        @endif
                                                                                        @if(!empty($row[0]["U_ulke"]))
                                                                                        <p><?=__('staticmessage.Hydrophore_U_ulke')?>  : {{$row[0]["U_ulke"]}}</p>
                                                                                        @endif
                                                                                        @if(!empty($row[0]["U_posta_kodu"]))
                                                                                        <p><?=__('staticmessage.Hydrophore_U_posta_kodu')?>  : {{$row[0]["U_posta_kodu"]}}</p>
                                                                                        @endif
                                                                                        @if(!empty($row[0]["U_telefon"]))
                                                                                        <p><?=__('staticmessage.Hydrophore_U_telefon')?>  : {{$row[0]["U_telefon"]}}</p>
                                                                                        @endif
                                                                                        @if(!empty($row[0]["U_faks"]))
                                                                                        <p><?=__('staticmessage.Hydrophore_U_faks')?>  : {{$row[0]["U_faks"]}}</p>
                                                                                        @endif
                                                                                        @if(!empty($row[0]["U_Kodu"]))
                                                                                        <p><?=__('staticmessage.Hydrophore_U_Kodu')?>  : {{$row[0]["U_Kodu"]}}</p>
                                                                                        @endif
                                                                                     </div>
                                                                                    </div>
                                                                                    </div>
                                                                                  
                                                                                  
                                                                                   
                                                                              <br>
                                                                              <br>
                                                                            
                                                                              </div>
                                                                              <div id="boyler1{{$key}}" style="display: none;margin-left:-20px;">
                                                                                <div class="col-lg-12 col-xl-12">
                                                                                    <div class="card-sub">
                                                                                    <div class="card-block" style=" padding:25px;">
                                                                                        <h6 style="font-weight: bold">Satıcı</h6>
                                                                                        @if(!empty($row[0]["S_Satici"]))
                                                                                        <p><?=__('staticmessage.Hydrophore_S_Satici')?>  : {{$row[0]["S_Satici"]}}</p>
                                                                                    @endif
                                                                                    @if(!empty($row[0]["S_Satici"]))
                                                                                        <p><?=__('staticmessage.Hydrophore_S_adres1')?>  : {{$row[0]["S_adres1"]}}</p>
                                                                                    @endif
                                                                                    @if(!empty($row[0]["S_adres2"]))
                                                                                    <p><?=__('staticmessage.Hydrophore_S_adres2')?>  : {{$row[0]["S_adres2"]}}</p>
                                                                                     @endif
                                                                                     @if(!empty($row[0]["S_adres2"]))
                                                                                     <p><?=__('staticmessage.Hydrophore_S_semt')?>  : {{$row[0]["S_semt"]}}</p>
                                                                                    @endif
                                                                                    @if(!empty($row[0]["S_adres2"]))
                                                                                    <p><?=__('staticmessage.Hydrophore_S_sehir')?>  : {{$row[0]["S_sehir"]}}</p>
                                                                                    @endif
                                                                                    @if(!empty($row[0]["S_adres2"]))
                                                                                    <p><?=__('staticmessage.Hydrophore_S_ulke')?>  : {{$row[0]["S_ulke"]}}</p>
                                                                                    @endif
                                                                                    @if(!empty($row[0]["S_adres2"]))
                                                                                    <p><?=__('staticmessage.Hydrophore_S_posta_kodu')?>  : {{$row[0]["S_posta_kodu"]}}</p>
                                                                                    @endif
                                                                                    @if(!empty($row[0]["S_adres2"]))
                                                                                    <p><?=__('staticmessage.Hydrophore_S_telefon')?>  : {{$row[0]["S_telefon"]}}</p>
                                                                                    @endif
                                                                                    @if(!empty($row[0]["S_adres2"]))
                                                                                    <p><?=__('staticmessage.Hydrophore_S_faks')?>  : {{$row[0]["S_faks"]}}</p>
                                                                                    @endif
                                                                                    @if(!empty($row[0]["S_adres2"]))
                                                                                    <p><?=__('staticmessage.Hydrophore_U_Kodu')?>  : {{$row[0]["U_Kodu"]}}</p>
                                                                                    @endif
                                                                                     </div>
                                                                                    </div>
                                                                                    </div>


                                                                              
                                                                            
                                                                            
                                                                              </div>
                                                                          @endif


                                                                           
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
                                                               @if (isset(session('hydrophorehesap')[0]["data"]["edit"]) && session('hydrophorehesap')[0]["data"]["edit"]==1)
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
    	
    }</script>
@endsection
