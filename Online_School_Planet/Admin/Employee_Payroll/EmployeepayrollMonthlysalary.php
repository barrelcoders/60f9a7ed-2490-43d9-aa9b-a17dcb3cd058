<?php session_start();?>
<html lang=''>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
   <title> </title><link rel="icon" href="../l.png" type="image/x-icon">
   
   <link rel="stylesheet" href="../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../css/Style.css" />
   <script src="../js/bootstrap.min.js"></script>
   <script src="../js/jquery.min.js"></script>
</head>

<body>
<div id="container">
<!----Header--------->
<div><?php include 'header.php'; ?></div>
<!---------containt---------->
<div class="c1">
<div class="row c">
 <div class="col-md-2 hris1"> 
  <h4>SELF SERVICE</h4>
  <ul>
   <li><a href="Employeepayrollincometaxst.php"><button class="btnmanu">Income Tax Statement</button></a></li>
   <li><a href="Employeepayrollpfstatement.php"><button class="btnmanu">PF Statement</button></a></li>
   <li><a href="EmployeepayrollESIstatement.php"><button class="btnmanu">ESI Statement</button></a></li>
   <li><a href="EmployeepayrollempLOPreport.php"><button class="btnmanu">Employee LOP Days Report</button></a></li>
   <li class="active"><a href="EmployeepayrollMonthlysalary.php"><button class="btnmanu">Monthly Salary Sheet</button></a></li>
   <li><a href="Employeepayrollempprearrday.php"><button class="btnmanu">Employee Previous Arrear Days</button></a></li>
   <li><a href="Employeepayrollempincreport.php"><button class="btnmanu">Employee Increment Report</button></a></li>
   <li><a href="#Employeepayrollempsalaryslip.php"><button class="btnmanu">Salary Slip</button></a></li>
   <li><a href="#Employeepayrollempattenreport.php"><button class="btnmanu">Attendance Report</button></a></li>
   <li><a href="#Employeepayrollempleavereport.php"><button class="btnmanu">Employee Leave Report</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10"> 
  <div class="empl-top">Employee Monthly Salary Sheet</div>
  <div class="employee-main">
  <form action="" method="post" id="form" >
   <div class="row">
    <div class="col-xs-2">Select Month</div>
    <div class="col-xs-2"> <select name="emplopmonth" id="emplopmonth" class="text-box tbs">
    					   	<option value="">Select One</option>
                            <option value=""></option>
                           </select>
    </div>
    <div class="col-xs-2">Financial Year</div>
    <div class="col-xs-2"> <select name="empfinancialyear" id="empfinancialyear" class="text-box tbs">
    					   	<option value="">Select One</option>
                            <option value="2016">2016</option>
                            <option value="2016">2017</option>
                           </select>
    </div>
    <div class="col-xs-2">Employee Type</div>
    <div class="col-xs-2"> <select name="emplopemptype" id="emplopemptype" class="text-box tbs">
    					   	<option value="">Select One</option>
                            <option value=""></option>
                           </select>
    </div>
   </div>
   <div class="col-md-12" align="center"><input name="btnShowSubject" type="button" value="Submit" onClick="show('comment');" class="btn" ></div>
  </form>
   <!------------------Table------------------------->
    <div class="employee-table1" id="comment" style="display:block; margin-top:7%;" >
    <style>
 		.tableem{border:1px solid #0b462d; border-radius:2px 2px 3px 3px; margin-bottom:1%;}
 		.tableem table{width:300%; } 
 		.tableem table tr{border-bottom:1px solid #ccc;}
 		.tableem table .col td{background:#0b462d; color:#fff; font-size:14px; padding:0.2% 0.1%; }
 		.tableem table td{padding:0.1%; font-size:13px; border-left:1px solid #ccc; text-align:center; width:300px !important;} .tableem table td:first-child{border:none;}
		.tableem table tr:hover{background:#eaeaea;}
	</style>
     <div align="center" style="display:none;" id="img1"><img src="../images/dpslogo.png" width="50%" ></div>
     <div align="center" id="name1" style="font-size:16px; font-weight:600; margin-bottom:1%; border-bottom:1px solid #ccc; display:none;">Sector 19, Mathura Road, Faridabad (Haryana)</div>
     <div align="center" style="font-size:16px; font-weight:600; margin-bottom:1%; ">Salary for the Month Jul for the TRANSPORT   </div>
     <div class="tableem" id="tableem">
     <table class="table-responsive">
      <tr class="col">
       <td>Sr. No.</td> <td>Employee Category</td> <td>Salary Receipt No.</td> <td >Employee Id.</td> <td >Employee Name</td> <td>Department</td> 
       <td>Designation</td> <td>Payable Days</td> <td>Pay Band</td> <td>Grade Pay</td> <td>Add Grade Pay</td> <td>Arrear DA</td> <td>Arrear TADA</td>
       <td>Previous Salary</td> <td>HRA</td> <td>DA</td> <td>TA</td> <td>TADA</td> <td>Variable Conveyance</td> <td>Medical Reimbursement</td>
       <td>Siksha Kendra</td> <td>Enrichment</td> <td>Out Of Pocket</td> <td>AMTI</td> <td>Other Special Income</td> <td>Other Annual Income</td> 
       <td>Other Deduction</td> <td>Telephone Allowance</td> <td>Hostel Income</td> <td>TF</td> <td>TF2</td> <td>Uniform Reimbursement</td> 
       <td>Misc Exam Duty</td> <td>Total Earning</td> <td>Original Total Earning</td> <td>PF</td> <td>Recovery</td> <td>Other Recovery</td> 
       <td>TDS</td> <td>INTT</td> <td>ESI</td> <td>Gross Deduction</td> <td>Total Deduction</td> <td>Other Special Deduction</td> <td>Days Present</td>
       <td>Days Leave</td> <td>Days LOP</td> <td>Net-Loss Of Pay</td> <td>Net Payout</td> <td>Month</td> <td>Financial Year</td> <td>Remarks</td>
       <td>Submitted By</td>
      </tr>
      <tr>
       <td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td>
       <td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td>
       <td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td>
       <td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td>
       <td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td><td>svjc</td>
      </tr>
     </table>
     </div>
     <p align="center"><font face="Cambria"><!--<a href="Javascript:printDiv();">PRINT</a>--></font>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("comment").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
		document.getElementById("img1").style.display = "block";
		document.getElementById("name1").style.display = "block";
		document.getElementById("tableem").style.width = "1500px";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>
    </div>
  </div>
 </div>
</div>
<!----------------->
</div>
<script>
  function show (toBlock){
    setDisplay(toBlock, 'block');
	
  }
  function setDisplay (target, str) {
    document.getElementById(target).style.display = str;
  }
</script>
<!----------------->
</div>
</body>
</html>
