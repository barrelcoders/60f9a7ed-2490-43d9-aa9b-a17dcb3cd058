<?php include '../../connection.php';?>

<?php include '../../AppConf.php';?>

<?php
session_start();

$AdmissionId = $_REQUEST["txtAdmissionId"];
$StudentName = $_REQUEST["txtStudentName"];
$Class = $_REQUEST["cboClass"];
$RollNo = $_REQUEST["txtRollNo"];

	$rsStudentDetail= mysql_query("select `DOB`,`Address`,`Sex`,`sfathername`,`smobile`,`MotherName`,`email` from `student_master` where `sadmission`='$AdmissionId'");
	while($row = mysql_fetch_row($rsStudentDetail))
	{
		$DOB=$row[0];
		$Address=$row[1];
		$Sex=$row[2];
		$sfathername=$row[3];
		$smobile=$row[4];
		$MotherName=$row[5];
		$email=$row[6];
		break;
	}
	
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Scholastic Areas' and `sclass`= '$Class' and `srollno`='$RollNo'";
	
	$rsScholasticAreas = mysql_query($sql);
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Co-Scholastic Activities' and `sclass`= '$Class' and `srollno`='$RollNo'";
	
	$rsCoScholasticAreas = mysql_query($sql);
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Life Skills' and `sclass`= '$Class' and `srollno`='$RollNo'";	
	$rsLifeSkills = mysql_query($sql);
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Attitude Values' and `sclass`= '$Class' and `srollno`='$RollNo'";	
	$rsAttitudeValue = mysql_query($sql);
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Health and Physical' and `sclass`= '$Class' and `srollno`='$RollNo'";	
	$rsHealthPhysical = mysql_query($sql);
	
	$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`MarksObtained` FROM `report_card_temp` WHERE `testtype`='FA1' and `sclass`= '$Class' and `srollno`='$RollNo'";	
	$rsFA1 = mysql_query($sql);
	
	
	
	
	
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Part - 1 Academic Performance</title>
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style3 {
	text-align: center;
	font-family: Cambria;
	font-size: 2.06437e+025;
	border: 1px solid #000000;
}
.style7 {
	font-size: small;
}
.style8 {
	border: 1px solid #000000;
	font-family: Cambria;
	font-size: 2.06437e+025;
}
.style9 {
	font-family: Cambria;
	font-size: 11pt;
	text-align: left;
	border: 1px solid #000000;
}
.style10 {
	text-align: left;
}
.style11 {
	font-family: Arial;
	font-size: 11pt;
	text-align: center;
	border: 1px solid #000000;
}
.style12 {
	font-family: Cambria;
	border: 1px solid #000000;
	text-align: center;
}
.style13 {
	font-family: Cambria;
}
.style15 {
	font-size: 12pt;
}
.style17 {
	font-family: Cambria;
	font-size: 12pt;
	text-align: center;
	border: 1px solid #000000;
}
.style18 {
	font-family: Cambria;
	text-decoration: underline;
}
.style19 {
	text-decoration: underline;
}
.style21 {
	color: #000000;
}
.style4 {
	font-family: Arial;
	font-size: 11pt;
	text-align: center;
	border: 1px solid #000000;
}
.style2 {
	border: 1px solid #000000;
}
.style5 {
	font-family: Arial;
	font-size: 12pt;
	text-align: center;
	border: 1px solid #000000;
}
.style24 {
	font-family: Cambria;
	font-size: 12pt;
}
.style25 {
	font-family: Cambria;
	font-size: 12pt;
	text-align: left;
	border: 1px solid #000000;
}
.style26 {
	border: 1px solid #000000;
	text-align: left;
}
.style30 {
	border-left: 1px solid #000000;
	border-right: 1px solid #000000;
	border-top: 1px solid #000000;
	border-bottom: 0px solid #000000;
	border-collapse: collapse;
}
.style31 {
	text-align: center;
}
.style32 {
	border: 1px solid #000000;
	text-align: center;
}
.style33 {
	text-align: left;
	font-family: Cambria;
	font-size: 2.06437e+025;
	border: 1px solid #000000;
}
.style34 {
	font-family: Cambria;
	text-align: center;
}
</style>
</head>

