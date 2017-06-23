<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	$SelectedDate=$_POST["txtDate"];
	$SelectedTime=$_POST["txtTime"];
	$date=date_create($SelectedDate);
	//echo date_format($date,"d")."-".date_format($date,"M")."-".date_format($date,"Y");
	//exit();
	//echo date_format($date,"Y/m/d H:i:s");
	
	$SelectedDay=date_format($date,"d");
	$SelectedMonth=date_format($date,"M");
	$SelectedYear=date_format($date,"Y");

	$ssql="update `Employee_Punching_Detail` set `ReportingTime`='$SelectedTime' where `PunchDate`='$SelectedDay' and `Month`='$SelectedMonth' and `Year`='$SelectedYear'";
	//echo $ssql;
	$rs=mysql_query($ssql);

}
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Set Attendance Reporting Time</title>
</head>

<body>

<p>&nbsp;</p>
<p><font face="Cambria"><b>Set Attendance Reporting Time</b></font></p>
<hr>
<p>&nbsp;</p>
<form name ="frmAtt" id="frmAtt" method ="post" action="SetReportingTime.php">
<input type ="hidden" name ="isSubmit" id="isSubmit" value ="yes">
<table border="1" width="100%" style="border-collapse: collapse">
	<tr>
		<td align="center"><b><font face="Cambria">Sr No</font></b></td>
		<td align="center"><b><font face="Cambria">Select Date</font></b></td>
		<td align="center"><b><font face="Cambria">Set Reporting Time</font></b></td>
		<td align="center"><b><font face="Cambria">Submit</font></b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
		<p align="center"><input type="Date" name="txtDate" id="txtDate" size="20"></td>
		<td>
		<p align="center"><input type="Time" name="txtTime" id="txtTime" size="20"></td>
		<td>
		<p align="center"><input type="submit" value="Submit" name="B1"></td>
	</tr>
</table>
</form>
<p>&nbsp;</p>

</body>

</html>