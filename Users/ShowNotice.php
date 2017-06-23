<?php include '../connection.php';?>
<?php include '../AppConf.php';?>
<head>
<style type="text/css">

.style1 {

	border-collapse: collapse;

	border: 1px solid #808080;

}

</style>

</head>
<?php
session_start();
$SrNo = $_REQUEST["srno"];
$StudentClass = $_SESSION['StudentClass'];
$StudentRollNo = $_SESSION['StudentRollNo'];
$ssql="SELECT `srno` , `sname` , `sclass` ,`srollno`,`notice`,`ParentAcknowledge`,`noticetitle` FROM `student_notice` a  where `srno`='$SrNo'";

$rs= mysql_query($ssql);



		while($row = mysql_fetch_row($rs))

				{

					$srno=$row[0];

					$sname=$row[1];

					$sclass=$row[2];

					$srollno=$row[3];

					$noticetitle=$row[5];

					$notice=$row[4];

				}



?>

<br>

<table style="width: 100%" class="style1">

	<tr>

		<td><span style="font-family:Cambria;font-size:14px;font-weight:normal;font-style:normal;text-decoration:none;color:#CC0033;"><?PHP ECHO $notice; ?></span></td>

	</tr>

</table>

