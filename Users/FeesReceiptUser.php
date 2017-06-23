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
	//$AdmissionNo=$_REQUEST["txtAdmissionNo"];
			$ssqlFY="SELECT distinct `year`,`financialyear`,`Status` FROM `FYmaster` where `Status`='Active'";
            $rsFY= mysql_query($ssqlFY);
            $row4=mysql_fetch_row($rsFY);
	        $CurrentFinancialYear=$row4[1];
           	$Year=$row4[0];	

			$ssql="UPDATE `fees_temp` SET `TxnStatus`='$txnstatus',`PGTxnId`='$pgtxnno' where `TxnId`='$txnid'";
			mysql_query($ssql) or die(mysql_error());
			$ssql="UPDATE `fees_transaction_temp` SET `TxnStatus`='$txnstatus',`PGTxnId`='$pgtxnno' where `TxnId`='$txnid'";
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
			
			

	$rsReceiptNo=mysql_query("SELECT MAX(CAST(REPLACE(`receipt`,'FR/".$CurrentFinancialYear."/','') as UNSIGNED))+1 FROM `fees`");
	if (mysql_num_rows($rsReceiptNo) > 0)
	{
		while($rowRcpt = mysql_fetch_row($rsReceiptNo))
		{
			$NewReciptNo='FR/'.$CurrentFinancialYear.'/'.$rowRcpt[0];
			break;
		}
	}
	else
	{
		$NewReciptNo='FR/'.$CurrentFinancialYear.'/1';
	}

			$ssql="UPDATE `fees_temp` SET `receipt`='$NewReciptNo' where `TxnId`='$txnid'";
			mysql_query($ssql) or die(mysql_error());
			//$ssql="UPDATE `fees_transaction_temp` SET `receipt`='$NewReciptNo' where `TxnId`='$txnid'";
			//mysql_query($ssql) or die(mysql_error());

		
			$currentdate=date("Y-m-d");
			$currentmonth=date("M");
			$currentYear=date("Y");
			
					$rsChk=mysql_query("select `quarter`,`FinancialYear`,`sadmission` from `fees_temp` where `TxnId`='$txnid'");
					while($rows = mysql_fetch_row($rsChk))
					{
						$quarter=$rows[0];
						$FinancialYear=$rows[1];
						$AdmissionNo=$rows[2];
						$sadmission=$rows[2];
						break;
					}
		
		$sqlStudentDetail = "select `sfathername` from  `student_master` where `sadmission`='$AdmissionNo'";
		$rsStudentDetail = mysql_query($sqlStudentDetail);

		while($rows = mysql_fetch_row($rsStudentDetail))
		{
			$FatherName=$rows[0];
			//$SchoolId=$rows[1];
			break;
		}
					
					$sstr="select * from `fees` where `sadmission`='$sadmission' and `quarter`='$quarter' and `FinancialYear`='$FinancialYear' and `FeesType` !='Hostel'";
					$rs = mysql_query($sstr);
					if (mysql_num_rows($rs) > 0)
					{
						echo "<br><br><center><b>Fee already submitted for Admission Id:" . $sadmission. ",Quarter:" . $quarter. ",Financial Year:" . $FinancialYear;
						exit();
					}
				$ssql="INSERT INTO `fees` (`sadmission` ,`sname` ,`sclass`,`srollno`,`fees_amount`,`InstallmentAmount`,`amountpaid`,`BalanceAmt`,`quarter`,`date`,`FinancialYear`,`status`,`receipt`,`finalamount`,`ReceiptFileName`,`PaymentMode`,`chequeno`,`bankname`,`cheque_date`,`cheque_status`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`Remarks`,`FeesType`,`TxnAmount`,`TxnId`,`TxnStatus`,`PGTxnId`,`InstallmentName`) select `sadmission` ,`sname` ,`sclass`,`srollno`,`fees_amount`,`InstallmentAmount`,`amountpaid`,`BalanceAmt`,`quarter`,`date`,`FinancialYear`,`status`,`receipt`,`finalamount`,`ReceiptFileName`,`PaymentMode`,`chequeno`,`bankname`,`cheque_date`,`cheque_status`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`Remarks`,`FeesType`,`TxnAmount`,`TxnId`,`TxnStatus`,`PGTxnId`,`InstallmentName` from `fees_temp` where `TxnId`='$txnid'";
				mysql_query($ssql) or die(mysql_error());
	
				$ssql1="INSERT INTO `fees_transaction` (`sadmission`,`ReceiptNo`,`ReceiptDate`,`TutionFee`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`PreviousBalance`,`CurrentBalance`,`Remarks`,`chequeno`,`bankname`,`FinancialYear`,`cheque_date`,`cheque_status`,`PaymentMode`,`TxnAmount`,`TxnId`,`TxnStatus`,`PGTxnId`) select `sadmission`,`ReceiptNo`,`ReceiptDate`,`TutionFee`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`PreviousBalance`,`CurrentBalance`,`Remarks`,`chequeno`,`bankname`,`FinancialYear`,`cheque_date`,`cheque_status`,`PaymentMode`,`TxnAmount`,`TxnId`,`TxnStatus`,`PGTxnId` from `fees_transaction_temp` where `TxnId`='$txnid'";
				mysql_query($ssql1) or die(mysql_error());
				
				$ssql="insert into `fees_receipt_code` (`sadmission`,`ReceiptNo`) values ('$sadmission','$NewReciptNo')";
				mysql_query($ssql) or die(mysql_error());
				
				

				
				mysql_query("update `fees` set `cheque_status`='' where `TxnId`='$txnid'") or die(mysql_error());
				mysql_query("update `fees_temp` set `cheque_status`='' where `TxnId`='$txnid'") or die(mysql_error());
				
				$rsDetail=mysql_query("select `sadmission` ,`sname` ,`sclass`,`srollno`,`fees_amount`,`amountpaid`,`BalanceAmt`,`quarter`,`date`,`FinancialYear`,`status`,`receipt`,`finalamount`,`ReceiptFileName`,`PaymentMode`,`chequeno`,`bankname`,`cheque_date`,`cheque_status`,`ActualLateFee`,`ActualDelayDays`,`AdjustedLateFee`,`AdjustedDelayDays`,`Remarks`,`FeesType`,`TxnAmount`,`TxnId`,`TxnStatus`,`PGTxnId` from `fees` where `TxnId`='$txnid'");
				
				
				while($rowDetail = mysql_fetch_row($rsDetail))
				{
					$sadmission=$rowDetail[0];
					$sname=$rowDetail[1];
					$sclass=$rowDetail[2];
					$srollno=$rowDetail[3];
					$fees_amount=$rowDetail[4];
					$amountpaid=$rowDetail[5];
					$BalanceAmt=$rowDetail[6];
					$quarter=$rowDetail[7];
					$date=$rowDetail[8];
					$FinancialYear=$rowDetail[9];
					$status=$rowDetail[10];
					$receipt=$rowDetail[11];
					$finalamount=$rowDetail[12];
					$ReceiptFileName=$rowDetail[13];
					$PaymentMode=$rowDetail[14];
					$chequeno=$rowDetail[15];
					$bankname=$rowDetail[16];
					$cheque_date=$rowDetail[17];
					$cheque_status=$rowDetail[18];
					$ActualLateFee=$rowDetail[19];
					$ActualDelayDays=$rowDetail[20];
					$AdjustedLateFee=$rowDetail[21];
					$AdjustedDelayDays=$rowDetail[22];
					$Remarks=$rowDetail[23];
					$FeesType=$rowDetail[24];
					$TxnAmount=$rowDetail[25];
					$TxnId=$rowDetail[26];
					$TxnStatus=$rowDetail[27];
					$PGTxnId=$rowDetail[28];
					break;
				}
				
	
			if($quarter=="Q1")
			{
				$FeeHead="FEES FIRST INSTALLMENT";
			}
			if($quarter=="Q2")
			{
				$FeeHead="FEES SECOND INSTALLMENT";
			}
			if($quarter=="Q3")
			{
				$FeeHead="FEES THIRD INSTALLMENT";
			}
			if($quarter=="Q4")
			{
				$FeeHead="FEES FOURTH INSTALLMENT";
			}
			
			$ActualFees=$amount-$AdjustedLateFee;
			$ssql2="INSERT INTO `fees_student1` (`sadmission`,`class`,`Name`,`feeshead`,`amount`,`financialyear`,`FeesType`) VALUES ('$sadmission','$sclass','$sname','$FeeHead','$ActualFees','$FinancialYear','')";
			mysql_query($ssql2) or die(mysql_error());


