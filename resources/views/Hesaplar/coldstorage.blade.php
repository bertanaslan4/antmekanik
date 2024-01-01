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
                  <strong><big>Cold Storage Hesabı</strong></big> <br />
                  Ant Mekanik <br />
                  <?php //dd($items); ?>
                  Proje No #{{$items["projedetay"]["data"][0]["id"]}} <br />
                  Proje Tarihi:{{$items["projedetay"]["data"][0]["tarih"]}} <br />
                  Proje #Cold Storage Hesabı
                  
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

  <tbody>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_Adi');?></th>
      <td>{{$items["projedetay"]["data"][0]["adi"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_Acikalma');?></th>
      <td>{{$items["projedetay"]["data"][0]["aciklama"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_ProductType');?></th>
      <td>{{$items["projedetay"]["data"][0]["ProductType"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_EnclosureType');?></th>
      <td>{{$items["projedetay"]["data"][0]["EnclosureType"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_ProductQuantity');?></th>
      <td>{{$items["projedetay"]["data"][0]["ProductQuantity"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_EntryTemp');?></th>
      <td>{{$items["projedetay"]["data"][0]["EntryTemp"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_HeatGain');?></th>
      <td> {{$items["projedetay"]["data"][0]["HeatGain"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_LightingLoad');?></th>
      <td> {{$items["projedetay"]["data"][0]["LightingLoad"]}}</td>

    </tr>

    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_EngineLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["EngineLoad"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_OtherLoads');?></th>
      <td>{{$items["projedetay"]["data"][0]["OtherLoads"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_NumberOfPeople');?></th>
      <td>{{$items["projedetay"]["data"][0]["NumberOfPeople"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_StorageVolume');?></th>
      <td>{{$items["projedetay"]["data"][0]["StorageVolume"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_SystemSafetyHike');?></th>
      <td>{{$items["projedetay"]["data"][0]["SystemSafetyHike"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_BreathingHeat');?></th>
      <td>{{$items["projedetay"]["data"][0]["BreathingHeat"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_BreathingHeatExample');?></th>
      <td>{{$items["projedetay"]["data"][0]["BreathingHeatExample"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_OutdoorEnthalpy');?></th>
      <td>{{$items["projedetay"]["data"][0]["OutdoorEnthalpy"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_IndoorEnthalpy');?></th>
      <td>{{$items["projedetay"]["data"][0]["IndoorEnthalpy"]}}</td></tr>

 
    
    
    
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_TotalLightingLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["TotalLightingLoad"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_ElectricalLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["ElectricalLoad"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_ElectricalLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["ElectricalLoad"]}}</td>

    </tr><tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_TotalOtherLoads');?></th>
      <td>{{$items["projedetay"]["data"][0]["TotalOtherLoads" ]}}</td>

    </tr>
    
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_PeopleLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["PeopleLoad"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_VentilationLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["VentilationLoad" ]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_TotalHeatGain');?></th>
      <td>{{$items["projedetay"]["data"][0]["TotalHeatGain" ]}}</td>

    </tr>
    
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_AirDensity');?></th>
      <td>{{$items["projedetay"]["data"][0]["AirDensity"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_ShiftLength');?></th>
      <td>{{$items["projedetay"]["data"][0]["ShiftLength"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_SystemUptime');?></th>
      <td>{{$items["projedetay"]["data"][0]["SystemUptime"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_StorageTemperature');?></th>
      <td>{{$items["projedetay"]["data"][0]["StorageTemperature"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_FreezingPoint');?></th>
      <td>{{$items["projedetay"]["data"][0]["FreezingPoint"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_StorageTime');?></th>
      <td>{{$items["projedetay"]["data"][0]["StorageTime"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_ProcessingTime');?></th>
      <td>{{$items["projedetay"]["data"][0]["ProcessingTime"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_AirExchangeNumber');?></th>
      <td>{{$items["projedetay"]["data"][0]["AirExchangeNumber"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_UnitHumanLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["UnitHumanLoad"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_BeforeFreezingLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["BeforeFreezingLoad" ]}}</td>

    </tr><tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_FreezingLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["FreezingLoad" ]}}</td>

    </tr><tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_AfterFreezingLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["AfterFreezingLoad" ]}}</td>

    </tr>
    
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_BreathingHeatLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["BreathingHeatLoad" ]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_ProductTemperature');?></th>
      <td>{{$items["projedetay"]["data"][0]["ProductTemperature" ]}}</td>

    </tr>
    
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_SystemSafetyOverhead');?></th>
      <td>{{$items["projedetay"]["data"][0]["SystemSafetyOverhead" ]}}</td>

    </tr><tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_SystemLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["SystemLoad"]}}</td>
    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.ColdStorage_SystemLoadDaily');?></th>
      <td>{{$items["projedetay"]["data"][0]["SystemLoadDaily"]}}</td>

    </tr>
  </tbody>
      
  
</body>
</html>
