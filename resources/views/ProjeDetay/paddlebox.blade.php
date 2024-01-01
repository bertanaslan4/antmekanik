@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Davlumbaz')?></h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["paddlebox_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"paddlebox",'id'=>$projedetay["data"]['paddlebox_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.paddlebox',['paddleboxid'=>$projedetay["data"]['paddlebox_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.paddleboxproject.sil',$projedetay["data"]['paddlebox_id'])}}">
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
<?=__('staticmessage.Paddlebox_KitchenType');?> :{{$projedetay["data"][0][0]["KitchenType"]}}

<?=__('staticmessage.Paddlebox_KitchenDensity');?> :{{$projedetay["data"][0][0]["KitchenDensity"]}}

<?=__('staticmessage.Paddlebox_KitchenArea');?> :{{$projedetay["data"][0][0]["KitchenArea"]}}

<?=__('staticmessage.Paddlebox_KitchenHeight');?> :{{$projedetay["data"][0][0]["KitchenHeight"]}}

<?=__('staticmessage.Paddlebox_PaddleboxWidth');?> :{{$projedetay["data"][0][0]["PaddleboxWidth"]}}

<?=__('staticmessage.Paddlebox_PaddleboxHeight');?> :{{$projedetay["data"][0][0]["PaddleboxHeight"]}}

<?php 

foreach ($projedetay["data"]["Devices"] as $key => $value) {
    
    echo __('staticmessage.Paddlebox_Devices_Name').":".$value["Devices_name"]."<br>";


    echo __('staticmessage.Paddlebox_Devices_Piece').":".$value["Devices_piece"]."<br>";


    echo __('staticmessage.Paddlebox_Devices_RatedPower').":".$value["Devices_RatedPower"]."<br>";


    echo __('staticmessage.Paddlebox_Devices_TotalPower').":".$value["Devices_TotalPower"]."<br>";


    echo __('staticmessage.Paddlebox_Devices_Vapor').":".$value["Devices_Vapor"]."<br>";


    echo __('staticmessage.Paddlebox_Devices_TotalVapor').":".$value["Devices_TotalVapor"]."<br>";


    echo __('staticmessage.Paddlebox_Devices_SensibleHeat').":".$value["Devices_SensibleHeat"]."<br>";


    echo __('staticmessage.Paddlebox_Devices_SensibleHeatConvective').":".$value["Devices_SensibleHeatConvective"]."<br>";


    echo "</br>";
}
?>

<?=__('staticmessage.Paddlebox_HeatSourceDistance');?> :{{$projedetay["data"][0][0]["HeatSourceDistance"]}}

<?=__('staticmessage.Paddlebox_OverflowAirFactor');?> :{{$projedetay["data"][0][0]["OverflowAirFactor"]}}

<?=__('staticmessage.Paddlebox_ReductionFactorPos');?> :{{$projedetay["data"][0][0]["ReductionFactorPos"]}}

<?=__('staticmessage.Paddlebox_ReductionFactor');?> :{{$projedetay["data"][0][0]["ReductionFactor"]}}

<?=__('staticmessage.Paddlebox_ConcurrencyFactor');?> :{{$projedetay["data"][0][0]["ConcurrencyFactor"]}}

<?=__('staticmessage.Paddlebox_TotalVapor');?> :{{$projedetay["data"][0][0]["TotalVapor"]}}

<?=__('staticmessage.Paddlebox_SensibleHeatConvective');?> :{{$projedetay["data"][0][0]["SensibleHeatConvective"]}}

<?=__('staticmessage.Paddlebox_ThermalAirFlow');?> :{{$projedetay["data"][0][0]["ThermalAirFlow"]}}

<?=__('staticmessage.Paddlebox_AirFlow');?> :{{$projedetay["data"][0][0]["AirFlow"]}}



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
