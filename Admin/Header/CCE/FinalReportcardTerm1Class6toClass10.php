<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
session_start();
/*
$AdmissionId = $_REQUEST["txtAdmissionId"];
$StudentName = $_REQUEST["txtStudentName"];
$Class = $_REQUEST["cboClass"];
$RollNo = $_REQUEST["txtRollNo"];
*/

$Class = $_REQUEST["Class"];
$currentdate=date("d-m-Y");
$rsStudent= mysql_query("select `sadmission` from `student_master` where `sclass`='$Class'");
while($row1 = mysql_fetch_row($rsStudent))
{
$AdmissionId=$row1[0];

	$rsStudentDetail= mysql_query("select DATE_FORMAT(`DOB`,'%d-%m-%Y') as `DOB`,`Address`,`Sex`,`sfathername`,`smobile`,`MotherName`,`email`,`sname`,`sclass`,`srollno` from `student_master` where `sadmission`='$AdmissionId'");
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
	
	$sql = "select x.* from (SELECT distinct a.`subject`,(select `Priority` from `reportcard_subject_priority` where `subject`=a.`subject`) as `Priority` FROM `report_card` as `a` WHERE `testtype`='SA1' and `sadmission`= '$AdmissionId') as `x` order by `Priority`";
	$rsSubject = mysql_query($sql);
	
	
	
	
?>
<?php
$strOneStudent='
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
	text-align: Center;
	border: 1px solid #000000;
}
.style41 {
	font-family: Arial;
	font-size: 11pt;
	text-align: Left;
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
		
		<font style="font-size: 10pt">
		
		<img src= "../images/HCPS Logo.jpg" width="130" height="85"><br>&nbsp;&nbsp;<b><font face="Cambria">Estd. 1979</font></b></font><td align=center width="85%">
		<font face="Cambria" style="font-size:50px">'.$SchoolName.'<b>'.$AffiliationNo.'</b></font><font style="font-size: 13pt"><br>
		</font><font face="Cambria" style="font-size: 12pt">'.$SchoolAffiliation1.'</font><br><font face="Cambria" style="font-size: 10pt">'.$SchoolAddress.'</font><br><font face="Cambria" style="font-size: 10pt">'.$Website.'</font></td></tr>
		<tr><td colspan=2>&nbsp;</td></tr>
		<tr><td colspan=2 align=center ><font face="Cambria" size="4"><b>Achievement Record</b></td></tr>	

	<tr>
		<td colspan=2>
		<p align="center"><b><font face="Cambria" style="font-size: 11pt">Evaluation-I (APRIL TO SEPTEMBER 2015)</font><br><br></b></td></tr>
		
	<table border="1" width="90%" cellspacing="0" cellpadding="0" align=center style="border-collapse: collapse; ">
		<tr>
			<td width="723" style="border-left:1px solid #000000; border-top:1px solid #000000; border-right-style: solid; border-right-width: 1px; border-bottom-style:solid; border-bottom-width:1px" colspan="4">
			<p align="center"><font face="Cambria"><b>Student Profile</b></font></td>
		</tr>
		<tr>
			<td width="127" style="border-left:1px solid #000000; border-top:1px solid #000000; border-right-style: solid; border-right-width: 1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Name</font></td>
			<td width="222" style="border-top:1px solid #000000; border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria">&nbsp;'.$sname.'</font></td>
			<td width="139" style="border-top:1px solid #000000; border-left-style: solid; border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Class</font></td>
			<td width="235" style="border-right:1px solid #000000; border-top:1px solid #000000; border-left-style: solid; border-left-width: 1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria">&nbsp;'.$sclass.' &nbsp; </font></td>
		</tr>
		<tr>
			<td width="127" style="border-left:1px solid #000000; border-right-style: solid; border-right-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Admission No.</font></td>
			<td width="222" style="border-style:solid; border-width:1px; ">
			<font face="Cambria">&nbsp;'.$AdmissionId.'</font></td>
			<td width="139" style="border-style:solid; border-width:1px; ">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Roll No</font></td>
			<td width="235" style="border-right:1px solid #000000; border-left-style: solid; border-left-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria">&nbsp;'.$srollno.' &nbsp; </font></td>
		</tr>
		<tr>
			<td width="127" style="border-left:1px solid #000000; border-right-style: solid; border-right-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Father&#39;s Name</font></td>
			<td width="222" style="border-style:solid; border-width:1px; ">
			<font face="Cambria">&nbsp;'.$sfathername.'</font></td>
			<td width="139" style="border-style:solid; border-width:1px; ">
			<font face="Cambria" style="font-size: 11pt">&nbsp;Mother&#39;s Name</font></td>
			<td width="235" style="border-right:1px solid #000000; border-left-style: solid; border-left-width: 1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
			<font face="Cambria">&nbsp;'.$MotherName.'</font></td>
		</tr>
		<tr>
			<td width="293"><font face="Cambria" style="font-size: 11pt">&nbsp;Date of Birth</font></td>
			<td width="293"><font face="Cambria" style="font-size: 11pt">&nbsp;'; 
if($DOB =="00-00-0000")
{
	$DOB="";  
}
$strOneStudent=$strOneStudent.$DOB.'</font></td>
			<td width="293"><font face="Cambria" style="font-size: 11pt">&nbsp;Mobile No</font></td>
			<td width="293"><font face="Cambria" style="font-size: 11pt">&nbsp;'.$smobile.' </font></td>
		</tr>

		</table>
</div>
<div align="center">
	<br>
		</div>
<div align="center">
	<!--<table width="90%" cellspacing="0" cellpadding="0" align=center class="style35">
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
		</table>-->
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
	</tr>';
		if(mysql_num_rows($rsSubject) > 0)
		{

			$cnt=1;
			

			while($rowSu = mysql_fetch_row($rsSubject))
			{
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
				$FA1_UT=0;
				$FA1_A1=0;
				$FA1_A2=0;
				$FA1_A3=0;
				$FA1_OTBA=0;
				$FA1_ASL=0;
				$FA2_UT=0;
				$FA2_A1=0;
				$FA2_A2=0;
				$FA2_A3=0;
				$FA2_OTBA=0;
				$FA2_ASL=0;
				$SA1_UT=0;
				$SA1_A1=0;
				$SA1_A2=0;
				$SA1_A3=0;
				$SA1_OTBA=0;
				$SA1_ASL=0;
				$SumFA1=0;
				$SumFA2=0;
				$SumSA1=0;
				$subject = $rowSu[0];
				if($subject=="social studies")
				{
					$ShowSubject="Social Studies";
				}
				elseif($subject=="Information Technologies (IT)")
				{
					$ShowSubject="Information Technology (IT)";
				}
				else
				{
					$ShowSubject=$subject;
				}
				$FA1Grade="";
				$FA2Grade="";
				$SA1Grade="";
				$Term1Grade="";
				
				$sql = "SELECT distinct `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`marks`,UT,A1,A2,A3,OTBA,ASL FROM `report_card` WHERE `testtype`='FA1' and `sadmission`= '$AdmissionId' and `subject`='$subject'";
				
				$rsFA1 = mysql_query($sql);
				while($rowF = mysql_fetch_row($rsFA1))
				{
					$FA1MaxMarks=$rowF[2];
					//$FA1Grade = $rowF[3];
					$FA1ObtainedMarks=$rowF[5];
					$FA1_UT=$rowF[6];
					$FA1_A1=$rowF[7];
					$FA1_A2=$rowF[8];
					$FA1_A3=$rowF[9];
					$FA1_OTBA=$rowF[10];
					$FA1_ASL=$rowF[11];
					break;
				}
				
				$SumFA1=number_format(($FA1_UT+$FA1_A1+$FA1_A2+$FA1_A3)/3,1);
				$ssql="SELECT `Grade`,`GradePoints` FROM `grade_master` WHERE `MaxMarks`=" . $FA1MaxMarks . " and " . $SumFA1 . " >= `RangeFrom` and " . $SumFA1 . "<=`RangeTo`";
				
				$rs= mysql_query($ssql);
				while($row = mysql_fetch_row($rs))
				{
					$FA1Grade= $row[0];
					//$FA1Grade= $row[0]."-(".($FA1_UT+$FA1_A1+$FA1_A2+$FA1_A3)."/3)"."/".$FA1MaxMarks;
					$FA1GradePoint = $row[1];
				}

				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`marks`,`UT`,`A1`,`A2`,`A3`,`OTBA`,`ASL` FROM `report_card` WHERE `testtype`='FA2' and `sadmission`= '$AdmissionId' and `subject`='$subject'";	
				$rsFA2 = mysql_query($sql);
				
				while($row1 = mysql_fetch_row($rsFA2))
				{
					//$FA2Grade = $row1[3];
					$FA2MaxMarks=$row1[2];
					$FA2ObtainedMarks=$row1[5];
					$FA2_UT=$row1[6];
					$FA2_A1=$row1[7];
					$FA2_A2=$row1[8];
					$FA2_A3=$row1[9];
					$FA2_OTBA=$row1[10];
					$FA2_ASL=$row1[11];
					break;
				}
				
				$SumFA2=number_format(($FA2_UT+$FA2_A1+$FA2_A2+$FA2_A3)/3,1);
				$ssql="SELECT `Grade`,`GradePoints` FROM `grade_master` WHERE `MaxMarks`=" . $FA2MaxMarks . " and " . $SumFA2 . " >= `RangeFrom` and " . $SumFA2 . "<=`RangeTo`";
				//echo $ssql."<br>";

				$rs= mysql_query($ssql);
				while($row = mysql_fetch_row($rs))
				{
					$FA2Grade= $row[0];
					//$FA2Grade= $row[0]."-(".($FA2_UT+$FA2_A1+$FA2_A2+$FA2_A3)."/3)/".$FA2MaxMarks;
					$FA2GradePoint = $row[1];
				}
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`marks` FROM `report_card` WHERE `testtype`='FA3' and `sadmission`= '$AdmissionId' and `subject`='$subject'";	
				$rsFA3 = mysql_query($sql);
				
				while($row2 = mysql_fetch_row($rsFA3))
				{
					$FA3Grade = $row2[3];
					$FA3MaxMarks=$row2[2];
					$FA3ObtainedMarks=$row2[5];
				}
				
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`MarksObtained` FROM `report_card` WHERE `testtype`='FA4' and `sadmission`= '$AdmissionId' and `subject`='$subject'";	
				$rsFA4 = mysql_query($sql);
				
				while($row3 = mysql_fetch_row($rsFA4))
				{
					$FA4Grade = $row3[3];
					$FA4MaxMarks=$row3[2];
					$FA4ObtainedMarks=$row3[5];
				}
				
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`marks`,`UT`,`A1`,`A2`,`A3`,`OTBA`,`ASL` FROM `report_card` WHERE `testtype`='SA1' and `sadmission`= '$AdmissionId' and `subject`='$subject'";	
				//echo $sql."<br>";
				//exit();
				$rsSA1 = mysql_query($sql);
				
				
				
				while($row4 = mysql_fetch_row($rsSA1))
				{
					//$SA1Grade = $row4[3];
					if($subject=="Information Technologies (IT)")
					{
					$SA1MaxMarks=$row4[2];
					}
					else
					{
						$SA1MaxMarks=$row4[2]/3;
					}
					$SA1ObtainedMarks=$row4[5];
					$SA1_UT=$row4[6];
					$SA1_A1=$row4[7];
					$SA1_A2=$row4[8];
					$SA1_A3=$row4[9];
					$SA1_OTBA=$row4[10];
					$SA1_ASL=$row4[11];
					break;
				}
				
				
				if($subject=="Information Technologies (IT)")
				{
				$SumSA1=number_format(($SA1_UT+$SA1_A1+$SA1_A2+$SA1_ASL),1);
				}
				else
				{
				$SumSA1=number_format(($SA1_UT+$SA1_A1+$SA1_A2+$SA1_ASL)/3,1);
				}
				$ssql="SELECT `Grade`,`GradePoints` FROM `grade_master` WHERE `MaxMarks`=" . $SA1MaxMarks . " and " . $SumSA1 . " >= `RangeFrom` and " . $SumSA1 . "<=`RangeTo`";
				//echo $ssql."<br>";
				//exit();
				$rs= mysql_query($ssql);
				while($row = mysql_fetch_row($rs))
				{
					//$SA1Grade= $row[0];
					if($subject=="Information Technologies (IT)")
					{
					$SA1Grade= $row[0];
					//$SA1Grade= $row[0]."-(".($SA1_UT+$SA1_A1+$SA1_A2+$SA1_ASL).")/".$SA1MaxMarks;
					}
					else
					{
					$SA1Grade= $row[0];
					//$SA1Grade= $row[0]."-(".($SA1_UT+$SA1_A1+$SA1_A2+$SA1_ASL)."/3)/".$SA1MaxMarks;
					}
					$SA1GradePoint = $row[1];
				}

				
				
				$sql = "SELECT `subject`,`testtype`,`MaxMarks`,`Grade`,`GradePoint`,`MarksObtained` FROM `report_card` WHERE `testtype`='SA2' and `sadmission`= '$AdmissionId' and `subject`='$subject'";	
				$rsSA2 = mysql_query($sql);
				
								
				while($row5 = mysql_fetch_row($rsSA2))
				{
					$SA2Grade = $row5[3];
					$SA2MaxMarks=$row5[2];
					$SA2ObtainedMarks=$row5[5];
				}
				
				

				$Term1TotalMaxMarks=$FA1MaxMarks+$FA2MaxMarks+$SA1MaxMarks;
				$Term1TotalObtainedMarks=number_format($SumFA1+$SumFA2+$SumSA1,1);
				$PercentTerm1=($Term1TotalObtainedMarks/$Term1TotalMaxMarks)*100;
				
		
				
				$GrandTotalMaxMarks=$Term1TotalMaxMarks+$Term2TotalMaxMarks;
				$GrandTotalObtainedMarks=$Term1TotalObtainedMarks+$Term2TotalObtainedMarks;
				$GrandPercent=($GrandTotalObtainedMarks/$GrandTotalMaxMarks)*100;
				
				
				if($subject=="Information Technologies (IT)")
				{
					//echo $SumFA1."/".$SumFA2."/".$SumSA1;
					//echo $Term1TotalObtainedMarks;
					//echo "select `Grade` from `grade_master` where `MaxMarks`='50' and ".$Term1TotalObtainedMarks.">=`RangeFrom` and ".$Term1TotalObtainedMarks."<=`RangeTo`";
					//exit();
					$rsTerm1Grade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='100' and ".$Term1TotalObtainedMarks.">=`RangeFrom` and ".$Term1TotalObtainedMarks."<=`RangeTo`");
				}
				else
				{
					$rsTerm1Grade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='50' and ".$Term1TotalObtainedMarks.">=`RangeFrom` and ".$Term1TotalObtainedMarks."<=`RangeTo`");
				}
				
				while($rowTerm1Grade = mysql_fetch_row($rsTerm1Grade))
  				{
  					$Term1Grade=$rowTerm1Grade[0];
  					//$Term1Grade="(".$Term1TotalObtainedMarks."/".$Term1TotalMaxMarks.")".$rowTerm1Grade[0];
  					break;
  				}
  				
  				
  				$rsCompleteGrade=mysql_query("select `Grade` from `grade_master` where `MaxMarks`='100' and ".$GrandPercent.">=`RangeFrom` and ".$GrandPercent."<=`RangeTo`");
				while($rowCompleteGrade = mysql_fetch_array($rsCompleteGrade))
  				{
  					$FinalGrade=$rowCompleteGrade[0];
  					break;
  				}
			
$strOneStudent=$strOneStudent.'

	<tr>
		<td class="style4" style="border-style:solid; border-width:1px; width: 70px; ">
		<font face="Cambria">&nbsp;'.$cnt.'</font></td>
		<td class="style41" style="border-style:solid; border-width:1px; width: 209px; ">
		<font face="Cambria">&nbsp;'.$ShowSubject.'</font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 209px">		
		<font face="Cambria">&nbsp;'.$FA1Grade.'</font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 209px; ">
		<font face="Cambria">&nbsp;'.$FA2Grade.'</font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 209px; ">
		<font face="Cambria">&nbsp;'.$SA1Grade.'</font></td>
		<td class="style4" style="border-style:solid; border-width:1px; width: 209px;">&nbsp;'.$Term1Grade.'</td>		
	</tr>';
	$cnt=$cnt+1;
	}//End of While loop for FA1 Subject
	}//End of If Condition check FA1 data exists or not
	
$strOneStudent=$strOneStudent.'
	</table>
<font face="Cambria"><br></font>
	<table width="90%" align=Center cellspacing="0" border=1 cellpadding="0" style="border-collapse: collapse" height="60">
				<tr >
				<td align=left colspan="3"><font face="Cambria">Overall Grade:_______________________________</td>
			
			</tr>
			</table>
		
			<br>
			<table width="90%" align=Center cellspacing="0" cellpadding="0" style="border-collapse: collapse" height="60">
				<tr >
				<td align=left colspan="3"><font face="Cambria">&nbsp;&nbsp;Specific Remarks:<br>
				__________________________________________________________________________________________________________ <br><br>
				__________________________________________________________________________________________________________<br><br>
				__________________________________________________________________________________________________________
				
				<!--<hr style="color: #000000; height: 1px;"><br><hr style="color: #000000; height: 1px;"><br><hr style="color: #000000; height: 1px;">--></td>
			</tr>			
			</table>
	
	<table width="80%" align=center cellspacing="0" cellpadding="0" style="border-collapse: collapse" height="100">
			<br>
				
			<tr>
				<td height="20" width="640" colspan="2">
				<font face="Cambria" style="font-weight: 700; font-size:11pt">
				Class Teacher</font></td>
				<td height="20">
				<p align="right">
				<font face="Cambria" style="font-weight: 700; font-size:11pt">
				Principal</font></td>
			</tr>
			
			
			</table>

</body>

</html><p style="page-break-before: always">';
echo $strOneStudent;
}//End of Class wiste Student rsStudent While Loop
?>