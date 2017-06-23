<?php  
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<?php
$EmpNo=$_REQUEST["txtEmpNo"];
$EmployeeId=$_SESSION['userid'];

if ($EmpNo!="" || $EmployeeId!="" )
{
	$ssql="SELECT `srno`, `EmpId`, `Name`, date_format(`DOB`,'%d-%m-%Y') as `DOB`, `Gender`, `Category`, `Nationality`, date_format(`DOB`,'%d-%m-%Y') as `DOJ`, `LastSchool`, `employeetype`, `ClassTeacher`, `Education_Qualification`, `FatherName`, `Salary`, `Allowances`, `Address`, `MobileNo`, `Imei`, `UserId`, `Password`, `email`, `role`, `status`, `L1_Approver_Id`, `Department`, `Designation`, `PayBand`, `TeachingSubject`, `MaritalStatus`, `HusbandName`, `AnniversaryDate`, `DateTime`, `DesigOrder` FROM `employee_master` WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ";
	$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
					//$srno=$row[0];
					$empname=$row[2];
					$fathername=$row[12];
					$Address=$row[15];
					
					//yyyy-mm-dd
					//mm/dd/yyyy
					$arr=explode('-',$DOB);
					$DOB=  $arr[1]. "/" . $arr[2] . "/" . $arr[0];
	
	                $arrdoj=explode('-',$DOJ);
					$DOJ=  $arrdoj[1]. "/" . $arrdoj[2] . "/" . $arrdoj[0];

					
					$RetirementDate="To be Filled";
					$EduQuali=$row[11];
					
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Services Book</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<style type="text/css">
.footer {
    height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;
}   

.footer_contents 

{       height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;
}
.style1 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}
.style2 {
	text-align: center;
}
.style3 {
	font-size: medium;
	color: #FF0000;
}
.style4 {
	font-family: Cambria;
}
</style>

<p align="center">&nbsp;</p>
<p align="left"><font face="Cambria" style="font-size: 12pt"><b>Employee Service 
Book</b></font></p>
<hr>
<div id="MasterDiv">
<p align="center">&nbsp;<img src="../images/logo.png" height="91" width="364"></p>
<p align="center"><font face="Cambria" size="3"><b><?php echo $SchoolAddress; ?></p>
<p align="center"><font face="Cambria" size="3"><?php echo $SchoolPhoneNo; ?></b></p></font><br>
<hr>
<p align="center"><font face="Cambria" style="font-size: 12pt"><u><b>Employee Service Book</b></u></font></p><br>
<p align="center"><u><b><font face="Cambria">Session 2015 - 16</font></b></u></p>
<p align="center">&nbsp;</p>

<table border="1" width="100%" cellspacing="4" cellpadding="2" style="border-width:0px; border-collapse: collapse" bordercolor="#000000" height="408">
	<tr>
		<td width="1084" style="border-style: none; border-width: medium" height="33"><b><font face="Cambria">1.Name of Employee</font></b></td>
		<td style="border-style: none; border-width: medium" height="33"><font face="Cambria" size="3"><?php echo $empname; ?></font></td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium" height="29"><b><font face="Cambria">2.Father&#39;s/Husband&#39;s Name</font></b></td>
		<td style="border-style: none; border-width: medium" height="29"><font face="Cambria" size="3"><?php echo $fathername; ?></font></td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium" height="32"><b><font face="Cambria">3.Address (Local)</font></b></td>
		<td style="border-style: none; border-width: medium" height="32"><font face="Cambria" size="3"><?php echo $Address; ?></font></td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium" height="29"><b><font face="Cambria">4.Address (Permanent)</font></b></td>
		<td style="border-style: none; border-width: medium" height="29"><font face="Cambria" size="3"><?php echo $Address; ?></font></td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium" height="29"><b><font face="Cambria">5. a) Change of address w.e.f.</font></b></td>
		<td style="border-style: none; border-width: medium" height="29"><font face="Cambria" size="3"></font></td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium" height="28"><b><font face="Cambria">&nbsp;&nbsp;&nbsp; b) Change of 
		address w.e.f.</font></b></td>
		<td style="border-style: none; border-width: medium" height="28"><font face="Cambria" size="3"></font></td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium"><b><font face="Cambria">&nbsp;&nbsp;&nbsp; c) Change of 
		address w.e.f.</font></b></td>
		<td style="border-style: none; border-width: medium"><font face="Cambria" size="3"></font></td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium" height="31"><b><font face="Cambria">7.Date of Birth</font></b></td>
		<td style="border-style: none; border-width: medium" height="31"><font face="Cambria" size="3"><?php echo $DOB; ?></font></td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium" height="29"><b><font face="Cambria">8.Date of Appointment</font></b></td>
		<td style="border-style: none; border-width: medium" height="29"><font face="Cambria" size="3"><?php echo $DOJ; ?></font></td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium" height="30"><b><font face="Cambria">9.Date of Retirement</font></b></td>
		<td style="border-style: none; border-width: medium" height="30"><font face="Cambria" size="3"></font></td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium" height="30"><b><font face="Cambria">10.Educational Qualification</font></b></td>
		<td style="border-style: none; border-width: medium" height="30"><font face="Cambria" size="3"><?php echo $EduQuali; ?></font></td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium"><b><font face="Cambria">11.Type of appointment held</font></b></td>
		<td style="border-style: none; border-width: medium"><font face="Cambria" size="3"></font></td>
	</tr>
	</table>
	
	<p align="right">
	
	<font face="Cambria">
	
	<br>
	(+ Entry)</font></p>
	<table border="1" width="100%" cellspacing="4" cellpadding="2" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">	<tr>
		<td colspan="2" style="border-style: none; border-width: medium"><u><b><font face="Cambria">
		12.Other Special achievements if any </font></b></u><p>&nbsp;</td>
	</tr>
	</table>
	<font face="Cambria">
	<br>

	</font>

	<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px>
			<b><font face="Cambria">Area of Achievement</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px>
