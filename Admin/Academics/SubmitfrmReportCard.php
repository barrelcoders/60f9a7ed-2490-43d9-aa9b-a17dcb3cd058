<?php include '../../connection.php';?>

<?php include '../../AppConf.php';?>





<?php



	





	



	//echo $_REQUEST["totalSubject"]-1;



	



	$Class = $_REQUEST["cboClass"];



	$RollNo = $_REQUEST["txtRollNo"];



	$StudentName= $_REQUEST["txtStudentName"];



	$TestType = $_REQUEST["cboTestType"];



	



	$TotalSubject = $_REQUEST["totalSubject"]-1;



	

		

		$Position=$_REQUEST["txtPosition"];



	for ($i=1;$i<=$TotalSubject;$i++)

	{



		$CtrlSubjectName = "txtName" . $i;



		$CtrlMarks = "txtMarks" . $i;



		$CtrlRemarks="txtRemarks" . $i;



		$CtrlMaxMarks="txtMaxMarks" . $i;

		

		$CtrlGrade="txtGrd" . $i;
		
		$CtrlGradePoint="txtGrdPoint" . $i;

		

		$CtrlPosition="txtPosition" . $i;



	



		$SubjectName = $_REQUEST[$CtrlSubjectName];



		$Marks=$_REQUEST[$CtrlMarks];

		

		$MaxMarks=$_REQUEST[$CtrlMaxMarks];

		

		$Remarks=$_REQUEST[$CtrlRemarks];

		

		$Grade=$_REQUEST[$CtrlGrade];

		$GradePoint=$_REQUEST[$CtrlGradePoint];

		



		



		



		/*



		$Dt = $_REQUEST[$CtrlDate];



		$arr=explode('/',$Dt);



		$DtateDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];



		*/



		//$Attendance = $_REQUEST[$CtrlAttendance];



		



		$ssql = "INSERT INTO `report_card` (`sname`,`sclass`,`srollno`,`subject`,`testtype`,`marks`,`MaxMarks`,`remarks`,`Grade`,`GradePoint`,`Position`) values ('$StudentName','$Class ','$RollNo ','$SubjectName','$TestType','$Marks','$MaxMarks','$Remarks','$Grade','$GradePoint','$Position')";



		//echo $ssql . "<br>";

		if ($Marks != "")

		{

			mysql_query($ssql) or die(mysql_error());

		}



	}



	mysql_query("delete from `update_track` where `Activity`='reportcard'") or die(mysql_error());



	mysql_query("insert into `update_track` (`Activity`) values ('reportcard')") or die(mysql_error());







	echo "<br><br><center><b>Report Card have been uploaded successfully";



?>

<html>

<body>

<a href="javascript:history.back(1)">

<img height="30" src="images/BackButton.png" width="70" style="float: right" class="auto-style25"></a>

</body>



</html>