<body>

<p align="center"><font face="Cambria" style="font-size: 11pt"><img border="0" src="../images/emerald_logo.png"></font></p>
<!--<p align="center"><font face="Cambria" style="font-size: 11pt"><?php echo $SchoolName; ?></font></p>-->
<p align="center"><font face="Cambria" style="font-size: 11pt"><?php echo $SchoolAddress; ?></font> , <?php echo $SchoolPhoneNo; ?></font> </p>
<p align="center"><font face="Cambria" style="font-size: 11pt"><?php echo $SchoolEmailId; ?></font> , <?php echo $SchoolWebsite; ?></font> </p>
<div align="center">
	<table border="1" width="840" cellspacing="0" cellpadding="0" style="border-collapse: collapse; ">
		<tr>
			<td width="127" style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">Name</font></td>
			<td width="222" style="border-top:1px solid #C0C0C0; border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style:solid; border-bottom-width:1px"><?php echo $StudentName;?></td>
			<td width="109" rowspan="7" style="border-style: solid; border-width: 1px; ">&nbsp;</td>
			<td width="139" style="border-top:1px solid #C0C0C0; border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">Class</font></td>
			<td width="235" style="border-right:1px solid #808080; border-top:1px solid #C0C0C0; border-left-style: solid; border-left-width: 1px; border-bottom-style:solid; border-bottom-width:1px"><?php echo $Class;?></td>
		</tr>
		<tr>
			<td width="127" style="border-left:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">Admission No.</font></td>
			<td width="222" style="border-style:solid; border-width:1px; "><?php echo $AdmissionId;?></td>
			<td width="139" style="border-style:solid; border-width:1px; ">
			<font face="Cambria" style="font-size: 11pt">Roll No</font></td>
			<td width="235" style="border-right:1px solid #808080; border-left-style: solid; border-left-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px"><?php echo $RollNo; ?></td>
		</tr>
		<tr>
			<td width="127" style="border-left:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">Date Of Birth</font></td>
			<td width="222" style="border-style:solid; border-width:1px; "><?php echo $DOB; ?></td>
			<td width="139" style="border-style:solid; border-width:1px; " rowspan="2">
			<font face="Cambria" style="font-size: 11pt">Residential Address</font></td>
			<td width="235" style="border-right:1px solid #808080; border-left-style: solid; border-left-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" rowspan="2">
			<?php echo $Address; ?></td>
		</tr>
		<tr>
			<td width="127" style="border-left:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">Gender</font></td>
			<td width="222" style="border-left-style: solid; border-left-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<?php echo $Sex; ?></td>
		</tr>
		<tr>
			<td width="127" style="border-left:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">Father's Name</font></td>
			<td width="222" style="border-style:solid; border-width:1px; "><?php echo $sfathername; ?></td>
			<td width="139" style="border-style:solid; border-width:1px; ">
			<font face="Cambria" style="font-size: 11pt">Phone No</font></td>
			<td width="235" style="border-right:1px solid #808080; border-left-style: solid; border-left-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<?php echo $smobile; ?></td>
		</tr>
		<tr>
			<td width="127" style="border-left:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">Mother's Name</font></td>
			<td width="222" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style:solid; border-top-width:1px">
			<?php echo $MotherName; ?></td>
			<td width="139" style="border-style:solid; border-width:1px; ">
			<font face="Cambria">Email Id:</font></td>
			<td width="235" style="border-right:1px solid #808080; border-left-style: solid; border-left-width: 1px; border-top-style:solid; border-top-width:1px">
			<?php echo $email; ?></td>
		</tr>
		<tr>
			<td width="349" style="border-left:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px" colspan="2">&nbsp;</td>
			<td width="377" style="border-style:solid; border-width:1px; " colspan="2">&nbsp;</td>
		</tr>
		</table>
