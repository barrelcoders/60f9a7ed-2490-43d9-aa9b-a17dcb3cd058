<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
?>
<?php
$AdmissionNo = $_REQUEST["txtAdmissionNo"];
$Name = $_REQUEST["txtName"];
$Class = $_REQUEST["txtClass"];
$RollNo = $_REQUEST["txtRollNo"];
$ChkLibrary = $_REQUEST["LibraryClearance"];
$ChkAccount = $_REQUEST["AccountClearance"];
$ChkAcademic = $_REQUEST["AcademicClearance"];
$ChkTransport = $_REQUEST["TransportClearance"];
$OtherClearance= $_REQUEST["txtOtherClearance"];
	$sql="select * from `fnfdetails` where `sadmission`='$AdmissionNo'";
	$rs = mysql_query($sql);

		if (mysql_num_rows($rs) > 0)
		{
			//echo "<br><br><center><b>FNF for this user:" . $Name . " already done!";
			//exit();
			$ssql="UPDATE `fnfdetails` SET  `LibraryClearance`='$ChkLibrary',`AccountClearance`='$ChkAccount',`AcademicClearance`='$ChkAcademic',`TransportClearance`='$ChkTransport',`OtherClearance`='$OtherClearance' WHERE `sadmission`='$AdmissionNo'";
			mysql_query($ssql) or die(mysql_error());
			echo "<br><br><center><b>FNF details have been updated successfully!";
		}
		else
		{
			$ssql="INSERT INTO `fnfdetails` (`sadmission`,`sname`,`sclass`,`srollno`,`LibraryClearance`,`AccountClearance`,`AcademicClearance`,`TransportClearance`,`OtherClearance`,`FinalStatus`) VALUES ('$AdmissionNo','$Name','$Class','$RollNo','$ChkLibrary','$ChkAccount','$ChkAcademic','$ChkTransport','$OtherClearance','1')";
			
			mysql_query($ssql) or die(mysql_error());
			echo "<br><br><center><b>FNF has been submitted successfully!";
		}

//$ssql="INSERT INTO `Almuni` (`sname`,`DOB`,`Sex`,`Category`,`Nationality`,`sadmission`,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`GCMAccountId`,`status`,`FinancialYear`) SELECT `sname`,`DOB`,`Sex`,`Category`,`Nationality`,`sadmission`,`sclass`,`srollno`,`LastSchool`,`sfathername`,`FatherEducation`,`FatherOccupation`,`MotherName`,`MotherEducation`,`Address`,`smobile`,`simei`,`suser`,`spassword`,`email`,`routeno`,`GCMAccountId`,`status`,`FinancialYear` FROM `student_master` WHERE `sadmission`='$AdmissionNo'";
//mysql_query($ssql) or die(mysql_error());

exit();
?>