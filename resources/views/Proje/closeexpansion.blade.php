@extends('layout.default')
@section('content')
<div class="page-header card" >
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-box bg-c-blue"></i>
                <div class="d-inline">
                    <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Kapaligenlesme')?>  </h5>
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
                        <form action="{{route('admin.closeexpansionhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["closedexpansiontank_id"])) ? null : $projedetay["data"]["closedexpansiontank_id"] ])}}" method="post">
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
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?>  :</label>
                            <div class="col-sm-4">
                                <input type="number" name="BoilerCapacityKazan" class="form-control form-control-round"
                                placeholder="Lütfen değer yazınız" value="<?php echo isset($projedetay["data"][0]["BoilerCapacity"]) ? $projedetay["data"][0]["BoilerCapacity"] : $defaultdd["data"][0]["closeexpansion_BoilerCapacity"] ?>">

                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_HeaterType')?> :</label>
                            <div class="col-sm-4">
                                <select name="HeaterType" id="HeaterType" class="form-control form-control-primary">
                                    <option selected>Lütfen seçim yapın</option>
                                    @foreach($headertype["data"] as $row)
                                    @if (isset($projedetay["data"][0]["HeaterType"]) && $projedetay["data"][0]["HeaterType"]==$row["name"])
                                        <option value="{{$row["name"]}}" selected>{{$row["name"]}}</option>
                                    @else
                                    @if ($defaultdd["data"][0]["closeexpansion_HeaterType"]==$row["name"])
                                        <option value="{{$row["name"]}}" selected>{{$row["name"]}}</option>
                                    @else
                                        <option value="{{$row["name"]}}">{{$row["name"]}}</option>
                                    @endif

                                    @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_WaterExpansion')?> :</label>
                            <div class="col-sm-4">

                                <input type="number" class="form-control form-control-round" name="waterexpansion" id="waterexpansion" value="<?php echo isset($projedetay["data"][0]["waterexpansion"]) ? $projedetay["data"][0]["waterexpansion"] : $defaultdd["data"][0]["closeexpansion_WaterHeat"] ?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_StaticHeight')?> :</label>
                            <div class="col-sm-4">
                                <input type="number" value="<?php echo isset($projedetay["data"][0]["StaticHeight"]) ? $projedetay["data"][0]["StaticHeight"] : $defaultdd["data"][0]["closeexpansion_StaticHeight"] ?>" name="StaticHeight" class="form-control form-control-round"
                                placeholder="Lütfen değer yazınız">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.CloseExpansionTank_OpeningPressure')?> :</label>
                            <div class="col-sm-4">
                                <input type="number" onchange="OpeninPressure(this.value);" value="<?php echo isset($projedetay["data"][0]["OpeningPressure"]) ? $projedetay["data"][0]["OpeningPressure"] : $defaultdd["data"][0]["closeexpansion_OpeningPressure"] ?>" name="OpeningPressure" class="form-control form-control-round"
                                placeholder="Lütfen değer yazınız">
                            </div>
                            <div class="col-sm-4">
                                <a style="font-size:23px;" class="mytooltip" href="javascript:void(0)">
                                    ?
                                    <span class="tooltip-content5">
                                        <span class="tooltip-text3">
                                            <span class="tooltip-inner2">Statik yüksekliğin bir bar üzeri seçilir !</span>
                                        </span>
                                    </span>
                                </a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">
                                <?=__('staticmessage.CloseExpansionTank_ValveType')?>
                            </label>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <input class="form-check-input" checked value="0" type="radio" name="ValveType" id="diyaframli">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Diyaframlı <!--Sql tarafında type degeri 0 api__valve tablosunda olanlar-->
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="ValveType" id="yayli">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                      Yaylı <!--Sql tarafında type degeri 1 olanlar post gönderilerken boiler_capacity şartı da eklenecektir ! -->
                                    </label>
                                  </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                            <div class="col-sm-4">
                                <input type="number" name="piece" value="<?php echo isset($projedetay["data"][0]["Piece"]) ? $projedetay["data"][0]["Piece"] : $defaultdd["data"][0]["closeexpansion_Piece"] ?>" class="form-control form-control-round"
                                placeholder="Lütfen Adet yazınız"></div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Marka')?> :</label>
                            <div class="col-sm-4">
                                    <select class="js-example-tags col-sm-12" id="marka" onchange="MarkaChange(this.value)" multiple="multiple" name="brand[]">
                                        <option value="hepsi">Hepsi</option>
                                        @if (!empty($projedetay["CloseExpansionBrand"]["data"]))
                                        @foreach($projedetay["CloseExpansionBrand"]["data"] as $row)

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
                </div>
                @if ($projedetay["data"]["edit"]==0)
                @if (session()->has('closeexpansiontankhesap'))
                <div class="col-md-6">

                            <img src="{{asset('/hesapresimler/08genkapali.png')}}" height="350" width="350" alt="">
                        </div>
                        <div class="col-md-12">
                                @if (isset(session('closeexpansiontankhesap')[0]["data"]["id"]))
                                    <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('closeexpansiontankhesap')[0]["data"]["id"] !!} </b> <br> <b> Project  : {!! session('closeexpansiontankhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                    <br>
                                    <br>

                                    <form action="{{route('admin.closeexpansionhesapkaydet',["update"=>1,"id"=>isset(session('closeexpansiontankhesap')[0]["data"]["id"]) ? session('closeexpansiontankhesap')[0]["data"]["id"] : null ] )}}" method="post">

                                    @else
                                    <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                    <br>
                                    <br>
                                    <form action="{{route('admin.closeexpansionhesapkaydet')}}" method="post">

                                @endif
                                        @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('closeexpansiontankhesap')[0]["data"]["adi"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('closeexpansiontankhesap')[0]["data"]["aciklama"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.CloseExpansionTank_HeaterType')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('closeexpansiontankhesap')[0]["data"]["HeaterType"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.CloseExpansionTank_WaterHeat')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('closeexpansiontankhesap')[0]["data"]["WaterHeat"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Boiler_Capacity')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('closeexpansiontankhesap')[0]["data"]["BoilerCapacity"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.CloseExpansionTank_StaticHeight')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('closeexpansiontankhesap')[0]["data"]["StaticHeight"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.CloseExpansionTank_OpeningPressure')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('closeexpansiontankhesap')[0]["data"]["OpeningPressure"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.CloseExpansionTank_ValveType')?>:</b>
                                                </label>
                                                <div class="col-sm-6">



                                                    <p>{!! (session('closeexpansiontankhesap')[0]["data"]["ValveType"]==0) ? "Diyaframlı" : "Yaylı"; !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Piece')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('closeexpansiontankhesap')[0]["data"]["Piece"] !!}</p>
                                                </div>
                                            </div>
                                            <ul class="basic-list list-icons">
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.CloseExpansionTank_Expansion')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('closeexpansiontankhesap')[0]["data"]["Expansion"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.CloseExpansionTank_WaterExpansion')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('closeexpansiontankhesap')[0]["data"]["WaterExpansion"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.CloseExpansionTank_UpperPressure')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('closeexpansiontankhesap')[0]["data"]["UpperPressure"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.CloseExpansionTank_TankPrePressure')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('closeexpansiontankhesap')[0]["data"]["TankPrePressure"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.CloseExpansionTank_WaterVolume')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('closeexpansiontankhesap')[0]["data"]["WaterVolume"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.CloseExpansionTank_ExpandingWater')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('closeexpansiontankhesap')[0]["data"]["ExpandingWater"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.CloseExpansionTank_TankVolume')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('closeexpansiontankhesap')[0]["data"]["TankVolume"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.CloseExpansionTank_ValveDiameter')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('closeexpansiontankhesap')[0]["data"]["ValveDiameter"] !!}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-6">
                                                        <b><?=__('staticmessage.CloseExpansionTank_ValveInch')?>:</b>
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <p>{!! session('closeexpansiontankhesap')[0]["data"]["ValveInch"] !!}</p>
                                                    </div>
                                                </div>

                                                <ul class="basic-list list-icons">
                                                    @if(!empty(session('closeexpansiontankhesap')[0]["data"]["Product"]))

                                                      @foreach(session('closeexpansiontankhesap')[0]["data"]["Product"] as  $key => $row )

                                                          <li>
                                                              <div class="row">
                                                                  <div class="col-md-2">
                                                                      <div class="radio radio-inline">
                                                                          <label>
                                                                              <input style="width: 20px;height: 20px;" type="radio" name="closeexpansion" value="{{$row["id"]}}">

                                                                          </label>
                                                                      </div>

                                                                  </div>
                                                                  <div class="col-md-10">
                                                                      <table class="table table-borderless">
                                                                          <thead>
                                                                          <tr>
                                                                              <th>

                                                                                      @if(is_null($row["Banner"]))
                                                                                          <img src="{{asset('/pullbanner/def_pulbanner.png')}}" onclick="detaygoster({{$key}});return false;" height="50" width="50" alt="">

                                                                                      @else
                                                                                          <img src="{{ asset('/pullbanner/' . $row['Banner']) }}" onclick="detaygoster({{$key}});return false;" height="50" width="50" alt="">

                                                                                      @endif

                                                                              </th>
                                                                              <th><img src="{{asset('user1.png')}}" onclick="detaygoster1({{$key}});return false;" width="50" height="50" alt="" >

                                                                              </th>

                                                                              <th><img src="{{asset('user1.png')}}"  width="50" height="50" alt=""  style="margin: auto;display: block">
                                                                                  <p>

                                                                                  </p></th>

                                                                              <th><a target="blank" href="{{asset($row["katalog"])}}">
                                                                                      <img src="{{asset('pdf.png')}}" width="40" height="40" alt="">

                                                                                  </a>
                                                                                  <p>

                                                                                  </p></th>

                                                                          </tr>
                                                                          </thead>
                                                                          <tbody>
                                                                          <tr>
                                                                              <td style="max-width: 250px;">
                                                                                  <p> {{$row["tipi"]}}</p>
                                                                                  <div id="burner{{$key}}" style="display: none;margin-left:-20px;margin-top: 5px; max-width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                                                      <div class="col-lg-12 col-xl-12">
                                                                                          <div class="card-sub">
                                                                                              <div class="card-block" style=" padding: 30px;">
                                                                                                  <h6 style="font-weight: bold;">{{$row["adi"]}}</h6>
                                                                                                  <p><?=__('staticmessage.Mark')?> : {{$row["markasi"]}}</p>

                                                                                                  <p>Standart :  {{$row["standard"]}}</p>

                                                                                                  <p>bbbf_no : {{$row["bbbf_no"]}} </p>
                                                                                                  <p> Su Hacmi : {{$row["su_hacmi"]}} </p>
                                                                                                  <p>Konstruksiyon Basinci : {{$row["konstruksiyon_basinci"]}}</p>
                                                                                                  <p> Yükseklik : {{$row["yuksekligi"]}}</p>
                                                                                                  <p>Uzunluk : {{$row["uzunlugu"]}}</p>
                                                                                                  <p>Genişlik : {{$row["genisligi"]}}</p>
                                                                                                  <p>Agırlık : {{$row["agirligi"]}}</p>
                                                                                                  <p>Giriş Çapı : {{$row["giris_capi"]}}</p>
                                                                                                  <p>Açıklama : {{$row["aciklama"]}}</p>

                                                                                              </div>
                                                                                          </div>
                                                                                      </div>
                                                                                  </div>

                                                                              </td>
                                                                              <td>
                                                                                  <p> {{$row["markasi"]}}</p>
                                                                                  <div id="burner1{{$key}}" style="display: none;margin-left:-20px;margin-top: 5px; max-width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                                                      <div class="col-lg-12 col-xl-12">
                                                                                          <div class="card-sub">
                                                                                              <div class="card-block" style=" padding: 30px;">

                                                                                                  @if(!empty($row["Producer"]["UUretici"]))
                                                                                                      <p>{{$row["Producer"]["UUretici"]}}</p>
                                                                                                  @endif
                                                                                                  @if(!empty($row["Producer"]["UAdres1"]))
                                                                                                      <p>{{$row["Producer"]["UAdres1"]}}</p>
                                                                                                  @endif
                                                                                                  @if(!empty($row["Producer"]["UAdres2"]))
                                                                                                      <p>{{$row["Producer"]["UAdres2"]}}</p>
                                                                                                  @endif
                                                                                                  @if(!empty($row["Producer"]["USemt"]))
                                                                                                      <p>{{$row["Producer"]["USemt"]}}
                                                                                                  @endif
                                                                                                  @if(!empty($row["Producer"]["USehir"]))
                                                                                                     - {{$row["Producer"]["USehir"]}}
                                                                                                  @endif
                                                                                                  @if(!empty($row["Producer"]["UUlke"]))
                                                                                                      - {{$row["Producer"]["UUlke"]}}</p>
                                                                                                  @endif

                                                                                                  @if(!empty($row["Producer"]["UTelefon"]))
                                                                                                      <p>{{$row["Producer"]["UTelefon"]}}</p>
                                                                                                  @endif
                                                                                                  @if(!empty($row["Producer"]["UFaks"]))
                                                                                                      <p> {{$row["Producer"]["UFaks"]}}</p>
                                                                                                  @endif
                                                                                                  @if(!empty($row["Producer"]["UKodu"]))
                                                                                                      <p> {{$row["Producer"]["UKodu"]}}</p>
                                                                                                  @endif

                                                                                              </div>
                                                                                          </div>
                                                                                      </div>

                                                                                  </div>
                                                                              </td>
                                                                              <td><select size="1" style="font-size:16px" required>
                                                                                      <option value="null">Seçim Yapınız</option>

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
                                                        @if (isset(session('closeexpansiontankhesap')[0]["data"]["edit"]) && session('closeexpansiontankhesap')[0]["data"]["edit"]==1)
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
                            </form>
                        </div>
            @endif
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
@section("footerExtra")

    <script type="text/javascript">
        function detaygoster(key) {
            var burnerDiv = document.getElementById("burner" + key);
            if (burnerDiv.style.display === "none") {
                burnerDiv.style.display = "block";
            } else {
                burnerDiv.style.display = "none";
            }
        }
        function detaygoster1(key)
        {

            var burnerDiv = document.getElementById("burner1" + key);
            if (burnerDiv.style.display === "none") {
                burnerDiv.style.display = "block";
            } else {
                burnerDiv.style.display = "none";
            }

        }
    function showmodal(projeid)
    {
        //.usermodaldetail modal divin classı
        var id = projeid;
        $.ajax({
            url : '{{ route("admin.closeexpansiondetail") }}',
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

    function OpeninPressure(val)
    {

        if(val>2.5)
        {
            $('#diyaframli').attr('disabled',true);
            $("#yayli").prop("checked", true);
            //yaylı selected
            //diyaframlı disabled

        }else{
            $("#diyaframli").prop("checked", true);
            $('#diyaframli').attr('disabled',false);
            //yaylı secilebilir diyaframlı secilebilir

        }


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
