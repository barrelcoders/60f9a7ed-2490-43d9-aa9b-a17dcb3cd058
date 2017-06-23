<?php
include '../../connection.php';
?>
<?php
$rs=mysql_query("select distinct `Unique Id. No.` from `FinalFeesForReco`");
?>
<html>

<head>
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Sr No</title>
</head>

<body>

<table border="1" width="100%">
	<tr>
		<td>Sr No</td>
		<td>Admission No</td>
		<td>Name</td>
		<td>Q1</td>
	</tr>
	<?php
	$srno=0;
	while($row=mysql_fetch_row($rs))
	{
		$srno=$srno+1;
		$sadmission=$row[0];
		$rs1=mysql_query("select `Amount Paid` from `FinalFeesForReco` where `Unique Id. No.`='$sadmission'");
	?>
	<tr>
		<td><?php echo $srno;?></td>
		<td><?php echo $sadmission;?></td>
		<td>&nbsp;</td>
		<?php
		while($row1=mysql_fetch_row($rs1))
		{
			$AmountPaid=$row1[0];
		?>
		<td><?php echo $AmountPaid;?></td>
		<?php
		}
		?>
	</tr>
	<?php
	}
	?>
</table>

</body>

</html>