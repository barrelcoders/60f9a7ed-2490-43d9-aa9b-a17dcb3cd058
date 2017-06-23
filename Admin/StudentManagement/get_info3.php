<?php
session_start();
include '../../connection.php';
?>
<?php

if(isset($_REQUEST['c']))
{
	//$sql="SELECT `sadmission`,`sname`,`sclass`,`srollno`,`sfathername`,`MotherName`,(select `CGPASem1` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `CGPASem1`,(select `CGPASem2` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `CGPASem2`,(select `CGPASem3` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `CGPASem3`,(select `ConceptWorkHabits` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `ConceptWorkHabits`,(select `AttitudeBehaviour` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `AttitudeBehaviour`,(select `ExtraCurricular` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `ExtraCurricular`,(select `SpecialTalent` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `SpecialTalent`,(select `LongLeaveReason` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `LongLeaveReason`,(select `SpecialIncident` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `SpecialIncident` FROM student_master as `a` WHERE `sadmission`='".$_REQUEST['c']."'";
	$sql="SELECT `sadmission`,`sname`,`sclass`,`srollno`,`sfathername`,`MotherName`,(select `CGPASem1` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `CGPASem1`,(select `CGPASem2` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `CGPASem2`,'' as `CGPASem3`,(select `ConceptWorkHabits` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `ConceptWorkHabits`,(select `AttitudeBehaviour` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `AttitudeBehaviour`,(select `ExtraCurricular` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `ExtraCurricular`,(select `SpecialTalent` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `SpecialTalent`,(select `LongLeaveReason` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `LongLeaveReason`,(select `SpecialIncident` from `StudentDossier` where `sadmisson`=a.`sadmission`) as `SpecialIncident` FROM student_master as `a` WHERE `sadmission`='".$_REQUEST['c']."'";
	$select=mysql_query($sql);
	$fetch=mysql_fetch_array($select);
	//echo $fetch['sname'].",".$fetch['sclass'].",".$fetch['srollno'].",".$fetch['sfathername'].",".$fetch['MotherName'];
	echo $fetch['sname']."~".$fetch['sclass']."~".$fetch['srollno']."~".$fetch['sfathername']."~".$fetch['MotherName']."~".$fetch['CGPASem1']."~".$fetch['CGPASem2']	."~".$fetch['CGPASem3']."~".$fetch['ConceptWorkHabits']."~".$fetch['AttitudeBehaviour']."~".$fetch['ExtraCurricular']."~".$fetch['SpecialTalent']."~".$fetch['LongLeaveReason']."~".$fetch['SpecialIncident'];
	
	
	
}
if(isset($_REQUEST['adm']))
{
	$sql1="SELECT * FROM user_master WHERE sadmission='".$_REQUEST['adm']."'";
	$select1=mysql_query($sql1);
	$fetch1=mysql_fetch_array($select1);
	echo $fetch1['srollno'];
	
}
if(isset($_REQUEST['clas']))
{
	$sql="SELECT * FROM user_master WHERE sadmission='".$_REQUEST['clas']."'";
	$select=mysql_query($sql);
	$fetch=mysql_fetch_array($select);
	echo $fetch['sclass'];

}
if(isset($_REQUEST['sfather']))
{
	$sql="SELECT * FROM student_master WHERE sadmission='".$_REQUEST['sfather']."'";
	$select=mysql_query($sql);
	$fetch=mysql_fetch_array($select);
	echo $fetch['sfathername'];

}
if(isset($_REQUEST['smother']))
{
	$sql="SELECT * FROM student_master WHERE sadmission='".$_REQUEST['smother']."'";
	$select=mysql_query($sql);
	$fetch=mysql_fetch_array($select);
	echo $fetch['MotherName'];

}

?>




