@extends('layout.default')
@section('content')
<div class="page-header card" >
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-box bg-c-blue"></i>
                <div class="d-inline">
                    <h5><?=__('staticmessage.Hesapislemleri')?>  / <?=__('staticmessage.Yagmursuyu')?>  </h5>
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
                        <form action="{{route('admin.rainwaterhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["rainwater_id"])) ? null : $projedetay["data"]["rainwater_id"] ])}}" method="post">
                            @csrf

                           
                        <!--Form alani-->
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?>:</label>
                            <div class="col-sm-4">
                                <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["adi"] : null ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                            <div class="col-sm-4">
                                <input class="form-control form-control-round"  type="text" id="aciklama" name="aciklama" placeholder="Lütfen açıklama yazınız" value="<?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["aciklama"] : null ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Rainwater_Location')?> :</label>
                            <div class="col-sm-4">
                                <select name="Location" id="Location" class="form-control form-control-primary">
                                    <option selected>Lütfen seçim yapın</option>
                                    @foreach($res_data["data"][7]["Data"] as $row)
                                    @if (isset($projedetay["data"][0]["Location"]) && $projedetay["data"][0]["Location"]==$row['Location'])
                                        <option value="{{$row["Location"]}}" selected>{{$row["Location"]}}</option>
                                    @else
                                    @if ($defaultdd["data"][0]["rainwater_Location"]==$row['Location'])
                                        <option value="{{$row['Location']}}" selected>{{$row["Location"]}}</option>
                                    @else
                                        <option value="{{$row['Location']}}">{{$row["Location"]}}</option>  
                                    @endif
                                
                                    @endif
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Rainwater_RoofType')?> :</label>
                            <div class="col-sm-4">
                                <select name="RoofType" id="RoofType" class="form-control form-control-primary">
                                    <option selected>Lütfen seçim yapın</option>
                                    @foreach($res_data["data"][8]["Data"] as $row)
                                    @if (isset($projedetay["data"][0]["RoofType"]) && $projedetay["data"][0]["RoofType"]==$row['RoofType'])
                                        <option value="{{$row["RoofType"]}}" selected>{{$row["RoofType"]}}</option>
                                    @else
                                    @if ($defaultdd["data"][0]["rainwater_RoofType"]==$row['RoofType'])
                                        <option value="{{$row['RoofType']}}" selected>{{$row["RoofType"]}}</option>
                                    @else
                                        <option value="{{$row['RoofType']}}">{{$row["RoofType"]}}</option>  
                                    @endif
                                
                                    @endif 
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Rainwater_RainArea')?>:</label>
                            <div class="col-sm-4">
                                <input type="number" name="RainArea" value="<?php echo isset($projedetay["data"][0]["RainArea"]) ? $projedetay["data"][0]["RainArea"] : $defaultdd["data"][0]["rainwater_RainArea"] ?>" class="form-control form-control-round"
                                                                                   placeholder="Lütfen değer yazınız">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Rainwater_RainPipe')?> :</label>
                            <div class="col-sm-4">
                                <input type="number" name="RainPipe" value="<?php echo isset($projedetay["data"][0]["RainPipe"]) ? $projedetay["data"][0]["RainPipe"] : $defaultdd["data"][0]["rainwater_RainPipe"] ?>" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız">
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
                        @if (session()->has('rainwaterhesap'))
                            <div class="col-md-12 col-lg-12">
                                @if (isset(session('rainwaterhesap')[0]["data"]["id"]))
                                <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('rainwaterhesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('rainwaterhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                <br>
                                <br>
                                
                                <form action="{{route('admin.rainwaterhesapkaydet',["update"=>1,"id"=>isset(session('rainwaterhesap')[0]["data"]["id"]) ? session('rainwaterhesap')[0]["data"]["id"] : null ] )}}" method="post">
                               
                                @else
                                <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                <br>
                                <br>
                                <form action="{{route('admin.rainwaterhesapkaydet')}}" method="post">
                               
                                @endif
                              
                                
                                    @csrf
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Rainwater_Location')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('rainwaterhesap')[0]["data"]["Location"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Rainwater_RainArea')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('rainwaterhesap')[0]["data"]["RainArea"] !!}</p>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Rainwater_RoofType')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('rainwaterhesap')[0]["data"]["RoofType"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Rainwater_RainPipe')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('rainwaterhesap')[0]["data"]["RainPipe"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Rainwater_RainAvg')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('rainwaterhesap')[0]["data"]["RainAvg"] !!}</p>
                                                    </div>
                                                </div>

                                                <ul class="basic-list list-icons">
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Name')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('rainwaterhesap')[0]["data"]["adi"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Description')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('rainwaterhesap')[0]["data"]["aciklama"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Rainwater_UnloadFactor')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('rainwaterhesap')[0]["data"]["UnloadFactor"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Rainwater_SuddenNeed')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('rainwaterhesap')[0]["data"]["SuddenNeed"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Rainwater_FlowSection')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('rainwaterhesap')[0]["data"]["FlowSection"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.Rainwater_ColumnDiameter')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('rainwaterhesap')[0]["data"]["ColumnDiameter"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                        </label>
                                                        <div class="col-sm-6">
                                                            @if (isset(session('rainwaterhesap')[0]["data"]["edit"]) && session('rainwaterhesap')[0]["data"]["edit"]==1)
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
    function showmodal(projeid)
    {
        //.usermodaldetail modal divin classı
        var id = projeid;
        $.ajax({
            url : '{{ route("admin.rainwaterdetail") }}',
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