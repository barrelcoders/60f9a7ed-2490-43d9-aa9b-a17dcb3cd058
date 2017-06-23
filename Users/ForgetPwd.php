<?php 
include '../connection.php';
?>
<?php
$userid=$_REQUEST["userid"];
$rs=mysql_query("select `spassword`,`smobile`,`sname`,`sadmission`,`sclass`,`srollno` from `user_master` where `suser`='$userid'");
$row=mysql_fetch_row($rs);
$Pwd=$row[0];
$smobile=$row[1];
//$smobile="9971020670";
$sname=$row[2];
$sadmission=$row[3];
$sclass=$row[4];
$srollno=$row[5];
$curdate=Date('Y-m-d');

if($Pwd !="")
{
	$Msg="Your Password is:".$Pwd;
	//echo "insert into `sms_logs` (`sname`, `sadmission`, `sclass`, `rollno`, `smstype`, `mobileno`, `message`,`sentdate`) values ('$sname','$sadmission','$sclass','$srollno','SMS Communication','$smobile','$Msg','$curdate')";
	//exit();
	if($smobile !="")
	{
	mysql_query("insert into `sms_logs` (`sname`, `sadmission`, `sclass`, `rollno`, `smstype`, `mobileno`, `message`,`sentdate`) values ('$sname','$sadmission','$sclass','$srollno','SMS Communication','$smobile','$Msg','$curdate')");	
	echo "<br><br><center><b>Password has been shared on ".$smobile." through sms<br>Click <a href='javascript:window.close();'>here</a> to close window!";
	}
	else
	{
		echo "<br><br><center><b>Mobile No not available<br>Click <a href='javascript:window.close();'>here</a> to close window!";
	}
}
else
{
	echo "<br><br><center><b>Password not Found!";
}

?>
