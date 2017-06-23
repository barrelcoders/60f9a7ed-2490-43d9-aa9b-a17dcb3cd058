<?php
	session_start();
	include '../../connection.php';
	include '../../AppConf.php';
?>
 <?php
 


if($_POST['TxStatus']=="SUCCESS"){ 
    $smobile=$_POST['mobileNo'];
    $FirstName=$_POST['firstName'];
    $LastName=$_POST['lastName'];
     $message=urlencode("Dear $FirstName $LastName, Your Payment has been successfull");
            
  $SendSMSurl= "http://prioritysms.tulsitainfotech.com/api/mt/SendSMS?user=user10&password=sms@123&senderid=DPSROH&channel=trans&DCS=0&flashsms=0&number=$smobile&text=$message&route=15";         

//------------------curl request for send api--------------------------------------
 $cSession = curl_init(); 
//step2
curl_setopt($cSession,CURLOPT_URL,$SendSMSurl);
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
//step3
$result=curl_exec($cSession);
//step4
curl_close($cSession);
//step5

//$to = "roymanish28@gmail.com";
$email=$_POST['email'];
$to=$email;
$subject = "DPS Rohini Payment Info";

$message = "
<html>
<head>
<title>Dear $FirstName $LastName</title>
</head>
<body>
<p><h2>Dear $FirstName $LastName</h2></p>
<p>You Payment has been done successfully</p>
<table>
<tr>
<th>Thanks & Regards</th>
<th> <th>
</tr>

<tr>
<th>DPS Admin</th>
<th> <th>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <info@webplanet.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
        }
        
        
       echo "<pre />";print_r($_POST);die; 

 
	//set_include_path('../lib'.PATH_SEPARATOR.get_include_path());
	
        //Replace this with your secret key from the citrus panel
	$secret_key = "ac3d61806bd38e9dd0c3b3a8d42082143b5ba3a9";
	 
	$data = "";
	$flag = "true";
	if(isset($_POST['TxId'])) {
		$txnid = $_POST['TxId'];
		$data .= $txnid;
	}
	 if(isset($_POST['TxStatus'])) {
		$txnstatus = $_POST['TxStatus'];
		$data .= $txnstatus;
	 }
	 if(isset($_POST['amount'])) {
		$amount = $_POST['amount'];
		$data .= $amount;
	 }
	 if(isset($_POST['pgTxnNo'])) {
		$pgtxnno = $_POST['pgTxnNo'];
		$data .= $pgtxnno;
	 }
	 if(isset($_POST['issuerRefNo'])) {
		$issuerrefno = $_POST['issuerRefNo'];
		$data .= $issuerrefno;
	 }
	 if(isset($_POST['authIdCode'])) {
		$authidcode = $_POST['authIdCode'];
		$data .= $authidcode;
	 }
	 if(isset($_POST['firstName'])) {
		$firstName = $_POST['firstName'];
		$data .= $firstName;
	 }
	 if(isset($_POST['lastName'])) {
		$lastName = $_POST['lastName'];
		$data .= $lastName;
	 }
	 if(isset($_POST['pgRespCode'])) {
		$pgrespcode = $_POST['pgRespCode'];
		$data .= $pgrespcode;
	 }
	 if(isset($_POST['addressZip'])) {
		$pincode = $_POST['addressZip'];
		$data .= $pincode;
	 }
	 if(isset($_POST['signature'])) {
		$signature = $_POST['signature'];
	 }
     
         $respSignature = hash_hmac('sha1', $data, $secret_key);
	 if($signature != "" && strcmp($signature, $respSignature) != 0) {
		$flag = "false";
	 }
 ?>