<b>

		<font face="Cambria">Achievement Date</font></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px>

			<b><font face="Cambria">Achievement Details</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px>
<b>

			<font face="Cambria">Date Of Entry </font></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_Achievement WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["AreaofAchievement"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["AchievementDate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["AchievementDetails"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateofEntry"];?></font></td>
	
	

</tr>
<?php   	 
}
?>
</table>


</div>
<font face="Cambria">
<br>



	</font>



	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">
	<tr>
		<td width="1084" style="border-style: none; border-width: medium"><u><b><font face="Cambria">13.Other Remarks</font></b></u></td>
		<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top: medium none #000000; border-bottom: medium none #000000">&nbsp;</td>
	</tr>
	</table>
	&nbsp;<p><font face="Cambria">
	<br>

	</font>

	</p>

	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td colspan="2" style="border-style: none; border-width: medium"><u><b><font face="Cambria">
		14.Physical Attributes </font></b></u><p>&nbsp;</td>
				
		</table>
		<font face="Cambria">
		<br>

		</font>

		<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">&nbsp;Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Height</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Weight</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Personal Identification</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Entry Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Finger 
		Impression</font></b></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_PhysicalAttributes WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Height"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Weight"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["PersonalIdentification"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateofEntry"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["FingerInspiration"];?></font></td>
</tr>
<?php   	 
}
?>
</table>



</div>
<font face="Cambria">
<br>
		</font>
		<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">
       <tr>
		<td width="1084" style="border-style: none; border-width: medium"><u><b><font face="Cambria">15.Signature of the employee with 
		date (To be re-attested after every five years)</font></b></u><p>&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium">&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
	</tr>
	<tr>
		<td width="1084" style="border-style: none; border-width: medium"><u><b><font face="Cambria">16.Signature with Seal of 
		Attesting Officer/Principal</font></b></u><p>&nbsp;</td>
		<td style="border-style: none; border-width: medium">&nbsp;</td>
	</tr>
	</table>
	<font face="Cambria">
	<br>

	</font>

	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td style="border-style: none; border-width: medium"><u><b><font face="Cambria">
		17.Educational Qualification : </font></b></u><p>&nbsp;</td>
		</table>
	<font face="Cambria">
	<br>

	</font>

	<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Examination</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Board</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Division/CGPA</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Year Of Passing </font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>



		<b><font face="Cambria">Entry Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>

<b>

		<font face="Cambria">Subjects&nbsp;</font></td>

		<td height="22" align="center" bgcolor="#95C23D" width=65>

<b>

		<font face="Cambria">Remarks&nbsp;</font></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_Education WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Examination"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Board"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Division"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Year"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateOfEntry"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Subjects"];?></font></td>
   <td align="center"><font face="Cambria"><?php echo $rs["Remarks"];?></font></td>
	

</tr>
<?php   	 
}
?>
</table>



</div>
<font face="Cambria">
<br>

	</font>

	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td style="border-style: none; border-width: medium"><u><b><font face="Cambria">
		18.Details of Previous Experiences : </font></b></u><p>&nbsp;</td>
		</table>
	<font face="Cambria">
	<br>

	</font>

	<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Organization Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period From</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period To</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Class Taught </font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>

<b>

		<font face="Cambria">Subjects Taught</font></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>

<b>

		<font face="Cambria">Date Of Entry&nbsp;</font></td>

		<td height="22" align="center" bgcolor="#95C23D" width=65>

