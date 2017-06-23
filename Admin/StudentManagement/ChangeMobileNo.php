<?php
include '../../connection.php';
?>
<?php
$sadmission=$_REQUEST["sadmission"];
if($_REQUEST["txtMobileNo"] != "")
{
	$Newadmission=$_REQUEST["txtAdmissionId"];
	$NewMobileNo=$_REQUEST["txtMobileNo"];
	$ssql="update `student_master` set `smobile`='$NewMobileNo' where `sadmission`='$Newadmission'";
	//echo $ssql;
	mysql_query($ssql) or die(mysql_error());
	$ssql="update `user_master` set `smobile`='$NewMobileNo' where `sadmission`='$Newadmission'";
	mysql_query($ssql) or die(mysql_error());
	//echo $ssql;
	echo "<br><br><center><b>Mobile No updated successfully!<br>Click <a href='Javascript:window.close();'>here</a> to close window";
	exit();
}
?>
<script language="javascript">
function Validate()
{
document.getElementById("frmChangeMobile").submit();
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
<style type="text/css">
.style1 {
	border-collapse: collapse;
	border-color: #000000;
	border-width: 0px;
}
.style2 {
	border-style: solid;
	border-width: 1px;
}
.style3 {
	font-family: Cambria;
	border-style: solid;
	border-width: 1px;
}
.style4 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
}
</style>
</head>

<body>

<table style="width: 100%" class="style1">
<form name="frmChangeMobile" id="frmChangeMobile" method="post" action="">
	<tr>
		<td class="style3" style="width: 594px"><strong>Admission ID:</strong></td>
		<td class="style2" style="width: 595px">
		<input name="txtAdmissionId" id="txtAdmissionId" type="text" readonly="readonly" value="<?php echo $sadmission;?>"></td>
	</tr>
	<tr>
		<td class="style3" style="width: 594px"><strong>Enter New Mobile No</strong></td>
		<td class="style2" style="width: 595px">
		<input name="txtMobileNo" id="txtMobileNo" type="text"></td>
	</tr>
	<tr>
		<td class="style4" colspan="2">
		<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
</table>

</body>

</html>
