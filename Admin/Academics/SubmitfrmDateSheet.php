<?php
session_start();
include '../../connection.php';
include '../Header/Header3.php';
include '../../AppConf.php';
?>
<?php

	//$Class = $_REQUEST["cboClass"];
	$Class = $_REQUEST["txtSelectedClass"];
$sstr= str_replace("'","",str_replace("','",",",$Class));
$arr1=explode(',',$sstr);
/*
foreach ($arr as $value) 
{
    echo "$value <br>";
}
exit();
*/
	$TestType = $_REQUEST["cboTestType"];

	

	

	$TotalSubject = $_REQUEST["totalSubject"]-1;

	

	for ($i=1;$i<=$TotalSubject;$i++)

	{

		$CtrlSubjectName = "txtName" . $i;

		$CtrlDate = "txtDate" . $i;

	

		$SubjectName = $_REQUEST[$CtrlSubjectName];

		

		$Dt = $_REQUEST[$CtrlDate];

		$arr=explode('/',$Dt);

		$DtateDt = $arr[2] . "-" . $arr[0] . "-" . $arr[1];

	

		//$Attendance = $_REQUEST[$CtrlAttendance];

		
		foreach ($arr1 as $value1) 
		{
   			// echo "$value <br>";

		$ssql = "INSERT INTO `datesheet` (`sclass`,`subject`,`testdate`,`testtype`) values ('$value1','$SubjectName','$DtateDt','$TestType')";
		//echo $ssql;
		mysql_query($ssql) or die(mysql_error());
		}

		

		mysql_query("delete from `update_track` where `Activity`='datesheet'") or die(mysql_error());
		mysql_query("insert into `update_track` (`Activity`) values ('datesheet')") or die(mysql_error());

		

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

	

	<p>&nbsp;</p>

	

	<table style="width: 100%" class="style1">

	

	<tr>

		<td class="style4" colspan="4" align="center" style="border-style: solid; border-width: 1px" bgcolor="#95C23D">
		<font face="Cambria"><strong>Upload Date Sheet</strong></td>		
		<td class="style4" colspan="4" align="center" width="50%" style="border-style: solid; border-width: 1px">
		<font face="Cambria"><strong><a href="UploadDateSheet.php">
		<span style="text-decoration: none">Uploaded Date Sheet Report</span></a></strong></font></td>		</font>

	</tr></table>	

	

	<div class="footer" align="center">

    <div class="footer_contents" align="center">

		<font color="#FFFFFF" face="Cambria" size="2">Powered by Online School Planet</font></div>

</div>

</body>

	</html>

	<?php

	echo "<br><br><center><b>Date Sheet have been uploaded successfully";

	

	$ssqlActivity = "select `gcm_message` from `gcm_message` where `Activity` ='DateSheet'";

   		$reslt = mysql_query($ssqlActivity , $Con);

    while($rowa = mysql_fetch_assoc($reslt))

	   {

	   		$message1=$rowa['gcm_message'];

	   		$message1=str_replace(" ","%20",$message1);    

	   }

		
		$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `user_master` where `GCMAccountId` !='' and `sclass` in (".$Class.")";
		
		//$ssqlGCM = "select `email`,`sname`,`GCMAccountId` from `user_master` where `GCMAccountId` !='' and `sclass`='$Class'";


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





?>