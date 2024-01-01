@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Boruyalitim')?></h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["pipeinsulation_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"pipeinsulation",'id'=>$projedetay["data"]['pipeinsulation_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.pipeinsulation',['pipeinsulationid'=>$projedetay["data"]['pipeinsulation_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.pipeinsulationproject.sil',$projedetay["data"]['pipeinsulation_id'])}}">
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
<?=__('staticmessage.Pipeinsulation_ServicePipeType');?> :{{$projedetay["data"][0]["ServicePipeType"]}}

<?=__('staticmessage.Pipeinsulation_PipeDiameter');?> :{{$projedetay["data"][0]["PipeDiameter"]}}

<?=__('staticmessage.Pipeinsulation_SheathPipeType');?> :{{$projedetay["data"][0]["SheathPipeType"]}}

<?=__('staticmessage.Pipeinsulation_SoilType');?> :{{$projedetay["data"][0]["SoilType"]}}

<?=__('staticmessage.Pipeinsulation_SoilTemperature');?> :{{$projedetay["data"][0]["SoilTemperature"]}}

<?=__('staticmessage.Pipeinsulation_FluidAvgTemperature');?> :{{$projedetay["data"][0]["FluidAvgTemperature"]}}

<?=__('staticmessage.Pipeinsulation_SoilFillingHeight');?> :{{$projedetay["data"][0]["SoilFillingHeight"]}}

<?=__('staticmessage.Pipeinsulation_LineLength');?> :{{$projedetay["data"][0]["LineLength"]}}

<?=__('staticmessage.Pipeinsulation_WaterFlow');?> :{{$projedetay["data"][0]["WaterFlow"]}}

<?=__('staticmessage.Pipeinsulation_WaterMass');?> :{{$projedetay["data"][0]["WaterMass"]}}

<?=__('staticmessage.Pipeinsulation_SpecificHeatOfWater');?> :{{$projedetay["data"][0]["SpecificHeatOfWater"]}}

<?=__('staticmessage.Pipeinsulation_MaterialLamda');?> :{{$projedetay["data"][0]["MaterialLamda"]}}

<?=__('staticmessage.Pipeinsulation_NominalOuterD');?> :{{$projedetay["data"][0]["NominalOuterD"]}}

<?=__('staticmessage.Pipeinsulation_EndOfLineTemp');?> :{{$projedetay["data"][0]["EndOfLineTemp"]}}

<?=__('staticmessage.Pipeinsulation_NominalInnerD');?> :{{$projedetay["data"][0]["NominalInnerD"]}}

<?=__('staticmessage.Pipeinsulation_InsulationThickness');?> :{{$projedetay["data"][0]["InsulationThickness"]}}

<?=__('staticmessage.Pipeinsulation_InsulationInnerD');?> :{{$projedetay["data"][0]["InsulationInnerD"]}}

<?=__('staticmessage.Pipeinsulation_ServicePipeLamda');?> :{{$projedetay["data"][0]["ServicePipeLamda"]}}

<?=__('staticmessage.Pipeinsulation_SheathPipeLamda');?> :{{$projedetay["data"][0]["SheathPipeLamda"]}}

<?=__('staticmessage.Pipeinsulation_SoilLamda');?> :{{$projedetay["data"][0]["SoilLamda"]}}

<?=__('staticmessage.Pipeinsulation_ServicePipeResistance');?> :{{$projedetay["data"][0]["ServicePipeResistance"]}}

<?=__('staticmessage.Pipeinsulation_InsulationMaterialResistance');?> :{{$projedetay["data"][0]["InsulationMaterialResistance"]}}

<?=__('staticmessage.Pipeinsulation_SheathPipeResistance');?> :{{$projedetay["data"][0]["SheathPipeResistance"]}}

<?=__('staticmessage.Pipeinsulation_CoefficientU');?> :{{$projedetay["data"][0]["CoefficientU"]}}

<?=__('staticmessage.Pipeinsulation_TotalHeatLoss');?> :{{$projedetay["data"][0]["TotalHeatLoss"]}}

<?=__('staticmessage.Pipeinsulation_TempDiff');?> :{{$projedetay["data"][0]["TempDiff"]}}

<?=__('staticmessage.Pipeinsulation_SurfaceTensionFillerHeight');?> :{{$projedetay["data"][0]["SurfaceTensionFillerHeight"]}}

<?=__('staticmessage.Pipeinsulation_SoilResistance');?> :{{$projedetay["data"][0]["SoilResistance"]}}


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
