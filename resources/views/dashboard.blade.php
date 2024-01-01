@extends('layout.default')
@section('content')
<div class="page-header card">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="feather icon-home bg-c-blue"></i>
                <div class="d-inline">
                    <h5><?=__('staticmessage.Anasayfa')?></h5>
                    <span>İstatiksel veriler listelenmiştir</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class=" breadcrumb breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Anasayfa</a> </li>
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
                    <div class="col-md-6 col-xl-6">
                        <div class="card comp-card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-b-25">Kullanıcı</h6>
                                        <h3 class="f-w-700 text-c-blue"><?=$result["data"]["KullaniciSayisi"]?> Kişi</h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card comp-card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-b-25">Yetkili</h6>
                                        <h3 class="f-w-700 text-c-green"><?=$result["data"]["AdminSayisi"]?> Kişi</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xl-12">
                        <div class="card comp-card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-b-25">Proje</h6>
                                        <h3 class="f-w-700 text-c-orenge"><?=$result["proje"]["adi"]?></h3>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <h5>Proje İstatistigi</h5>
                            </div>
                            <div class="card-block">
                                <div id="columnchart_material"></div>
                            </div>
                            </div>
                    </div>

                </div>

                

            </div>
        </div>
    </div>
</div>

@endsection
@section("footerExtra")
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

    google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Proje', 'Adet'],
          ['<?=__('staticmessage.Boiler')?>', <?=$result["data"]["Boiler"]?>],
          ['<?=__('staticmessage.Boyler')?>',<?=$result["data"]["Boyler"]?>],
          ['<?=__('staticmessage.Brülör')?>',<?=$result["data"]["Burner"]?>],
          ['<?=__('staticmessage.Dolasimpompasi')?>',<?=$result["data"]["Circulationpump"]?>],
          ['<?=__('staticmessage.Kapaligenlesme')?>', <?=$result["data"]["Closeexpansion"]?>],
          ['<?=__('staticmessage.Sogukdepo')?>', <?=$result["data"]["Coldstorage"]?>],
          ['<?=__('staticmessage.Kollektor')?>', <?=$result["data"]["Collector"]?>],
          ['<?=__('staticmessage.KazanHesabiFuelAmount')?>', <?=$result["data"]["Fuelamount"]?>],
          ['<?=__('staticmessage.KazanHesabıFuelAmountYearly')?>', <?=$result["data"]["Fuelamountyearly"]?>],
          ['<?=__('staticmessage.Isıdegistirici')?>', <?=$result["data"]["Heatexchanger"]?>],
          ['<?=__('staticmessage.Hidrofor')?>', <?=$result["data"]["Hydrophore"]?>],
          ['<?=__('staticmessage.Acikgenlesme')?>', <?=$result["data"]["Openexpansion"]?>],
          ['<?=__('staticmessage.Davlumbaz')?>', <?=$result["data"]["Paddlebox"]?>],
          ['<?=__('staticmessage.Otopark')?>', <?=$result["data"]["Parkingventilation"]?>],
          ['<?=__('staticmessage.Boruyalitim')?>', <?=$result["data"]["Pipeinsulation"]?>],
          ['<?=__('staticmessage.Borubasinc')?>', <?=$result["data"]["Pipe"]?>],
          ['<?=__('staticmessage.Havuz')?>', <?=$result["data"]["Pool"]?>],
          ['<?=__('staticmessage.Yagmursuyu')?>', <?=$result["data"]["Rainwater"]?>],
          ['<?=__('staticmessage.Gunes')?>', <?=$result["data"]["Solarenergy"]?>],
          ['<?=__('staticmessage.Siginak')?>', <?=$result["data"]["Shelterventilation"]?>],
        ]);

        var options = {
          chart: {
            title: 'Sistem"de Kayıtlı Proje Listesinin İstatistiği',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    }
  
</script>
@endsection

