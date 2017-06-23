<?php 
//session_start();
include '../connection.php'; 
include '../AppConf.php'; 
include 'Header/Header4.php';
?>
<?php
$EmployeeId=$_SESSION['userid'];
$rsEmp=mysql_query("select `Name`,`Department`,`Designation`,`DOJ`,`EmpId`,`MobileNo`,`L1_Approver_Id`,`Form16FileName` from `employee_master` where `EmpId` ='$EmployeeId'");
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
			$FOrm16FileName=$row[7];
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
<style type="text/css">

.footer {

    height:25px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 1pt;
    left: 0pt;

}   

.footer_contents 

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;

}

</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: School Education
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome to School Management System</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" /><script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="layout/scripts/jquery.slidepanel.setup.js"></script>
<style></style>
</head>
<body>

<div class="wrapper col6">
  
</div></td></tr></table><table width="1327" border="0">
			<tr>
				<td width="1314" colspan="3">
				
	 <b><font face="Cambria">Welcome, <?php echo $Name;?> !</font></b></td>
    
    
</tr>
			<tr>
				<td width="8%">
				
	 <div id="column">
      <div class="subnav">
        <h2 align="center"><span lang="en-us">
		<font face="Cambria" style="font-size: 12pt; text-decoration:underline" color="#339933"><b>Important Links</b></font></span></h2>
        <ul>
          <h4><li><font face="Cambria" style="font-size: 12pt">
			<a href="Academics/frmClassWork.php">Upload Classwork &amp; Homework</a></font></li>
          <li><font face="Cambria" style="font-size: 12pt">
			<a href="Academics/frmAttendance.php">Upload Class Attendance</a></font></li>
            <li><font face="Cambria" style="font-size: 12pt">
			<a href="CCE/frmBulkReportCard.php">Upload CCE Marks</a></li>
			<li><font face="Cambria" style="font-size: 12pt">
			<a href="CCE/frmBulkIndicatorUpload.php">Upload Co-Scholastic Indicators</a></li>
			<font face="Cambria" style="font-size: 12pt">

             <li><a href="Academics/UploadAssignmentOld.php">Upload Class Assignments</a>
          </li>
			<li><a href="DigitalVideoLibrary/UploadVideoTeachers.php">Upload Digital Videos<img src="../Users/images/blink.gif" height="30" width="40"></a></li>
          
          	<li><a download="<?php echo $FOrm16FileName; ?>" href="Payroll/Form16Files/<?php echo $FOrm16FileName; ?>">Download Form 16<img src="../Users/images/blink.gif" height="30" width="40"></a></li>
        
         		<li><a href="HRM/EmployeeACR.php">Self Appraisal<img src="../Users/images/blink.gif" height="30" width="40"></a></li>
        
     <!--<li><a href="Payroll/PrintSalarySlip.php">View Salary Slip<img src="../Users/images/blink.gif" height="30" width="40"></a></li>-->
      <li><a href="QueryManagement/EmployeeQuery.php">Send Query<img src="../Users/images/blink.gif" height="30" width="40"></a></li>

        


        
        
          </div>
          </div>
           <div id="column">
	<div class="subnav">
		<h2 align="center"><u><span lang="en-us">
		<font face="Cambria" color="#339933" style="font-size: 12pt"><b>My Tasks</b></font></span></u></h2>
        <ul>
        <h4><li><font face="Cambria" style="font-size: 12pt">
        	<a href="HRM/ApplyLeave.php">Apply For Leave</a></font></li>
        	
            <li><font face="Cambria" style="font-size: 12pt"><a href="Inventory/PurchaseRequest.php">Purchase Indent</a></font></li>
		<li><a href="Inventory/ApprovePurchaseRequestL1.php">Approve Purchase Indent</a></li>
           <li><font face="Cambria" style="font-size: 12pt"><a href="HRM/EmployeeSB_ServiceRecord.php">E - Service Book</a></font></li>
			  <li><font face="Cambria" style="font-size: 12pt"><a href="StudentManagement/StudentDossier.php">Update Student Dossier</a></font></li>
			  <li><font face="Cambria" style="font-size: 12pt"><a href="Academics/Directory.php">School Directory</a></font></li>
               <li><font face="Cambria" style="font-size: 12pt"><a href="../Gallery/index.php">School Photo Gallery</a></li>
               <li><font face="Cambria" style="font-size: 12pt"><a href="Javascript:fnlChangePw();">Change Password</a></li>
                <li><font face="Cambria" style="font-size: 12pt"><a href="StudentManagement/ViewStudentProfile.php">View Student Dossier</a></font></li>

            	</font>
            </h2>
          </li>
        </ul>
      </div>
    </div>
    </td>
    
    
<!-- #########################################Navigation TD Close ############################################################## -->    
<!-- #########################################Content TD Open ############################################################## -->    
<td width="80%" bgcolor="#FFFFFF">
			
    
<div>
  <div>
    <div>
     