</div>
<p align="center"><b><font face="Cambria" style="font-size: 11pt">ATTENDANCE DETAILS</font></b></p>
<div align="center">
	<table border="1" width="52%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td width="313" align="center" style="border-style: solid; border-width: 1px">
			<font face="Cambria" style="font-size: 11pt; font-weight: 700">Attendance</font></td>
			<td align="center" style="border-style: solid; border-width: 1px">
			<font face="Cambria" style="font-size: 11pt; font-weight: 700">Term-1</font></td>
			<td align="center" style="border-style: solid; border-width: 1px">
			<font face="Cambria" style="font-size: 11pt; font-weight: 700">Term-2</font></td>
		</tr>
		<tr>
			<td width="313" style="border-style: solid; border-width: 1px">
			<p align="justify"><font face="Cambria" style="font-size: 11pt">Total Attendance </font></td>
			<td style="border-style: solid; border-width: 1px">
			<p align="justify">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px">
			<p align="justify">&nbsp;</td>
		</tr>
		<tr>
			<td width="313" style="border-style: solid; border-width: 1px">
			<p align="justify"><font face="Cambria" style="font-size: 11pt">Total Meeting</font></td>
			<td style="border-style: solid; border-width: 1px">
			<p align="justify"><font face="Cambria" style="font-size: 11pt">&nbsp;</font></td>
			<td style="border-style: solid; border-width: 1px">
			<p align="justify">&nbsp;</td>
		</tr>
		<tr>
			<td width="313" style="border-style: solid; border-width: 1px">
			<p align="justify"><font face="Cambria" style="font-size: 11pt">Percent</font></td>
			<td style="border-style: solid; border-width: 1px">
			<p align="justify">&nbsp;</td>
			<td style="border-style: solid; border-width: 1px">
			<p align="justify">&nbsp;</td>
		</tr>
	</table>
	<p><b><font face="Cambria" style="font-size: 11pt">HEALTH STATUS</font></b></p>
		</div>
<div align="center">
	<table border="1" width="52%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td width="144" style="border-style: solid; border-width: 1px"><font face="Cambria" style="font-size: 11pt">Height</font></td>
			<td width="121" style="border-style: solid; border-width: 1px">&nbsp;</td>
			<td rowspan="3" style="border-style: solid; border-width: 1px">&nbsp;</td>
			<td width="171" style="border-style: solid; border-width: 1px"><font face="Cambria" style="font-size: 11pt">Weight</font></td>
			<td width="164" style="border-style: solid; border-width: 1px">&nbsp;</td>
		</tr>
		<tr>
			<td width="144" style="border-style: solid; border-width: 1px"><font face="Cambria" style="font-size: 11pt">Vision L</font></td>
			<td width="121" style="border-style: solid; border-width: 1px">&nbsp;</td>
			<td width="171" style="border-style: solid; border-width: 1px"><font face="Cambria" style="font-size: 11pt">Vision R</font></td>
			<td width="164" style="border-style: solid; border-width: 1px">&nbsp;</td>
		</tr>
		<tr>
			<td width="144" style="border-style: solid; border-width: 1px"><font face="Cambria" style="font-size: 11pt">Blood Group</font></td>
			<td width="121" style="border-style: solid; border-width: 1px">&nbsp;</td>
			<td width="171" style="border-style: solid; border-width: 1px"><font face="Cambria" style="font-size: 11pt">Dental Hygiene</font></td>
			<td width="164" style="border-style: solid; border-width: 1px">&nbsp;</td>
		</tr>
	</table>
		</div>

		<p>&nbsp;</p>
		<p><u><b><font face="Cambria">Part1 : Academics Performance :&nbsp; Scholastic 
		Areas (On 9 Points Scale)</font></b></u></p>

