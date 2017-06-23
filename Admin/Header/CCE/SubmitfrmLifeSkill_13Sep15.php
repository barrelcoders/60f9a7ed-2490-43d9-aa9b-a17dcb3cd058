<?php include '../../connection.php';?>
<?php
session_start();

$AdmissionId=$_SESSION['sadmission'];
$StudentName=str_replace("ï»¿ï»¿","",$_SESSION['Name']);
$Class=$_SESSION['Class'];
$RollNo=$_SESSION['RollNo'];

$TotalControl=$_REQUEST["TotalCnt"];
$IndicaterType=$_REQUEST["txtIndicaterType"];
if ($IndicaterType=="Self Awareness")
{
	for($i=1;$i<=$TotalControl;$i++)
	{
		$ctrlDescriptiveIndicater="txtDescriptiveIndicater" . $i;
		$ctrlDescription="txtDescription" . $i;
		
		$DescriptiveIndicater=$_REQUEST[$ctrlDescriptiveIndicater];
		$Description=$_REQUEST[$ctrlDescription];
		
			$ssql="INSERT INTO `reportcard_interim` (`sadmission`,`sname`,`sclass`,`srollno`,`indicatortype` ,`descriptiveindicator`,`indicatordescription`) VALUES ('$AdmissionId','$StudentName','$Class','$RollNo','$IndicaterType','$DescriptiveIndicater','$Description')";
			mysql_query($ssql) or die(mysql_error());
	}
	//echo "<br><br><center><b>Records inserted successfully!";
	//exit();
}
for($i=1;$i<=$TotalControl;$i++)
{
	$ctrlDescriptiveIndicater="txtDescriptiveIndicater" . $i;
	$ctrlDescriptionOther="txtDescriptionOther" . $i;
	
	if ($IndicaterType=="Co-Scholastic Activities" || $IndicaterType=="Scholastic Areas")
	{
		$ctrlSuggestiveActivities="cboSuggestiveActivities" . $i;
		$SuggestiveActivities=$_REQUEST[$ctrlSuggestiveActivities];
	}
	else
	{
		$SuggestiveActivities="";
	}
	
	$DescriptiveIndicater=$_REQUEST[$ctrlDescriptiveIndicater];
	$DescriptionOther=$_REQUEST["$ctrlDescriptionOther"];
	
	$ctrlPoint="txtPoint" . $i;
	$Point=$_REQUEST[$ctrlPoint];
	
	$ctrlGrade="txtGrade" . $i;
	$Grade=$_REQUEST[$ctrlGrade];
	
	
		$Description="cboDescription" . $i;
		$Description=$_REQUEST[$Description];
		
	if($Description=="Type your own")
	{
		$Description=$DescriptionOther;
	}
	
	if($Point != "")
	{
		$ssql="INSERT INTO `reportcard_interim` (`sadmission`,`sname`,`sclass`,`srollno`,`indicatortype` , `descriptiveindicator`,`subindicator`, `gradepoint`, `grade`, `indicatordescription`) VALUES ('$AdmissionId','$StudentName','$Class','$RollNo','$IndicaterType','$DescriptiveIndicater','$SuggestiveActivities','$Point','$Grade','$Description')";
		mysql_query($ssql) or die(mysql_error());
	}
}

if ($IndicaterType == "Scholastic Areas")
{
	$NextPage="frmPart2ALifeSkill.php";
}
elseif ($IndicaterType == "Life Skills")
{
	$NextPage="frmPart2DAttitudeAndValues.php";
}
elseif ($IndicaterType == "Attitude Values")
{
	$NextPage="frmPart3ACoScholasticActivities.php";
}
elseif ($IndicaterType == "Co-Scholastic Activities")
{
	$NextPage="frmPart3BHealthAndPhysical.php";
}
elseif ($IndicaterType == "Health and Physical")
{
	$NextPage="frmSelfAwareness.php";
}
elseif ($IndicaterType == "Self Awareness")
{
	$NextPage="frmFetchStudentDetail.php";
}


echo "<br><br><center><b>Records inserted successfully!<br> Please click <a href='" . $NextPage . "'>here</a> to go to next step";
?>