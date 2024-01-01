@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Gunes')?></h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["solarenergy_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"solarenergy",'id'=>$projedetay["data"]['solarenergy_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.solarenergy',['solarenergyid'=>$projedetay["data"]['solarenergy_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.solarenergyproject.sil',$projedetay["data"]['solarenergy_id'])}}">
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
<?=__('staticmessage.Solarenergy_Location');?> :{{$projedetay["data"][0]["Location"]}}

<?=__('staticmessage.Solarenergy_BuildType');?> :{{$projedetay["data"][0]["BuildType"]}}

<?=__('staticmessage.Solarenergy_NumberOfPeople');?> :{{$projedetay["data"][0]["NumberOfPeople"]}}

<?=__('staticmessage.Solarenergy_SafetyFactor');?> :{{$projedetay["data"][0]["SafetyFactor"]}}

<?=__('staticmessage.Solarenergy_CapacityCoverageRate');?> :{{$projedetay["data"][0]["CapacityCoverageRate"]}}

<?=__('staticmessage.Solarenergy_CollectorBrand');?> :{{$projedetay["data"][0]["CollectorBrand"]}}

<?=__('staticmessage.Solarenergy_TotalSurfaceArea');?> :{{$projedetay["data"][0]["TotalSurfaceArea"]}}

<?=__('staticmessage.Solarenergy_CollectorType');?> :{{$projedetay["data"][0]["CollectorType"]}}

<?=__('staticmessage.Solarenergy_TempIn');?> :{{$projedetay["data"][0]["TempIn"]}}

<?=__('staticmessage.Solarenergy_TempOut');?> :{{$projedetay["data"][0]["TempOut"]}}

<?=__('staticmessage.Solarenergy_SpecificHeat');?> :{{$projedetay["data"][0]["SpecificHeat"]}}

<?=__('staticmessage.Solarenergy_Density');?> :{{$projedetay["data"][0]["Density"]}}

<?=__('staticmessage.Solarenergy_CorrectionFactor');?> :{{$projedetay["data"][0]["CorrectionFactor"]}}

<?=__('staticmessage.Solarenergy_CollectorEfficiency');?> :{{$projedetay["data"][0]["CollectorEfficiency"]}}

<?=__('staticmessage.Solarenergy_CollectorSurface');?> :{{$projedetay["data"][0]["CollectorSurface"]}}

<?=__('staticmessage.Solarenergy_DailyWaterConsumption');?> :{{$projedetay["data"][0]["DailyWaterConsumption"]}}

<?=__('staticmessage.Solarenergy_TemperatureDiff');?> :{{$projedetay["data"][0]["TemperatureDiff"]}}

<?=__('staticmessage.Solarenergy_DailyWaterNeed');?> :{{$projedetay["data"][0]["DailyWaterNeed"]}}

<?=__('staticmessage.Solarenergy_DailyEnergyNeed');?> :{{$projedetay["data"][0]["DailyEnergyNeed"]}}

<?=__('staticmessage.Solarenergy_CollectorUsefulEnergy');?> :{{ bcdiv($projedetay["data"][0]["CollectorUsefulEnergy"],1,2) }}

<?=__('staticmessage.Solarenergy_CollectorNeeded');?> :{{  $projedetay["data"][0]["CollectorNeeded"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount10_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount10_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount10_NumberOfPanel"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount11_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount11_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount11_NumberOfPanel"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount12_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount12_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount12_NumberOfPanel"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount1_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount1_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount1_NumberOfPanel"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount2_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount2_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount2_NumberOfPanel"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount3_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount3_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount3_NumberOfPanel"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount4_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount4_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount4_NumberOfPanel"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount5_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount5_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount5_NumberOfPanel"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount6_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount6_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount6_NumberOfPanel"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount7_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount7_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount7_NumberOfPanel"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount8_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount8_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount8_NumberOfPanel"]}}

<?=__('staticmessage.Solarenergy_SolarRadiation');?> :{{$projedetay["data"][0]["mount9_SolarRadiation"]}}

<?=__('staticmessage.Solarenergy_SystemNeed');?> :{{$projedetay["data"][0]["mount9_SystemNeed"]}}

<?=__('staticmessage.Solarenergy_NumberOfPanel');?> :{{$projedetay["data"][0]["mount9_NumberOfPanel"]}}


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
