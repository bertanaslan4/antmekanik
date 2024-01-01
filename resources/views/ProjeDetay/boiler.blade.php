@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?></h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["boiler_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"boiler",'id'=>$projedetay["data"]['boiler_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.boiler',['boilerid'=>$projedetay["data"]['boiler_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.boilerproject.destroy',$projedetay["data"]['boiler_id'])}}">
                              @csrf
                              <button style="width: 115px;" type="submit" class="btn btn-danger btn-round waves-effect waves-light"><?=__('staticmessage.Sil');?></button>
                             
                            </form>
                            </div>
                    </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="card" id="v_1_2">
                        <div class="card-block">
                        <div class="prism-show-language"><div class="prism-show-language-label"><?=__('staticmessage.projedetaylari')?></div></div><pre class="language-javascript"><code >
<?=__("staticmessage.Boiler_U_FuelType");?> :{{$projedetay["data"]["FuelType"]}} 
<?=__("staticmessage.Boiler_U_heatneed");?> :{{$projedetay["data"]["HeatNeed"]}}
<?=__('staticmessage.Boiler_U_Distribut');?> :{{$projedetay["data"]["DistributionPipe"]}}        
<?=__('staticmessage.Boiler_BoilerUnitAvgHeat');?>: {{$projedetay["data"]["BoilerUnitAvgHeat"]}}
<?=__("staticmessage.Boiler_U_Piece");?> :{{$projedetay["data"]["Piece"]}}
<?=__('staticmessage.Boiler_Capacity');?> :{{$projedetay["data"]["BoilerCapacity"]}}
<?=__('staticmessage.Boiler_HeatingSurface');?> :{{$projedetay["data"]["HeatingSurface"]}}
<?=__('staticmessage.Boiler_BoilerIncreaseFactor');?> :{{$projedetay["data"]["BoilerIncreaseFactor"]}}




 
@if(!empty($projedetay["data"][0]["Producer"]))
<h4><?=__('staticmessage.Producer');?> </h4>
<p><?=__('staticmessage.Boiler_P_procedur');?> :{{$projedetay["data"][0]["Producer"]["Producer"]}} 
<?=__('staticmessage.Boiler_P_Address1');?> :{{$projedetay["data"][0]["Producer"]["Address1"]}}
@if(!empty($projedetay["data"][0]["Producer"]["Address2"]))
<?=__('staticmessage.Boiler_P_Address2');?> :{{$projedetay["data"][0]["Producer"]["Address2"]}}
@endif
@if(!empty($projedetay["data"][0]["Producer"]["Phone"]))
<?=__('staticmessage.Boiler_P_Phone');?> :{{$projedetay["data"][0]["Producer"]["Phone"]}}
@endif
@if(!empty($projedetay["data"][0]["Producer"]["Fax"]))
<?=__('staticmessage.Boiler_P_Fax');?> :{{$projedetay["data"][0]["Producer"]["Fax"]}}<br>
@endif
@endif

@if(!empty($projedetay["data"][0]["Seller"]))
<h4><?=__('staticmessage.Seller');?></h4>
@if(!empty($projedetay["data"][0]["Seller"]["Serller"]))
<?=__('staticmessage.Boiler_S_Seller');?> :{{$projedetay["data"][0]["Seller"]["Serller"]}}
@endif
@if(!empty($projedetay["data"][0]["Seller"]["Address1"]))
<?=__('staticmessage.Boiler_S_Adress1');?> :{{$projedetay["data"][0]["Seller"]["Address1"]}}
@endif
@if(!empty($projedetay["data"][0]["Seller"]["Email"]))
<a target="blank" href="mailto:{{$projedetay["data"][0]["Producer"]["Email"]}}"><img src="{{asset('email.png')}}" width="50" height="50" alt=""></a>
@endif
@if(!empty($projedetay["data"][0]["Seller"]["Phone"]))
<?=__('staticmessage.Boiler_S_fax');?> :{{$projedetay["data"][0]["Seller"]["Phone"]}}<br>
@endif
@endif

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
