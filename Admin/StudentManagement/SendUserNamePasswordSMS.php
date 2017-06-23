<?php include '../../connection.php';?>

<?php include '../../AppConf.php';?>
<?php
$action = $_REQUEST["action"];
//$sadmission= $_REQUEST["sadmission"];

//////////
$aDoor = $_REQUEST['chkAdmissionId'];
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
	$ssql="select `sadmission`,`smobile`,`sname`,`sclass`,`srollno`,`spassword` from `student_master` where `sadmission`='$sadmission'";
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
						//$msg="Dear Parents, The user id and password to use School Information System is User Id:".$sadmission.", Password:".$Password;
						$msg="Dear Parent, https://play.google.com/store/apps/details?id=com.sis.paulgeorgeglobalschool The user id and password to use SIS is User Id:".$sadmission.", Password:".$Password." Please write at support@eduworldtech.com for any further support.";
	
	//$smobile="9213204824";
	
	
	$ssql="insert into `sms_logs` (`sname`,`sadmission`,`sclass`,`rollno`,`smstype`,`mobileno`,`message`,`sentdate`) values ('$StudentName','$sadmission','$Class','$RollNo','SMS Communication','$smobile','$msg','$currentdate')";
	//echo $ssql."<br>";
	mysql_query($ssql) or die(mysql_error());	
	}//End of While Loop
	}//End of For Loop
  }
	echo "<br><br><center><b>Message Successfully Sent!";
	
?><html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled 1</title>
</head>

<body>

</body>

</html>
