<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Vendor  Invoice PDF Template</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'><link rel="stylesheet" href="./style.css">
<style>
  .print-container {
    max-width: 900px;
    margin: 30px auto;
    background: white;
    padding: 10px 30px;
  }
  .print-container .header {
    margin-bottom: 20px;
    border-bottom: 1px solid #dbdbdb;
    padding-bottom: 20px;
  }
  .print-container table {
    margin-top: 30px;
  }
  .print-container table tbody tr.no-border:first-child {
    opacity: 0.6 !important;
  }
  .print-container .summary-table {
    border: 1px solid #DDE1E4;
  }
  .print-container .summary-table tr td:last-child {
    text-align: right;
  }
  .print-container .summary-table tr th:last-child {
    text-align: right;
  }
  .print-container .summary-table td {
    border-left: 1px solid #dbdbdb;
  }
  .print-container .summary-table th {
    border-left: 1px solid #dbdbdb;
  }
  .print-container .summary-table thead {
    color: #737F8B;
  }
  .print-container .ft-18 {
    font-size: 20px;
    margin-bottom: 10px;
  }
  .print-container .adder {
    font-size: 16px;
    font-weight: 500;
    text-align: right;
    border-left: 0;
    border-right: 0;
    border-bottom: 0;
  }
  .print-container .total {
    font-size: 22px;
  }
  .print-container .mega {
    font-size: 33px;
    margin-bottom: 10px;
  }

  .invoice-logo {
    height: 80px;
    width: auto;
  }

  .other-rates {
    float: right;
    width: 350px;
    text-align: right;
  }
  .other-rates dl {
    width: 100%;
    margin-bottom: 5px;
  }
  .other-rates dl.total {
    border-top: 1px solid #dbdbdb;
    padding-top: 10px;
  }
  .other-rates dt {
    width: 50%;
    float: left;
  }
  .other-rates dd {
    width: 50%;
    float: left;
    padding-right: 10px;
    margin: 0;
  }

  .invoice-from {
    float: right;
  }

  .summary-info {
    border-bottom: 1px solid #dbdbdb;
    margin-bottom: 20px;
    padding-bottom: 10px;
  }

  .heading {
    border-bottom: 1px solid #dbdbdb;
  }

  .sub-heading .billto {
    padding: 10px 0;
  }

  @media print {
    h1, h2, h3, h4, h5, h6 {
      font-weight: bold;
    }
    h1:first-letter, h2:first-letter, h3:first-letter, h4:first-letter, h5:first-letter, h6:first-letter {
      font-size: inherit;
    }
  }
  .invoice-details {
    float: right;
  }

  .ft-12 {
    font-size: 12px;
  }
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="print-container clearfix">
  <div class="header">
    <div class="sub-header">
    <div class="content">
      <table style="width:100%">
        <tr style="width:100%" class="heading">
          <td colspan="3">
                      <img class="invoice-logo" src="https://upload.wikimedia.org/wikipedia/commons/8/82/Dell_Logo.png" alt="" />
          </td>
          <td class="text-right">
            <div class="invoice-from" style="max-width:400px">
              <h3 class="mega">INVOICE</h3>
          <h6 class="grey">Reckosnys Tech Pvt Limited</h6>
          <P>Reckonsys Tech Labs Pvt. Ltd
