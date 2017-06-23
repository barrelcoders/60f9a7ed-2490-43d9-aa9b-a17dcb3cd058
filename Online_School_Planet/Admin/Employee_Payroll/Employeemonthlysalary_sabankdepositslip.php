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
   <li><a href="Employeemonthlysalary_presheet.php"><button class="btnmanu">Prepare Salary Sheet</button></a></li>
   <li><a href="Employeemonthlysalary_gerslip.php"><button class="btnmanu">Generate Salary Slip</button></a></li>
   <li><a href="Employeemonthlysalary_approveslip.php"><button class="btnmanu">Approve Salary Slip</button></a></li>
   <li><a href="Employeemonthlysalary_monprovision.php"><button class="btnmanu">Monthly Provisions</button></a></li>
   <li><a href="Employeemonthlysalary_updateleavec.php"><button class="btnmanu">Update Leave Calculation</button></a></li>
   <li class="active"><a href="Employeemonthlysalary_sabankdepositslip.php"><button class="btnmanu">Salary Bank Deposit Slip</button></a></li>
   <li><a href="Employeemonthlysalary_payrollprocesspage.php"><button class="btnmanu">Payroll Processing Page</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="empl-top">Deposit Slip</div>
  <div class="employeesalary-main">
  <form action="" method="post" id="form" >
   <div class="row">
    <div class="col-xs-3">Select Salary Month </div>
    <div class="col-xs-3"> <select name="empsalarymonth" id="empsalarymonth" class="text-box tbs">
    					   	<option value="">Select One</option>
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                           </select>
    </div>
    <div class="col-xs-3">Employee Department </div>
    <div class="col-xs-3"> <select name="empdepartment" id="empdepartment" class="text-box tbs">
    					   	<option value="">Select One</option>
                           </select>
    </div>
   </div>
<div class="col-md-12" align="center"><input name="btnShowSubject" type="button" value="Submit" onClick="show('comment');" class="btn" ></div>
  </form>
   <!------------------Table------------------------->
    <div class="employee-table" id="comment" style="display:none; margin-top:5%;" >
    <style>
 		.tableem{border:1px solid #0b462d; border-radius:3px; margin-bottom:1%;}
 		.tableem table{width:100%; } 
 		.tableem table tr{border-bottom:1px solid #ccc;}
 		.tableem table .col td{background:#0b462d; color:#fff; font-size:15px; padding:0.7% 1%; }
 		.tableem table td{padding:0.5% 1%; font-size:13px; border-left:1px solid #ccc; } .tableem table td:first-child{border:none;}
		.tableem table tr:last-child td{font-weight:600; font-size:16px;}
	</style>
    <div id="head" style="display:none">
     <div align="center"><img src="../images/dpslogo.png" style="width:30%;"></div>
     <div align="center" style="font-size:16px; font-weight:600; border-bottom:1px solid #ccc; margin:1% 0;"> Sector 19, Mathura Road, Faridabad (Haryana)</div>
     <div align="right" style="font-size:14px; font-weight:600;">Date: &nbsp;14-12-2016</div>
     <div align="left" style="font-size:14px; font-weight:600; ">The Manager,<br> State Bank Of India<br> Sarai Khwaja<br> Faridabad </div>
     <div align="left" style="font-size:14px; font-weight:600; margin-top:2%; ">Dear Sir,</div>
     <div style="font-size:14px; font-weight:600; margin-left:3%; ">
     Please credit the following accounts as per amount given below, on account of Teaching Staff  salary for the month of   - Aug      </div>
    </div>
     <div class="tableem">
     <table>
      <tr class="col">
       <td>S.No.</td><td>Emp.Id</td> <td>Employee Name</td><td>Net Payment</td><td>Bank Account No</td>
      </tr>
      <tr>
       <td>1.</td><td>DPS</td><td>ABC</td><td>XYC</td><td>STU</td>
      </tr>
      <tr>
       <td colspan="3" align="right"><b>ABC</b></td><td><b>0000</b></td><td>&nbsp;</td>
      </tr>
     </table>
     </div>
     <p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font></p>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("comment").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
		document.getElementById("head").style.display = "block";
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
	
		document.getElementById("form").style.display = "block";
  }
  function setDisplay (target, str) {
    document.getElementById(target).style.display = str;
  }
</script>
<!----------------->
</div>
</body>
</html>
