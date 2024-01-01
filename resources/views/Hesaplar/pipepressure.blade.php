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
                  <strong><big>>Boru Basınç Hesabı</strong></big> <br />
                  Ant Mekanik <br />
                  Proje No #{{$items["projedetay"]["data"][0]["id"]}} <br />
                  Proje Tarihi:{{$items["projedetay"]["data"][0]["tarih"]}} <br />
                 proje #Boru Basınç Hesabı
                  
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
      <th scope="row"><?=__('staticmessage.Pipepressureloss_Name');?></th>
      <td>{{$items["projedetay"]["data"][0]["adi"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_Aciklama');?></th>
      <td>{{$items["projedetay"]["data"][0]["aciklama"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_MinSpeed');?></th>
      <td>{{$items["projedetay"]["data"][0]["MinSpeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_MaxSpeed');?></th>
      <td>{{$items["projedetay"]["data"][0]["MaxSpeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_MinLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["MinLoad"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_MaxLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["MaxLoad"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_GoingTemp');?></th>
      <td> {{$items["projedetay"]["data"][0]["GoingTemp"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_ReturnTemp');?></th>
      <td>{{$items["projedetay"]["data"][0]["ReturnTemp"]}}</td>

    </tr>

    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_FluidType');?></th>
      <td>{{$items["projedetay"]["data"][0]["FluidType"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_DiameterAdvice');?></th>
      <td>{{$items["projedetay"]["data"][0]["DiameterAdvice"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_TempDiff');?></th>
      <td>{{$items["projedetay"]["data"][0]["TempDiff"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_TempAvg');?></th>
      <td>{{$items["projedetay"]["data"][0]["TempAvg"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_WaterDensity');?></th>
      <td>{{$items["projedetay"]["data"][0]["WaterDensity"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_SpecificHeatOfWater');?></th>
      <td>{{$items["projedetay"]["data"][0]["SpecificHeatOfWater"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_WaterViscosity');?></th>
      <td>{{$items["projedetay"]["data"][0]["WaterViscosity"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_DynamicViscosity');?></th>
      <td>{{$items["projedetay"]["data"][0]["DynamicViscosity"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Boru Yükü</th>
      <td>{{$items["projedetay"]["data"][0]["LineLoad"]}}</td>
    </tr>

    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_Flow');?></th>
      <td>{{$items["projedetay"]["data"][0]["Flow"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row">Boru Adı</th>
      <td>{{$items["projedetay"]["data"][0]["Lines_Name"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_Connection');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_Connection"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_PartLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_PartLoad"]}}</td>

    </tr>
     
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_Length');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_Length"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_PipeType');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_PipeType"]}}</td>

    </tr>
     
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_StartSpeed');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_StartSpeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_EquivalentDiameter');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_EquivalentDiameter"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_PipeInch');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_PipeInch"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_PipeInnerD');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_PipeInnerD"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_Emstivity');?><</th>
      <td>{{$items["projedetay"]["data"][0]["Lines_Emstivity"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_FrictionCoefficient');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_FrictionCoefficient"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_NetSpeed');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_NetSpeed"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_Resistance');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_Resistance"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_KinematicViscosity');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_KinematicViscosity"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.Pipepressureloss_Reynold');?></th>
      <td>{{$items["projedetay"]["data"][0]["Lines_Reynold"]}}</td>

    </tr>
    <tr class="simple">
        <th scope="row"><?=__('staticmessage.Pipepressureloss_CoRoughness');?></th>
        <td>{{$items["projedetay"]["data"][0]["Lines_CoRoughness"]}}</td>
  
      </tr>
      <tr class="simple">
        <th scope="row"><?=__('staticmessage.Pipepressureloss_RelativeSmoothness');?>
        </th>
        <td>{{$items["projedetay"]["data"][0]["Lines_RelativeSmoothness"]}}</td>
  
      </tr>
      <tr class="simple">
        <th scope="row"><?=__('staticmessage.Pipepressureloss_PressureDrop');?></th>
        <td>{{$items["projedetay"]["data"][0]["Lines_PressureDrop"]}}</td>
  
      </tr>
      <tr class="simple">
        <th scope="row"><?=__('staticmessage.Pipepressureloss_TotalPressureDrop');?></th>
        <td>{{$items["projedetay"]["data"][0]["Lines_PressureDrop"]}}</td>
  
      </tr>
  </tbody>
   

  <tbody>
    
  </tbody>
      </table>
     
  
</body>
</html>