<?php 
if ($txnid != "")
{
			$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[1];
           	$Year=$row4[0];	


			$currentdate=date("d-m-Y");
			$currentdate1=date("Y-m-d");
			
			$ssql="UPDATE `NewStudentRegistration_temp` SET `TxnStatus`='$txnstatus',`PGTxnId`='$pgtxnno' where `TxnId`='$txnid'";
			mysql_query($ssql) or die(mysql_error());
			
			//if($txnstatus !="SUCCESS")
			//{
				//echo "<br><br><center>Your Transaction was not successfully completed!<br>You are requested to kindly submit the registration form again<br><br>Click <a href='StudentRegistration.php'>here</a> to restart the registration process!";
				//exit();
			//}
			
			$ssqlRegi="SELECT max(CAST(replace(`RegistrationNo`,'N','') AS SIGNED INTEGER)) FROM `NewStudentRegistration` as `a`";	
			$rsRegiNo1= mysql_query($ssqlRegi);
			if (mysql_num_rows($rsRegiNo1) > 0)
			{
				while($row2 = mysql_fetch_row($rsRegiNo1))
				{
							$NewRistrationNo=$row2[0]+1;
				}
			}
			else
			{
				$NewRistrationNo=1;
			}
			$NewRistrationNo="N".$NewRistrationNo;
			
			$rsCnt=mysql_query("SELECT max(CONVERT(replace(`FeeReceipt`,'MR/".$CurrentFinancialYear."/',''),UNSIGNED INTEGER)) as `cnt` FROM `fees_misc_collection`");
			if (mysql_num_rows($rsCnt) > 0)
			{
				while($rowCnt = mysql_fetch_row($rsCnt))
				{
					if($rowCnt[0]=="")
					{
						$NewSrNo="1";
					}
					else
					{
						$NewSrNo=$rowCnt[0]+1;
					}
					break;
				}
			}
			else
			{
				$NewSrNo="1";
			}

			
			$ReceiptNo="MR/".$CurrentFinancialYear."/".$NewSrNo;
			mysql_query("UPDATE `NewStudentRegistration_temp` SET `RegistrationNo`='$NewRistrationNo',`RegistrationFormNo`='$ReceiptNo' where `TxnId`='$txnid'") or die(mysql_error());
			
			$rsChk= mysql_query("select * from `NewStudentRegistration` where `TxnId`='$txnid'");
			if (mysql_num_rows($rsChk) == 0)
			{
				mysql_query("insert into NewStudentRegistration(`RegistrationNo`,`RegistrationDate`,`sname`,`slastname`,`DOB`,`PlaceOfBirth`,`Age`,`AgeYear`,`AgeMonth`,`AgeDays`,`Sex`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`Staff`,`EWSCategory`,`OtherCategory`,`MotherTongue`,`Nationality`,`ResidentialAddress`,`Location`,`Distance`,`PhoneNo`,`smobile`,`sclass`,`MasterClass`,`LastSchool`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherQualificationDuration`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherQualificationDuration`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`RealBroSisName`,`RealBroSisAdmissionNo`,`RealBroSisClass`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactNo`,`RegistrationFormNo`,`email`,`ProfilePhoto`,`status`,`Remarks`,`quarter`,`FinancialYear`,`SchoolId`,`TxnAmount`,`TxnId`,`TxnStatus`,`BirthCertificate`,`ScoreCard`,`Stream`,`OptionalSubjects`,`EnglishMarks`,`EnglishGrade`,`EnglishPercentage`,`MathsMarks`,`MathsGrade`,`MathsPercentage`,`ScienceMarks`,`ScienceGrade`,`SciencePercentage`,`SSTMarks`,`SSTGrade`,`SSTPercentage`,`LanguageMarks`,`LanguageGrade`,`LanguagePercentage`,`FamilyAnnualIncome`,`Twin`,`Triplet`,`AadharNumber`,`SpecialNeedDetail`,`SpecialNeedDescription`) select `RegistrationNo`,`RegistrationDate`,`sname`,`slastname`,`DOB`,`PlaceOfBirth`,`Age`,`AgeYear`,`AgeMonth`,`AgeDays`,`Sex`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`Staff`,`EWSCategory`,`OtherCategory`,`MotherTongue`,`Nationality`,`ResidentialAddress`,`Location`,`Distance`,`PhoneNo`,`smobile`,`sclass`,`MasterClass`,`LastSchool`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherQualificationDuration`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherQualificationDuration`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`RealBroSisName`,`RealBroSisAdmissionNo`,`RealBroSisClass`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactNo`,`RegistrationFormNo`,`email`,`ProfilePhoto`,`status`,`Remarks`,`quarter`,`FinancialYear`,`SchoolId`,`TxnAmount`,`TxnId`,`TxnStatus`,`BirthCertificate`,`ScoreCard`,`Stream`,`OptionalSubjects`,`EnglishMarks`,`EnglishGrade`,`EnglishPercentage`,`MathsMarks`,`MathsGrade`,`MathsPercentage`,`ScienceMarks`,`ScienceGrade`,`SciencePercentage`,`SSTMarks`,`SSTGrade`,`SSTPercentage`,`LanguageMarks`,`LanguageGrade`,`LanguagePercentage`,`FamilyAnnualIncome`,`Twin`,`Triplet`,`AadharNumber`,`SpecialNeedDetail`,`SpecialNeedDescription` from `NewStudentRegistration_temp` where `TxnId`='$txnid'") or die(mysql_error());
				mysql_query("insert into `fees_misc_collection` (`date`,`HeadName`,`Source`,`sadmissionno`,`sname`,`sclass`,`Amount`,`PaymentMode`,`TxnId`,`TxnStatus`,`PGTxnId`,`Status`,`FeeReceipt`,`HeadType`,`financialyear`) select 'currentdate1','Registration Fees',`sname`,'$NewRistrationNo',`sname`,`sclass`,`TxnAmount`,'Online',`TxnId`,`TxnStatus`,'$pgtxnno',`status`,'$ReceiptNo','Regular',`FinancialYear` from `NewStudentRegistration_temp` where `TxnId`='$txnid'") or die(mysql_error());
			}
			
			$ssqlRegi="SELECT `sname`,`slastname`,`RegistrationNo`,`sclass`,`TxnAmount`,`smobile`,`email` FROM `NewStudentRegistration` as `a` where `TxnId`='$txnid'";	
			$rsRegiNo1= mysql_query($ssqlRegi);
			if (mysql_num_rows($rsRegiNo1) > 0)
			{
				while($row2 = mysql_fetch_row($rsRegiNo1))
				{
							$sname=$row2[0];
							$slastname=$row2[1];
							$StudentName=$sname." ".$slastname;
							$RegistrationNo=$row2[2];
							$sclass=$row2[3];
							$TxnAmount=$row2[4];	
							$smobile=$row2[5];						
							$email=$row2[6];
							break;						
							
				}
			}
			
			//Sending SMS*****************
					$notice="Dear Parent, Your registration process for Student:".$sname." for Class: ".$sclass." at DPS Sec 24 Rohini. has been successfully completed. Reg no. :".$RegistrationNo." , Txn id: ".$txnid.", Amt: ".$TxnAmount.", Please use the same for future communication.";
					$Emailnotice="Dear Parent, Your registration process for Student:".$sname." for Class: ".$sclass." at DPS Sec 24 Rohini. has been successfully completed. Reg no. :".$RegistrationNo." , Txn id: ".$txnid.", Amt: ".$TxnAmount.", Please use the same for future communication.<br>Regards,<br>DPS Sector 24 Rohini";
					$notice=strip_tags($notice);
					$notice=str_replace("&","and",str_replace(" ","%20",$notice));
					$StudentMobile=$smobile;
					//$StudetnMobile="9818243377";
					//$url="http://mainadmin.dove-sms.com/sendsms.jsp?user=MALLLP&password=D@ve12&mobiles=" . $StudentMobile . "&sms=" . $notice . "&senderid=SCHOOL";
					
					$url="http://messagebhejo.com/submitsms.jsp?user=Eduworld&key=ea0e1f127cXX&mobile=".$StudentMobile ."&message=".$notice ."&senderid=INFOSM&accusage=1";

					
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
					//curl_close($ch);
			//***************************
			//Sending Email**************
			$to=$email;
			//$to="itismeashishs@gmail.com";
		  	$subject = "New Registration Confirmation Mail";
		  	$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			$headers .= 'From: info@dpsfsis.com' . "\r\n";
			$headers .= 'Cc: admissions@dpsfsis.com' . "\r\n";
			
			//mail($to,$subject,$Emailnotice,$headers);
			
			//******************
			
}
else
{
	exit();
}
?>

