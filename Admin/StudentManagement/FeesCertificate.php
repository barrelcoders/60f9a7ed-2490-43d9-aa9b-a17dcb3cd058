<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Fees Payment Certificate</title>

<link rel="stylesheet" type="text/css" href="../css/style.css" />
<script src="../Certificaties/autofil/jquery-1.11.0.js" type="text/javascript"></script>
<script>
function printcontent(e1)
{
	var restorepage=document.body.innerHTML;
	var printcontent=document.getElementById(e1).innerHTML;
	document.body.innerHTML=printcontent;
	window.print(e1); 
	document.body.innerHTML=restorepage;
}
</script>
<style>
.word
{
font-size:18px;
font-family:Arial, Helvetica, sans-serif;
margin:0px 0px 0px 250px; 
}

.inputword
{
font-size:18px;
text-align:center;
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
<form method="post" action="FeesCertificate.php">
<p>&nbsp;
</p>
<p><b><font face="Cambria">Fees Payment</font><font face="Cambria" size=3> 
Certificate</font></b></p><hr>
<p>&nbsp;</p>
<table border="1px" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
  <tr>
	<td style="width: 169px; height: 29px" class="auto-style23">
	  <font face="Cambria">
	  <span>Enter Admission No:</span></font></td>
    <td style="width: 151px; height: 29px">
       <p align="center">
       <font face="Cambria">
       <input type="text" name="txtsadmission" class="text-box" required />
		</font>
	</td>
    <td style="width: 902px; height: 29px">
       <font face="Cambria">
       <input type="submit" name="FillDetail" value="Fill Detail"  class="text-box"/>
		</font>
	</td>
	</tr>
	
<?php 
		
			if(isset($_POST['FillDetail'])) 
			{
			 	$ID=$_POST['txtsadmission'];    
				$result1=mysql_query("SELECT * FROM   student_master where sadmission=$ID");
			  	$rs = mysql_fetch_array($result1);
			 }
?>
</table>

<div id="print">
<h1 align="center">&nbsp;</h1>
<h1 align="center"><font face="Cambria" style="font-size: 14pt"><image src="../images/logo.png" height="80" width="110px"></image><br><?php echo $SchoolName; ?><br />
</font><font face="Cambria" size="3"><span style="font-weight: 400"><?php echo $SchoolAddress; ?></span></font><font face="Cambria" style="font-size: 14pt"><br />
</font><font face="Cambria" style="font-size: 12pt">
<span style="font-weight: 400">(Affiliated to C.B.S.E. New Delhi)</span></font></h1>
<h3 align="center"><font face="Cambria"><u>Fee Certificate</u></font></h3>
<h3 align="center"><font face="Cambria"><u><br><font size="3">TO WHOMSOEVER IT MAY CONCERN</font></u></font></h3>
<font face="Cambria">&nbsp;</font><font face="Cambria" style="font-size: 11pt; font-weight: 700">Date: </font>
<p >

<font face="Cambria" style="font-size: 11pt; font-weight: 700"> Certificate No. </font></p>
<p >

<font size="3" face="Cambria">This is to certify that&nbsp; <b> <?php if(isset($_POST['FillDetail'])) {   echo $rs['sname']; } ?></b>

&nbsp;D/o ,S/o Mr.
<b><?php if(isset($_POST['FillDetail'])) {   echo $rs['sfathername']; } ?></b>
&nbsp; is / has been a bonafide student of this school in Class&nbsp;. </font></p>
<p >

<font size="3" face="Cambria">As per school office records, his / her School 
Fees details are as follows:</font></p>
<p >

&nbsp;</p>
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" height="99">
	<tr>
		<td width="284" height="19">
		<p align="center" style="line-height: 200%"><b><font face="Cambria">Quarter</font></b></td>
		<td width="284" height="19" align="center">
		<p style="line-height: 200%"><b><font face="Cambria">
		Admission Fees</font></b></td>
		<td width="284" height="19" align="center">
		<p style="line-height: 200%"><b><font face="Cambria">
		Annual Charge</font></b></td>
		<td width="284" height="19" align="center">
		<p style="line-height: 200%"><b><font face="Cambria">
		Tuition Fees</font></b></td>
		<td width="284" height="19" align="center">
		<p style="line-height: 200%"><b><font face="Cambria">
		Transport Fees</font></b></td>
	</tr>
	<tr>
		<td width="284" height="20" align="center">
		<p style="line-height: 200%"><font face="Cambria">Quarter 
		1</font></td>
		<td width="284" height="20">
		<p align="center" style="line-height: 200%"><input type="text" name="T1" class="text-box"></td>
		<td width="284" height="20">
		<p align="center" style="line-height: 200%"><input type="text" name="T5" class="text-box"></td>
		<td width="284" height="20">
		<p align="center" style="line-height: 200%"><input type="text" name="T9" class="text-box"></td>
		<td width="284" height="20">
		<p align="center" style="line-height: 200%"><input type="text" name="T13" class="text-box"></td>
	</tr>
	<tr>
		<td width="284" height="20" align="center">
		<p style="line-height: 200%"><font face="Cambria">Quarter 
		2</font></td>
		<td width="284" height="20" align="center">
		<p style="line-height: 200%">-</td>
		<td width="284" height="20" align="center">
		<p style="line-height: 200%">-</td>
		<td width="284" height="20">
		<p align="center" style="line-height: 200%"><input type="text" name="T10" class="text-box"></td>
		<td width="284" height="20">
		<p align="center" style="line-height: 200%"><input type="text" name="T14" class="text-box"></td>
	</tr>
	<tr>
		<td width="284" height="20" align="center">
		<p style="line-height: 200%"><font face="Cambria">Quarter 
		3</font></td>
		<td width="284" height="20" align="center">
		<p style="line-height: 200%">-</td>
		<td width="284" height="20" align="center">
		<p style="line-height: 200%">-</td>
		<td width="284" height="20">
		<p align="center" style="line-height: 200%"><input type="text" name="T11" class="text-box"></td>
		<td width="284" height="20">
		<p align="center" style="line-height: 200%"><input type="text" name="T15" class="text-box"></td>
	</tr>
	<tr>
		<td width="284" height="20" align="center">
		<p style="line-height: 200%"><font face="Cambria">Quarter 
		4</font></td>
		<td width="284" height="20" align="center">
		<p style="line-height: 200%">-</td>
		<td width="284" height="20" align="center">
		<p style="line-height: 200%">-</td>
		<td width="284" height="20">
		<p align="center" style="line-height: 200%"><input type="text" name="T12" class="text-box"></td>
		<td width="284" height="20">
		<p align="center" style="line-height: 200%"><input type="text" name="T16" class="text-box"></td>
	</tr>
</table>
<p >&nbsp;</p>
<p ><b><font face="Cambria" size="3">Sd/-</font></b></p>
<p ><b><font face="Cambria" size="3">Principal</font></b></p>
<p >&nbsp;</p>
<p ><b><font face="Cambria" size="3">
................................</font></b></p>
<p ><b><font face="Cambria" size="3">Place: </font></p>
</div>
&nbsp;<table align="center">
<tr>
	<td><button onclick="printcontent('print')" class="text-box"><font face="Cambria">PRINT</font></button>
	</td>
</tr>
</table>
<p>&nbsp;</p>
</form>
<?php include"footer.php";?>
<!--<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>-->

</body>
</html>

