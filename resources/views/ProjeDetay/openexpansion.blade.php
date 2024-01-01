@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>/ <?=__('staticmessage.Acikgenlesme')?></h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["openexpansiontank_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"openexpansion",'id'=>$projedetay["data"]['openexpansiontank_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.openexpansion',['openexpansionid'=>$projedetay["data"]['openexpansiontank_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.openexpansionproject.sil',$projedetay["data"]['openexpansiontank_id'])}}">
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
<?=__('staticmessage.OpenExpansionTank_HeaterType');?> :{{$projedetay["data"][0]["HeaterType"]}}

<?=__('staticmessage.OpenExpansionTank_WaterHeat');?> :{{$projedetay["data"][0]["WaterHeat"]}}

<?=__('staticmessage.Boiler_Capacity');?> :{{$projedetay["data"][0]["BoilerCapacity"]}}

<?=__('staticmessage.OpenExpansionTank_Expansion');?> :{{$projedetay["data"][0]["Expansion"]}}

<?=__('staticmessage.OpenExpansionTank_WaterExpansion');?> :{{$projedetay["data"][0]["WaterExpansion"]}}

<?=__('staticmessage.OpenExpansionTank_WaterVolume');?> :{{$projedetay["data"][0]["WaterVolume"]}}

<?=__('staticmessage.OpenExpansionTank_TankVolume');?> :{{$projedetay["data"][0]["TankVolume"]}}

<?=__('staticmessage.OpenExpansionTank_DiameterG');?> :{{ bcdiv($projedetay["data"][0]["DiameterG"],1,2)}}

<?=__('staticmessage.OpenExpansionTank_DiameterD');?> :{{ bcdiv($projedetay["data"][0]["DiameterD"],1,2)}}

<?=__('staticmessage.OpenExpansionTank_DiameterH');?> :{{$projedetay["data"][0]["DiameterH"]}}

<?=__('staticmessage.OpenExpansionTank_DiameterInchG');?> :{{$projedetay["data"][0]["DiameterInchG"]}}

<?=__('staticmessage.OpenExpansionTank_DiameterInchD');?> :{{$projedetay["data"][0]["DiameterInchD"]}}

<?=__('staticmessage.OpenExpansionTank_DiameterInchH');?> :{{$projedetay["data"][0]["DiameterInchH"]}}


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
