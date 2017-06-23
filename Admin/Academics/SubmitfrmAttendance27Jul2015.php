<?php

session_start();

include '../../connection.php';

include '../Header/Header3.php';

include '../../AppConf.php';

?>

<?php

	//echo $_REQUEST["totalSubject"]-1;

	$Class = $_REQUEST["cboClass"];

	$Dt = $_REQUEST["txtDate"];

	$arr=explode('/',$Dt);

	$ClassworkDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];

/*

if (date("Y-m-d") > $ClassworkDt)

{

	echo "<br><br><center><b>Can not submit attendance before today<br>Click <a href='frmAttendance.php'>here</a> to got back !";

	exit();

}

*/

//$date = '2007/08/30'; 

$date=$ClassworkDt;

$weekday = date('l', strtotime($date));

if($weekday=="Sunday")

{

	echo "<br><br><center><b>Attandance date can not be Sunday<br>Click <a href='frmAttendance.php'>here</a> to got back !";

	exit();

}

/* Commented on 31-Jul-2014

$sql = "SELECT * FROM `attendance` where  `sclass`='$Class' and `attendancedate`='$ClassworkDt'";

$resultchk = mysql_query($sql,$Con);

if (mysql_num_rows($resultchk)>0)

{

	echo "<br><br><center><b>Attandance for this date : '$ClassworkDt' has been already uploaded <br>Click <a href='frmAttendance.php'>here</a> to got back !";

	exit();

}

*/

	$sql = "SELECT * FROM `school_holidays` where  `HolidayDate`='$ClassworkDt'";

	$result = mysql_query($sql,$Con);

	if (mysql_num_rows($result)>0)

	{

		echo "<br><br><center><b>Attandance date can not be submitted on Holiday !<br>Click <a href='frmAttendance.php'>here</a> to got back !";

		exit();

	}

	$TotalSubject = $_REQUEST["totalSubject"]-1;

	for ($i=1;$i<=$TotalSubject;$i++)

	{

		$CtrlStudentName="txtName" . $i;

		$CtrlRollNo = "txtRollNo" . $i;

		$CtrlAttendance= "cboAttendance" . $i;

		$StudentName= $_REQUEST[$CtrlStudentName];

		$RollNo = $_REQUEST[$CtrlRollNo];

		$Attendance = $_REQUEST[$CtrlAttendance];

	$sql = "SELECT * FROM `attendance` where  `sclass`='$Class' and `attendancedate`='$ClassworkDt' and `srollno`='$RollNo'";

	$resultchk = mysql_query($sql,$Con);

	if (mysql_num_rows($resultchk)>0)
	{
						//sending SMS to Absentee only for class 9****
		   						$pos= strpos($Class,"9");
		   						$pos1= strpos($Class,"10");
		   						$pos2= strpos($Class,"11");
		   						$pos3= strpos($Class,"12");
		   						$pos= strpos($Class,"Test");
			   					//if ($pos !== false)
			   					if ($pos !== false || $pos1 !== false || $pos2 !== false || $pos3 !== false)
								{
									$notice="Dear Parent your ward,". $StudentName.", is absent from the school today.";
									$notice=strip_tags($notice);
									$notice=str_replace("&","and",str_replace(" ","%20",$notice));
									$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $StudetnMobile . "&sms=" . $notice . "&senderid=SCHOOL";
									//echo $url;
									//exit();
									 // create a new cURL resource
									$ch = curl_init();
									// set URL and other appropriate options
									curl_setopt($ch, CURLOPT_URL, $url);
									curl_setopt($ch, CURLOPT_HEADER, 0);
									// grab URL and pass it to the browser
									//curl_exec($ch);
									// close cURL resource, and free up system resources
									if(curl_errno($ch))
									{ 
										echo 'Curl error: ' . curl_error($ch); 
									}
									curl_close($ch);
									$ssql="insert into `sms_logs` (`sname`,`sadmission`,`sclass`,`rollno`,`smstype`,`mobileno`,`message`,`sentdate`) values ('$StudentName','$sAdmission','$Class','$RollNo','SMS Communication','$StudetnMobile','$notice','$currentdate')";
									mysql_query($ssql) or die(mysql_error());									
								}
		//******
		//UPDATE
		$ssql = "UPDATE `attendance` SET `attendance`='$Attendance',`datetime`=now() WHERE `sclass`='$Class' and `attendancedate`='$ClassworkDt' and `srollno`='$RollNo'";
		
	}

	else
	{
					//sending SMS to Absentee only for class 9****
		   						$pos= strpos($Class,"9");
		   						$pos1= strpos($Class,"10");
		   						$pos2= strpos($Class,"11");
		   						$pos3= strpos($Class,"12");
		   						$pos= strpos($Class,"Test");
			   					//if ($pos !== false)
			   					if ($pos !== false || $pos1 !== false || $pos2 !== false || $pos3 !== false)
								{
									$notice="Dear Parent your ward,". $StudentName.", is absent from the school today.";
									$notice=strip_tags($notice);
									$notice=str_replace("&","and",str_replace(" ","%20",$notice));
									$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $StudetnMobile . "&sms=" . $notice . "&senderid=SCHOOL";
									//echo $url;
									//exit();
									 // create a new cURL resource
									$ch = curl_init();
									// set URL and other appropriate options
									curl_setopt($ch, CURLOPT_URL, $url);
									curl_setopt($ch, CURLOPT_HEADER, 0);
									// grab URL and pass it to the browser
									//curl_exec($ch);
									// close cURL resource, and free up system resources
									if(curl_errno($ch))
									{ 
										echo 'Curl error: ' . curl_error($ch); 
									}
									curl_close($ch);
									$ssql="insert into `sms_logs` (`sname`,`sadmission`,`sclass`,`rollno`,`smstype`,`mobileno`,`message`,`sentdate`) values ('$StudentName','$sAdmission','$Class','$RollNo','SMS Communication','$StudetnMobile','$notice','$currentdate')";
									mysql_query($ssql) or die(mysql_error());									
								}
		//******
		//INSERT	

		$ssql = "INSERT INTO `attendance` (`sname`,`srollno`,`sclass`,`attendancedate`,`attendance`) values ('$StudentName','$RollNo','$Class','$ClassworkDt','$Attendance')";

	}

		//echo $ssql . "<br>";

		mysql_query($ssql) or die(mysql_error());		

	}

	mysql_query("delete from `update_track` where `Activity`='attendance'") or die(mysql_error());

	mysql_query("insert into `update_track` (`Activity`) values ('attendance')") or die(mysql_error());

