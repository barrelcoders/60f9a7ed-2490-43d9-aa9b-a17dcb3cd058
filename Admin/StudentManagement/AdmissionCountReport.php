<?php 
include '../connection.php';
include '../AppConf.php';

?>
<?php

$ssql="SELECT count(distinct`RegistrationNo`) FROM `NewStudentAdmission`";
$ssql1="SELECT count(distinct`RegistrationNo`) FROM `NewStudentRegistration`";

$rs1= mysql_query($ssql);

$rs2= mysql_query($ssql1);



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Select File</title>

<style type="text/css">
.style1 {
	border-collapse: collapse;
}
.style2 {
	text-align: right;
	font-family: Cambria;
}
.style3 {
	text-align: center;
}
.style4 {
	font-family: Cambria;
}
</style>
<link rel="stylesheet" type="text/css" href="../Admin/tcal.css" />
	
	<link rel="stylesheet" type="text/css" href="../css/style.css" />

</head>

<body>
<br>
<br>
<br>
<table width="50%" align="center">
<?php
$AdmissionCount=0;
$RegistrationCount=0;
while($row1=mysql_fetch_row($rs1))
		
		{
		
		       
			 while($row2=mysql_fetch_row($rs2))
		
		      {
                

			
					  $AdmissionCount=$row1[0];
		        
					$RegistrationCount=$row2[0];
					
					
	?>

<tr align="center">
<td>
<img src="../images/1Count.png" align="center"><br>

<img src="../images/2Count.png" align="center" ><?php echo $RegistrationCount; ?>.<br>

<img src="../images/3Count.png" align="center"> <?php echo $AdmissionCount; ?></td>
</tr>
 <?php
 
}

 }
 ?>

<tr>

<td align="center">
&nbsp;</td>
</tr>
</table>

</body>

</html>