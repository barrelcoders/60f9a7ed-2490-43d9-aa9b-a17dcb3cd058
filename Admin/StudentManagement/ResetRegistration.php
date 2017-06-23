
<head>

<link rel="stylesheet" type="text/css" href="../css/style.css" />

<style type="text/css">
.style1 {
	border-collapse: collapse;
	border: 1px solid #000000;
}
.style2 {
	border: 1px solid #000000;
}
.style3 {
	font-family: Cambria;
	border: 1px solid #000000;
}
.style4 {
	border: 1px solid #000000;
	text-align: center;
}
</style>
</head>

<?php
session_start();
include '../../connection.php'; 
include '../Header/Header3.php';
?>
<?php
$sadmission=$_REQUEST["txtAdmissionId"];
if($sadmission !='')
{
$ssql="DELETE FROM `fees_challan` where `sadmission`='$sadmission'";
mysql_query($ssql) or die(mysql_error());
$ssql="DELETE FROM `fees_challan_detail` where `sadmission`='$sadmission'";
mysql_query($ssql) or die(mysql_error());
$ssql="DELETE FROM `NewStudentAdmission` where `sadmission`='$sadmission'";
mysql_query($ssql) or die(mysql_error());
$ssql="UPDATE `NewStudentRegistration` SET `status`='Pending' where `RegistrationNo`='$sadmission'";
mysql_query($ssql) or die(mysql_error());
$ssql="DELETE FROM `AdmissionFees` where `sadmission`='$sadmission'";
mysql_query($ssql) or die(mysql_error());
echo "<br><br><center><b>Reset successfully!";
exit();
}
?>
<script language="javascript">
function Validate()
{
	if(document.getElementById("txtAdmissionId").value=="")
	{
		alert("Please enter admission id!");
		return;
	}
	document.getElementById("frmReset").submit();
}
</script>
<table style="width: 100%" align="center" class="style1">
<form name="frmReset" id="frmReset" method="post" action="">
	<tr>
		<td class="style3" style="width: 598px">Enter Registration No:</td>
		<td class="style2" style="width: 599px">
		
			<input name="txtAdmissionId" id="txtAdmissionId" class="text-box" type="text">
		</td>
	</tr>
	<tr>
		<td class="style4" colspan="2">
		<input name="Sumit" type="button" value="submit"  class="text-box" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
</table>