//-------------------- Previous Payment history----------------------------------------------------------
	//$ssql = "SELECT `quarter`,`fees_amount`,`amountpaid`,`BalanceAmt`,`status`,`receipt`,date_format(`date`,'%d-%m-%Y') as `date`,`FinancialYear` FROM `fees` where `sadmission`='$sadmission' and `FinancialYear`='$Year' order by `quarter`,`FinancialYear` desc limit 4";
	//$rs = mysql_query($ssql);
	$ssqlFeePaymentDetail="SELECT `srno`,`sadmission`, `sname`, `sclass`, `srollno`, `fees_amount`, `InstallmentAmount`, `ActualLateFee`, `AdjustedLateFee`, `cheque_bounce_amt`, `finalamount`, `amountpaid`, `BalanceAmt`, `quarter`, `FinancialYear`, `status`, `receipt`, `date`, `datetime`, `refundamount`, `refunddate`, `cancelamount`, `canceldate`, `ReceiptFileName`, `FeeReceiptCode`, `PaymentMode`, `chequeno`, `cheque_date`, `bankname`, `cheque_status`, `ActualDelayDays`, `AdjustedDelayDays`, `Remarks`, `FeesType`, `SendToBank`, `TxnAmount`, `TxnId`, `TxnStatus`, `PGTxnId` FROM `fees` WHERE   `sadmission`='$sadmission' and `FinancialYear`='$Year' order by `quarter`,`FinancialYear` desc limit 4";
	$FeePaymentDetail=mysql_query($ssqlFeePaymentDetail);

}	
//****************	
?>
<script language="javascript">
function Validate1()
{
	//alert("Hello");

	if (document.getElementById("txtAdmissionNo").value=="")

	{

		alert("Please enter student addmission id");

		return;

	}

	document.getElementById("frmFees").submit();

	

}



