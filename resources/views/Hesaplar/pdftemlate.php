<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>pdf</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="default.css" rel="stylesheet" type="text/css" />
<<style>
.print-container{
  max-width:900px;
  margin:30px auto;
  background:white;
  padding: 10px 30px;
  .header{
    margin-bottom:20px;
    border-bottom:1px solid #dbdbdb;
    padding-bottom:20px;
  }
  table{
    margin-top:30px;
    tbody tr.no-border:first-child{
      opacity:0.6!important;
    }
  }
  .summary-table{
    border:1px solid #DDE1E4;
    & tr td:last-child{
      text-align:right;
    }
    & tr th:last-child{
      text-align:right;
    }
    td{
      border-left:1px solid #dbdbdb;
    }
    th{
     border-left:1px solid #dbdbdb; 
    }
    thead{
      color:#737F8B;
    }
    
  }
  .ft-18{
    font-size:20px;
    margin-bottom:10px;
  }
  .adder{
    font-size:16px;
    font-weight:500;
    text-align:right;
    border-left:0;
    border-right:0;
    border-bottom:0;
  }
  .total{
    font-size:22px;
  }
  .mega{
    font-size:33px;
    margin-bottom:10px;
  } 
}
.invoice-logo{
  height:80px;
  width:auto;
}
.other-rates{
  float:right;
  width:350px;
  text-align:right;
  dl{
    width:100%;
    margin-bottom:5px;
    &.total{
      border-top:1px solid #dbdbdb;
      padding-top:10px;
    }
  }
  dt{
    width:50%;
    float:left;
   
  }
  dd{
    width:50%;
    float:left;
    padding-right:10px;
    margin:0;
  }
}
.invoice-from{
  float:right;
}
.summary-info{
  border-bottom:1px solid #dbdbdb;
  margin-bottom:20px;
  padding-bottom:10px;
}
.heading{
  border-bottom:1px solid #dbdbdb;
}
.sub-heading .billto{
  padding:10px 0;
}

@media print {
  .print-container{
  }
  h1,h2,h3,h4,h5,h6{
    font-weight:bold;
    &:first-letter{
      font-size:inherit;
    }
  }
}
.invoice-details{
  float:right;
}
.ft-12{
  font-size:12px;
}

</style>
</head>
<body>
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
  <thead>
    <tr>
      <th>Consultant Name</th>
      <th>Hours Billed</th>
      <th>Effective Bill Rate</th>
      <th>Amount</th>
    </tr>
  </thead>
  <tbody>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr><tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr><tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <td>102.50</td>
      <td>$106</td>
      <td>$12,652.60</td>
    </tr>
  </tbody>
      </table>
         <h4>Adjustments</h4>
      <table class="table summary-table">
  <thead>
    <tr>
      <th>Consultant Name</th>
      <th>Start Date</th>
      <th>End Date</th>
      <th>Differential Hours</th>
      <th>Effective Bill Rate</th>
      <th>Amount</th>
      <th>Comments</th>
    </tr>
  </thead>
  <tbody>
    <tr class="simple">
      <th scope="row">John A Doe</th>
      <th>03 Jan 2017</th>
      <th>03 Sep 2017</th>
      <td>20.00</td>
      <td>$106</td>
      <td>$2100.00</td>
      <td width="150px" class="text-left ft-12">Reason – I have incorrectly entered the time in March and I now madcorrections
</td>
    </tr>
  </tbody>
      </table>
    <div class="row">
      <div class="col-md-12">
        <div class="other-rates clearfix">
      <dl class="dl-horizontal total clearfix">
        <dt class="blue">Total</dt>
        <dd>$1234424</dd>
      </dl>
    </div>
      </div>
    </div>
    </div>
    <p style="font-size:12px" class="text-right">Printed By  : Harold A Finch</p>
     
    
    
</body>
</html>
 