<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
?>

<?php
	
	//echo $_REQUEST["totalSubject"]-1;
	$Class = $_REQUEST["cboClass"];
	$WeekDay = $_REQUEST["cboWeekday"];
	$TotalSubject = $_REQUEST["totalSubject"]-1;
	for ($i=1;$i<=$TotalSubject;$i++)
	{
		$CtrlSubjectName = "txtName" . $i;
		$CtrlDayTime = "txtDayTime" . $i;
		$SubjectName = $_REQUEST[$CtrlSubjectName];
		$DayTime = $_REQUEST[$CtrlDayTime];
		/*
		$Dt = $_REQUEST[$CtrlDate];
		$arr=explode('/',$Dt);
		$DtateDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
		*/

		//$Attendance = $_REQUEST[$CtrlAttendance];
		
		$rslt = mysql_query("SELECT * FROM `time_table` a  where  `sclass`='$Class' and `subject`='$SubjectName' and `weekday`='$WeekDay'");
		if(mysql_num_rows($rslt)>0)
		{
			$ssql= "UPDATE `time_table` SET `daytime`='$DayTime' WHERE `sclass`='$Class' and `subject`='$SubjectName' and `weekday`='$WeekDay'";
		}
		else
		{
			$ssql = "INSERT INTO `time_table` (`sclass`,`subject`,`weekday`,`daytime`) values ('$Class','$SubjectName','$WeekDay','$DayTime')";
		}
		//echo $ssql . "<br>";
		mysql_query($ssql) or die(mysql_error());		
	}
	mysql_query("delete from `update_track` where `Activity`='timetable'") or die(mysql_error());
	mysql_query("insert into `update_track` (`Activity`) values ('timetable')") or die(mysql_error());

	echo "<br><br><center><b>Time table details have been uploaded successfully";
	$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='Timetable'";

   		$reslt = mysql_query($ssqlActivity , $Con);

    while($rowa = mysql_fetch_assoc($reslt))

	   {

	   		$message1=$rowa['gcm_message'];

	   		$message1=str_replace(" ","%20",$message1);    

	   }

		

		//$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `student_master` where `GCMAccountId` !='' and `sclass`='$Class'";
		$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `user_master` where `GCMAccountId` !='' and `sclass`='$Class'";


   		$result = mysql_query($ssqlGCM , $Con);

    while($row = mysql_fetch_assoc($result))
	   {
	   		$registrationIDs = $row['GCMAccountId'];
		    //$url1 = 'http://aravalisisgcm.in/school/SendGCM.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;
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