<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
session_start();

$AdmissionId = $_REQUEST["txtAdmissionId"];
$StudentName = $_REQUEST["txtStudentName"];
$Class = $_REQUEST["cboClass"];
$RollNo = $_REQUEST["txtRollNo"];

$strOneStudent="";

	$rsStudentDetail= mysql_query("select `DOB`,`Address`,`Sex`,`sfathername`,`smobile`,`MotherName`,`email`,`sname`,`sclass`,`srollno` from `student_master` where `sadmission`='$AdmissionId'");
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
		$srollno=$row[9];
		break;
	}
	
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Life Skills' and `TestType`='Term1' and `sadmission`='$AdmissionId'";
	$rsLifeSkill = mysql_query($sql);
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Work Education' and `TestType`='Term1' and `sadmission`='$AdmissionId'";
	$rsWorkEducation = mysql_query($sql);
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Visual and Performing Arts' and `TestType`='Term1' and `sadmission`='$AdmissionId'";	
	
	$rsVisualPerforming = mysql_query($sql);
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Attitude and Values' and `TestType`='Term1' and `sadmission`='$AdmissionId'";	
	$rsAttitudeValue = mysql_query($sql);
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Co-Curricular Activities' and `TestType`='Term1' and `sadmission`='$AdmissionId'";	
	
	$rsCoCurricular = mysql_query($sql);
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Health And Physical Education' and `TestType`='Term1' and `sadmission`='$AdmissionId'";	
	$rsHPed = mysql_query($sql);
	
	$sql = "SELECT `descriptiveindicator`,`gradepoint`,`grade`,`indicatordescription`,`subindicator` FROM `reportcard_interim` WHERE `indicatortype`='Yoga' and `TestType`='Term1' and `sadmission`='$AdmissionId'";	
	$rsYoga = mysql_query($sql);
	
	$sql = "SELECT distinct `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`marks` FROM `report_card` WHERE `testtype`='FA1' and `sadmission`= '$AdmissionId'";
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
	font-size: 11pt;
	border: 1px solid #000000;
}
.style8 {
	border: 1px solid #000000;
	font-family: Cambria;
	font-size: 11pt;
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
	text-align: left;
	border: 1px solid #000000;
}
.style12 {
	font-family: Cambria;
	border: 1px solid #000000;
	text-align: center;
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
.style32 {
	border: 1px solid #000000;
	text-align: center;
}
.style33 {
	text-align: left;
	font-family: Cambria;
	font-size: 11pt;
	border: 1px solid #000000;
}
.style34 {
	font-family: Cambria;
	text-align: center;
}
.style35 {
	border-collapse: collapse;
	border-style: solid;
	border-width: 1px;
}
.style36 {
	font-family: Arial;
	font-size: 11pt;
	text-align: left;
	border: 1px solid #000000;
}
.style37 {
	border: 1px solid #000000;
	font-family: Cambria;
}
.style38 {
	font-size: 11pt;
}
</style>
</head>

<body>
<table  width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse">
	<tr >
		<td align="left" width="12%">
		
		<p align="center">
		
		<img src= "../images/HCPS Logo.jpg" width="150" height="85"><br>&nbsp;&nbsp;<font face="Cambria" style="font-size: 11pt; font-weight: 700">Estd. 1979</font><td align=center width="88%"><font size="6px" face="Cambria"><?php echo $SchoolName1?></font>
		<br><font face="Cambria" style="font-size: 10pt"><b><?php echo $SchoolAffiliation1 ?></b><br><font face="Cambria"><?php echo $SchoolAddress ?><br><?php echo $Website?></font></td></tr>
		
		<tr><td colspan=2>
			<p align="center"><b><font face="Cambria">Achievement Record</font></b></td></tr>	

	<tr>
		<td colspan=2>
		<p align="center"><b><font face="Cambria">Evaluation-I Academic (2015 - 16)<br><br></font></b></td></tr><div align="center">
	<table border="1" width="90%" cellspacing="0" cellpadding="0" align=center style="border-collapse: collapse; ">
		<tr>
			<td width="723" style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-bottom-style:solid; border-bottom-width:1px" colspan="4">
			<p align="center"><font face="Cambria"><b>Student Profile</b></font></td>
		</tr>
		<tr>
			<td width="127" style="border-left:1px solid #C0C0C0; border-top:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Name</font></td>
			<td width="222" style="border-top:1px solid #C0C0C0; border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria">&nbsp;<?php echo $sname;?> </font></td>
			<td width="139" style="border-top:1px solid #C0C0C0; border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Class</font></td>
			<td width="235" style="border-right:1px solid #808080; border-top:1px solid #C0C0C0; border-left-style: solid; border-left-width: 1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria">&nbsp;<?php echo $sclass;?> &nbsp; </font></td>
		</tr>
		<tr>
			<td width="127" style="border-left:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Admission No.</font></td>
			<td width="222" style="border-style:solid; border-width:1px; ">
			<font face="Cambria">&nbsp;<?php echo $AdmissionId;?></font></td>
			<td width="139" style="border-style:solid; border-width:1px; ">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Roll No</font></td>
			<td width="235" style="border-right:1px solid #808080; border-left-style: solid; border-left-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria">&nbsp;<?php echo $srollno; ?> &nbsp; </font></td>
		</tr>
		<tr>
			<td width="127" style="border-left:1px solid #C0C0C0; border-right-style: solid; border-right-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Father's Name</font></td>
			<td width="222" style="border-style:solid; border-width:1px; ">
			<font face="Cambria">&nbsp;<?php echo $sfathername; ?></font></td>
			<td width="139" style="border-style:solid; border-width:1px; ">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Mother's Name</font></td>
			<td width="235" style="border-right:1px solid #808080; border-left-style: solid; border-left-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria">&nbsp;<?php echo $MotherName; ?></font></td>
		</tr>
		</table>
</div>
<div align="center">
	<br>
		</div>
<div align="center">
	<table width="90%" cellspacing="0" cellpadding="0" align=center class="style35">
		<tr>
			<td width="600" style="border-style: solid; border-width: 1px" colspan="4">
			
			<p align="center"><b><font face="Cambria">Health Status</font></b></font></b></td>
		</tr>
		<tr>
			<td width="144" style="border-style: solid; border-width: 1px"><font face="Cambria" style="font-size: 11pt">&nbsp;Height</font></td>
			<td width="121" style="border-style: solid; border-width: 1px">&nbsp;</td>
			<td width="171" style="border-style: solid; border-width: 1px"><font face="Cambria" style="font-size: 11pt">&nbsp;Weight</font></td>
			<td width="164" style="border-style: solid; border-width: 1px">&nbsp;</td>
		</tr>
		<tr>
			<td width="144" style="border-style: solid; border-width: 1px"><font face="Cambria" style="font-size: 11pt">&nbsp;Vision L</font></td>
			<td width="121" style="border-style: solid; border-width: 1px">&nbsp;</td>
			<td width="171" style="border-style: solid; border-width: 1px"><font face="Cambria" style="font-size: 11pt">&nbsp;Dental Hygiene</font></td>
			<td width="164" style="border-style: solid; border-width: 1px">&nbsp;</td>
		</tr>
		</table>
		</div>

		<br>

<table style="width: 90%" class="style1" align=center cellspacing="0" cellpadding="0">
	
	<tr>
		<td class="style2" style="border-style:solid; border-width:1px; height: 22px" colspan="6">
		<p align="center"><u><b><font face="Cambria">Part1 : Academics Performance :&nbsp; Scholastic 
		Areas</font></b></u></td>
	</tr>
	
	<tr>
		<td class="style2" style="border-style:solid; border-width:1px; width: 70px; height: 22px">
		&nbsp;</td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 209px; height: 22px">
		&nbsp;</td>
		<td class="style3" colspan="4" style="border-style:solid; border-width:1px; height: 22px"><strong>
		<font size="3">Term - I</font></strong></td>
	</tr>
	<tr>
		<td class="style2" style="border-style:solid; border-width:1px; width: 70px; height: 28px">
		<font face="Cambria" style="font-size: 11pt"><strong>&nbsp;</strong></font><font face="Cambria"><strong><span class="style38">S.No.</span></strong></font></td>
		<td class="style2" style="border-style:solid; border-width:1px; width: 209px; height: 28px" align="center">
		<font face="Cambria" style="font-size: 11pt"><strong>&nbsp;Subject</strong></font></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 28px"><span style="font-size: 11pt">
		<strong>FA1 (10%)</strong></span></td>
		<td class="style3" style="height: 28px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"><span style="font-size: 11pt">
		<strong>FA2 (10%)</strong></span></td>
		<td class="style3" style="height: 28px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"><span style="font-size: 11pt">
		<strong>SA1 (30%)</strong></span></td>
		<td class="style3" style="height: 28px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px"><span style="font-size: 11pt">
		<font face="Cambria"><strong>Term1-FA1+FA2+SA1 (</strong></font><strong>50%)</strong></span></td>
		<!--<td class="style3" style="border-style:solid; border-width:1px; height: 28px"><span style="font-size: 11pt">
		50%</span>&nbsp;</td>-->
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
				$FA1MaxMarks=$row[2];
				$FA1Grade = $row[3];
				$FA1ObtainedMarks=$row[5];
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`marks` FROM `report_card` WHERE `testtype`='FA2' and `sadmission`= '$AdmissionId' and `subject`='$subject'";	
				$rsFA2 = mysql_query($sql);
				
				while($row1 = mysql_fetch_row($rsFA2))
				{
					$FA2Grade = $row1[3];
					$FA2MaxMarks=$row1[2];
					$FA2ObtainedMarks=$row1[5];
				}
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`marks` FROM `report_card_temp` WHERE `testtype`='FA3' and `sadmission`= '$AdmissionId' and `subject`='$subject'";	
				$rsFA3 = mysql_query($sql);
				
				while($row2 = mysql_fetch_row($rsFA3))
				{
				$FA3Grade = $row2[3];
				$FA3MaxMarks=$row2[2];
				$FA3ObtainedMarks=$row2[5];
				}
				
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`MarksObtained` FROM `report_card_temp` WHERE `testtype`='FA4' and `sadmission`= '$AdmissionId' and `subject`='$subject'";	
				$rsFA4 = mysql_query($sql);
				
				while($row3 = mysql_fetch_row($rsFA4))
				{
				$FA4Grade = $row3[3];
				$FA4MaxMarks=$row3[2];
				$FA4ObtainedMarks=$row3[5];
				}
				
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`MarksObtained` FROM `report_card_temp` WHERE `testtype`='SA1' and `sadmission`= '$AdmissionId' and `subject`='$subject'";	
				$rsSA1 = mysql_query($sql);
				
				
				
				while($row4 = mysql_fetch_row($rsSA1))
				{
				$SA1Grade = $row4[3];
				$SA1MaxMarks=$row4[2];
				$SA1ObtainedMarks=$row4[5];
				}
				
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`MarksObtained` FROM `report_card_temp` WHERE `testtype`='SA2' and `sadmission`= '$AdmissionId' and `subject`='$subject'";	
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
				
		
				
				$GrandTotalMaxMarks=$Term1TotalMaxMarks+$Term2TotalMaxMarks;
				$GrandTotalObtainedMarks=$Term1TotalObtainedMarks+$Term2TotalObtainedMarks;
				$GrandPercent=($GrandTotalObtainedMarks/$GrandTotalMaxMarks)*100;
				
				$rsTerm1Grade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='100' and ".$PercentTerm1.">=`RangeFrom` and ".$PercentTerm1."<=`RangeTo`");
				while($rowTerm1Grade = mysql_fetch_array($rsTerm1Grade))
  				{
  					$Term1Grade=$rowTerm1Grade[0];
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
		<td class="style4" style="border-style:solid; border-width:1px; width: 70px; ">
		<font face="Cambria">&nbsp;
		<?php echo $cnt; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 209px; ">
		<font face="Cambria">&nbsp;
		<?php echo $subject; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 209px">		
		<font face="Cambria">&nbsp;<?php echo $FA1Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 209px; ">
		<font face="Cambria">&nbsp;<?php echo $FA2Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 209px; ">
		<font face="Cambria">&nbsp;<?php echo $SA1Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 209px;">&nbsp;<?php echo $Term1Grade;?></td>
		<!--
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px;">
		<font face="Cambria"><?php //echo $FA3Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px;">
		<font face="Cambria"><?php //echo $FA4Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 95px;">
		<font face="Cambria"><?php //echo $SA2Grade; ?></font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 96px;">
		<?php //echo $Term2Grade;?></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 96px;">
		<?php echo $Term1Grade;?></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 96px;">
		<?php //echo $Term2Grade;?></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 96px;">
		<?php //echo $FinalGrade;?></td>
		-->
	</tr>
	<?php
	$cnt=$cnt+1;
	}//End of While loop for FA1 Subject
	}//End of If Condition check FA1 data exists or not
	?>
	
	</table>

