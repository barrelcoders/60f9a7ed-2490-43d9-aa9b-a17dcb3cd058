<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<title>StudentCertificateHistory</title>
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
	<p align="left"><b><font size="3" face="Cambria">Student Certificate History</p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></td>
  </tr>
</table> 
 

<div align="center">
<table border=1 style="width:100%; border-collapse:collapse" cellspacing="0" cellpadding="0"  class="CSSTableGenerator" >
   <tr>
   		<td height="22" align="center" style="width: 14%" bgcolor="#95C23D"><b><font face="Cambria">Serial No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">Admission No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">Student Name</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">Student Class</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">Student Roll No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">Certificate Type</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">Generation Date</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">Certificate Serial No.</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">Financial Year</font></b></td>
		
		
   	</tr>
<?php
$result=mysql_query("SELECT `SrNo`, `sadmission`, `sname`, `sclass`, `srollno`, `certificate_type`, `generation_date`, `certificate_sr_no`, `financial_year`, `html_code` FROM `student_certificate` WHERE 1=1");
   		
while($rs= mysql_fetch_array($result))
{
$certificateno=$rs["certificate_sr_no"];
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $rs["SrNo"]; ?></font></td>
    <td align="center"><font face="Cambria"><?php echo $rs["sadmission"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["sname"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["sclass"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["srollno"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["certificate_type"];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["generation_date"];?></font></td>
	<td align="center"><font face="Cambria"><a href="ShowCertificate.php?srno=<?php echo $certificateno;?>" target="_blank"><?php echo $certificateno;?></a></font></td>
	<td align="center"><font face="Cambria"><?php echo $rs["financial_year"];?></font></td>

	
</tr>
<?php   	 
}
?>
</table>

</div>
<?php include"footer.php";?>


<!--<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>-->
</body>
</html> 