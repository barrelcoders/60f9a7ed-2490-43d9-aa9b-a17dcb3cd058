<?php



include '../../connection.php';

?>

<?php



if(isset($_REQUEST['c']))

{

	$sql="SELECT `sname`,`sclass`,`srollno` FROM student_master WHERE sadmission='".$_REQUEST['c']."'";

	$select=mysql_query($sql);

	$fetch=mysql_fetch_array($select);

	echo $fetch['sname'].",".$fetch['sclass'].",".$fetch['srollno'];

	

}

if(isset($_REQUEST['adm']))

{

	$sql1="SELECT * FROM student_master WHERE sadmission='".$_REQUEST['adm']."'";

	$select1=mysql_query($sql1);

	$fetch1=mysql_fetch_array($select1);

	echo $fetch1['srollno'];

	

}

if(isset($_REQUEST['clas']))

{

	$sql="SELECT * FROM student_master WHERE sadmission='".$_REQUEST['clas']."'";

	$select=mysql_query($sql);

	$fetch=mysql_fetch_array($select);

	echo $fetch['sclass'];



}

?>









