<?php
include '../../connection.php';
?>

<?php


$MarksObtained = $_REQUEST["MarksObtained"];

$MaxMarks = $_REQUEST['MaxMarks'];



$ssql="SELECT `Grade`,`GradePoints` FROM `grade_master` WHERE `MaxMarks`=" . $MaxMarks . " and " . $MarksObtained . " >= `RangeFrom` and " . $MarksObtained . "<=`RangeTo`";

$rs= mysql_query($ssql);



while($row = mysql_fetch_row($rs))

{

	$sstr = $row[0];
	$sstrGradePoint = $row[1];
}



//echo substr($sstr,strlen($sstr)-1);



echo  $sstr.','.$sstrGradePoint;



?>