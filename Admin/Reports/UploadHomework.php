<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php

$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

if ($_REQUEST["isSubmit"]=="yes")
{
		$ssql="SELECT `srno` , `sclass` , `subject` ,`homeworkdate`,`homework`,`datetime` FROM `homework_master` where 1=1";
		
	if ($_REQUEST["cboClass"] != "All")
	{
		$SelectedClass=$_REQUEST["cboClass"];
		$ssql = $ssql . " and `sclass`='$SelectedClass'";
	}
	
	if ($_REQUEST["txtFromDate"] != "From Date")
	{
		
		$FromDate=$_REQUEST["txtFromDate"];
		
		$Dt = $_REQUEST["txtFromDate"];
		$arr=explode('/',$Dt);
		$FromDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];

		$Dt = $_REQUEST["txtToDate"];
		$arr=explode('/',$Dt);
		$ToDate = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
		
		$ssql = $ssql . " and `homeworkdate` >= '$FromDate' and `homeworkdate`<='$ToDate'";
	}

	$rs= mysql_query($ssql);
}



?>
<script language="javascript">
function Validate2()
{
	document.getElementById("frmHomeWork").submit();
}
</script>

<html>
<head>
<style type="text/css">
.style1 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
	font-family: Cambria;
	}
.style2 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
	font-family: Cambria;
}
.style3 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #C0C0C0;
	font-family: Cambria;
}

.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #DCBA7B;
	font-family: Cambria;
	color: #CD222B;
}
.auto-style7 {
	border-width: 0px;
}
.auto-style6 {
	border-left-style: solid;
	border-left-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style3 {
	font-family: Cambria;
	color: #CD222B;
}
.auto-style1 {
	text-align: right;
	font-family: Cambria;
	color: #CD222B;
	font-style: normal;
	text-decoration: none;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style9 {
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style2 {
	font-family: Cambria;
	font-size: small;
	color: #CD222B;
}
.auto-style8 {
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style10 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #C0C0C0;
	font-family: Cambria;
	color: #CD222B;
}
</style>
<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

</head>
<body>

<!--
<table style="width: 100%; border-collapse: collapse" cellspacing="0" cellpadding="3" bordercolor="#cc0000" border=".5" align="left">

<tr valign="top">
<th scope="row" valign="middle">
<p><font face="wp_bogus_font">Upload Class-work</font></p></th>
<td width="67%" valign="middle">
<form action="upload_homework.php" method="post" enctype="multipart/form-data"><font face="wp_bogus_font">Select File to upload Homework:<input type="file" name="file" id="file" /><br />
<input type="submit" name="submit" value="Submit" /></font></form>
<p><font face="wp_bogus_font">Click <a target="_blank" href="homework.xls"><span style="text-decoration: none; font-weight: 700">here</span></a> for download sample &nbsp;&nbsp;  &nbsp;&nbsp; <br />
</font></td>
</tr>

</table>
-->

<table style="width: 100%" class="style4">
<tr>

		<td class="style4" colspan="4" style="height: 22px; width: 38%;"><a href ="frmClassWork.php">Upload Class Work 
		&amp; Homework Details</a></td>
		<td class="style4" width="33.33%" colspan="4" style="height: 22px"><a href ="UploadClasswork.php">View Previous Uploaded Class Work</a></td>
		<td class="style4" width="33.33%" colspan="4" style="height: 22px">View Previous Uploaded Home Work</td>


	</tr>
	
	</table>
	
	<table>
	<tr>
	<td>
	
	<table class="auto-style7" style="width: 855px">
		<form name="frmHomeWork" id="frmHomeWork" method="post" action="UploadHomework.php">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	
	<td class="auto-style6" style="width: 179px">
				<span style="text-decoration:none;" class="auto-style3">Select 
	Class</span><span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
	<select name="cboClass" id="cboClass" style="height: 22px; width: 79px;" onchange="FillRollNo();">

		<option selected="" value="All">All</option>

		<?php
		while($row1 = mysql_fetch_row($rsClass))
		{
					$Class=$row1[0];
		?>
		<option value="<?php echo $Class; ?>"><?php echo $Class; ?></option>
		<?php
		}
		?>
		</select></span></td>
	
	<td class="auto-style1" style="width: 61px">
				Select Date</td>
	
	<td style="width: 294px" class="auto-style9">
				<input type="text" name="txtFromDate" id="txtFromDate" size="15" value="From Date" class="tcal" style="width: 144px;">
				<input type="text" name="txtToDate" id="txtToDate" size="15" value="To Date" class="tcal" style="width: 137px;"></td>
	
	<td style="width: 130px" class="auto-style8">
				<img border="0" src="images/SearchImg.jpg" width="106" height="37" onclick ="Javascript:Validate2();"></td>
	</form>
	</table>
	
	</td></tr></table>
	
<table style="width: 100%" class="style1">
	<tr>
		<td class="auto-style10" style="width: 43px">Sr.No.</td>
		<td class="auto-style10" style="width: 212px">Class</td>
		<td class="auto-style10" style="width: 212px">Subject</td>
		<td class="auto-style10" style="width: 213px">Home Work Date</td>
		<td class="auto-style10" style="width: 213px">Home Work</td>
		<td class="auto-style10" style="width: 213px">Date &amp; Time</td>
	</tr>
	<?php
		while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$sclass=$row[1];
					$subject=$row[2];
					$homeworkdate=$row[3];
					$homework=$row[4];
					$datetime=$row[5];
	?>
	<tr>
		<td class="style2" style="width: 43px"><?php echo $srno;?></td>
		<td class="style2" style="width: 212px"><?php echo $sclass;?></td>
		<td class="style2" style="width: 212px"><?php echo $subject;?></td>
		<td class="style2" style="width: 213px"><?php echo $homeworkdate;?></td>
		<td class="style2" style="width: 213px"><?php echo $homework;?></td>
		<td class="style2" style="width: 213px"><?php echo $datetime;?></td>
	</tr>
	<?php
	}
	?>
</table>


</body>
</html>