<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=0">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>
<style>
#container1{height:535px; font-family:Arial !important; padding:1% 1%; overflow-y:scroll;}
.admissionreport .admission_head{border-bottom:1px solid #0b462d; padding:0.5% 0%; font-size:16px; font-weight:600;}
.admissionreport .col-xs-3{margin-top:1%;} .admissionreport .row{padding:0 10%;}
.admissionreport .col-xs-3 .text-box{border:1px solid #0b462d; border-radius:3px; height:30px; width:80%; padding:0.5% 1%;}
.admission_table{ border:1px solid #0b462d; border-radius:3px; margin-top:6%;}
.admission_table .admission_tablename{ text-align:center; font-weight:600; width:100%; }
.admission_table table{width:100%;} 
.admission_table table td:last-child{ border-right:none;} .admission_table table td:first-child{width:5%; border-left:none;}
.admission_table table .col td{background:#0b462d; color:#fff; padding:0.5% 1%; font-size:15px;}
.admission_table table td{padding:0.2% 1%; font-size:13px; border:1px solid #ccc;}
.admission_table table .col1 td{font-size:15px; font-weight:600;}
</style>
<body>
<div id="container">
<!----Header--------->
 <div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div id="container1">
<form action="#" method="post">
<div class="admissionreport">
 <div class="admission_head">Registration Fees Report</div>
 <div class="row">
  <div class="col-xs-3"><b>Date From :</b></div>
  <div class="col-xs-3"> <input type="date" name="fromdate" id="fromdate" class="text-box"></div>
  <div class="col-xs-3"><b>To From :</b></div>
  <div class="col-xs-3"> <input type="date" name="todate" id="todate" class="text-box"></div>
 </div>
 <div class="row" >
  <div class="col-xs-3"><b>Select School : </b></div>
  <div class="col-xs-3"> <select name="selectschool" id="selectschool" class="text-box tbs">
  						 	<option value="All">All</option>
                         </select>
  </div>
  <div class="col-xs-6">&nbsp;</div>
 </div>
 <div class="col-xs-12" align="center" style="margin:1% 0; border-top:1px solid #ccc; padding-top:1%;">
 			<input type="submit" name="submit" id="submit" class="btn" value="Submit" ></div>
</div>
<div class="admission_table">
 <div class="admission_tablename"> 
  <div style="font-size:18px;">Delhi Public School Rohini</div>
  <div>Registration Fees Report</div>
  <div>Report Date:  15-12-2016</div>
 </div>
 <table class="table-responsive">
  <tr class="col"> <td>Sr.No.</td><td>Reg. No.</td><td>Student Name</td><td>Student Class</td><td>Registration Fee Paid</td><td>Receipt No</td>
  				   <td>Date</td><td>Status</td> </tr>
  <tr> <td>Sr.No.</td><td>Reg. No.</td><td>Student Name</td><td>Student Class</td><td>Registration Fee Paid</td><td>Receipt No</td>
  				   <td>Date</td><td>Status</td> </tr>
  <tr class="col1"> <td colspan="4">Total Registration Fee amount:</td><td>0</td> <td colspan="3">&nbsp;</td> </tr>
 </table>
</div>
</form>
</div>
</div>
</body>
</html>

<div><?php include 'footer.php'; ?></div>