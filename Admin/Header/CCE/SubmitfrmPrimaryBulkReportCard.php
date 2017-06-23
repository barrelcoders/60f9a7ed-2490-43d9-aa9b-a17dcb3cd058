<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<?php

	//echo $_REQUEST["totalSubject"]-1;

	$Class = $_REQUEST["txtSelectedClass"];
	$SubjectName= $_REQUEST["txtSelectedSubject"];
	$TestType = $_REQUEST["txtSelectedTestType"];
	$TotalSubject = $_REQUEST["totalSubject"]-1;
	$Position=$_REQUEST["txtPosition"];

	for ($i=1;$i<=$TotalSubject;$i++)
	{
		$CtrlStudentName = "txtStudentName" . $i;
		$CtrlMarks = "txtTotalMarks" . $i;
		$CtrlRollNo = "txtRollNo" . $i;
		$CtrlRemarks="txtRemarks" . $i;
		$CtrlMaxMarks="txtMaxMarks" . $i;
		$CtrlGrade="txtGrd" . $i;
		$CtrlGradePoint="txtGradePoint" . $i;

		$StudentName = $_REQUEST[$CtrlStudentName];
		$Marks=$_REQUEST[$CtrlMarks];
		$RollNo=$_REQUEST[$CtrlRollNo];
		$MaxMarks=$_REQUEST[$CtrlMaxMarks];
		$Remarks=$_REQUEST[$CtrlRemarks];
		$Grade=$_REQUEST[$CtrlGrade];
		$GradePoint=$_REQUEST[$CtrlGradePoint];

		$rsReportCard=mysql_query("select * from `report_card` where `sname`='$StudentName' and `sclass`='$Class' and `srollno`='$RollNo' and `subject`='$SubjectName' and `testtype`='$TestType'");
		   						
		if (mysql_num_rows($rsReportCard) == 0)
	   	{
			$ssql = "INSERT INTO `report_card` (`sname`,`sclass`,`srollno`,`subject`,`testtype`,`marks`,`MaxMarks`,`remarks`,`Grade`,`GradePoint`) values ('$StudentName','$Class','$RollNo','$SubjectName','$TestType','$Marks','$MaxMarks','$Remarks','$Grade','$GradePoint')";
			//echo $ssql . "<br>";
			if ($Marks != "")
			{
				mysql_query($ssql) or die(mysql_error());
			}
		}
	}

	mysql_query("delete from `update_track` where `Activity`='reportcard'") or die(mysql_error());

	mysql_query("insert into `update_track` (`Activity`) values ('reportcard')") or die(mysql_error());

	echo "<br><br><center><b>Report Card have been uploaded successfully";

?>

<html>
<style>

.footer {

    height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;

}   

.footer_contents 

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;

}
</style>
<body>

<a href="javascript:history.back(1)">

<img height="30" src="images/BackButton.png" width="70" style="float: right" class="auto-style25"></a>


<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by iSchool Technologies LLP</font></div>

</div>

</body>



</html>