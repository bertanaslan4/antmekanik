@extends('layout.default')
@section('content')
<div class="page-header card" >
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-box bg-c-blue"></i>
                <div class="d-inline">
                    <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Dolasimpompasi')?>  </h5>
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
                        <form action="{{route('admin.circulationpumphesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["circulationpump_id"])) ? null : $projedetay["data"]["circulationpump_id"] ])}}" method="post">
                        @csrf
                        <!--Form alani-->
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                            <div class="col-sm-4">
                                <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]["adi"]) ? $projedetay["data"][0]["adi"] :"";?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                            <div class="col-sm-4">
                                <input class="form-control form-control-round"  type="text" id="aciklama" name="aciklama" placeholder="Lütfen açıklama yazınız" value="<?php echo isset($projedetay["data"][0]["aciklama"]) ? $projedetay["data"][0]["aciklama"] :"";?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?>:</label>
                            <div class="col-sm-4">
                                <input type="number" name="BoilerCapacityKazan" value="<?php echo isset($projedetay["data"][0]["BoilerCapacity"]) ? $projedetay["data"][0]["BoilerCapacity"] : $defaultdd["data"][0]["circulationpump_BoilerCapacity"] ?>" class="form-control form-control-round"
                                                                               placeholder="Lütfen Adet yazınız">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Circulationpump_TemperatureDiff')?>:</label>
                            <div class="col-sm-4">
                                <input type="number" name="TemperatureDiff" value="<?php echo isset($projedetay["data"][0]["TemperatureDiff"]) ? $projedetay["data"][0]["TemperatureDiff"] : $defaultdd["data"][0]["circulationpump_TemperatureDiff"] ?>" class="form-control form-control-round"
                                                                                   placeholder="Lütfen değer yazınız">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Circulationpump_PumpEfficiency')?>:</label>
                            <div class="col-sm-4">
                                <input type="number" name="PumpEfficiency" value="<?php echo isset($projedetay["data"][0]["PumpEfficiency"]) ? $projedetay["data"][0]["PumpEfficiency"] : $defaultdd["data"][0]["circulationpump_PumpEfficiency"] ?>" class="form-control form-control-round"
                                                                                   placeholder="Lütfen değer yazınız">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Circulationpump_EngineEfficiency')?>:</label>
                            <div class="col-sm-4">
                                <input type="number" name="EngineEfficiency" value="<?php echo isset($projedetay["data"][0]["EngineEfficiency"]) ? $projedetay["data"][0]["EngineEfficiency"] : $defaultdd["data"][0]["circulationpump_EngineEfficiency"] ?>" class="form-control form-control-round"
                                                                                   placeholder="Lütfen değer yazınız">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Circulationpump_Density')?>:</label>
                            <div class="col-sm-4">
                                <input type="number" name="Density" value="<?php echo isset($projedetay["data"][0]["Density"]) ? $projedetay["data"][0]["Density"] : $defaultdd["data"][0]["circulationpump_Density"] ?>" class="form-control form-control-round"
                                                                                   placeholder="Lütfen değer yazınız">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Circulationpump_SpecificHeat')?>:</label>
                            <div class="col-sm-4">
                                <input type="number" name="SpecificHeat" value="<?php echo isset($projedetay["data"][0]["SpecificHeat"]) ? $projedetay["data"][0]["SpecificHeat"] : $defaultdd["data"][0]["circulationpump_SpecificHeat"] ?>" class="form-control form-control-round"
                                                                                   placeholder="Lütfen değer yazınız">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Circulationpump_PressureDrop')?> :</label>
                            <div class="col-sm-4">
                                <input type="number" name="PressureDrop" value="<?php echo isset($projedetay["data"][0]["PressureDrop"]) ? $projedetay["data"][0]["PressureDrop"] : $defaultdd["data"][0]["circulationpump_PressureDrop"] ?>" class="form-control form-control-round"
                                                                               placeholder="Lütfen değer yazınız">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?>:</label>
                            <div class="col-sm-4">
                                <input type="number" name="piece" value="<?php echo isset($projedetay["data"][0]["Piece"]) ? $projedetay["data"][0]["Piece"] : $defaultdd["data"][0]["circulationpump_Piece"] ?>" class="form-control form-control-round"
                                placeholder="Lütfen Adet yazınız">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Marka')?> :</label>
                            <div class="col-sm-4">
                                    <select class="js-example-tags col-sm-12" id="marka" onchange="MarkaChange(this.value)" multiple="multiple" name="brand[]">
                                        <option value="hepsi">Hepsi</option>
                                        @if (!empty($projedetay["PumpBrand"]["data"]))
                                        @foreach($projedetay["PumpBrand"]["data"] as $row)

                                        <option value="{{$row["markasi"]}}">{{$row["markasi"]}}</option>

                                        @endforeach
                                        @endif
                                    </select>

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
                        @if (session()->has('circulationpumphesap'))
                            <div class="col-md-6">

                                <img src="{{asset('/hesapresimler/09dolasim.png')}}" height="350" width="350" alt="">
                            </div>
                            <div class="col-md-12 col-lg-12">
                                @if (isset(session('circulationpumphesap')[0]["data"]["id"]))
                                <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('circulationpumphesap')[0]["data"]["id"] !!} </b> <br> <b> Project: {!! session('circulationpumphesap')[0]["data"]["adi"] !!} </b>  </h4>
                                <br>
                                <br>

                                <form action="{{route('admin.circulationpumphesapkaydet',["update"=>1,"id"=>isset(session('circulationpumphesap')[0]["data"]["id"]) ? session('circulationpumphesap')[0]["data"]["id"] : null ] )}}" method="post">

                                @else
                                <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                <br>
                                <br>
                                <form action="{{route('admin.circulationpumphesapkaydet')}}" method="post">

                                @endif


                                    @csrf
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('circulationpumphesap')[0]["data"]["adi"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('circulationpumphesap')[0]["data"]["aciklama"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Boiler_Capacity')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('circulationpumphesap')[0]["data"]["BoilerCapacity"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Circulationpump_TemperatureDiff')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('circulationpumphesap')[0]["data"]["TemperatureDiff"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Piece')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('circulationpumphesap')[0]["data"]["Piece"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Circulationpump_PressureDrop')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('circulationpumphesap')[0]["data"]["PressureDrop"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Circulationpump_PumpEfficiency')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('circulationpumphesap')[0]["data"]["PumpEfficiency"] !!}</p>
                                                </div>
                                            </div>
                                            <ul class="basic-list list-icons">
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Circulationpump_SpecificHeat')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('circulationpumphesap')[0]["data"]["SpecificHeat"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Circulationpump_EngineEfficiency')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('circulationpumphesap')[0]["data"]["EngineEfficiency"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Circulationpump_Density')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('circulationpumphesap')[0]["data"]["Density"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Circulationpump_PumpFlow')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! bcdiv(session('circulationpumphesap')[0]["data"]["PumpFlow"],1,2)!!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.Circulationpump_MotorPower')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('circulationpumphesap')[0]["data"]["MotorPower"] !!}</p>
                                                    </div>
                                                </div>
                                                <ul class="basic-list list-icons">
                                                    @if(!empty(session('circulationpumphesap')[0]["data"]["Product"]))

                                                      @foreach(session('circulationpumphesap')[0]["data"]["Product"] as  $key => $row )

                                                          <li>
                                                              <div class="row">
                                                                  <div class="col-md-2">
                                                                      <div class="radio radio-inline">
                                                                          <label>
                                                                              <input type="radio" name="circulationpump" value="{{$row[0]["id"]}}">

                                                                          </label>
                                                                      </div>

                                                                  </div>
                                                                  <div class="col-md-10">
                                                                      <table class="table table-borderless">
                                                                          <thead>
                                                                          <tr>
                                                                              <th>
                                                                                  @if(is_null($row[0]["mini_banner"]))
                                                                                      <img src="{{asset('/pullbanner/def_pulbanner.png')}}" onclick="detaygoster({{$key}});return false;" height="50" width="50" alt="">
                                                                                  @else
                                                                                      <img src="{{ asset('/pullbanner/' . $row[0]['mini_banner']) }}" onclick="detaygoster({{$key}});return false;" height="50" width="50" alt="">
                                                                                  @endif
                                                                              </th>
                                                                              <th><img src="{{asset('user1.png')}}"  onclick="detaygoster1({{$key}});return false;" width="50" height="50" alt="" ></th>

                                                                              <th><img src="{{asset('user1.png')}}"  width="50" height="50" alt=""  style="margin: auto;display: block"></th>

                                                                              <th><a target="blank" href="{{asset($row[0]["katalog"])}}">
                                                                                      <img src="{{asset('pdf.png')}}" width="40" height="40" alt="">
                                                                                  </a></th>

                                                                          </tr>
                                                                          </thead>
                                                                          <tbody>
                                                                          <tr>
                                                                              <td>
                                                                                  @if(!empty($row[0]["tipi"]))
                                                                                      <p> {{$row[0]["tipi"]}}</p>
                                                                                  @endif
                                                                                  <div id="boyler{{$key}}" style="display: none;">


                                                                                      @if(!empty($row[0]["markasi"]))
                                                                                          <p><?=__('staticmessage.Circulationpump_markasi')?>  : {{$row[0]["markasi"]}}</p>
                                                                                      @endif
                                                                                      @if(!empty($row[0]["standardı"]))
                                                                                          <p><?=__('staticmessage.Circulationpump_standardi')?>  : {{$row[0]["standardı"]}}</p>
                                                                                      @endif
                                                                                      @if(!empty($row[0]["bbbf_no"]))
                                                                                          <p><?=__('staticmessage.Circulationpump_bbbf_no')?>  : {{$row[0]["bbbf_no" ]}}</p>
                                                                                      @endif


                                                                                      @if(!empty($row[0]["devir_d/d"]))
                                                                                          <p><?=__('staticmessage.Circulationpump_devir_d/d')?>  : {{$row[0]["devir_d/d"]}}</p>
                                                                                      @endif
                                                                                      @if(!empty($row[0]["motor_gucu_KW"]))
                                                                                          <p><?=__('staticmessage.Circulationpump_motor_gucu_KW')?>  : {{$row[0]["motor_gucu_KW"]}}</p>
                                                                                      @endif
                                                                                      @if(!empty($row[0]["agirligi_kg"]))
                                                                                          <p><?=__('staticmessage.Circulationpump_agirligi_kg')?>  : {{$row[0]["agirligi_kg"]}}</p>
                                                                                      @endif
                                                                                      @if(!empty($row[0]["baglanti_ebadi"]))
                                                                                          <p><?=__('staticmessage.Circulationpump_baglanti_ebadi')?>  : {{$row[0]["baglanti_ebadi"]}}</p>
                                                                                      @endif
                                                                                      @if(!empty($row[0]["u_kodu"]))
                                                                                          <p><?=__('staticmessage.Circulationpump_u_kodu')?>  : {{$row[0]["u_kodu"]}}</p>
                                                                                      @endif
                                                                                      @if(!empty($row[0]["katalog"]))
                                                                                          <p><?=__('staticmessage.Circulationpump_katalog')?>  : {{$row[0]["katalog"]}}</p>
                                                                                      @endif
                                                                                      @if(!empty($row[0]["web"]))
                                                                                          <p><?=__('staticmessage.Circulationpump_web')?>  : {{$row[0]["web"]}}</p>
                                                                                      @endif
                                                                                      @if(!empty($row[0]["record_time"]))
                                                                                          <p><?=__('staticmessage.Circulationpump_record_time')?>  : {{$row[0]["record_time"]}}</p>
                                                                                      @endif
                                                                                  </div>
                                                                              </td>
                                                                              <td> {{$row[0]["markasi"]}}
                                                                                  <div id="boyler1{{$key}}" style="display: none;margin-left:-20px;margin-top: 5px; max-width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                                                      <div class="col-lg-12 col-xl-12">
                                                                                          <div class="card-sub">
                                                                                              <div class="card-block" style=" padding: 30px;">
                                                                                                  <h6 style="font-weight: bold">{{$row[0]["Producer"]["Producer"]}}</h6>


                                                                                                  <p> {{$row[0]["Producer"]["Address1"]}}</p>
                                                                                                  @if(!empty($row[0]["Producer"]["Address2"]))
                                                                                                      <p><i class="feather icon-map-pin"></i> {{$row[0]["Producer"]["Address2"]}}</p>
                                                                                                  @endif
                                                                                                  @if(!empty($row[0]["Producer"]["Phone"]))
                                                                                                      <p><i class="feather icon-phone"></i>{{$row[0]["Producer"]["Phone"]}}</p>
                                                                                                  @endif
                                                                                                  @if(!empty($row[0]["Producer"]["Fax"]))
                                                                                                      <p><i class="feather icon-printer"></i> {{$row[0]["Producer"]["Fax"]}}</p>
                                                                                                  @endif

                                                                                              </div>
                                                                                          </div>
                                                                                      </div>

                                                                                  </div>
                                                                              </td>
                                                                              <td><select size="1" style="font-size:16px" required>
                                                                                      <option value="null">Seçim Yapınız</option>
                                                                                      @foreach($row[0]["Seller"] as $rows)
                                                                                              <?php
                                                                                              $sellerName = $rows["serller"];
                                                                                              $trimmedName = strlen($sellerName) > 10 ? substr($sellerName, 0, 10) . '...' : $sellerName;
                                                                                              $tooltip = strlen($sellerName) > 10 ? $sellerName : '';
                                                                                              ?>
                                                                                          <option value="{{$rows["code"]}}" title="{{$tooltip}}">
                                                                                              {{ $trimmedName }}
                                                                                          </option>
                                                                                      @endforeach
                                                                                  </select></td>
                                                                              <td><?=__('staticmessage.Boiler_katalog')?></td>
                                                                          </tr>

                                                                          </tbody>
                                                                      </table>









                                                                  </div>
                                                                     </div>

                                                          </li>
                                                      @endforeach
                                                    @endif

                                                  </ul>


                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                    </label>
                                                    <div class="col-sm-6">
                                                        @if (isset(session('circulationpumphesap')[0]["data"]["edit"]) && session('circulationpumphesap')[0]["data"]["edit"]==1)
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
        function detaygoster(key) {
            var burnerDiv = document.getElementById("boyler" + key);
            if (burnerDiv.style.display === "none") {
                burnerDiv.style.display = "block";
            } else {
                burnerDiv.style.display = "none";
            }
        }
        function detaygoster1(key)
        {

            var burnerDiv = document.getElementById("boyler1" + key);
            if (burnerDiv.style.display === "none") {
                burnerDiv.style.display = "block";
            } else {
                burnerDiv.style.display = "none";
            }

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
