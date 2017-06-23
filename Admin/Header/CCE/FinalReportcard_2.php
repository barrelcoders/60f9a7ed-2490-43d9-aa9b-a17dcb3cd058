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

<table style="width: 1241px" class="style1" cellspacing="0" cellpadding="0">
	<tr>
		<td class="style6" style="height: 22px" colspan="15"><strong>
		<font size="3">Part - 1 Academic Performance : Scholastic Areas (9 point 
		scale)</b></font></strong></td>
	</tr>
	<tr>
		<td class="style2" style="width: 82px; height: 28px">
		<font face="Cambria">&nbsp;</font></td>
		<td class="style2" style="width: 82px; height: 28px">
		<font face="Cambria">&nbsp;</font></td>
		<td class="style3" colspan="5" style="height: 28px"><strong>
		<font size="3">Term - I</font></strong></td>
		<td class="style3" colspan="5" style="height: 28px"><strong>
		<font size="3">Term - II</font></strong></td>
		<td class="style3" colspan="3" style="height: 28px"><strong>
		<font size="3">(Term - I + 
		II)</font></strong></td>
	</tr>
	<tr>
		<td class="style5" style="width: 82px; height: 107px">
		<font face="Cambria"><strong style="font-weight: 400">S.No.</strong></font></td>
		<td class="style5" style="width: 82px; height: 107px">
		<font face="Cambria"><strong style="font-weight: 400">Subjects</strong></font></td>
		<td class="style5" style="height: 107px; width: 82px">
		<font face="Cambria">FA 1</font><p><font face="Cambria">10%</font></td>
		<td class="style5" style="width: 82px; height: 107px">
		<font face="Cambria">FA 2</font><p><font face="Cambria">10%</font></td>
		<td class="style5" style="width: 82px; height: 107px">
		<font face="Cambria">SA 1</font><p><font face="Cambria">30%</font></td>
		<td class="style5" style="width: 82px; height: 107px">
		<font face="Cambria">FA1 + FA2</font><p><font face="Cambria">(20%)</font></td>
		<td class="style5" style="width: 83px; height: 107px">
		<font face="Cambria">Term1: FA+ FA2 + SA1 (30%)</font></td>
		<td class="style5" style="width: 83px; height: 107px">
		<font face="Cambria">FA 3</font><p><font face="Cambria">(10%)</font></td>
		<td class="style5" style="width: 83px; height: 107px">
		<font face="Cambria">FA 4</font><p><font face="Cambria">(10%)</font></td>
		<td class="style5" style="width: 83px; height: 107px">
		<font face="Cambria">SA 2</font><p><font face="Cambria">(30%)</font></td>
		<td class="style5" style="width: 83px; height: 107px">
		<font face="Cambria">FA3 + FA4(20%)</font></td>
		<td class="style5" style="width: 83px; height: 107px">
		<font face="Cambria">&nbsp;Term2 = FA3 + FA4 + SA2(30%)</font></td>
		<td class="style5" style="width: 83px; height: 107px">
		<font face="Cambria">&nbsp;Term1(50%)</font></td>
		<td class="style5" style="width: 83px; height: 107px">
		<font face="Cambria">&nbsp;Term2(50%)</font></td>
		<td class="style5" style="width: 83px; height: 107px">
		<font face="Cambria">Overall Grade(100%)</font><p>&nbsp;</td>
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
		<td class="style4" style="width: 82px; height: 50px">
		<?php echo $cnt; ?></td>
		<td class="style4" style="width: 82px; height: 50px">
		<?php echo $subject; ?></td>
		<td class="style4" style="height: 50px; width: 82px">		<?php echo $FA1Grade; ?></td>
		<td class="style4" style="width: 82px; height: 50px"><?php echo $FA2Grade; ?></td>
		<td class="style4" style="width: 82px; height: 50px"><?php echo $SA1Grade; ?></td>
		<td class="style4" style="width: 82px; height: 50px"></td>
		<td class="style4" style="width: 83px; height: 50px"></td>
		<td class="style4" style="width: 83px; height: 50px"><?php echo $FA3Grade; ?></td>
		<td class="style4" style="width: 83px; height: 50px"><?php echo $FA4Grade; ?></td>
		<td class="style4" style="width: 83px; height: 50px"><?php echo $SA2Grade; ?></td>
		<td class="style4" style="width: 83px; height: 50px">&nbsp;</td>
		<td class="style4" style="width: 83px; height: 50px">&nbsp;</td>
		<td class="style4" style="width: 83px; height: 50px">&nbsp;</td>
		<td class="style4" style="width: 83px; height: 50px">&nbsp;</td>
		<td class="style4" style="width: 83px; height: 50px">&nbsp;</td>
	</tr>
	<?php
	}}
	?>
	
	</table>

<font face="Cambria">
<br>

</font>
<table style="width: 100%" class="style1">
	<tbody class="style10">
	<tr>
		<td class="style6" style="height: 24px" colspan="6"><strong>
		<span class="style15">Part - 1(B) 
		Scholastic Areas </span><span class="style7">
		(Assessment on 5 Points Scale)</span></strong></td>
	</tr>
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

