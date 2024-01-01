@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Kapaligenlesme')?> </h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["closedexpansiontank_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"closeexpansion",'id'=>$projedetay["data"]['closedexpansiontank_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.closeexpansion',['closeexpansionid'=>$projedetay["data"]['closedexpansiontank_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.closeexpansionproject.sil',$projedetay["data"]['closedexpansiontank_id'])}}">
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
<?=__('staticmessage.CloseExpansionTank_HeaterType');?> :{{$projedetay["data"][0]["HeaterType"]}}

<?=__('staticmessage.CloseExpansionTank_WaterHeat');?> :{{$projedetay["data"][0]["WaterHeat"]}}

<?=__('staticmessage.Boiler_Capacity');?> :{{$projedetay["data"][0]["BoilerCapacity"]}}

<?=__('staticmessage.CloseExpansionTank_Expansion');?> :{{$projedetay["data"][0]["Expansion"]}}

<?=__('staticmessage.CloseExpansionTank_StaticHeight');?> :{{$projedetay["data"][0]["StaticHeight"]}}

<?=__('staticmessage.CloseExpansionTank_OpeningPressure');?> :{{$projedetay["data"][0]["OpeningPressure"]}}

<?=__('staticmessage.CloseExpansionTank_ValveType');?> :{{$projedetay["data"][0]["ValveType"]}}

<?=__('staticmessage.CloseExpansionTank_ValveInch');?> :{{$projedetay["data"][0]["ValveInch"]}}

<?=__('staticmessage.Piece');?> :{{$projedetay["data"][0]["Piece"]}}

<?=__('staticmessage.CloseExpansionTank_WaterExpansion');?> :{{$projedetay["data"][0]["WaterExpansion"]}}

<?=__('staticmessage.CloseExpansionTank_UpperPressure');?> :{{$projedetay["data"][0]["UpperPressure"]}}

<?=__('staticmessage.CloseExpansionTank_TankPrePressure');?> :{{$projedetay["data"][0]["TankPrePressure"]}}

<?=__('staticmessage.CloseExpansionTank_WaterVolume');?> :{{$projedetay["data"][0]["WaterVolume"]}}

<?=__('staticmessage.CloseExpansionTank_ExpandingWater');?> :{{$projedetay["data"][0]["ExpandingWater"]}}

<?=__('staticmessage.CloseExpansionTank_StartPreWaterVolume');?> :{{$projedetay["data"][0]["StartPreWaterVolume"]}}

<?=__('staticmessage.CloseExpansionTank_TankVolume');?> :{{$projedetay["data"][0]["TankVolume"]}}

<?=__('staticmessage.CloseExpansionTank_ValveDiameter');?> :{{$projedetay["data"][0]["ValveDiameter"]}}

<h4><?="Ürün:" ?></h4>
<?=__('staticmessage.CloseExpansionTank_Urun_adi');?> :{{$projedetay["data"][0]["product_adi"]}}
<?=__('staticmessage.CloseExpansionTank_Urun_markasi');?> :{{$projedetay["data"][0]["markasi"]}}
<?=__('staticmessage.CloseExpansionTank_Urun_tipii');?> :{{$projedetay["data"][0]["tipi"]}}
<?=__('staticmessage.CloseExpansionTank_Urun_aciklama');?> :{{$projedetay["data"][0]["aciklama"]}}

<h4><?="Üretici:" ?></h4>

<?=__('staticmessage.CloseExpansionTank_U_Uretici');?> :{{$projedetay["data"][0]["U_Uretici"]}}
<?=__('staticmessage.CloseExpansionTank_U_adres1');?> :{{$projedetay["data"][0]["U_adres1"]}}
<?=__('staticmessage.CloseExpansionTank_U_telefon');?> :{{$projedetay["data"][0]["U_telefon"]}}

<h4><?="Satıcı:" ?></h4>
<?=__('staticmessage.CloseExpansionTank_S_Satici');?> :{{$projedetay["data"][0]["S_Satici"]}}
<?=__('staticmessage.CloseExpansionTank_S_adres1');?> :{{$projedetay["data"][0]["S_adres1"]}}
<?=__('staticmessage.CloseExpansionTank_S_telefon');?> :{{$projedetay["data"][0]["S_telefon"]}}



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
