<?php
include '../../connection.php';
	$AdmissionId=$_REQUEST["AdmissionId"];
	
   $sql = "SELECT distinct `sname`,`sclass`,`srollno`,`sfathername` FROM `student_master` where `sadmission`='$AdmissionId'";
   $result = mysql_query($sql, $Con);
				while($row = mysql_fetch_row($result))
				{
   					$StudentName=$row[0];
   					$Class=$row[1];
   					$RollNo=$row[2];
   					$FatherName=$row[3];
				}
				$sstr=$StudentName.",".$Class.",".$RollNo.",".$FatherName;
				//echo $sstr;
				echo $sstr;
?>