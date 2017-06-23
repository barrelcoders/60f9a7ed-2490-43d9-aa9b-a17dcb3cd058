<?php include '../../connection.php';?>
<?php
session_start();

$IndicaterType=$_REQUEST["txtIndicaterType"];
$TestType=$_REQUEST["txtTestType"];

//echo "$TestType";

//exit();

//if ($IndicaterType == "Life Skills")
//{
	$TotalRow=$_REQUEST["TotalCnt"];
	$TotalStudentNo=$_REQUEST["hTotalStudentCount"];
	
	for($i=1;$i<=$TotalRow;$i++)
	{

		$CtrlDescIndicator="hDiscriptiveIndicator" . $i;
		$DescriptiveIndicator=$_REQUEST[$CtrlDescIndicator];
		for($cntcol=1;$cntcol<=$TotalStudentNo;$cntcol++)
		{
			$CtrlPoint="txtPoint" . $i . "_" . $cntcol;
			$CtrlGrade="txtGrade" . $i . "_" . $cntcol;
			$CtrlDescription="cboDescription" . $i . "_" . $cntcol;
			$CtrlDescriptionOther="txtDescriptionOther" . $i . "_" . $cntcol;
			
			$Point=$_REQUEST[$CtrlPoint];
			$Grade=$_REQUEST[$CtrlGrade];
			$Description=str_replace("'","&#39;",$_REQUEST[$CtrlDescription]);
			$DescriptionOther=str_replace("'","&#39;",$_REQUEST[$CtrlDescriptionOther]);
			
			$sadmission=$_REQUEST["hsadmission".$cntcol];
			$sname=$_REQUEST["hstudentname".$cntcol];
			$sclass=$_REQUEST["hstudentclass".$cntcol];
			$srollno=$_REQUEST["hstudentrollno".$cntcol];
			
			$rsChk=mysql_query("select * from `reportcard_interim` where `sadmission`='$sadmission' and `indicatortype`='$IndicaterType' and `descriptiveindicator`='$DescriptiveIndicator' and `TestType`='$TestType'");
			if (mysql_num_rows($rsChk) > 0)
			{
				$ssql="update `reportcard_interim` set `indicatordescription`='$Description',`gradepoint`='$Point',`grade`='$Grade' where `sadmission`='$sadmission' and `indicatortype`='$IndicaterType' and `descriptiveindicator`='$DescriptiveIndicator'";
				mysql_query($ssql) or die(mysql_error());
			}
			else
			{			
				$ssql="INSERT INTO `reportcard_interim` (`sadmission`,`sname`,`sclass`,`srollno`,`TestType`,`indicatortype`,`descriptiveindicator`,`indicatordescription`,`gradepoint`,`grade`) VALUES ('$sadmission','$sname','$sclass','$srollno','$TestType','$IndicaterType','$DescriptiveIndicator','$Description','$Point','$Grade')";
				mysql_query($ssql) or die(mysql_error());
			}
		}
	}
//}

//exit();
echo "<br><br><center><b>Records inserted successfully!<br> Please click <a href='frmBulkIndicatorUpload.php'>here</a> to go back";

/*
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
*/

?>