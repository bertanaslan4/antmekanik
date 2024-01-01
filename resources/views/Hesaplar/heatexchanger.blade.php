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
         <?php //dd($items); ?>
  <tbody>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.heatexchangerresult_name');?></th>
      <td>{{$items["projedetay"]["data"][0]["adi"]}}    </td>
       
      
    </tr>
    
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.heatexchanger_heatneed');?></th>
      <td>{{$items["projedetay"]["data"][0]["HeatNeed"]}}</td>
      
    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.heatexchangerresult_totalpass');?></th>
      <td>{{$items["projedetay"]["data"][0]["TotalPass"]}}</td>
      
    </tr><tr class="simple">
      <th scope="row">Adet</th>
      <td>{{$items["projedetay"]["data"][0]["Piece"]}}</td>
      
    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.heatexchanger_heatedfluidavg');?></th>
      <td>{{$items["projedetay"]["data"][0]["HeaterFluidAvg"]}}</td>
       
    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.heatexchangerresult_heaterfluidavg');?></th>
      <td>{{$items["projedetay"]["data"][0]["HeatedFluidAvg"]}}</td>
       
    </tr>
     <tr class="simple">
      <th scope="row"><?=__('staticmessage.heatexchangerresult_pollutionfactor');?></th>
      <td>{{$items["projedetay"]["data"][0]["PollutionFactor"]}}</td>
      
    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.heatexchangerresult_logheatdiff');?></th>
      <td>{{$items["projedetay"]["data"][0]["LogHeatDiff"]}}</td>
      
    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.heatexchangerresult_heatsurface');?></th>
      <td>{{$items["projedetay"]["data"][0]["HeatSurface"]}}</td>
    
    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.heatexchangerresult_heatexchangercapacity');?></th>
      <td>{{$items["projedetay"]["data"][0]["HeatExchangerCapacity"]}}</td>
      
    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.heatexchangerresult_isim');?></th>
      <td>{{$items["projedetay"]["data"][0]["Name"]}}</td>
     
    </tr>
    <tr class="simple">
      <th scope="row"><?=__('staticmessage.heatexchangerresult_brand');?></th>
      <td>{{$items["projedetay"]["data"][0]["Brand"]}}</td>
      
    </tr>

    <tr class="simple">
        <th scope="row"><?=__('staticmessage.heatexchangerresult_type');?></th>
        <td>{{$items["projedetay"]["data"][0]["Type"]}}</td>
        
      </tr>
       <tr class="simple">
      <th scope="row"> <?=__('staticmessage.heatexchangerresult_aciklama');?> </th>
      <td>{{$items["projedetay"]["data"][0]["Description"]}}</td>
     
    </tr>
      <tr class="simple">
        <th scope="row"><?=__('staticmessage.heatexchangerresult_maxheatsurface');?></th>
        <td>{{$items["projedetay"]["data"][0]["MaxHeatSurface"]}}</td>
        
      </tr>
      <tr class="simple">
        <th scope="row"><?=__('staticmessage.heatexchangerresult_Catalog');?></th>
        <td>{{$items["projedetay"]["data"][0]["Catalog"]}}</td>
        
      </tr>
      
    
  </tbody>
      
  <thead>
     
  </thead>
 
      </table>
    
  
</body>
</html>