<font face="Cambria">
<br>

</font>
<!--<table style="width: 90%" align=center class="style1">
	<tbody class="style10">
	
		<tr>
		<td class="style8" style="border-style:solid; border-width:1px; height: 18px" colspan="4">
		<p style="text-align: center">

<font face="Cambria">

<strong>
		<span class="style15">Part - 1(B) 
		Co-Scholastic : - Life Skills</span></strong></font></td>
	</tr>
	
		<tr>
		<td class="style8" style="border-style:solid; border-width:1px; width: 55px; height: 18px"><strong>
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 18px; width: 175px;">
		<strong><font size="3">Indicators</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 18px; width: 30px;"><strong><font size="3">Grade</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 18px"><strong><font size="3">Description</font></strong></td>
	</tr>
	<?php
		if(mysql_num_rows($rsLifeSkill) > 0)
		{
			$cnt=1;
			while($row = mysql_fetch_row($rsLifeSkill))
			{
				$descriptiveindicator = $row[0];
				$gradepoint = $row[1];
				$grade = $row[2];
				$indicatordescription = $row[3];
				$subindicator = $row[4];
			
	?>
	<tr>
		<td class="style17" style="border-style:solid; border-width:1px; width: 55px; height: 14px"><font size="3" face="Cambria">&nbsp;<?php echo $cnt; ?></font></td>
		<td class="style25" style="border-style:solid; border-width:1px; height: 14px; width: 175px;"><font size="3" face="Cambria">&nbsp;<?php echo $descriptiveindicator; ?></font></td>
		<td class="style17" style="border-style:solid; border-width:1px; height: 14px; width: 30px;"><font size="3" face="Cambria">&nbsp;<?php echo $grade; ?></font></td>
		<td class="style11" style="border-style:solid; border-width:1px; height: 14px"><font size="3" face="Cambria">&nbsp;<?php echo $indicatordescription; ?> </font><span class="style24"> 
		&nbsp;</span></td>
	</tr>
	<?php
		$cnt=$cnt+1;
		}
	}
	?>
		</table>

