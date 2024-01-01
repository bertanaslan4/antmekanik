@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?>  / <?=__('staticmessage.Gunes')?>   </h5>
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
                         <form action="{{route('admin.solarenergyhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["solarenergy_id"])) ? null : $projedetay["data"]["solarenergy_id"] ])}}" method="post">
                              @csrf
                              <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                                   <div class="col-sm-4">
                                       <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["adi"] : "" ?> ">
                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                                   <div class="col-sm-4">
                                       <textarea rows="5" cols="5" class="form-control" placeholder="Lütfen bir açıklama yazınız" id="aciklama" name="aciklama"><?php echo isset($projedetay["data"][0]) ? $projedetay["data"][0]["aciklama"] : "" ?></textarea>

                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_Location')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="Location" id="Location" class="form-control form-control-primary">

                                             @foreach ($res_data["data"][7]["Data"] as $row)

                                             @if (isset($projedetay["data"][0]["Location"]) && $projedetay["data"][0]["Location"]==$row["Location"])
                                                <option value="{{$row["Location"]}}" selected>{{$row["Location"]}}</option>
                                                @else
                                            @if ($defaultdd["data"][0]["solarenergy_Location"]==$row["Location"])
                                                <option value="{{$row["Location"]}}" selected>{{$row["Location"]}}</option>
                                            @else
                                                <option value="{{$row["Location"]}}">{{$row["Location"]}}</option>
                                            @endif

                                            @endif


                                             @endforeach
                                         </select>

                                   </div>
                               </div>
                             <div class="form-group row">
                                 <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_CollectorBrand')?> :</label>
                                 <div class="col-sm-4">
                                     <select name="CollectorBrand[]" id="CollectorBrand" class="form-control form-control-primary">
                                         <option>Marka Seçiniz</option>
                                         @php
                                             $brands = [];
                                         @endphp
                                         @foreach ($res_data["data"][10]["Data"] as $row)
                                             @php
                                                 $brand = $row["Brand"];
                                             @endphp
                                             @if (!in_array($brand, $brands))
                                                 <option value="{{$brand}}">{{$brand}}</option>
                                                 @php
                                                     $brands[] = $brand;
                                                 @endphp
                                             @endif
                                         @endforeach
                                     </select>
                                 </div>
                             </div>

                             <div class="form-group row">
                                 <label class="col-sm-4 col-form-label">Kollektör Tipi :</label>
                                 <div class="col-sm-4">
                                     <select name="CollectorType[]" id="CollectorType" class="form-control form-control-primary"></select>
                                 </div>
                             </div>

                             <script>
                                 // Veritabanından alınacak marka ve tip verileri
                                 var veritabaniVerileri = [
                                         @foreach ($res_data["data"][10]["Data"] as $row)
                                     { brand: "{{$row["Brand"]}}", tip: "{{$row["Type"]}}" },
                                     @endforeach
                                 ];

                                 // Brand selectbox'ının değişim olayını dinleyen işlev
                                 document.getElementById("CollectorBrand").addEventListener("change", function() {
                                     var selectedBrand = this.value;
                                     var collectorTypeSelect = document.getElementById("CollectorType");
                                     collectorTypeSelect.innerHTML = ""; // Tip selectbox'ını temizle

                                     // Seçili markanın tip verilerini filtrele ve tip selectbox'ına ekle
                                     var filteredData = veritabaniVerileri.filter(function(data) {
                                         return data.brand === selectedBrand;
                                     });

                                     filteredData.forEach(function(data) {
                                         var option = document.createElement("option");
                                         option.value = data.tip;
                                         option.textContent = data.tip;
                                         collectorTypeSelect.appendChild(option);
                                     });
                                 });
                             </script>









                             <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_BuildType')?> :</label>
                                   <div class="col-sm-4">
                                        <select name="BuildType" id="BuildType" class="form-control form-control-primary">

                                             <option value="Duşlu veya küvetli konut">Duşlu veya küvetli konut</option>
                                             <option value="Çift banyolu konut">Çift banyolu konut</option>
                                             <option value="Duşsuz, banyosuz konut">Duşsuz, banyosuz konut</option>
                                             <option value="Duşlu konut">Duşlu konut</option>
                                             <option value="Banyolu konut">Banyolu konut</option>
                                             <option value="Duşlu otel, misafirhane">Duşlu otel, misafirhane</option>
                                             <option value="Banyolu otel, misafirhane">Banyolu otel, misafirhane</option>
                                             <option value="Lokantalar">Lokantalar</option>
                                             <option value="Hastaneler">Hastaneler</option>
                                             <option value="Okullar (gündüz)">Okullar (gündüz)</option>
                                             <option value="Okullar (yatılı)">Okullar (yatılı)</option>
                                             <option value="Kreşler">Kreşler</option>
                                             <option value="Kışlalar, polis enstitüleri">Kışlalar, polis enstitüleri</option>
                                             <option value="Yüzme havuzları">Yüzme havuzları</option>
                                             <option value="Spor salonları">Spor salonları</option>
                                             <option value="Kapalı garajla">Kapalı garajla</option>
                                         </select>

                                   </div>
                               </div>

                               <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_NumberOfPeople')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="NumberOfPeople" class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["NumberOfPeople"]) ? $projedetay["data"][0]["NumberOfPeople"] : $defaultdd["data"][0]["solarenergy_NumberOfPeople"] ?>">

                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_SafetyFactor')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="SafetyFactor"  class="form-control form-control-round"
                                        placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["SafetyFactor"]) ? $projedetay["data"][0]["SafetyFactor"] :$defaultdd["data"][0]["solarenergy_SafetyFactor"] ?>">

                                   </div>
                               </div>
                               <div class="form-group row">
                                   <label class="col-sm-4 col-form-label"><?=__('staticmessage.Solarenergy_CapacityCoverageRate')?> :</label>
                                   <div class="col-sm-4">
                                        <input type="number" name="CapacityCoverageRate" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["CapacityCoverageRate"]) ? $projedetay["data"][0]["CapacityCoverageRate"] : $defaultdd["data"][0]["solarenergy_CapacityCoverageRate"]  ?>">

                                   </div>
                               </div>
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
                         </form>
                     </div>
                     @if ($projedetay["data"]["edit"]==0)
                        @if (session()->has('solarenergyhesap'))
                         <div class="col-md-12">
                              @if (isset(session('solarenergyhesap')[0]["data"]["id"]))
                              <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('solarenergyhesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('solarenergyhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                <br>
                                <br>
                                <form action="{{route('admin.solarenergyhesapkaydet',["update"=>1,"id"=>isset(session('solarenergyhesap')[0]["data"]["id"]) ? session('solarenergyhesap')[0]["data"]["id"] : null ] )}}" method="post">

                                @else
                                <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                <br>
                                <br>
                                <form action="{{route('admin.solarenergyhesapkaydet')}}" method="post">

                                @endif
                              @csrf
                              <div class="card-block">
                                   <div class="row">
                                       <div class="col-md-6">
                                        <div class="form-group row">
                                             <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                             <div class="col-sm-6 col-form-label">
                                                 <p>{!! session('solarenergyhesap')[0]["data"]["adi"] !!}</p>
                                             </div>
                                         </div>
                                         <div class="form-group row">
                                             <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                             <div class="col-sm-6 col-form-label">
                                                 <p>{!! session('solarenergyhesap')[0]["data"]["aciklama"] !!}</p>
                                             </div>
                                         </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6"><b><?=__('staticmessage.Solarenergy_Location')?>:</b></label>
                                               <div class="col-sm-6 col-form-label">
                                                   <p>{!! session('solarenergyhesap')[0]["data"]["Location"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6"><b><?=__('staticmessage.Solarenergy_BuildType')?>:</b></label>
                                               <div class="col-sm-6 col-form-label">
                                                   <p>{!! session('solarenergyhesap')[0]["data"]["BuildType"] !!}</p>
                                                  </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Solarenergy_NumberOfPeople')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('solarenergyhesap')[0]["data"]["NumberOfPeople"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Solarenergy_SafetyFactor')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('solarenergyhesap')[0]["data"]["SafetyFactor"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Solarenergy_CapacityCoverageRate')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('solarenergyhesap')[0]["data"]["CapacityCoverageRate"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Solarenergy_DailyWaterNeed')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('solarenergyhesap')[0]["data"]["DailyWaterNeed"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Solarenergy_CollectorUsefulEnergy')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! bcdiv( session('solarenergyhesap')[0]["data"]["CollectorUsefulEnergy"],1,2) !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Solarenergy_DailyEnergyNeed')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('solarenergyhesap')[0]["data"]["DailyEnergyNeed"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Solarenergy_CollectorNeeded')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('solarenergyhesap')[0]["data"]["CollectorNeeded"] !!}</p>
                                               </div>
                                           </div>
                                           <div class="form-group row">
                                               <label class="col-sm-6">
                                                   <b><?=__('staticmessage.Solarenergy_TotalSurfaceArea')?>:</b>
                                               </label>
                                               <div class="col-sm-6">
                                                   <p>{!! session('solarenergyhesap')[0]["data"]["TotalSurfaceArea"] !!}</p>
                                               </div>
                                           </div>
                                           <ul class="basic-list list-icons">
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Solarenergy_CollectorBrand')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('solarenergyhesap')[0]["data"]["CollectorBrand"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Solarenergy_CollectorType')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('solarenergyhesap')[0]["data"]["CollectorType"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b>Cihaz Seçimi :</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>Cihaz Seçimi :</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Solarenergy_TempIn')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('solarenergyhesap')[0]["data"]["TempIn"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Solarenergy_TempOut')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('solarenergyhesap')[0]["data"]["TempOut"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Solarenergy_SpecificHeat')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('solarenergyhesap')[0]["data"]["SpecificHeat"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Solarenergy_Density')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('solarenergyhesap')[0]["data"]["Density"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Solarenergy_CorrectionFactor')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('solarenergyhesap')[0]["data"]["CorrectionFactor"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Solarenergy_CollectorEfficiency')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('solarenergyhesap')[0]["data"]["CollectorEfficiency"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Solarenergy_CollectorBrand')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('solarenergyhesap')[0]["data"]["CollectorBrand"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Solarenergy_DailyWaterConsumption')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('solarenergyhesap')[0]["data"]["DailyWaterConsumption"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Solarenergy_TemperatureDiff')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('solarenergyhesap')[0]["data"]["TemperatureDiff"] !!}</p>
                                                </div>
                                            </div>
                                            <a style="color:white;" onclick="detaygostersolarenergy();return false;" id="detaygostersolarenergy" class="btn btn-out-dashed waves-effect waves-light btn-danger btn-square btn-sm"><?=__('staticmessage.DetayGoster')?></a>
                                            <div id="solarenergydetayi" style="display:none;">
                                                    @foreach(session('solarenergyhesap')[0]["data"]["Months"] as $key => $row)

                                                    <p>
                                                       <b>{{$key}} </b>  : <br>
                                                        Solar Radiation : {{$row["SolarRadiation"]}} <br>
                                                        SystemNeed : {{$row["SystemNeed"]}} <br>
                                                        NumberOfPanel : {{$row["NumberOfPanel"]}}

                                                    </p>

                                                    @endforeach
                                            </div>
                                            <div class="form-group row">
                                               <label class="col-sm-6">
                                               </label>
                                               <div class="col-sm-6">
                                                 @if (isset(session('solarenergyhesap')[0]["data"]["edit"]) && session('solarenergyhesap')[0]["data"]["edit"]==1)
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
    function detaygostersolarenergy()
        {
            document.getElementById("solarenergydetayi").style.display="block";
            document.getElementById("detaygostersolarenergy").style.display="none";
        }
    </script>
@endsection
