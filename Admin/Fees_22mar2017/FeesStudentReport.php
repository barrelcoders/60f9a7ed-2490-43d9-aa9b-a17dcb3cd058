<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$ssqlsadmission="SELECT distinct `sadmission` FROM `fees_student`";
$rssadmission= mysql_query($ssqlsadmission);

$rsClass=mysql_query("select distinct `class` from `class_master`");

if($_REQUEST["isSubmit"]=="yes")
{
	$Selectedsadmission=$_REQUEST["sadmission"];
	$SelectedClass=$_REQUEST["cboMasterClass"];
/*
if($Selectedsadmission !="All")
{
$ssql="SELECT distinct `sadmission`,`quarter`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,`class`,
	(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `quarter`=a.`quarter` and `feeshead`='tuitionfees') as `tuitionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `quarter`=a.`quarter` and `feeshead`='Smart Class') as `SmartClass`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `quarter`=a.`quarter` and `feeshead`='computerfees') as `CompFees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `quarter`=a.`quarter` and `feeshead`='Science Fees') as `ScienceFees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `quarter`=a.`quarter` and `feeshead`='Annual Charges') as `AnnualCharges`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `quarter`=a.`quarter` and `feeshead`='Admission Fees') as `admissionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `quarter`=a.`quarter` and `feeshead`='Caution Fees') as `cautionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `quarter`=a.`quarter` and `feeshead`='Registration Fees') as `registrationfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `quarter`=a.`quarter` and `feeshead`='Transport') as `Transportfees`
	FROM `fees_student` as `a` WHERE 1=1";
}
else
{
	$ssql="SELECT distinct `sadmission`,`quarter`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,`class`,
	(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `quarter`=a.`quarter` and `feeshead`='tuitionfees') as `tuitionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `quarter`=a.`quarter` and `feeshead`='Smart Class') as `SmartClass`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `quarter`=a.`quarter` and `feeshead`='computerfees') as `CompFees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `quarter`=a.`quarter` and `feeshead`='Science Fees') as `ScienceFees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `quarter`=a.`quarter` and `feeshead`='Annual Charges') as `AnnualCharges`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `quarter`=a.`quarter` and `feeshead`='Admission Fees') as `admissionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `quarter`=a.`quarter` and `feeshead`='Caution Fees') as `cautionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `quarter`=a.`quarter` and `feeshead`='Registration Fees') as `registrationfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `quarter`=a.`quarter` and `feeshead`='Transport') as `Transportfees`
	FROM `fees_student` as `a` WHERE 1=1";
}
*/
if($Selectedsadmission !="All")
{
$ssql="SELECT distinct `sadmission`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,`class`,
	(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `feeshead`='tuitionfees') as `tuitionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `feeshead`='Smart Class') as `SmartClass`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `feeshead`='computerfees') as `CompFees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `feeshead`='Science Fees') as `ScienceFees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `feeshead`='Annual Charges') as `AnnualCharges`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `feeshead`='Admission Fees') as `admissionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `feeshead`='Caution Fees') as `cautionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `feeshead`='Registration Fees') as `registrationfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`='$Selectedsadmission' and `feeshead`='Transport') as `Transportfees`
	FROM `fees_student` as `a` WHERE 1=1";
}
else
{
	$ssql="SELECT distinct `sadmission`,(select `sname` from `student_master` where `sadmission`=a.`sadmission`) as `sname`,`class`,
	(select `DiscontType` from `student_master` where `sadmission`=a.`sadmission`) as `DiscountType`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead`='tuitionfees') as `tuitionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead`='Smart Class') as `SmartClass`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead`='computerfees') as `CompFees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead`='Science Fees') as `ScienceFees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead`='Annual Charges') as `AnnualCharges`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead`='Admission Fees') as `admissionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead`='Caution Fees') as `cautionfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead`='Registration Fees') as `registrationfees`,
	(select sum(`amount`) from `fees_student` where `sadmission`=a.`sadmission` and `feeshead`='Transport') as `Transportfees`
	FROM `fees_student` as `a` WHERE 1=1";
}

	if($Selectedsadmission !="All")
	{
		$ssql=$ssql." and `sadmission`='".$Selectedsadmission."'";
	}
	if($SelectedClass !="Select One")
	{
		$ssql=$ssql." and `class`='".$SelectedClass."'";
	}
	//$ssql=$ssql." order by `sadmission`,`quarter`";
	$ssql=$ssql." order by `sadmission`";