<table style="width: 100%" class="style1" cellspacing="0" cellpadding="0">
	
	<tr>
		<td class="style2" style="border-style:solid; border-width:1px; width: 95px; height: 22px">
		&nbsp;</td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 95px; height: 22px">
		&nbsp;</td>
		<td class="style3" colspan="4" style="border-style:solid; border-width:1px; height: 22px"><strong>
		<font size="3">Term - I</font></strong></td>
		<td class="style3" colspan="4" style="border-style:solid; border-width:1px; height: 22px"><strong>
		<font size="3">Term - II</font></strong></td>
		<td class="style3" colspan="3" style="border-style:solid; border-width:1px; height: 22px"><strong>
		<font size="3">(Term - I + II)</font></strong></td>
	</tr>
	<tr>
		<td class="style2" style="border-style:solid; border-width:1px; width: 95px; height: 28px">
		<font face="Cambria" style="font-size: 11pt">&nbsp;</font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 95px; height: 28px">
		<font face="Cambria" style="font-size: 11pt">&nbsp;Weight age -&gt;</font></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 28px"><span style="font-size: 11pt">
		10%</span></td>
		<td class="style3" style="height: 28px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"><span style="font-size: 11pt">
		10%</span></td>
		<td class="style3" style="height: 28px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"><span style="font-size: 11pt">
		30%</span></td>
		<td class="style3" style="height: 28px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"><span style="font-size: 11pt">
		50%</span></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 28px"><span style="font-size: 11pt">
		10%</span></td>
		<td class="style3" style="height: 28px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"><span style="font-size: 11pt">
		10%</span></td>
		<td class="style3" style="height: 28px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"><span style="font-size: 11pt">
		30%</span></td>
		<td class="style3" style="height: 28px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"><span style="font-size: 11pt">
		50%</span></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 28px"><span style="font-size: 11pt">
		50%</span>&nbsp;</td>
		<td class="style3" style="height: 28px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"><span style="font-size: 11pt">
		50%</span></td>
		<td class="style3" style="height: 28px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"><span style="font-size: 11pt">
		100%</span></td>
	</tr>
	<tr>
		<td class="style5" style="border-style:solid; border-width:1px; width: 95px; height: 56px" valign="top">
		<font face="Cambria"><strong style="font-weight: 400">S.No.</strong></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 95px; height: 56px" valign="top">
		<font face="Cambria"><strong style="font-weight: 400">Subjects</strong></font></td>
		<td class="style5" style="border-style:solid; border-width:1px; height: 56px; width: 95px" valign="top">
		<font face="Cambria">FA 1</font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 95px; height: 56px" valign="top">
		<font face="Cambria">FA 2</font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 95px; height: 56px" valign="top">
		<font face="Cambria">SA 1</font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 95px; height: 56%" valign="top">
		<font face="Cambria">Term1</font><p><sub><font face="Cambria">FA1+ FA2 + SA1</font></sub></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 95px; height: 56px" valign="top">
		<font face="Cambria">FA 3</font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 95px; height: 56px" valign="top">
		<font face="Cambria">FA 4</font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 95px; height: 56px" valign="top">
		<font face="Cambria">SA 2</font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 96px; height: 56px" valign="top">
		<font face="Cambria">&nbsp;Term2</font><p><sub><font face="Cambria">FA3 + FA4 + SA2</font></sub></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 96px; height: 56px" valign="top">
		<font face="Cambria">&nbsp;Term1</font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 96px; height: 56px" valign="top">
		<font face="Cambria">&nbsp;Term2</font></td>
		<td class="style5" style="border-style:solid; border-width:1px; width: 96px; height: 56px" valign="top">
		<font face="Cambria">Overall Grade</font></td>
	</tr>
	
	<?php
		if(mysql_num_rows($rsFA1) > 0)
		{
			$cnt=1;
			$SumOfMaxMarks=0;
			$SumOfObtainedMarks=0;
			$FA1MaxMarks=0;
			$FA2MaxMarks=0;
			$FA3MaxMarks=0;
			$FA4MaxMarks=0;
			$SA1MaxMarks=0;
			$SA2MaxMarks=0;
			
			$FA1ObtainedMarks=0;
			$FA2ObtainedMarks=0;
			$FA3ObtainedMarks=0;
			$SA1ObtainedMarks=0;
			$SA2ObtainedMarks=0;

			while($row = mysql_fetch_row($rsFA1))
			{
				$subject = $row[0];
				$FA1Grade = $row[3];
				$FA1MaxMarks=$row[2];
				$FA1ObtainedMarks=$row[5];
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`MarksObtained` FROM `report_card_temp` WHERE `testtype`='FA2' and `sclass`= '$Class' and `srollno`='$RollNo' and `subject`='$subject'";	
				$rsFA2 = mysql_query($sql);
				
				while($row1 = mysql_fetch_row($rsFA2))
				{
				$FA2Grade = $row1[3];
				$FA2MaxMarks=$row1[2];
				$FA2ObtainedMarks=$row1[5];
				}
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`MarksObtained` FROM `report_card_temp` WHERE `testtype`='FA3' and `sclass`= '$Class' and `srollno`='$RollNo' and `subject`='$subject'";	
				$rsFA3 = mysql_query($sql);
				
				while($row2 = mysql_fetch_row($rsFA3))
				{
				$FA3Grade = $row2[3];
				$FA3MaxMarks=$row2[2];
				$FA3ObtainedMarks=$row2[5];
				}
				
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`MarksObtained` FROM `report_card_temp` WHERE `testtype`='FA4' and `sclass`= '$Class' and `srollno`='$RollNo' and `subject`='$subject'";	
				$rsFA4 = mysql_query($sql);
				
				while($row3 = mysql_fetch_row($rsFA4))
				{
				$FA4Grade = $row3[3];
				$FA4MaxMarks=$row3[2];
				$FA4ObtainedMarks=$row3[5];
				}
				
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`MarksObtained` FROM `report_card_temp` WHERE `testtype`='SA1' and `sclass`= '$Class' and `srollno`='$RollNo' and `subject`='$subject'";	
				$rsSA1 = mysql_query($sql);
				
				
				
				while($row4 = mysql_fetch_row($rsSA1))
				{
				$SA1Grade = $row4[3];
				$SA1MaxMarks=$row4[2];
				$SA1ObtainedMarks=$row4[5];
				}
				
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`MarksObtained` FROM `report_card_temp` WHERE `testtype`='SA2' and `sclass`= '$Class' and `srollno`='$RollNo' and `subject`='$subject'";	
				$rsSA2 = mysql_query($sql);
				
								
				while($row5 = mysql_fetch_row($rsSA2))
				{
				$SA2Grade = $row5[3];
				$SA2MaxMarks=$row5[2];
				$SA2ObtainedMarks=$row5[5];
				}
				
				$Term1TotalMaxMarks=$FA1MaxMarks+$FA2MaxMarks+$SA1MaxMarks;
				$Term1TotalObtainedMarks=$FA1ObtainedMarks+$FA2ObtainedMarks+$SA1ObtainedMarks;
				$PercentTerm1=($Term1TotalObtainedMarks/$Term1TotalMaxMarks)*100;
				
				$Term2TotalMaxMarks=$FA3MaxMarks+$FA3MaxMarks+$SA2MaxMarks;
				$Term2TotalObtainedMarks=$FA3ObtainedMarks+$FA4ObtainedMarks+$SA2ObtainedMarks;
				$PercentTerm2=($Term2TotalObtainedMarks/$Term2TotalMaxMarks)*100;
				
				$GrandTotalMaxMarks=$Term1TotalMaxMarks+$Term2TotalMaxMarks;
				$GrandTotalObtainedMarks=$Term1TotalObtainedMarks+$Term2TotalObtainedMarks;
				$GrandPercent=($GrandTotalObtainedMarks/$GrandTotalMaxMarks)*100;
				
				$rsTerm1Grade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='100' and ".$PercentTerm1.">=`RangeFrom` and ".$PercentTerm1."<=`RangeTo`");
				while($rowTerm1Grade = mysql_fetch_array($rsTerm1Grade))
  				{
  					$Term1Grade=$rowTerm1Grade[0];
  					break;
  				}
  				
  				$rsTerm2Grade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='100' and ".$PercentTerm2.">=`RangeFrom` and ".$PercentTerm2."<=`RangeTo`");
				while($rowTerm2Grade = mysql_fetch_array($rsTerm2Grade))
  				{
  					$Term2Grade=$rowTerm2Grade[0];
  					break;
  				}
  				
  				$rsCompleteGrade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='100' and ".$GrandPercent.">=`RangeFrom` and ".$GrandPercent."<=`RangeTo`");
				while($rowCompleteGrade = mysql_fetch_array($rsCompleteGrade))
  				{
  					$FinalGrade=$rowCompleteGrade[0];
  					break;
  				}
			
	?>


	<tr>
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px; ">
		<font face="Cambria">
		<?php echo $cnt; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px; ">
		<font face="Cambria">
		<?php echo $subject; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px">		
		<font face="Cambria">		<?php echo $FA1Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px; ">
		<font face="Cambria"><?php echo $FA2Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px; ">
		<font face="Cambria"><?php echo $SA1Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px;"><?php echo $Term1Grade;?></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px;">
		<font face="Cambria"><?php echo $FA3Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px;">
		<font face="Cambria"><?php echo $FA4Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px;">
		<font face="Cambria"><?php echo $SA2Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 96px;">
		<?php echo $Term2Grade;?></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 96px;">
		<?php echo $Term1Grade;?></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 96px;">
		<?php echo $Term2Grade;?></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 96px;">
		<?php echo $FinalGrade;?></td>
	</tr>
	<?php
	$cnt=$cnt+1;
	}}
	?>
	
	</table>

