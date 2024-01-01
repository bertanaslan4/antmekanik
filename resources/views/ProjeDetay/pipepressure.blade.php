@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Borubasinc')?></h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["pipepressureloss_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"pipepressure",'id'=>$projedetay["data"]['pipepressureloss_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.pipepressure',['pipepressurelossid'=>$projedetay["data"]['pipepressureloss_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.pipepressureproject.sil',$projedetay["data"]['pipepressureloss_id'])}}">
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
<?=__('staticmessage.Pipepressureloss_MinSpeed');?> :{{$projedetay["data"][0]["MinSpeed"]}}

<?=__('staticmessage.Pipepressureloss_MaxSpeed');?> :{{$projedetay["data"][0]["MaxSpeed"]}}

<?=__('staticmessage.Pipepressureloss_MinLoad');?> :{{$projedetay["data"][0]["MinLoad"]}}

<?=__('staticmessage.Pipepressureloss_MaxLoad');?> :{{$projedetay["data"][0]["MaxLoad"]}}

<?=__('staticmessage.Pipepressureloss_GoingTemp');?> :{{$projedetay["data"][0]["GoingTemp"]}}

<?=__('staticmessage.Pipepressureloss_ReturnTemp');?> :{{$projedetay["data"][0]["ReturnTemp"]}}

<?=__('staticmessage.Pipepressureloss_FluidType');?> :{{$projedetay["data"][0]["FluidType"]}}

<?=__('staticmessage.Pipepressureloss_DiameterAdvice');?> :{{$projedetay["data"][0]["DiameterAdvice"]}}

<?=__('staticmessage.Pipepressureloss_TempDiff');?> :{{$projedetay["data"][0]["TempDiff"]}}

<?=__('staticmessage.Pipepressureloss_TempAvg');?> :{{$projedetay["data"][0]["TempAvg"]}}

<?=__('staticmessage.Pipepressureloss_WaterDensity');?> :{{$projedetay["data"][0]["WaterDensity"]}}

<?=__('staticmessage.Pipepressureloss_SpecificHeatOfWater');?> :{{ bcdiv($projedetay["data"][0]["SpecificHeatOfWater"],1,2) }}

<?=__('staticmessage.Pipepressureloss_WaterViscosity');?> :{{$projedetay["data"][0]["WaterViscosity"]}}

<?=__('staticmessage.Pipepressureloss_DynamicViscosity');?> :{{$projedetay["data"][0]["DynamicViscosity"]}}

<?=__('staticmessage.Pipepressureloss_LinesLineLoad');?> :{{$projedetay["data"][0]["LineLoad"]}}

<?=__('staticmessage.Pipepressureloss_Flow');?> :{{ bcdiv($projedetay["data"][0]["Flow"],1,2) }} 

<?=__('staticmessage.Pipepressureloss_Name');?> :{{$projedetay["data"][0]["Lines_Name"]}}

<?=__('staticmessage.Pipepressureloss_Connection');?> :{{$projedetay["data"][0]["Lines_Connection"]}}

<?=__('staticmessage.Pipepressureloss_PartLoad');?> :{{$projedetay["data"][0]["Lines_PartLoad"]}}

<?=__('staticmessage.Pipepressureloss_LinesLineLoad');?> :{{$projedetay["data"][0]["Lines_LineLoad"]}}

<?=__('staticmessage.Pipepressureloss_Length');?> :{{$projedetay["data"][0]["Lines_Length"]}}

<?=__('staticmessage.Pipepressureloss_PipeType');?> :{{$projedetay["data"][0]["Lines_PipeType"]}}

<?=__('staticmessage.Pipepressureloss_Flow');?> :{{  $projedetay["data"][0]["Lines_Flow"]}}

<?=__('staticmessage.Pipepressureloss_StartSpeed');?> :{{$projedetay["data"][0]["Lines_StartSpeed"]}}

<?=__('staticmessage.Pipepressureloss_EquivalentDiameter');?> :{{ bcdiv($projedetay["data"][0]["Lines_EquivalentDiameter"],1,2) }}

<?=__('staticmessage.Pipepressureloss_PipeInch');?> :{{$projedetay["data"][0]["Lines_PipeInch"]}}

<?=__('staticmessage.Pipepressureloss_PipeInnerD');?> :{{$projedetay["data"][0]["Lines_PipeInnerD"]}}

<?=__('staticmessage.Pipepressureloss_Emstivity');?> :{{$projedetay["data"][0]["Lines_Emstivity"]}}

<?=__('staticmessage.Pipepressureloss_FrictionCoefficient');?> :{{ bcdiv($projedetay["data"][0]["Lines_FrictionCoefficient"],1,3)}}

<?=__('staticmessage.Pipepressureloss_NetSpeed');?> :{{ bcdiv($projedetay["data"][0]["Lines_NetSpeed"],1,2) }}

<?=__('staticmessage.Pipepressureloss_Resistance');?> :{{ bcdiv( $projedetay["data"][0]["Lines_Resistance"],1,2)}}

<?=__('staticmessage.Pipepressureloss_KinematicViscosity');?> :{{ $projedetay["data"][0]["Lines_KinematicViscosity"]}}

<?=__('staticmessage.Pipepressureloss_Reynold');?> :{{ bcdiv($projedetay["data"][0]["Lines_Reynold"],1,3) }}

<?=__('staticmessage.Pipepressureloss_CoRoughness');?> :{{$projedetay["data"][0]["Lines_CoRoughness"]}}

<?=__('staticmessage.Pipepressureloss_RelativeSmoothness');?> :{{$projedetay["data"][0]["Lines_RelativeSmoothness"]}}

<?=__('staticmessage.Pipepressureloss_PressureDrop');?> :{{ bcdiv($projedetay["data"][0]["Lines_PressureDrop"],1,3) }}

<?=__('staticmessage.Pipepressureloss_TotalPressureDrop');?> :{{ bcdiv($projedetay["data"][0]["Lines_TotalPressureDrop"],1,3) }}


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
