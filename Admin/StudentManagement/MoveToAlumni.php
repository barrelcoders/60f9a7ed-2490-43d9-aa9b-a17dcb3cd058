<?php session_start();?>
<?php include '../../connection.php';?>
<?php
if ($_REQUEST["srno"] != "")
{
	$SelectedSrNo=$_REQUEST["srno"];
	$SelectedAdmissionNo=$_REQUEST["sadmission"];
	$ssql="insert into `Almuni` (`sname`,`DOB`,`Sex`,`Category`,`Nationality`,`sadmission`,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`GCMAccountId`,`status`,`FinancialYear`,`DateOfAdmission`) select `sname`,`DOB`,`Sex`,`Category`,`Nationality`,`sadmission`,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`GCMAccountId`,`status`,`FinancialYear`,`DateOfAdmission` from `student_master` where `srno`='$SelectedSrNo'";
	mysql_query($ssql) or die(mysql_error());
	
	$ssql="delete from `student_master` where `srno`=$SelectedSrNo";
	mysql_query($ssql) or die(mysql_error());
	
	$ssql="insert into `Almuni_user_master` (`sname`,`sadmission`,`sclass`,`srollno`,`sfathername`,`smobile`,`simei`,`suser`,`spassword`,`email`,`GCMAccountId`,`status`,`FinancialYear`) select `sname`,`sadmission`,`sclass`,`srollno`,`sfathername`,`smobile`,`simei`,`suser`,`spassword`,`email`,`GCMAccountId`,`status`,`FinancialYear` from `user_master` where `sadmission`='$SelectedAdmissionNo'";
	mysql_query($ssql) or die(mysql_error());
	
	$ssql="delete from `user_master` where `sadmission`='$SelectedAdmissionNo'";
	mysql_query($ssql) or die(mysql_error());
	
	echo "<br><br><center>Student is successfully moved to Alumni!<br>Click <a href='Javascript:window.close();'>here</a> to close this window";
}
?>