//////SENDING EMAILS TO THE STUDENTS OF THE CLASS

	$subject="Attendance Details!";

	$headers = "MIME-Version: 1.0" . "\r\n";

	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers

	//$headers .= 'From: communication@emeraldsis.com' . "\r\n";

	$headers .= 'From: '.$CommunicationEmailId. "\r\n";

	

	//$headers .= 'Cc: myboss@example.com' . "\r\n";

	$ssqlMsg="select `email`,`sname` from `student_master` where `email` !='' and `sclass`='$Class'";

	$rsMsg= mysql_query($ssqlMsg);

		while($row1 = mysql_fetch_row($rsMsg))

		{

					$EmailID=$row1[0];

					$StudentName=$row1[1];

					$to = $EmailID;

					$strEmail='';

					$strEmail=$strEmail . '<head>';

					$strEmail=$strEmail . '<meta http-equiv="Content-Language" content="en-us">';

					$strEmail=$strEmail . '<style type="text/css">';

					$strEmail=$strEmail . '.style1 {';

					$strEmail=$strEmail . 'border-collapse: collapse;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '</style>';

					$strEmail=$strEmail . '</head>';

					$strEmail=$strEmail . '<table style="width: 100%" class="style1">';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td style="width: 526px">Dear Parent</td>';

					$strEmail=$strEmail . '<td style="width: 526px">&nbsp;</td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td style="width: 526px">Following are the details of today Class-work and Home-work for your ward</td>';

					$strEmail=$strEmail . '<td style="width: 526px">&nbsp;</td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td style="width: 526px">&nbsp;</td>';

					$strEmail=$strEmail . '<td style="width: 526px">&nbsp;</td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td style="width: 526px"><strong>Class-work :-</strong></td>';

					$strEmail=$strEmail . '<td style="width: 526px">&nbsp;</td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td colspan="2">' . $StrClassWork . '</td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td style="width: 526px"><strong>Home-work :-</strong></td>';

					$strEmail=$strEmail . '<td style="width: 526px">&nbsp;</td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td colspan="2">' . $StrHomeWork . '</td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '</table>';	

					echo $EmailID . "<br>";

			//mail($to,$subject,$strEmail,$headers);



		}







		







		//***********SENDING GCM**************







		$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='Attendance'";
   		$reslt = mysql_query($ssqlActivity , $Con);
    while($rowa = mysql_fetch_assoc($reslt))
	   {
	   		$message1=$rowa['gcm_message'];
	   		$message1=str_replace(" ","%20",$message1);    
	   		break;
	   }
		$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `user_master` where `GCMAccountId` !='' and `sclass`='$Class'";
   		$result = mysql_query($ssqlGCM , $Con);
    while($row = mysql_fetch_assoc($result))
	   {
	   		$registrationIDs = $row['GCMAccountId'];
		    $url1 = 'http://aravalisisgcm.in/school/SendGCMAIS43.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;
		    //Class work message---------------------------------------
		    // create a new cURL resource
				$ch = curl_init();
				// set URL and other appropriate options
				curl_setopt($ch, CURLOPT_URL, $url1);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				// grab URL and pass it to the browser
				curl_exec($ch);
				// close cURL resource, and free up system resources
			if(curl_errno($ch))
			{ 
				echo 'Curl error: ' . curl_error($ch); 
			}
			curl_close($ch);
	   }
	?>

	<html>

<style>





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

</style>





	<body>







	<p>&nbsp;</p>







	<table style="width: 100%; border-collapse:collapse" class="style1" border="1" cellspacing="0" cellpadding="0">







	<tr>







		<td class="style4" colspan="4" align="center" bgcolor="#95C23D">

		<font face="Cambria"><strong style="font-weight: 400"><a href="frmAttendance.php">

		<span style="text-decoration: none"><font color="#000000">Upload Student Attendance Details</font></span></a></strong></font></td>		

		<td class="style4" colspan="4" align="center"><font face="Cambria">

		<strong style="font-weight: 400"><a href="UploadAttendance.php">

		<span style="text-decoration: none"><font color="#000000">Previous Uploaded Attendance 

		</font></span></a></strong></font><strong style="font-weight: 400">

		<a href="UploadAttendance.php"><font face="Cambria" color="#000000">

		<span style="text-decoration: none">Report</span></font></a></strong></td>







		</table>







		



<div class="footer" align="center">



    <div class="footer_contents" align="center">



		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>



</div>



		</body>







		</html>







		<?php







	echo "<br><br><center><b>Attendance have been uploaded successfully";







?>