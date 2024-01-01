@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Boiler')?></h5>
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
                                <form action="{{route('admin.boilerhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["boiler_id"])) ? null : $projedetay["data"]["boiler_id"] ])}}" method="post">

                                @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" value="<?php echo isset($projedetay["data"][0]["adi"]) ? $projedetay["data"][0]["adi"] :'';?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                                        <div class="col-sm-4">
                                            <textarea rows="5" cols="5" class="form-control" placeholder="Lütfen bir açıklama yazınız" id="aciklama" name="aciklama"><?php echo isset($projedetay["data"][0]["aciklama"]) ? $projedetay["data"][0]["aciklama"] :"";?></textarea>

                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelType')?> :</label>
                                        <div class="col-sm-4">

                                            <select class="form-control" size="1" id="fueltype" onchange="fueltypechange(this.value)" name="fueltype">
                                                <option value="null">Lütfen seçim yapın</option>

                                                @foreach($res_data["data"][0]["Data"] as $row)

                                                @if (!empty($projedetay["data"]["data"]["FuelType"]) && $projedetay["data"]["data"]["FuelType"]==$row["Code"])
                                                        <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                @else

                                                @if (!empty($defaultdd["data"][0]["boiler_FuelType"])&&$defaultdd["data"][0]["boiler_FuelType"]==$row["Code"])

                                                    <option value="{{$row['Code']}}" selected>{{$row['Description']}}</option>

                                                @else
                                                    <option value="{{$row['Code']}}">{{$row['Description']}}</option>
                                                @endif

                                                @endif

                                                @endforeach
                                            </select>

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_HeatNeed')?> :</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round" type="number"  id="heatneed" name="heatneed" value="<?php echo isset($projedetay["data"]["data"]["HeatNeed"]) ? $projedetay["data"]["data"]["HeatNeed"] : 0 ?>">


                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_DistributionPipe')?>:</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" size="1" id="distributionpipe" name="distributionpipe">
                                                <option value="null">Lütfen Seçim Yapınız</option>
                                                @foreach($res_data["data"][1]["Data"] as $row)

                                                @if (isset($projedetay["data"]["data"]["DistributionPipe"]) && $projedetay["data"]["data"]["DistributionPipe"]==$row["Code"])
                                                        <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>
                                                @else
                                                    @if ($defaultdd["data"][0]["boiler_DistributionPipe"]==$row["Code"])
                                                        <option value="{{$row['Code']}}" selected>{{$row['Description']}}</option>
                                                    @else
                                                        <option value="{{$row['Code']}}">{{$row['Description']}}</option>
                                                    @endif

                                                @endif





                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?=__('staticmessage.Piece')?> :</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="number" id="piece" name="piece" value="<?php echo isset($projedetay["data"]["data"]["Piece"]) ? $projedetay["data"]["data"]["Piece"] : $defaultdd["data"][0]["boiler_Piece"] ?>">


                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?=__('staticmessage.Yedek')?> :</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round" type="number"  id="yedek" name="yedek" value="<?php echo isset($projedetay["data"][0]["yedek"]) ? $projedetay["data"][0]["yedek"] : $defaultdd["data"][0]["boiler_yedek"] ?>">


                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_BoilerUnitAvgHeat')?>:</label>
                                        <div class="col-sm-4">
                                            <input class="form-control form-control-round"  type="number" id="kk" name="kk" value="<?php echo  isset($projedetay["data"]["data"]["BoilerUnitAvgHeat"]) ? $projedetay["data"]["data"]["BoilerUnitAvgHeat"] : "0" ?>">
                                        </div>
                                    </div>



                                    <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Marka')?> :</label>
                            <div class="col-sm-4">
                                    <select class="js-example-tags col-sm-12" id="marka" onchange="MarkaChange(this.value)" multiple="multiple" name="brand[]">

                                        @if (!empty($projedetay["BoilerBrand"]["data"]))
                                        @foreach($projedetay["BoilerBrand"]["data"] as $row)

                                        <option value="{{$row["brand"]}}">{{$row["brand"]}}</option>

                                        @endforeach
                                        @endif
                                            <option value="hepsi">Hepsi</option>
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

                        @if (session()->has('boilerhesap'))
                        <div class="col-md-6">

                            <img src="{{asset('/hesapresimler/resmim.jpeg')}}" height="350" width="350" alt="">
                        </div>
                        <div class="col-md-12">
                            @if (isset(session('boilerhesap')[0]["data"]["id"]))
                                <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('boilerhesap')[0]["data"]["id"] !!} </b> <br> <b> Project: {!! session('boilerhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                <br>
                                <br>
                                <form action="{{route('admin.boilerhesapkaydet',["update"=>1,"id"=>isset(session('boilerhesap')[0]["data"]["id"]) ? session('boilerhesap')[0]["data"]["id"] : null ] )}}" method="post">
                                @else
                                <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                <br>
                                <br>
                                <form action="{{route('admin.boilerhesapkaydet')}}" method="post">

                                @endif


                                    @csrf
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Boiler_FuelType')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    @switch(session('boilerhesap')[0]["data"]["FuelType"])
                                                    @case(0)
                                                    <span>Katı</span>
                                                    @break

                                                    @case(1)
                                                    <span>Sıvı</span>
                                                    @break

                                                    @default
                                                    <span>Gaz</span>
                                                    @endswitch
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Boiler_DistributionPipe')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    @switch(session('boilerhesap')[0]["data"]["DistributionPipe"] )
                                                        @case("ZR1")
                                                        <span>Sıcak mahalden izoleli</span>
                                                        @break

                                                        @case("ZR2")
                                                        <span>Soğuk mahalden izoleli</span>
                                                        @break

                                                        @default
                                                        <span>Soğuk mahalden</span>
                                                    @endswitch
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.HeatNeed')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    {!! session('boilerhesap')[0]["data"]["HeatNeed"] !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Piece')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    {!! session('boilerhesap')[0]["data"]["Piece"] !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    {!! session('boilerhesap')[0]["data"]["adi"] !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    {!! session('boilerhesap')[0]["data"]["aciklama"] !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Boiler_BoilerUnitAvgHeat')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('boilerhesap')[0]["data"]["BoilerUnitAvgHeat"] !!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Boiler_BoilerIncreaseFactor')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <p>{!! session('boilerhesap')[0]["data"]["BoilerIncreaseFactor"]!!}</p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6"><b><?=__('staticmessage.Boiler_Capacity')?>:</b></label>
                                                <div class="col-sm-6 col-form-label">
                                                    <b>{!! session('boilerhesap')[0]["data"]["BoilerCapacity"]!!}</b>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-6">
                                                    <b><?=__('staticmessage.Boiler_HeatingSurface')?>:</b>
                                                </label>
                                                <div class="col-sm-6">
                                                    <p>{!! session('boilerhesap')[0]["data"]["HeatingSurface"] !!}</p>
                                                </div>
                                            </div>


                                            <ul class="basic-list list-icons">
                                              @if(!empty(session('boilerhesap')[0]["data"]["Boilers"]))

                                                @foreach(session('boilerhesap')[0]["data"]["Boilers"] as  $key => $row )

                                                    <li style="margin-bottom: 40px;">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="radio radio-inline">
                                                                    <label>
                                                                        <input style="width: 20px;height: 20px;" type="radio" name="boiler" value="{{$row["id"]}}">

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
                                                                                <p> {{$row["Boiler_type"]}}</p>
                                                                            @else
                                                                                <img src="{{ asset('/pullbanner/' . $row['Banner']) }}" onclick="detaygoster({{$key}});return false;" height="50" width="50" alt="">
                                                                                <p> {{$row["Boiler_type"]}}</p>
                                                                            @endif
                                                                        </th>
                                                                        <th><img src="{{asset('user1.png')}}" onclick="detaygoster1({{$key}});return false;" width="50" height="50" alt="" >
                                                                            <p> {{$row["Brand"]}}</p>
                                                                        </th>

                                                                        <th><img src="{{asset('user1.png')}}" onclick="detaygoster2({{$key}});return false;" width="50" height="50" alt=""  style="margin: auto;display: block">
                                                                            <p>
                                                                                Satıcı Seçin
                                                                            </p></th>

                                                                        <th><a target="blank" href="{{asset($row["Catalog"])}}">
                                                                                <img src="{{asset('pdf.png')}}" width="40" height="40" alt="">

                                                                            </a>
                                                                            <p>
                                                                                Katalog
                                                                            </p></th>

                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td style="max-width: 250px;">

                                                                            <div id="burner{{$key}}" style="display: none;margin-left:-20px;margin-top: 5px; max-width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                                                <div class="col-lg-12 col-xl-12">
                                                                                    <div class="card-sub">
                                                                                        <div class="card-block" style=" padding: 30px;">
                                                                                            <h6 style="font-weight: bold;">{{$row["Name"]}}</h6>
                                                                                            <p><?=__('staticmessage.Mark')?> : {{$row["Brand"]}}</p>
                                                                                            <p><?=__('staticmessage.Type')?> : {{$row["Boiler_type"]}}</p>
                                                                                            <p><?=__('staticmessage.Description')?>  : {{$row["Description"]}}</p>
                                                                                            <p>Heat Power : {{$row["HeatPower"]}}</p>
                                                                                            <p>Height : {{$row["B_Height"]}}</p>
                                                                                            <p>Length : {{$row["B_Length"]}}</p>
                                                                                            <p>Width: {{$row["B_Width"]}}</p>
                                                                                            <p>Weight: {{$row["Weight"]}}</p>
                                                                                            <p>Fume Con: {{$row["Fume_Con"]}}
                                                                                            <p>Efficiency: {{$row["Boiler_Eff"]}}</p>

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </td>
                                                                        <td>

                                                                            <div id="burner1{{$key}}" style="display: none;margin-left:-20px;margin-top: 5px; max-width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                                                <div class="col-lg-12 col-xl-12">
                                                                                    <div class="card-sub">
                                                                                        <div class="card-block" style=" padding: 30px;">
                                                                                            <h6 style="font-weight: bold">
                                                                                                @if(!empty($row["Producer"]["Producer"]))
                                                                                                {{$row["Producer"]["Producer"]}}
                                                                                                @endif
                                                                                            </h6>
                                                                                            @if(!empty($row["Producer"]["Address1"]))
                                                                                                <p><i class="feather icon-map-pin"></i> {{$row["Producer"]["Address1"]}}</p>
                                                                                            @endif


                                                                                            @if(!empty($row["Producer"]["Address2"]))
                                                                                                <p><i class="feather icon-map-pin"></i> {{$row["Producer"]["Address2"]}}</p>
                                                                                            @endif
                                                                                            @if(!empty($row["Producer"]["Phone"]))
                                                                                                <p><i class="feather icon-phone"></i>{{$row["Producer"]["Phone"]}}</p>
                                                                                            @endif
                                                                                            @if(!empty($row["Producer"]["Fax"]))
                                                                                                <p><i class="feather icon-printer"></i> {{$row["Producer"]["Fax"]}}</p>
                                                                                            @endif

                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div id="burner2{{$key}}" style="display: none;margin-left:-20px;margin-top: 5px; max-width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                                                <div class="col-lg-12 col-xl-12">
                                                                                    <div class="card-sub">
                                                                                        <div class="card-block" style=" padding: 30px;">
                                                                                            @foreach($row["Seller"] as $rows)
                                                                                                    <div class="row">
                                                                                                        <div class="col-12">

                                                                                                                <input type="radio" value="{{$rows["code"]}}" name="seller">


                                                                                                                {{  $rows["serller"] }}

                                                                                                        </div>
                                                                                                    </div>

                                                                                                </option>
                                                                                            @endforeach

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

{{--                                                                            <select size="1" style="font-size:16px" required>--}}
{{--                                                                                <option value="null">Seçim Yapınız</option>--}}
{{--                                                                                @foreach($row["Seller"] as $rows)--}}
{{--                                                                                        <?php--}}
{{--                                                                                        $sellerName = $rows["serller"];--}}
{{--                                                                                        $trimmedName = strlen($sellerName) > 10 ? substr($sellerName, 0, 10) . '...' : $sellerName;--}}
{{--                                                                                        $tooltip = strlen($sellerName) > 10 ? $sellerName : '';--}}
{{--                                                                                        ?>--}}
{{--                                                                                    <option value="{{$rows["code"]}}" title="{{$tooltip}}">--}}
{{--                                                                                        {{ $trimmedName }}--}}
{{--                                                                                    </option>--}}
{{--                                                                                @endforeach--}}
{{--                                                                            </select>--}}
                                                                        </td>
                                                                        <td></td>
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
                                                    @if (isset(session('boilerhesap')[0]["data"]["edit"]) && session('boilerhesap')[0]["data"]["edit"]==1)
                                                    <input type="submit"  value="<?=__('staticmessage.Güncelle')?>" class="btn btn-warning btn-round waves-effect waves-light"></input>
                                                    @else
                                                    <input type="submit"  value="<?=__('staticmessage.Kaydet')?>" class="btn btn-info btn-round waves-effect waves-light"></input>
                                                    @endif

                                                </div>
                                            </div>
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
    function detaygoster2(key)
    {

        var burnerDiv = document.getElementById("burner2" + key);
        if (burnerDiv.style.display === "none") {
            burnerDiv.style.display = "block";
        } else {
            burnerDiv.style.display = "none";
        }

    }
    function fueltypechange(val)
    {
      let fueltype = val
      if(fueltype==0)
      {
          $("#kk").val(7000);
      }else if(fueltype==1)
      {
          $("#kk").val(9300);
      }else if(fueltype==2)
      {
          $("#kk").val(9300);
      }else{
          $("#kk").val(0);
      }

    }

   let deger =  $('#fueltype').val();
   if(deger==0)
      {
          $("#kk").val(7000);
      }else if(deger==1)
      {
          $("#kk").val(9300);
      }else if(deger==2)
      {
          $("#kk").val(9300);
      }else{
          $("#kk").val(0);
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
