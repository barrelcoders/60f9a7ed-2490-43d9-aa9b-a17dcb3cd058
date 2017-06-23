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
   <li class="active"><a href="Employeemonthlysalary_presheet.php"><button class="btnmanu">Prepare Salary Sheet</button></a></li>
   <li><a href="Employeemonthlysalary_gerslip.php"><button class="btnmanu">Generate Salary Slip</button></a></li>
   <li><a href="Employeemonthlysalary_approveslip.php"><button class="btnmanu">Approve Salary Slip</button></a></li>
   <li><a href="Employeemonthlysalary_monprovision.php"><button class="btnmanu">Monthly Provisions</button></a></li>
   <li><a href="Employeemonthlysalary_updateleavec.php"><button class="btnmanu">Update Leave Calculation</button></a></li>
   <li><a href="Employeemonthlysalary_sabankdepositslip.php"><button class="btnmanu">Salary Bank Deposit Slip</button></a></li>
   <li><a href="Employeemonthlysalary_payrollprocesspage.php"><button class="btnmanu">Payroll Processing Page</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="empl-top">Employee Salary Slip Generation</div>
  <div class="employeesalary-main">
  <form action="" method="post" id="form" >
   <div class="row">
    <div class="col-xs-3">Employee Category</div>
    <div class="col-xs-3"> <select name="emplcategory" id="emplcategory" class="text-box tbs">
    					   	<option value="">Select One</option>
                            <option value=""></option>
                           </select>
    </div>
    <div class="col-xs-3">Select Month</div>
    <div class="col-xs-3"> <select name="empsalarymonth" id="empsalarymonth" class="text-box tbs">
    					   	<option value="">Select One</option>
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                           </select>
    </div>
    <div class="col-md-12" style="margin-top:2%; text-align:center;"><input name="btnShowSubject" type="button" value="Submit" onClick="show('comment');" class="btn" ></div>
   </div>
   
  </form>
   <!------------------Table------------------------->
    <div class="employee-table" id="comment" style="display:none;" >
    <style>
 		.tableem{border:1px solid #0b462d; border-radius:3px; margin-bottom:1%; height:300px;}
 		.tableem table{width:500%;  } 
 		.tableem table tr{border-bottom:1px solid #ccc;}
 		.tableem table .col td{background:#0b462d; color:#fff; font-size:13px; padding:0.2% 0.1%; }
 		.tableem table td{padding:0.1% 0.1%; font-size:13px; border-left:1px solid #ccc; text-align:center; } .tableem table td:first-child{border:none;}
		.tableem table td .text-box{width:100%; border:1px solid #0b462d; border-radius:3px; padding:0.5% 3%; height:22px;}
		.tableem table td .btn{width:80px; border:1px solid #0b462d; border-radius:3px; padding:0% 5%; height:22px; }
	</style>
     <div align="center" style="font-size:16px; font-weight:600; margin-bottom:1%; ">Payroll for : All  </div>
     <div class="tableem" style="overflow-x:scroll;">
     <table>
      <tr class="col">
       <td>S.No.</td><td>Emp.Cat.</td><td>Emp.Id</td> <td>Name</td><td>Deptt.</td><td>Desg.</td><td>Pay Band</td><td>Pay Scale</td><td>Total Days</td><td>Grade Pay</td><td>Add. Grade Pay</td><td>Arrear Da</td><td>Arrear TADA</td><td>Previous Month/ Arrear Sal</td><td>H.R.A.</td><td>D.A.</td><td>Travelling Allowance</td><td>T.A.D.A.</td><td>Variable Conveyance</td><td>Medical Reimbursement</td><td>Shiksha Kendra</td><td>Enrichment</td><td>Out Of Pocket</td><td>AMTI</td><td>Other Spl Income</td><td>Other Annual Income</td><td>Others</td><td>Telephone Allowance</td><td>Hostel Income</td><td>TF</td><td>TF2</td><td>Uniform Reimbursement</td><td>Misc Exam Duty</td><td>Total Earning</td><td>Orig. Gross Earning</td><td>PF</td><td>Recovery</td><td>Other Recovery</td><td>TDS</td><td>INTT.</td><td>ESI</td><td>Gross Deduction</td><td>Total Deduction</td><td>Other Spl Deduction</td><td>Previous Arrear LOP</td><td>Days Present</td><td>Days Leave</td><td>Days(LOP)</td><td>LOP</td><td>Calculate Final Salary</td><td>Net Payout</td><td>Remarks</td><td>Submit</td><td>EmpName</td>
      </tr>
      <tr>
       <td>1.</td><td>Teaching Staff</td><td>DPS</td><td>ABC</td><td>XYC</td><td>STU</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
       <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
       <td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
       <td><input type="number" name="tdsammount" id="tdsammount" class="text-box"></td>
       <td><input type="number" name="inttammount" id="inttammount" class="text-box"></td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td>
       <td><input type="number" name="dayprasent" id="dayprasent" class="text-box"></td>
       <td><input type="number" name="daysleave" id="daysleave" class="text-box"></td>
       <td><input type="number" name="dayslop" id="dayslop" class="text-box"></td>
       <td><input type="number" name="lop" id="lop" class="text-box"></td>
       <td><button type="button" name="calculate" id="calculate" class="btn">Calculate</button></td>
       <td><input type="number" name="netpayout" id="netpayout" class="text-box"></td>
       <td><input type="number" name="remark" id="remark" class="text-box"></td>
       <td><button type="submit" name="submit" id="submit" class="btn">Submit</button></td><td>UVW</td>
      </tr>
     </table>
     </div>
     <div align="center"><button type="submit" name="submit" id="submit" class="btn1">Submit</button></div>
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
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
