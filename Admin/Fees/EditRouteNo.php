<?php include '../../connection.php';?>

<?php
//$class=$_SESSION['StudentClass'];

//$SrNo = $_REQUEST["srno"];
$AdmissionId=$_REQUEST["sadmission"];
$currentroute=$_REQUEST["currentroute"];

	$ssqlRoute="SELECT distinct `routeno` FROM `RouteMaster`";
	$rsRoute= mysql_query($ssqlRoute);
if ($_REQUEST["txtAdmissionId"] !="")
{
	$EnteredAdmissionId=$_REQUEST["txtAdmissionId"];
	$NewRoute=$_REQUEST["cboRoute"];
	$ssql="UPDATE `NewStudentAdmission` SET `routeno`='$NewRoute' where `sadmission`='$EnteredAdmissionId'";
	mysql_query($ssql) or die(mysql_error());
	$ssql="UPDATE `student_master` SET `routeno`='$NewRoute' where `sadmission`='$EnteredAdmissionId'";
	mysql_query($ssql) or die(mysql_error());
	echo "<br><br><center><b>Route No has been changed successfully!";
	exit();
}	

?>
<script language="javascript">
function Validate()
{
	if(document.getElementById("cboRoute").value=="Select One")
	{
		alert ("Please select new route!");
		return;
	}
	document.getElementById("frmRoute").submit();
	
}
function FillClass()
{
	document.getElementById("txtClass").value=document.getElementById("cboClass").value;
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Route No.</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

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



.auto-style4 {

	font-family: Calibri;

}

</style>
</head>

<body onunload="window.opener.location.href='FetchStudentDetail.php';">

<table style="width: 100%" class="style1">
<form name="frmRoute" id="frmRoute" method="post" action="EditRouteNo.php">
<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">
	<tr>
		<td style="width: 523px" class="style3"><strong>Admission No:</strong></td>
		<td style="width: 524px">
		<input name="txtAdmissionId" id="txtAdmissionId" class="text-box" type="text" value="<?php echo $AdmissionId; ?>"></td>
	</tr>
	<tr>
		<td style="width: 523px; height: 24px;" class="style3"><strong>Current Route:</strong></td>
		<td style="width: 524px; height: 24px;">
		<input name="txtCurrentRoute" id="txtCurrentRoute" class="text-box" type="text" value="<?php echo $currentroute; ?>" readonly="readonly"></td>
	</tr>
	
	<tr>
		<td style="width: 523px" class="style3"><strong>New Route:</strong></td>
		<td style="width: 524px">
		<select name="cboRoute" id="cboRoute" class="text-box" onchange="Javascript:ValidateTransport();">
		<option selected="">Select One</option>
		<option selected="">No Transport</option>
		<?php
		while($rowRoute = mysql_fetch_row($rsRoute))
		{
					$RouteNo = $rowRoute[0];
		?>
		<option value="<?php echo $RouteNo; ?>"><?php echo $RouteNo; ?></option>
		<?php
		}
		?>
		
		
		</select>
		</td>
	</tr>
	
	<tr>
		<td colspan="2" class="style2">
		<input name="Submit1" type="button" value="Submit" onclick="Javascript:Validate();" class="text-box"></td>
	</tr>
	</form>
</table>

</body>

</html>
