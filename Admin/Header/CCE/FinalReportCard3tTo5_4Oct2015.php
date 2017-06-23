<?php
include '../../connection.php';
include '../../AppConf.php';
?>


<?php
session_start();

$AdmissionId = $_REQUEST["txtAdmissionId"];
$StudentName = $_REQUEST["txtStudentName"];
$Class = $_REQUEST["cboClass"];
$RollNo = $_REQUEST["txtRollNo"];
$currentdate=date("d-m-Y");

	$rsStudentDetail= mysql_query("select `DOB`,`Address`,`Sex`,`sfathername`,`smobile`,`MotherName`,`email`,`sname`,`sclass`,`sadmission` from `student_master` where `sadmission`='$AdmissionId'");
	while($row = mysql_fetch_row($rsStudentDetail))
	{
		$DOB=$row[0];
		$Address=$row[1];
		$Sex=$row[2];
		$sfathername=$row[3];
		$smobile=$row[4];
		$MotherName=$row[5];
		$email=$row[6];
		$sname=$row[7];
		$sclass=$row[8];
		$sadmission=$row[9];
		break;
	}
	


//$sql = "SELECT `grade`,`indicatordescription` FROM `reportcard_interim` WHERE `indicatortype`='English' and `descriptiveindicator`='Reading Skill' and `sclass`= '$Class' and `srollno`='$RollNo'";
	
$rsSubject = mysql_query("select distinct `indicatortype` from `reportcard_interim` where `TestType`='Evaluation1' and `sadmission`='$AdmissionId'");

//echo "select distinct `indicatortype` from `reportcard_interim` where `TestType`='Evaluation1' `sadmission`='$AdmissionId'";

//exit();
	

	   
	   
?>



