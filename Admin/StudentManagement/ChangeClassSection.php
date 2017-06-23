<?php
session_start();
include '../../connection.php';
?>
<?php
$sadmission=$_REQUEST["sadmission"];
$MyClass=$_REQUEST["MyClass"];
if($_REQUEST["cboClass"] != "")
{
	$Newadmission=$_REQUEST["txtAdmissionId"];
	$NewClass=$_REQUEST["cboClass"];
	$ssql="update `student_master` set `sclass`='$NewClass' where `sadmission`='$Newadmission'";
	//echo $ssql;
	mysql_query($ssql) or die(mysql_error());
	$ssql="update `user_master` set `sclass`='$NewClass' where `sadmission`='$Newadmission'";
	mysql_query($ssql) or die(mysql_error());
	//echo $ssql;
	echo "<br><br><center><b>Mobile No updated successfully!<br>Click <a href='Javascript:window.close();'>here</a> to close window";
	exit();
}
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
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
		<td class="style3" style="width: 594px"><strong>Enter New Section</strong></td>
		<td class="style2" style="width: 595px">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<font face="Cambria">
	<select name="cboClass" id="cboClass" style="height: 22px; width: 79px;" onchange="FillRollNo();">

		<option selected="" value="Select One">Select One</option>

		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $Class; ?>" <?php if($MyClass==$Class) {?>selected="selected" <?php }?>><?php echo $Class; ?></option>
		<?php
		}
		?>
		</select></font></span></td>
	</tr>
	<tr>
		<td class="style4" colspan="2">
		<input name="btnSubmit" type="button" value="Submit" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
</table>

</body>

</html>