<font face="Cambria">
<br>

<strong>
		<span class="style15">Part - 1(B) 
		Scholastic Areas </span><span class="style7">
		(Assessment on 5 Points Scale)</span></strong></font><table style="width: 100%" class="style1">
	<tbody class="style10">
	
		<tr>
		<td class="style8" style="border-style:solid; border-width:1px; width: 55px; height: 18px"><strong>
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 18px" width="323"><strong><font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 18px" width="148"><strong>
		<font size="3">Suggestive Activities</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 18px" width="81"><strong><font size="3">Point</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 18px" width="69"><strong><font size="3">Grade</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 18px"><strong><font size="3">Description</font></strong></td>
	</tr>
	<?php
		if(mysql_num_rows($rsScholasticAreas) > 0)
		{
			$cnt=1;
			while($row = mysql_fetch_row($rsScholasticAreas))
			{
				$descriptiveindicator = $row[0];
				$gradepoint = $row[1];
				$grade = $row[2];
				$indicatordescription = $row[3];
				$subindicator = $row[4];
			
	?>
	<tr>
		<td class="style17" style="border-style:solid; border-width:1px; width: 55px; height: 14px"><font size="3" face="Cambria"><?php echo $cnt; ?></font></td>
		<td class="style25" style="border-style:solid; border-width:1px; height: 14px" width="323"><font size="3" face="Cambria"><?php echo $descriptiveindicator; ?></font></td>
		<td class="style25" style="border-style:solid; border-width:1px; height: 14px" width="148"><font size="3" face="Cambria"><?php echo $subindicator; ?></font></td>
		<td class="style17" style="border-style:solid; border-width:1px; height: 14px" width="81"><font size="3" face="Cambria"><?php echo $gradepoint; ?></font></td>
		<td class="style17" style="border-style:solid; border-width:1px; height: 14px" width="69"><font size="3" face="Cambria"><?php echo $grade; ?></font></td>
		<td class="style11" style="border-style:solid; border-width:1px; height: 14px"><font size="3" face="Cambria"><?php echo $grade; ?></font><span class="style24"> </span>
		</td>
	</tr>
	<?php
		$cnt=$cnt+1;
		}
	}
	?>
		</table>

