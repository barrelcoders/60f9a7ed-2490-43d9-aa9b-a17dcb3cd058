<?php include '../../connection.php';?>

<?php
session_start();

$AdmissionId = $_REQUEST["txtAdmissionId"];
$StudentName = $_REQUEST["txtStudentName"];
$Class = $_REQUEST["cboClass"];
$RollNo = $_REQUEST["txtRollNo"];
	
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
	
	$sql = "SELECT `subject`,`testtype`,`marks`,`MaxMarks`,`Grade`,`GradePoint` FROM `report_card` WHERE `testtype`='FA1' and `sclass`= '$Class' and `srollno`='$RollNo'";	
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
.style6 {
	font-family: Cambria;
	font-size: large;
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

<p align="center"><font face="Cambria" style="font-size: 11pt"><img border="0" src="../em.png" width="110" height="115"></font></p>
<p align="center"><font face="Cambria" style="font-size: 11pt">Grace Academy</font></p>
<p align="center"><font face="Cambria" style="font-size: 11pt">School Address: 
</font> </p>
<div align="center">
	<table border="1" width="840" cellspacing="0" cellpadding="0" style="border-collapse: collapse; ">
		<tr>
			<td width="127" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-color: #C0C0C0; border-top-width: 1px">
			<font face="Cambria" style="font-size: 11pt">Name</font></td>
			<td width="222" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-color: #C0C0C0">&nbsp;</td>
			<td width="109" rowspan="7" style="border-style: none; border-width: medium">&nbsp;</td>
			<td width="139" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-color: #C0C0C0">
			<font face="Cambria" style="font-size: 11pt">Class</font></td>
			<td width="235" style="border-left-style: solid; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px; border-top-color: #C0C0C0; border-top-width: 1px">&nbsp;</td>
		</tr>
		<tr>
			<td width="127" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria" style="font-size: 11pt">Admission No.</font></td>
			<td width="222" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
			<td width="139" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria" style="font-size: 11pt">Roll No</font></td>
			<td width="235" style="border-left-style: solid; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px">&nbsp;</td>
		</tr>
		<tr>
			<td width="127" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria" style="font-size: 11pt">Date Of Birth</font></td>
			<td width="222" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
			<td width="139" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px" rowspan="2">
			<font face="Cambria" style="font-size: 11pt">Residential Address</font></td>
			<td width="235" style="border-left-style: solid; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px" rowspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td width="127" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria" style="font-size: 11pt">Gender</font></td>
			<td width="222" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
		</tr>
		<tr>
			<td width="127" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria" style="font-size: 11pt">Father's Name</font></td>
			<td width="222" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
			<td width="139" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria" style="font-size: 11pt">Phone No</font></td>
			<td width="235" style="border-left-style: solid; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px">&nbsp;</td>
		</tr>
		<tr>
			<td width="127" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria" style="font-size: 11pt">Mother's Name</font></td>
			<td width="222" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">&nbsp;</td>
			<td width="139" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px">
			<font face="Cambria">Email Id:</font></td>
			<td width="235" style="border-left-style: solid; border-left-width: 1px; border-right-color: #808080; border-right-width: 1px">&nbsp;</td>
		</tr>
		<tr>
			<td width="349" style="border-left-color: #C0C0C0; border-left-width: 1px; border-right-style: solid; border-right-width: 1px" colspan="2">&nbsp;</td>
			<td width="377" style="border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px" colspan="2">&nbsp;</td>
		</tr>
		</table>
</div>
<p align="center"><b><font face="Cambria" style="font-size: 11pt">ATTENDANCE DETAILS</font></b></p>
<div align="center">
	<table border="1" width="52%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td width="313" align="center">
			<font face="Cambria" style="font-size: 11pt; font-weight: 700">Attendance</font></td>
			<td align="center">
			<font face="Cambria" style="font-size: 11pt; font-weight: 700">Term-1</font></td>
			<td align="center">
			<font face="Cambria" style="font-size: 11pt; font-weight: 700">Term-2</font></td>
		</tr>
		<tr>
			<td width="313">
			<p align="justify"><font face="Cambria" style="font-size: 11pt">Total Attendance </font></td>
			<td>
			<p align="justify">&nbsp;</td>
			<td>
			<p align="justify">&nbsp;</td>
		</tr>
		<tr>
			<td width="313">
			<p align="justify"><font face="Cambria" style="font-size: 11pt">Total Meeting</font></td>
			<td>
			<p align="justify"><font face="Cambria" style="font-size: 11pt">&nbsp;</font></td>
			<td>
			<p align="justify">&nbsp;</td>
		</tr>
		<tr>
			<td width="313">
			<p align="justify"><font face="Cambria" style="font-size: 11pt">Percent</font></td>
			<td>
			<p align="justify">&nbsp;</td>
			<td>
			<p align="justify">&nbsp;</td>
		</tr>
	</table>
	<p><b><font face="Cambria" style="font-size: 11pt">HEALTH STATUS</font></b></p>
		</div>
<div align="center">
	<table border="1" width="52%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
		<tr>
			<td width="144"><font face="Cambria" style="font-size: 11pt">Height</font></td>
			<td width="121">&nbsp;</td>
			<td rowspan="3">&nbsp;</td>
			<td width="171"><font face="Cambria" style="font-size: 11pt">Weight</font></td>
			<td width="164">&nbsp;</td>
		</tr>
		<tr>
			<td width="144"><font face="Cambria" style="font-size: 11pt">Vision L</font></td>
			<td width="121">&nbsp;</td>
			<td width="171"><font face="Cambria" style="font-size: 11pt">Vision R</font></td>
			<td width="164">&nbsp;</td>
		</tr>
		<tr>
			<td width="144"><font face="Cambria" style="font-size: 11pt">Blood Group</font></td>
			<td width="121">&nbsp;</td>
			<td width="171"><font face="Cambria" style="font-size: 11pt">Dental Hygiene</font></td>
			<td width="164">&nbsp;</td>
		</tr>
	</table>
		</div>

		<p>&nbsp;</p>
		<p><u><b><font face="Cambria">Part1 : Academics Performance :&nbsp; Scholastic 
		Areas (On 9 Points Scale)</font></b></u></p>

<table style="width: 100%" class="style1" cellspacing="0" cellpadding="0">
	
	<tr>
		<td class="style2" style="width: 95px; height: 22px">
		&nbsp;</td>
		<td class="style2" style="width: 95px; height: 22px">
		&nbsp;</td>
		<td class="style3" colspan="4" style="height: 22px"><strong>
		<font size="3">Term - I</font></strong></td>
		<td class="style3" colspan="4" style="height: 22px"><strong>
		<font size="3">Term - II</font></strong></td>
		<td class="style3" colspan="3" style="height: 22px"><strong>
		<font size="3">(Term - I + II)</font></strong></td>
	</tr>
	<tr>
		<td class="style2" style="width: 95px; height: 28px">
		<font face="Cambria" style="font-size: 11pt">&nbsp;</font></td>
		<td class="style2" style="width: 95px; height: 28px">
		<font face="Cambria" style="font-size: 11pt">&nbsp;Weight age -&gt;</font></td>
		<td class="style3" style="height: 28px"><span style="font-size: 11pt">
		10%</span></td>
		<td class="style3" style="height: 28px"><span style="font-size: 11pt">
		10%</span></td>
		<td class="style3" style="height: 28px"><span style="font-size: 11pt">
		30%</span></td>
		<td class="style3" style="height: 28px"><span style="font-size: 11pt">
		50%</span></td>
		<td class="style3" style="height: 28px"><span style="font-size: 11pt">
		10%</span></td>
		<td class="style3" style="height: 28px"><span style="font-size: 11pt">
		10%</span></td>
		<td class="style3" style="height: 28px"><span style="font-size: 11pt">
		30%</span></td>
		<td class="style3" style="height: 28px"><span style="font-size: 11pt">
		50%</span></td>
		<td class="style3" style="height: 28px"><span style="font-size: 11pt">
		50%</span>&nbsp;</td>
		<td class="style3" style="height: 28px"><span style="font-size: 11pt">
		50%</span></td>
		<td class="style3" style="height: 28px"><span style="font-size: 11pt">
		100%</span></td>
	</tr>
	<tr>
		<td class="style5" style="width: 95px; height: 56px" valign="top">
		<font face="Cambria"><strong style="font-weight: 400">S.No.</strong></font></td>
		<td class="style5" style="width: 95px; height: 56px" valign="top">
		<font face="Cambria"><strong style="font-weight: 400">Subjects</strong></font></td>
		<td class="style5" style="height: 56px; width: 95px" valign="top">
		<font face="Cambria">FA 1</font></td>
		<td class="style5" style="width: 95px; height: 56px" valign="top">
		<font face="Cambria">FA 2</font></td>
		<td class="style5" style="width: 95px; height: 56px" valign="top">
		<font face="Cambria">SA 1</font></td>
		<td class="style5" style="width: 95px; height: 56%" valign="top">
		<font face="Cambria">Term1</font><p><sub><font face="Cambria">FA1+ FA2 + SA1</font></sub></td>
		<td class="style5" style="width: 95px; height: 56px" valign="top">
		<font face="Cambria">FA 3</font></td>
		<td class="style5" style="width: 95px; height: 56px" valign="top">
		<font face="Cambria">FA 4</font></td>
		<td class="style5" style="width: 95px; height: 56px" valign="top">
		<font face="Cambria">SA 2</font></td>
		<td class="style5" style="width: 96px; height: 56px" valign="top">
		<font face="Cambria">&nbsp;Term2</font><p><sub><font face="Cambria">FA3 + FA4 + SA2</font></sub></td>
		<td class="style5" style="width: 96px; height: 56px" valign="top">
		<font face="Cambria">&nbsp;Term1</font></td>
		<td class="style5" style="width: 96px; height: 56px" valign="top">
		<font face="Cambria">&nbsp;Term2</font></td>
		<td class="style5" style="width: 96px; height: 56px" valign="top">
		<font face="Cambria">Overall Grade</font></td>
	</tr>
	
	<?php
		if(mysql_num_rows($rsFA1) > 0)
		{
			$cnt=1;
			while($row = mysql_fetch_row($rsFA1))
			{
				$subject = $row[0];
				$FA1Grade = $row[4];
				//$grade = $row[2];
				$sql = "SELECT `subject`,`testtype`,`marks`,`MaxMarks`,`Grade`,`GradePoint` FROM `report_card` WHERE `testtype`='FA2' and `sclass`= '$Class' and `srollno`='$RollNo' and `subject`='$subject'";	
				$rsFA2 = mysql_query($sql);
				
				while($row1 = mysql_fetch_row($rsFA2))
				{
				$FA2Grade = $row1[4];
				}
				
				$sql = "SELECT `subject`,`testtype`,`marks`,`MaxMarks`,`Grade`,`GradePoint` FROM `report_card` WHERE `testtype`='FA3' and `sclass`= '$Class' and `srollno`='$RollNo' and `subject`='$subject'";	
				$rsFA3 = mysql_query($sql);
				
				while($row2 = mysql_fetch_row($rsFA3))
				{
				$FA3Grade = $row2[4];
				}
				
				
				$sql = "SELECT `subject`,`testtype`,`marks`,`MaxMarks`,`Grade`,`GradePoint` FROM `report_card` WHERE `testtype`='FA4' and `sclass`= '$Class' and `srollno`='$RollNo' and `subject`='$subject'";	
				$rsFA4 = mysql_query($sql);
				
				
				
				while($row3 = mysql_fetch_row($rsFA4))
				{
				$FA4Grade = $row3[4];
				}
				
				
				$sql = "SELECT `subject`,`testtype`,`marks`,`MaxMarks`,`Grade`,`GradePoint` FROM `report_card` WHERE `testtype`='SA1' and `sclass`= '$Class' and `srollno`='$RollNo' and `subject`='$subject'";	
				$rsSA1 = mysql_query($sql);
				
				
				
				while($row4 = mysql_fetch_row($rsSA1))
				{
				$SA1Grade = $row4[4];
				}
				
				
				$sql = "SELECT `subject`,`testtype`,`marks`,`MaxMarks`,`Grade`,`GradePoint` FROM `report_card` WHERE `testtype`='SA2' and `sclass`= '$Class' and `srollno`='$RollNo' and `subject`='$subject'";	
				$rsSA2 = mysql_query($sql);
				
								
				while($row5 = mysql_fetch_row($rsSA2))
				{
				$SA2Grade = $row5[4];
				}
				
				
			
	?>


	<tr>
		<td class="style4" style="width: 95px; height: 107px">
		<font face="Cambria">
		<?php echo $cnt; ?></font></td>
		<td class="style4" style="width: 95px; height: 107px">
		<font face="Cambria">
		<?php echo $subject; ?></font></td>
		<td class="style4" style="height: 107px; width: 95px">		
		<font face="Cambria">		<?php echo $FA1Grade; ?></font></td>
		<td class="style4" style="width: 95px; height: 107px">
		<font face="Cambria"><?php echo $FA2Grade; ?></font></td>
		<td class="style4" style="width: 95px; height: 107px">
		<font face="Cambria"><?php echo $SA1Grade; ?></font></td>
		<td class="style4" style="width: 95px; height: 107px"></td>
		<td class="style4" style="width: 95px; height: 107px">
		<font face="Cambria"><?php echo $FA3Grade; ?></font></td>
		<td class="style4" style="width: 95px; height: 107px">
		<font face="Cambria"><?php echo $FA4Grade; ?></font></td>
		<td class="style4" style="width: 95px; height: 107px">
		<font face="Cambria"><?php echo $SA2Grade; ?></font></td>
		<td class="style4" style="width: 96px; height: 107px">&nbsp;</td>
		<td class="style4" style="width: 96px; height: 107px">&nbsp;</td>
		<td class="style4" style="width: 96px; height: 107px">&nbsp;</td>
		<td class="style4" style="width: 96px; height: 107px">&nbsp;</td>
	</tr>
	<?php
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
		<td class="style8" style="width: 55px; height: 18px"><strong>
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="height: 18px; "><strong><font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="height: 18px; "><strong>
		<font size="3">Suggestive Activities</font></strong></td>
		<td class="style3" style="height: 18px; "><strong><font size="3">Point</font></strong></td>
		<td class="style3" style="height: 18px; "><strong><font size="3">Grade</font></strong></td>
		<td class="style3" style="height: 18px; "><strong><font size="3">Description</font></strong></td>
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
		<td class="style17" style="width: 55px; height: 14px"><font size="3" face="Cambria"><?php echo $cnt; ?></font></td>
		<td class="style25" style="height: 14px; "><font size="3" face="Cambria"><?php echo $descriptiveindicator; ?></font></td>
		<td class="style25" style="height: 14px; "><font size="3" face="Cambria"><?php echo $subindicator; ?></font></td>
		<td class="style17" style="height: 14px; "><font size="3" face="Cambria"><?php echo $gradepoint; ?></font></td>
		<td class="style17" style="height: 14px; "><font size="3" face="Cambria"><?php echo $grade; ?></font></td>
		<td class="style11" style="height: 14px"><font size="3" face="Cambria"><?php echo $grade; ?></font><span class="style24"> </span>
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
		<td class="style8" style="width: 55px; height: 14px">
		<strong style="font-weight: 400">
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="height: 14px; width: 518px;">
		<strong style="font-weight: 400">
		<font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="height: 14px; width: 176px;">
		<strong style="font-weight: 400">
		<font size="3">Point</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px;">
		<strong style="font-weight: 400">
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px;">
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
		<td class="style3" style="width: 55px; height: 14px"><?php echo $cnt; ?></td>
		<td class="style33" style="height: 14px; width: 518px;"><?php echo $descriptiveindicator ; ?></td>
		<td class="style3" style="height: 14px; width: 176px;"><?php echo $gradepoint; ?></td>
		<td class="style3" style="height: 14px; width: 177px;"><?php echo $grade; ?></td>
		<td class="style3" style="height: 14px; width: 177px;"><?php echo $indicatordescription; ?></td>
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
		<td class="style8" style="width: 55px; height: 14px">
		<strong style="font-weight: 400">
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="height: 14px; width: 518px">
		<strong style="font-weight: 400">
		<font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="height: 14px; width: 176px">
		<strong style="font-weight: 400">
		<font size="3">Point</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px">
		<strong style="font-weight: 400">
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px">
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
		<td class="style32" style="width: 55px; height: 14px">
		<font face="Cambria"><?php echo $cnt;?></font></td>
		<td class="style26" style="height: 14px; width: 518px;">
		<font face="Cambria"><?php echo $descriptiveindicator;?></font></td>
		<td class="style32" style="height: 14px; width: 176px;">
		<font face="Cambria"><?php echo $gradepoint;?></font></td>
		<td class="style31" style="height: 14px; width: 177px;">
		<font face="Cambria"><?php echo $grade;?></font></td>
		<td class="style4" style="width: 177px; height: 14px">
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
		<td class="style8" style="width: 55px; height: 14px">
		<strong style="font-weight: 400">
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="height: 14px; ">
		<strong style="font-weight: 400"><font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="height: 14px; ">
		<strong style="font-weight: 400">
		<font size="3">Suggestive Activities</font></strong></td>
		<td class="style3" style="height: 14px; ">
		<strong style="font-weight: 400"><font size="3">Point</font></strong></td>
		<td class="style3" style="height: 14px; ">
		<strong style="font-weight: 400"><font size="3">Grade</font></strong></td>
		<td class="style3" style="height: 14px; ">
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
		<td class="style34" style="width: 55px; height: 14px"><?php echo $cnt; ?></td>
		<td class="style9" style="height: 14px; "><?php echo $descriptiveindicator; ?></td>
		<td class="style9" style="height: 14px; " align="left"><font face="Cambria"><?php echo $subindicator; ?></font></td>
		<td class="style12" style="height: 14px; "><?php echo $gradepoint; ?></td>
		<td class="style12" style="height: 14px; "><?php echo $grade; ?></td>
		<td class="style11" style="height: 14px"><font face="Cambria"><?php echo $indicatordescription; ?>
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
	
		<td class="style8" style="width: 55px; height: 14px">
		<strong style="font-weight: 400">
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="height: 14px; width: 518px">
		<strong style="font-weight: 400">
		<font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="height: 14px; width: 176px">
		<strong style="font-weight: 400">
		<font size="3">Point</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px">
		<strong style="font-weight: 400">
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px">
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
		<td class="style32" style="width: 55px; height: 14px">
		<font face="Cambria"><?php echo $cnt;?></font></td>
		<td class="style26" style="height: 14px; width: 518px;">
		<font face="Cambria"><?php echo $descriptiveindicator;?></font></td>
		<td class="style32" style="height: 14px; width: 176px;">
		<font face="Cambria"><?php echo $gradepoint;?></font></td>
		<td class="style32" style="height: 14px; width: 177px;">
		<font face="Cambria"><?php echo $grade;?></font></td>
		<td class="style4" style="width: 177px; height: 14px">
		<font face="Cambria"><?php echo $indicatordescription;?></font></td>
	</tr>
	<?php
		}
	}
	?>
	
	</table>

</body>

</html>