<table border="1" width="80%" cellspacing="1" style="border-width:0px; border-collapse: collapse" bordercolor="#000000" id="table1">
	<tr>
		<td bgcolor="#C0C0C0" style="border-style:none; border-width:medium; ">
		
		<b><font face="Cambria">Tasks Management</span></font></b></td>
	</tr>
	<tr>
		<td style="border-style:none; border-width:medium; ">
		<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" id="table3">
			<tr>
				<td  width="120" bgcolor="#FFFFFF" align="center">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px">
				Task No</span></td>
				<td  width="567" bgcolor="#FFFFFF" align="center">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px">
				Work Order Details</span></td>
				<td  width="96" bgcolor="#FFFFFF" align="center">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px">
				Target Date</span></td>
				<td  width="104" bgcolor="#FFFFFF" align="center">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px">
				Update</span></td>
			</tr>
		<?php
$rsWork=mysql_query("select `srno`,`WorkDetail`,date_format(`LastDate`,'%d-%m-%Y') from `work_allocation` where `Status`='Active' and `EmpId`='$EmployeeId' order by `LastDate` desc");
$wsrno=0;
while($rowW=mysql_fetch_row($rsWork))
{
$srno=$rowW[0];
$WorkDetail=$rowW[1];
$LastDate=$rowW[2];
$wsrno=$wsrno+1;
?>
		<tr>

			<td style="border-style: solid; border-width: 1px" class="style2">
			<font face="Cambria" style="font-size: 11pt">
			<?php echo $srno;?>
			
			</font>
			</td>

			<td width="174" align="center" style="border-style: solid; border-width: 1px" class="style1">
			<font face="Cambria" style="font-size: 11pt">
			<?php echo $WorkDetail;?>
			</font>
			</td>

			<td width="174" align="center" style="border-style: solid; border-width: 1px" class="style1">
				<font face="Cambria" style="font-size: 11pt">
				<?php echo $LastDate;?> </font></font></td>
				
			<td width="174" align="center" style="border-style: solid; border-width: 1px" class="style1">

				
				<font face="Cambria"><font size="3">
				<span style="font-size: 11pt">

				
				<input name="btnUpdate<?php echo $wsrno;?>" type="button" value="Update" class="text-box" onclick="javascript:fnlWorkOrder('<?php echo $EmployeeId;?>');"></span></font><span style="font-size: 11pt">
				</font></span></font></td>
</td>

		</tr>
<?php
}
?>

			
		</table>
		</td>
	</tr>
</table>		
<p>&nbsp;</p>
     
<table border="1" width="80%" cellspacing="1" style="border-width:0px; border-collapse: collapse" bordercolor="#000000" id="table4">
	<tr>
		<td bgcolor="#C0C0C0" style="border-style:none; border-width:medium; ">
				<b><font face="Cambria">Office Circulars</span></font></b></td>
	</tr>
	<tr>
		<td style="border-style:none; border-width:medium; ">
		<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" id="table5">
		<?php
		$recno=0;
		while($rowN=mysql_fetch_row($rsNotice))
		{
			$NoticeTitle=$rowN[0];
			$NoticeDate=$rowN[1];
			$srno=$rowN[2];
			$recno=$recno+1;
		}
		?>
			<tr>
				<td  width="120" bgcolor="#FFFFFF" align="center">
				<span style="font-family: Cambria; font-weight: 700; font-size: 15px; "><?php echo $recno;?></span></td>
				<td  width="634" bgcolor="#FFFFFF" align="center"><span style="font-family: Cambria; font-weight: 700; font-size: 15px"><?php echo $NoticeTitle;?></span></td>
				<td  width="103" bgcolor="#FFFFFF" align="center"><span style="font-family: Cambria; font-weight: 700; font-size: 15px"><a href="Communication/ShowEmpNotice.php?srno=<?php echo $srno;?>" target="_blank">Preview</a></span></td>
			</tr>
			
			
		</table>
		</td>
	</tr>
</table>		
<p><font face="Cambria" color="#FF0000"><b><!--Alert : You need to upload your 
medical certificate for the previous leave availed under Medical category.--><br>&nbsp;</b></font></p>
		<td width="12%">

<div>


	<table  id="table7" width="100%" style="border-collapse: collapse" border="1">

			<tr>

				<td  bgcolor="#F0F0F0" align="center"  colspan="4" style="border-style: solid; border-width: 1px">

				<p align="left"><font face="Cambria">Today's 
				Appointments</font></td>
				
				
							</tr>

			<tr>

				
				<td  bgcolor="#FFFFFF" align="center" width="337">

				<font face="Cambria" style="font-size: 12pt; font-weight:700">Name</font></td>
				
				<td  bgcolor="#FFFFFF" align="center" width="337" >

				<span style="font-weight: 700"><font face="Cambria">Organization</font></span></td>
				
				<!--<td  bgcolor="#FFFFFF" align="center" width="248" >

				<font face="Cambria" style="font-size: 12pt; font-weight:700">Organization</font></td>-->
				<td  bgcolor="#FFFFFF" align="center" width="249" >
				
				

				<span style="font-weight: 700"><font face="Cambria">Time</font></span><font face="Cambria" style="font-size: 12pt; font-weight:700"> </font></td>
				

				<td  bgcolor="#FFFFFF" align="center" width="338"  >

				<span style="font-weight: 700"><font face="Cambria">Cancel</font></span></td>
				
				
		

							</tr>
							</tr>



