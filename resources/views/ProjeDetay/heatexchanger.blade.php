@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Isıdegistirici')?> </h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["heatexchanger_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"heatexchanger",'id'=>$projedetay["data"]['heatexchanger_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.heatexchanger',['heatexchangerid'=>$projedetay["data"]['heatexchanger_id']])}}" method="post">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.heatexchangerproject.sil',$projedetay["data"]['heatexchanger_id'])}}">
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
<?=__('staticmessage.heatexchanger_heatneed');?> :{{$projedetay["data"][0]["HeatNeed"]}}

<?=__('staticmessage.heatexchanger_totalpass');?> :{{$projedetay["data"][0]["TotalPass"]}}

<?=__('staticmessage.Piece');?> :{{$projedetay["data"][0]["Piece"]}} 

<?=__('staticmessage.heatexchangerresult_heaterfluidavg');?> :{{$projedetay["data"][0]["HeaterFluidAvg"]}} 

<?=__('staticmessage.heatexchangerresult_heatedfluidavg');?> :{{$projedetay["data"][0]["HeatedFluidAvg"]}} 

<?=__('staticmessage.heatexchangerresult_pollutionfactor');?> :{{$projedetay["data"][0]["PollutionFactor"]}} 

<?=__('staticmessage.heatexchangerresult_logheatdiff');?> :{{$projedetay["data"][0]["LogHeatDiff"]}} 

<?=__('staticmessage.heatexchangerresult_heatsurface');?> :{{$projedetay["data"][0]["HeatSurface"]}} 

<?=__('staticmessage.heatexchangerresult_heatexchangercapacity');?> :{{$projedetay["data"][0]["HeatExchangerCapacity"]}} 

<?=__('staticmessage.heatexchangerresult_name');?> :{{$projedetay["data"][0]["Name"]}} 

<?=__('staticmessage.Mark');?> :{{$projedetay["data"][0]["Brand"]}} 

<?=__('staticmessage.Type');?> :{{$projedetay["data"][0]["Type"]}} 

<?=__('staticmessage.heatexchangerresult_aciklama');?> :{{$projedetay["data"][0]["Description"]}} 

<?=__('staticmessage.heatexchangerresult_maxheatsurface');?> :{{$projedetay["data"][0]["MaxHeatSurface"]}} 

<?=__('staticmessage.heatexchangerresult_Catalog');?> :{{$projedetay["data"][0]["Catalog"]}}      
                        
                        
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
    </script>
@endsection                  

