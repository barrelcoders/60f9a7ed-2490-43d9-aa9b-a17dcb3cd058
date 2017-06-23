<?php
session_start();
include '../../connection.php';
include '../../AppConf.php';
include '../Header/Header3.php';
?>
	
<?php 
if ($_REQUEST["txtName"] != "")
{
			$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[1];
           	$Year=$row4[0];	
           	
			$currentdate=date("d-m-Y");
			
			$cboPaymentMode=$_REQUEST["cboPaymentMode"];
			
			$txtChequeNo=$_REQUEST["txtChequeNo"];
			$cboClass=$_REQUEST["cboClass"];
			$LastName=$_REQUEST["txtLastName"];
			$txtFatherName=str_replace("'","",$_REQUEST["txtFatherName"]);
			
			$cboBank=$_REQUEST["cboBank"];
			$txtTotal=$_REQUEST["txtTotal"];
			$txtTotalAmtPaying=$_REQUEST["txtTotalAmtPaying"];
			$txtName=$_REQUEST["txtName"];
              $Dt = $_REQUEST["txtChequeDate"];
		$arr=explode('/',$Dt);
		$txtChequeDate= $arr[2] . "-" . $arr[0] . "-" . $arr[1];

			
			
			
			
			$ssql="UPDATE `NewStudentRegistration_temp` SET `TxnAmount`='$txtTotalAmtPaying',`TxnStatus`='SUCCESS',`PGTxnId`='$txtChequeDate',`TxnId`='$txtChequeNo',`PaymentMode`='$cboPaymentMode',`BankName`='$cboBank',`ChequeDate`='$txtChequeDate' where `sname`='$txtName' and `sfathername`='$txtFatherName' ";
			mysql_query($ssql) or die(mysql_error());
			
				
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
					$NewSrNo=$rowCnt[0]+1;
					break;
				}
			}
			else
			{
				$NewSrNo=1;
			}

			
			$ReceiptNo="MR/".$CurrentFinancialYear."/".$NewSrNo;
			
			
			mysql_query("UPDATE `NewStudentRegistration_temp` SET `RegistrationNo`='$NewRistrationNo',`RegistrationFormNo`='$ReceiptNo' where `sname`='$txtName' and `sfathername`='$txtFatherName'") or die(mysql_error());
			
			$rsChk= mysql_query("select * from `NewStudentRegistration` where `sname`='$txtName' and `sfathername`='$txtFatherName' ");
			if (mysql_num_rows($rsChk) == 0)
			{
				mysql_query("insert into NewStudentRegistration (`RegistrationNo`,`RegistrationDate`,`sname`,`slastname`,`DOB`,`PlaceOfBirth`,`Age`,`AgeYear`,`AgeMonth`,`AgeDays`,`Sex`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`Staff`,`EWSCategory`,`OtherCategory`,`MotherTongue`,`Nationality`,`ResidentialAddress`,`Location`,`Distance`,`PhoneNo`,`smobile`,`sclass`,`MasterClass`,`LastSchool`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherQualificationDuration`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherQualificationDuration`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`RealBroSisName`,`RealBroSisAdmissionNo`,`RealBroSisClass`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactNo`,`RegistrationFormNo`,`email`,`ProfilePhoto`,`status`,`Remarks`,`quarter`,`FinancialYear`,`SchoolId`,`TxnAmount`,`TxnId`,`TxnStatus`,`BirthCertificate`,`ScoreCard`,`EnglishMarks`,`EnglishGrade`,`EnglishPercentage`,`MathsMarks`,`MathsGrade`,`MathsPercentage`,`ScienceMarks`,`ScienceGrade`,`SciencePercentage`,`SSTMarks`,`SSTGrade`,`SSTPercentage`,`LanguageMarks`,`LanguageGrade`,`LanguagePercentage`,`PaymentMode`,`BankName`,`ChequeDate`) select `RegistrationNo`,`RegistrationDate`,`sname`,`slastname`,`DOB`,`PlaceOfBirth`,`Age`,`AgeYear`,`AgeMonth`,`AgeDays`,`Sex`,`Sibling`,`Father_DPS_Alumni`,`Mother_DPS_Alumni`,`Single_Parent`,`Special_Needs`,`Staff`,`EWSCategory`,`OtherCategory`,`MotherTongue`,`Nationality`,`ResidentialAddress`,`Location`,`Distance`,`PhoneNo`,`smobile`,`sclass`,`MasterClass`,`LastSchool`,`sfathername`,`sfatherage`,`FatherEducation`,`FatherQualificationDuration`,`FatherOccupation`,`FatherDesignation`,`FatherAnnualIncome`,`FatherCompanyName`,`FatherOfficeAddress`,`FatherOfficePhoneNo`,`FatherMobileNo`,`FatherEmailId`,`MotherName`,`MotherAge`,`MotherEducation`,`MotherQualificationDuration`,`MotherOccupatoin`,`MotherDesignation`,`MontherAnnualIncome`,`MotherCompanyName`,`MotherOfficeAddress`,`MotherOfficePhone`,`MotherMobile`,`MotherEmail`,`GuradianName`,`GuradianAge`,`GuradinaEducation`,`GuradianOccupation`,`GuradianDesignation`,`GuradianAnnualIncome`,`GuradianCompanyName`,`GuradianOfficialAddress`,`GuradianOfficialPhNo`,`GuradianMobileNo`,`TransportAvail`,`SafeTransport`,`RealBroSisName`,`RealBroSisAdmissionNo`,`RealBroSisClass`,`AlumniFatherName`,`AlumniSchoolName`,`AlumniPassingYear`,`AlumniFatherPassingClass`,`AlumniMotherName`,`AlumniMotherSchoolName`,`AlumniMotherPassingYear`,`AlumniMotherPassingClass`,`EmergencyContactNo`,`RegistrationFormNo`,`email`,`ProfilePhoto`,`status`,`Remarks`,`quarter`,`FinancialYear`,`SchoolId`,`TxnAmount`,`TxnId`,`TxnStatus`,`BirthCertificate`,`ScoreCard`,`EnglishMarks`,`EnglishGrade`,`EnglishPercentage`,`MathsMarks`,`MathsGrade`,`MathsPercentage`,`ScienceMarks`,`ScienceGrade`,`SciencePercentage`,`SSTMarks`,`SSTGrade`,`SSTPercentage`,`LanguageMarks`,`LanguageGrade`,`LanguagePercentage`,`PaymentMode`,`BankName`,`ChequeDate` from `NewStudentRegistration_temp` where `sname`='$txtName' and `sfathername`='$txtFatherName'") or die(mysql_error());
			}
			
			$ssqlRegi="SELECT `sname`,`slastname`,`RegistrationNo`,`sclass`,`TxnAmount`,`smobile`,`email` FROM `NewStudentRegistration` as `a` where `sname`='$txtName' and `sfathername`='$txtFatherName'";	
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
					$notice="Dear Parent, Your registration process for Student:".$sname." for Class: ".$sclass." at DPS Sec 19 Fbd. has been successfully completed. Reg no. :".$RegistrationNo." , Amt: ".$TxnAmount.", Please use the same for future communication.";
					$Emailnotice="Dear Parent, Your registration process for Student:".$sname." for Class: ".$sclass." at DPS Sec 19 Fbd. has been successfully completed. Reg no. :".$RegistrationNo." , Txn id: ".$txnid.", Amt: ".$TxnAmount.", Please use the same for future communication.<br>Regards,<br>DPS Sector 19 Faridabad";
					$notice=strip_tags($notice);
					$notice=str_replace("&","and",str_replace(" ","%20",$notice));
					$StudentMobile=$smobile;
					//$StudetnMobile="8505881817";
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
					curl_exec($ch);
					// close cURL resource, and free up system resources
					if(curl_errno($ch))
					{ 
						echo 'Curl error: ' . curl_error($ch); 
					}
					curl_close($ch);
			//***************************
			//Sending Email**************
			$to=$email;
			//$to="himanshu@eduworldtech.com";
		  	$subject = "New Registration Confirmation Mail";
		  	$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			$headers .= 'From: communication@dpsfsis.com' . "\r\n";
			$headers .= 'Cc: admission@dpsfsis.com' . "\r\n";
			
			mail($to,$subject,$Emailnotice,$headers);
			
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

				<?php echo $txtName; ?>
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

				<font face="Cambria">Payment Mode:- <?php echo $cboPaymentMode; ?></font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<p align="left"><font face="Cambria">Cheque No:- <?php echo $txtChequeNo; ?></font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<font face="Cambria">Cheque Date:- <?php echo $txtChequeDate; ?></font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<p align="left"><font face="Cambria">Bank Name:- <?php echo $cboBank; ?></font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<span class="style2">Registration</span><font face="Cambria"> Fees Amount</font></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<font face="Cambria">

				<?php echo $txtTotal; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; height: 24px; width: 175px" >

				<b>

				<font face="Cambria">Total Fees Paid</font></b></td>

				<td align="center" style="border-style: dotted; border-width: 1px; height: 24px; width: 152px">

				<b><font face="Cambria">

				<?php echo $txtTotalAmtPaying; ?></font></b></td>

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
<form name="frmPDF" id="frmPDF" method="post" action="..Admin/StudentManagement/CreatePDF.php">
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
