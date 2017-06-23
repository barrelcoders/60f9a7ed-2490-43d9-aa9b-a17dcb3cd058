<?php include '../connection.php';?>
<?php include '../AppConf.php';?>
<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
	set_include_path('../lib'.PATH_SEPARATOR.get_include_path());
	
        //Replace this with your secret key from the citrus panel
	$secret_key = "ac3d61806bd38e9dd0c3b3a8d42082143b5ba3a9";
	 
	$data = "";
	$flag = "true";
	if(isset($_REQUEST['TxId'])) {
		$txnid = $_REQUEST['TxId'];
		$data .= $txnid;
	}
	 if(isset($_REQUEST['TxStatus'])) {
		$txnstatus = $_REQUEST['TxStatus'];
		$data .= $txnstatus;
	 }
	 if(isset($_REQUEST['amount'])) {
		$amount = $_REQUEST['amount'];
		$data .= $amount;
	 }
	 if(isset($_REQUEST['pgTxnNo'])) {
		$pgtxnno = $_REQUEST['pgTxnNo'];
		$data .= $pgtxnno;
	 }
	 if(isset($_REQUEST['issuerRefNo'])) {
		$issuerrefno = $_REQUEST['issuerRefNo'];
		$data .= $issuerrefno;
	 }
	 if(isset($_REQUEST['authIdCode'])) {
		$authidcode = $_REQUEST['authIdCode'];
		$data .= $authidcode;
	 }
	 if(isset($_REQUEST['firstName'])) {
		$firstName = $_REQUEST['firstName'];
		$data .= $firstName;
	 }
	 if(isset($_REQUEST['lastName'])) {
		$lastName = $_REQUEST['lastName'];
		$data .= $lastName;
	 }
	 if(isset($_REQUEST['pgRespCode'])) {
		$pgrespcode = $_REQUEST['pgRespCode'];
		$data .= $pgrespcode;
	 }
	 if(isset($_REQUEST['addressZip'])) {
		$pincode = $_REQUEST['addressZip'];
		$data .= $pincode;
	 }
	 if(isset($_REQUEST['signature'])) {
		$signature = $_REQUEST['signature'];
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

			$ssql="UPDATE `fees_exam_student_temp` SET `TxnStatus`='$txnstatus',`PGTxnNo`='$pgtxnno' where `TxnId`='$txnid'";
			mysql_query($ssql) or die(mysql_error());
			
			
			
			if($txnstatus !="SUCCESS")
			{
				if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
				{
					echo "<br><br><center>Your Transaction was not successfully completed!<br>You are requested to kindly payment again<br><br>Click <a href='../mPortal/FeesPaymentmPortal.php'>here</a> to restart the process!";
				}
				else
				{
					echo "<br><br><center>Your Transaction was not successfully completed!<br>You are requested to kindly payment again<br><br>Click <a href='MyFees.php'>here</a> to restart the process!";
				}
				exit();
			}
			
			

	

	$rsReceiptNo=mysql_query("SELECT MAX(CAST(REPLACE(`FeeReceipt`,'MR/".$CurrentFinancialYear."/','') as UNSIGNED))+1 FROM `fees_misc_collection`");
	if (mysql_num_rows($rsReceiptNo) > 0)
	{
		while($rowRcpt = mysql_fetch_row($rsReceiptNo))
		{
			$NewReciptNo='MR/'.$CurrentFinancialYear.'/'.$rowRcpt[0];
			break;
		}
	}
	else
	{
		$NewReciptNo='MR/'.$CurrentFinancialYear.'/1';
	}

$currentdate=date('Y-m-d');

			$ssql="UPDATE `fees_exam_student_temp` SET `ReceiptNo`='$NewReciptNo',`ReceiptDate`='$currentdate' where `TxnId`='$txnid'";
			mysql_query($ssql) or die(mysql_error());
			
     $ssql="INSERT INTO `fees_exam_student`(`ExamName`, `FeesType`, `ExamCode`, `Amount`, `sadmission`, `sname`, `sclass`, `ReceiptNo`, `ReceiptDate`, `PGTxnNo`, `TxnId`, `TxDate`, `PaymetMode`, `TxnStatus`, `ChequeDate`, `BankName`, `ChequeAmount`) SELECT `ExamName`, `FeesType`, `ExamCode`, `Amount`, `sadmission`, `sname`, `sclass`, `ReceiptNo`, `ReceiptDate`, `PGTxnNo`, `TxnId`, `TxDate`, `PaymetMode`, `TxnStatus`, `ChequeDate`, `BankName`, `ChequeAmount` FROM `fees_exam_student_temp` WHERE `TxnId`='$txnid'";
	 mysql_query($ssql) or die(mysql_error());
	
	
	$rsFeeDeteail=mysql_query("SELECT  `ExamName`, `FeesType`, `ExamCode`, `Amount`, `sadmission`, `sname`, `sclass`, `ReceiptNo`, `ReceiptDate`, `PGTxnNo`, `TxnId`, `TxDate`, `PaymetMode`, `TxnStatus`, `ChequeDate`, `BankName`, `ChequeAmount` FROM `fees_exam_student` where `TxnId`='$txnid'");
				while($rowDetail = mysql_fetch_row($rsFeeDeteail))
				{
					$ExamName=$rowDetail[0];
					$FeesType=$rowDetail[1];
					$ExamCode=$rowDetail[2];
					$Amount=$rowDetail[3];
					$sadmission=$rowDetail[4];
					$sname=$rowDetail[5];
					$sclass=$rowDetail[6];
					$ReceiptNo=$rowDetail[7];
					$ReceiptDate=$rowDetail[8];
					$PGTxnNo=$rowDetail[9];
					$TransactionId=$rowDetail[10];
					$Transactiondate=$rowDetail[11];
					$PaymentMode=$rowDetail[12];
					$TxnStatus=$rowDetail[13];
		      }
		      $ssql="insert into `fees_misc_collection` (`date`, `HeadName`, `Source`, `sadmissionno`, `sname`, `sclass`, `Amount`, `PaymentMode`, `TxnId`, `TxnStatus`, `PGTxnId`, `FeeReceipt`, `ReceiptCode`, `HeadType`, `financialyear`) values ('$currentdate','Misc. Exam Fees','Student','$sadmission','$sname','$sclass','$amount','Online','$txnid','$TxnStatus','$PGTxnNo','$ReceiptNo','','Regular','$Year')";
				mysql_query($ssql) or die(mysql_error());
}	
//****************	
?>
<script language="javascript">
	function printDiv() 
	{

        //Get the HTML of div

        var divElements = document.getElementById("MasterDiv").innerHTML;

        //Get the HTML of whole page

        var oldPage = document.body.innerHTML;



        //Reset the page's HTML with div's HTML only

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";



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
        //document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
		//document.frmPDF.htmlcode.value = "<html><head><title></title></head><body>" + divElements + "</body>";
		document.frmPDF.htmlcode.value = divElements;
		//alert(document.frmPDF.htmlcode.value);
		//document.frmPDF.submit;
		document.getElementById("frmPDF").submit();
		//document.all("frmPDF").submit();
		return;
		//alert(document.getElementById("htmlcode").value);		 
        //Print Page
        //window.print();
        //var FileLocation="http://emeraldsis.com/Admin/Fees/CreatePDF.php?htmlcode=" + escape(document.body.innerHTML);
		//window.location.assign(FileLocation);
		//return;
}

