<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php
session_start();

$SrNo = $_REQUEST["srno"];
$ssqlRouteNo="SELECT distinct `routeno` FROM `RouteMaster`";

$rsRouteNo= mysql_query($ssqlRouteNo);


if ($SrNo !="")
{
//$ssql="SELECT `srno` , `sname`,`srollno`,`sclass`,`routeno`,`bus_no`,`timing`,`driver_name`,`driver_mobile` FROM `student_master` where `srno`='$SrNo'";
$ssql="SELECT `srno` , `sname`,`srollno`,`sclass`,`routeno` FROM `student_master` where `srno`='$SrNo'";
$rs= mysql_query($ssql);

	while($row = mysql_fetch_row($rs))
	{
					$srno=$row[0];
					$sname=$row[1];
					$srollno=$row[2];
					$sclass=$row[3];
					$routeno=$row[4];
					//$bus_no=$row[5];
					//$timing=$row[6];
					//$driver_name=$row[7];
					//$driver_mobile=$row[8];
					
	}
	
	$ssqlRoute="SELECT `srno`,`bus_no`,`timing`,`driver_name`,`driver_mobile` FROM `RouteMaster` where `routeno`='$routeno'";
	$rsR= mysql_query($ssqlRoute);

	while($rowR = mysql_fetch_row($rsR))
	{
					$bus_no=$rowR[1];
					$timing=$rowR[2];
					$driver_name=$rowR[3];
					$driver_mobile=$rowR[4];
	}
}


if ($_REQUEST["txtName"] !="")
{
					$srno=$_REQUEST["SrNo"];
					$routeno=$_REQUEST["txtRouteNo"];
					$bus_no=$_REQUEST["txtBusNo"];
					$timing=$_REQUEST["txtTimeArrival"];
					$driver_name=$_REQUEST["txtDriverName"];
					$driver_mobile=$_REQUEST["txtDriverMobileNo"];
	
	
			$ssql="UPDATE `transport` SET `routeno`='$routeno',`bus_no`='$bus_no',`timing`='$timing',`driver_name`='$driver_name',`driver_mobile`='$driver_mobile' WHERE `srno` = '$srno'";
			//echo $ssql;
			mysql_query($ssql) or die(mysql_error());
			echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			exit();
}

?>
<script language="javascript">
function Validate()
{
	if (document.getElementById("txtRouteNo").value=="")
	{
		alert("Route No is mandatory");
		return;
	}
	if (document.getElementById("txtBusNo").value=="")
	{
		alert("Bus No is mandatory");
		return;
	}
	if (document.getElementById("txtTimeArrival").value=="")
	{
		alert("Time of arrival at stop is mandatory");
		return;
	}
	if (document.getElementById("txtDriverName").value=="")
	{
		alert("Driver Name is mandatory");
		return;
	}
	if (document.getElementById("txtDriverMobileNo").value=="")
	{
		alert("Driver Mobile No is mandatory");
		return;
	}
	
	document.getElementById("frmEditTransport").submit();
	
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Student Master</title>
<!-- link calendar resources -->
	<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>

<style type="text/css">
.style1 {
	border-collapse: collapse;
	border: 1px solid #808080;
}
.style2 {
	text-align: center;
}
.style3 {
	color: #000000;
	font-family: Cambria;
	font-size: 12pt;
	background-color: #FFFFFF;
}
</style>
</head>

<body onunload="window.opener.location.reload();">

<table style="width: 100%" class="style1">
<form name="frmEditTransport" id="frmEditTransport" method="post" action="EditTransport.php">
<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">
	<tr>
		<td style="width: 523px" class="style3"><strong>Student Name:</strong></td>
		<td style="width: 524px">
		<input name="txtName" id="txtName" type="text" value="<?php echo $sname; ?>" readonly="readonly"></td>
	</tr>
	<tr>
		<td style="width: 523px" class="style3"><strong>Roll No:</strong></td>
		<td style="width: 524px">
		<input name="txtRollNo" id="txtRollNo" type="text" value="<?php echo $srollno; ?>" readonly="readonly"></td>
	</tr>
	
	<tr>
		<td style="width: 523px" class="style3"><strong>Class: </strong></td>
		<td style="width: 524px">
		<input name="txtClass" id="txtClass" type="text" value="<?php echo $sclass; ?>" readonly="readonly"></td>
	</tr>
	<tr>
		<td style="width: 523px" class="style3"><strong>Bus Route No: </strong></td>
		<td style="width: 524px">
		<select name="txtRouteNo" id="txtRouteNo">
		<option selected="" value="Select One">Select One</option>
		<?php
		while($row1 = mysql_fetch_row($rsRouteNo))
		{
					$RouteNo=$row1[0];
		?>
		<option <?php if ($routeno==$RouteNo) {?> selected="selected" <?php }?> value="<?php echo $RouteNo; ?>"><?php echo $RouteNo; ?></option>
		<?php
		}
		?>

		</select></td>
	</tr>
	<tr>
		<td style="width: 523px" class="style3"><strong>Bus No: </strong></td>
		<td style="width: 524px">
		<input name="txtBusNo" id="txtBusNo" type="text" value="<?php echo $bus_no; ?>"></td>
	</tr>
	<tr>
		<td style="width: 523px" class="style3"><strong>Time of bus arrival a 
		stop: </strong></td>
		<td style="width: 524px">
		<input name="txtTimeArrival" id="txtTimeArrival" type="text" value="<?php echo $timing; ?>"></td>
	</tr>
	<tr>
		<td style="width: 523px" class="style3"><strong>Driver Name: </strong></td>
		<td style="width: 524px">
		<input name="txtDriverName" id="txtDriverName" type="text" value="<?php echo $driver_name; ?>"></td>
	</tr>
	<tr>
		<td style="width: 523px" class="style3"><strong>Driver Mobile No: </strong></td>
		<td style="width: 524px">
		<input name="txtDriverMobileNo" id="txtDriverMobileNo" type="text" value="<?php echo $driver_mobile; ?>"></td>
	</tr>
	
	<tr>
		<td colspan="2" class="style2">
		<input name="Submit1" type="button" value="submit" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
</table>

</body>

</html>
