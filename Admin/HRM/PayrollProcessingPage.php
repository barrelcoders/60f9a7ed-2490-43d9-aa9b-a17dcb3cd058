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
<font color="#FFFFFF" face="Cambria" size="3">Powered by Eduworld Technologies 
LLP</font></div>
</div>

<p>&nbsp;</p>
<table border="1" width="100%" style="border-collapse: collapse; border-left-width: 0px; border-right-width: 0px; border-top-width: 0px" height="450">
	<tr>
		<td style="border-left-style: none; border-left-width: medium; border-right-style: none; border-right-width: medium; border-top-style: none; border-top-width: medium" colspan="6" bgcolor="#008000">
		<p align="center">
		<u><b><font face="Cambria" style="font-size: 12pt" color="#FFFFFF">Steps In Payroll 
		Processing:</font></b></u></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="6">
		<font face="Cambria" style="font-size: 12pt; font-weight: 700">Step 1 : <a href="../HRM/EmployeeRegistration.php">
		Add New Employees if any</a></font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="3">
		<font face="Cambria" style="font-size: 12pt; font-weight: 700">Step 2A : <a href="../HRM/EmployeeAlumni.php">Employee Separations</a></font></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="3">
		<b><font face="Cambria">Step 2B : <a href="../HRM/UpdateEmployeeLastWorkingDay.php">Update Employee Last Working Date</a></font></b></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="6">
		<font face="Cambria" style="font-size: 12pt; font-weight: 700">Step 3 : <a href="EmployeeAccountNo.php">Update Employee Bank Accounts</a></font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="3" height="24">
		<font face="Cambria" style="font-size: 12pt; font-weight: 700">Step 4A : </font>
		<font face="Cambria"><b> <a href="FinalTaxCalulation.php">Update Income 
		Tax Deductions</a></b></font></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="3" height="24">
		 <font face="Cambria" style="font-size: 12pt; font-weight: 700">Step 4B : </font>
			<a href="AddEmployeeTax.php"><b><font face="Cambria">Add Income 
		Tax Deductions</a></b></font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" width="99%" colspan="6">
		&nbsp;</td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" width="99%" colspan="6" bgcolor="#008000">
		<font face="Cambria" color="#FFFFFF"><b>Salary Increment</b></font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" width="33%" colspan="2">
		<b><font face="Cambria">Step 5A: <a href="SalaryIncrement.php">Employee Regular Increment</a></font></b></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" width="33%" colspan="2">
		<b><font face="Cambria">Step 5B: <a href="ModifyEmployeeSalary.php">Modify Payband, GP, AGP, TA, TADA</a></font></b></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" width="33%" colspan="2">
		<b><font face="Cambria">Step 5C: Complete Salary Revision</font></b></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" width="99%" colspan="6">
		&nbsp;</td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" width="99%" colspan="6" bgcolor="#008000">
		<font face="Cambria" color="#FFFFFF"><u><b>Monthly Earning and Deduction Variables 
		Upload</b></u></font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" width="33%" colspan="2">
		<font face="Cambria" style="font-size: 12pt; font-weight: 700">Step 6A : </font>
		<b><font face="Cambria" style="font-size: 12pt"><a href="UploadSalaryProvision.php">Bulk Upload Earning Variables (One Time Only For Any Month)</a></font></b></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" width="33%" colspan="2">
		<font face="Cambria" style="font-size: 12pt; font-weight: 700">Step 6B : </font>
		<b><font face="Cambria" style="font-size: 12pt"><a href="UploadSalaryDeductions.php">Bulk Upload Deduction Variables (One Time Only For Any Month)</a></font></b></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" width="33%" colspan="2">
		<font face="Cambria" style="font-size: 12pt; font-weight: 700">Step 6C.&nbsp; <a href="SalaryMonthlyProvisions.php">
		Update Employee Specific Monthly provisions</a></font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="6">
		&nbsp;</td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="6" bgcolor="#008000">
		<font face="Cambria" color="#FFFFFF"><u><b>Attendance and Leaves Moderation</b></u></font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="2">
		<b><font face="Cambria" style="font-size: 12pt">Step 7A : <a href="UploadBulkAttandance.php">Upload Monthly Attendance from Bio-Metric Machine</a></font></b></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="2">
		
		<font face="Cambria" style="font-size: 12pt; font-weight: 700">Step 7B : <a href="../HRM/EmployeeAttendanceModeration.php">
		<span style="text-decoration: none">&nbsp; </span>Attendance and Leaves 
		Moderation</font></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="2">
		<font face="Cambria"><b>Step 7C : <a href="EmployeeAttendanceEntry.php">Individual Employee Attendance Update</a></b></font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="2">
		<font face="Cambria"><b>Step 7D : <a href="../HRM/EmployeeArrearDay.php">Individual Employee 
		LOP Arrear</a></b></font></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="2">
		&nbsp;</td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="2">
		&nbsp;</td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="3">
		&nbsp;</td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="3">
		&nbsp;</td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="6" bgcolor="#008000">
		<b><font face="Cambria" color="#FFFFFF">Salary Sheet and Bank Advice</font></b></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="3">
		<font face="Cambria" style="font-size: 12pt; font-weight: 700">Step 8 : <a href="EmployeeForSalary.php">Prepare Salary Sheet</a></font></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="3">
		<font face="Cambria" style="font-size: 12pt"><b>Step 8A : <a href="EmployeeSalaryDepositSlip.php">Print Salary Bank Advice</a></b></font></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="6" align="center">
		&nbsp;</td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" colspan="6" align="center" bgcolor="#008000">
		<u><font face="Cambria" color="#FFFFFF"><b>Statements</b></font></u></td>
	</tr>
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="34%">
		<font face="Cambria"><b><a href="IncomeTaxStatement.php">Income Tax Statement</a></b></font></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="17%" colspan="2">
		<font face="Cambria"><b><a href="ProvidentFundStatement.php">PF Statement</a></b></font></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="25%" colspan="2">
		<font face="Cambria"><b><a href="ESIStatement.php">ESI Statement</a></b></font></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="23%">
		<font face="Cambria"><b>Print Salary Slip</b></font></td>
	</tr>
	
	<tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="34%">
		<font face="Cambria"><b>Attendance Report</b></font></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="17%" colspan="2">
		<font face="Cambria"><b>Employee Leave Report</b></font></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="25%" colspan="2">
		<b><font face="Cambria">
		<a href="../HRM/EmployeeLOPReport.php">Employee LOP Days Report</a></font></b></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="23%">
		<b><font face="Cambria"><a href="MonthlySalarySheet.php">Monthly Salary Sheet</a></font></b></td>
	</tr><tr>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="34%">
		<b><font face="Cambria"> <a href="../HRM/ArrearLOPReport.php">Employee Previous Arrear Days</a></font></b></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="17%" colspan="2">
		<font face="Cambria"><b><a href="SalaryIncrementReport.php">Salary Increment Report</a></b></font></td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="25%" colspan="2">
		&nbsp;</td>
		<td style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" align="center" width="23%">
		&nbsp;</td>
	</tr>
	</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>

</html>