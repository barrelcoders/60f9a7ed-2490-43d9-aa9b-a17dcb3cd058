<?php
include '../../connection.php';

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
<script language="javascript">
function fnlWorkOrder(EmpId)
{
	//alert("WorkOrder/UpdateWorkOrderEmployee.php?EmpId=" + EmpId);
	window.location.assign("WorkOrder/UpdateWorkOrderEmployee.php?EmpId=" + EmpId);
	//window.location.href="WorkOrder/UpdateWorkOrderEmployee.php?EmpId=" + EmpId;
	return;
}
function ShowDelete(SrNo)
{
	var r = confirm("Do you really want to delete the entry?");
	if (r == true)
 	 {
  		var myWindow = window.open("DeleteAppointment.php?srno=" + SrNo ,"","width=300,height=400");
  	 }
	else
  	{
	  	return;
  	}
}
function fnlSendBirthdayMsg(srno,empid)
{
document.getElementById("btnBirthday"+srno).disabled=true;
var myWindow = window.open("SendBirthDayMsg.php?empid=" + empid ,"","width=300,height=400");
}
function fnlUploadMedicalCerti()
{
window.location.href="HRM/UploadMedicalCertification.php";
}
function fnlChangePw()
{
	var myWindow = window.open("ChangePw.php","","width=450,height=300");
}

</script>
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <link rel="stylesheet" href="css/payroll.css" />
   <script src="js/bootstrap.min.js"></script>


  <div class="a11">
   
	 <h4 align="center" style="background:#0b462d; color:#fff; padding:1.5%; font-size:15px; font-weight:550">IMPORTANT LINKS</h4>
	 <ul>
     <li class="manu"><a href="#">&raquo; &nbsp;My Upload</a>
        <ul class="submanu">
     	 <li><a href="ClassHomeWork/dailyuploadclasswork.php">&raquo; &nbsp;Upload Claswork &amp; Homework</a></li>
		 <li><a href="StudentAttendance/studentattendance.php">&raquo; &nbsp;Upload Class Attendance</a></li>
   		 <li><a href="CCE/ccemark.php">&raquo; &nbsp;Upload CCE Marks</a></li>
    	 <li><a href="#">&raquo; &nbsp;Upload Co-Scholastic Indicators</a></li>
    	 <li><a href="#">&raquo; &nbsp;Upload Class Assignments</a></li>
    	 <li><a href="#">&raquo; &nbsp;Upload Digital Videos</a></li>
   		 <li><a href="#">&raquo; &nbsp;Upload School Journal Articales</a></li>
	     <li><a href="#">&raquo; upload Student Dossier</a></li>
	   </ul> 
     </li>
     <!---<li class="manu"><a href="#">&raquo; &nbsp;Leave</a>
        <ul class="submanu">
     	 <li><a href="NewLeave.php">&raquo; &nbsp;New Leave</a></li>
         <li><a href="MyLeave.php">&raquo; &nbsp;My Leave</a></li>
         <li><a href="holidaycalender.php">&raquo; &nbsp;Holiday Calender</a></li>
        </ul>
     </li>-->
	 <li><a href="#">&raquo; Purchase Indent</a></li>
     <li><a href="#">&raquo; Approve Purchase Indent</a></li>
     <li><a href="#">&raquo; E - Service</a></li>
     <li><a href="#">&raquo; School Directory</a></li>
     <li><a href="#">&raquo; School Photo Gallery</a></li>
     <li><a href="#">&raquo; Change Password</a></li>
     <li><a href="#">&raquo; View Student Dossier</a></li>
	 </ul>
  </div>