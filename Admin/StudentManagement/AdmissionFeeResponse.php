<?php include 'connection.php';?>
<?php include 'AppConf.php';?>
 <?php
	set_include_path('../lib'.PATH_SEPARATOR.get_include_path());
	
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
			//echo "<br><br><center><b>Transaction Status:".$txnstatus."<br>Transaction Id:".$txnid;
			//exit();
			
			$currentdate=date("d-m-Y");
			
			$sqlRcpt = "select max(CAST(`newsadmission` AS UNSIGNED)) as `newsadmission` from (SELECT CAST(`sadmission` AS UNSIGNED) as `newsadmission` FROM `student_master` union SELECT CAST(`sadmission` AS UNSIGNED) as `newsadmission` FROM `Almuni`) as `x`";
			$rsRcpt = mysql_query($sqlRcpt);
			while($rowA = mysql_fetch_row($rsRcpt))
				{
					$sadmission=$rowA[0]+1;
					break;
				}
			
			$ssql="UPDATE `NewStudentAdmission_temp` SET `TxnStatus`='$txnstatus',`PGTxnId`='$pgtxnno',`sadmission`='$sadmission' where `TxnId`='$txnid'";
			mysql_query($ssql) or die(mysql_error());
			
			if($txnstatus !="SUCCESS")
			{
				echo "<br><br><center>Your Transaction was not successfully completed!<br>You are requested to kindly submit the registration form again<br><br>Click <a href='StudentRegistration.php'>here</a> to restart the registration process!";
				exit();
			}
			
			
			$ReceiptNo="AF/2015-16/OL/".$sadmission;
			mysql_query("UPDATE `NewStudentAdmission_temp` SET `AdmissionFeeReceipt`='$ReceiptNo' where `TxnId`='$txnid'") or die(mysql_error());
			mysql_query("UPDATE `Fees_Online_Transactions` SET `ReceiptNo`='$ReceiptNo',`PGTxnId`='$pgtxnno',`TxnStatus`='$txnstatus' where `TxnId`='$txnid'") or die(mysql_error());
			
			$rsChk= mysql_query("select * from `NewStudentAdmission` where `TxnId`='$txnid'");
			if (mysql_num_rows($rsChk) == 0)
			{
				mysql_query("insert into NewStudentAdmission (`RegistrationNo`,`RegistrationDate`,`sadmission`,`sname`,`slastname`,`sclass`,`smobile`,`email`,`sfathername`,`quarter`,`FinancialYear`,`TxnAmount`,`TxnId`,`PGTxnId`,`TxnStatus`) select `RegistrationNo`,`RegistrationDate`,`sadmission`,`sname`,`slastname`,`sclass`,`smobile`,`email`,`sfathername`,`quarter`,`FinancialYear`,`TxnAmount`,`TxnId`,`PGTxnId`,`TxnStatus` from `NewStudentAdmission_temp` where `TxnId`='$txnid'") or die(mysql_error());
			}
			
			$ssqlRegi="SELECT `sname`,`slastname`,`RegistrationNo`,`sclass`,`TxnAmount`,`smobile`,`email` FROM `NewStudentAdmission` as `a` where `TxnId`='$txnid'";	
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
					$notice="Dear Parent, Your admission process for Student:".$sname." for Class: ".$sclass." at DPS Sec 19 Fbd. has been successfully completed. Admission no. :".$sadmission." , Txn id: ".$txnid.", Amt: ".$TxnAmount.", Please use the same for future communication.";
					$Emailnotice="Dear Parent, Your admission process for Student:".$sname." for Class: ".$sclass." at DPS Sec 19 Fbd. has been successfully completed. Admission no. :".$sadmission." , Txn id: ".$txnid.", Amt: ".$TxnAmount.", Please use the same for future communication.<br>Regards,<br>DPS Sector 19 Faridabad";
					$notice=strip_tags($notice);
					$notice=str_replace("&","and",str_replace(" ","%20",$notice));
					$StudentMobile=$smobile;
					$StudetMobile="9818243377";
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
			$to="itismeashishs@gmail.com";
		  	$subject = "New Registration Confirmation Mail";
		  	$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			$headers .= 'From: info@dpsfsis.com' . "\r\n";
			$headers .= 'Cc: admissions@dpsfsis.com' . "\r\n";
			
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

	
	<p align="center" class="style3" ><font face="Cambria">Admission Fees Receipt</font></p>
	
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
