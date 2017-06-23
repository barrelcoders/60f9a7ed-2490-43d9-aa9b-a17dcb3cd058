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
   <li class="active"><a href="Employeemonthlysalary_monprovision.php"><button class="btnmanu">Monthly Provisions</button></a></li>
   <li><a href="Employeemonthlysalary_updateleavec.php"><button class="btnmanu">Update Leave Calculation</button></a></li>
   <li><a href="Employeemonthlysalary_sabankdepositslip.php"><button class="btnmanu">Salary Bank Deposit Slip</button></a></li>
   <li><a href="Employeemonthlysalary_payrollprocesspage.php"><button class="btnmanu">Payroll Processing Page</button></a></li>
  </ul>
 </div>
<!--------------Details------------------>
 <div class="col-md-10">
  <div class="empl-top">Add Salary Monthly Provisions</div>
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
    <div class="col-xs-6" style="text-align:center;"><input name="btnShowSubject" type="button" value="Submit" onClick="show('comment');" class="btn" ></div>
   </div>
   
  </form>
   <!------------------Table------------------------->
    <div class="employee-table" id="comment" style="display:none;" >
    <style>
 		.tableem{border:1px solid #0b462d; border-radius:3px; margin-bottom:1%; height:420px; width:100%;}
 		.tableem table{width:100%;  } 
 		.tableem table tr{border-bottom:1px solid #ccc;}
 		.tableem table .col td{background:#0b462d; color:#fff; font-size:13px; padding:0.5% 0.1%; }
 		.tableem table td{padding:0.3% 0.1%; font-size:13px; border-left:1px solid #ccc; text-align:center; } .tableem table td:first-child{border:none;}
		.tableem table td .text-box{width:100%; border:1px solid #0b462d; border-radius:3px; padding:0.5% 3%; height:22px;}
		.tableem table td .btn{width:80px; border:1px solid #0b462d; border-radius:3px; padding:0% 5%; height:22px; }
	</style>
     <!---<div align="center" style="font-size:16px; font-weight:600; border-bottom:1px solid #ccc; ">DELHI PUBLIC SCHOOL </div>-->
     <div class="tableem" >
     <table id="table1">
      <tr class="col">
       <td>S.No.</td><td>Emp.Id</td> <td>Employee Name</td><td>Department</td><td>Designation</td><td>Action</td>
      </tr>
      <tr>
       <td>1.</td><td>DPS</td><td>ABC</td><td>XYC</td><td>STU</td>
       <td><a href="#" onClick="return popup(this, 'notes')"><button class="btn">Update</button></a></td>
      </tr>
     </table>
     <SCRIPT TYPE="text/javascript">
  function popup(mylink, windowname) { 
    if (! window.focus)return true;
    var href;
    if (typeof(mylink) == 'string') href=mylink;
    else href=mylink.href; 
    window.open(href, windowname, 'width=600,height=800,scrollbars=yes'); 
    return false; 
  }
</SCRIPT>
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
		document.getElementById("table").style.overflow = "hidden";
		document.getElementById("table").style.width = "100%";
		document.getElementById("table").style.border = "none";
		document.getElementById("table").style.padding = "0";
		document.getElementById("table1").style.width = "80%";
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
 </div>
</div>
<!----------------->
</div>
<!----------------->
</div>
</body>
</html>
