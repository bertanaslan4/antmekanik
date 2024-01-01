@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Otopark')?></h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["parkingventilation_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"parkingventilation",'id'=>$projedetay["data"]['parkingventilation_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.parkingventilation',['parkingventilationid'=>$projedetay["data"]['parkingventilation_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.parkingventilationproject.sil',$projedetay["data"]['parkingventilation_id'])}}">
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
<?=__('staticmessage.Parkingventilation_CalculationType');?> :{{$projedetay["data"][0]["CalculationType"]}}

<?=__('staticmessage.Parkingventilation_ParkingType');?> :{{$projedetay["data"][0]["ParkingType"]}}

<?=__('staticmessage.Parkingventilation_FlowCalcMethod');?> :{{$projedetay["data"][0]["FlowCalcMethod"]}}

<?=__('staticmessage.Parkingventilation_ParkingArea');?> :{{$projedetay["data"][0]["ParkingArea"]}}

<?=__('staticmessage.Parkingventilation_ParkingHeight');?> :{{$projedetay["data"][0]["ParkingHeight"]}}

<?=__('staticmessage.Parkingventilation_NumberOfVehicles');?> :{{$projedetay["data"][0]["NumberOfVehicles"]}}

<?=__('staticmessage.Parkingventilation_DrivingRoadLength');?> :{{$projedetay["data"][0]["DrivingRoadLength"]}}

<?=__('staticmessage.Parkingventilation_WasteGasCO');?> :{{$projedetay["data"][0]["WasteGasCO"]}}

<?=__('staticmessage.Parkingventilation_OutdoorCO');?> :{{$projedetay["data"][0]["OutdoorCO"]}}

<?=__('staticmessage.Parkingventilation_VehicleExitFrequency');?> :{{$projedetay["data"][0]["VehicleExitFrequency"]}}

<?=__('staticmessage.Parkingventilation_ParkingSpeed');?> :{{$projedetay["data"][0]["ParkingSpeed"]}}

<?=__('staticmessage.Parkingventilation_DetectorDensity');?> :{{$projedetay["data"][0]["DetectorDensity"]}}

<?=__('staticmessage.Parkingventilation_FreshAir');?> :{{$projedetay["data"][0]["FreshAir"]}}

<?=__('staticmessage.Parkingventilation_NumberOfExchanges');?> :{{$projedetay["data"][0]["NumberOfExchanges"]}}

<?=__('staticmessage.Parkingventilation_TotalCulvertArea');?> :{{$projedetay["data"][0]["TotalCukvertArea"]}}

<?=__('staticmessage.Parkingventilation_MotionlessVo');?> :{{$projedetay["data"][0]["MotionlessVo"]}}

<?=__('staticmessage.Parkingventilation_ActiveVo');?> :{{$projedetay["data"][0]["ActiveVo"]}}

<?=__('staticmessage.Parkingventilation_AirFlowPerVehicle');?> :{{$projedetay["data"][0]["AirFlowPerVehicle"]}}

<?=__('staticmessage.Parkingventilation_AirFlow');?> :{{$projedetay["data"][0]["AirFlow"]}}

<?=__('staticmessage.Parkingventilation_MinCulvertArea');?> :{{$projedetay["data"][0]["MinCulvertArea"]}}


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
