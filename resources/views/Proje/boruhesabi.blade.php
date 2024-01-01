
@extends('layout.default')
@section('content')
    {{--    <div class="page-header card" >--}}
    {{--        <div class="row align-items-end">--}}
    {{--            <div class="col-lg-8">--}}
    {{--                <div class="page-header-title">--}}
    {{--                    <i class="feather icon-box bg-c-blue"></i>--}}
    {{--                    <div class="d-inline">--}}
    {{--                        <h5><?=__('staticmessage.Hesapislemleri')?> / <?=__('staticmessage.Boiler')?></h5>--}}
    {{--                        <h6>{{$projedetay["data"]["proje_id"]}}-{{$projedetay["data"]["proje_adi"]}}</h6>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}
    {{--    </div>--}}
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{route('admin.boruhesap')}}" method="post">

                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Name')?> :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-round"  type="text" id="adi" name="adi" placeholder="Lütfen projeye isim veriniz" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.Description')?> :</label>
                                    <div class="col-sm-4">
                                        <textarea rows="5" cols="5" class="form-control" placeholder="Lütfen bir açıklama yazınız" id="aciklama" name="aciklama"></textarea>

                                    </div>
                                </div>



                                {{--                                <div class="form-group row">--}}
                                {{--                                    <label class="col-sm-4 col-form-label"><?=__('staticmessage.FuelType')?> :</label>--}}
                                {{--                                    <div class="col-sm-4">--}}

                                {{--                                        <select class="form-control" size="1" id="fueltype" onchange="fueltypechange(this.value)" name="fueltype">--}}
                                {{--                                            <option value="null">Lütfen seçim yapın</option>--}}

                                {{--                                            @foreach($res_data["data"][0]["Data"] as $row)--}}

                                {{--                                                @if (!empty($projedetay["data"]["data"]["FuelType"]) && $projedetay["data"]["data"]["FuelType"]==$row["Code"])--}}
                                {{--                                                    <option value="{{$row["Code"]}}" selected>{{$row["Description"]}}</option>--}}
                                {{--                                                @else--}}

                                {{--                                                    @if (!empty($defaultdd["data"][0]["boiler_FuelType"])&&$defaultdd["data"][0]["boiler_FuelType"]==$row["Code"])--}}

                                {{--                                                        <option value="{{$row['Code']}}" selected>{{$row['Description']}}</option>--}}

                                {{--                                                    @else--}}
                                {{--                                                        <option value="{{$row['Code']}}">{{$row['Description']}}</option>--}}
                                {{--                                                    @endif--}}

                                {{--                                                @endif--}}

                                {{--                                            @endforeach--}}
                                {{--                                        </select>--}}

                                {{--                                    </div>--}}
                                {{--                                </div>--}}




                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Min Isı :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-round"  type="number" id="piece" name="minisi" >


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Max Isı :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-round"  type="number" id="piece" name="maxisi" >


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Gidiş Derece :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-round"  type="number" id="piece" name="gidis" >


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Dönüş Derece :</label>
                                    <div class="col-sm-4">
                                        <input class="form-control form-control-round"  type="number" id="piece" name="donus" >


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Akışkan Tipi:</label>
                                    <div class="col-sm-4">
                                        <select class=" form-control col-sm-12" name="akiskan">
                                            <option value="hepsi">Su</option>
                                        </select>


                                    </div>
                                </div>
                                <div class="form-group row">
                                    <h5 style="margin: auto">Debi Bilgisi</h5>
                                </div>
                                <div class="form-group row">
                                    <div class="col-2">
                                        <label class="col-sm-4 col-form-label">Ad:</label>
                                    </div>
                                    <div class="col-2">
                                        <label class="col-sm-4 col-form-label">Bağlantı:</label>
                                    </div>
                                    <div class="col-2">
                                        <label class="col-sm-4 col-form-label">H.Yükü:</label>
                                    </div>
                                    <div class="col-2">
                                        <label class="col-sm-4 col-form-label">P.Yükü:</label>
                                    </div>
                                    <div class="col-2">
                                        <label class="col-sm-4 col-form-label">Uzn:</label>
                                    </div>
                                    <div class="col-2">
                                        <label class="col-sm-4 col-form-label">Tipi:</label>
                                    </div>

                                </div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const selectElement = document.querySelector(".form-control[name='parca']");

        // Örnek bir projedetayData nesnesi (verileri kendi projenize göre güncellemelisiniz)
        const projedetayData = {
            flanged: [
                { id: 'flan1', types: 'Flanşlı Seçenek 1' },
                { id: 'flan2', types: 'Flanşlı Seçenek 2' },
                // Diğer Flanşlı Seçenekler
            ],
            screwed: [
                { id: 'dis1', types: 'Dişli Seçenek 1' },
                { id: 'dis2', types: 'Dişli Seçenek 2' },
                // Diğer Dişli Seçenekler
            ]
        };

        // Sayfa yüklendiğinde varsayılan olarak Flanşlı seçeneği seçili olacak
        projedetayData.flanged.forEach(option => {
            const optionElement = document.createElement("option");
            optionElement.value = option.id;
            optionElement.textContent = option.types;
            selectElement.appendChild(optionElement);
        });

        // Radyo düğmeleri değiştirildiğinde seçenekleri güncelle
        const flansliRadio = document.querySelector("input[name='parcalar'][value='1']");
        const disliRadio = document.querySelector("input[name='parcalar'][value='2']");

        flansliRadio.addEventListener("change", function () {
            selectElement.innerHTML = "";
            projedetayData.flanged.forEach(option => {
                const optionElement = document.createElement("option");
                optionElement.value = option.id;
                optionElement.textContent = option.types;
                selectElement.appendChild(optionElement);
            });
        });

        disliRadio.addEventListener("change", function () {
            selectElement.innerHTML = "";
            projedetayData.screwed.forEach(option => {
                const optionElement = document.createElement("option");
                optionElement.value = option.id;
                optionElement.textContent = option.types;
                selectElement.appendChild(optionElement);
            });
        });
    });