<br>
<table style="width: 90%" align=center class="style1">
	
	<tr>
		<td class="style8" style="border-style:solid; border-width:1px; height: 14px" colspan="4">
		<p align="center"><b><u><span class="style21">
		<font size="3">Part 2 A. </font> </span></u>
		<font size="3">
<span class="style21">
		<u>Co-Scholastic :&nbsp; -Work Education</u></span></font></b></td>
	</tr>
	
	<tr>
		<td class="style8" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<strong style="font-weight: 400">
		<font size="3"><strong>S. No.</strong></font></strong></td>
		<td class="style12" style="border-style:solid; border-width:1px; height: 14px; width: 175px;">
		<strong>
		<font size="3">Indicators</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 30px;">
		<strong>
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; ">
		<strong>
		<font size="3">Description</font></strong></td>
	</tr>
	<?php
		if(mysql_num_rows($rsWorkEducation) > 0)
		{
			$cnt=1;
			while($row = mysql_fetch_row($rsWorkEducation))
			{
				$descriptiveindicator = $row[0];
				$gradepoint = $row[1];
				$grade = $row[2];
				$indicatordescription = $row[3];
				$subindicator = $row[4];
			
	?>
	<tr>
		<td class="style3" style="border-style:solid; border-width:1px; width: 55px; height: 14px">&nbsp;<?php echo $cnt; ?></td>
		<td class="style33" style="border-style:solid; border-width:1px; height: 14px; width: 175px;">&nbsp;<?php echo $descriptiveindicator ; ?></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 30px;">&nbsp;<?php echo $grade; ?></td>
		<td class="style9" style="border-style:solid; border-width:1px; height: 14px; ">&nbsp;<?php echo $indicatordescription; ?></td>
	</tr>
	<?php
		}
	}
	?>
	</table>
	

