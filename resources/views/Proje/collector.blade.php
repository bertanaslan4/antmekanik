@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>  / <?=__('staticmessage.Kollektor')?>   </h5>
                        <h6>{{$projedetay["data"]["proje_id"]}}-{{$projedetay["data"]["proje_adi"]}}</h6>
                    </div>
                </div>
            </div>

        </div>
</div>
<div class="pcoded-inner-content">
     <div class="main-body">
         <div class="page-wrapper">
             <div class="page-body">
                 <div class="row">
                      <div class="col-md-12">
                         <form action="{{route('admin.collectorhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["collector_id"])) ? null : $projedetay["data"]["collector_id"] ])}}" method="post">
                              @csrf
                              <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                                   <div class="col-sm-4">
                                       <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["adi"] :'';?>">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                                   <div class="col-sm-4">
                                        <textarea rows="5" cols="5" class="form-control" placeholder="Lütfen bir açıklama yazınız" id="aciklama" name="aciklama"><?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["aciklama"] :'';?></textarea>
                                   </div>
                               </div>
                               <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_WaterRegime')?> :</label>
                                <div class="col-sm-4">
                                     <select name="WaterRegime" id="WaterRegime" class="form-control form-control-primary">
                                         <option selected>Lütfen seçim yapın</option>
                                          @foreach ($res_data["data"][9]["Data"] as $row)

                                          @if (isset($projedetay["data"][0]["WaterRegime"]) && $projedetay["data"][0]["WaterRegime"]==$row["Regime"])
                                             <option value="{{$row["Regime"]}}" selected>{{$row["RegimeTitle"]}}</option>
                                         @else
                                             @if ($defaultdd["data"][0]["collector_WaterRegime"]==$row["Regime"])
                                                 <option value="{{$row["Regime"]}}" selected>{{$row["RegimeTitle"]}}</option>
                                             @else

                                                 <option value="{{$row["Regime"]}}">{{$row["RegimeTitle"]}}</option>
                                             @endif

                                         @endif


                                          @endforeach
                                      </select>
                                </div>
                            </div>
                               <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_CollectorCapacity')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="CollectorCapacity" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["CollectorCapacity"]) ? $projedetay["data"][0]["CollectorCapacity"] : $defaultdd["data"][0]["collector_CollectorCapacity"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_TempratureAvg')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="TempratureAvg" class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["TempratureAvg"]) ? $projedetay["data"][0]["TempratureAvg"] : $defaultdd["data"][0]["collector_TempratureAvg"] ?>">
                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_TransferorWater')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="TransferorWater" class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["TransferorWater"]) ? $projedetay["data"][0]["TransferorWater"] : $defaultdd["data"][0]["collector_TransferorWater"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_SpecificHeat')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="SpecificHeat"  class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["SpecificHeat"]) ? $projedetay["data"][0]["SpecificHeat"] : $defaultdd["data"][0]["collector_SpecificHeat"] ?>">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Collector_Density')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="Density" class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["Density"]) ? $projedetay["data"][0]["Density"] : $defaultdd["data"][0]["collector_Density"] ?>">
                                   </div>

                               </div>

                               <div class="form-group row">
                                <label class="col-sm-6">
                                </label>
                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        @if ($projedetay["data"]["edit"]==1)
                                        <button  class="btn btn-warning btn-round waves-effect waves-light" id="hesapla"><?=__('staticmessage.Yenidenhesapla')?></button>
                                            @else
                                            <button  class="btn btn-info btn-round waves-effect waves-light" id="hesapla"><?=__('staticmessage.Hesapla')?></button>
                                        @endif

                                    </div>
                                </div>
                            </div>

                         </form>
                      </div>


                      @if ($projedetay["data"]["edit"]==0)

                        @if (session()->has('collectorhesap'))
                        <div class="col-md-12">
                            @if (isset(session('collectorhesap')[0]["data"]["id"]))
                                <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('collectorhesap')[0]["data"]["id"] !!} </b> <br> <b> Project: {!! session('collectorhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                <br>
                                <br>

                                <form action="{{route('admin.collectorhesapkaydet',["update"=>1,"id"=>isset(session('collectorhesap')[0]["data"]["id"]) ? session('collectorhesap')[0]["data"]["id"] : null ] )}}" method="post">

                                @else
                                <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                <br>
                                <br>
                                <form action="{{route('admin.collectorhesapkaydet')}}" method="post">

                                @endif
                            @csrf
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                            <div class="col-sm-6 col-form-label">
                                                <p>{!! session('collectorhesap')[0]["data"]["adi"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                            <div class="col-sm-6 col-form-label">
                                                <p>{!! session('collectorhesap')[0]["data"]["aciklama"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6"><b><?=__('staticmessage.Collector_WaterRegime')?>:</b></label>
                                            <div class="col-sm-6 col-form-label">
                                                <p>{!! session('collectorhesap')[0]["data"]["WaterRegime"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6"><b><?=__('staticmessage.Collector_CollectorCapacity')?>:</b></label>
                                            <div class="col-sm-6 col-form-label">
                                                <p>{!! session('collectorhesap')[0]["data"]["CollectorCapacity"] !!}</p>
                                               </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Collector_TempratureAvg')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('collectorhesap')[0]["data"]["TempratureAvg"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Collector_TransferorWater')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('collectorhesap')[0]["data"]["TransferorWater"] !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6">
                                                <b><?=__('staticmessage.Collector_SpecificHeat')?>:</b>
                                            </label>
                                            <div class="col-sm-6">
                                                <p>{!! session('collectorhesap')[0]["data"]["SpecificHeat"] !!}</p>
                                            </div>
                                        </div>
                                        <ul class="basic-list list-icons">
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Collector_Density')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('collectorhesap')[0]["data"]["Density"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Collector_UsingConcurrentFactor')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('collectorhesap')[0]["data"]["UsingConcurrentFactor"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Collector_HydrophoreFactor')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('collectorhesap')[0]["data"]["HydrophoreFactor"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Piece')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('collectorhesap')[0]["data"]["Piece"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Collector_WaterSpeed')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('collectorhesap')[0]["data"]["WaterSpeed"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Collector_CollectorFlow')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! bcdiv(session('collectorhesap')[0]["data"]["CollectorFlow"] ,1,3) !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Collector_CollectorDiameter')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! bcdiv(session('collectorhesap')[0]["data"]["CollectorDiameter"],1,2)  !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Collector_CollectorInch')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('collectorhesap')[0]["data"]["CollectorInch"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                </label>
                                                <div class="col-sm-6">
                                                    @if (isset(session('collectorhesap')[0]["data"]["edit"]) && session('collectorhesap')[0]["data"]["edit"]==1)
                                                    <input type="submit"  value="<?=__('staticmessage.Güncelle')?>" class="btn btn-warning btn-round waves-effect waves-light"></input>
                                                    @else
                                                    <input type="submit"  value="<?=__('staticmessage.Kaydet')?>" class="btn btn-info btn-round waves-effect waves-light"></input>
                                                    @endif

                                                </div>
                                            </div>


                                        </ul>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>

                            </div>

                            </form>
                        </div>
                      @endif
                      @endif
                 </div>
             </div>
         </div>
     </div>
</div>
@endsection
@section("footerExtra")
    <script type="text/javascript">
    function detaygoster(key)
    {
        document.getElementById("boyler"+key).style.display="block";
        document.getElementById("satisdetay"+key).style.display="none";
    }
    function MarkaChange(val)
    {

        options = document.getElementById("marka");
        if(val=="hepsi")
        {
            for ( i=0; i<options.length; i++)
            {
                if(options[i].value=="hepsi")
                {
                    options[i] =null;
                    var opt = document.createElement('option');
                    opt.value ="hepsi";
                    opt.innerHTML ="Hepsi";
                    options.appendChild(opt);

                }else{
                    options[i].selected = "true";
                }

            }

        }

    }
    function showmodal(projeid)
    {
        //.usermodaldetail modal divin classı
        var id = projeid;
        $.ajax({
            url : '{{ route("admin.circulationpumpdetail") }}',
            type: 'POST',
            dataType:'html',
            data:{"projeid":id},
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success:function(data){
                $('#showmodalcontent').html(data);
            },
        });
    }

    $('.example').DataTable({
            "pagingType": "full_numbers",
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Turkish.json',
            },
            responsive: true,

    });
    $('.example2').DataTable({
            "pagingType": "full_numbers",
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Turkish.json'
            },
            responsive: true
    });
    </script>
@endsection