function GetFeeDetail()

{

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

			        	//alert(rows);

			        	var arrStr=rows.split(",");

			        	var TutionFee=arrStr[0];

			        	var TransportFee=arrStr[1];

			        	var BalanceAmt=arrStr[2];

			        	var LateDays=arrStr[3];

			        	

			        	document.getElementById("txtTuition").value=TutionFee;

			        	document.getElementById("txtTransportFees").value=TransportFee;

			        	document.getElementById("txtPreviousBalance").value=BalanceAmt;

			        	document.getElementById("txtLateDays").value =LateDays;

			        	//alert("TutionFee:" + TutionFee + ",Transport Fee:" + TransportFee + ",Balance Amt:" + BalanceAmt);

			        	//document.getElementById("txtStudentName").value=rows;

			        	

			        	//ReloadWithSubject();

						//alert(rows);														

			        }

		      }

			

			var submiturl="GetFeeDetail.php?Quarter=" + document.getElementById("cboQuarter").value + "&Class=" + document.getElementById("txtClass").value + "&sadmission=" + document.getElementById("txtAdmissionNo").value;

			xmlHttp.open("GET", submiturl,true);

			xmlHttp.send(null);



}



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



<meta http-equiv="Content-Language" content="en-us">



<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">



<title>Fees Reciept Generation</title>



