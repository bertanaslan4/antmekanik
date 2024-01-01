@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Dolasimpompasi')?></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#!"><?=__('staticmessage.Anasayfa')?>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#!"><?=__('staticmessage.projedetaylari')?></a>
                        </li>
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
                        <div class="col-md-6">
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["circulationpump_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"circulationpump",'id'=>$projedetay["data"]['circulationpump_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.circulationpump',['circulationpumpid'=>$projedetay["data"]['circulationpump_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.circulationpumpproject.sil',$projedetay["data"]['circulationpump_id'])}}">
                              @csrf
                              <button style="width: 115px;" type="submit" class="btn btn-danger btn-round waves-effect waves-light"><?=__('staticmessage.Sil');?></button>
                             
                            </form>
                            </div>
                    </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card" id="v_1_2">
                        <div class="card-block">
                            <div class="prism-show-language"><div class="prism-show-language-label"><?=__('staticmessage.projedetaylari')?></div></div><pre class=" language-javascript"><code>
<?=__('staticmessage.Boiler_Capacity');?> :{{$projedetay["data"][0]["BoilerCapacity"]}}

<?=__('staticmessage.Circulationpump_TemperatureDiff');?> :{{$projedetay["data"][0]["TemperatureDiff"]}}

<?=__('staticmessage.Piece');?> :{{$projedetay["data"][0]["Piece"]}}

<?=__('staticmessage.Circulationpump_PressureDrop');?> :{{$projedetay["data"][0]["PressureDrop"]}}

<?=__('staticmessage.Circulationpump_PumpEfficiency');?> :{{$projedetay["data"][0]["PumpEfficiency"]}}

<?=__('staticmessage.Circulationpump_EngineEfficiency');?> :{{$projedetay["data"][0]["EngineEfficiency"]}}

<?=__('staticmessage.Circulationpump_SpecificHeat');?> :{{$projedetay["data"][0]["SpecificHeat"]}}

<?=__('staticmessage.Circulationpump_Density');?> :{{$projedetay["data"][0]["Density"]}}

<?=__('staticmessage.Circulationpump_PumpFlow');?> :{{ bcdiv($projedetay["data"][0]["PumpFlow"],1,2) }}

<?=__('staticmessage.Circulationpump_MotorPower');?> :{{ bcdiv($projedetay["data"][0]["MotorPower"],1,2) }}
<h4><?="Ürün:"?></h4>  

<?=__('staticmessage.Circulationpump_markasi');?> :{{$projedetay["data"][0]["markasi"]}}
<?=__('staticmessage.Circulationpump_standardi');?> :{{$projedetay["data"][0]["standardı"]}}
<?=__('staticmessage.Circulationpump_tipi');?> :{{$projedetay["data"][0]["tipi"]}}
<?=__('staticmessage.Circulationpump_devir_d/d');?> :{{$projedetay["data"][0]["devir_d/d"]}}
<?=__('staticmessage.Circulationpump_motor_gucu_KW');?> :{{$projedetay["data"][0]["motor_gucu_KW"]}}
<?=__('staticmessage.Circulationpump_agirligi_kg');?> :{{$projedetay["data"][0]["agirligi_kg"]}}
<?=__('staticmessage.Circulationpump_baglanti_ebadi');?> :{{$projedetay["data"][0]["baglanti_ebadi"]}}
<?=__('staticmessage.Circulationpump_u_kodu');?> :{{$projedetay["data"][0]["u_kodu"]}}




                        </code></pre>
                        </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
@endsection
@section("footerExtra")
    <script type="text/javascript">
    function update()
    {
        $('#updateform').toggle();
        
    }
        $('.example').DataTable({
            "pagingType": "full_numbers",
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Turkish.json',
            },
            responsive: true,
    });
    </script>
@endsection
