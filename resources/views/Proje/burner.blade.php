@extends('layout.default')
@section('content')
<div class="page-header card" >
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-box bg-c-blue"></i>
                    <div class="d-inline">
                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Brülör')?>  </h5>
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
                        <form action="{{route('admin.burnerhesap',['edit'=>($projedetay["data"]["edit"]==1) ? 1 : 0,'id'=>(empty($projedetay["data"]["burner_id"])) ? null : $projedetay["data"]["burner_id"] ])}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?>:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="adi" value="<?php echo !empty($projedetay["adi"] ) ? $projedetay["adi"] :"";?>" class="form-control form-control-round"
                                    placeholder="Lütfen proje isim veriniz">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?>:</label>
                                <div class="col-sm-4">
                                    <input type="text" name="aciklama" value="<?php echo isset($projedetay["aciklama"] ) ? $projedetay["aciklama"] :"";?>" class="form-control form-control-round"
                                    placeholder="Açıklama yazınız...">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.Boiler_Capacity')?>:</label>
                                <div class="col-sm-4">
                                    <input type="number" name="BoilerCapacity" value="<?php echo isset($projedetay["projedetay"]["data"]["BoilerCapacity"]) ? $projedetay["projedetay"]["data"]["BoilerCapacity"] : $defaultdd["data"][0]["burner_BoilerCapacity"] ?>" class="form-control form-control-round"
                                    placeholder="Lütfen paremetre yazınız">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.LiquitFuelType')?>:</label>
                                <div class="col-sm-4">
                                    <select name="LiquitFuelType" id="LiquitFuelType" class="form-control form-control-primary">
                                        <option selected>Lütfen seçim yapın</option>

                                        @foreach($res_data["data"][3]["Data"] as $row)

                                        @if (isset($projedetay["projedetay"]["data"]["LiquitFuelType"]) && $projedetay["projedetay"]["data"]["LiquitFuelType"]==$row["Name"])
                                                <option value="{{$row["Name"]}}" selected>{{$row["Name"]}}</option>
                                        @else
                                            @if ($defaultdd["data"][0]["burner_LiquitFuelType"]==$row["Name"])
                                                <option value="{{$row['Name']}}" selected>{{$row['Name']}}</option>
                                            @else
                                                <option value="{{$row['Name']}}">{{$row['Name']}}</option>
                                            @endif

                                        @endif
                                        @endforeach
                                    </select>


                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label"><?=__('staticmessage.burner_efficiency')?>:</label>
                                <div class="col-sm-4">
                                    <input type="number" name="BurnerEfficiency"  class="form-control form-control-round"
                                    placeholder="Zorunlu alan değildir" value="<?php echo isset($projedetay["projedetay"]["data"]["BurnerEfficiency"]) ? $projedetay["projedetay"]["data"]["BurnerEfficiency"] : $defaultdd["data"][0]["burner_BurnerEfficiency"] ?>">

                                </div>
                            </div>
                            <div class="form-group row">
                            <label class="col-sm-4 col-form-label"><?=__('staticmessage.Marka')?> :</label>
                            <div class="col-sm-4">
                                    <select class="js-example-tags col-sm-12" id="marka" onchange="MarkaChange(this.value)" multiple="multiple" name="brand[]">
                                        <option value="hepsi">Hepsi</option>
                                        @if (!empty($projedetay["BurnerBrand"]["data"]))
                                        @foreach($projedetay["BurnerBrand"]["data"] as $row)

                                        <option value="{{$row["brand_code"]}}">{{$row["brand_code"]}}</option>

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
                    @if (session()->has('burnerhesap'))
                    <div class="col-md-6">

                            <img src="{{asset('/hesapresimler/04burner.png')}}" height="350" width="350" alt="">
                    </div>
                            <div class="col-md-12">
                            @if (isset(session('burnerhesap')[0]["data"]["id"]))
                                    <h4 class="modal-title"><?=__('staticmessage.duzenlenenprojedetaylari')?> </br> <b>No: {!! session('burnerhesap')[0]["data"]["id"] !!} </b> <br> <b> Project : {!! session('burnerhesap')[0]["data"]["adi"] !!} </b>  </h4>
                                    <br>
                                    <br>
                                    <form action="{{route('admin.burnerhesapkaydet',["update"=>1,"id"=>isset(session('burnerhesap')[0]["data"]["id"]) ? session('burnerhesap')[0]["data"]["id"] : null ])}}" method="post">

                                    @else
                                        <h4 class="modal-title"><?=__('staticmessage.projedetaylari')?></h4>
                                        <br>
                                        <br>
                                        <form action="{{route('admin.burnerhesapkaydet')}}" method="post">
                                            @endif
                                            @csrf
                                            <div class="card-block">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6"><b><?=__('staticmessage.Name')?>:</b></label>
                                                                    <div class="col-sm-6 col-form-label">
                                                                        <p>{!! session('burnerhesap')[0]["data"]["adi"] !!}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6"><b><?=__('staticmessage.Description')?>:</b></label>
                                                                    <div class="col-sm-6 col-form-label">
                                                                        <p>{!! session('burnerhesap')[0]["data"]["aciklama"] !!}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6"><b><?=__('staticmessage.FuelType')?>:</b></label>
                                                                    <div class="col-sm-6 col-form-label">
                                                                        <p>{!! session('burnerhesap')[0]["data"]["LiquitFuelType"] !!}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6"><b><?=__('staticmessage.Boiler_Capacity')?>:</b></label>
                                                                    <div class="col-sm-6 col-form-label">
                                                                        <p>{!! session('burnerhesap')[0]["data"]["BoilerCapacity"] !!}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6"><b><?=__('staticmessage.burner_efficiency')?>:</b></label>
                                                                    <div class="col-sm-6 col-form-label">
                                                                        <b>{!! session('burnerhesap')[0]["data"]["BurnerEfficiency"] !!}</b>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">
                                                                        <b><?=__('staticmessage.burner_lowerheatvalue')?>:</b>
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <p>{!! session('burnerhesap')[0]["data"]["LowerHeatValue"] !!}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-6">
                                                                        <b><?=__('staticmessage.burner_capacity')?>:</b>
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <p>{!! bcdiv(session('burnerhesap')[0]["data"]["Capacity"],1,2)  !!}</p>
                                                                    </div>
                                                                </div>
                                                                <ul class="basic-list list-icons">
                                                                    @if(!empty(session('burnerhesap')[0]["data"]["Burners"]))
                                                                    @foreach(session('burnerhesap')[0]["data"]["Burners"] as  $key => $row )

                                                                    <li>
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <div class="radio radio-inline">
                                                                                    <label>
                                                                                        <input style="width: 20px;height: 20px;" type="radio" name="burner" value="{{$row["id"]}}">

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

                                                                                        <th><a target="blank" href="{{asset($row["Catalog"])}}">
                                                                                                <img src="{{asset('pdf.png')}}" width="40" height="40" alt="">

                                                                                            </a>
                                                                                        <p>

                                                                                        </p></th>

                                                                                    </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td style="max-width: 250px;">
                                                                                            <p> {{$row["Boiler_type"]}}</p>
                                                                                            <div id="burner{{$key}}" style="display: none;margin-left:-20px;margin-top: 5px; max-width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                                                                <div class="col-lg-12 col-xl-12">
                                                                                                    <div class="card-sub">
                                                                                                        <div class="card-block" style=" padding: 30px;">
                                                                                                            <h6 style="font-weight: bold;">{{$row["Name"]}}</h6>
                                                                                                            <p><?=__('staticmessage.Mark')?> : {{$row["Brand"]}}</p>
                                                                                                            <p><?=__('staticmessage.Type')?> : {{$row["Boiler_type"]}}</p>
                                                                                                            <p><?=__('staticmessage.Description')?>  : {{$row["Description"]}}</p>
                                                                                                            <p>Min : {{$row["MinCapacity"]}}</p>
                                                                                                            <p>Max : {{$row["MaxCapacity"]}}</p>
                                                                                                            <p>Fuel Type : {{$row["LiquitFuelType"]}}</p>
                                                                                                            <p>Motor Power : {{$row["Motor_Power"]}}</p>
                                                                                                            <p>Type : {{$row["Type"]}}</p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                        </td>
                                                                                        <td>
                                                                                            <p> {{$row["Brand"]}}</p>
                                                                                            <div id="burner1{{$key}}" style="display: none;margin-left:-20px;margin-top: 5px; max-width: 300px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                                                                                <div class="col-lg-12 col-xl-12">
                                                                                                    <div class="card-sub">
                                                                                                        <div class="card-block" style=" padding: 30px;">
                                                                                                            <h6 style="font-weight: bold">{{$row["Producer"]["Producer"]}}</h6>


                                                                                                            <p> {{$row["Producer"]["Address1"]}}</p>
                                                                                                            @if(!empty($row["Producer"]["Address2"]))
                                                                                                                <p> {{$row["Producer"]["Address2"]}}</p>
                                                                                                            @endif
                                                                                                            @if(!empty($row["Producer"]["Phone"]))
                                                                                                                <p>{{$row["Producer"]["Phone"]}}</p>
                                                                                                            @endif
                                                                                                            @if(!empty($row["Producer"]["Fax"]))
                                                                                                                <p> {{$row["Producer"]["Fax"]}}</p>
                                                                                                            @endif

                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                            </div>
                                                                                        </td>
                                                                                        <td><select size="1" style="font-size:16px" required>
                                                                                                <option value="null">Seçim Yapınız</option>
                                                                                                @foreach($row["Seller"] as $rows)
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

                                                                <div class="form-group row" style="margin-top: 20px;">
                                                                    <label class="col-sm-6">
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        @if (isset(session('burnerhesap')[0]["data"]["edit"]) && session('burnerhesap')[0]["data"]["edit"]==1)
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
            url : '{{ route("admin.burnerdetail") }}',
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
