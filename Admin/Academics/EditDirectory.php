<?php

session_start();

include '../../connection.php';

include '../../AppConf.php';

?>
<?php
$SrNo=$_REQUEST["srno"];

if ($SrNo !="")
{
	$ssql="SELECT `srno` , `section` , `phoneno` ,`email_id` FROM `school_directory` a  WHERE `srno`=$SrNo";
	$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
		$srno=$row[0];
		$section=$row[1];
		$phoneno=$row[2];
		$email_id=$row[3];
	}
}

if ($_REQUEST["txtSection"] !="")
{
	$Section=$_REQUEST["txtSection"];
	$Phone=$_REQUEST["txtPhone"];
	$EmailId=$_REQUEST["txtEmailId"];
	$SrNo=$_REQUEST["SrNo"];
	
			$ssql="UPDATE `school_directory` SET `section`='$Section',`phoneno`='$Phone',`email_id`='$EmailId' WHERE `srno` = '$SrNo'";
			mysql_query($ssql) or die(mysql_error());
			echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			exit();

}

?>
<script language="javascript">
function Validate()
{
	if (document.getElementById("txtSection").value=="")
	{
		alert("Please enter section");
		return;
	}
	if (document.getElementById("txtPhone").value=="")
	{
		alert("Please enter phone");
		return;
	}
	if (document.getElementById("txtEmailId").value=="")
	{
		alert("Please enter Email");
		return;
	}
	document.getElementById("frmEditDirectory").submit();
	
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit School Directory</title>
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

<table style="width: 100%" class="style1">
<form name="frmEditDirectory" id="frmEditDirectory" method="post" action="EditDirectory.php">
<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">
	<tr>
		<td style="width: 523px" class="style3"><strong>Section Name</strong></td>
		<td style="width: 524px"><input name="txtSection" id="txtSection" type="text" value="<?php echo $section; ?>"></td>
	</tr>
	<tr>
		<td style="width: 523px" class="style3"><strong>Phone No.</strong></td>
		<td style="width: 524px">

		<input type="text" name="txtPhone" id="txtPhone" size="15" value="<?php echo $phoneno; ?>"></td>
	</tr>
	<tr>
		<td style="width: 523px" class="style3"><strong>Email</strong></td>
		<td style="width: 524px"><input name="txtEmailId" id="txtEmailId" type="text" value="<?php echo $email_id; ?>"></td>
	</tr>
	<tr>
		<td colspan="2" class="style2">
		<input name="Submit1" type="button" value="submit" onclick="Javascript:Validate();"></td>
	</tr>
	</form>
</table>


<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria">Powered by Online School Planet</font></div>

</div>
</body>

</html>
