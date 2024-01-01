@extends('layout.default')
@section('content')

  <div class="page-header card" >
          <div class="row align-items-end">
              <div class="col-lg-4">
                    <div class="page-header-title">
                        <i class="feather icon-box bg-c-blue"></i>
                        <div class="d-inline">
                            <h5><?=__('staticmessage.Hesapislemleri')?>  / <?=__('staticmessage.Isıdegistirici')?> </h5>
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
                            <form action="{{route('admin.heatexchangerhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["heatexchanger_id"])) ? null : $projedetay["data"]["heatexchanger_id"] ])}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?>:</label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-round" type="text" placeholder="Lütfen projeye isim veriniz" id="adi" name="adi" value="<?php echo isset($projedetay[0]) ? $projedetay[0]["adi"] :"";?>" >
                                    </div>        
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?>:</label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-round" type="text" placeholder="Lütfen açıklama yazınız" id="aciklama" name="aciklama" value="<?php echo isset($projedetay[0]) ? $projedetay[0]["aciklama"] :"";?>">
                                    </div>        
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.HeatNeed')?>:</label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-round" type="number" id="HeatNeed" name="HeatNeed" placeholder="Lütfen paremetre yazınız" value="<?php echo isset($projedetay["data"][0]["HeatNeed"]) ? $projedetay["data"][0]["HeatNeed"] : $defaultdd["data"][0]["heatexchanger_HeatNeed"]?>">
                                    </div>        
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_totalpass')?>:</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="TotalPass" value="<?php echo isset($projedetay["data"][0]["TotalPass"]) ? $projedetay["data"][0]["TotalPass"] : $defaultdd["data"][0]["heatexchanger_TotalPass"] ?>" id="TotalPass" class="form-control form-control-round" placeholder="Lütfen paremetre yazınız">
                                    </div>        
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_heaterfluidavg')?>:</label>
                                    <div class="col-sm-4">
                                        <input type="number" value="<?php echo isset($projedetay["data"][0]["HeaterFluidAvg"]) ? $projedetay["data"][0]["HeaterFluidAvg"] : $defaultdd["data"][0]["heatexchanger_HeaterFluidAvg"] ?>" name="HeaterFluidAvg" class="form-control form-control-round"
                                                   placeholder="Lütfen paremetre yazınız">
                                    </div>        
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_pollutionfactor')?>:</label>
                                    <div class="col-md-4">
                                        <input type="number" name="PollutionFactor" value="<?php echo isset($projedetay["data"][0]["PollutionFactor"]) ? $projedetay["data"][0]["PollutionFactor"] :$defaultdd["data"][0]["heatexchanger_PollutionFactor"]?>" id="HeatNeed" class="form-control form-control-round" placeholder="Lütfen paremetre yazınız">

                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Marka')?> :</label>
                                    <div class="col-sm-4">
                                        <select name="Brand" id="Brand" class="form-control form-control-primary">
                                            <option value=null selected>Lütfen seçim yapın</option>
                                            @if (!empty($projedetay["HeatchangerBrand"]["data"]))                                                
                                        @foreach($projedetay["HeatchangerBrand"]["data"] as $row)
                                                <option value="{{$row["brand_code"]}}">{{$row["description"]}} / {{$row["brand_code"]}} / {{isset($row["he_type"]) ? $row["he_type"] : ""  }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?>:</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="Piece" value="<?php echo isset($projedetay["data"][0]["Piece"]) ? $projedetay["data"][0]["Piece"] : $defaultdd["data"][0]["heatexchanger_Piece"] ?>" class="form-control form-control-round"
                                                   placeholder="Lütfen paremetre yazınız">
                                    </div>        
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Yedek')?>:</label>
                                    <div class="col-sm-4">
                                        <input type="number" name="yedek" value="<?php echo isset($projedetay["data"][0]["yedek"]) ? $projedetay["data"][0]["yedek"] : $defaultdd["data"][0]["heatexchanger_yedek"] ?>" class="form-control form-control-round"
                                                   placeholder="Lütfen paremetre yazınız">
                                    </div>        
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.heatexchanger_heatedfluidavg')?>:</label>
                                    <div class="col-sm-4">
                                        <input type="number" value="<?php echo isset($projedetay["data"][0]["HeatedFluidAvg"]) ? $projedetay["data"][0]["HeatedFluidAvg"] : $defaultdd["data"][0]["heatexchanger_HeatedFluidAvg"] ?>"name="HeatedFluidAvg" class="form-control form-control-round"
                                                   placeholder="Lütfen paremetre yazınız">
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
                            @if (session()->has('heatexchangerhesap'))
                                <div class="col-md-12">
                                    @if (isset(session('heatexchangerhesap')[0]["data"]["id"]))
                                    <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('heatexchangerhesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('heatexchangerhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                    <br>
                                    <br>
                                    <form action="{{route('admin.heatexchangerhesapkaydet',["update"=>1,"id"=>isset(session('heatexchangerhesap')[0]["data"]["id"]) ? session('heatexchangerhesap')[0]["data"]["id"] : null ])}}" method="post">
                                        
                                    @else 
                                        <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                        <br>
                                        <br>
                                        <form action="{{route('admin.heatexchangerhesapkaydet')}}" method="post">
                                    @endif
                                        @csrf
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                                        <div class="col-sm-6 col-form-label">
                                                            <p>{!! session('heatexchangerhesap')[0]["data"]["adi"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                                        <div class="col-sm-6 col-form-label">
                                                            <p>{!! session('heatexchangerhesap')[0]["data"]["aciklama"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6"><b><?=__('staticmessage.HeatNeed')?>:</b></label>
                                                        <div class="col-sm-6 col-form-label">
                                                            <p>{!! session('heatexchangerhesap')[0]["data"]["HeatNeed"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6"><b><?=__('staticmessage.heatexchangerresult_totalpass')?>:</b></label>
                                                        <div class="col-sm-6 col-form-label">
                                                            <p>{!! session('heatexchangerhesap')[0]["data"]["TotalPass"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6"><b><?=__('staticmessage.Piece')?>:</b></label>
                                                        <div class="col-sm-6 col-form-label">
                                                            <b>{!! session('heatexchangerhesap')[0]["data"]["Piece"] !!}</b>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.heatexchangerresult_heaterfluidavg')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('heatexchangerhesap')[0]["data"]["HeaterFluidAvg"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.heatexchangerresult_heatedfluidavg')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('heatexchangerhesap')[0]["data"]["HeatedFluidAvg"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.heatexchangerresult_pollutionfactor')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('heatexchangerhesap')[0]["data"]["PollutionFactor"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.heatexchangerresult_logheatdiff')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! bcdiv(session('heatexchangerhesap')[0]["data"]["LogHeatDiff"],1,2)  !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.heatexchangerresult_heatsurface')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! bcdiv(session('heatexchangerhesap')[0]["data"]["HeatSurface"],1,3)  !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.heatexchangerresult_heatexchangercapacity')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('heatexchangerhesap')[0]["data"]["HeatExchangerCapacity"] !!}</p>
                                                        </div>
                                                    </div>

                                                    <ul class="basic-list list-icons">
                                                        @if(!empty(session('heatexchangerhesap')[0]["data"]["HeatExchangers"]))
                                                        @foreach(session('heatexchangerhesap')[0]["data"]["HeatExchangers"] as  $key => $row )

                                                        <li>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="radio radio-inline">
                                                                        <label>
                                                                            <input style="width: 20px;height: 20px;" type="radio" name="heatexchangers" value="{{$row["id"]}}">
                                                                            <img src="{{asset('banner1.png')}}" height="50" width="50" alt="">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h6 style="font-weight: bold;">{{$row["Name"]}}</h6>
                                                                    <p><?=__('staticmessage.Mark')?> : {{$row["Brand"]}}</p>
                                                                    <p><?=__('staticmessage.Type')?> : {{$row["Type"]}}</p>
                                                                    <p><?=__('staticmessage.heatexchangerresult_aciklama')?> : {{$row["Description"]}}</p>
                                                                    <p><?=__('staticmessage.heatexchangerresult_maxheatsurface')?> : {{$row["MaxHeatSurface"]}}</p>
                                                                    <p><?=__('staticmessage.Pdf')?> : <a href="{{asset($row["Catalog"])}}"><img src="{{asset('pdf.png')}}" width="40" height="40" alt=""></a></p>
                                                                    

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
                                                            @if (isset(session('heatexchangerhesap')[0]["data"]["edit"]) && session('heatexchangerhesap')[0]["data"]["edit"]==1)
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
    function showmodal(projeid)
    {
        //.usermodaldetail modal divin classı
        var id = projeid;
        $.ajax({
            url : '{{ route("admin.heatexchangerdetail") }}',
            type: 'POST',
            dataType:'html',
            data:{"projeid":id},
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success:function(data){
                console.log(data);
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
