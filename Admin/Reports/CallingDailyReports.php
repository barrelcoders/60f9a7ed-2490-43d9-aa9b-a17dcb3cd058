<?php include '../../connection.php';?>
<?php
//$ssql="SELECT `Employee_Id`,`Report_URL`,(select `email` from `employee_master` where `EmpId`=a.`Employee_Id`) as `EmpEmail` FROM `report_master` as `a` WHERE `Send_On_Email`='Yes' and `Employee_Id`!=''";
$ssql="SELECT `Employee_Id`,`Report_URL` FROM `report_master` WHERE `Send_On_Email`='Yes' and `Employee_Id`!=''";
$rs= mysql_query($ssql);
while($row = mysql_fetch_row($rs))
{
	$ExecuteURL=$row[1];
					$ch = curl_init();
					// set URL and other appropriate options
					curl_setopt($ch, CURLOPT_URL, $ExecuteURL);
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