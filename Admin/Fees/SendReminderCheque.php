<?php
session_start();
include '../../connection.php'; 

$srno=$_REQUEST["srno"];
$currentdate=date("Y-m-d");		
$rs=mysql_query("SELECT `receipt`, `amountpaid`,`chequeno`,`cheque_date`,`bankname`,`cheque_status`,`sadmission`,`sname`,`sclass`,`srollno`,`bankname`,`srno`,(select `smobile` from `student_master` where `sadmission`=a.`sadmission`) from `fees` as `a` where `srno`='$srno'");
while($row = mysql_fetch_row($rs))
				{
							$ReceiptNo=$row[0];
							$finalamount=$row[1];
							$chequeno=$row[2];
							$cheque_date=$row[3];
							$bankname=$row[4];
							$cheque_status=$row[5];
							$sadmission=$row[6];
							$sname=$row[7];
							$sclass=$row[8];
							$srollno=$row[9];
							$bankname=$row[10];
							$srno=$row[11];
							$smobile=$row[12];
							
}							
					$Message="Dear Parent, The cheque no:".$chequeno." of amount: ".$finalamount." (".$bankname.") of your ward has bounced,Please submit a cheque for fees again.";
					$Message=strip_tags($Message);
					$Message=str_replace("&","and",str_replace(" ","%20",$Message));
					
					$ssql="insert into `sms_logs` (`sname`,`sadmission`,`sclass`,`rollno`,`smstype`,`mobileno`,`message`,`sentdate`) values ('$sname','$sadmission','$sclass','$srollno','Chequ Bounce SMS','$smobile','$Message','$currentdate')";
					mysql_query($ssql) or die(mysql_error());
							
					//$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $RecipientMobileNo . "&sms=" . $Message . "&senderid=SCHOOL";
					$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $smobile. "&sms=" . $Message . "&senderid=SCHOOL";

					//echo $url."<br>";
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
					echo "<br><br><center><b> Reminder has been sent successfully!";
?>