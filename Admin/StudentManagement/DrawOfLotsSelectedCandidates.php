<?php
include '../../connection.php';
include '../../AppConf.php';
?>
<?php
$rs=mysql_query("select `RegistrationNo`,CONCAT(`sname`,' ',`slastname`) as `student_name`,`sfathername`,`MotherName`,`ProfilePhoto`,`Sex`,`sclass` from `NewStudentRegistration` where `DrawOfLots`='Selected' order by `SystemDateTime` desc LIMIT 0,10");

?>

<script language="javascript">
	function Validate()
	{
		if(document.getElementById("txtRegNo").value=="")
		{
			alert("Please enter registration id!");
			return;
		}
		var myWindow = window.open("ShowRegistrationPopup.php?RegNo=" + document.getElementById("txtRegNo").value ,"","width=700,height=700");
	}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DPS Draw Of Lots</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<style type="text/css">

.style1 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
	}
.style2 {
	border-style: solid;
	border-width: 1px;
}
.style3 {
	text-align: center;
	font-family: Cambria;
	font-size: large;
	border-style: solid;
	border-width: 1px;
}
.style4 {
	text-align: right;
	border-style: solid;
	border-width: 1px;
}
.style5 {
	text-align: right;
	font-family: Cambria;
		border-left-style: solid;
	border-left-width: 1px;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style6 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
}
.style7 {
	border-collapse: collapse;
}
.style8 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	font-family: Cambria;
}
.style9 {
	text-align: center;
}
.style10 {
	text-align: left;
	border-left-style: none;
	border-left-width: medium;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.style11 {
	text-align: center;
	border-left-style: none;
	border-left-width: medium;
	border-right-style: none;
	border-right-width: medium;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
</style>
</head>

<body>
<table style="width: 70%" class="style1" align="center">
	<tr>
		<td class="style3" colspan="3" style="border-style: none; border-width: medium">
		<table style="width: 100%" cellpadding="0" class="style7">
			<tr>
				<td class="style9" style="border-style: none; border-width: medium"><img src="../images/logo.png" width="400px" height="100px"> </td>
			</tr>
			<tr>
			<td class="style9" style="border-style: none; border-width: medium">
			<br>
			<b><?php echo $SchoolAddress; ?></b><br>
			</td>
			</tr>
		</table>
		</td>
	</tr>
	<table>
	<tr>
		<td class="style3" colspan="3" style="border-style: none; border-width: medium"><strong>Draw of Lots - List of selected 
		candidates</strong></td>
	</tr>
	<tr>
		<td class="style4" style="height: 8px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:none; border-top-width:medium" colspan="3"></td>
	</tr>
	<form name="frmDraw" id="frmDraw" method="post" action="">
	<tr>
		<td class="style5" style="width: 621px; border-left-style:solid; border-left-width:1px; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px"><strong>Enter Registration No.</strong></td>
		<td class="style11" style="width: 621px; border-left-style:none; border-left-width:medium; border-right-style:none; border-right-width:medium; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
		<input name="txtRegNo" id="txtRegNo" type="text" class="text-box"/></td>
		<td class="style10" style="width: 621px; border-left-style:none; border-left-width:medium; border-right-style:solid; border-right-width:1px; border-top-style:solid; border-top-width:1px; border-bottom-style:solid; border-bottom-width:1px">
		<input name="btnSubmit" type="button" value="Submit" onclick="javascript:Validate();" class="button"/></td>
	</tr>	
	</form>
</table>
<br>
<table style="width: 100%" class="CSSTableGenerator">
	<tr>
		<td class="style8" style="width: 41px" bgcolor="#075133">
		<font color="#FFFFFF"><strong>S.No.</strong></font></td>
		<td class="style8" style="width: 239px" bgcolor="#075133">
		<font color="#FFFFFF"><strong>Registration No</strong></font></td>
		<td class="style8" style="width: 239px" bgcolor="#075133">
		<font color="#FFFFFF"><strong>Name</strong></font></td>
		<td class="style8" style="width: 239px" bgcolor="#075133">
		<font color="#FFFFFF"><strong>Class</strong></font></td>

		<td class="style8" style="width: 239px" bgcolor="#075133">
		<font color="#FFFFFF"><strong>Father&#39;s Name</strong></font></td>
		<td class="style8" style="width: 240px" bgcolor="#075133">
		<font color="#FFFFFF"><strong>Mother&#39;s Name</strong></font></td>
		<td class="style8" style="width: 240px" bgcolor="#075133">
		<font color="#FFFFFF"><strong>Gender</strong></font></td>
		<td class="style8" style="width: 240px" bgcolor="#075133">
		<font color="#FFFFFF"><strong>Candidate&#39;s Photo</strong></font></td>
	</tr>
<?php
$srno=0;
while($row = mysql_fetch_row($rs))
{
	$RegistrationNo=$row[0];
	$student_name=$row[1];
	$sfathername=$row[2];
	$MotherName=$row[3];
	$ProfilePhoto=$row[4];
	$Sex=$row[5];
	$class=$row[6];
	$srno=$srno+1;
?>	
	<tr>
		<td class="style2" style="width: 41px"><?php echo $srno;?></td>
		<td class="style2" style="width: 239px"><?php echo $RegistrationNo;?></td>
		<td class="style2" style="width: 239px"><?php echo $student_name;?></td>
		<td class="style2" style="width: 239px"><?php echo $class;?></td>

			<td class="style2" style="width: 239px"><?php echo $sfathername;?></td>

		
		<td class="style2" style="width: 240px"><?php echo $MotherName;?></td>
		<td class="style6" style="width: 240px"><?php echo $Sex;?></td>
		<td class="style6" style="width: 240px"><img src="../../StudentRegistrationPhotos/<?php echo $ProfilePhoto;?>" height="64" width="80"></td>
	</tr>
<?php
}
?>
</table>
&nbsp;

</body>

</html>