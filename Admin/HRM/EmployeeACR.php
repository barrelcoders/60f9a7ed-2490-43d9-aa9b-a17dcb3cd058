<?php
session_start();
include '../../connection.php';
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
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>


<table border="1" width="100%" style="border-collapse: collapse; border-left-width: 0px; border-right-width: 0px; border-top-width: 0px" height="450">
	<tr>
		<td  style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">
		&nbsp;</td>
	</tr>
	<tr class="style2" bgcolor="#95C23D">
		<td class="style2" bgcolor="#95C23D" style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">
		<p align="center"><b><font size="5" face="Cambria">EMPLOYEE SELF APPRAISAL</font></b></td>
	</tr>
	<tr>
		<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">
		&nbsp;</td>
	</tr>
	<tr>
		<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium">
		<b><font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<u>Steps In ACR 
		Processing:</u></font></b></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px">
		<font face="Cambria" style="font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="../HRM/EmployeeSelfAppraisal.php">Step 1 : 
		Basic Information</a></font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px">
		<font face="Cambria" style="font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="../HRM/EmployeeSB_EducationDetailsSelf.php">Step 
		2 : 
		Employee Educational Qualifications </a>(In case of&nbsp; Multiple 
		records entry for the Educational Qualification you are requested to 
		click the same link again and again. )</font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px">
		<font face="Cambria" style="font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="../HRM/EmployeeSB_ExperienceSelf.php">Step 3 : 
		Employee Experience Details</a> (In case of&nbsp; Multiple records entry 
		for the Experience Details you are requested to click the same link 
		again and again. )</font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px">
		<font face="Cambria" style="font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="../HRM/EmployeeSB_TrainingSelf.php">Step 
		4 : Training Record</a> (In case of&nbsp; Multiple records entry for the 
		Training Records you are requested to click the same link again and 
		again. )</font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px">
		<font face="Cambria" style="font-weight: 700">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="../HRM/EmployeeDocument.php">Step 5 : Employee Documents Upload</a></font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px">
		&nbsp;</td>
	</tr>
	</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>

</html>