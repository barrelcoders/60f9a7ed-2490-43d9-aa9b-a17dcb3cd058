<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<html>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Payroll Landing Page</title>
</head>
<style>
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

</style>
<body>

	<p>&nbsp;</p>
	<p>&nbsp;</p>

	<table border="0" width="100%" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="22" bgcolor="#008080" width="662" style="border-left-style: solid; border-left-width: 1px; border-top-style: solid; border-top-width: 1px"><b>
			<font face="Cambria" color="#FFFFFF">Registration Reports</font></b></td>
			<td height="22" bgcolor="#008080" width="663" style="border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px">
			<b><font face="Cambria" color="#FFFFFF">Student Management Reports</font></b></td>
		</tr>
			<tr><td style="border-left-style: solid; border-left-width: 1px">
&nbsp;<p><b><font face="Cambria">
<a href="../StudentManagement/NewStudentRegistrationReport1.php">1. 
			Successfully Completed 
			Registration Report</a></font></b></font></b></td>
				<td style="border-right-style: solid; border-right-width: 1px">
&nbsp;<p><b><font face="Cambria">
<a href="../StudentManagement/StudentMaster.php">1. School Student Master</a></font></b></font></b></td></tr>
<tr><td style="border-left-style: solid; border-left-width: 1px">
&nbsp;<p><b><font face="Cambria">
<a href="../StudentManagement/NewStudentRegistractionIncomplete.php">2. Pending Registrations 
			Report</a></font></font></b></td>
	<td style="border-right-style: solid; border-right-width: 1px">
&nbsp;<p><b><font face="Cambria"><a href="ClasswiseMaleFemaleReport.php">2. Male 
Female Ratio Report</a></font></b></font></b></td></tr>
			
			
			<tr><td style="border-left-style: solid; border-left-width: 1px">&nbsp;<p>
				<b><font face="Cambria"><a href="RegistrationFeeReport.php">3. Registration Form Sales 
			Report</a></font></b></font></b></p>
				</p></td>
				<td style="border-right-style: solid; border-right-width: 1px">&nbsp;<p>
				<a href="../StudentManagement/SearchAlumni.php"><b>
				<font face="Cambria">3. Alumni Database </font></b>
				</td></tr>
			<tr><td style="border-left-style: solid; border-left-width: 1px">&nbsp;<p>
				<b><font face="Cambria">
				<a href="../StudentManagement/RegistrationApproveReject.php">4. Registration Scoring 
			(Approve / Reject Registration)</a></font></b></font></b></td>
				<td style="border-right-style: solid; border-right-width: 1px">&nbsp;<p>
				<font face="Cambria"><b><a href="DiscountwiseStudentDetail.php">
				4. Student Discount Summary</a> </b></font>
				</td></tr>
			
			</td>
			</tr>
			
			<tr>
			
			<td style="border-left-style: solid; border-left-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
			&nbsp;</td>
			
			<td style="border-right-style: solid; border-right-width: 1px; border-bottom-style: solid; border-bottom-width: 1px">
			&nbsp;<p><b><font face="Cambria">
			<a href="RoutewiseStudentDetail.php">5. Bus Route Routewise Summary</a> </font>
				</td>
						</tr>
		<tr>
			
			<td colspan="2" height="23">
			&nbsp;</td>
						</tr>
	</table>
	
	<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td height="35" width="605" align="center">
			&nbsp;</td>
		</tr>
	</table>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font>


</body>

</html>