<p class="style18"><i><strong><font size="2">Suggestive Activities:</font></strong></i></p>
<p class="style13"><i><span class="style19"><strong><font size="2">Work Education:</font></strong></span><font size="2"> 
Cookery Skills, Preparation of stationary items, Tie &amp; Dye and screen printing, 
preparing paper out of waste paper, Hand Embroidery, Running a book bank, Repair 
and maintenance of domestic electrical gadgets, Computer operation and 
maintenance, Photography etc.</font></i></p>
<p class="style13"><i><span class="style19"><strong><font size="2">Visual &amp; Performing Arts:
</font>
</strong></span><font size="2">Music (Vocal, Instrumental), Dance, Drama, Drawing, Painting 
Craft, Puppetary </font></i> </p>
<p class="style13">&nbsp;</p>
<p class="style13"><b><u><span class="style21">
Part 2 A. </span></u>
<span class="style21">
		<u>Co-Scholastic :&nbsp; -Life Skills (Assessment on 5 Points Scale)</u></span></a></b></p>
<table style="width: 100%" class="style1">
	
	<tr>
		<td class="style8" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<strong style="font-weight: 400">
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 324px;">
		<strong style="font-weight: 400">
		<font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 149px;">
		<strong style="font-weight: 400">
		<font size="3">Point</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 153px;">
		<strong style="font-weight: 400">
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 345px;">
		<strong style="font-weight: 400">
		<font size="3">Description</font></strong></td>
	</tr>
	<?php
		if(mysql_num_rows($rsLifeSkills) > 0)
		{
			$cnt=1;
			while($row = mysql_fetch_row($rsLifeSkills))
			{
				$descriptiveindicator = $row[0];
				$gradepoint = $row[1];
				$grade = $row[2];
				$indicatordescription = $row[3];
				$subindicator = $row[4];
			
	?>
	<tr>
		<td class="style3" style="border-style:solid; border-width:1px; width: 55px; height: 14px"><?php echo $cnt; ?></td>
		<td class="style33" style="border-style:solid; border-width:1px; height: 14px; width: 324px;"><?php echo $descriptiveindicator ; ?></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 149px;"><?php echo $gradepoint; ?></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 153px;"><?php echo $grade; ?></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 345px;"><?php echo $indicatordescription; ?></td>
	</tr>
	<?php
		}
	}
	?>
	</table>

