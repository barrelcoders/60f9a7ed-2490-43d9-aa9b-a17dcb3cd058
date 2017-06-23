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
   <li><a href="EmployeepayrollMonthlysalary.php"><button class="btnmanu">Monthly Salary Sheet</button></a></li>
   <li><a href="Employeepayrollempprearrday.php"><button class="btnmanu">Employee Previous Arrear Days</button></a></li>
   <li class="active"><a href="Employeepayrollempincreport.php"><button class="btnmanu">Employee Increment Report</button></a></li>
   <li><a href="#Employeepayrollempsalaryslip.php"><button class="btnmanu">Salary Slip</button></a></li>
   <li><a href="#Employeepayrollempattenreport.php"><button class="btnmanu">Attendance Report</button></a></li>
   <li><a href="#Employeepayrollempleavereport.php"><button class="btnmanu">Employee Leave Report</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10"> 
  <div class="empl-top">Employee Salary Increment Report</div>
  <div class="employee-main">
    <!------------------Table------------------------->
    <div class="employee-table" id="comment" style="margin-top:1%;" >
    <style>
 		.tableem{border:1px solid #0b462d; border-radius:3px; margin-bottom:1%;}
 		.tableem table{width:100%; } 
 		.tableem table tr{border-bottom:1px solid #ccc;}
 		.tableem table .col td{background:#0b462d; color:#fff; font-size:15px; padding:0.5% 0.2%; }
 		.tableem table td{padding:0.5% 0.2%; font-size:13px; border-left:1px solid #ccc; } .tableem table td:first-child{border:none;}
	</style>
     <div align="center" style="display:none;" id="img1"><img src="../images/dpslogo.png" width="50%" ></div>
     <div align="center" id="name1" style="font-size:16px; font-weight:600; margin-bottom:1%; border-bottom:1px solid #ccc; display:none;">Sector 19, Mathura Road, Faridabad (Haryana)</div>
     <div class="tableem">
     <table>
      <tr class="col">
       <td>S.No.</td><td >Emp Id.</td><td>Employee Name</td><td>Department</td>
       <td>Salary Component</td> <td>Amount</td><td>Net Increment</td><td>Financial Year</td><td>Deactivated Date</td><td>Deactivated Date</td>
      </tr>
      <tr> <td width="10px;">S.No.</td> <td>Employee Code</td> <td >Name</td> <td>Month</td> <td>ESI Amount</td><td>ABC</td><td>ABC</td>
      <td>ABC</td><td>ABC</td><td>ABC</td> </tr>
      <tr> <td width="10px;">S.No.</td> <td>Employee Code</td> <td >Name</td> <td>Month</td> <td>ESI Amount</td><td>ABC</td><td>ABC</td>
      <td>ABC</td><td>ABC</td><td>ABC</td> </tr>
     </table>
     </div>
     <p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
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
<!----------------->
</div>
</body>
</html>