//echo $ssql;
//exit();
$rs= mysql_query($ssql);
}
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Feesstudent</title>
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
<form name="frmRpt" method="post" action="FeesStudentReport.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<p>&nbsp;</p>
<table width="100%">
  <tr>
    <td align="center">
	<p align="left"><b><font size="3" face="Cambria">Student Fees 
	Information</p>
	<hr>
	<p align="left"><a href="javascript:history.back(1)">

        <img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></td>
  </tr>
</table>

<font face="Cambria"> 
<br /><br />
</font>  

<table class="name" width="100%">
 <tr>
		  <td align="left"><font face="Cambria">Admission No.</font> </font></td>

		  <td align="left">
		  <input type="text" name="sadmission" id="sadmission" class="text-box" value="All" /></td>

		<td style="padding:0px 700px 0px 0px;" >
		&nbsp;</td>
</tr>
 <tr>
		  <td align="left"><font face="Cambria">Class</font></td>

		  <td align="left"><select name="cboMasterClass" id="cboMasterClass">
			<option selected="" value="Select One">Select One</option>
			<?php
			while($row = mysql_fetch_row($rsClass))
			{
			?>
			<option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
			<?php
			}
			?>
			
			</select></td>

		<td style="padding:0px 700px 0px 0px;" >
		<input name="Submit1" type="submit" value="Search" class="theButton"></td>
</tr>
</table>
</form>
</table>


</form>
<font face="Cambria"><br>

</font>

<?php
if($_REQUEST["isSubmit"]=="yes")
{
	
?>
<br/>
<br/>
<br/>
<br/>
<div style="width:100%;background-color:#CCCCCC;"><b>Student Fee Report<b></div>
<br/>
<br/>
<div align="center">
<table class="CSSTableGenerator" cellspacing="0" cellpadding="0" style="width: 100%">
   <tr>
   		<td height="22" align="center" style="width: 14%" bgcolor="#95C23D"><b><font face="Cambria">
		Admission No.</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b>
		<font face="Cambria">
		Name</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b>
		<font face="Cambria">
		Class</font></b></td>
   		<td height="22" align="center" bgcolor="#95C23D"><b>
		<font face="Cambria">
		Discount Type</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Tuition Fees</font></b></td>

		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Smart Class</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Computer Fees</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Science Fees</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Annual Charges</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Admission Fees</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Caution Fees</font></b></td>
		<td height="22" align="center" bgcolor="#95C23D"><b><font face="Cambria">
		Registration Fees</font></b></td>
		
		
		<td height="22" align="center" bgcolor="#95C23D"><b>
		<font face="Cambria">
		Transport Fees</font></b></td>
		
		
		<td height="22" align="center" bgcolor="#95C23D"><b>
		<font face="Cambria">
		Total</font></b></td>
		
		
   	</tr>


<?php
	while($row = mysql_fetch_row($rs))
	{
		$rowTotal=$row[4]+$row[5]+$row[6]+$row[7]+$row[8]+$row[9]+$row[10]+$row[11]+$row[12];
?>
<tr>
	<td align="center"><font face="Cambria"><?php echo $row[0];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $row[1];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $row[2];?></font></td>
    <td align="center"><font face="Cambria"><?php echo $row[3];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $row[4];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $row[5];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $row[6];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $row[7];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $row[8];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $row[9];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $row[10];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $row[11];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $row[12];?></font></td>
	<td align="center"><font face="Cambria"><?php echo $rowTotal;?></font></td>
	
</tr>
<?php   	 
}
?>

</table>
<?php
}
?>
</div>


<div class="footer" align="center">
<div class="footer_contents" align="center">
<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>
</div>
</body>
</html> 