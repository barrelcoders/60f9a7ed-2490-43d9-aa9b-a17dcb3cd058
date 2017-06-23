<?php include '../../connection.php';?>
<?php include '../../AppConf.php';?>




<?php

$strMsg="Enquiry Count:";

$currentdate=date("Y-m-d");

	$ssql="SELECT count(*) as `cnt` FROM `InquiryDetail` WHERE `EntryDate`='$currentdate'";

	$rs= mysql_query($ssql);

		if (mysql_num_rows($rs) > 0)

		{

			while($row = mysql_fetch_row($rs))

			{

				$Cnt=$row[0];

				$strMsg=$strMsg.$Cnt;

			}

		}

		else

		{

			$Cnt=0;

			$strMsg=$strMsg.$Cnt;

		}

	

	$strMsg=$strMsg.",Form Count:";	

	$ssql="SELECT count(*) as `cnt` FROM `RegistrationFees` WHERE `date`='$currentdate' and `FormNo` != ''";

	$rs1= mysql_query($ssql);

		if (mysql_num_rows($rs1) > 0)

		{

			while($row = mysql_fetch_row($rs1))

			{

				$Cnt=$row[0];

				$strMsg=$strMsg.$Cnt;

			}

		}

		else

		{

			$Cnt=0;

			$strMsg=$strMsg.$Cnt;

		}

		

	$strMsg=$strMsg.",Registration Count:";	

	$ssql="SELECT count(*) as `cnt` FROM `RegistrationFees` WHERE `date`='$currentdate' and `RegistrationNo` != ''";

	$rs2= mysql_query($ssql);

		if (mysql_num_rows($rs2) > 0)

		{

			while($row = mysql_fetch_row($rs2))

			{

				$Cnt=$row[0];

				$strMsg=$strMsg.$Cnt;

			}

		}

		else

		{

			$Cnt=0;

			$strMsg=$strMsg.$Cnt;

		}

		

	$strMsg=$strMsg.",Admission Count:";	

	$ssql="SELECT count(*) as `cnt` FROM `AdmissionFees` WHERE `EntryDate`='$currentdate'";

	$rs3= mysql_query($ssql);

		if (mysql_num_rows($rs3) > 0)

		{

			while($row = mysql_fetch_row($rs3))

			{

				$Cnt=$row[0];

				$strMsg=$strMsg.$Cnt;

			}

		}

		else

		{

			$Cnt=0;

			$strMsg=$strMsg.$Cnt;

		}

		

		//echo $strMsg;

		//SENDING SMS TO School Administration

								//$StudentMobile="9650217779";

								$StudentMobile="9818243377";

								//$StudentMobile="9971020670";

								$notice=strip_tags($strMsg);

								$notice=str_replace(" ","%20",$notice);					

								$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $StudentMobile . "&sms=" . $notice . "&senderid=SCHOOL";

								//echo $url;

								//exit();

								 // create a new cURL resource

								$ch = curl_init();

								// set URL and other appropriate options

								curl_setopt($ch, CURLOPT_URL, $url);

								curl_setopt($ch, CURLOPT_HEADER, 0);

								// grab URL and pass it to the browser

								

								curl_exec($ch);

								

								// close cURL resource, and free up system resources

								if(curl_errno($ch))

								{ 

									echo 'Curl error: ' . curl_error($ch); 

								}

								curl_close($ch);

		exit();

?>