<br>
<table style="width: 90%" align=center  class="style30">
	
	<tr>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px" colspan="4">
		<font face="Cambria" size="3"><b><u><span class="style21">Part 2 B. </span></u><span class="style21"><u>Co-Scholastic :&nbsp; 
		Visual &amp; Performing Art</u></span></b></font></td>
	</tr>
	
	<tr>
		<td class="style37" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<strong style="font-weight: 400">
		<font size="3"><strong>S. No.</strong></font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 175px">
		<strong>
		<font size="3">Indicators</font></strong></td>
		<td class="style3" style="height: 14px; width: 30px">
		<strong>
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; ">
		<strong>
		<font size="3">Description</font></strong></td>
	</tr>
	
	<?php
		if(mysql_num_rows($rsVisualPerforming) > 0)
		{
			$cnt=1;
			while($row = mysql_fetch_row($rsVisualPerforming))
			{
				$descriptiveindicator = $row[0];
				$gradepoint = $row[1];
				$grade = $row[2];
				$indicatordescription = $row[3];
				$subindicator = $row[4];
			
	?>
	<tr>
		<td class="style32" style="border-bottom: 1px solid #000000; width: 55px; height: 14px; border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-style: solid; border-top-width: 1px;">
		<font face="Cambria">&nbsp;<?php echo $cnt;?></font></td>
		<td class="style26" style="height: 14px; width: 175px;">
		<font face="Cambria">&nbsp;<?php echo $descriptiveindicator;?></font></td>
		<td class="style32" style="height: 14px; width: 30px;">
		<font face="Cambria">&nbsp;<?php echo $grade;?></font></td>
		<td class="style36" style="height: 14px">
		<font face="Cambria">&nbsp;<?php echo $indicatordescription;?> </font></td>
	</tr>
	<?php
	}
	}
	?>
	</table>
