<?php session_start();?>
<?php include '../../connection.php';?>
<?php
if ($_REQUEST["srno"] != "")
{
	$SelectedSrNo=$_REQUEST["srno"];
	$ssql="insert into `student_master` (`sname`,`DOB`,`Sex`,`Category`,`Nationality`,`sadmission`,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`GCMAccountId`,`status`,`FinancialYear`,`SchoolId`,`DateOfAdmission`) select `sname`,`DOB`,`Sex`,`Category`,`Nationality`,`sadmission`,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`GCMAccountId`,`status`,`FinancialYear`,`SchoolId`,`DateOfAdmission` from `Almuni` where `srno`=$SelectedSrNo";
	mysql_query($ssql) or die(mysql_error());
	
	$ssql="delete from `Almuni` where `srno`=$SelectedSrNo";
	mysql_query($ssql) or die(mysql_error());
	
	echo "<br><br><center>Student is successfully moved to Alumni!<br>Click <a href='Javascript:window.close();'>here</a> to close this window";
}
?>