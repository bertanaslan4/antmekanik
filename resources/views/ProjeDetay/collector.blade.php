@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Kollektor')?></h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["collector_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"collector",'id'=>$projedetay["data"]['collector_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.collector',['collectorid'=>$projedetay["data"]['collector_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.collectorproject.sil',$projedetay["data"]['collector_id'])}}">
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
<?=__('staticmessage.Collector_WaterRegime');?> :{{$projedetay["data"][0]["WaterRegime"]}}

<?=__('staticmessage.Collector_CollectorCapacity');?> :{{$projedetay["data"][0]["CollectorCapacity"]}}

<?=__('staticmessage.Collector_TempratureAvg');?> :{{$projedetay["data"][0]["TempratureAvg"]}}

<?=__('staticmessage.Collector_TransferorWater');?> :{{$projedetay["data"][0]["TransferorWater"]}}

<?=__('staticmessage.Collector_SpecificHeat');?> :{{$projedetay["data"][0]["SpecificHeat"]}}

<?=__('staticmessage.Collector_Density');?> :{{$projedetay["data"][0]["Density"]}}

<?=__('staticmessage.Collector_UsingConcurrentFactor');?> :{{$projedetay["data"][0]["UsingConcurrentFactor"]}}

<?=__('staticmessage.Collector_HydrophoreFactor');?> :{{$projedetay["data"][0]["HydrophoreFactor"]}}

<?=__('staticmessage.Piece');?> :{{$projedetay["data"][0]["Piece"]}}

<?=__('staticmessage.Collector_WaterSpeed');?> :{{$projedetay["data"][0]["WaterSpeed"]}}

<?=__('staticmessage.Collector_CollectorFlow');?> :{{ bcdiv($projedetay["data"][0]["CollectorFlow"],1,2) }}

<?=__('staticmessage.Collector_CollectorDiameter');?> :{{ bcdiv($projedetay["data"][0]["CollectorDiameter"],1,2)}}

<?=__('staticmessage.Collector_CollectorInch');?> :{{$projedetay["data"][0]["CollectorInch"]}}



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