<br>


<table style="width: 90%" align=center class="style1">

	<tr>
		<td class="style8" style="border-style:solid; border-width:1px; height: 14px" colspan="4" align="center">
		<font face="Cambria" size="3"><b><u><span class="style21">
		Part 3A. 
<strong style="text-decoration: underline">
		Co-Scholastic : </strong>Attitude &amp; Values</span></u></b></font></td>
	</tr>

	<tr>
		<td class="style37" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<strong>
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 175px;">
		<font size="3"><strong>Indicators</strong></font></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 30px;">
		<font size="3"><strong>Grade</strong></font></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px">
		<font size="3"><strong>Description</strong></font></td>
	</tr>
	<?php
		if(mysql_num_rows($rsAttitudeValue) > 0)
		{
			$cnt=1;
			while($row1 = mysql_fetch_row($rsAttitudeValue))
			{
				$descriptiveindicator = $row1[0];
				$gradepoint = $row1[1];
				$grade = $row1[2];
				$indicatordescription = $row1[3];
				$subindicator = $row1[4];
			
	?>
	<tr>
		<td class="style34" style="border-style:solid; border-width:1px; width: 55px; height: 14px">&nbsp;<?php echo $cnt; ?></td>
		<td class="style9" style="border-style:solid; border-width:1px; height: 14px; width: 175px;">&nbsp;<?php echo $descriptiveindicator; ?></td>
		<td class="style12" style="border-style:solid; border-width:1px; height: 14px; width: 30px;">&nbsp;<?php echo $grade; ?></td>
		<td class="style36" style="border-style:solid; border-width:1px; height: 14px"><font face="Cambria">&nbsp;<?php echo $indicatordescription; ?>
		</font>
		</td>
	</tr>
	<?php
		}
	}
	?>
	</table>

<br>
<table style="width: 90%" align=center class="style30">
	
		<tr>
	
		<td class="style8" style="border-style:solid; border-width:1px; height: 14px" colspan="4" align="center">
		<b><font face="Cambria" size="3"><u><span class="style21">
		Part 3B. </span></u></font></b>
<strong style="text-decoration: underline">
		<font size="3" face="Cambria">Co-Scholastic : Co- Curricular &nbsp;Activities</font></strong></td>
	</tr>
		
		<td class="style37" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<strong>
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 175px">
		<strong>
		<font size="3">Indicators</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 30px">
		<strong>
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; ">
		<strong>
		<font size="3">Description</font></strong></td>
	</tr>
	<?php
		if(mysql_num_rows($rsCoCurricular) > 0)
		{
			$cnt=1;
			while($row1 = mysql_fetch_row($rsCoCurricular))
			{
				$descriptiveindicator = $row1[0];
				$gradepoint = $row1[1];
				$grade = $row1[2];
				$indicatordescription = $row1[3];
				$subindicator = $row1[4];
			
	?>
	<tr>
		<td class="style32" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<font face="Cambria">&nbsp;<?php echo $cnt;?></font></td>
		<td class="style26" style="border-style:solid; border-width:1px; height: 14px; width: 175px;">
		<font face="Cambria">&nbsp;<?php echo $descriptiveindicator;?></font></td>
		<td class="style32" style="border-style:solid; border-width:1px; height: 14px; width: 30px;">
		<font face="Cambria">&nbsp;<?php echo $grade;?></font></td>
		<td class="style36" style="border-style:solid; border-width:1px; height: 14px">
		<font face="Cambria">&nbsp;<?php echo $indicatordescription;?> </font></td>
	</tr>
	<?php
		}
	}
	?>
	
	</table>
	
	<br>