<p>&nbsp;</p>

<p><font face="Cambria"><b><u><span class="style21">
		Part 2 B. </span></u><span class="style21">
		<u>Co-Scholastic :&nbsp; Attitude and Values : (Assessment on 5 Points Scale) </u></span></b></font></p>
<table style="width: 100%" class="style1">
	
	<tr>
		<td class="style8" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<strong style="font-weight: 400">
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 325px">
		<strong style="font-weight: 400">
		<font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 148px">
		<strong style="font-weight: 400">
		<font size="3">Point</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 155px">
		<strong style="font-weight: 400">
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 345px">
		<strong style="font-weight: 400">
		<font size="3">Description</font></strong></td>
	</tr>
	
	<?php
		if(mysql_num_rows($rsAttitudeValue) > 0)
		{
			$cnt=1;
			while($row = mysql_fetch_row($rsAttitudeValue))
			{
				$descriptiveindicator = $row[0];
				$gradepoint = $row[1];
				$grade = $row[2];
				$indicatordescription = $row[3];
				$subindicator = $row[4];
			
	?>
	<tr>
		<td class="style32" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<font face="Cambria"><?php echo $cnt;?></font></td>
		<td class="style26" style="border-style:solid; border-width:1px; height: 14px; width: 325px;">
		<font face="Cambria"><?php echo $descriptiveindicator;?></font></td>
		<td class="style32" style="border-style:solid; border-width:1px; height: 14px; width: 148px;">
		<font face="Cambria"><?php echo $gradepoint;?></font></td>
		<td class="style31" style="border-style:solid; border-width:1px; height: 14px; width: 155px;">
		<font face="Cambria"><?php echo $grade;?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 345px; height: 14px">
		<font face="Cambria"><?php echo $indicatordescription;?></font></td>
	</tr>
	<?php
	}
	}
	?>
	</table>