T1, Royal Space, 154, 5th Main Road
7th Sector, HSR Layout
Bangalore, Karnataka 560102
India
                <br />
            <strong> mohan@reckonsys.com</strong>
            <br /> <strong>+123-233-2222</strong></P>
            </div>
            
          </td>
        </tr>
          <tr class="sub-heading">
            <td colspan="3">
                <div class="billto">
                  <strong><big>Solar Energy Hesabı</strong></big> <br />
                  Ant Mekanik <br />
                  Proje No #{{$items["projedetay"]["data"][0]["solarenergy_id"]}} <br />
                  Proje Tarihi:{{$items["projedetay"]["data"][0]["tarih"]}} <br />
                  Proje # Solar Energy Hesabı
                  
                </div>    
            </td>
            <td class="">
                <div class="invoice-details">
                  <strong>Invoice Number : </strong> IN_123456_MMDDYY <br />
                  <strong>Invoice Duration : </strong> 29 Aug 2016 - 29 Sep 2016 <br />
                  <strong>Invoice Date: </strong> 23 Sep 2016 <br />
                  <strong>Invoice Amount : </strong> $ 12, 333, 333,333 <br />
                </div>    
            </td>
        </tr>
      </table>
    </div>
  </div>
  <div class="body">
      
    <div class="summary-info">
       <table class="table summary-table">
        <?php //dd($items); ?>

  <tbody>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_Adi');?></th>
      <td>{{$items["projedetay"]["data"][0]["adi"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_Aciklama');?></th>
      <td>{{$items["projedetay"]["data"][0]["aciklama"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_Location');?></th>
      <td>{{$items["projedetay"]["data"][0]["Location"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_BuildType');?></th>
      <td>{{$items["projedetay"]["data"][0]["BuildType"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_NumberOfPeople');?></th>
      <td>{{$items["projedetay"]["data"][0]["NumberOfPeople"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_SafetyFactor');?></th>
      <td> {{$items["projedetay"]["data"][0]["SafetyFactor"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_CapacityCoverageRate');?></th>
      <td>{{$items["projedetay"]["data"][0]["CapacityCoverageRate"]}}
    </td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_CollectorBrand');?></th>
      <td>{{$items["projedetay"]["data"][0]["CollectorBrand"]}}</td>

    </tr>

    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_CollectorType');?></th>
      <td>{{$items["projedetay"]["data"][0]["CollectorType"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_TempIn');?></th>
      <td>{{$items["projedetay"]["data"][0]["TempIn"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_TempOut');?></th>
      <td>{{$items["projedetay"]["data"][0]["TempOut"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_SpecificHeat');?></th>
      <td>{{$items["projedetay"]["data"][0]["SpecificHeat"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_Density');?></th>
      <td>{{$items["projedetay"]["data"][0]["Density"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_CollectorSurface');?></th>
      <td>{{$items["projedetay"]["data"][0]["CorrectionFactor"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_CollectorEfficiency');?></th>
      <td>{{$items["projedetay"]["data"][0]["CollectorEfficiency"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_CollectorSurface');?></th>
      <td>{{$items["projedetay"]["data"][0]["CollectorSurface"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_DailyWaterConsumption');?></th>
      <td>{{$items["projedetay"]["data"][0]["DailyWaterConsumption"]}}</td>
    </tr>

    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_TemperatureDiff');?></th>
      <td>{{$items["projedetay"]["data"][0]["TemperatureDiff"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_DailyWaterNeed');?></th>
      <td>{{$items["projedetay"]["data"][0]["DailyWaterNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_DailyEnergyNeed');?><</th>
      <td>{{$items["projedetay"]["data"][0]["DailyEnergyNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_CollectorUsefulEnergy');?></th>
      <td>{{$items["projedetay"]["data"][0]["CollectorUsefulEnergy"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_CollectorNeeded');?></th>
      <td>{{$items["projedetay"]["data"][0]["CollectorNeeded"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Solarenergy_TotalSurfaceArea');?></th>
      <td>{{$items["projedetay"]["data"][0]["TotalSurfaceArea"]}}</td>

    </tr>
    

    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount1_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount1_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount1_NumberOfPanel"]}}</td>
    </tr>



    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount2_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount2_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount2_NumberOfPanel"]}}</td>
    </tr>


    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount3_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount3_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount3_NumberOfPanel"]}}</td>
    </tr>


    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount4_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount4_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount4_NumberOfPanel"]}}</td>
    </tr>

    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount5_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount5_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount5_NumberOfPanel"]}}</td>
    </tr>


    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount6_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount6_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount6_NumberOfPanel"]}}</td>
    </tr>

    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount7_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount7_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount7_NumberOfPanel"]}}</td>
    </tr>

    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount8_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount8_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount8_NumberOfPanel"]}}</td>
    </tr>

    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount9_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount9_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount9_NumberOfPanel"]}}</td>
    </tr>

    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount10_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount10_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount10_NumberOfPanel"]}}</td>
    </tr>

    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount11_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount11_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount11_NumberOfPanel"]}}</td>
    </tr>

    <tr class="simple">
      <th scope="row">Güneş radyasyonu (w/m2)</th>
      <td>{{$items["projedetay"]["data"][0]["mount12_SolarRadiation"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Sistem ihtiyacı </th>
      <td>{{$items["projedetay"]["data"][0]["mount12_SystemNeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Panel sayısı </th>
      <td>{{$items["projedetay"]["data"][0]["mount12_NumberOfPanel"]}}</td>
    </tr>
  </tbody>
      </table>
         
      
   
  
</body>
</html>