<?php
$rs=mysql_query("SELECT `srno`, `Name`, `Designation`, `CompanyName`,`VisitorMobile`, `AppointmentType`, `EmployeeName`, `EmployeeMobile`, date_format(`DateofAppointment`,'%d-%m-%y'), `FromTimeOfAppointment`, `ToTimeOfAppointment`, `Remarks` FROM `appointment` WHERE `EmployeeName`='$Empname' and `DateofAppointment` between curdate() and date_format(curdate()+5,'%Y-%m-%d')");
	$srno=0;
	while($row = mysql_fetch_row($rs))
	{
	$srno=$srno+1;
	$EmpId=$row[0];
?>

<tr>
	<td align="center" height="21" width="337"><font face="Cambria"><?php echo $row[1];?></font></td>
	<td align="center" height="21" width="337"><font face="Cambria"><?php echo $row[2];?></font></td>
	<td align="center" height="21" width="249"><font face="Cambria"><?php echo $row[5];?></font></td>
	<td align="center" height="21" width="338"><font face="Cambria">
	<input type="button" value="Cancel !" name="btnBirthday<?php echo $srno;?>0" id="btnBirthday<?php echo $srno;?>0" style="font-weight: 700" class="text-box" onclick="javascript:fnlSendBirthdayMsg('<?php echo $srno;?>','<?php echo $EmpId;?>');"></font>
	</td>
  </tr> 
  
  <?php 
  $srno=$srno+1;
  }
   ?> 

</table>
	<p>&nbsp;</p>
	<table  id="table4" width="100%" style="border-collapse: collapse" border="1">

			<tr>

				<td  bgcolor="#F0F0F0" align="center"  colspan="4" style="border-style: solid; border-width: 1px">

				<p align="left"><font face="Cambria">Today's 
				Birthday</font></td>
				
				
							</tr>

			<tr>

				
				<td  bgcolor="#FFFFFF" align="center" width="337">

				<font face="Cambria" style="font-size: 12pt; font-weight:700">Name</font></td>
				
				<td  bgcolor="#FFFFFF" align="center" width="337" >

				<font face="Cambria" style="font-size: 12pt; font-weight:700">Designation</font></td>
				
				<!--<td  bgcolor="#FFFFFF" align="center" width="248" >

				<font face="Cambria" style="font-size: 12pt; font-weight:700">Organization</font></td>-->
				<td  bgcolor="#FFFFFF" align="center" width="249" >
				
				

				<font face="Cambria" style="font-size: 12pt; font-weight:700">Contact </font></td>
				

				<td  bgcolor="#FFFFFF" align="center" width="338"  >

				<span style="font-weight: 700"><font face="Cambria">Send 
				Wishes</font></span></td>
				
				
		

							</tr>
							</tr>


<?php

$date = date('m-d');
//$rs=mysql_query("select `srno`,`Name`,`Designation`,`DOB`,`EmpId`,`MobileNo` from `employee_master` where date_format(`DOB`,'%m%-%d%')=date_format(curdate()-1,'%m%-%d%')");
$rs=mysql_query("select `srno`,`Name`,`Designation`,`DOB`,`EmpId`,`MobileNo` from `employee_master` where date_format(`DOB`,'%m-%d')='".$date."'");

	$srno=1;
	while($row = mysql_fetch_row($rs))
	{
	$EmpId=$row[4];
	
?>
<tr>
	<td align="center" height="21" width="337"><font face="Cambria"><?php echo $row[1];?></font></td>
	<td align="center" height="21" width="337"><font face="Cambria"><?php echo $row[2];?></font></td>
	<td align="center" height="21" width="249"><font face="Cambria"><?php echo $row[5];?></font></td>
	<td align="center" height="21" width="338"><font face="Cambria">
	<input type="button" value="Send Wishes !" name="btnBirthday<?php echo $srno;?>" id="btnBirthday<?php echo $srno;?>" style="font-weight: 700" class="text-box" onclick="javascript:fnlSendBirthdayMsg('<?php echo $srno;?>','<?php echo $EmpId;?>');"></font>
	</td>
  </tr> 
  
  <?php 
  $srno=$srno+1;
  }
   ?> 

</table></td>

</td>

<!--####################################Content TD close ################################################### -->
    
</tr></table>

<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</body>
</html>