<p>&nbsp;</p>
<p><font face="Cambria"><b><u><span class="style21">
		Part 3A. </span></u></b></font><strong>
		<font size="3" face="Cambria">Co-Scholastic Activities (Assessment on 5 
Points Scale)</font></strong></p>


<table style="width: 100%" class="style1">

	<tr>
		<td class="style8" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<strong style="font-weight: 400">
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px" width="283">
		<strong style="font-weight: 400"><font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px" width="169">
		<strong style="font-weight: 400">
		<font size="3">Suggestive Activities</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px">
		<strong style="font-weight: 400"><font size="3">Point</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px" width="86">
		<strong style="font-weight: 400"><font size="3">Grade</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px" width="344">
		<strong style="font-weight: 400"><font size="3">Description</font></strong></td>
	</tr>
	<?php
		if(mysql_num_rows($rsCoScholasticAreas) > 0)
		{
			$cnt=1;
			while($row1 = mysql_fetch_row($rsCoScholasticAreas))
			{
				$descriptiveindicator = $row1[0];
				$gradepoint = $row1[1];
				$grade = $row1[2];
				$indicatordescription = $row1[3];
				$subindicator = $row1[4];
			
	?>
	<tr>
		<td class="style34" style="border-style:solid; border-width:1px; width: 55px; height: 14px"><?php echo $cnt; ?></td>
		<td class="style9" style="border-style:solid; border-width:1px; height: 14px" width="283"><?php echo $descriptiveindicator; ?></td>
		<td class="style9" style="border-style:solid; border-width:1px; height: 14px" align="left" width="169"><font face="Cambria"><?php echo $subindicator; ?></font></td>
		<td class="style12" style="border-style:solid; border-width:1px; height: 14px"><?php echo $gradepoint; ?></td>
		<td class="style12" style="border-style:solid; border-width:1px; height: 14px" width="86"><?php echo $grade; ?></td>
		<td class="style11" style="border-style:solid; border-width:1px; height: 14px" width="344"><font face="Cambria"><?php echo $indicatordescription; ?>
		</font>
		</td>
	</tr>
	<?php
		}
	}
	?>
	</table>

<p>&nbsp;</p>
<p><b><font face="Cambria"><u><span class="style21">
		Part 3B. </span></u></font></b>
<strong style="text-decoration: underline">
		<font size="3" face="Cambria">Co-Scholastic Activities : Health and 
Physical Education </font></strong><font face="Cambria"><strong>
		<span class="style7">
		&nbsp;(Assessment on 5 Points Scale)</span></strong></font></p>
<table style="width: 100%" class="style30">
	
		<td class="style8" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<strong style="font-weight: 400">
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 325px">
		<strong style="font-weight: 400">
		<font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 156px">
		<strong style="font-weight: 400">
		<font size="3">Point</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 148px">
		<strong style="font-weight: 400">
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 344px">
		<strong style="font-weight: 400">
		<font size="3">Description</font></strong></td>
	</tr>
	<?php
		if(mysql_num_rows($rsHealthPhysical) > 0)
		{
			$cnt=1;
			while($row1 = mysql_fetch_row($rsHealthPhysical))
			{
				$descriptiveindicator = $row1[0];
				$gradepoint = $row1[1];
				$grade = $row1[2];
				$indicatordescription = $row1[3];
				$subindicator = $row1[4];
			
	?>
	<tr>
		<td class="style32" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<font face="Cambria"><?php echo $cnt;?></font></td>
		<td class="style26" style="border-style:solid; border-width:1px; height: 14px; width: 325px;">
		<font face="Cambria"><?php echo $descriptiveindicator;?></font></td>
		<td class="style32" style="border-style:solid; border-width:1px; height: 14px; width: 156px;">
		<font face="Cambria"><?php echo $gradepoint;?></font></td>
		<td class="style32" style="border-style:solid; border-width:1px; height: 14px; width: 148px;">
		<font face="Cambria"><?php echo $grade;?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 344px; height: 14px">
		<font face="Cambria"><?php echo $indicatordescription;?></font></td>
	</tr>
	<?php
		}
	}
	?>
	
	</table>

</body>

</html>