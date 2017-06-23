<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
?>
<?php
	


	$Class = $_REQUEST["cboClass"];

	$Dt = $_REQUEST["txtStartDate"];
	$arr=explode('/',$Dt);
	$StartDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	$Dt = $_REQUEST["txtFinishDate"];
	$arr=explode('/',$Dt);
	$EndDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];
	
	$TotalSubject = $_REQUEST["totalSubject"]-1;

	$SelectedClass= $_REQUEST["txtSelectedClass"];
		
	$ssqlMsg="select `email`,`sname` from `student_master` where `email` !='' and `sclass`='$SelectedClass'";
	
	
	for ($i=1;$i<=$TotalSubject;$i++)
	{

		$SubjectCtrlName="txtSubject" . $i;
		
		$RemarkCtrlName = "txtRemark" . $i;
		
		$FileCtrlName = "File" . $i;
				

		$Subject = $_REQUEST[$SubjectCtrlName];

		$Remarks = $_REQUEST[$RemarkCtrlName];

		//$File = $_REQUEST[$FileCtrlName];
		
			  //$extension = end(explode(".", $_FILES["File1"]["name"]));
			  $extension = end(explode(".", $_FILES[$FileCtrlName]["name"]));
			  
			  if ($_FILES[$FileCtrlName]["tmp_name"] !="")
			  {
		      	move_uploaded_file($_FILES[$FileCtrlName]["tmp_name"],"AssignmentFiles/" . $_FILES[$FileCtrlName]["name"]);
		      	
		      	//$AssignmentURL = "http://emeraldsis.com/Admin/Academics/AssignmentFiles/" . $_FILES[$FileCtrlName]["name"];
		      	$AssignmentURL = $BaseURL."/Admin/Academics/AssignmentFiles/" . $_FILES[$FileCtrlName]["name"];
		      	$ssql="INSERT INTO `assignment` (`class`,`subject`,`assignmentdate`,`assignmentcompletiondate`,`remark`,`assignmentURL`,`status`) VALUES ('$SelectedClass','$Subject','$StartDt','$EndDt','$Remarks','$AssignmentURL','Active')";
		      	mysql_query($ssql) or die(mysql_error());
		      }


		//echo $_REQUEST[$ClassworkCtrlName] . "<br>";

	}
	
	mysql_query("delete from `update_track` where `Activity`='Assignment'") or die(mysql_error());
	mysql_query("insert into `update_track` (`Activity`) values ('Assignment')") or die(mysql_error());
	
	
		
		//***********SENDING GCM**************
		$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='Assignment'";
   		$reslt = mysql_query($ssqlActivity , $Con);
    while($rowa = mysql_fetch_assoc($reslt))
	   {
	   		$message1=$rowa['gcm_message'];
	   		$message1=str_replace(" ","%20",$message1);    
	   }
		
		//$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `student_master` where `GCMAccountId` !='' and `sclass`='$Class'";
		$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `student_master` where `GCMAccountId` !='' and `sclass`in ($SelectedClass)";
		echo $ssqlGCM;
		exit();
		
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
	
	<html>
<body>
<table style="width: 100%" class="style1" border="1"><tr>		<td class="style4" width="33.33%" colspan="4" style="height: 22px"><a href="frmClassWork.php">Upload Assignment Details</a></td>		<td class="style4" width="33.33%" colspan="4" style="height: 22px"><a href ="UploadClasswork.php">View Previous Uploaded Class Work</a></td>		<td class="style4" width="33.33%" colspan="4" style="height: 22px"><a href ="UploadHomework.php">View Previous Uploaded Home Work</a></td>	</tr>		</table>

</body>
<html>

<?php
	echo "<br><br><center><b>Assignment work have been uploaded successfully";

?>