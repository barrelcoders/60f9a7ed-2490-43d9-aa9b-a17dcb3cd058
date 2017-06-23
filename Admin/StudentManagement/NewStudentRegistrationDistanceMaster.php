<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>New Student Registration Distance Master</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">

.style1 {

	text-align: center;

}

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
        font-family: Cambria;
        font-weight:bold;

}


</style>

</head>



<body>

<p>&nbsp;</p>
<p><b><font face="Cambria">New Student Registration Distance Master</font></b></p>
<hr>
<p><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>
<p>&nbsp;</p>

<div align="center">
<table  class="CSSTableGenerator" border=1 width=100% cellspacing="0" cellpadding="0">
   <tr align=center>
   		<td height="22" align="center" style="width: 14%" bgcolor="#95C23D"><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Sector</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Distance</font></b></td>
		
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Edit</font></b></td>
   	</tr>
<?php
$result=mysql_query("select * from NewStudentRegistrationDistanceMaster");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr align=center>
	<td><font face="Cambria"><?php echo $rs["SrNo"]; ?></font></td>
    <td><font face="Cambria"><?php echo $rs["Sector"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["Distance"];?></font></td>
	<td><font face="Cambria"><?php echo '<a href="#">Edit</a>'?></font></td>
	
</tr>
<?php   	 
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