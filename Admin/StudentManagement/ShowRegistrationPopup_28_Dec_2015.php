<?php
session_start();
include '../../connection.php';
$RegNo=$_REQUEST["RegNo"];

if($RegNo !="")
{
		$rs=mysql_query("select `RegistrationNo`,CONCAT(`sname`,' ',`slastname`) as `student_name`,`sfathername`,`MotherName`,`ProfilePhoto`,`smobile` from `NewStudentRegistration` where `RegistrationNo`='$RegNo' and `status`='Selected'");
		if (mysql_num_rows($rs) > 0)
		{
			while($row = mysql_fetch_row($rs))
			{
				$RegistrationNo=$row[0];
				$student_name=$row[1];
				$sfathername=$row[2];
				$MotherName=$row[3];
				$ProfilePhoto=$row[4];
				$smobile=$row[5];
				break;			
			}
		}
		else
		{
			echo "<br><br><center><b>Registration No: ".$RegNo." is not eligible for draw of lots!";
			exit();
		}
}

if($_REQUEST["isSubmit"]=="yes")
{
	$SelectedRegNo=$_REQUEST["txtRegistrationNo"];
	mysql_query("update `NewStudentRegistration` set `DrawOfLots`='Selected',SystemDateTime=NOW() where `RegistrationNo`='$SelectedRegNo'") or die(mysql_error());
	
	////SENDING SMS........
	
					//Sending SMS
					//$notice=%20
					$notice="Dear Parent, Congratulations for being the lucky one to have made an invaluable lifetime investment by securing admission for your ward ". $student_name . " , Reg.No. ".$SelectedRegNo." at DPS - Faridabad for the session 2016-17.";
					$notice=strip_tags($notice);
					
					$notice=str_replace("&","and",str_replace(" ","%20",$notice));
					//echo "$student_name" . "-" . $smobile. "<br>".$notice;
					//$smobile="9818243377";					
					$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $smobile. "&sms=" . $notice . "&senderid=SCHOOL";
					//echo $url;
					//exit();
					 // create a new cURL resource
					$ch = curl_init();
					// set URL and other appropriate options
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_HEADER, 0);
					// grab URL and pass it to the browser
					
					curl_exec($ch);
					
					// close cURL resource, and free up system resources
					if(curl_errno($ch))
					{ 
						echo 'Curl error: ' . curl_error($ch); 
					}
					curl_close($ch);
					
					$ssql="insert into `sms_logs` (`sname`,`sadmission`,`sclass`,`rollno`,`smstype`,`mobileno`,`message`,`sentdate`) values ('$StudentName','$sAdmission','$Class','$RollNo','SMS Communication','$StudetnMobile','$notice','$currentdate')";
					//echo $ssql."<br>";
					//mysql_query($ssql) or die(mysql_error());
	
	
	/////////---------------
	echo "<br><br><center><b>Updated Successfully!<br>Click <a href='javascript:window.close();'>here</a> to close this window!";
	echo "<script>window.close();</script>";
	exit();
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DELHI PUBLIC SCHOOL SECTOR - 19</title>
<style type="text/css">
.style5 {
	border-collapse: collapse;
	border-top-width: 0px;
}
.style2 {
	border-collapse: collapse;
}
.style3 {
	text-align: center;
}
.style7 {
	border-width: 1px;
	font-family: Cambria;
	font-size: 11pt;
}
.style1 {
	font-family: Cambria;
}
.style10 {
	font-size: 11pt;
}
.style12 {
	font-size: 11pt;
}
.style13 {
	font-family: Cambria;
	font-size: 11pt;
}
.style8 {
	font-family: Cambria;
	font-size: x-small;
	text-align: center;
}
</style>
</head>

<body onunload="javascript:window.opener.location.reload();">
<?php
if($RegNo !="")
{
?>
<table border="1" width="100%" cellspacing="0" cellpadding="0" class="style5">
	<tr>
		<td colspan="2" style="border-top-color: #C0C0C0; border-top-width: 1px">
		<table style="width: 100%" cellpadding="0" class="style2">
			<tr>
				<td style="width: 80px; height: 65px;">
				<img src="../images/logo1.png" height="64" width="80">
				</td>
				<td class="style3" style="height: 65px">
				<p align="center"><font face="Cambria" style="font-size: 16pt; font-weight: 700">DELHI PUBLIC SCHOOL</font><br><font face="Cambria"><b>SECTOR - 19, FARIDABAD</b></font><br><font face="Cambria"><b>
		DRAW OF LOTS - 2016-17</b></font>
				</td>
				<td style="width: 80px"></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">&nbsp;</td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Applicant&#39;s 
		Photo :</strong></font></td>
		<td class="style1" style="width: 300px"><img src="../../StudentRegistrationPhotos/<?php echo $ProfilePhoto;?>" height="64" width="80"></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Applicant Name :</strong></font></td>
		<td class="style1" style="width: 300px"><span class="style10"><?php echo $student_name;?></span><span class="style12"></span></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Father's Name :</strong></font></td>
		<td class="style13" style="width: 300px"><?php echo $sfathername;?></td>
	</tr>
	<tr>
		<td style="width: 300px" class="style7"><font face="Cambria"><strong>Reg. No. :</strong></font></td>
		<td class="style13" style="width: 300px"><?php echo $RegistrationNo;?></td>
	</tr>
	<tr>
		<td align="center" colspan="2" style="width: 1126px">&nbsp;</td>
	</tr>
	<form name="frmCandidate" id="frmCandidate" method="post" action="">
	<input type="hidden" name="isSubmit" id="isSubmit" value="yes">
	<input type="hidden" name="txtRegistrationNo" id="txtRegistrationNo" value="<?php echo $RegistrationNo;?>">
	<tr>
		<td style="height: 10px;" class="style8" colspan="2">
			<input name="btnSubmit" type="submit" value="Selected" />
		</td>
	</tr>
	</form>
</table><p align="center"><img src="../images/Congrats.gif" width="400" height="90"></p>
<?php
}
?>
</body>
</html>
