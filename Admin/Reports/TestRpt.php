<?php include '../../connection.php';
include '../../AppConf.php';?>

<?php
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);
if($_REQUEST["isSubmit"]=="yes")
{
	$SelectedClass=$_REQUEST["cboClass"];
	$SelectedRollNo=$_REQUEST["txtRollNo"];
	
	$ssql="select `sname`,`sadmission`,`sclass`,`srollno`,`smobile` from `student_master` where 1=1";
	if($SelectedClass !="Select One")
	{
		$ssql=$ssql." and `sclass`='$SelectedClass'";
	}
	if($SelectedRollNo !="")
	{
		$ssql=$ssql." and `srollno`='$SelectedRollNo'";
	}
	$rs= mysql_query($ssql);
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Class</title>
<style type="text/css">
.style1 {
	text-align: center;
}
</style>
</head>

<body>
<table width="100%" style="border-collapse: collapse;" border="1">
<form name="frmRpt" method="post" action="TestRpt.php">
<input type="hidden" name="isSubmit" id="isSubmit" value="yes">

<tr>
<td style="width: 278px">Class</td>
<td style="width: 278px"><select name="cboClass">
<option selected="" value="Select One">Select One</option>
<?php
	while($row = mysql_fetch_row($rsClass))
	{
		$Class=$row[0];
?>
<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
<?php
	}
?>
</select></td>
<td style="width: 278px">Roll No</td>
<td style="width: 278px"><input name="txtRollNo" id="txtRollNo" type="text"></td>
<td style="width: 278px" class="style1">
<input name="Submit1" type="submit" value="submit"></td>
</tr>

</form>
</table><br>
<?php
if($_REQUEST["isSubmit"]=="yes")
{
	
?>

<table width="100%" style="border-collapse: collapse;" border="1">
<tr>
<td style="width: 278px">SrNo</td>
<td style="width: 278px">Name</td>
<td style="width: 278px">Admission</td>
<td style="width: 278px">Class</td>
<td style="width: 278px">RollNo</td>
<td style="width: 278px">Mobile</td>
</tr>
<?php
	while($row = mysql_fetch_row($rs))
	{
?>
<tr>
<td style="width: 278px">SrNo</td>
<td style="width: 278px"><?php echo $row[0];?></td>
<td style="width: 278px"><?php echo $row[1];?></td>
<td style="width: 278px"><?php echo $row[2];?></td>
<td style="width: 278px"><?php echo $row[3];?></td>
<td style="width: 278px"><?php echo $row[4];?></td>
</tr>
<?php
	}
?>
</table>
<?php
}
?>
</body>

</html>