</script>
                                <div class="form-group row" id="eklenenBilgi">
                                    <!-- Eklenecek içerik burada olacak -->
                                </div>
                                <div class="form-group row">

                                    <div onClick="ekle()" class="col-sm-4 form-control form-control-round" style="background-color: #0a6aa1;color: white;text-align: center;display: block;margin: auto;">
                                        Ekle
                                    </div>
                                </div>



                                <script>



                                    let key = 0;

                                    function ekle() {
                                        key++;
                                        const eklenenBilgi = document.getElementById("eklenenBilgi");
                                        const yeniBilgi = document.createElement("div");
                                        yeniBilgi.className = "form-group row";

                                        yeniBilgi.innerHTML = `
            <div class="col-2">
                <input class="form-control form-control-round" placeholder="Adı" type="text" name="sutun1[${key}][debiadi]">
            </div>
            <div class="col-2">
                <input class="form-control form-control-round" placeholder="Bağlantı" type="text" name="sutun1[${key}][debibag]">
            </div>
            <div class="col-2">
                <input class="form-control form-control-round" placeholder="H. Yükü" type="text" name="sutun1[${key}][debihat]">
            </div>
            <div class="col-2">
                <input class="form-control form-control-round" placeholder="P. Yükü" type="text" name="sutun1[${key}][debiparca]">
            </div>
            <div class="col-2">
                <input class="form-control form-control-round" placeholder="Uzunluk" type="text" name="sutun1[${key}][debiuz]">
            </div>
            <div class="col-1">
                <select class="form-control col-sm-12" name="sutun1[${key}][debitip]">
                    <option value="hepsi">Hepsi</option>
                </select>
            </div>
            <div class="col-1">
                <div onClick="ekleOzel(${key})" class="col-sm-12 form-control form-control-round" style="background-color: #0a6aa1;color: white;text-align: center;display: block;margin: auto;">
                    +
                </div>
            </div>
            <div style="width: 100%" id="ozel${key}"></div>
        `;

                                        eklenenBilgi.appendChild(yeniBilgi);
                                    }

                                    function ekleOzel(index) {
                                        const projedetayData = @json($projedetay);
                                        const eklenenOzel = document.getElementById(`ozel${index}`);
                                        const yeniOzelBilgi = document.createElement("div");
                                        yeniOzelBilgi.className = "form-group row";

                                        yeniOzelBilgi.innerHTML = `
            <div class="col-4">
                <input class="form-control form-control-round" placeholder="Özel Parça Adı" type="text" name="sutun1[${index}][ozel][${key}][ozeladi]">
            </div>
            <div class="col-2">
                <label>
                    <input style="width: 20px;height: 20px;" type="radio" name="parcalar" value="1" checked onclick="updateSelectOptions(${index}, '1')">

                    <h6>Flanşlı</h6>
                </label>
            </div>
            <div class="col-2">
                <label>
                    <input style="width: 20px;height: 20px;" type="radio" name="parcalar" value="2" onclick="updateSelectOptions(${index}, '2')">
                    <h6>Dişli</h6>
                </label>
            </div>
            <div class="col-4">

                    <select class="form-control" id="parcalar${index}" name="parca${index}">


                    </select>


            </div>
`;

                                        eklenenOzel.appendChild(yeniOzelBilgi);

                                        // Seçenekleri doldurmak için yeni bir fonksiyon çağırın
                                        doldurSelect(`parcalar${index}`, projedetayData.flanged);
                                    }
                                    function doldurSelect(selectId, options) {

                                        const select = document.getElementById(selectId);

                                        options.forEach(option => {
                                            var optionElement = document.createElement("option");
                                            optionElement.value = option.id;
                                            optionElement.text = option.types;
                                            select.appendChild(optionElement);
                                        });
                                    }
                                    function updateSelectOptions(index, selectedValue) {
                                        var parcalar= @json($projedetay);
                                        const selectElement = document.getElementById(`parcalar${index}`);
                                        selectElement.innerHTML = ''; // Önce mevcut seçenekleri temizle
                                        console.log(parcalar);
                                        let options = [];

                                        if (selectedValue === '1') { // Flanşlı seçildiyse
                                            options = parcalar.flanged;
                                        } else if (selectedValue === '2') { // Dişli seçildiyse
                                            options = parcalar.screwed;
                                        }

                                        options.forEach(option => {
                                            const optionElement = document.createElement('option');
                                            optionElement.value = option.id;
                                            optionElement.text = option.types;
                                            selectElement.appendChild(optionElement);
                                        });
                                    }

                                </script>



                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">

                                            <button  class="btn btn-info btn-round waves-effect waves-light" id="hesapla"><?=__('staticmessage.Hesapla')?></button>


                                    </div>
                                </div>





                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("footerExtra")

@endsection
