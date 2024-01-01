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
              <h3 class="mega">Fuel Amount Yearly Hesabı</h3>
          <h6 class="grey">Ant Mekanik</h6>
          <P>Proje No # {{$items["projedetay"]["data"][0]["id"]}}
                <br />
            <strong> Proje Tarihi:{{$items["projedetay"]["data"][0]["tarih"]}}</strong>
            <br /> <strong>Fuel Amount Hesabı</strong></P>
            </div>
            
          </td>
        </tr>
          <tr class="sub-heading">
            <td colspan="3">
                <div class="billto">
                  <strong><big>Tata Technologies</strong></big> <br />
                  Attn : Joan Watson <br />
                  No 23 block Area , Alaska OH <br />
                  johan@tata.com <br />
                  +123-456-789
                  
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
      <th class="th"  scope="row"><?=__('staticmessage.FuelAmountYearlyyearly_Adi');?></th>
      <td>{{$items["projedetay"]["data"][0]["adi"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountYearlyyearly_Aciklama');?></th>
      <td>{{$items["projedetay"]["data"][0]["aciklama"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountYearlyyearly_yakitturu');?></th>
      <td>@switch($items["projedetay"]["data"][0]["FuelType"])
        @case(0)
        <span>Katı</span>
        @break

        @case(1)
        <span>Sıvı</span>
        @break

        @default
        <span>Gaz</span>
    @endswitch</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountYearlyyearly_Adet');?></th>
      <td>{{$items["projedetay"]["data"][0]["Piece"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountYearlyyearly_kazankapasitesi');?></th>
      <td>{{$items["projedetay"]["data"][0]["BoilerCapacity"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountYearlyyearly_kazankapasitesi');?></th>
      <td>{{$items["projedetay"]["data"][0]["BoilerEfficiency"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountYearlyyearly_brulorverimi');?></th>
      <td>  {{$items["projedetay"]["data"][0]["BurnerEfficiency"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"> <?=__('staticmessage.FuelAmountYearlyyearly_siviyakittipi');?></th>
      <td>{{$items["projedetay"]["data"][0]["LiquitFuelType"]}}</td>

    </tr><tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountyearly_AvgFuelTemperature');?></th>
      <td>{{$items["projedetay"]["data"][0]["AvgFuelTemperature"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountyearly_FuelTemperature');?></th>
      <td>{{$items["projedetay"]["data"][0]["FuelTemperature"]}}</td>

    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountyearly_YearlyWorkingTime');?></th>
      <td>{{$items["projedetay"]["data"][0]["YearlyWorkingTime"]}}</td>

    </tr><tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountYearlyyearly_BuildingArea');?></th>
      <td>{{$items["projedetay"]["data"][0]["BuildingArea"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountyearly_LiquidOccupancyRate');?></th>
      <td>{{$items["projedetay"]["data"][0]["LiquidOccupancyRate"]}}</td>
    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountyearly_SolidStackLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["SolidStackLoad"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountyearly_LowerHeatValue');?></th>
      <td>{{$items["projedetay"]["data"][0]["LowerHeatValue"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountyearly_FuelAmount');?></th>
      <td>{{$items["projedetay"]["data"][0]["FuelAmount"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountyearly_FuelDensity');?></th>
      <td>{{$items["projedetay"]["data"][0]["FuelDensity"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountYearlyyearly_YearlyHeatingEnergy');?></th>
      <td>{{$items["projedetay"]["data"][0]["YearlyHeatingEnergy"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountyearly_LiquidTank');?></th>
      <td>{{$items["projedetay"]["data"][0]["LiquidTank"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountyearly_SolidFuelSurface');?></th>
      <td>{{$items["projedetay"]["data"][0]["SolidFuelSurface"]}}</td>

    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.FuelAmountyearly_PreheaterLoad');?></th>
      <td>{{$items["projedetay"]["data"][0]["PreheaterLoad"]}}</td>

    </tr>
  </tbody>
      </table>
         <h4>Adjustments</h4>
      <table class="table summary-table">

  <tbody>
    <tr class="simple">
      <th scope="row"></th>
      <th>By = (Qk x Zg x Zy ) / (2 x Hu x n)</th> 
    </tr>
    <tr class="simple">
        <th scope="row"></th>
        <th>By = ({{$items["projedetay"]["data"][0]["BoilerCapacity"]}} x ? x ? ) / ( ? x ? x {{$items["projedetay"]["data"][0]["BoilerEfficiency"]}})</th>
      </tr>
      <tr class="simple">
        <th scope="row"></th>
        <th>V = ((By / Zy) / 860 ) x Ds</th>
        
      </tr>
      <tr class="simple">
        <th scope="row"></th>
        <th>V = ( ({{$items["projedetay"]["data"][0]["FuelAmount"]}} / {{$items["projedetay"]["data"][0]["YearlyWorkingTime"]}} ) / ? ) x ?</th>
        
      </tr>
      <tr class="simple">
        <th scope="row"></th>
        <th>Qy = Gy x c x (t2-t1)</th>
        
      </tr>
      <tr class="simple">
        <th scope="row"></th>
        <th>Qy = ? x {{$items["projedetay"]["data"][0]["FuelTemperature"]}} x ?</th>
        
      </tr>

  </tbody>
      </table>
     
 
  
</body>
</html>
