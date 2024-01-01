@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Hidrofor')?> </h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["hydrophore_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"hydrophore",'id'=>$projedetay["data"]['hydrophore_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.hydrophore',['hydrophoreid'=>$projedetay["data"]['hydrophore_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.hydrophoreproject.sil',$projedetay["data"]['hydrophore_id'])}}">
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
<?=__('staticmessage.Hydrophore_BuildType');?> :{{$projedetay["data"][0]["BuildType"]}}

<?=__('staticmessage.Hydrophore_NumberOfPeople');?> :{{$projedetay["data"][0]["NumberOfPeople"]}}

<?=__('staticmessage.Hydrophore_StoredTime');?> :{{$projedetay["data"][0]["StoredTime"]}}

<?=__('staticmessage.Piece');?> :{{$projedetay["data"][0]["Piece"]}}

<?=__('staticmessage.Hydrophore_PipePressureLoss');?> :{{$projedetay["data"][0]["PipePressureLoss"]}}

<?=__('staticmessage.Hydrophore_OtherLosses');?> :{{$projedetay["data"][0]["OtherLosses"]}}

<?=__('staticmessage.Hydrophore_SuddenNeed');?> :{{$projedetay["data"][0]["SuddenNeed"]}}

<?=__('staticmessage.Hydrophore_TankVolume');?> :{{$projedetay["data"][0]["TankVolume"]}}

<?=__('staticmessage.Hydrophore_HydrophoreFlow');?> :{{$projedetay["data"][0]["HydrophoreFlow"]}}

<?=__('staticmessage.Hydrophore_TotalLoss');?> :{{$projedetay["data"][0]["TotalLoss"]}}

<?=__('staticmessage.Hydrophore_UsingConcurrentFactor');?> :{{$projedetay["data"][0]["UsingConcurrentFactor"]}}

<?=__('staticmessage.Hydrophore_HydrophoreFactor');?> :{{$projedetay["data"][0]["HydrophoreFactor"]}}

<?=__('staticmessage.Hydrophore_DailyWaterConsumption');?> :{{$projedetay["data"][0]["DailyWaterConsumption"]}}


<?="Ürün:"?>
<?=__('staticmessage.Hydrophore_markasi');?> :{{$projedetay["data"][0]["markasi"]}}
<?=__('staticmessage.Hydrophore_standardi');?> :{{$projedetay["data"][0]["standardi"]}}
<?=__('staticmessage.Hydrophore_bbbf_no');?> :{{$projedetay["data"][0]["bbbf_no"]}}
<?=__('staticmessage.Hydrophore_tipi');?> :{{$projedetay["data"][0]["tipi"]}}
<?=__('staticmessage.Hydrophore_aciklama');?> :{{$projedetay["data"][0]["aciklama"]}}
<?=__('staticmessage.Hydrophore_U_kodu');?> :{{$projedetay["data"][0]["U_kodu"]}}
<?="Üretici:"?>

<?=__('staticmessage.Hydrophore_U_Uretici');?> :{{$projedetay["data"][0]["U_Uretici"]}}
<?=__('staticmessage.Hydrophore_Urun_tipi');?> :{{$projedetay["data"][0]["Urun_tipi"]}}
<?=__('staticmessage.Hydrophore_U_adres1');?> :{{$projedetay["data"][0]["U_adres1"]}}
<?=__('staticmessage.Hydrophore_U_telefon');?> :{{$projedetay["data"][0]["U_telefon"]}}
<?=__('staticmessage.Hydrophore_U_Kodu');?> :{{$projedetay["data"][0]["U_Kodu"]}}

<?="Satıcı:"?>

<?=__('staticmessage.Hydrophore_S_Satici');?> :{{$projedetay["data"][0]["S_Satici"]}}
<?=__('staticmessage.Hydrophore_S_adres1');?> :{{$projedetay["data"][0]["S_adres1"]}}
<?=__('staticmessage.Hydrophore_S_telefon');?> :{{$projedetay["data"][0]["S_telefon"]}}
 



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
