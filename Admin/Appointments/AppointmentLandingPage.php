<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php'; 
?>

<html>
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

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;

}

</style>
<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Appointment  Landing Page</title>

</head>

<body>


<div style="position: relative; width: 100%;">

              <br>
              
	<table  id="table3"  width="100%" style="border-collapse: collapse" border="1">

			<tr>


				<td height="24" bgcolor="#48AC2E" align="center"  colspan="11" style="border-style: solid; border-width: 1px">
              
              
				<p align="left"><b><font face="Cambria" color="#FFFFFF"> Consolidated  Appointments </font></b></td>
				
				
							</tr>

			<tr>
			</table>
			<br>



			<table  id="table3"width="100%" style="border-collapse: collapse" border="1">
<tr style="backgroundcolor:GREY">

				<td height="22" width="10px" align="center" style="border-style: solid; border-width: 1px" bgcolor="#808080" ><b>
				<font face="Cambria" size="2" color="#FFFFFF">
		S.No</font></b></td>
   		<td height="22" width="80" align="center" style="border-style: solid; border-width: 1px" bgcolor="#808080" >
		<b><font face="Cambria" size="2" color="#FFFFFF">Date</font></b></td>
		<td height="22" width="67"  align="center" style="border-style: solid; border-width: 1px" bgcolor="#808080">
		<b><font face="Cambria" size="2" color="#FFFFFF">Start Time</font></b></td>
		<td height="22" width="83"  align="center" style="border-style: solid; border-width: 1px" bgcolor="#808080">
		<b><font size="2" face="Cambria" color="#FFFFFF">End Time</font></b></td>
		<td height="22" width="162"  align="center" style="border-style: solid; border-width: 1px" bgcolor="#808080">
		<b><font face="Cambria" size="2" color="#FFFFFF">&nbsp;Name</font></b></td>
		<td height="22" width="149"  align="center" style="border-style: solid; border-width: 1px" bgcolor="#808080">
		<b><font face="Cambria" size="2" color="#FFFFFF">Designation</font></b></td>
		<td height="22" width="163"  align="center" style="border-style: solid; border-width: 1px" bgcolor="#808080">
		<b><font face="Cambria" size="2" color="#FFFFFF">Organization</font></b></td>
		<td height="22" width="157"  align="center" style="border-style: solid; border-width: 1px" bgcolor="#808080">
		<b><font face="Cambria" size="2" color="#FFFFFF">Contact No</font></b></td>
		
		<td height="22" width="250"  align="center" style="border-style: solid; border-width: 1px" bgcolor="#808080">
		<b><font face="Cambria" size="2" color="#FFFFFF">Remarks</font></b></td>
				
		
		
		<td height="22" width="120"  align="center" style="border-style: solid; border-width: 1px" bgcolor="#808080">
		<b><font face="Cambria" size="2" color="#FFFFFF">Employee Name</font></b></td>
				
		
		
</tr>
<?php
$rs=mysql_query("SELECT `srno`, `Name`, `Designation`, `CompanyName`,`VisitorMobile`, `AppointmentType`, `EmployeeName`, `EmployeeMobile`, `DateofAppointment`, `FromTimeOfAppointment`, `ToTimeOfAppointment`, `Remarks` FROM `appointment`");
$recount=1;
	while($row = mysql_fetch_row($rs))
	{
	$srno=$row[0];
?>
<tr>
<td style="width: 10px" align="center" font="Cambria">
<font face="Cambria" size="2"><?php echo $recount;?></font></td>
<td style="width: 80px" align="left" font="Cambria">
<font face="Cambria" size="2"><?php echo $row[8];?></font></td>
<td style="width: 67px" align="left" font="Cambria">
<font face="Cambria" size="2"><?php echo $row[9];?></font></td>
<td style="width: 83px" align="left" font="Cambria">
<font face="Cambria" size="2"><?php echo $row[10];?></font></td>
<td style="width: 162px" align="left" align="center" font="Cambria">
<font face="Cambria" size="2"><?php echo $row[1];?></font></td>
<td style="width: 149px" align="left" font="Cambria">
<font face="Cambria" size="2"><?php echo $row[2];?></font></td>
<td style="width: 163px" align="left" font="Cambria">
<font face="Cambria" size="2"><?php echo $row[3];?></font></td>
<td style="width: 157px" align="left" font="Cambria">
<font face="Cambria" size="2"><?php echo $row[4];?></font></td>
<td style="width: 250px" align="left" font="Cambria">
<font face="Cambria" size="2"><?php echo $row[11];?></font></td>
<td style="width: 120px" align="left" font="Cambria">
<font face="Cambria" size="2"><?php echo $row[6];?></font></td>


</tr>
<?php
	
	$recount++;
	}
?>
</table>
</div>



<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>

</body>

</html>