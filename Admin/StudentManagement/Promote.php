<?php
session_start();
include '../../connection.php'; ?>
<?php
$CurrentClass=$_REQUEST["CurrentClass"];
$CurrentMasterClass=$_REQUEST["CurrentMasterClass"];
$Allottedsclass=$_REQUEST["Allottedsclass"];
$AllottedMasterClass=$_REQUEST["AllottedMasterClass"];

$rsChk=mysql_query("select `class`,`MasterClass` from `class_master` where `class`='$Allottedsclass' and `MasterClass`='$AllottedMasterClass'");
if(mysql_num_rows($rsChk)==0)
{
	echo "<br><br><center><b>Allotted Class:".$Allottedsclass." and Allotted Master Class:".$AllottedMasterClass." Not Found!";
	exit();
}


$rsStudent=mysql_query("select `sadmission` from `student_master` where `sclass`='$CurrentClass'");
while($row=mysql_fetch_row($rsStudent))
{
	$sadmission=$row[0];
	$ssql="update `student_master` set `sclass`='$Allottedsclass',`MasterClass`='$AllottedMasterClass',`previous_sclass`='$CurrentClass',`previous_MasterClass`='$CurrentMasterClass' where `sadmission`='$sadmission'";
	$ssql1="UPDATE `user_master` SET `sclass`='$AllottedMasterClass',`previous_sclass`='$CurrentClass' where `sadmission`='$sadmission'";
	//echo $ssql."<br>".$ssql1;
	mysql_query($ssql) or die(mysql_error());
	mysql_query($ssql1) or die(mysql_error());
}
echo '<br><br><center><b>Student promoted sussessfully!';
exit();

?>