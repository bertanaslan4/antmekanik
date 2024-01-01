@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Havuz')?> </h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["pool_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"pool",'id'=>$projedetay["data"]['pool_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.pool',['poolid'=>$projedetay["data"]['pool_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.poolproject.sil',$projedetay["data"]['pool_id'])}}">
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
<?=__('staticmessage.Pool_PoolVolume');?> :{{$projedetay["data"][0]["PoolVolume"]}}

<?=__('staticmessage.Pool_PoolArea');?> :{{$projedetay["data"][0]["PoolArea"]}}

<?=__('staticmessage.Pool_NumberOfUser');?> :{{$projedetay["data"][0]["NumberOfUser"]}}

<?=__('staticmessage.Pool_CirculationPeriod');?> :{{$projedetay["data"][0]["CirculationPeriod"]}}

<?=__('staticmessage.Pool_LightingIntensity');?> :{{$projedetay["data"][0]["LightingIntensity"]}}

<?=__('staticmessage.Pool_SuctionStrainerArea');?> :{{$projedetay["data"][0]["SuctionStrainerArea"]}}

<?=__('staticmessage.Pool_FeedWaterSpeed');?> :{{$projedetay["data"][0]["FeedWaterSpeed"]}}

<?=__('staticmessage.Pool_SuctionCollector');?> :{{ bcdiv($projedetay["data"][0]["SuctionCollector"],1,2)}}

<?=__('staticmessage.Pool_FeedPipeDiameter');?> :{{ $projedetay["data"][0]["FeedPipeDiameter"]}}

<?=__('staticmessage.Pool_SuctionPipeDiameter');?> :{{$projedetay["data"][0]["SuctionPipeDiameter"]}}

<?=__('staticmessage.Pool_SuctionCollectorDiameter');?> :{{$projedetay["data"][0]["SuctionCollectorDiameter"]}}

<?=__('staticmessage.Pool_TankDailyReinforcement');?> :{{$projedetay["data"][0]["TankDailyReinforcement"]}}

<?=__('staticmessage.Pool_NumberOfLightingLamp');?> :{{$projedetay["data"][0]["NumberOfLightingLamp"]}}

<?=__('staticmessage.Pool_SuctionWaterSpeed');?> :{{$projedetay["data"][0]["SuctionWaterSpeed"]}}

<?=__('staticmessage.Pool_SuctionCollectorSpeed');?> :{{$projedetay["data"][0]["SuctionCollectorSpeed"]}}

<?=__('staticmessage.Pool_ReinforcementPerPerson');?> :{{$projedetay["data"][0]["ReinforcementPerPerson"]}}

<?=__('staticmessage.Pool_LightingLampIntensity');?> :{{$projedetay["data"][0]["LightingLampIntensity"]}}

<?=__('staticmessage.Pool_BalanceTankArea');?> :{{$projedetay["data"][0]["BalanceTankArea"]}}

<?=__('staticmessage.Pool_FilterCapacity');?> :{{$projedetay["data"][0]["FilterCapacity"]}}

<?=__('staticmessage.Pool_PumpFlow');?> :{{$projedetay["data"][0]["PumpFlow"]}}

<?=__('staticmessage.Pool_FeedingNozzle');?> :{{$projedetay["data"][0]["FeedingNozzle"]}}

<?=__('staticmessage.Pool_FeedingNozzleFlow');?> :{{ bcdiv($projedetay["data"][0]["FeedingNozzleFlow"],1,2) }}

<?=__('staticmessage.Pool_SuctionStrainerAreaNet');?> :{{$projedetay["data"][0]["SuctionStrainerAreaNet"]}}

<?=__('staticmessage.Pool_FilterSuctionSpeed');?> :{{ bcdiv($projedetay["data"][0]["FilterSuctionSpeed"],1,3)}}

<?=__('staticmessage.Pool_FeedPipe');?> :{{ bcdiv($projedetay["data"][0]["FeedPipe"],1,2)}}

<?=__('staticmessage.Pool_SuctionPipe');?> :{{ bcdiv($projedetay["data"][0]["SuctionPipe"],1,2) }}

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
