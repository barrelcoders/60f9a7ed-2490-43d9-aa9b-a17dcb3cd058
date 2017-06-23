<?php
include '../../../connection.php';

$EmployeeId=$_SESSION['userid'];
$rsEmp=mysql_query("select `Name`,`Department`,`Designation`,`DOJ`,`EmpId`,`MobileNo`,`L1_Approver_Id`,`ProfilePhoto` from `employee_master` where `EmpId` ='$EmployeeId'");
$rs1=mysql_query("select `Name` from `employee_master` where `EmpId` ='$EmployeeId'");
$currentdate=date("Y-m-d");
while($row = mysql_fetch_row($rsEmp))
		{
			$Name=$row[0];
			$Department=$row[1];
			$Designation=$row[2];
			$DOJ=$row[3];
			$EmpId=$row[4];
			$MobileNo=$row[5];
			$ManagerId=$row[6];
			$ProfilePhoto=$row[7];
			break;
		}
		while($row1 = mysql_fetch_row($rs1))
		{
			$Empname=$row1[0];
			break;
		}

$rsNotice=mysql_query("select `noticetitle`,`NoticeDate`,`srno` from `employee_notice` where `EmpId`='$EmployeeId' or `EmpId`='All'");

?>
<html lang=''>
<head>

   <link rel="stylesheet" href="../../css/bootstrap.min.css" />
   <link rel="stylesheet" href="../../css/payroll.css" />
   <script src="../../js/bootstrap.min.js"></script>

<div id="container">
<!----Header--------->
  <div class="row t">
  <div class="col-md-5"><img src="../../images/logo.png" class="img-responsive"></div>
  <div class="col-md-5 o"><!--<img src="OSP.png" class="img-responsive">--></div>
  <div class="col-md-1" align="right"><span class="name"><?php echo $Name;?></span></div>
  <div class="col-md-1">
  		<span class="imghover"><img src="../Hris/EmpPhoto/<?php echo $ProfilePhoto;?>" class="img-circle" width="50px" height="50px">
             <ul class="submanu">
               <li class="te"></li>
               <li><a href="#"><button class="btnmanu">Change Password</button></a></li>
               <li><a href="../../Login.php"><button class="btnmanu">Logout</button></a></li>
             </ul>
        </span>
  </div>
 </div> 
 <!-----manu---->
 <div>
   <nav id="nav" role="navigation">
    <a href="#nav" title="Show navigation">Show Manu
	 
	</a>
    <a href="#" title="Hide navigation">Hide Manu</a>
    <ul>
        <li class="m"><a href="../index.php" active><button class="btnmanu">HOME</button></a></li>
        <li class="m"><a href="../Hris/HRISmydetail.php"><button class="btnmanu">HRIS </button></a></li>
        <li class="m"><a href="../Leave/NewLeave.php"><button class="btnmanu">LEAVE</button></a></li>
        <li  class="m1"><a href="#StudentAttendance/studentattendance.php" ><button class="btnmanu">ATTENDANCE</button></a></li>
		<li  class="m active"><a href="payroll.php" ><button class="btnmanu">PAYROLL</button></a></li>
		<li class="m"><a href="../Exit/exit.php"><button class="btnmanu">EXIT</button></a></li>
		<li  class="m1"><a href="../Helpdesk/helpdeskNewquery.php"><button class="btnmanu">HELPDESK</button></a></li> 
    </ul>
</nav>
  
 </div>
</div>