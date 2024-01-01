@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Boyler')?> </h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["boyler_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"boyler",'id'=>$projedetay["data"]['boyler_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.boyler',['boylerid'=>$projedetay["data"]['boyler_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.boylerproject.sil',$projedetay["data"]['boyler_id'])}}">
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
<?=__('staticmessage.Boyler_BuildType');?> :{{$projedetay["data"][0][0]["BuildType"]}}

<?php 

foreach ($projedetay["data"]["Equipment"] as $key => $value) {
    
    echo __('staticmessage.Boyler_Equipment_name').":".$value["Equipment_name"]."</br>";

    echo __('staticmessage.Boyler_Equipment_piece').":".$value["Equipment_piece"]."</br>";

    echo __('staticmessage.Boyler_WaterConsumption').":".$value["WaterConsumption"]."</br>";

    echo "</br>";
}
?>

<?=__('staticmessage.Boyler_PrepareTime');?> :{{$projedetay["data"][0][0]["PrepareTime"]}}

<?=__('staticmessage.Boyler_SpecificHeat');?> :{{$projedetay["data"][0][0]["SpecificHeat"]}}

<?=__('staticmessage.Boyler_Density');?> :{{$projedetay["data"][0][0]["Density"]}}

<?=__('staticmessage.Boyler_BoylerCapacity');?> :{{$projedetay["data"][0][0]["BoylerCapacity"]}}

<?=__('staticmessage.Boyler_SelectedVolume');?> :{{$projedetay["data"][0][0]["SelectedVolume"]}}

<?=__('staticmessage.Boyler_HeatingLoad');?> :{{bcdiv($projedetay["data"][0][0]["HeatingLoad"],1,2) }}

<?=__('staticmessage.Boyler_BoylerTempIn');?> :{{ $projedetay["data"][0][0]["BoylerTempIn"]}}

<?=__('staticmessage.Boyler_BoylerTempOut');?> :{{$projedetay["data"][0][0]["BoylerTempOut"]}}

<?=__('staticmessage.Boyler_TempIn');?> :{{$projedetay["data"][0][0]["TempIn"]}}

<?=__('staticmessage.Boyler_TempOut');?> :{{$projedetay["data"][0][0]["TempOut"]}}

<?=__('staticmessage.Boyler_StorageFactor');?> :{{$projedetay["data"][0][0]["StorageFactor"]}}

<?=__('staticmessage.Boyler_UserFactor');?> :{{$projedetay["data"][0][0]["UserFactor"]}}

<?=__('staticmessage.Boyler_WaterConsumption');?> :{{$projedetay["data"][0][0]["WaterConsumption"]}}

<?=__('staticmessage.Boyler_AvgWaterConsumption');?> :{{$projedetay["data"][0][0]["AvgWaterConsumption"]}}

<?=__('staticmessage.Boyler_TemperatureDiff');?> :{{$projedetay["data"][0][0]["TemperatureDiff"]}}

<h4><?="Ürün:";?></h4>  
<?=__('staticmessage.Boyler_Urun_Adi');?> :{{$projedetay["data"][0][0]["product_adi"]}}
<?=__('staticmessage.Boyler_Urun_aciklama');?> :{{$projedetay["data"][0][0]["aciklama"]}}
<?=__('staticmessage.Boyler_Urun_markasi');?> :{{$projedetay["data"][0][0]["markasi"]}}
<?=__('staticmessage.Boyler_Urun_tipi');?> :{{$projedetay["data"][0][0]["tipi"]}}
<?=__('staticmessage.Boyler_U_Kodu');?> :{{$projedetay["data"][0][0]["U_Kodu"]}}
<h4><?="Üretici:";?> </h4>
<?=__('staticmessage.Boyler_U_Uretici');?> :{{$projedetay["data"][0][0]["U_Uretici"]}}
<?=__('staticmessage.Boyler_U_adres1');?> :{{$projedetay["data"][0][0]["U_adres1"]}}
<?=__('staticmessage.Boyler_U_telefon');?> :{{$projedetay["data"][0][0]["U_telefon"]}}
<h4><?="Satıcı:";?></h4> 
<?=__('staticmessage.Boyler_S_Satici');?> :{{$projedetay["data"][0][0]["S_Satici"]}}
<?=__('staticmessage.Boyler_S_adres1');?> :{{$projedetay["data"][0][0]["S_adres1"]}}
<?=__('staticmessage.Boyler_S_telefon');?> :{{$projedetay["data"][0][0]["S_telefon"]}}
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
