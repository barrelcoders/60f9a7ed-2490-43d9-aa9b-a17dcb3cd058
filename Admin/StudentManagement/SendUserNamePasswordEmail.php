<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>
<?php
$action = $_REQUEST["action"];
//$sadmission= $_REQUEST["sadmission"];

$aDoor = $_REQUEST['chkAdmissionId4Email'];
  if(empty($aDoor)) 
  {
    echo("<br><br><center><b>You didn't select any check-box.");
    exit();
  } 
  else
  {
    $N = count($aDoor);
    //echo("You selected $N door(s): ");
    for($i=0; $i < $N; $i++)
    {
      //echo($aDoor[$i] . " ");
     	$sadmission=$aDoor[$i];
		
		if ($sadmission!="")
		$ssql="select `sadmission`,`smobile`,`sname`,`sclass`,`srollno`,`spassword`,`email` from `student_master` where `sadmission`='$sadmission'";
		//echo $ssql;
		//exit();
		$rs=mysql_query($ssql);
		$currentdate=date("Y-m-d");
		while($row = mysql_fetch_row($rs))
		{
			$sadmission=$row[0];
			$smobile=$row[1];
							$StudentName=$row[2];
							$Class=$row[3];
							$RollNo=$row[4];
							$Password=$row[5];
							$Email=$row[6];
		
						
			//Sending SMS*****************
				
								$notice="Dear Parent, https://play.google.com/store/apps/details?id=com.sis.paulgeorgeglobalschool The user id and password to use SIS is User Id:".$sadmission.", Password:".$Password." Please write at support@eduworldtech.com for any further support.";
								$Emailnotice="Dear Parent, https://play.google.com/store/apps/details?id=com.sis.paulgeorgeglobalschool The user id and password to use SIS is User Id:".$sadmission.", Password:".$Password." Please write at support@eduworldtech.com for any further support.";
							
							
							$notice=strip_tags($notice);
							$notice=str_replace("&","and",str_replace("%20 ","",$notice));
							//$StudentMobile=$smobile;
							
							
					//Sending Email**************
					//$to=$Email;
					$to="himanshu@eduworldtech.com";
				  	$subject = "Login Details For the Student Portal";
				  	$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					
					// More headers
					//$headers .= 'From: communication@pggs.com' . "\r\n";
					//$headers .= 'Cc: info@pggs.com' . "\r\n";
					mysql_query("insert into `email_delivery` (`sadmission`, `ToEmail`, `htmlcode`, `FromEmail`, `Subject`, `date`) values ('$sadmission','$to','$notice','$CommunicationEmailId','$subject','$currentdate')");
		
		
					//mail($to,$subject,$Emailnotice,$headers);
					
					//******************
			//echo $ssql."<br>";
			//mysql_query($ssql) or die(mysql_error());	
		}//End of While Loop
		
	}//End of For Loop
	echo "<br><br><center><b>MAIL Successfully Sent!";
}//End of If Condition
?>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>

</body>

</html>