<!-- link calendar resources -->



	<link rel="stylesheet" type="text/css" href="tcal.css" />



	<script type="text/javascript" src="tcal.js"></script>

</head>
<body onload="Javascript:CreatePDF();">
<div id="MasterDiv">
<style type="text/css">
.style1 {
	text-align: center;
}
.style2 {
	font-size: 12pt;
}
.style3 {
	text-align: right;
}
.style4 {
	border-collapse: collapse;
}
</style>
<form name="frmFees" id="frmFees" method="post" action="FeesPayment.php">
	<div style="border-style: solid; border-width: 1px; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">
		<table id="table_11" cellspacing="0" cellpadding="0" width="100%" class="style4">
			<tr>
				<td style="border-style:none; border-width:medium; height: 13px"  colspan="10" class="style1" align="center">
				<font face="Cambria" class="style2"><strong><?php echo $SchoolName; ?><br><?php echo $SchoolAddress; ?></strong></font></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 100px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><strong>Fees Receipt No. </strong>
				</font></td>
				<td style="border-style:solid; border-width:1px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" colspan="3" >
				<font face="Cambria" size="2">
				<?php echo $NewReciptNo; ?></font></td>
				<td style="border-style:solid; border-width:1px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" colspan="2" >
				&nbsp;</td>
				<td style="border-style:solid; border-width:1px; height: 25px; width: 100px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px">
				<b>
				<font face="Cambria" size="2">Receipt Date</font></b></td>
				<td style="border-style:solid; border-width:1px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" colspan="3" >
				<font face="Cambria" size="2"><strong>&nbsp;<?php echo date("d-m-Y"); ?></strong></font></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 100px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria"><b><span ><font style="font-size: 10pt">Adm No.
				</font></span></b></font>
				<span style="font-family: Cambria; font-weight: 700; " >
				<font style="font-size: 10pt">:</font></span></td>
				<td style="width: 138px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $AdmissionNo; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b><span >Name 
				</span></b></font></td>
				<td style="width: 138px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $sname; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b><span >Father's Name</span></b></font></td>
				<td style="width: 145px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<?php echo $FatherName; ?></td>
				<td style="height: 25px; width: 100px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px">
				<p ><font face="Cambria" style="font-size: 10pt"><strong>Class</strong></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $sclass; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<span style="font-family: Cambria; font-weight: 700; " >
				<font style="font-size: 10pt">Roll No</font></span></td>
				<td style="height: 25px; width: 100px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" style="font-size: 10pt"><b>



		<?php echo $srollno; ?></b></font></td>
			</tr>
			<tr>
				<td style="border-style:solid; border-width:1px; width: 100px; height: 25px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<b>
				<font face="Cambria" size="2">Mode Of Payment</font></b></td>
				<td style="width: 138px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" size="2">
				<b>
				<?php echo $PaymentMode; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<p align="center"><b>
				<font face="Cambria" size="2">Cheque /DD #/ Txn Id</font></b></td>
				<td style="width: 138px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
						<font face="Cambria" size="2">
						<b>
						<?php echo $txnid; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<b>
				<font face="Cambria" size="2">Cheque Date</font></b></td>
				<td style="width: 145px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				&nbsp;</td>
				<td style="height: 25px; width: 100px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px">
				<b>
				<font face="Cambria" size="2">Bank name</font></b></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				<font face="Cambria" size="2">
						<b>
						<?php echo $BankName; ?></b></font></td>
				<td style="width: 100px; height: 25px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				&nbsp;</td>
				<td style="height: 25px; width: 100px; border-left-style:solid; border-left-width:1px; border-right-style:solid; border-right-width:1px; border-bottom-style:solid; border-bottom-width:1px; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px" >
				&nbsp;</td>
			</tr>
		</table><font face="Cambria" style="font-size: 10pt">

	</span>
		</font>
		</div>
