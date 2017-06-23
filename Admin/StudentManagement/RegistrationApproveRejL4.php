<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
$action = $_REQUEST["action"];
$Remarks= str_replace("'","",$_REQUEST["Remarks"]);
$Discount= str_replace("'","",$_REQUEST["Discount"]);

$RegistrationId = $_REQUEST["RegId"];

if ($action=="approve")
{
	
	$ssql="UPDATE `NewStudentRegistration` SET `L4ApprovalStatus`='Approved',`L4Remarks`='$Remarks',`DiscountType`='$Discount' where `RegistrationNo`='$RegistrationId'";
   mysql_query($ssql) or die(mysql_error());

	$str="Approved";
			////SENDING SMS........
				$rsStudentDetail=mysql_query("select CONCAT(`sname`,' ',`slastname`) as `sname`,`smobile`,`Password4AdmissionFee`,`FatherEmailId` from `NewStudentRegistration` where `RegistrationNo`='$RegistrationId'");
				while($row = mysql_fetch_row($rsStudentDetail))
				{
					$sname=$row[0];
					$smobile=$row[1];
					$AdmissionPwd=$row[2];
					$Email=$row[3];
					break;
				}

	
					//Sending SMS
					//$notice=%20
					$notice=" Dear Parent,The document verification has been completed, Please visit http://dpsfsis.com/Admission.php for completing Admission formalities. The user id is ". $RegistrationId." and password is ".$AdmissionPwd;
					$Emailnotice=" Dear Parent,The document verification has been completed, Please visit http://dpsfsis.com/Admission.php for completing Admission formalities. The user id is ". $RegistrationId." and password is ".$AdmissionPwd;

					$notice=strip_tags($notice);
					
					$notice=str_replace("&","and",str_replace(" ","%20",$notice));
					//echo "$student_name" . "-" . $smobile. "<br>".$notice;
					//$smobile="9818243377";					
					//$url="http://messagebhejo.com/submitsms.jsp?user=Eduworld&key=ea0e1f127cXX&mobile=".$mobileno."&message=".$notice ."&senderid=INFOSM";
					//$url="http://103.247.98.91/API/SendMsg.aspx?uname=20142607&pass=q21zn|(&send=DPSFBD&dest=".$mobileno."&msg=Dear Parent,".$notice.", Principal-DPS Faridabad";

					
					//echo $url;
					//exit();
					 // create a new cURL resource
					$ch = curl_init();
					// set URL and other appropriate options
					//curl_setopt($ch, CURLOPT_URL, $url);
					//curl_setopt($ch, CURLOPT_HEADER, 0);
					// grab URL and pass it to the browser
					
					//curl_exec($ch);
					
					// close cURL resource, and free up system resources
					if(curl_errno($ch))
					{ 
						echo 'Curl error: ' . curl_error($ch); 
					}
					//curl_close($ch);
					
					$ssql="insert into `sms_logs` (`sname`,`sadmission`,`sclass`,`rollno`,`smstype`,`mobileno`,`message`,`sentdate`) values ('$StudentName','$sAdmission','$Class','$RollNo','SMS Communication','$smobile','$notice','$currentdate')";
					//echo $ssql."<br>";
					mysql_query($ssql) or die(mysql_error());
	               
	               
	               $to=$Email;
			//$to="himanshu@eduworldtech.com";
		  	$subject = "New Admission Document Verification Confirmation Mail";
		  	$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			$headers .= 'From: communication@dpsfsis.com' . "\r\n";
			$headers .= 'Cc: admission@dpsfsis.com' . "\r\n";
			
			mail($to,$subject,$Emailnotice,$headers);
			
		//echo $notice;	
	
		/////////---------------
	
}
if ($action=="reject")
{
	$ssql="UPDATE `NewStudentRegistration` SET `L4ApprovalStatus`='Rejected',`L4Remarks`='$Remarks' where `RegistrationNo`='$RegistrationId'";
	$str="Rejected";
}

//echo $ssql;
//exit();
mysql_query($ssql) or die(mysql_error());
echo "<br><br><center><b>Registration No ".$RegistrationId." ".$str." successfully!<br>Click <a href='Javascript:window.close();'>here</a> to close the window";
//echo $ssql;
exit();
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>

</body>

</html>