<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Report Card 3 and 5</title>
<style type="text/css">
.style2 {
	border-collapse: collapse;
	border-left-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
}
.style3 {
	border-left-style: none;
	border-left-width: medium;
	border-right-style: none;
	border-right-width: medium;
}
.style4 {
	font-weight: bold;
	border-left: 1px solid #000000;
	border-right: 1px solid #000000;
	border-top-color: #000000;
	border-top-width: 1px;
	border-bottom: 1px solid #000000;
}
.style9 {
	border-left-color: #C0C0C0;
	border-left-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.style10 {
	border-bottom-style: none;
	border-bottom-width: medium;
}
.style11 {
	border-right-color: #A0A0A0;
	border-right-width: 1px;
	border-bottom-style: none;
	border-bottom-width: medium;
}
.style16 {
	border: 1px solid #000000;
}
.style17 {
	border-left: 1px solid #000000;
	border-right: 1px solid #000000;
	border-top-color: #000000;
	border-top-width: 1px;
	border-bottom: 1px solid #000000;
}
</style>
</head>

<body>
<table  width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
	<tr >
		<td align="left" width="12%">
		
		<p align="center">
		
		<font style="font-size: 10pt">
		
		<img src= "../images/HCCS Logo.jpg" width="130" height="85"><br>&nbsp;&nbsp;<b><font face="Cambria">Estd. 1979</font></b></font><td align=center width="85%">
		<font face="Cambria" style="font-size: 24pt"><b><?php echo $SchoolName1?></b><b><?php echo $AffiliationNo; ?></b></font><font style="font-size: 11pt"><br>
		</font><font face="Cambria" style="font-size: 10pt"><?php echo $SchoolAddress ?><br><?php echo $Website?></font></td></tr>
		<!--<tr><td colspan=2>&nbsp;</td></tr>-->
		<tr><td colspan=2 align=center><b>Achievement Record</b></td></tr>	

	<tr>
		<td colspan=2>
		<p align="center"><b><font face="Cambria" style="font-size: 11pt">Evaluation-I (APRIL TO SEPTEMBER 2015)</font></b></td></tr>
		
	
	
	


<p align="center"></p>
	<font size="2" style="font-size: 10pt">
<div align="center">
	</font>
	<table border="1" width="90%" align=center cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td colspan="4">
			<p align="left">
			<font face="Cambria" style="font-size: 10pt"><b><u>Student Profile:</u></b></font></td>
		</tr>
		<tr>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;<?php echo $sname; ?> </font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;Mother's Name</font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;<?php echo $MotherName; ?> </font></td>
		</tr>
		<tr>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;Class/Section&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;<?php echo $sclass; ?> </font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;Father's Name</font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;<?php echo $sfathername; ?> </font></td>
		</tr>
		<tr>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;Admission No.</font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;<?php echo $sadmission; ?> </font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;Address</font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;<?php echo $Address; ?> </font></td>
		</tr>
		<tr>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;Date of Birth</font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;<?php 
//$DOB=$rs['DOB'];
if($DOB !="")
{
$DOB=date("d-m-Y", strtotime($DOB));  
}
	//echo $rs['DOB']; 
	echo $DOB;
?> </font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;Mobile No</font></td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;<?php echo $smobile; ?> </font></td>
		</tr>
		<tr>
			<td width="1172" colspan="4">&nbsp;</td>
		</tr>
		<!--<tr>
			<td width="1172" colspan="4"><u><b>Health</b></u></td>
		</tr>
		<tr>
			<td width="293">Health</td>
			<td width="293">&nbsp;</td>
			<td width="293">Weight</td>
			<td width="293">&nbsp;</td>
		</tr>
		<tr>
			<td width="1172" colspan="4">&nbsp;</td>
		</tr>-->
		<tr>
			<td width="100%" colspan="4">
			<font face="Cambria" style="font-size: 10pt"><b>&nbsp;<u>Attendance:</u></b></font></td>
		</tr>
		<tr>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;Total attendance of the student:</font></td>
			<td width="293">&nbsp;</td>
			<td width="293"><font face="Cambria" style="font-size: 10pt">&nbsp;Total working days:</font></td>
			<td width="293">&nbsp;</td>
		</tr>
		</table>
	<p align="center"><b><font face="Cambria" style="font-size: 12pt">Academic Assessment
	</font></b></p>
	<div align="center">
		<table border="1" width="90%" cellspacing="0" cellpadding="0" >
			<tr>
				<td width="200" " style="height: 16px">
				<p align="center">
				<font face="Cambria" style="font-size: 10pt"><b>SUBJECT</b></font></td>
				<td align="center" width="30" style="height: 16px">
				<font face="Cambria" style="font-size: 10pt"><b>GRADES</b></font></td>
				<td align="center" style="height: 16px"><b>
				<font face="Cambria" style="font-size: 10pt">REMARKS</font></b></td>
			</tr>
			<?php
			while($rowS = mysql_fetch_row($rsSubject))
			{
				$Subject=$rowS[0];
				$rsDescriptiveIndicator=mysql_query("select `descriptiveindicator`,`grade`,`indicatordescription` from `reportcard_interim` where `indicatortype`='$Subject' and `sadmission`='$AdmissionId'");
			?>
			<tr>
				<td width="170" bgcolor="#C0C0C0" align=center class="style4">
				<font face="Cambria" style="font-size: 10pt">&nbsp;<?php echo $Subject;?></font></td>
				<td bgcolor="#C0C0C0" width="30" align="left" class="style17">&nbsp;</td>
				<td bgcolor="#C0C0C0" align="left" class="style17">&nbsp;</td>
			</tr>
				<?php
				while($rowD = mysql_fetch_row($rsDescriptiveIndicator))
				{
					$descriptiveindicator=$rowD[0];
					$Grade=$rowD[1];
					$indicatordescription=$rowD[2];
				?>
			<tr>
				<td width="170" class="style16" style="height: 19px">
				<font face="Cambria" style="font-size: 10pt">&nbsp;
				<?php echo $descriptiveindicator;?></font></td>
				<td width="30" class="style16" align="center" style="height: 19px">
				<font face="Cambria" style="font-size: 10pt">&nbsp;<?php echo $Grade;?></font></td>
				<td class="style16" style="height: 19px"><font style="font-size: 10pt">&nbsp;<?php echo $indicatordescription;?></font></td>
			</tr>
			
				<?php
				}
				?>
				<tr>
				<td width="170" colspan="3" class="style3" style="border-bottom-color: #A0A0A0; border-bottom-width: 1px">
				&nbsp;</td>
				</tr>
			<?php
			}
			?>
			
			
		
			</table>
			<table width="90%" align=center cellspacing="0" cellpadding="0" style="border-collapse: collapse" height="154">
				<tr>
				<td height="37" colspan="3">&nbsp;</td>
			</tr>
				<tr>
				<td height="24" colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td height="40" width="640" colspan="2">
				<font face="Cambria" style="font-weight: 700; font-size:11pt">
				Class Teacher</font></td>
				<td height="40">
				<p align="right">
				<font face="Cambria" style="font-weight: 700; font-size:11pt">
				Principal</font></td>
			</tr>
			<tr>
				<td height="28" colspan="3">&nbsp;</td>
			</tr>
			<tr>
				<td height="25" colspan="3">
				<p align="center"><font face="Cambria" style="font-size: 10pt"><b>A* - Outstanding, A - 
				Excellent, B - Very good, C - Good</b></font></td>
			</tr>
			</table>
		<p>&nbsp;</div>
<font style="font-size: 10pt">
</div>

</font>

</body>

</html>