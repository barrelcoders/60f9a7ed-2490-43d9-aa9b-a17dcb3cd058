<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>

<?php
if(isset($_POST['submit']))
{
   $headcode=$_POST['headcode'];
   $headname=$_POST['headname'];
   $subheadname=$_POST['subheadname'];
   $headtype=$_POST['cboFeesHeadType'];
   
   mysql_query("INSERT INTO fees_misc_head(`HeadCode`,`HeadName`,`SubHeadName`,`HeadType`)VALUES('$headcode','$headname','$subheadname','$headtype')");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Head Name</title>
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
	<p align="left"><b><font size="3" face="Cambria">Add Miscellaneous 
	Collection Head</p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></td>
  </tr>
</table> 
<font face="Cambria"> 
<br />
</font>
<table class="name" width="100%" cellpadding="0" style="border-collapse: collapse"> 
  <tr>
    <td align="left" width="172" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Head Code:</font></b></td>
    <td  width="172" style="border-style: solid; border-width: 1px"><font face="Cambria">
	<input name="headcode" style="float: left" class="text-box" /></font></td>
    <td  width="172" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Head Name:</font></b></td>
    <td  width="172" style="border-style: solid; border-width: 1px"><font face="Cambria">
	<input name="headname" style="float: left" class="text-box" /></font></td>
    <td  width="172" style="border-style: solid; border-width: 1px"><b><font face="Cambria">Sub-Head Name:</font></b></td>
    <td  width="173" style="border-style: solid; border-width: 1px"><font face="Cambria">
	<input name="subheadname" style="float: left" class="text-box" /></font></td>
    <td  width="173" style="border-style: solid; border-width: 1px"><b>
	<font face="Cambria">Fees Head Type</font></b></td>
    <td  width="173" style="border-style: solid; border-width: 1px">
	<select size="1" name="cboFeesHeadType" id="cboFeesHeadType" class="text-box">
	<option value="Regular">Regular</option>
	<option value="Hostel">Hostel</option>
	</select></td>
  </tr>
  </table>
<table align="center">
  <tr>  
    <td>
	
	<input name="submit" type="submit" value="Submit" class="theButton" style="font-weight: 700" class="text-box"></font></td>
  </tr>
</table>
</form>
<font face="Cambria"><br>

</font>
<div align="center">
<table class="CSSTableGenerator" cellspacing="0" cellpadding="0" width="1327">
   <tr>
   		<td height="22" align="center" width="64" style="border-style: solid; border-width: 1px; text-align:center" ><b><font face="Cambria">
		Sr No.</font></b></td>
   		<td height="22" align="center" width="134" style="border-style: solid; border-width: 1px; text-align:center" ><b><font face="Cambria">
		Head Code</font></b></td>
		<td height="22" align="center" width="351" style="border-style: solid; border-width: 1px; text-align:center"><b><font face="Cambria">
		Head Name</font></b></td>
		<td height="22" align="center" width="406" style="border-style: solid; border-width: 1px; text-align:center"><b><font face="Cambria">
		Sub Head Name</font></b></td>
		
		<td height="22" align="center" width="312" style="border-style: solid; border-width: 1px; text-align:center">
		<b><font face="Cambria">Head Type</font></b></td>
		
   	</tr>
<?php
$result=mysql_query("select * from fees_misc_head order by srno");
   		
while($rs= mysql_fetch_array($result))
{
?>
<tr>
	<td align="center"  style="border-style:solid; border-width:1px; "><font face="Cambria"><?php echo $rs["srno"]; ?></font></td>
	<td align="center" style="border-style:solid; border-width:1px; "><font face="Cambria"><?php echo $rs["HeadCode"];?></font></td>
    <td align="center"  style="border-style:solid; border-width:1px; "><font face="Cambria"><?php echo $rs["HeadName"];?></font></td>
	<td align="center"  style="border-style:solid; border-width:1px; "><font face="Cambria"><?php echo $rs["SubHeadName"];?></font></td>
	<td align="center"  style="border-style:solid; border-width:1px; "><font face="Cambria"><?php echo $rs["HeadType"];?></font></td>

	

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