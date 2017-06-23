<?php

session_start();

include '../../connection.php';

include '../../AppConf.php';
?>


<?php
$SrNo=$_REQUEST["srno"];

if ($SrNo !="")
{
	$ssql="SELECT `srno` , `Holiday` , `HolidayDate` ,`Class` FROM `school_holidays` a  WHERE `srno`=$SrNo";
	$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
		$srno=$row[0];
		$Holiday=$row[1];
		$HolidayDate=$row[2];
		$arr = explode('-', $date);
		$HolidayDate= $arr[1].'/'.$arr[2].'/'.$arr[0];
		
		$Class=$row[3];
	}
}

if ($_REQUEST["txtDate"] !="")
{
	$HolidayName=$_REQUEST["txtHolidayName"];
	$HDate=$_REQUEST["txtDate"];
	$Class=$_REQUEST["cboClass"];
	$SrNo=$_REQUEST["SrNo"];
	
	$arr = explode('/', $HDate);
	$HDate= $arr[2].'-'.$arr[0].'-'.$arr[1];
				
			$ssql="UPDATE `school_holidays` SET `Holiday`='$HolidayName',`HolidayDate`='$HDate',`Class`='$Class' WHERE `srno` = '$SrNo'";
			mysql_query($ssql) or die(mysql_error());
			echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			exit();

}

?>
<script language="javascript">
function Validate()
{
	//alert("Hi");
	
	
	if (document.getElementById("txtHolidayName").value=="")
	{
		alert("Please enter holiday name");
		return;
	}

	if (document.getElementById("txtDate").value=="")
	{
		alert("Please enter holiday date");
		return;
	}
	document.getElementById("frmEditHoliday").submit();

	
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Holiday</title>
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
.style3 {
	color: #000000;
	font-family: Cambria;
	font-size: 12pt;
	background-color: #FFFFFF;
}
</style>
</head>

<body onunload="window.opener.location.reload();">

<p>&nbsp;</p>

<table style="width: 100%" class="style1">
<form name="frmEditHoliday" id="frmEditHoliday" method="post" action="EditHoliday.php">
<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">
	<tr>
		<td style="width: 523px" class="style3"><strong>Holiday Name</strong></td>
		<td style="width: 524px"><input name="txtHolidayName" id="txtHolidayName" type="text" value="<?php echo $Holiday; ?>"></td>
	</tr>
	<tr>
		<td style="width: 523px" class="style3"><strong>Holiday Date</strong></td>
		<td style="width: 524px">

		<input type="text" name="txtDate" id="txtDate" size="15" value="<?php echo $HolidayDate; ?>" class="tcal" style="font-family: Arial; color: #CC0033"></td>
	</tr>
	<tr>
		<td style="width: 523px" class="style3"><strong>Class</strong></td>
		<td style="width: 524px"><select name="cboClass" style="height: 22px">
		<option selected="" value="All" <?php if ($class="All") { ?> selected="selected" <?php } ?>>All</option>
		<option value="1" <?php if ($class="1") { ?> selected="selected" <?php } ?>>1st</option>
		<option value="2" <?php if ($class="2") { ?> selected="selected" <?php } ?>>2nd</option>
		<option value="3" <?php if ($class="3") { ?> selected="selected" <?php } ?>>3rd</option>
		<option value="4" <?php if ($class="4") { ?> selected="selected" <?php } ?>>4th</option>
		<option value="5" <?php if ($class="5") { ?> selected="selected" <?php } ?>>5th</option>
		<option value="6" <?php if ($class="6") { ?> selected="selected" <?php } ?>>6th</option>
		<option value="7" <?php if ($class="7") { ?> selected="selected" <?php } ?>>7th</option>
		<option value="8" <?php if ($class="8") { ?> selected="selected" <?php } ?>>8th</option>
		<option value="9" <?php if ($class="9") { ?> selected="selected" <?php } ?>>9th</option>
		<option value="10" <?php if ($class="10") { ?> selected="selected" <?php } ?>>10th</option>
		<option value="11" <?php if ($class="11") { ?> selected="selected" <?php } ?>>11th</option>
		<option value="12" <?php if ($class="12") { ?> selected="selected" <?php } ?>>12th</option>
		</select></td>
	</tr>
	<tr>
		<td colspan="2" class="style2">
		<input name="Submit1" type="button" value="Submit" onclick="Javascript:Validate();" style="font-weight: 700"></td>
	</tr>
	</form>
</table>
<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</body>

</html>
