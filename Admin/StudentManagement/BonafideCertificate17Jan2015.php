<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Bonafied Student</title>
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
<form method="post">
<p>&nbsp;
</p>
<p><b><font face="Cambria" size=3>Bonafide Student Certificate</font></b></p><hr>
<p>&nbsp;</p>
<table border="1px" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
  <tr>
	<td style="width: 169px; height: 29px" class="auto-style23">
	  <font face="Cambria">
	  <span>Enter Admission No:</span></font></td>
    <td style="width: 151px; height: 29px">
       <p align="center">
       <font face="Cambria">
       <input type="text" name="txtsadmission" size="15" style="color: #CC0033; width: 151px;" required />
		</font>
	</td>
    <td style="width: 902px; height: 29px">
       <font face="Cambria">
       <input type="submit" name="FillDetail" value="Fill Detail"  style="width:82px; font-weight:700" />
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
<h1 align="center"><font face="Cambria" style="font-size: 14pt"><image src="../images/logo.png" height="100" width="100px"></image><br>Emerald Convent School<br />
</font><font face="Cambria" size="3"><span style="font-weight: 400">Sector-79, Faridabad</span></font><font face="Cambria" style="font-size: 14pt"><br />
</font><font face="Cambria" style="font-size: 12pt">
<span style="font-weight: 400">(Affiliated to C.B.S.E) </span></font>
</h1>
<h3 align="center"><font face="Cambria"><u><br><font size="3">TO WHOMSOEVER IT MAY CONCERN</font></u></font></h3>
<font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br />
<br />

</font>

<p class="word">

<font face="Cambria" style="font-size: 11pt; font-weight: 700">Date: </font></p>
<p class="word">

<font face="Cambria" style="font-size: 11pt; font-weight: 700"> <br>
Certificate No. </font></p>
<p class="word">

<font size="3">

<br>
</font><font size="3" face="Cambria">It is certified that <b> <?php if(isset($_POST['FillDetail'])) {   echo $rs['sname']; } ?></b>

&nbsp;D/o ,S/o Mr.
<b><?php if(isset($_POST['FillDetail'])) {   echo $rs['sfathername']; } ?></b>
&nbsp; is a student of this school in Class <b><?php if(isset($_POST['FillDetail'])) {   echo $rs['sclass']; } ?></b><br>
&nbsp;. As per school records his / her date of Birth is &nbsp;
<b><?php if(isset($_POST['FillDetail'])) {   echo $rs['DOB']; } ?></b>
&nbsp;<br /><br />As per school records his / her residence address is
<b><?php if(isset($_POST['FillDetail'])) {   echo $rs['Address']; } ?></b>.</font></p>

<font face="Cambria">

<br /><br />
</font>
<p class="word"><b><font face="Cambria" size="3">Sd/-</font></b></p>
<p class="word"><b><font face="Cambria" size="3">Principal</font></b></p>
<p class="word">&nbsp;</p>
<p class="word"><b><font face="Cambria" size="3">
................................</font></p>
</div>
<font face="Cambria">
<br /><br /><br /><br />
</font>
<table align="center">
<tr>
	<td><button onclick="printcontent('print')"><font face="Cambria">PRINT</font></button>
	</font></td>
</tr>
</table>
</form>
<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>

</body>
</html>


