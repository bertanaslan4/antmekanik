@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Siginak')?> </h5>
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
                            <h5><br> <span style="font-size:20px;color:#AC6319"><?=__('staticmessage.projeno');?>: #{{$projedetay["data"]["shelterventilation_id"]}}</span></h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                                <form action="{{route('pdfislemleri',['hesapturu'=>"shelterventilation",'id'=>$projedetay["data"]['shelterventilation_id']])}}" method="post" name="pdfislemleriBoiler">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-warning btn-round waves-effect waves-light"><?=__('staticmessage.Pdf');?></button>
                                </form>
                                <br>
                            </div>
                            <div class="col-md-2">
                                <form action="{{route('admin.shelterventilation',['shelterventilationid'=>$projedetay["data"]['shelterventilation_id']])}}" method="post" name="boileredit">
                                    @csrf
                                    <button style="width: 115px;" class="btn btn-info btn-round waves-effect waves-light"><?=__('staticmessage.Edit');?></button>
                                </form>
                              
                            </div>
                            <div class="col-md-2">
                                <form class="form"  method="POST"
                                action="{{route('admin.shelterventilationproject.sil',$projedetay["data"]['shelterventilation_id'])}}">
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
<?=__('staticmessage.Shelterventilation_CalculationType');?> :{{$projedetay["data"][0]["CalculationType"]==0 ? "Doğal" : "Mekanik"}}

<?=__('staticmessage.Shelterventilation_NeedFreshAir');?> :{{$projedetay["data"][0]["NeedFreshAir"]}}

<?=__('staticmessage.Shelterventilation_ShelterArea');?> :{{$projedetay["data"][0]["ShelterArea"]}}

<?=__('staticmessage.Shelterventilation_ShelterHeight');?> :{{$projedetay["data"][0]["ShelterHeight"]}}

<?=__('staticmessage.Shelterventilation_SandFilterAirFlow');?> :{{$projedetay["data"][0]["SandFilterAirFlow"]}}

<?=__('staticmessage.Shelterventilation_SandFilterHeight');?> :{{$projedetay["data"][0]["SandFilterHeight"]}}

<?=__('staticmessage.Shelterventilation_SandFilterAirSpeed');?> :{{$projedetay["data"][0]["SandFilterAirSpeed"]}}

<?=__('staticmessage.Shelterventilation_SandFilterPermeabilityRate');?> :{{$projedetay["data"][0]["SandFilterPermeabilityRate"]}}

<?=__('staticmessage.Shelterventilation_Filtration');?> :{{$projedetay["data"][0]["Filtration"]}}

<?=__('staticmessage.Shelterventilation_NumberOfPeople');?> :{{$projedetay["data"][0]["NumberOfPeople"]}}

<?=__('staticmessage.Shelterventilation_TotalFlow');?> :{{$projedetay["data"][0]["TotalFlow"]}}

<?=__('staticmessage.Shelterventilation_SandFilterPool');?> :{{$projedetay["data"][0]["SandFilterPool"]}}

<?=__('staticmessage.Shelterventilation_SandPoolDiffuserCalc');?> :{{$projedetay["data"][0]["SandPoolDiffuserCalc"]}}

<?=__('staticmessage.Shelterventilation_SmokeEvacuation');?> :{{$projedetay["data"][0]["SmokeEvacuation"]}}



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
