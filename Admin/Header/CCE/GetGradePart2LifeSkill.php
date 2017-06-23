<?php include '../../connection.php';?>

<?php
	$Point=$_REQUEST["Point"];
	$indicater_type = $_REQUEST["indicater_type"];
	$Class = $_REQUEST["class"];
	
	if($indicater_type=="LifeSkills")
	{
		$indicater_type="Life Skills";
	}
	if ($indicater_type=="AttitudeValues")
	{
		$indicater_type="Attitude Values";
	}
	if ($indicater_type=="HealthAndPhysical")
	{
		$indicater_type="Health and Physical";
	}
	if ($indicater_type=="ScholasticAreas")
	{
		$indicater_type="Scholastic Areas";
	}

	
	
	//$sql = "SELECT `Grade` FROM  `indicator_grade_master` WHERE `class`='$Class' and (" . $Point . " >= `RangeFrom` AND " . $Point . " <= `RangeTo`)";
	$sql = "SELECT `Grade` FROM  `indicator_grade_master` WHERE `class` in (select `MasterClass` from `class_master` where `class`='$Class') and (" . $Point . " >= `RangeFrom` AND " . $Point . " <= `RangeTo`)";
	
	$rs = mysql_query($sql);
	if (mysql_num_rows($rs) > 0)
	{
		while($row = mysql_fetch_row($rs))
		{
			$Grade=$row[0];
			break;
		}
	}
	else
	{
		$Grade="0";
	}
	
	if ($Grade != "0")
	{
		$ssql="SELECT distinct `Description` FROM `GradeDescriptionMapping` a  where `status`='1' and `Grade`='$Grade' and `indicatortype`='$indicater_type' and `class`='$Class'";
		$rs1= mysql_query($ssql);
		$sstrDesc="";
		while($row1 = mysql_fetch_row($rs1))
		{
			$sstrDesc=$sstrDesc . $row1[0] . ",";
		}
		$sstrDesc= substr($sstrDesc,0,strlen($sstrDesc)-1);
	}
	else
	{
		$sstrDesc="";
	}
	
	echo str_replace("﻿","",$Grade) . "," . $sstrDesc;
	exit();
	
?>