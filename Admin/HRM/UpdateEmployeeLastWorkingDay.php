<?php
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	$SelectedDate=$_POST["txtDate"];
	$SelectedEmpId=$_POST["hEmpId"];
	

	$ssql="update `employee_master` set `ReportingTime`='$SelectedTime' where `PunchDate`='$SelectedDay' and `Month`='$SelectedMonth' and `Year`='$SelectedYear'";
	//echo $ssql;
	$rs=mysql_query($ssql);

}
?>
<html>
<head>
<script language="javascript">
function fnlUpdate(srno,EmpId)
{
	//Remarks=document.getElementById("txtRemarks"+srno).value;
	var myWindow = window.open("UpdateLastWorking.php?EmpId=" + EmpId + "&txtdate=" +document.getElementById("txtdate"+srno).value  , "", "width=200,height=100");
}
</script>



<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<title>Update Employee Last Working Day Details</title>
</head>

<?php
$ssql="SELECT `EmpId`,`Name` FROM `employee_master` order by `employeetype`";
$rsEmpType= mysql_query($ssql);
?>

<body>

<p>&nbsp;</p>
<p><font face="Cambria">Update Last Working Day</font></p>
<hr>
<p>&nbsp;</p>
<table border="1" width="100%" style="border-collapse: collapse" class="CSSTableGenerator">
	<tr>
		<td align="center" style="text-align: center"><b><font face="Cambria">Sr No</font></b></td>
		<td align="center" style="text-align: center"><b><font face="Cambria">Emp Id</font></b></td>
		<td align="center" style="text-align: center"><b><font face="Cambria">Emp Name</font></b></td>
		<td align="center" style="text-align: center"><b><font face="Cambria">Last Working Date</font></b></td>
		<td align="center" style="text-align: center"><b><font face="Cambria" class="text-box">Submit</font></b></td>
	</tr>
	<form name="frmEmp" id="frmEmp" action="" method="post">
     <input type="hidden" name ="hEmpId" id="hEmpId" value ="<?php echo $EmpId;?>">
		
	
	<?php
	$srno=0;
	while($row=mysql_fetch_row($rsEmpType))
	{
		$EmpId=$row[0];
		$EmpName=$row[1];
	?>

	<tr>
	<td><?php echo $srno; ?></td>

		<td style="text-align: center"><?php echo $EmpId; ?></td>
		<td style="text-align: center"><?php echo $EmpName; ?></td>
		<td>
		<p style="text-align: center"><input type="date" name="txtdate<?php echo $srno;?>" id="txtdate<?php echo $srno;?>" class="text-box"></td>
		<td><font face="Cambria">
		<p align="center"><input type="button" value="Submit" name="btnSubmit<?php echo $srno;?>" id="btnSubmit<?php echo $srno;?>" onclick ="Javascript:fnlUpdate('<?php echo $srno;?>','<?php echo $EmpId;?>');"><?php //echo $srno;?></font></td>
	</tr>
	<?php
	$srno=$srno+1;
	}
	
	?>
	</form>
</table>
<p>&nbsp;</p>

</body>

</html>