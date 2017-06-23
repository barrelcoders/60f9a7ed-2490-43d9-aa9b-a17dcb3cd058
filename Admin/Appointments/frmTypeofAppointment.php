<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php
if(isset($_POST['submit']))
{
    $appointmenttype=$_POST['AppointmentType'];


    mysql_query("INSERT INTO appointment_type(`AppointmentType`)VALUES('$appointmenttype')");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" 
/>
<title>Appointment Type</title>
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
</style>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

</head>

<body>
<form method="post">
<p>&nbsp;</p>
<table width="100%">
   <tr>
     <td align="center">
	<p align="left"><b><font size="3" face="Cambria">Type of Appointment</p>
	<hr>
	<p align="left">&nbsp;</td>
   </tr>
</table>
<table class="name" width="100%">
   <tr>
     <td align="left"><font face="Cambria">Appointment Type</font></td>
     <td style="padding:0px 300px 0px 0px"><font face="Cambria">
	<input name="AppointmentType" class="text-box" style="float: left" /></font></td>
   </tr>
   <tr>
     <td align="left">&nbsp;</td>
     <td style="padding:0px 300px 0px 0px">&nbsp;</td>
   </tr>
   </table>
<table align="center">
   <tr>
     <td>
	<p style="padding:0px 1000px 0px 0px"><font face="Cambria">
	<input name="submit" type="submit" value="Submit" style="font-weight: 
700" ></font></td>
   </tr>
</table>
</form>
<font face="Cambria"><br>

</font>
<div align="center">
<table border=1 width="50%" id="table3" class="CSSTableGenerator" style="width:100%; border-collapse:collapse" 
cellspacing="0" cellpadding="0">
    <tr>
    		<td height="20" align="center" style="width: 14%" 
bgcolor="#95C23D"><b><font face="Cambria">Serial No.</font></b></td>
    		<td height="20" align="center" bgcolor="#95C23D"><b>
			<font face="Cambria">
			Appointment Type</font></b></td>
	
    		
	
    	</tr>
<?php
$result=mysql_query("SELECT `srno`, `AppointmentType` FROM `appointment_type` WHERE 1=1");

while($row= mysql_fetch_row($result))
{
?>
<tr>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[0]?></font></td>
	<td align="center" height="20"><font face="Cambria"><?php echo $row[1]?></font></td>
	

	      </tr> <?php } ?> </table>

</div>

<div class="footer" align="center">
<div class="footer_contents" align="center"> <font color="#FFFFFF" face="Cambria" size="2">
	Powered by Online School Planet</font></div> </div> </body> </html>

