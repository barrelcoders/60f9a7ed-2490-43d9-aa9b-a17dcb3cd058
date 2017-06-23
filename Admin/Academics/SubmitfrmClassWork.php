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

	$TotalSubject = $_REQUEST["totalSubject"]-1;

	$StrClassWork='';

	$StrHomeWork="";

	

	$SubmitType=$_REQUEST["SubmitType"];

	

	$SelectedClass= $_REQUEST["txtSelectedClass"];

	$ssqlMsg="select `email`,`sname` from `student_master` where `email` !='' and `sclass` in ($SelectedClass)";

	//echo "Value=" . str_replace("'","",$SelectedClass);

	$arrSelectedClass=explode(',',str_replace("'","",$SelectedClass));

	$SMSHomeWork="";

	for ($i=1;$i<=$TotalSubject;$i++)
	{

		$SubjectCtrlName="txtSubject" . $i;

		$ClassworkCtrlName = "txtClassWork" . $i;

		$HomeworkCtrlName = "txtHomeWork" . $i;

		$Subject = $_REQUEST[$SubjectCtrlName];

		$Classwork = $_REQUEST[$ClassworkCtrlName];

		$Homework = $_REQUEST[$HomeworkCtrlName ];

		//$StrClassWork=$StrClassWork . "<b><br>$Subject :-</b><br>$Classwork";

		//$StrHomeWork=$StrHomeWork. "<b><br>$Subject :-</b><br>$Homework";

		if($Homework !="")
		{
			$SMSHomeWork=$SMSHomeWork.$Subject.":".$Homework;
		}

		if($Homework !="" || $Classwork !="")
		{
		$StrClassWork=$StrClassWork . '<tr>';

		$StrClassWork=$StrClassWork . '<td class="auto-style20" style="width: 83px">' . $Subject . '</td>';

		$StrClassWork=$StrClassWork . '<td class="auto-style20" style="width: 124px">' . $Classwork . '</td>';

		$StrClassWork=$StrClassWork . '<td class="auto-style20">' . $Homework . '</td>';

		$StrClassWork=$StrClassWork . '</tr>';
		}

		//for loop for inserting data class wise one by one.

		for($j=0;$j<sizeof($arrSelectedClass);$j++)

		{

			$IndClass=$arrSelectedClass[$j];



				//$rslt = mysql_query("SELECT * FROM `classwork_master` a  where  `sclass`='$Class' and `subject`='$Subject' and `classworkdate`='$ClassworkDt'");



				$rslt = mysql_query("SELECT * FROM `classwork_master` a  where  `sclass`='$IndClass' and `subject`='$Subject' and `classworkdate`='$ClassworkDt'");



				if(mysql_num_rows($rslt)>0)
				{
					//$ssql = "UPDATE `classwork_master` SET `classwork`='$Classwork' WHERE `sclass`='$Class' and `subject`='$Subject' and `classworkdate`='$ClassworkDt'";						
					$ssql = "UPDATE `classwork_master` SET `classwork`='$Classwork',`datetime`=now(),`Status`='$SubmitType' WHERE `sclass`='$IndClass' and `subject`='$Subject' and `classworkdate`='$ClassworkDt'";						
				}
				else
				{
					$ssql = "INSERT INTO `classwork_master` (`sclass`,`subject`,`classworkdate`,`classwork`,`Status`) values ('$IndClass','$Subject','$ClassworkDt','$Classwork','$SubmitType')";
				}
				//echo $ssql . "<br>";
				if ($Classwork != "")
				{
					mysql_query($ssql) or die(mysql_error());
				}
				$rsltH = mysql_query("SELECT * FROM `homework_master` a  where  `sclass`='$IndClass' and `subject`='$Subject' and `homeworkdate`='$ClassworkDt'");
				if(mysql_num_rows($rsltH)>0)
				{
					//$ssqlHomeWork ="UPDATE `homework_master` SET `homework`='$Homework' WHERE `sclass`='$Class' AND `subject`='$Subject' AND `homeworkdate`='$ClassworkDt'";
					$ssqlHomeWork ="UPDATE `homework_master` SET `homework`='$Homework',`datetime`=NOW(),`Status`='$SubmitType' WHERE `sclass`='$IndClass' AND `subject`='$Subject' AND `homeworkdate`='$ClassworkDt'";
				}
				else
				{
					//$ssqlHomeWork = "INSERT INTO `homework_master` (`sclass`,`subject`,`homeworkdate`,`homework`) values ('$Class','$Subject','$ClassworkDt','$Homework')";
					$ssqlHomeWork = "INSERT INTO `homework_master` (`sclass`,`subject`,`homeworkdate`,`homework`,`Status`) values ('$IndClass','$Subject','$ClassworkDt','$Homework','$SubmitType')";
				}



				//echo $ssql . "<br>";



		

				if ($Homework != "")

				{

					mysql_query($ssqlHomeWork ) or die(mysql_error());

				}







		  }//end of class for loop		

		//echo $_REQUEST[$ClassworkCtrlName] . "<br>";

	}



	mysql_query("delete from `update_track` where `Activity`='classwork'") or die(mysql_error());

	mysql_query("insert into `update_track` (`Activity`) values ('classwork')") or die(mysql_error());



	mysql_query("delete from `update_track` where `Activity`='homework'") or die(mysql_error());

	mysql_query("insert into `update_track` (`Activity`) values ('homework')") or die(mysql_error());



	//////SENDING EMAILS TO THE STUDENTS OF THE CLASS

		//$to = "ashish.sharma@mobilise.co.in";



		/*

			$to = "inderprakash@gmail.com";

			$subject = $_REQUEST["txtSubject"];

			$txt = $_REQUEST["txtQuery"];

			$headers = "From: ashish.sharma@mobilise.co.in";

			mail($to,$subject,$txt,$headers);

		*/



	$subject="Classwork and Home work !";

	$headers = "MIME-Version: 1.0" . "\r\n";

	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers = "MIME-Version: 1.0" . "\r\n";

	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers

	//$headers .= 'From: communication@emeraldsis.com' . "\r\n";

	$headers .= 'From: '.$CommunicationEmailId. "\r\n";

	//$headers .= 'Cc: myboss@example.com' . "\r\n";

	//$ssqlMsg="select `email`,`sname` from `student_master` where `email` !='' and `sclass`='$Class'";

	  $ssqlMsg="select `email`,`sname`,`sclass`,`sadmission` from `student_master` where `email` !='' and `sclass` in ($SelectedClass)";

	$rsMsg= mysql_query($ssqlMsg);

		while($row1 = mysql_fetch_row($rsMsg))

		{

					$EmailID=$row1[0];

					$StudentName=$row1[1];

					$StudentClass4Email=$row1[2];

					$sadmission=$row1[3];

					$to = $EmailID;

					//$to = "inderprakash@gmail.com";

					$strEmail='';

					$strEmail=$strEmail . '<html>';

					$strEmail=$strEmail . '<head>';

					//$strEmail=$strEmail . '<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">';

					$strEmail=$strEmail . '<title>School-Classwork / Homework</title>';

					$strEmail=$strEmail . '<style type="text/css">';

					$strEmail=$strEmail . '.auto-style2 {';

					$strEmail=$strEmail . 'font-family: Cambria;';

					$strEmail=$strEmail . 'font-weight: normal;';

					$strEmail=$strEmail . 'font-style: normal;';

					$strEmail=$strEmail . 'text-decoration: none;';

					$strEmail=$strEmail . 'color: #CD2129;';

					$strEmail=$strEmail . 'font-size: 15px;';

					$strEmail=$strEmail . 'text-align: center;';

					$strEmail=$strEmail . 'margin-top: 0px;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style3 {';

					$strEmail=$strEmail . 'text-align: center;';

					$strEmail=$strEmail . 'font-family: Cambria;';

					$strEmail=$strEmail . 'font-size: 15px;';

					$strEmail=$strEmail . 'color: #CD2129;';

					$strEmail=$strEmail . 'border-left-color: #000000;';

					$strEmail=$strEmail . 'border-left-width: 1px;';

					$strEmail=$strEmail . 'border-right-color: #000000;';

					$strEmail=$strEmail . 'border-right-width: 1px;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style5 {';

					$strEmail=$strEmail . 'border-width: 0px;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style10 {';

					$strEmail=$strEmail . 'border-style: none;';

					$strEmail=$strEmail . 'border-width: medium;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style12 {';

					$strEmail=$strEmail . 'text-align: left;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style13 {';

					$strEmail=$strEmail . 'font-weight: normal;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style14 {';

					$strEmail=$strEmail . 'font-family: Cambria;';

					$strEmail=$strEmail . 'font-size: 15px;';

					$strEmail=$strEmail . 'color: #000000;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style15 {';

					$strEmail=$strEmail . 'text-align: center;';

					$strEmail=$strEmail . 'border-style: solid;';

					$strEmail=$strEmail . 'border-width: 1px;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style16 {';

					$strEmail=$strEmail . 'text-align: center;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style17 {';

					$strEmail=$strEmail . 'font-family: Cambria;';

					$strEmail=$strEmail . 'font-size: 15px;';

					$strEmail=$strEmail . 'color: #000000;';

					$strEmail=$strEmail . 'text-decoration: underline;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style18 {';

					$strEmail=$strEmail . 'font-family: Cambria;';

					$strEmail=$strEmail . 'font-size: 15px;';

					$strEmail=$strEmail . 'color: #CD2129;';

					$strEmail=$strEmail . 'text-align: center;';

					$strEmail=$strEmail . 'border-style: solid;';

					$strEmail=$strEmail . 'border-width: 1px;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style20 {';

					$strEmail=$strEmail . 'border-style: solid;';

					$strEmail=$strEmail . 'border-width: 1px;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '.auto-style21 {';

					$strEmail=$strEmail . 'font-family: Cambria;';

					$strEmail=$strEmail . 'font-size: 15px;';

					$strEmail=$strEmail . 'color: #CD2129;';

					$strEmail=$strEmail . 'border-style: none;';

					$strEmail=$strEmail . 'border-width: medium;';

					$strEmail=$strEmail . '}';

					$strEmail=$strEmail . '</style>';

					$strEmail=$strEmail . '</head>';

					$strEmail=$strEmail . '<body height="100%" width="100%" align="center" bgcolor="#EDEDED">';

					$strEmail=$strEmail . '<br>';

					$strEmail=$strEmail . '<div align="center">';

					$strEmail=$strEmail . '<table border="1" width="40%" style="border-width:0px; border-collapse: collapse; " bordercolor="#000000" id="table1">';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td style="border-bottom-style: none; border-bottom-width: medium; border-left-color:#000000; border-left-width:1px; border-right-color:#000000; border-right-width:1px" bgcolor="#FFFFFF">';

					$strEmail=$strEmail . '<p align="center">';

					//$strEmail=$strEmail . '<img border="0" src="http://emeraldsis.com/Users/images/emerald_logo.png"></td>';

					$strEmail=$strEmail . '<img border="0"  height="70px" width="250px" src="'.$SchoolLogo.'"></td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td class="auto-style3">';

					$strEmail=$strEmail . 'Student Information System - Daily School Information Update</td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td class="auto-style3">';

					$strEmail=$strEmail . 'Class - ' . $StudentClass4Email . '</td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td style="border-left:medium none #000000; border-right:medium none #000000; border-bottom-style:none; border-bottom-width:medium">';

					$strEmail=$strEmail . '<p class="auto-style12">';

					$strEmail=$strEmail . '<div class="auto-style16">';

					$strEmail=$strEmail . '<span style="font-family: Calibri; font-size: 15px; font-style: normal; text-decoration: none; color: #CC0033">';

					$strEmail=$strEmail . '<strong><br>Daily Work Details</strong></span></div>';

					$strEmail=$strEmail . '<table cellpadding="0" cellspacing="0" class="auto-style5" style="width: 100%">';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td class="auto-style18" style="width: 83px">';

					$strEmail=$strEmail . '<strong class="auto-style13"><strong>Subject</strong></strong></td>';

					$strEmail=$strEmail . '<td class="auto-style18" style="width: 124px">';

					$strEmail=$strEmail . '<strong class="auto-style13"><strong>Classwork</strong></strong></td>';

					$strEmail=$strEmail . '<td class="auto-style18"><strong>Homework</strong></td>';

					$strEmail=$strEmail . $StrClassWork;

					//$strEmail=$strEmail . '</tr>';

					//$strEmail=$strEmail . '<tr>';

					//$strEmail=$strEmail . '<td class="auto-style20" style="width: 83px">&nbsp;</td>';

					//$strEmail=$strEmail . '<td class="auto-style20" style="width: 124px">&nbsp;</td>';

					//$strEmail=$strEmail . '<td class="auto-style20">&nbsp;</td>';

					//$strEmail=$strEmail . '</tr>';

					//$strEmail=$strEmail . '<tr>';

					//$strEmail=$strEmail . '<td class="auto-style10" colspan="3">';

					//$strEmail=$strEmail . '<span class="auto-style17"><strong>Notice Issued:</strong></span><br>';

					//$strEmail=$strEmail . '<br><br></td>';

					//$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '<tr>';

					$strEmail=$strEmail . '<td class="auto-style21" colspan="3"><br><br>For further details, <br><br>';

					//$strEmail=$strEmail . 'please visit: <a href="http://www.emeraldsis.com">';

					//$strEmail=$strEmail . 'www.emeraldsis.com</a>';

					$strEmail=$strEmail . 'please visit: <a href="'.$BaseURL.'">';

					$strEmail=$strEmail . ''.$BaseURL.'</a>';

					$strEmail=$strEmail . '</td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '</table>';

					$strEmail=$strEmail . '</td>';

					$strEmail=$strEmail . '</tr>';

					$strEmail=$strEmail . '</table>';

					$strEmail=$strEmail . '</div>';

					$strEmail=$strEmail . '</body>';

					$strEmail=$strEmail . '</html>';

					//echo $strEmail;

					//exit();

			//COMMENTED ON 7-APR-2015

			//echo $EmailID . "<br>";

			//mail($to,$subject,$strEmail,$headers);

					

					if ($SubmitType=="FinalSubmit")

					{

						$ssql="INSERT INTO `email_delivery` (`sadmission`,`ToEmail`,`htmlcode`,`FromEmail`,`Subject`) VALUES ('$sadmission','$to','$strEmail','$CommunicationEmailId','$subject')";

						mysql_query($ssql) or die(mysql_error());

						echo "To:" . $to . ",Class:" . $MyClass . ",RollNo:" . $MyRollNo . "<br>";

					}

		}


echo "<br><center><b>Submitted Successfully!";
	   	exit();
		//***********SENDING GCM**************
		if ($SubmitType=="FinalSubmit")
		{
				$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='DailyWork'";
		   		$reslt = mysql_query($ssqlActivity , $Con);
		    	while($rowa = mysql_fetch_assoc($reslt))
			   	{
			   		$message1=$rowa['gcm_message'];
			   		$message1=str_replace(" ","%20",$message1);    
			   	}
			   	
				$ssqlGCM = "select `email`,`sname`,`sadmission`,`GCMAccountId`,`sclass`,`srollno` from `user_master` where `GCMAccountId` !='' and `sclass`in ($SelectedClass)";
		   		$result = mysql_query($ssqlGCM , $Con);
		    	while($row = mysql_fetch_assoc($result))
			   	{
			   		$registrationIDs = $row['GCMAccountId'];
					$regId=$row['sadmission'];
					$GCMClass=$row['sclass'];
					$GCMRollNo=$row['srollno'];
					
					$message2=$GCMClass.",".$GCMRollNo.",".$message1;
			   		$message2=str_replace(" ","%20",$message2);    
				    
				    //$url1 = 'http://emeraldsis.com/school/SendGCM.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message1;
				    $url1 = 'http://aravalisisgcm.in/school/SendGCMDPS.php?RegistrationId=' . $registrationIDs . '&mymessage=' . $message2;
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
		}
	   	echo "<br><center><b>Submitted Successfully!";
	   	exit();

	   	//***************SENDING SMS***********************

	   	$ssqlMsg="select `sname`,`smobile`,`sadmission`,`sclass`,`srollno` from `student_master` where `smobile` !='' and `sclass` in ($SelectedClass)";

	   	$rsMsg= mysql_query($ssqlMsg);

		while($row1 = mysql_fetch_row($rsMsg))
		{

					$StudentName=$row1[0];

					$StudetnMobile=$row1[1];

					$sAdmission=$row1[2];

					$Class=$row1[3];

					$RollNo=$row1[4];

					

					//$StudetnMobile="9818243377";

					echo "$StudentName" . "-" . $StudetnMobile . "<br>";

					//Sending SMS

					//$notice=%20

					$notice=$SMSHomeWork;

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

					

					if ($SubmitType=="FinalSubmit")
					{

						$ssql="insert into `sms_logs` (`sname`,`sadmission`,`sclass`,`rollno`,`smstype`,`mobileno`,`message`,`sentdate`) values ('$StudentName','$sAdmission','$Class','$RollNo','SMS Communication','$StudetnMobile','$notice','$currentdate')";

						//mysql_query($ssql) or die(mysql_error());

					}



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

<table style="width: 100%; border-collapse:collapse" class="style1" border="1" cellspacing="0" cellpadding="0"><tr>		

	<td class="style4" width="33.33%" colspan="4" style="height: 22px" align="center" bgcolor="#95C23D">

	<b><a href="frmClassWork.php">

	<font color="#000000" face="Cambria">Upload Class Work &amp; Homework</font></a></b></td>		

	<td class="style4" width="33.33%" colspan="4" style="height: 22px" align="center">

	<b><a href ="UploadClasswork.php">

	<font color="#000000" face="Cambria">Previous Uploaded Class Work Report</font></a></b></td>		

	<td class="style4" width="33.33%" colspan="4" style="height: 22px" align="center">

	<b><a href ="UploadHomework.php">

	<font color="#000000" face="Cambria">Previous Uploaded Home Work Report</font></a></b></td>	</tr>		</table>

<?php

	echo "<br><br><center><b>Class work / Home work have been uploaded successfully";

?>

<a href="javascript:history.back(2)">

<img height="30" src="images/BackButton.png" width="70" style="float: right"></a>



<div class="footer" align="center">



    <div class="footer_contents" align="center">



		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>



</div>

</body>



<html>







