<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';

?>
<?php
$SrNo = $_REQUEST["srno"];
if ($SrNo !="")
{
$ssql="SELECT `srno`,`sname` ,`srollno`, `sclass` ,`parentquery`,`queryresponse`,`datetime`,`sadmission` FROM `parent_query`";
$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
					$srno=$row[0];
					$Class=$row[3];
					$RollNo=$row[2];
					$parentquery=$row[4];
					$sadmission=$row[7];
	}
}

if ($_REQUEST["txtParentQuery"] !="")
{

	$srno=$_REQUEST["SrNo"];

	$QueryResponse=$_REQUEST["txtQueryResponse"];
	$sadmission=$_REQUEST["txtsadmission"];
	$SelectedClass=$_REQUEST["txtclass"];
	$SelectedRollNo=$_REQUEST["txtrollno"];
	
$ssql="SELECT `smobile`,`email` FROM `student_master` WHERE `sclass`='$SelectedClass' and `srollno`='$SelectedRollNo'";
$rs= mysql_query($ssql);
	while($row = mysql_fetch_row($rs))
	{
		$smobile=$row[0];
		$semail=$row[1];
		break;
	}

		$to=$semail;
		$subject = "Response to your query-school information system";
		$message = $QueryResponse;
		$from = $CommunicationEmailId;
		$headers = "From:" . $from;
		
		if ($to != "")
		{
			mail($to,$subject,$message,$headers);
		}
		//SENDING SMS****************
					$notice=strip_tags($message);			
					$notice=str_replace("&","and",str_replace(" ","%20",$notice));
					$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $smobile . "&sms=" . $notice . "&senderid=SCHOOL";
					 // create a new cURL resource
					$ch = curl_init();
					// set URL and other appropriate options
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					// grab URL and pass it to the browser					
					if($smobile!="")
					{
						curl_exec($ch);
					}
					// close cURL resource, and free up system resources
					if(curl_errno($ch))
					{ 
						echo 'Curl error: ' . curl_error($ch); 
					}
					curl_close($ch);
		
		//***************************

			$ssql="UPDATE `parent_query` SET `queryresponse`='$QueryResponse' WHERE `srno` = '$srno'";
			//echo $ssql;
			mysql_query($ssql) or die(mysql_error());
			echo "<br><center> <b>Updated Successfully <br> Click <a href='Javascript: window.close();'>here</a> to close window";
			exit();



}



?>

<script language="javascript">

function Validate()

{

	if (document.getElementById("txtQueryResponse").value=="")

	{

		alert("Response is mandatory");

		return;

	}

	

	document.getElementById("frmEditQuery").submit();

	

}

</script>

<html xmlns="http://www.w3.org/1999/xhtml">



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Edit Student Master</title>

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

.style3 {

	color: #FFFFFF;

	font-family: Cambria;

	font-size: 12pt;

	background-color: #CC0033;

}

</style>

</head>



<body onunload="window.opener.location.reload();">



<table style="width: 100%" class="style1">

<form name="frmEditQuery" id="frmEditQuery" method="post" action="EditQuery.php">

<input type="hidden" name="SrNo" id="SrNo" value="<?php echo $SrNo; ?>">
<input type="hidden" name="txtsadmission" id="txtsadmission" value="<?php echo $sadmission;?>">
<input type="hidden" name="txtclass" id="txtclass" value="<?php echo $Class;?>">
<input type="hidden" name="txtrollno" id="txtrollno" value="<?php echo $RollNo;?>">

	<tr>

		<td style="width: 523px" class="style3"><strong>Parent Query:</strong></td>

		<td style="width: 524px">

		<textarea name="txtParentQuery" id="txtParentQuery" rows="2" style="width: 349px" readonly="readonly"><?php echo parentquery; ?></textarea></td>

	</tr>

	<tr>

		<td style="width: 523px" class="style3"><strong>Response of Query:</strong></td>

		<td style="width: 524px">

		<textarea name="txtQueryResponse" id="txtQueryResponse" rows="2" style="width: 344px"></textarea></td>

	</tr>

	

	<tr>

		<td colspan="2" class="style2">

		<input name="Submit1" type="button" value="submit" onclick="Javascript:Validate();"></td>

	</tr>

	</form>

</table>



</body>



</html>

