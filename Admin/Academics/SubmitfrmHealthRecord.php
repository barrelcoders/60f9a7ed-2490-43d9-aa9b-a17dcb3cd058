<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>

<?php

	



	

	//echo $_REQUEST["totalSubject"]-1;

	

	$Class = $_REQUEST["cboClass"];

	$RollNo = $_REQUEST["txtRollNo"];

	$StudentName = $_REQUEST["txtStudentName"];

	$Height = $_REQUEST["txtHeight"];

	$Weight = $_REQUEST["txtWeight"];

	$BMI = $_REQUEST["txtBMI"];		$cbMonth= $_REQUEST["cboMonth"];

	

	

	

		

		//$Attendance = $_REQUEST[$CtrlAttendance];

		

		$ssql = "INSERT INTO `health_record` (`sname`,`sclass`,`srollno`,`height`,`weight`,`BMI`,`month`) values ('$StudentName','$Class','$RollNo','$Height','$Weight','$BMI','$cbMonth')";

		//echo $ssql . "<br>";

		mysql_query($ssql) or die(mysql_error());		

	mysql_query("delete from `update_track` where `Activity`='healthrecord'") or die(mysql_error());
	mysql_query("insert into `update_track` (`Activity`) values ('healthrecord')") or die(mysql_error());
	
$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='HealthRecord'";

   		$reslt = mysql_query($ssqlActivity , $Con);

    while($rowa = mysql_fetch_assoc($reslt))

	   {

	   		$message1=$rowa['gcm_message'];

	   		$message1=str_replace(" ","%20",$message1);    

	   }

		

		//$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `student_master` where `GCMAccountId` !='' and `srollno`='$RollNo' and `sclass`='$Class'";
$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `user_master` where `GCMAccountId` !='' and `srollno`='$RollNo' and `sclass`='$Class'";


   		$result = mysql_query($ssqlGCM , $Con);

    while($row = mysql_fetch_assoc($result))

	   {

	   		$registrationIDs = $row['GCMAccountId'];

		    

		    $url1 = 'http://aravalisisgcm.in/school/SendGCM.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;



		    

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

	echo "<br><br><center><b>Student Health Details have been uploaded successfully";



?>