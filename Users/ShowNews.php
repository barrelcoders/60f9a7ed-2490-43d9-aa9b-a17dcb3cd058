<?php include '../connection.php';?>
<?php include '../AppConf.php';?>
<?php
session_start();
?>

<head>
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
</style>
</head>

<?php

$SrNo = $_REQUEST["srno"];

$ssql="SELECT `srno` , `news`,`datetime`,`imageurl`,`newstitle` FROM `school_news` a  where `srno`='$SrNo'";

$rs= mysql_query($ssql);

		while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$news=$row[1];					
				}

?>
<br>
<table style="width: 100%" class="style1">
	<tr>
		<td><span style="font-family:Cambria;font-size:14px;font-weight:normal;font-style:normal;text-decoration:none;color:#CC0033;"><?PHP ECHO $news; ?></span></td>
	</tr>
</table>
