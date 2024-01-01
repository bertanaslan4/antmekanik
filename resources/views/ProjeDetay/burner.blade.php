@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Brülör')?>  </h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["burner_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"burner",'id'=>$projedetay["data"]['burner_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.burner',['burnerid'=>$projedetay["data"]['burner_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.burnerproject.sil',$projedetay["data"]['burner_id'])}}">
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

<?=__('staticmessage.Boiler_BoilerUnitAvgHeat');?> :{{$projedetay["projedetay"]["data"][0]["Boiler_type"]}}
<?=__('staticmessage.burner_isim');?> :{{$projedetay["projedetay"]["data"][0]["Name"]}}
<?=__('staticmessage.burner_marka');?> :{{$projedetay["projedetay"]["data"][0]["Brand"]}}
<?=__('staticmessage.burner_tipi');?> :{{$projedetay["projedetay"]["data"][0]["Type"]}}
<?=__('staticmessage.burner_acikalama');?> :{{$projedetay["projedetay"]["data"][0]["Description"]}}
<?=__("staticmessage.burner_yakittipi");?> :{{$projedetay["projedetay"]["data"][0]["LiquitFuelType"]}}
<?=__("staticmessage.burner_Capacity_min");?> :{{$projedetay["projedetay"]["data"][0]["MinCapacity" ]}}
<?=__("staticmessage.burner_Capacity_max");?> :{{$projedetay["projedetay"]["data"][0]["MaxCapacity"]}}

<h4><?="Üretici";?></h4>  
<?=__("staticmessage.burner_Producer");?> :{{$projedetay["projedetay"]["data"][0]["Producer"]["Producer"]}}
<?=__("staticmessage.burner_Address1");?> :{{$projedetay["projedetay"]["data"][0]["Producer"]["Address1"]}}
<?=__("staticmessage.burner_sehir");?> :{{$projedetay["projedetay"]["data"][0]["Producer"]["City"]}}
<?=__("staticmessage.burner_phone");?> :{{$projedetay["projedetay"]["data"][0]["Producer"]["Phone"]}}
 
<h4><?="Satıcı";?></h4>  

<?=__("staticmessage.burner_S_Seller");?> :{{$projedetay["projedetay"]["data"][0]["Seller"]["Serller"]}}
<?=__("staticmessage.burner_S_adres");?> :{{$projedetay["projedetay"]["data"][0]["Seller"]["Address1"]}}
<?=__("staticmessage.burner_S_city");?> :{{$projedetay["projedetay"]["data"][0]["Seller"]["City"]}}
<?=__("staticmessage.burner_S_phone");?> :{{$projedetay["projedetay"]["data"][0]["Seller"]["Phone"]}}
<?=__("staticmessage.burner_S_code");?> :{{$projedetay["projedetay"]["data"][0]["Seller"]["Code"]}}
                              
                           
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
