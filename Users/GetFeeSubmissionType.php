<?php include '../../connection.php';?>

<?php

$sadmission=$_REQUEST["addmissionid"];

$ssql="SELECT distinct `FeeSubmissionType` FROM `student_master` where `sadmission`='$sadmission'";
$rs= mysql_query($ssql);

	if (mysql_num_rows($rs) > 0)
	{
		while($row = mysql_fetch_row($rs))
		{
			$FeeSubmissionType = $row[0];
		}
		
		if ($FeeSubmissionType == "Quarterly")
		{
			echo "1";
		}
		else
		{
			echo "0";	
		}
	}
	else
	{
		echo "100";
	}
?>