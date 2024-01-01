@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>  / <?=__('staticmessage.Siginak')?>  </h5>
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
                         <form action="{{route('admin.shelterventilationhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["shelterventilation_id"])) ? null : $projedetay["data"]["shelterventilation_id"] ])}}" method="post">
                            
                              @csrf
                              <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                                   <div class="col-sm-4">
                                       <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["adi"] :""?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                                   <div class="col-sm-4">
                                       <textarea rows="5" cols="5" class="form-control" placeholder="Lütfen bir açıklama yazınız" id="aciklama" name="aciklama"><?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["aciklama"] :""?></textarea>
                                      
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Shelterventilation_CalculationType')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="CalculationType" id="CalculationType" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][19]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["CalculationType"]) && $projedetay["data"][0]["CalculationType"]==$row['Code'])
                                             <option value="{{$row["Code"]}}" selected>{{$row["Type"]}}</option>
                                            @else
                                         @if ($defaultdd["data"][0]["shelter_CalculationType"]==$row['Code'])
                                             <option value="{{$row['Code']}}" selected>{{$row['Type']}}</option>
                                         @else
                                             <option value="{{$row['Code']}}">{{$row['Type']}}</option>  
                                         @endif
                                     
                                         @endif

                                             @endforeach
                                         </select>
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Shelterventilation_NeedFreshAir')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="NeedFreshAir" id="NeedFreshAir" class="form-control form-control-primary">
                                             <option selected>Lütfen seçim yapınız</option>
                                             @foreach ($res_data["data"][23]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["NeedFreshAir"]) && $projedetay["data"][0]["NeedFreshAir"]==$row["Flow"])
                                                <option value="{{$row["Flow"]}}" selected>{{$row["DangerFilter0"]}}</option>
                                                @else
                                                @if ($defaultdd["data"][0]["shelter_NeedFreshAir"]==$row["Flow"])
                                                    <option value="{{$row['Flow']}}" selected>{{$row["DangerFilter0"]}}</option>
                                                @else
                                                    <option value="{{$row['Flow']}}">{{$row["DangerFilter0"]}}</option>  
                                                @endif
                                            
                                                @endif

                                             @endforeach
                                         </select>
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Shelterventilation_ShelterArea')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="text" name="ShelterArea" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["ShelterArea"]) ? $projedetay["data"][0]["ShelterArea"] : $defaultdd["data"][0]["shelter_ShelterArea"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">    
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Shelterventilation_ShelterHeight')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="text" name="ShelterHeight" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo  isset($projedetay["data"][0]["ShelterHeight"]) ? $projedetay["data"][0]["ShelterHeight"] : $defaultdd["data"][0]["shelter_ShelterHeight"] ?>">
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

                     @if (session()->has('shelterventilationhesap'))
                         <div class="col-md-12">
                              @if (isset(session('shelterventilationhesap')[0]["data"]["id"]))
                              <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('shelterventilationhesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('shelterventilationhesap')[0]["data"]["adi"] !!} </b>  </h4>
                              <br>
                              <br>
                              <form action="{{route('admin.shelterventilationhesapkaydet',["update"=>1,"id"=>isset(session('shelterventilationhesap')[0]["data"]["id"]) ? session('shelterventilationhesap')[0]["data"]["id"] : null ] )}}" method="post">
                              @else
                              <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                              <br>
                              <br>
                              <form action="{{route('admin.shelterventilationhesapkaydet')}}" method="post">
                             
                              @endif
                            
                              
                                  @csrf
                                  <div class="card-block">
                                   <div class="row">
                                       <div class="col-md-6">
                                        <div class="form-group row">
                                             <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                             <div class="col-sm-6 col-form-label">
                                                 <p>{!! session('shelterventilationhesap')[0]["data"]["adi"]!!}</p>
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label class="col-sm-6">
                                                 <b><?=__('staticmessage.Description')?>:</b>
                                             </label>
                                             <div class="col-sm-6">
                                                 <p>{!! session('shelterventilationhesap')[0]["data"]["aciklama"] !!}</p>
                                             </div>
                                         </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6"><b><?=__('staticmessage.Shelterventilation_CalculationType')?>:</b></label>
                                               <div class="col-sm-6 col-form-label">
                                                   <p>{!! session('shelterventilationhesap')[0]["data"]["CalculationType"]==0 ? "Doğal" : "Mekanik" !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Shelterventilation_NeedFreshAir')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('shelterventilationhesap')[0]["data"]["NeedFreshAir"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Shelterventilation_ShelterArea')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('shelterventilationhesap')[0]["data"]["ShelterArea"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Shelterventilation_ShelterHeight')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('shelterventilationhesap')[0]["data"]["ShelterHeight"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Shelterventilation_SandFilterAirFlow')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('shelterventilationhesap')[0]["data"]["SandFilterAirFlow"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Shelterventilation_SandFilterAirSpeed')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('shelterventilationhesap')[0]["data"]["SandFilterAirSpeed"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Shelterventilation_SandFilterHeight')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('shelterventilationhesap')[0]["data"]["SandFilterHeight"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Shelterventilation_SandFilterPermeabilityRate')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('shelterventilationhesap')[0]["data"]["SandFilterPermeabilityRate"] !!}</p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Shelterventilation_Filtration')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('shelterventilationhesap')[0]["data"]["Filtration"] !!}</p> <br>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Shelterventilation_NumberOfPeople')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('shelterventilationhesap')[0]["data"]["NumberOfPeople"] !!}</p> <br>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Shelterventilation_TotalFlow')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('shelterventilationhesap')[0]["data"]["TotalFlow"] !!}</p> <br>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Shelterventilation_SandFilterPool')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('shelterventilationhesap')[0]["data"]["SandFilterPool"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Shelterventilation_SandPoolDiffuserCalc')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! bcdiv( session('shelterventilationhesap')[0]["data"]["SandPoolDiffuserCalc"],1,4) !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Shelterventilation_SmokeEvacuation')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('shelterventilationhesap')[0]["data"]["SmokeEvacuation"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                           <label class="col-sm-6">
                                           </label>
                                           <div class="col-sm-6">
                                               @if (isset(session('shelterventilationhesap')[0]["data"]["edit"]) && session('shelterventilationhesap')[0]["data"]["edit"]==1)
                                               <input type="submit"  value="<?=__('staticmessage.Güncelle')?>" class="btn btn-warning btn-round waves-effect waves-light"></input>
                                               @else
                                               <input type="submit"  value="<?=__('staticmessage.Kaydet')?>" class="btn btn-info btn-round waves-effect waves-light"></input>
                                               @endif
                                               
                                           </div>
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                           <ul class="basic-list list-icons">

                                               


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
</div>                       
@endsection