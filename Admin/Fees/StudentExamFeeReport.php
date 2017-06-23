<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$ssqlDepartment="SELECT distinct `DepartmentName` FROM `department_master`";
$rsDepartment= mysql_query($ssqlDepartment);
if($_REQUEST["isSubmit"]=="yes")
{
	$Selectedadmission=$_REQUEST["txtadmission"];
	$Selectedname=$_REQUEST["txtname"];
	$Selectedreceipt=$_REQUEST["txtreceipt"];
	$Selectedclass=$_REQUEST["txtclass"];
	$Selectedexam=$_REQUEST["txtexam"];
	

	$ssql="select `SrNo` , `ExamName`, `FeesType`, `ExamCode`,`Amount`, `sadmission` ,`sname`,`sclass`,`ReceiptNo`,`ReceiptDate`, `TxNo`,`TxId`, `TxDate`, `PaymetMode`,`ChequeNo`,`ChequeDate`,`BankName`,`ChequeAmount` from `fees_exam_student` where 1=1";

	//echo $ssql;
	//exit();
	if($Selectedclass !="Select One")
	{
		$ssql=$ssql." and `sclass`='$Selectedclass'";
	}
	if($Selectedexam !="Select One")
	{
		$ssql=$ssql." and `ExamName`='$Selectedexam'";
	}

	if($Selectedadmission!="")

	{

		$ssql=$ssql." and `sadmission`='".$Selectedadmission."'";

	}
	if($Selectedname!="")

	{

		$ssql=$ssql." and `sname`='".$Selectedname."'";

	}
	if($Selectedreceipt!="")

	{

		$ssql=$ssql." and `ReceiptNo`='".$Selectedreceipt."'";

	}


$rs= mysql_query($ssql);

}

?>



<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Student Exam Fee Report</title>

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
<p><b><font face="Cambria">Student Exam Fee Report</font></b></p>

<hr>
<p><a href="javascript:history.back(1)">

<img height="28" src="../images/BackButton.png" width="70" style="float: right"></a></p>
<p>&nbsp;</p>

<table width="1327" style="border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0">

<form name="frmRpt" method="post" action="StudentExamFeeReport.php">

<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
<tr>
<td style="width: 331px" align="left">
<p><font face="Cambria">Admission No.</font></td>
<td style="width: 332px"><font face="Cambria">
<input name="txtadmission" type="text"></font>
</td>
<td style="width: 332px"><p align="left"><font face="Cambria">Class</font></td>
<td style="width: 332px"><select name="txtclass" id="textbasic" >
                        <option selected="" value="Select One">Select One</option>
                        <?php
                           $ssqlclass="SELECT distinct `class` FROM `class_master`";
                           $rsclass= mysql_query($ssqlclass);
                           
                           while($row1 = mysql_fetch_row($rsclass))
                           {
                           		$class=$row1[0];
                           ?>
                        <option value="<?php echo $class; ?>"><?php echo $class; ?></option>
                        <?php 
                           }
                           ?>
                     </select></td>
<tr>
<td style="width: 331px" align="left"><p>
<font face="Cambria" style="font-size: 11pt">Student Name</font></td>
<td style="width: 332px"><font face="Cambria"><input name="txtname" type="text"></font></td>
<td style="width: 332px"><p align="center">&nbsp;</td>
<td style="width: 332px">&nbsp;</td>
</tr>
<tr>
<td style="width: 331px" align="left"><p>
<span style="color: rgb(0, 0, 0); font-family: Cambria; font-size: 11pt; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: left; text-indent: 0px; text-transform: none; white-space: nowrap; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); display: inline !important; float: none">
Receipt No</span></td>
<td style="width: 332px"><font face="Cambria"><input name="txtreceipt" type="text"></font></td>
<td style="width: 332px"><p align="left"><font face="Cambria">Exam Type</font></td>
<td style="width: 332px"><font face="Cambria"><select name="txtexam" id="textbasic" >
                        <option selected="" value="Select One">Select One</option>
                        <?php
                           $ssqlexam="SELECT distinct `ExamName` FROM `fees_exam_student`";
                           $rsexam= mysql_query($ssqlexam);
                           
                           while($row1 = mysql_fetch_row($rsexam))
                           {
                           		$exam=$row1[0];
                           ?>
                        <option value="<?php echo $exam; ?>"><?php echo $exam; ?></option>
                        <?php 
                           }
                           ?>
                     </select></font></td>
</tr>
<tr>
<td style="width: 331px"><p align="center">&nbsp;</td>
<td style="width: 278px" colspan=3>&nbsp;</td>

</tr>
<td colspan=4 align=center class="style1"><font face="Cambria"><input name="Submit1" type="submit" value="Search" style="font-weight: 700"></font></td>
</tr>
</form>
</table>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
?>
<br>
<br>
<table width="100%" style="border-collapse: collapse;" border="1" cellspacing="0" cellpadding="0">
<tr>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
SrNo</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
ExamName</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
FeesType</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
Amount</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
Admission</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
Name</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
Class</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
Receipt No</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
ReceiptDatefont</td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
TxNo</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
TxId</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
TxDate</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
PaymetMode</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
ChequeNo</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
ChequeDate</font></td>
<td style="width: 96px" bgcolor="#95C23D" align="center"><font face="Cambria">
BankName</font></td>
<td style="width: 46px" bgcolor="#95C23D" align="center"><font face="Cambria">
ChequeAmount</font></td>
</tr>
<?php
	while($row = mysql_fetch_row($rs))
	{
	$EmpId=$row[0];
?>
<tr>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[0];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[1];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[2];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[4];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[5];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[6];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[7];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[8];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[9];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[10];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[11];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[12];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[13];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[14];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[15];?></font></td>
<td style="width: 96px" font="Cambria"><font face="Cambria"><?php echo $row[16];?></font></td>
<td style="width: 46px" font="Cambria"><?php echo $row[17];?></td>
</tr>
<?php
	}
?>
</table>
<?php
}
?>
<div class="footer" align="center">
    <div class="footer_contents" align="center">
		<font color="#FFFFFF" face="Cambria" size="2">Powered by iSchool 
		Technologies LLP</font></div>
</div>
</body>
</html>