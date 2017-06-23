<?php
session_start();
include '../../connection.php'; 
?>
<?php
$InquiryFormNo=$_REQUEST["txtInquiryFormNo"];
$StudentName=$_REQUEST["txtStudentName"];
$FatherName=$_REQUEST["txtFatherName"];
$ContactNo=$_REQUEST["txtContactNo"];
$EmailId=$_REQUEST["txtEmailId"];
$Class=$_REQUEST["cboClass"];
$SchoolId=$_REQUEST["cboSchool"];

	$Dt = $_REQUEST["txtDOB"];
	$arr=explode('/',$Dt);
$DOB = $arr[2] . "-" . $arr[0] . "-" . $arr[1];	
$Address=$_REQUEST["txtAddress"];


	$sql = "UPDATE `InquiryDetail` SET `Name`='$StudentName' ,`FatherName`='$FatherName',`DateOfBirth`='$DOB',`EmailId`='$EmailId',`sclass`='$Class',`smobile`='$ContactNo',`Address`='$Address',`SchoolId`='$SchoolId' WHERE `InquiryFormNo`='$InquiryFormNo'";
	
	mysql_query($sql) or die(mysql_error());
	echo "<br><br><center><b>Inquiry details have been updated successfully!<br>Click <a href='Javascript:window.close();'>here to close window!";
exit();
?>