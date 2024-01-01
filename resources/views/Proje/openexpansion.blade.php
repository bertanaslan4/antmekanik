@extends('layout.default')
@section('content')
<div class="page-header card" >
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-box bg-c-blue"></i>
                <div class="d-inline">
                    <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Acikgenlesme')?> </h5>
                    <h6>{{$projedetay["data"]["proje_id"]}}-{{$projedetay["data"]["proje_adi"]}}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4">

        </div>
    </div>
</div>
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{route('admin.openexpansionhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["openexpansiontank_id"])) ? null : $projedetay["data"]["openexpansiontank_id"] ])}}" method="post">
                            @csrf
                        <!--Form alani-->
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?>:</label>
                            <div class="col-sm-4">
                                <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["adi"] :""?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?>:</label>
                            <div class="col-sm-4">
                                <input class="form-control form-control-round"  type="text" id="aciklama" name="aciklama" placeholder="Lütfen projeye açıklama yazınız" value="<?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["aciklama"] :""?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?>:</label>
                            <div class="col-sm-4">
                                <input type="number" name="BoilerCapacityKazan" value="<?php echo isset($projedetay["data"][0]["BoilerCapacity"]) ? $projedetay["data"][0]["BoilerCapacity"] : $defaultdd["data"][0]["openexpansion_BoilerCapacity"] ?>" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.OpenExpansionTank_HeaterType')?> :</label>
                            <div class="col-sm-4">
                                <select name="HeaterType" id="HeaterType" class="form-control form-control-primary">
                                    <option selected>Lütfen seçim yapın</option>
                                    @foreach($headertype["data"] as $row)
                                    @if (isset($projedetay["data"][0]["HeaterType"]) && $projedetay["data"][0]["HeaterType"]==$row['name'])
                                        <option value="{{$row["name"]}}" selected>{{$row["name"]}}</option>
                                    @else
                                    @if ($defaultdd["data"][0]["openexpansion_HeaterType"]==$row['name'])
                                        <option value="{{$row['name']}}" selected>{{$row["name"]}}</option>
                                    @else
                                        <option value="{{$row['name']}}">{{$row["name"]}}</option>
                                    @endif

                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.OpenExpansionTank_WaterHeat')?> :</label>
                            <div class="col-sm-4">
                                <input type="number" name="waterexpansion" value="<?php echo isset($projedetay["data"][0]["WaterHeat"]) ? $projedetay["data"][0]["WaterHeat"] : $defaultdd["data"][0]["openexpansion_WaterHeat"] ?>" class="form-control form-control-round"
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
                        @if (session()->has('openexpansiontankhesap'))
                        <div class="col-md-6">

                            <img src="{{asset('/hesapresimler/07genacik.png')}}" height="350" width="350" alt="">
                        </div>
                            <div class="col-md-12 col-lg-12">
                                @if (isset(session('openexpansiontankhesap')[0]["data"]["id"]))
                                <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('openexpansiontankhesap')[0]["data"]["id"] !!} </b> <br> <b> Project: {!! session('openexpansiontankhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                <br>
                                <br>

                                <form action="{{route('admin.openexpansionhesapkaydet',["update"=>1,"id"=>isset(session('openexpansiontankhesap')[0]["data"]["id"]) ? session('openexpansiontankhesap')[0]["data"]["id"] : null ] )}}" method="post">

                                @else
                                <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                <br>
                                <br>
                                <form action="{{route('admin.openexpansionhesapkaydet')}}" method="post">

                                @endif


                                    @csrf
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('openexpansiontankhesap')[0]["data"]["adi"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('openexpansiontankhesap')[0]["data"]["aciklama"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.OpenExpansionTank_HeaterType')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('openexpansiontankhesap')[0]["data"]["HeaterType"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6"><b><?=__('staticmessage.OpenExpansionTank_WaterHeat')?>:</b></label>
                                                    <div class="col-sm-6 col-form-label">
                                                        <p>{!! session('openexpansiontankhesap')[0]["data"]["WaterHeat"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Boiler_Capacity')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('openexpansiontankhesap')[0]["data"]["BoilerCapacity"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.OpenExpansionTank_Expansion')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('openexpansiontankhesap')[0]["data"]["Expansion"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.OpenExpansionTank_WaterExpansion')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('openexpansiontankhesap')[0]["data"]["WaterExpansion"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.OpenExpansionTank_WaterVolume')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('openexpansiontankhesap')[0]["data"]["WaterVolume"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.OpenExpansionTank_TankVolume')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('openexpansiontankhesap')[0]["data"]["TankVolume"] !!}</p>
                                                    </div>
                                                </div>
                                                <ul class="basic-list list-icons">
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.OpenExpansionTank_DiameterG')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('openexpansiontankhesap')[0]["data"]["DiameterdnG"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.OpenExpansionTank_DiameterD')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('openexpansiontankhesap')[0]["data"]["DiameterdnD"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.OpenExpansionTank_DiameterH')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('openexpansiontankhesap')[0]["data"]["DiameterdnH"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.OpenExpansionTank_DiameterInchG')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('openexpansiontankhesap')[0]["data"]["DiameterInchG"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.OpenExpansionTank_DiameterInchD')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('openexpansiontankhesap')[0]["data"]["DiameterInchD"] !!}</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-6">
                                                            <b><?=__('staticmessage.OpenExpansionTank_DiameterInchH')?>:</b>
                                                        </label>
                                                        <div class="col-sm-6">
                                                            <p>{!! session('openexpansiontankhesap')[0]["data"]["DiameterInchH"] !!}</p>
                                                        </div>
                                                    </div>
                                                </ul>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                    </label>
                                                    <div class="col-sm-6">
                                                        @if (isset(session('openexpansiontankhesap')[0]["data"]["edit"]) && session('openexpansiontankhesap')[0]["data"]["edit"]==1)
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
@endsection
@section("footerExtra")
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
    function showmodal(projeid)
    {
        //.usermodaldetail modal divin classı
        var id = projeid;
        $.ajax({
            url : '{{ route("admin.openexpansiondetail") }}',
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