</form>
<table class="CSSTableGenerator" border="1" style="align:center; width: 100%; border-collapse:collapse">

		
<tr>			
		

		<td style="height: 29px;" class="style13" colspan="14">

		<p style="text-align: center"><b>
		<font face="Cambria" style="font-size: 10pt">Fees Receipt Details</font></b></td>

			</tr>
		
<tr>			
		

		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<strong>Adm #</strong></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Name</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Class</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<strong>Receipt #</strong></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Fees Amt</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Late Fees</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Bounce Amt</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Total Amount Paid</b></font></td>


		<td style="height: 16px; width: 100px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Fees Inst Paid</b></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Payment Mode</b></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<b>Txn Id / Chq No</b></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<strong>Chq Status</strong></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<strong>Payment Date</strong></font></td>


		<td style="height: 16px; width: 101px; text-align:center" class="style12">

		<font face="Cambria" size="2">

		<strong>Financial Year</strong></font></td>


			</tr>
<?php
while($row = mysql_fetch_row($FeePaymentDetail))
	{
				
				$Admission=$row[1];
				$Name=$row[2];
				$Class=$row[3];
                $fees_amount=$row[5];
                $InstallmentAmount=$row[6];
                $late_fees=$row[7];
                $bounce_amount=$row[9];
                $final_amount=$row[10];
                $amountpaid=$row[11];
				$PaymentMode=$row[25];
				$chequeno=$row[26];
				$cheque_status=$row[29];
				$receipt=$row[16];
				$date=$row[17];
				$FinancialYear=$row[14];		
				$AdjustedLateFee=$row[9];		
				$chequestatus=$row[29];	
					
?>
<tr>			
		

		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria" size="2">

		<?php echo $Admission; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria" size="2">

		<?php echo $Name; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria" size="2">

		<?php echo $Class; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria" size="2">

		<?php echo $receipt; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<p style="text-align: center"><font face="Cambria" size="2"><?php echo $fees_amount; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<p style="text-align: center"><font face="Cambria" size="2"><?php echo $late_fees; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<p style="text-align: center"><font face="Cambria" size="2"><?php echo $bounce_amount; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria" size="2">

		<?php echo $amountpaid; ?></font></td>


		<td style="width: 100px; height: 20px;" class="style12">

		<font face="Cambria" size="2">

		<?php echo $InstallmentAmount; ?></font></td>


	
		<td style="width: 100px; height: 20px;" class="style12">

		<p style="text-align: center"><font face="Cambria" size="2"><?php echo $PaymentMode; ?></font></td>


		


		<td style="width: 101px; height: 20px;" class="style17">

		<font face="Cambria" size="2">

		<?php echo $chequeno; ?></font></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<font face="Cambria" size="2">

		<?php echo $chequestatus; ?></font></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<font face="Cambria" size="2">

		<?php echo $date; ?></font></td>


		<td style="width: 101px; height: 20px;" class="style17">

		<font face="Cambria" size="2">

		<?php echo $FinancialYear; ?></font></td>


			</tr>
<?php
}
?>

</table>
<form name="frmPDF" id="frmPDF" method="post" action="StorePDF.php">
	<span style="font-size: 11pt">
	<input type="hidden" name="htmlcode" id="htmlcode" value="tesing">
	<input type="hidden" name="txtpdffilename" id="txtpdffilename" value="<?php echo $PDFFileName; ?>">
	<input type="hidden" name="receiptno" id="receiptno" value="<?php echo $NewReciptNo;?>">
	</span>
</form>	
</div>
<div id="divPrint">
	<p align="center">

	<font face="Cambria" style="font-size: 10pt">

	<a href="Javascript:printDiv();"><span >PRINT</span></a> || <a href="FeesMenu.php" id="hHome"><span >
	HOME</span></a>

	</font>

	</div>
</body>
</html>