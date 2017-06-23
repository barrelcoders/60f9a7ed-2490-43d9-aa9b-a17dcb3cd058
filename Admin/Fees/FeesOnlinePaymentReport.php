<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fees Online Payment Report </title>
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
</style>
</head>

<body>
<form method="post">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font size="3" face="Cambria">Fees Online Payment Report</p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></td>
  </tr>
</table> 
 

<div align="center">
<table  class="CSSTableGenerator" cellspacing="0" cellpadding="0">
   <tr>
   		<td height="22" align="center" style="width: 14%" bgcolor="#95C23D"><b><font face="Cambria">
		Serial No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Admissioon No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Student Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Student Class</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Quater</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Financial Year</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Order Amount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		TxId</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		TxRefNo</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		pgTxNo</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		TxStatus</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
	    ResponseAmount</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		TxDate</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		TxTime</font></b></td>
		
   	</tr>
<?php
$result=mysql_query("select * from fees_online_payment");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr align="center">
	<td><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
    <td><font face="Cambria"><?php echo $rs["sadmission"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["sname"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["sclass"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["Quarter"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["FinancialYear"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["OrderAmount"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["TxId"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["TxRefNo"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["pgTxNo"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["TxStatus"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["ResponseAmount"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["TxDate"];?></font></td>
	<td><font face="Cambria"><?php echo $rs["TxTime"];?></font></td>
	
</tr>
<?php   	 
}
?>
</table>

</div>


<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Eduworld Technologies 
LLP</font></div>
</div>
</body>
</html> 