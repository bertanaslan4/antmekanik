@extends('layout.default')
@section('content')
<div class="page-header card" >
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-box bg-c-blue"></i>
                <div class="d-inline">
                    <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.KazanHesabiFuelAmount')?>  </h5>
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
                        <form action="{{route('admin.fuelamounthesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["fuelamount_id"])) ? null : $projedetay["data"]["fuelamount_id"] ])}}" method="post">
                            @csrf
                        <!--Form alani-->
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                            <div class="col-sm-4">
                                <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]["adi"]) ? $projedetay["data"][0]["adi"] :'';?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                            <div class="col-sm-4">
                                <input class="form-control form-control-round"  type="text" id="aciklama" name="aciklama" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]["adi"]) ? $projedetay["data"][0]["aciklama"] :'';?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?> :</label>
                            <div class="col-sm-4">
                                <input type="number" name="BoilerCapacityKazan" class="form-control form-control-round"
                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["BoilerCapacity"]) ? $projedetay["data"][0]["BoilerCapacity"] : null?>"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_BoilerEffiency')?>:</label>
                            <div class="col-sm-4">
                                <input type="number" name="BoilerEfficiencyKazan"  class="form-control form-control-round"
                                placeholder="Boiler Efficiency" value="<?php echo isset($projedetay["data"][0]["BoilerEfficiency"]) ? $projedetay["data"][0]["BoilerEfficiency"] : $defaultdd["data"][0]["fuelamountyearly_BoilerEfficiency"]?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelType')?> :</label>
                            <div class="col-sm-4">
                                <select name="FuelTypeKazan" id="FuelTypeKazan" class="form-control form-control-primary">
                                    <option value="null">Lütfen seçim yapın</option>
                                    @foreach($res_data["data"][0]["Data"] as $row)
                                            
                                            @if (isset($projedetay["data"][0]["FuelType"]) && $projedetay["data"][0]["FuelType"]==$row["Code"])
                                                            <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                    @else
                                                        @if ($defaultdd["data"][0]["fuelamount_FuelType"]==$row["Code"])
                                                            <option value="{{$row['Code']}}" selected>{{$row['Description']}}</option>
                                                        @else
                                                            <option value="{{$row['Code']}}">{{$row['Description']}}</option>  
                                                        @endif
                                                    
                                            @endif
                                    
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.LiquitFuelType')?>:</label>
                            <div class="col-sm-4">
                                <select name="LiquitFuelTypeKazan" id="LiquitFuelTypeKazan" class="form-control form-control-primary">
                                    <option selected>Lütfen seçim yapın</option>
                                    @foreach($res_data["data"][3]["Data"] as $row)

                                    @if (isset($projedetay["data"][0]["LiquitFuelType"]) && $projedetay["data"][0]["LiquitFuelType"]==$row["Name"])
                                             <option value="{{$row["Name"]}}" selected>{{$row["Name"]}}</option>
                                     @else
                                                @if ($defaultdd["data"][0]["fuelamount_LiquitFuelType"]==$row["Name"])
                                                                        <option value="{{$row['Name']}}" selected>{{$row['Name']}}</option>
                                                @else
                                                    <option value="{{$row['Name']}}">{{$row['Name']}}</option>  
                                                @endif
                                                    
                                    @endif
                                   
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_FuelTemperature')?> :</label>
                            <div class="col-sm-4">
                                <input type="number"   name="fuelamount_FuelTemperature" class="form-control form-control-round"
                                placeholder="Lütfen paremetre yazınız" value="<?php echo isset($projedetay["data"][0]["FuelTemperature"]) ? $projedetay["data"][0]["FuelTemperature"] : $defaultdd["data"][0]["fuelamount_FuelTemperature"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_AvgFuelTemperature')?> :</label>
                            <div class="col-sm-4">
                                <input type="number"   name="fuelAmount_AvgFuelTemperature" class="form-control form-control-round"
                                placeholder="Lütfen paremetre yazınız" value="<?php echo isset($projedetay["data"][0]["AvgFuelTemperature"]) ? $projedetay["data"][0]["AvgFuelTemperature"] : $defaultdd["data"][0]["fuelAmount_AvgFuelTemperature"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_DailyWorkingTime')?> :</label>
                          <div class="col-sm-4">
                              <input type="number"   name="FuelAmount_DailyWorkingTime" class="form-control form-control-round"
                              placeholder="Lütfen paremetre yazınız" value="<?php echo isset($projedetay["data"][0]["DailyWorkingTime"]) ? $projedetay["data"][0]["DailyWorkingTime"]  : $defaultdd["data"][0]["fuelamount_DailyWorkingTime"] ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_YearlyWorkingTime')?> :</label>
                          <div class="col-sm-4">
                              <input type="number"   name="fuelamount_YearlyWorkingTime" class="form-control form-control-round"
                              placeholder="Lütfen paremetre yazınız" value="<?php echo isset($projedetay["data"][0]["YearlyWorkingTime"]) ? $projedetay["data"][0]["YearlyWorkingTime"]  : $defaultdd["data"][0]["fuelamount_YearlyWorkingTime"] ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_StoredDays')?> :</label>
                          <div class="col-sm-4">
                              <input type="number"   name="fuelamount_StoredDays" class="form-control form-control-round"
                              placeholder="Lütfen paremetre yazınız" value="<?php echo isset($projedetay["data"][0]["StoredDays"]) ? $projedetay["data"][0]["StoredDays"] : $defaultdd["data"][0]["fuelamount_StoredDays"] ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_LiquidOccupancyRate')?> :</label>
                          <div class="col-sm-4">
                              <input type="number"  name="fuelamount_LiquidOccupancyRate" class="form-control form-control-round"
                              placeholder="Lütfen paremetre yazınız" value="<?php echo isset($projedetay["data"][0]["LiquidOccupancyRate"]) ? $projedetay["data"][0]["LiquidOccupancyRate"] : $defaultdd["data"][0]["fuelamount_LiquidOccupancyRate"] ?>">
                          </div>
                      </div>
                      <div class="form-group row">
                          <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelAmount_SolidStackLoad')?> :</label>
                          <div class="col-sm-4">
                              <input type="number"  name="fuelamount_SolidStackLoad" class="form-control form-control-round"
                              placeholder="Lütfen paremetre yazınız" value="<?php echo isset($projedetay["data"][0]["SolidStackLoad"]) ? $projedetay["data"][0]["SolidStackLoad"] : $defaultdd["data"][0]["fuelamount_SolidStackLoad"] ?>">
                          </div>
                      </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                            <div class="col-sm-4">
                                <input type="number" name="piecekazan" class="form-control form-control-round"
                                placeholder="Lütfen Adet yazınız" value="<?php echo isset($projedetay["data"][0]["Piece"]) ? $projedetay["data"][0]["Piece"] : $defaultdd["data"][0]["fuelamount_Piece"] ?>">
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
                </div>
                @if ($projedetay["data"]["edit"]==0)
                    @if (session()->has('fuelamounthesap'))
                    <div class="col-md-6">
                                            
                            <img src="{{asset('/hesapresimler/05yakitmiktar.png')}}" height="350" width="350" alt="">
                        </div>
                                          <div class="col-md-12 col-lg-12">
                                            @if (isset(session('fuelamounthesap')[0]["data"]["id"]))
                                                    <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b> No: {!! session('fuelamounthesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('fuelamounthesap')[0]["data"]["adi"] !!} </b>  </h4>
                                                    <br>
                                                    <br>
                                                    <form action="{{route('admin.fuelamounthesapkaydet',["update"=>1,"id"=>isset(session('fuelamounthesap')[0]["data"]["id"]) ? session('fuelamounthesap')[0]["data"]["id"] : null ])}}" method="post">
                                                        
                                                    @else 
                                                        <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                                        <br>
                                                        <br>
                                                        <form action="{{route('admin.fuelamounthesapkaydet')}}" method="post">
                                                    @endif
                                                    @csrf
                                                <div class="card-block">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-6"><b><?=__('staticmessage.Name')?> :</b></label>
                                                                <div class="col-sm-6 col-form-label">
                                                                    <p>{!! session('fuelamounthesap')[0]["data"]["adi"] !!}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6"><b><?=__('staticmessage.Description')?> :</b></label>
                                                                <div class="col-sm-6 col-form-label">
                                                                    <p>{!! session('fuelamounthesap')[0]["data"]["aciklama"] !!}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6"><b><?=__('staticmessage.FuelType')?> :</b></label>
                                                                <div class="col-sm-6 col-form-label">
                                                                    @switch(session('fuelamounthesap')[0]["data"]["FuelType"])
                                                                    @case(0)
                                                                    <span>Katı</span>
                                                                    @break
                                                    
                                                                    @case(1)
                                                                    <span>Sıvı</span>
                                                                    @break
                                                    
                                                                    @default
                                                                    <span>Gaz</span>
                                                                    @endswitch
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6"><b><?=__('staticmessage.Piece')?> :</b></label>
                                                                <div class="col-sm-6 col-form-label">
                                                                    <p>{!! session('fuelamounthesap')[0]["data"]["Piece"] !!}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6"><b><?=__('staticmessage.Boiler_BoilerEffiency')?> :</b></label>
                                                                <div class="col-sm-6 col-form-label">
                                                                    <b>{!! session('fuelamounthesap')[0]["data"]["BoilerEfficiency"] !!}</b>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6">
                                                                    <b><?=__('staticmessage.Boiler_Capacity')?>:</b>
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <p>{!! session('fuelamounthesap')[0]["data"]["BoilerCapacity"] !!}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6">
                                                                    <b><?=__('staticmessage.LiquitFuelType')?>:</b>
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <p>{!! session('fuelamounthesap')[0]["data"]["LiquitFuelType"] !!}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6">
                                                                    <b><?=__('staticmessage.FuelAmount_AvgFuelTemperature')?>:</b>
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <p>{!! session('fuelamounthesap')[0]["data"]["AvgFuelTemperature"] !!}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6">
                                                                    <b><?=__('staticmessage.FuelAmount_FuelTemperature')?>:</b>
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <p>{!! session('fuelamounthesap')[0]["data"]["FuelTemperature"] !!}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6">
                                                                    <b><?=__('staticmessage.FuelAmount_DailyWorkingTime')?>:</b>
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <p>{!! session('fuelamounthesap')[0]["data"]["DailyWorkingTime"] !!}</p>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-6">
                                                                    <b><?=__('staticmessage.FuelAmount_YearlyWorkingTime')?>:</b>
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    <p>{!! session('fuelamounthesap')[0]["data"]["YearlyWorkingTime"] !!}</p>
                                                                </div>
                                                            </div>
                                                            <ul class="basic-list list-icons">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">
                                                                        <b><?=__('staticmessage.FuelAmount_StoredDays')?>:</b>
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <p>{!! session('fuelamounthesap')[0]["data"]["StoredDays"] !!}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">
                                                                        <b><?=__('staticmessage.FuelAmount_LiquidOccupancyRate')?>:</b>
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <p>{!! session('fuelamounthesap')[0]["data"]["LiquidOccupancyRate"] !!}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">
                                                                        <b><?=__('staticmessage.FuelAmount_SolidStackLoad')?>:</b>
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <p>{!! session('fuelamounthesap')[0]["data"]["SolidStackLoad"] !!}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">
                                                                        <b><?=__('staticmessage.FuelAmount_LowerHeatValue')?>:</b>
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <p>{!! session('fuelamounthesap')[0]["data"]["LowerHeatValue"] !!}</p>
                                                                    </div>
                                                                </div><div class="form-group row">
                                                                    <label class="col-sm-6">
                                                                        <b><?=__('staticmessage.FuelAmount_FuelAmount')?>:</b>
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <p>{!! bcdiv(session('fuelamounthesap')[0]["data"]["FuelAmount"],1,2)  !!}</p>
                                                                    </div>
                                                                </div><div class="form-group row">
                                                                    <label class="col-sm-6">
                                                                        <b><?=__('staticmessage.FuelAmount_FuelDensity')?>:</b>
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <p>{!! session('fuelamounthesap')[0]["data"]["FuelDensity"] !!}</p>
                                                                    </div>
                                                                </div><div class="form-group row">
                                                                    <label class="col-sm-6">
                                                                        <b><?=__('staticmessage.FuelAmount_LiquidTank')?>:</b>
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <p>{!! bcdiv(session('fuelamounthesap')[0]["data"]["LiquidTank"],1,3)  !!}</p>
                                                                    </div>
                                                                </div><div class="form-group row">
                                                                    <label class="col-sm-6">
                                                                        <b><?=__('staticmessage.FuelAmount_SolidFuelSurface')?>:</b>
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <p>{!! bcdiv(session('fuelamounthesap')[0]["data"]["SolidFuelSurface"],1,3)  !!}</p>
                                                                    </div>
                                                                </div><div class="form-group row">
                                                                    <label class="col-sm-6">
                                                                        <b><?=__('staticmessage.FuelAmount_PreheaterLoad')?>:</b>
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <p>{!! bcdiv(session('fuelamounthesap')[0]["data"]["PreheaterLoad"],1,2) !!}</p>
                                                                    </div>
                                                                </div>
                                                            </ul>
                                                             
                                                            <div class="form-group row">
                                                                <label class="col-sm-6">
                                                                </label>
                                                                <div class="col-sm-6">
                                                                    @if (isset(session('fuelamounthesap')[0]["data"]["edit"]) && session('fuelamounthesap')[0]["data"]["edit"]==1)
                                                                    <input type="submit"  value="<?=__('staticmessage.Güncelle')?>" class="btn btn-warning btn-round waves-effect waves-light"></input>
                                                                    @else
                                                                    <input type="submit"  value="<?=__('staticmessage.Kaydet')?>" class="btn btn-info btn-round waves-effect waves-light"></input>
                                                                    @endif
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                          
                                                        </div>
                                                    </div>

                                                </div>
                                                </form>
                                          </div>
                                        </div>
                                    </div>
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
@endsection
@section("footerExtra")
    <script type="text/javascript">
    
    function showmodal(projeid)
    {
        //.usermodaldetail modal divin classı
        var id = projeid;
        $.ajax({
            url : '{{ route("admin.fuelamoundetail") }}',
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