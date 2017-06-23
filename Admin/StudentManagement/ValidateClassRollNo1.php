<?php
include '../../connection.php';
session_start();
?>

<?php
$Class=$_REQUEST["Class"];
$RollNo=$_REQUEST["RollNo"];
$AdmissionNo=$_REQUEST["AdmissionNo"];
$rsMasterClass=mysql_query("Select `MasterClass` from `class_master` where `class`='$Class'");
while($row = mysql_fetch_row($rsMasterClass))
	{
		$MasterClass=$row[0];
							
	}
//$ssql="SELECT * FROM `student_master` where `sclass`='$Class' and `srollno`='$RollNo' and `status`='Active'";
$ssql="SELECT * FROM `student_master` where `sadmission`='$AdmissionNo'";
$rs= mysql_query($ssql);
if (mysql_num_rows($rs) > 0)
{
	echo 'Already Exists';
}
else
{

   $P1=rand(1,9);
	$P2=rand(1,9);
	$P3=rand(1,9);
	$P4=rand(1,9);
	$P5=rand(1,9);
	$Password=$P1.$P2.$P3.$P4.$P5;

	$ssql1="INSERT INTO `student_master` (`sname` , `DOB`,`Sex`,`Category`,`Nationality`,`sadmission` ,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`FeeSubmissionType`,`DiscontType`,`FinancialYear`,`SchoolId`,`MasterClass`,`DateOfAdmission`) select `sname` , `DOB`,`Sex`,'General',`Nationality`,`sadmission` ,'".$Class."','".$RollNo."',`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`ResidentialAddress`,`smobile`,'',`sadmission`,'".$Password."',`email`,'','Quarterly',`DiscountType`,`FinancialYear`,'DPS','$MasterClass',`AdmissionDate` from `NewStudentAdmission` where `sadmission`='$AdmissionNo'";
	mysql_query($ssql1) or die(mysql_error());
	
	$ssql2="INSERT INTO `user_master` (`sname` , `sadmission` ,`sclass`,`srollno`,`sfathername`,`smobile`,`simei`,`suser`,`spassword`,`email`) select `sname` ,`sadmission` ,'".$Class."','".$RollNo."',`sfathername`,`smobile`,'',`sadmission`,'".$Password."',`email` from `NewStudentAdmission` where `sadmission`='$AdmissionNo'";
	mysql_query($ssql2) or die(mysql_error());
	echo "Class and Roll No has been alotted sussessfully!";
}

exit();

?>