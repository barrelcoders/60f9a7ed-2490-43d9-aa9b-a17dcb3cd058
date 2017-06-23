<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

include '../../AppConf.php';

?>


<?php

if ($_REQUEST["isSubmit"]=="yes")
{

//$ssql="SELECT `srno` , `sclass` , `subject` ,`weekday`,`daytime`,`datetime` FROM `time_table` order by `weekday`";

$ssql="SELECT `srno` , `sclass` , `subject` ,`weekday`,`daytime`,`datetime` FROM `time_table` where 1=1";

if ($_REQUEST["cboClass"] !="All")
{
	$SelectedClass=$_REQUEST["cboClass"];
	$ssql=$ssql . " and `sclass`='$SelectedClass'";
}
if ($_REQUEST["cboWeekDay"] !="All")
{
	$SelectedWeekday=$_REQUEST["cboWeekDay"];
	$ssql=$ssql . " and `weekday`='$SelectedWeekday'";
}


$ssql=$ssql . " order by `weekday`";

$rs= mysql_query($ssql);
}

$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);


?>
<script language="javascript">
function Validate2()
{
	document.getElementById("frmReportCard").submit();
}

</script>
<html>
<head>
<style type="text/css">
.style1 {
	border-color: #000000;
	border-width: 0px;
	border-collapse: collapse;
	}
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
.style2 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
}
.style3 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #95C23D;
	font-family: Cambria;
}

.style4 {
	text-align: left;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
	color: #000000;
	font-family: Cambria;
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
	color: #000000;
}
.auto-style10 {
	text-align: center;
	font-family: Cambria;
	color: #000000;
	font-style: normal;
	text-decoration: none;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
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
.auto-style9 {
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
	text-align: center;
}
.auto-style8 {
	border-right-style: solid;
	border-right-width: 1px;
	border-top-style: solid;
	border-top-width: 1px;
	border-bottom-style: solid;
	border-bottom-width: 1px;
	text-align: center;
}

</style>
</head>
<body>

<p><font face="Cambria" style="font-size: 12pt"><u><b>Uploaded Timetable Report</b></u></font></p>
<hr>
<p>

<font face="Cambria">
<a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table style="border-width:1px; width: 100%" class="style1" cellspacing="0" cellpadding="0">

	<tr>
		<td class="style4" colspan="4" style="text-align: center"><a href="frmTimeTable.php">
		<font color="#000000">
		<span style="text-decoration: none; font-weight:700">Upload Class Time - Table Details 
		</span></font> </a></td>
		<td class="style4" colspan="4" width="50%" style="text-align: center; background-color:#95C23D">
		<b>Uploaded Timetable 
		Report</b></td>
	</tr>
	</table>
	<table width="1032">
	<tr>
	<td>
	
	<table class="auto-style7" style="width: 1237px; border-collapse:collapse">
		<form name="frmReportCard" id="frmReportCard" method="post" action="PreviousUploadedTimeTable.php">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<tr>
	<td class="auto-style6" colspan="5">
				&nbsp;</td>
	
	</tr>
	<td class="auto-style6" style="width: 205px">
				<p align="center">
				<span style="text-decoration:none;" class="auto-style3">Select 
	Class</span></td>
	
	<td class="auto-style10" width="205">
				<p style="text-align: left">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
	<select name="cboClass" id="cboClass" style="height: 22px; width: 62px;">

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
	
	<td class="auto-style1" style="width: 205px">
				<p style="text-align: center">Select Day</td>
	
	<td style="width: 205px" class="auto-style9">
				<p style="text-align: left">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<select name="cboWeekDay" id="cboWeekDay" style="height: 22px; width: 79px;">

		<option selected="" value="All">All</option>

				<option>Monday</option>
				<option>Tuesday</option>
				<option>Wednesday</option>
				<option>Thursday</option>
				<option>Friday</option>
				<option>Saturday</option>
		</select></span></td>
	
	<td style="width: 415px" class="auto-style8">
						<input name="Submit" type="button" value="Submit" onclick ="Javascript:Validate2();" style="font-weight: 700"></td>
				</form>
	</table>
	
		</td></tr></table>
	<!--
<table style="width: 100%; border-collapse: collapse" cellspacing="0" cellpadding="3" bordercolor="#cc0000" border=".5" align="left"> 

<tr valign="top">
<th scope="row" valign="middle">
<p><font face="wp_bogus_font">Upload Date Sheet</font></p></th>
<td width="67%" valign="middle">
<form action="upload_datesheet.php" method="post" enctype="multipart/form-data"><font face="wp_bogus_font">Select File to upload Homework:<input type="file" name="file" id="file" /><br />
<input type="submit" name="submit" value="Submit" /></font></form>
<p><font face="wp_bogus_font">Click <a target="_blank" href="datesheet.csv"><span style="text-decoration: none; font-weight: 700">here</span></a> for download sample &nbsp;&nbsp;  &nbsp;&nbsp; <br />
</font></td>
</tr>

</table>

<br />
<br />
<br />
<br />
<br />
<br />
<br />-->


<table style="width: 100%" class="style1" cellspacing="0" cellpadding="0">
	<tr>
		<td class="style3" style="border-style:solid; border-width:1px; width: 43px">Sr.No.</td>
		<td class="style3" style="border-style:solid; border-width:1px; width: 212px">Class</td>
		<td class="style3" style="border-style:solid; border-width:1px; width: 212px">Subject</td>
		<td class="style3" style="border-style:solid; border-width:1px; width: 213px">Week Day</td>
		<td class="style3" style="border-style:solid; border-width:1px; width: 213px">Time of the Day</td>
		<td class="style3" style="border-style:solid; border-width:1px; width: 213px">Date and Time of Upload</td>
	</tr>
	<?php
		while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$sclass=$row[1];
					$subject=$row[2];
					$weekday=$row[3];
					$daytime=$row[4];
					$datetime=$row[5];
	?>
	<tr>
		<td class="style2" style="width: 43px"><?php echo $srno;?></td>
		<td class="style2" style="width: 212px"><?php echo $sclass;?></td>
		<td class="style2" style="width: 212px"><?php echo $subject;?></td>
		<td class="style2" style="width: 213px"><?php echo $weekday;?></td>
		<td class="style2" style="width: 213px"><?php echo $daytime;?></td>
		<td class="style2" style="width: 213px"><?php echo $datetime;?></td>
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