<table style="width: 90%" align=center class="style30">
	
		<tr>
	
		<td class="style8" style="border-style:solid; border-width:1px; height: 14px" colspan="4" align="center">
		<b><font face="Cambria" size="3"><u><span class="style21">
		Part 3B. </span></u></font></b>
<strong style="text-decoration: underline">
		<font size="3" face="Cambria">Co-Scholastic : H &amp; P.Ed.</font></strong></td>
	</tr>
		
		<td class="style37" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<strong>
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 175px">
		<strong>
		<font size="3">Indicators</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 30px">
		<strong>
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; ">
		<strong>
		<font size="3">Description</font></strong></td>
	</tr>
	<?php
		if(mysql_num_rows($rsHPed) > 0)
		{
			$cnt=1;
			while($row1 = mysql_fetch_row($rsHPed))
			{
				$descriptiveindicator = $row1[0];
				$gradepoint = $row1[1];
				$grade = $row1[2];
				$indicatordescription = $row1[3];
				$subindicator = $row1[4];
			
	?>
	<tr>
		<td class="style32" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<font face="Cambria">&nbsp;<?php echo $cnt;?></font></td>
		<td class="style26" style="border-style:solid; border-width:1px; height: 14px; width: 175px;">
		<font face="Cambria">&nbsp;<?php echo $descriptiveindicator;?></font></td>
		<td class="style32" style="border-style:solid; border-width:1px; height: 14px; width: 30px;">
		<font face="Cambria">&nbsp;<?php echo $grade;?></font></td>
		<td class="style36" style="border-style:solid; border-width:1px; height: 14px">
		<font face="Cambria">&nbsp;<?php echo $indicatordescription;?> </font></td>
	</tr>
	<?php
		}
	}
	?>
	
	</table>
	
	<br>
<table style="width: 90%" align=center class="style30">
	
		<tr>
	
		<td class="style8" style="border-style:solid; border-width:1px; height: 14px" colspan="4" align="center">
		<b><font face="Cambria" size="3"><u><span class="style21">
		Part 3B. </span></u></font></b>
<strong style="text-decoration: underline">
		<font size="3" face="Cambria">Co-Scholastic : Yoga</font></strong></td>
	</tr>
		
		<td class="style37" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<strong>
		<font size="3">S. No.</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 175px">
		<strong>
		<font size="3">Indicators</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; width: 30px">
		<strong>
		<font size="3">Grade</font></strong></td>
		<td class="style3" style="border-style:solid; border-width:1px; height: 14px; ">
		<strong>
		<font size="3">Description</font></strong></td>
	</tr>
	<?php
		if(mysql_num_rows($rsYoga) > 0)
		{
			$cnt=1;
			while($row1 = mysql_fetch_row($rsYoga))
			{
				$descriptiveindicator = $row1[0];
				$gradepoint = $row1[1];
				$grade = $row1[2];
				$indicatordescription = $row1[3];
				$subindicator = $row1[4];
			
	?>
	<tr>
		<td class="style32" style="border-style:solid; border-width:1px; width: 55px; height: 14px">
		<font face="Cambria">&nbsp;<?php echo $cnt;?></font></td>
		<td class="style26" style="border-style:solid; border-width:1px; height: 14px; width: 175px;">
		<font face="Cambria">&nbsp;<?php echo $descriptiveindicator;?></font></td>
		<td class="style32" style="border-style:solid; border-width:1px; height: 14px; width: 30px;">
		<font face="Cambria">&nbsp;<?php echo $grade;?></font></td>
		<td class="style36" style="border-style:solid; border-width:1px; height: 14px">
		<font face="Cambria">&nbsp;<?php echo $indicatordescription;?></font></td>
	</tr>
	<?php
		}
	}
	?>
	
	
	</table>-->
	<table width="90%" align=center cellspacing="0" border=1 cellpadding="0" style="border-collapse: collapse" height="60">
				<tr >
				<td align=left height="37" colspan="3">Overall Grade:_______________________________</td>
			
			</tr>
			</table>

	<table width="90%" align=center cellspacing="0" cellpadding="0" style="border-collapse: collapse" height="154">
				<tr>
				<td height="37" colspan="3">Sepecfic Remarks:_______________________________________________________________________________________________________________________</td>
			
			</tr>
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

</body>

</html>