<b>

		<font face="Cambria">Remarks&nbsp;</font></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_Experiecnce WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["NameOfInstitution"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["PeriodFrom"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["PeriodTo"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["ClassTaught"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["SubjectsTaught"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateOfEntry"];?></font></td>
   <td align="center"><font face="Cambria"><?php echo $rs["Remarks"];?></font></td>
	

</tr>
<?php   	 
}
?>
</table>



</div>
<font face="Cambria">
<br>


	</font>


	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td style="border-style: none; border-width: medium"><u><b><font face="Cambria">
		19.Details of Family : </font></b></u><p>&nbsp;</td>
		
		<font face="Cambria">
		<br>

	</font></table>
	<br>
<br>

<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">&nbsp;Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Family Member Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Gender</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Age of Family Member</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Remarks</font></b></td>

		<td height="22" align="center" bgcolor="#95C23D" width=65><b>Entry Date</b></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_FamilyDetails WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["FamilyMemberName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Gender"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Age"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Remarks"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateofEntry"];?></font></td>


</tr>
<?php   	 
}
?>
</table>


</div>
<br>
<br>


	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	
	<tr>
		<td style="border-style: none; border-width: medium"><u><b><font face="Cambria">20.Nomination of Provident Fund/Gratuity.</font></b></u><p><font face="Cambria">
		I hereby direct that the amount at my credit in the school Teachers 
		Provident Fund Trust/Gratuity due to me under the rules, at the time of 
		my death shall be distributed among the members of my family mentioned 
		below in the manner shown against their names. </font></td>
	</tr>
	</table>
	<font face="Cambria">
	<br>

	</font>

	<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">&nbsp;Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Nominee Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Nominee Address</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Relationship With Nominee</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Nominee Age</font></b></td>

		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Accumulation Amount</font></b></td>
		
		<td height="22" align="center" bgcolor="#95C23D" width=65>
		<font face="Cambria"><b>Entry Date</b></font></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_PFNominee WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["NameofNominee"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["AddressofNominee"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Relationship"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["AgeofNominee"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Amount"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateofEntry"];?></font></td>


</tr>
<?php   	 
}
?>
</table>



</div>
<font face="Cambria">
<br>

	</font>

	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td style="border-style: none; border-width: medium"><font face="Cambria">
		<u><b>21.Record of Posts Held </b></u></font></td>
	</tr>
	</table>
	<font face="Cambria">
	<br>

	</font>

	<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">
		Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">
		Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">
		Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">
		Appointment Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Position</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Matching Job</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Pay Scale</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b><font face="Cambria">
		Basic Pay</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Grade Pay</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Allowances</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">
		Gross Pay</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Level</font></b></td>
	
		
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_PostsHeld WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateofApportionment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Position"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["MatchingJob"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["PayScale"];?></font></td>
	 <td align="center"><font face="Cambria"><?php echo $rs["BasicPay"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["GradePay"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Allowances"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["TotalGrossPay"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Level"];?></font></td>
	<font face="Cambria">&gt;
	
</font>
	
</tr>
<?php   	 
}
?>
</table>


</div>
<font face="Cambria">
<br>

	</font>

	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td style="border-style: none; border-width: medium"><u><b><font face="Cambria">
		22.Record of Jobs of Special Responsibility Held </font></b></u><p>&nbsp;</td>
		</table>
	<font face="Cambria">
	<br>

	</font>

	<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">
		&nbsp;Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">
		Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">
		Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Post Held</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Date From</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Date To</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">
		Allowances Draw</font></b></td>
		
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_SpecialResponsibilities WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["PostHeld"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateFrom"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateTo"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["SAD"];?></font></td>
	
</tr>
<?php   	 
}
?>
</table>


</div>
<font face="Cambria">
<br>

	</font>

	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td style="border-style: none; border-width: medium"><u><b><font face="Cambria">
		23.Training Record of Program (s) Workshop (s)/Seminar (s) Attended </font></b></u><p>&nbsp;</td>
		</table>
		<font face="Cambria">
		<br>
	</font>
	<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">&nbsp;Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Training Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Topic</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Venue</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Training Duration</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>
		<font face="Cambria"><b>
		Organization Name</b></font></td>
		
		<td height="22" align="center" bgcolor="#95C23D" width=65>
		<font face="Cambria"><b>Entry Date</b></font></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_TrainingDetails WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["TrainingDate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Topic"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Venue"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Duration"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["NameOfInstitution"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateOfEntry"];?></font></td>
	

</tr>
<?php   	 
}
?>
</table>


</div>
<font face="Cambria">
<br>


	</font>


	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td style="border-style: none; border-width: medium"><u><b><font face="Cambria">
		24.Record of Deputation </font></b></u><p>&nbsp;</td>
		</table>
		<font face="Cambria">
		<br>
	</font>
	<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Deputation Job</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period From</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period To</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Organization Name&nbsp; </font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>

<b>

		<font face="Cambria">Date Of Entry</font></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_Deputation WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId'  ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DeputationJob"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["FromDate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["ToDate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["NameOfOrganization"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DateOfEntry"];?></font></td>
	

</tr>
<?php   	 
}
?>
</table>


</div>
<font face="Cambria">
<br>

	</font>

	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td style="border-style: none; border-width: medium"><u><b><font face="Cambria">
		25.Earned Leave Account </font></b></u><p>&nbsp;</td>
		</table>
	
	<font face="Cambria">
	
	<br>
	</font>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td style="border-style: none; border-width: medium"><u><b><font face="Cambria">
		26.Half Pay Leave Account </font></b></u></td>
	</tr>
	</table>
	&nbsp;<p><font face="Cambria">
	<br>
	</font>
	</p>
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td style="border-style: none; border-width: medium"><u><b><font face="Cambria">27.Record of L.T.C. </font></b></u><p>&nbsp;</td>
	</tr>
		
		<font face="Cambria">
		</table>
		<br>
<br>

		<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">&nbsp;Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period From</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period To</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Days</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
			<font face="Cambria">Type of L.T.C.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=50><b>Service 
		Tenure</b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=50><b>
		<font face="Cambria">Amount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=50><b>Actual 
		Claim</b></td>

		<td height="22" align="center" bgcolor="#95C23D" width=50><b>Service 
		Remarks</b></td>

		<td height="22" align="center" bgcolor="#95C23D" width=65><b>Entry Date</b></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_LTC  WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["FromDate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["ToDate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Days"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["TypeofLTC"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["BlockofYears"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Amount"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["ActualClaim"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Remarks"];?></font></td>
   <td align="center"><font face="Cambria"><?php echo $rs["DateofEntry"];?></font></td>
	

</tr>
<?php   	 
}
?>
</table>


</div>


		<br>
		</font>
		<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

	<tr>
		<td colspan="2" style="border-style: none; border-width: medium"><u><b><font face="Cambria">
		28.Record of Maternity/Medical Leave </font></b></u><p>&nbsp;</td>
		</tr>
		</table>
		<font face="Cambria">
		<br>

		</font>

		<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">
		Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">
		Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">&nbsp;Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period From</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period To</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Days</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
			<font face="Cambria">Type of Appointment </font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>
		<font face="Cambria"><b>Service 
		Tenure</b></font></td>
		<td height="22" align="center" bgcolor="#95C23D" width=100>
		<font face="Cambria"><b>Service 
		Remarks</b></font></td>

		<td height="22" align="center" bgcolor="#95C23D" width=65>
		<font face="Cambria"><b>Entry Date</b></font></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_MedicalLeave  WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["FromDate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["ToDate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Days"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["TypeofAppointment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["LengthofService"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Remarks"];?></font></td>
   <td align="center"><font face="Cambria"><?php echo $rs["DateofEntry"];?></font></td>
	

</tr>
<?php   	 
}
?>
</table>


</div>
<font face="Cambria">
<br>

</font>

<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-width:0px; border-collapse: collapse" bordercolor="#000000">

<tr>

		<td style="border-style: none; border-width: medium"><u><b><font face="Cambria">29.Record for LWP </font></b></u><p>&nbsp;</td>
	

<font face="Cambria">
</font>	</table>
<br>
<br>

<div align="center">
<table border=1  cellspacing="0" cellpadding="0"  class="CSSTableGenerator">
   <tr>
   		<td height="50" align="center"  bgcolor="#95C23D" width=150px ><b><font face="Cambria">Sr. No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D" width=250px><b><font face="Cambria">Employee ID.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=450px><b>
		<font face="Cambria">&nbsp;Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=150px><b>
		<font face="Cambria">Department</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Designation</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period From</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Period To</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
		<font face="Cambria">Days</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D" width=250px><b>
			<font face="Cambria">Total Days of LOP</font></b></td>

		<td height="22" align="center" bgcolor="#95C23D" width=50><b>Service 
		Remarks</b></td>

		<td height="22" align="center" bgcolor="#95C23D" width=65><b>Entry Date</b></td>
		
   	</tr>
<?php
$result=mysql_query("select * from EmployeeSB_LWP WHERE`EmpId`='$EmpNo' OR `EmpId`='$EmployeeId' ");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpID"];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["EmpName"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDepartment"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["EmpDesignation"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["FromDate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["ToDate"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Days"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["DaysofLossPay"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["Remarks"];?></font></td>
   <td align="center"><font face="Cambria"><?php echo $rs["DateofEntry"];?></font></td>
	

</tr>
<?php   	 
}
?>
</table>


</div>
</div>
<br>
<br>
<br>

<p align="center"><font face="Cambria"><a href="Javascript:printDiv();">PRINT</a></font>
<SCRIPT language="javascript">
function printDiv() 
	{
        //Get the HTML of div
        var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        //Print Page
        window.print();
        //Restore orignal HTML
        document.body.innerHTML = oldPage;
 	}
</script>


