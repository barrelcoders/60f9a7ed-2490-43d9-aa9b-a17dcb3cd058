<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

?>
<?php


$StudentClass = $_SESSION['StudentClass'];
$StudentRollNo = $_SESSION['StudentRollNo'];

$class=$_SESSION['StudentClass'];

$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

if ($_REQUEST["isSubmit"]=="yes")
{
		$ssql="SELECT `srno` , `sclass` , `subject` ,`classworkdate`,`classwork`,`datetime` FROM `classwork_master` where 1=1";
		
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
		
		$ssql = $ssql . " and `classworkdate` >= '$FromDate' and `classworkdate`<='$ToDate'";
	}

	$rs= mysql_query($ssql);
}
?>
<script language="javascript">
function Validate2()
{
	document.getElementById("frmClassWork").submit();
}
</script>
<html>
<head>
<style type="text/css">

.footer {

    height:20px; 
    width: 100%; 
    background-image: none;
    background-repeat: repeat;
    background-attachment: scroll;
    background-position: 0% 0%;
    position: fixed;
    bottom: 2pt;
    left: 0pt;

}   

.footer_contents 

{

        height:20px; 
        width: 100%; 
        margin:auto;        
        background-color:Blue;
        font-family: Calibri;
        font-weight:bold;

}

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
	background-color: #FFFFFF;
	font-family: Cambria;
	}
.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	font-family: Cambria;
	color: #000000;
}
.auto-style1 {
	text-align: right;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style2 {
	font-family: Cambria;
	font-size: small;
	color: #000000;
}
.auto-style3 {
	font-family: Cambria;
	color: #000000;
}
.auto-style4 {
	text-align: center;
	border-style: none;
	border-width: medium;
	background-color: #FFFFFF;
	font-family: Cambria;
	color: #000000;
}
.auto-style5 {
	text-align: center;
	font-family: Cambria;
	border-left-style: solid;
	border-left-width: 1px;
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: none;
	border-top-width: medium;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style6 {
	border-left-style: solid;
	border-left-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
}
.auto-style7 {
	border-width: 0px;
}
.auto-style8 {
	border-right-style: solid;
	border-right-width: 1px;
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
</style>
<!-- link calendar resources -->

	<link rel="stylesheet" type="text/css" href="tcal.css" />

	<script type="text/javascript" src="tcal.js"></script>

</head>
<body>
<p>
<!--
<table style="width: 100%; border-collapse: collapse" cellspacing="0" cellpadding="3" bordercolor="#cc0000" border=".5" align="left">

<tr valign="top">
<th scope="row" valign="middle">
<p><font face="wp_bogus_font">Upload Class-work</font></p></th>
<td width="67%" valign="middle">
<form action="upload_classwork.php" method="post" enctype="multipart/form-data"><font face="wp_bogus_font">Select File to upload attendance:<input type="file" name="file" id="file" /><br />
<input type="submit" name="submit" value="Submit" /></font></form>
<p><font face="wp_bogus_font">Click <a target="_blank" href="classwork.xls"><span style="text-decoration: none; font-weight: 700">here</span></a> for download sample &nbsp;&nbsp;  &nbsp;&nbsp; <br />
</font></td>
</tr>

</table>
-->


</p>


<p>&nbsp;</p>
<p><font face="Cambria" style="font-size: 12pt"><u><b>Previous Uploaded Classwork Details</b></u></font></p>
<hr>
<p><a href="javascript:history.back(1)">

<font face="Cambria">
<a href="javascript:history.back(1)">
<img height="30" src="images/BackButton.png" width="70" class="auto-style31" style="float: right"></a></font></p>
<p>

<font face="Cambria">

</p>


<table style="width: 100%; border-collapse:collapse" class="style4" cellpadding="0">
<tr>

		<td class="style4" width="36%" colspan="4" style="height: 22px; text-align:center"><a href ="frmClassWork.php">
		<span style="text-decoration: none">Upload Class Work &amp; Homework Details</span></a></td>
		<td class="style4" width="36%" colspan="4" style="height: 22px; text-align:center; background-color:#95C23D">View Previous Uploaded Class Work</td>
		<td class="style4" width="24%" colspan="4" style="height: 22px; text-align:center"><a href ="UploadHomework.php">
		<span style="text-decoration: none">View Previous Uploaded Home Work</span></a></td>


	</tr>
	
	</table>
	
	<table class="auto-style7" style="width: 100%; border-collapse:collapse; border-right-width:1px" cellpadding="0">
	<form name="frmClassWork" id="frmClassWork" method="post" action="UploadClasswork.php">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<tr>
	<td class="auto-style6" colspan="4">
				&nbsp;</td>
	
	</tr>
	<td class="auto-style6" style="border-style:solid; border-width:1px; width: 179px">
				<p align="center">
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
	
	<td class="auto-style1" style="border-style:solid; border-width:1px; width: 115px">
				Select Date</td>
	
	<td style="border-style:solid; border-width:1px; width: 437px" class="auto-style9">
				<p align="center">
				<input type="text" name="txtFromDate" id="txtFromDate" size="15" value="From Date" style="width: 144px;" class="tcal">
				<input type="text" name="txtToDate" id="txtToDate" size="15" value="To Date" style="width: 137px;" class="tcal"></td>
	
	<td style="border-style:solid; border-width:1px; width: 130px" class="auto-style8">
				<p align="center">
				<input name="Button1" type="button" value="Submit"  onclick ="Javascript:Validate2();" align="left"></td>
	</form>
	</table>
	
<table style="border-width:1px; width: 100%" class="style1">
	<tr>
		<td class="auto-style4" colspan="6">&nbsp;</td>
	</tr>
	<tr>
		<td class="auto-style4" style="border-style:solid; border-width:1px; width: 43px; background-color:#95C23D">
		<b>Sr.No.</b></td>
		<td class="auto-style4" style="border-style:solid; border-width:1px; width: 212px; background-color:#95C23D">
		<b>Class</b></td>
		<td class="auto-style4" style="border-style:solid; border-width:1px; width: 212px; background-color:#95C23D">
		<b>Subject</b></td>
		<td class="auto-style4" style="border-style:solid; border-width:1px; width: 213px; background-color:#95C23D">
		<b>Class Work Date</b></td>
		<td class="auto-style4" style="border-style:solid; border-width:1px; width: 213px; background-color:#95C23D">
		<b>Class Work</b></td>
		<td class="auto-style4" style="border-style:solid; border-width:1px; width: 213px; background-color:#95C23D">
		<b>Date &amp; Time</b></td>
	</tr>
	<?php
		while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$sclass=$row[1];
					$subject=$row[2];
					$classworkdate=$row[3];
					$classwork=$row[4];
					$datetime=$row[5];
	?>
	<tr>
		<td class="auto-style5" style="width: 43px; border-top-style:solid; border-top-width:1px"><?php echo $srno;?></td>
		<td class="auto-style5" style="width: 212px; border-top-style:solid; border-top-width:1px"><?php echo $sclass;?></td>
		<td class="auto-style5" style="width: 212px; border-top-style:solid; border-top-width:1px"><?php echo $subject;?></td>
		<td class="auto-style5" style="width: 213px; border-top-style:solid; border-top-width:1px"><?php echo $classworkdate;?></td>
		<td class="auto-style5" style="width: 213px; border-top-style:solid; border-top-width:1px"><?php echo $classwork;?></td>
		<td class="auto-style5" style="width: 213px; border-top-style:solid; border-top-width:1px"><?php echo $datetime;?></td>
	</tr>
	<?php
	}
	?>
</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>



</body>
</html>