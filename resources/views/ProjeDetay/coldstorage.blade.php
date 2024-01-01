@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Sogukdepo')?> </h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["coldstorage_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"coldstorage",'id'=>$projedetay["data"]['coldstorage_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.coldstorage',['coldstorageid'=>$projedetay["data"]['coldstorage_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.coldstorageproject.sil',$projedetay["data"]['coldstorage_id'])}}">
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
<?=__('staticmessage.ColdStorage_ProductType');?> :{{$projedetay["data"][0]["ProductType"]}}

<?=__('staticmessage.ColdStorage_EnclosureType');?> :{{$projedetay["data"][0]["EnclosureType"]}}

<?=__('staticmessage.ColdStorage_ProductQuantity');?> :{{$projedetay["data"][0]["ProductQuantity"]}}

<?=__('staticmessage.ColdStorage_EntryTemp');?> :{{$projedetay["data"][0]["EntryTemp"]}}

<?=__('staticmessage.ColdStorage_HeatGain');?> :{{$projedetay["data"][0]["HeatGain"]}}

<?=__('staticmessage.ColdStorage_LightingLoad');?> :{{$projedetay["data"][0]["LightingLoad"]}}

<?=__('staticmessage.ColdStorage_EngineLoad');?> :{{$projedetay["data"][0]["EngineLoad"]}}

<?=__('staticmessage.ColdStorage_OtherLoads');?> :{{$projedetay["data"][0]["OtherLoads"]}}

<?=__('staticmessage.ColdStorage_NumberOfPeople');?> :{{$projedetay["data"][0]["NumberOfPeople"]}}

<?=__('staticmessage.ColdStorage_StorageVolume');?> :{{$projedetay["data"][0]["StorageVolume"]}}

<?=__('staticmessage.ColdStorage_SystemSafetyHike');?> :{{$projedetay["data"][0]["SystemSafetyHike"]}}

<?=__('staticmessage.ColdStorage_BreathingHeat');?> :{{$projedetay["data"][0]["BreathingHeat"]}}

<?=__('staticmessage.ColdStorage_BreathingHeatExample');?> :{{$projedetay["data"][0]["BreathingHeatExample"]}}

<?=__('staticmessage.ColdStorage_OutdoorEnthalpy');?> :{{$projedetay["data"][0]["OutdoorEnthalpy"]}}

<?=__('staticmessage.ColdStorage_IndoorEnthalpy');?> :{{$projedetay["data"][0]["IndoorEnthalpy"]}}

<?=__('staticmessage.ColdStorage_PeopleLoad');?> :{{$projedetay["data"][0]["PeopleLoad"]}}

<?=__('staticmessage.ColdStorage_TotalLightingLoad');?> :{{$projedetay["data"][0]["TotalLightingLoad"]}}

<?=__('staticmessage.ColdStorage_ElectricalLoad');?> :{{$projedetay["data"][0]["ElectricalLoad"]}}

<?=__('staticmessage.ColdStorage_TotalOtherLoads');?> :{{$projedetay["data"][0]["TotalOtherLoads"]}}

<?=__('staticmessage.ColdStorage_VentilationLoad');?> :{{$projedetay["data"][0]["VentilationLoad"]}}

<?=__('staticmessage.ColdStorage_TotalHeatGain');?> :{{$projedetay["data"][0]["TotalHeatGain"]}}

<?=__('staticmessage.ColdStorage_AirDensity');?> :{{$projedetay["data"][0]["AirDensity"]}}

<?=__('staticmessage.ColdStorage_ShiftLength');?> :{{$projedetay["data"][0]["ShiftLength"]}}

<?=__('staticmessage.ColdStorage_SystemUptime');?> :{{$projedetay["data"][0]["SystemUptime"]}}

<?=__('staticmessage.ColdStorage_StorageTemperature');?> :{{$projedetay["data"][0]["StorageTemperature"]}}

<?=__('staticmessage.ColdStorage_FreezingPoint');?> :{{$projedetay["data"][0]["FreezingPoint"]}}

<?=__('staticmessage.ColdStorage_StorageTime');?> :{{$projedetay["data"][0]["StorageTime"]}}

<?=__('staticmessage.ColdStorage_ProcessingTime');?> :{{$projedetay["data"][0]["ProcessingTime"]}}

<?=__('staticmessage.ColdStorage_AirExchangeNumber');?> :{{$projedetay["data"][0]["AirExchangeNumber"]}}

<?=__('staticmessage.ColdStorage_UnitHumanLoad');?> :{{$projedetay["data"][0]["UnitHumanLoad"]}}

<?=__('staticmessage.ColdStorage_BeforeFreezingLoad');?> :{{$projedetay["data"][0]["BeforeFreezingLoad"]}}

<?=__('staticmessage.ColdStorage_FreezingLoad');?> :{{$projedetay["data"][0]["FreezingLoad"]}}

<?=__('staticmessage.ColdStorage_AfterFreezingLoad');?> :{{$projedetay["data"][0]["AfterFreezingLoad"]}}

<?=__('staticmessage.ColdStorage_BreathingHeatLoad');?> :{{$projedetay["data"][0]["BreathingHeatLoad"]}}

<?=__('staticmessage.ColdStorage_ProductTemperature');?> :{{$projedetay["data"][0]["ProductTemperature"]}}

<?=__('staticmessage.ColdStorage_SystemSafetyOverhead');?> :{{$projedetay["data"][0]["SystemSafetyOverhead"]}}

<?=__('staticmessage.ColdStorage_SystemLoad');?> :{{  $projedetay["data"][0]["SystemLoad"]}}

<?=__('staticmessage.ColdStorage_SystemLoadDaily');?> :{{$projedetay["data"][0]["SystemLoadDaily"]}}


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
