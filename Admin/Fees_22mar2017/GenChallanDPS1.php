<?php
include '../../connection.php';
include '../../AppConf.php';
session_start();
ini_set('max_execution_time', 300);
$rsFy = mysql_query("select `year`,`financialyear` from `FYmaster` where `Status`='Active'", $Con);
while($row = mysql_fetch_row($rsFy))
{
$CurrentFinancialYear=$row[0];
$CurrentFinancialYr=$row[1];
break;
}

$rsSchoolDetail=mysql_query("SELECT distinct `SchoolId` FROM  `SchoolConfig`");
while($rowS=mysql_fetch_row($rsSchoolDetail))
{
	$SchoolID=$rowS[0];
	break;
}
	
	$SelectClass=$_REQUEST["Class"];
	$sadmission=$_REQUEST["sadmission"];
	$sql = "SELECT distinct `sadmission`,`sname`,`sclass`,`srollno`,`sfathername`,`DiscontType`,(SELECT `MasterClass` FROM `class_master` WHERE `class`=a.`sclass`) as `MasterClass`,`DiscontType`,`MotherName`,`Address`,`smobile`,`routeno` FROM `student_master` as `a` where `sclass`='$SelectClass' and `sadmission`='$sadmission' and `sadmission` not in (select distinct `sadmission` from `fees_challan`)";
   
   	$rs = mysql_query($sql, $Con);
   	$currentdate=date("Y-m-d");
   	$currentdate1=date("d-m-Y");
   echo $sql;
   exit();	
?>