<script language="javascript">

function printDiv() 
{

        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + 

          divElements + "</body>";



        //Print Page

        window.print();



        //Restore orignal HTML

        document.body.innerHTML = oldPage;

 }

function CreatePDF() 
{
		
        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";

		document.frmPDF.htmlcode.value = "<html><head><title></title></head><body>" + divElements + "</body>";
		//document.frmPDF.txtprintdiv.value =document.getElementById("divPrint").innerHTML;
		//alert(document.frmPDF.htmlcode.value);
		//document.frmPDF.submit;
		document.getElementById("frmPDF").submit();
		//document.all("frmPDF").submit();
		return;
		//alert(document.getElementById("htmlcode").value);		 
 
        //Print Page
		
        //window.print();
        var FileLocation="CreatePDF.php?htmlcode=" + escape(document.body.innerHTML);
		window.location.assign(FileLocation);
		return;


        //Restore orignal HTML

        //document.body.innerHTML = oldPage;

 }

function CreatePDF1() 
{
		var divElements = document.getElementById("MasterDiv").innerHTML;
        //Get the HTML of whole page
        var oldPage = document.body.innerHTML;
        //Reset the page's HTML with div's HTML only
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body></html>";

		
	try
		 {    
				// Firefox, Opera 8.0+, Safari    
				xmlHttp=new XMLHttpRequest();
		 }
		  catch (e)
		    {    // Internet Explorer    
				try
			      {      
					xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				  }
			    catch (e)
			      {      
					  try
				        { 
							xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
				      catch (e)
				        {        
							alert("Your browser does not support AJAX!");        
							return false;        
						}      
				  }    
			 } 
			 xmlHttp.onreadystatechange=function()
		      {
			      if(xmlHttp.readyState==4)
			        {
						var rows="";
			        	rows=new String(xmlHttp.responseText);
						alert(rows);
			        	//document.getElementById("txtAnnualFeeDiscount").value=rows;
						//alert(rows);														
			        }

		      }

			var submiturl="CreatePDF.php?htmlcode=" + escape(document.body.innerHTML) + "&receiptno=" + document.getElementById("receiptno").value;
			xmlHttp.open("POST", submiturl,true);
			xmlHttp.send(null);
}
</script>

<html>



<head>

<meta http-equiv="Content-Language" content="en-us">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title><?php echo $SchoolName; ?> </title>

<style type="text/css">
.style1 {
	border-collapse: collapse;
}
.style2 {
	font-family: Cambria;
}
.style3 {
	font-weight: bold;
	text-decoration: underline;
}
</style>



	



</head>

<!--<body onload="Javascript:CreatePDF();">-->
<body>

<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >

	<div align="center">
<table style="width: 61%">
<tr>
<td>
<h1 align="center"><b><font face="cambria"><img src="<?php echo $SchoolLogo; ?>" height="100px" width="400px"></font></b></h1>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b><?php echo $SchoolAddress; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b>Phone No: <?php echo $SchoolPhoneNo; ?></b></font>
</td>
</tr>
<tr>
<td align="center">
<font face="cambria"><b>Email Id: <?php echo $SchoolEmailId; ?></b></font>
</td>
</tr>
</table>
</div>

	
	<p align="center" class="style3" ><font face="Cambria">Registration Fees Receipt</font></p>
	
	<p align="center"><b><span class="style2">Receipt No. <?php echo $ReceiptNo; ?>
	</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<span class="style2">Date: 	</span><?php echo date("d-m-Y"); ?></b></p>
	
										

	<div align="center">

		<table cellpadding="0" style="border-style:dotted; border-width:1px; width: 61%; border-collapse:collapse; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 175px">

				<font face="Cambria">Student Name</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 25px; width: 152px">

				<font face="Cambria">

				<?php echo $StudentName; ?>
				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<span class="style2">Registration</span><font face="Cambria"> No</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<font face="Cambria">

				<?php echo $RegistrationNo; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 25px; width: 175px" >

				<font face="Cambria">Student Class</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 25px; width: 152px">

				<font face="Cambria">

				<?php echo $sclass; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<span class="style2">Registration</span><font face="Cambria"> Fees Amount</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<font face="Cambria">

				<?php echo $TxnAmount; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<b>

				<font face="Cambria">Total Fees Paid</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<b><font face="Cambria">

				<?php echo $TxnAmount; ?></font></b></td>

			</tr>

		</table><br>
		<table style="width: 66%" class="style1">
			<tr>
				<td>
				<ul>
					<li><font face="Cambria"><em>Registration Fee is Non - 
					Refundable</em></font> </li>
				</ul>
				</td>
			</tr>
		</table>
&nbsp;</div>

	<p align="center"><font face="Cambria"><strong>This is an electronically 
	generated receipt and does not require any signature.</strong></font></p>
<form name="frmPDF" id="frmPDF" method="post" action="Admin/StudentManagement/CreatePDF.php">
		<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
		<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">
		<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $NewReciptNo;?>">
		<input type="hidden" name="txtprintdiv" id="txtprintdiv" value="">
</form>	
</div>
	
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a>	| <a href="Registration.php">HOME</a>
</font> 
	
</div>
</body>

</html>
