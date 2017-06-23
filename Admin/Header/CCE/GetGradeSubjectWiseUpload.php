<?php include '../../connection.php';?>

<?php
	$Point=$_REQUEST["Point"];
	$Subject = $_REQUEST["Subject"];
	$Class = $_REQUEST["class"];
	
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
	
	//echo "SELECT distinct `Description` FROM `reportcard_indicator_GradeDescription_1to5` a  where `status`='1' and `Grade`='$Grade' and `Subject`='$Subject' and `sclass` in (select `MasterClass` from `class_master` where `class`='$Class')";
	//exit();
	if ($Grade != "0")
	{
		
		$rs1= mysql_query("SELECT distinct `Description` FROM `reportcard_indicator_GradeDescription_1to5` a  where `status`='1' and `Grade`='$Grade' and `Subject`='$Subject' and `sclass` in (select `MasterClass` from `class_master` where `class`='$Class')");
		
		
		$sstrDesc="";
		while($row1 = mysql_fetch_row($rs1))
		{		
			$sstrDesc=$sstrDesc . $row1[0] . "~";			
		}
		$sstrDesc= substr($sstrDesc,0,strlen($sstrDesc)-1);
	}
	else
	{
		$sstrDesc="";
	}
	
	echo str_replace("﻿","",$Grade) . "~" . $sstrDesc;
	exit();
	
?>