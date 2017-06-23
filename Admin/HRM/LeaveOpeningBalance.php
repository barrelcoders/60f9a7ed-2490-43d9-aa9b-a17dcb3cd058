<?php 
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
$rsLeaveType=mysql_query("select distinct `LeaveType` from `LeaveTypeMaster`");
$No_Of_Leave_Type=mysql_num_rows($rsLeaveType);

$rsEmp=mysql_query("select distinct `EmpId`,`Name` from `employee_master`");
$No_Of_Employee=mysql_num_rows($rsEmp);
?>
<script language="javascript">
function Validate()
{
document.getElementById("frmLeaveOpening").submit();
}
</script>
<html>

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Employee Leave Balance</title>
<style type="text/css">
.style2 {
	border-width: 1px;
}
.style3 {
	font-weight: bold;
	border-width: 1px;
}
.style4 {
	border-style: solid;
	border-width: 1px;
	border-collapse: collapse;
}
</style>
</head>

<body>

<p><b><font face="Cambria">Employee Leave Balance</font></b></p>
<hr>
<p>&nbsp;</p>
<form name="frmLeaveOpening" id="frmLeaveOpening" method="POST" action="SubmitLeaveOpeningBalance.php">
<input type="hidden" name="TotalCountLeaveType" id="TotalCountLeaveType" value="<?php echo $No_Of_Leave_Type;?>">
<input type="hidden" name="TotalEmployeeCount" id="TotalEmployeeCount" value="<?php echo $No_Of_Employee;?>">
<table width="100%" cellspacing="0" cellpadding="0" class="style4">
	<tr>
		<td align="center" bgcolor="#95C23D" style="width: 49px" class="style3"><font face="Cambria">Sr No</font></td>
		<td align="center" bgcolor="#95C23D" style="width: 259px"><b><font face="Cambria">Emp. Id</font></b></td>
		<td align="center" bgcolor="#95C23D" style="width: 259px"><b><font face="Cambria">Name</font></b></td>
		<?php
		while($row = mysql_fetch_row($rsLeaveType))
		{
			$LeaveType=$row[0];
		?>
		<td align="center" bgcolor="#95C23D" style="width: 260px"><?php echo $LeaveType;?></td>
		<?php
		}
		?>
		</tr>
	<?php
	$cnt=1;
	while($row=mysql_fetch_row($rsEmp))
	{
		$EmpId=$row[0];
		$EmpName=$row[1];
		$rsLeaveType=mysql_query("select distinct `LeaveType`,`MaxLeaves` from `LeaveTypeMaster`");
	?>
	<!--
	<input type="hidden" name="hEmpId<?php echo $cnt;?>" id="hEmpId<?php echo $cnt;?>" value="<?php echo $EmpId;?>">
	<input type="hidden" name="hEmpName<?php echo $cnt;?>" id="hEmpName<?php echo $cnt;?>" value="<?php echo $EmpName;?>">
	-->
	<tr>
		<td style="width: 49px" class="style2"><?php echo $cnt;?></td>
		<td style="width: 259px">
		<?php echo $EmpId;?>
		</td>
		<td style="width: 259px"><?php echo $EmpName;?></td>
		<?php
		$i=1;
		while($row = mysql_fetch_row($rsLeaveType))
		{
			$LeaveType=$row[0];
			$MaxLeaves=$row[1];
		?>
		<td style="width: 260px"><p align="center">
		<input type="hidden" name="hLeaveTypeName<?echo $cnt;?>_<?php echo $i;?>" id="hLeaveTypeName<?echo $cnt;?>_<?php echo $i;?>" value="<?php echo $LeaveType;?>">
		<input type="text" name="txtLeaveType<?echo $cnt;?>_<?php echo $i;?>" id="txtLeaveType<?echo $cnt;?>_<?php echo $i;?>" size="20" value="<?php echo $MaxLeaves;?>"></td>
		<?php
		$i=$i+1;
		}
		?>
		</tr>
	<?php
	$strEmpId=$strEmpId.$EmpId.",";
	$cnt=$cnt+1;
	}
	?>
	<input type="hidden" name="totalEmployee" id="totalEmployee" value="<?php echo $cnt-1; ?>" class="auto-style40">
	<input type="hidden" name="txtEmpId" id="txtEmpId" value="<?php echo $strEmpId;?>">
</table>
	<p align="center">
	<input type="button" value="Submit" name="B1" style="font-weight: 700" onclick="Javascript:Validate();"></p>
</form>

</body>

</html>
