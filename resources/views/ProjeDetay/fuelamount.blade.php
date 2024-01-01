@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.KazanHesabiFuelAmount')?>  </h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["fuelamount_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"fuelamount",'id'=>$projedetay["data"]['fuelamount_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.fuelamount',['fuelamountid'=>$projedetay["data"]['fuelamount_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.fuelamountproject.sil',$projedetay["data"]['fuelamount_id'])}}">
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
<?=__('staticmessage.FuelType');?> :{{$projedetay["data"][0]["FuelType"]}}

<?=__('staticmessage.Piece');?> :{{$projedetay["data"][0]["Piece"]}}

<?=__('staticmessage.Boiler_BoilerEffiency');?> :{{$projedetay["data"][0]["BoilerEfficiency"]}}

<?=__('staticmessage.Boiler_Capacity');?> :{{$projedetay["data"][0]["BoilerCapacity"]}}

<?=__('staticmessage.LiquitFuelType');?> :{{$projedetay["data"][0]["LiquitFuelType"]}}

<?=__('staticmessage.FuelAmount_AvgFuelTemperature');?> :{{$projedetay["data"][0]["AvgFuelTemperature"]}}

<?=__('staticmessage.FuelAmount_FuelTemperature');?> :{{$projedetay["data"][0]["FuelTemperature"]}}

<?=__('staticmessage.FuelAmount_DailyWorkingTime');?> :{{$projedetay["data"][0]["DailyWorkingTime"]}}

<?=__('staticmessage.FuelAmount_YearlyWorkingTime');?> :{{$projedetay["data"][0]["YearlyWorkingTime"]}}

<?=__('staticmessage.FuelAmount_StoredDays');?> :{{$projedetay["data"][0]["StoredDays"]}}

<?=__('staticmessage.FuelAmount_LiquidOccupancyRate');?> :{{$projedetay["data"][0]["LiquidOccupancyRate"]}}

<?=__('staticmessage.FuelAmount_SolidStackLoad');?> :{{$projedetay["data"][0]["SolidStackLoad"]}}

<?=__('staticmessage.FuelAmount_LowerHeatValue');?> :{{$projedetay["data"][0]["LowerHeatValue"]}}

<?=__('staticmessage.FuelAmount_FuelAmount');?> :{{ bcdiv($projedetay["data"][0]["FuelAmount"],1,2)}}

<?=__('staticmessage.FuelAmount_FuelDensity');?> :{{$projedetay["data"][0]["FuelDensity"]}}

<?=__('staticmessage.FuelAmount_LiquidTank');?> :{{ bcdiv($projedetay["data"][0]["LiquidTank"],1,3) }}

<?=__('staticmessage.FuelAmount_SolidFuelSurface');?> :{{ bcdiv($projedetay["data"][0]["SolidFuelSurface"],1,3) }}

<?=__('staticmessage.FuelAmount_PreheaterLoad');?> :{{ bcdiv($projedetay["data"][0]["PreheaterLoad"],1,2) }}


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
