<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
?>


<?php

	



	//echo $_REQUEST["totalSubject"]-1;



	$Class = $_REQUEST["cboClass"];

	$CMonth = $_REQUEST["cboMonth"];

	$TotalSubject = $_REQUEST["totalSubject"]-1;

	for ($i=1;$i<=$TotalSubject;$i++)

	{

		$CtrlSubjectName = "txtName" . $i;

		$CtrlCurriculam = "txtCurriculam" . $i;

		$SubjectName = $_REQUEST[$CtrlSubjectName];

		$Curriculam = $_REQUEST[$CtrlCurriculam];



		//$Attendance = $_REQUEST[$CtrlAttendance];

		$rslt = mysql_query("SELECT * FROM `course_curriculam` a  where  `sclass`='$Class' and `subject`='$SubjectName' and `month`='$CMonth'");

		if(mysql_num_rows($rslt)>0)

		{

			$ssql = "UPDATE `course_curriculam` SET `syllabus`='$Curriculam' WHERE `sclass`='$Class' AND `subject`='$SubjectName' AND `month`='$CMonth'";

		}

		else

		{

			$ssql = "INSERT INTO `course_curriculam` (`sclass`,`subject`,`syllabus`,`month`) values ('$Class','$SubjectName','$Curriculam','$CMonth')";

		}

		//echo $ssql . "<br>";

		mysql_query($ssql) or die(mysql_error());		

	}



	mysql_query("delete from `update_track` where `Activity`='course_curriculam'") or die(mysql_error());

	mysql_query("insert into `update_track` (`Activity`) values ('course_curriculam')") or die(mysql_error());



	$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='Course_Curriculam'";



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











	echo "<br><br><center><b>Course Curriculum Details have been uploaded successfully";







?>