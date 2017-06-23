<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

include '../../AppConf.php';

?>



<?php

if ($_REQUEST["isSubmit"]=="yes")
{
	$ssql="SELECT `srno` , `sclass` , `subject` ,`testdate`,`testtype`,`datetime` FROM `datesheet` where 1=1";
	if ($_REQUEST["cboClass"] !="All")
	{
		$SelectedClass=$_REQUEST["cboClass"];
		$ssql=$ssql . " and `sclass`='$SelectedClass'";
	}
	
	if ($_REQUEST["cboTestType"] !="All")
	{
		$SelectedTestType=$_REQUEST["cboTestType"];
		$ssql=$ssql . " and `testtype`='$SelectedTestType'";
	}
	
	$ssql=$ssql . " order by `datetime`";
	
	$rs= mysql_query($ssql);
}
$ssqlClass="SELECT distinct `class` FROM `class_master`";
$rsClass= mysql_query($ssqlClass);

$ssqlExam="SELECT distinct `examtype` FROM `exam_master`";
$rsExamType= mysql_query($ssqlExam);

?>
<script language="javascript">
function Validate2()
{
	document.getElementById("frmDateSheet").submit();
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
.style2 {
	border-style: solid;
	border-width: 1px;
	text-align: center;
}
.style3 {
	text-align: center;
	border-style: solid;
	border-width: 1px;
	background-color: #FFFFFF;
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
.auto-style3 {
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

</style>
</head>
<body>

<p><font face="Cambria" style="font-size: 12pt"><u><b>Uploaded Exam Datesheet 
Report</b></u></font></p>
<hr>
<p>

<font face="Cambria">
<a href="javascript:history.back(1)">
<img height="30" src="../images/BackButton.png" width="70" class="auto-style31" style="float: right"></a></font></p>
<p>&nbsp;</p>

<table class="style1" style="border-width:1px; width: 100%" class="style1" border="1" cellspacing="0" cellpadding="0">
	
	<tr>
		<td class="style4" colspan="4" style="text-align: center"><a href="frmDateSheet.php">
		<span style="text-decoration: none"><font color="#000000">Upload Date Sheet</font></span></td>		 
		<td class="style4" colspan="4" style="text-align: center; background-color:#95C23D" width="50%">
		Uploaded Date Sheet Report</td>		
		
	</tr></table>
	
	<table width="1241">
	<tr>
	<td>
	
	<table class="auto-style7" style="width: 100%; border-left-width:0px; border-top-width:0px">
		<form name="frmDateSheet" id="frmDateSheet" method="post" action="UploadDateSheet.php">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	
	<tr>
	
	<td class="auto-style6" style="border-left-style:none; border-left-width:medium; border-top-style:none; border-top-width:medium; border-bottom-style:none; border-bottom-width:medium" colspan="5">
				&nbsp;</td>
	
	</tr>
	
	<td class="auto-style6" style="border-style:solid; border-width:1px; width: 113px; ">
				<p align="center">
				<span style="text-decoration:none;" class="auto-style3">Select 
	Class</span></td>
	
	<td class="auto-style10" style="border-style:solid; border-width:1px; " width="295">
				<p style="text-align: left">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<select name="cboClass" id="cboClass" style="width: 62px;" onchange="FillRollNo();">

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
	
	<td class="auto-style1" style="border-style:solid; border-width:1px; width: 290px; ">
				<p style="text-align: center">Select Test type</td>
	
	<td style="border-style:solid; border-width:1px; width: 378px; " class="auto-style9">
				<p style="text-align: left">
				<span style="font-family:Arial;font-size:13px;font-weight:bold;font-style:normal;text-decoration:none;color:#CC1826;">
				<select name="cboTestType" id="cboTestType" style="height: 22px; width: 79px;">

		<option selected="" value="All">All</option>

		<?php
		while($rowE = mysql_fetch_row($rsExamType))
		{
					$ExamType=$rowE[0];
		?>
		<option value="<?php echo $ExamType; ?>"><?php echo $ExamType; ?></option>
		<?php
		}
		?>
		</select></span></td>
	
	<td style="width: 130px; border-top-style:solid; border-top-width:1px; border-left-style:solid; border-left-width:1px" class="auto-style8">
				<input name="Submit" type="button" value="Submit" onclick ="Javascript:Validate2();" style="font-weight: 700"></td>
	</form>
	</table>
	
		</td></tr></table>
	
	<p>&nbsp;</p>
	
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


<table style="width: 100%" class="style1">
	<tr>
		<td  style="border-style:solid; border-width:1px; width: 43px; background-color:#95C23D" align="center">
		<font face="Cambria">Sr.No.</font></td>
		<td  style="border-style:solid; border-width:1px; width: 212px; background-color:#95C23D" align="center">
		<font face="Cambria">Class</font></td>
		<td  style="border-style:solid; border-width:1px; width: 212px; background-color:#95C23D" align="center">
		<font face="Cambria">Subject</font></td>
		<td  style="border-style:solid; border-width:1px; width: 213px; background-color:#95C23D" align="center">
		<font face="Cambria">Date of Exam</font></td>
		<td  style="border-style:solid; border-width:1px; width: 213px; background-color:#95C23D" align="center">
		<font face="Cambria">Exam Type</font></td>
		<td  style="border-style:solid; border-width:1px; width: 213px; background-color:#95C23D" align="center">
		<font face="Cambria">Date and Time of Upload</font></td>
	</tr>
	<?php
		while($row = mysql_fetch_row($rs))
				{
					$srno=$row[0];
					$sclass=$row[1];
					$subject=$row[2];
					$testdate=$row[3];
					$testtype=$row[4];
					$datetime=$row[5];
	?>
	<tr>
		<td class="style2" style="width: 43px"><?php echo $srno;?></td>
		<td class="style2" style="width: 212px"><?php echo $sclass;?></td>
		<td class="style2" style="width: 212px"><?php echo $subject;?></td>
		<td class="style2" style="width: 213px"><?php echo $testdate;?></td>
		<td class="style2" style="width: 213px"><?php echo $testtype;?></td>
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