</script>
<html>

<head>
<style type="text/css">
.style5 {
	font-size: 13pt;
	font-weight: bold;
}
.style4 {
	text-align: left;
}
</style>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Delhi Public School</title>

</head>

<body onload="Javascript:CreatePDF();">

<div id="MasterDiv" style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px" >
<style type="text/css">
.style4 {
	text-align: left;
}
.style5 {
	font-size: 13pt;
	font-weight: bold;
}
</style>

	<p align="center">

	<font face="Cambria">

	<img border="0" src="http://dpsfsis.com/Admin/images/logo.png"  height="81" width="288"></font></p>
	<p align="center" ><font face="Cambria"><span class="style5"><?php echo $SchoolAddress; ?></span></font><br><b><font face="Cambria">
	(MISC. Exam Fees Receipt)</font></b></p>
	
	
	<p align="center"><b>Receipt No.<?php echo $NewReciptNo; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Date:<?php echo date("d-m-Y"); ?></b></p>
	
										

	<div align="center">

		<table cellpadding="0" style="padding: 1px 4px; border-style: dotted; border-width: 1px; width: 672px; border-collapse:collapse; " >

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px">

				<font face="Cambria">Name</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $sname; ?>

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria">ID</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $sadmission; ?>

				</font></td>

			</tr>
			<?php
			if($Class !="")
			{
			?>
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria">Student Class</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $sclass; ?>

				</font></td>

			</tr>
			<?php
			}
			?>
			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

				<font face="Cambria"> Fees Type</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				Misc.Exam Fee

				</font></td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								<font face="Cambria"> Payment Mode</font></td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">
				<font face="Cambria">
				<?php echo $PaymentMode; ?>
				</font>
				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; " colspan="2" >

								<table style="width: 100%">
									<tr>
										<td style="width: 220px">
										<font face="Cambria">Transaction ID: <?php echo $TransactionId;?></font></td>
										<td style="width: 220px">
										&nbsp;</td>
										<td style="width: 220px">
										&nbsp;</td>
									</tr>
								</table>
				</td>

			</tr>

			<tr>

				<td align="left" style="border-style: dotted; border-width: 1px; width: 335px" >

								Fees Paid</td>

				<td style="border-style: dotted; border-width: 1px; width: 335px" class="style4">

				<font face="Cambria">

				<?php echo $amount; ?>

				</font></td>

			</tr>

			</table>
</div>
	

	<p align="center"><font face="Cambria">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>&nbsp;&nbsp;Fees 
	In-charge</strong></font></p>
	<p align="center"><font face="Cambria">This is an electronically generated receipt and does not require any signature.</font></p>
	
<form name="frmPDF" id="frmPDF" method="post" action="StorePDFMiscFee.php">
		<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
		<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">
		<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $ReceiptNo;?>">
		<input type="hidden" name="txtprintdiv" id="txtprintdiv" value="">
</form>	
</div>
	
</body>
<div id="divPrint">
	
	<p align="center">
	<font face="Cambria">
	<a href="Javascript:printDiv();">PRINT</a> 	|| <a href="MyFees.php">HOME</a>
</font> 
	


</html>