<p class="style18"><strong>Suggestive Activities:</strong></p>
<p class="style13"><span class="style19"><strong>Work Education:</strong></span> 
Cookery Skills, Preparation of stationary items, Tie &amp; Dye and screen printing, 
preparing paper out of waste paper, Hand Embroidery, Running a book bank, Repair 
and maintenance of domestic electrical gadgets, Computer operation and 
maintenance, Photography etc.</p>
<p class="style13"><span class="style19"><strong>Visual &amp; Performing Arts:
</strong></span>Music (Vocal, Instrumental), Dance, Drama, Drawing, Painting 
Craft, Puppetary </p>
<p class="style13">&nbsp;</p>
<p class="style13"><b><u><span class="style21">
Part 2 A. </span></u>
<span class="style21">
		<u>Co-Scholastic :&nbsp; -Life Skills</u></span></a></b></p>
<table style="width: 100%" class="style1">
	<tr>
		<td class="style6" style="height: 24px" colspan="5"><strong>
		<font size="3">Part - 2 Co-Scholastic Areas</font><span class="style7">
		(Life Skills) (Assessment on 5 Points Scale)</span></strong></td>
	</tr>
	<tr>
		<td class="style8" style="width: 55px; height: 14px"><strong>
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="height: 14px; width: 518px;"><strong>
		<font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="height: 14px; width: 176px;"><strong>
		<font size="3">Point</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px;"><strong>
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px;"><strong>
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

<p><font face="Cambria"><b><u><span class="style21">
		Part 2 B. </span></u><span class="style21">
		<u>Co-Scholastic :&nbsp; Attitude and Values</u></span></b></font></p>
<table style="width: 100%" class="style1">
	<tr>
		<td class="style6" style="height: 24px" colspan="5"><strong>
		<span class="style7">
		Part - 2 (B) Co-Scholastic Areas Attitude &amp; Values (Assessment on 5 Points Scale)</span></strong></td>
	</tr>
	<tr>
		<td class="style8" style="width: 55px; height: 14px"><strong>
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="height: 14px; width: 518px"><strong>
		<font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="height: 14px; width: 176px"><strong>
		<font size="3">Point</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px"><strong>
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px"><strong>
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
		<td class="style32" style="width: 55px; height: 14px"><?php echo $cnt;?></td>
		<td class="style26" style="height: 14px; width: 518px;"><?php echo $descriptiveindicator;?></td>
		<td class="style32" style="height: 14px; width: 176px;"><?php echo $gradepoint;?></td>
		<td class="style31" style="height: 14px; width: 177px;"><?php echo $grade;?></td>
		<td class="style4" style="width: 177px; height: 14px"><?php echo $indicatordescription;?></td>
	</tr>
	<?php
	}
	}
	?>
	</table>
<p>&nbsp;</p>
<p><font face="Cambria"><b><u><span class="style21">
		Part 3A. </span></u></b></font><strong>
		<font size="3" face="Cambria">Co-Scholastic Activities : </font></strong>
</p>


<table style="width: 100%" class="style1">
	<tr>
		<td class="style6" style="height: 24px" colspan="6"><strong>
		<font size="3">Part - 3 Co-Scholastic Activities</font><span class="style7">
		(Assessment on 5 Points Scale)</span></strong></td>
	</tr>
	<tr>
		<td class="style8" style="width: 55px; height: 14px"><strong>
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="height: 14px; "><strong><font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="height: 14px; "><strong>
		<font size="3">Suggestive Activities</font></strong></td>
		<td class="style3" style="height: 14px; "><strong><font size="3">Point</font></strong></td>
		<td class="style3" style="height: 14px; "><strong><font size="3">Grade</font></strong></td>
		<td class="style3" style="height: 14px; "><strong><font size="3">Description</font></strong></td>
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
		<td class="style11" style="height: 14px"><?php echo $indicatordescription; ?>
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
Physical Education</font></strong></p>
<table style="width: 100%" class="style30">
	<tr>
		<td class="style6" style="height: 24px" colspan="5"><strong>
		<font size="3">Part - 3 Co-Scholastic Activities</font><span class="style7">
		Health and Physical Education (Assessment on 5 Points Scale)</span></strong></td>
	</tr>
	<tr>
		<td class="style8" style="width: 55px; height: 14px"><strong>
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="height: 14px; width: 518px"><strong>
		<font size="3">Descriptive Indicators</font></strong></td>
		<td class="style3" style="height: 14px; width: 176px"><strong>
		<font size="3">Point</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px"><strong>
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="height: 14px; width: 177px"><strong>
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
		<td class="style32" style="width: 55px; height: 14px"><?php echo $cnt;?></td>
		<td class="style26" style="height: 14px; width: 518px;"><?php echo $descriptiveindicator;?></td>
		<td class="style32" style="height: 14px; width: 176px;"><?php echo $gradepoint;?></td>
		<td class="style32" style="height: 14px; width: 177px;"><?php echo $grade;?></td>
		<td class="style4" style="width: 177px; height: 14px"><?php echo $indicatordescription;?></td>
	</tr>
	<?php
		}
	}
	?>
	
	</table>

</body>

</html>